@extends('layouts.app')

@section('htmlheader_title')
    TSP
@endsection

@section('contentheader_title')
<div class="row" style="padding:0px;margin:0px;">
    <div class="col-lg-12 text-center">
        <h3 style="padding:0px;margin:0px;"><strong>Temporary Service Plan(TSP)</strong></h3>
    </div>
</div>
<div class="row">
	<div class="col-lg-12">
		<h3 style="margin:0px;padding:0px;">@if($residents->service_image == NULL)
		<img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40">
		@else
		<img src="../hsfiles/public/img/{{ $residents->service_image }}" class="img-circle" width="40" height="40">
	@endif<b><span class="text-danger">{{ $residents->pros_name }} </span></b></h3>
	</div>
</div>
<div style="margin-top:20px;">
    <div class="tab-content">
        <div class="box box-primary" style="padding-top:5px;padding-bottom:5px;margin-bottom:0px;">
          <form action="" method="post">
            <input name="_method" type="hidden" value="POST">
            {!! csrf_field() !!}
            <input type="hidden" name="user_id" value="">
            <div class="row" style="padding:20px;">
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="Date">TSP Date</label>
                  <input class="form-control" type="date" name="tsp_date" value="" required>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="row">
                  <div class="col-lg-10">
                    <label for="tsp_type">TSP Type:</label>
                    <select type="text" name="tsp_type" id="tsp_type" class="form-control" placeholder="">
                      <option value="0" id="0">Select TSP</option>
                      <option value="1" id="1">Fall</option>
                      <option value="2" id="2">Decline in Appetite or Activities of Daily Living</option>
                      <option value="3" id="3">Increase in Pain</option>
                      <option value="4" id="4">New Medication</option>
                      <option value="5" id="5">Skin Problem of Any Type</option>
                      <option value="6" id="6">Respiratory Problem</option>
                      <option value="7" id="7">Cast Or Splint</option>
                      <option value="8" id="8">Eye Problem</option>
                      <option value="9" id="9">Gastrointestinal Problem</option>
                      <option value="10" id="10">Urinary Tract Infection</option>
                    </select>
                  </div>
                  <div class="col-lg-2">
                    <span class="btn btn-primary form-control" id="addTsp" style="margin-top:20px;"><i class="material-icons md-36" style="color:#fff;"> add_circle </i> <font color="#fff">Add</font></span>
                  </div>
                </div>
              </div>

            </div>
          </form>
        </div>
    </div>
</div>
@endsection

@section('main-content')
    <div style="margin-top:-10px;padding-top:0px;">
    <form class="" action="{{action('tspController@storeTsp')}}" method="post">
        <input type="hidden" name="_method" value="PATCH">
        {{ csrf_field() }}
          <div class="tab-content" id="myTabContent">

          </div>
          <div class="box box-primary" id="buttonContainer">

          </div>
        </form>
    </div>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
<script type="text/javascript">
        $(document).ready(function(){
            $("#addTsp").click(function () {
                var tsp_type = $("#tsp_type").val();
                var tsp = '<div class="box box-primary" id="box'+ tsp_type + '">';
                console.log(tsp);
                if(tsp_type != 0){
                  $('#'+tsp_type).addClass("hidden");
                  $('#myTabContent').append($(tsp).load('/'+tsp_type));
                  $("#tsp_type").val(0);
                  $(".alert").addClass('hidden');
                  if($.trim($("#buttonContainer").html())==''){
                    var buttons = '<div id="buttonSet" style="padding:30px;"><div class="form-group"><div class="form-inline pull-right"><button class="btn btn-success form-control" type="submit"><font style="color:#fff;"><strong>Save</strong></font></button>&nbsp;&nbsp;<button class="btn btn-danger form-control" type="button"><font style="color:#fff;"><strong>Cancel</strong></font></button></div></div></div>';
                    setTimeout(function(){
                      $("#buttonContainer").append($(buttons));
                    }, 500);
                  }
                }else{
                   // $(".alert").removeClass('hidden');
                   toastr.optionsOverride = 'positionclass = "toast-bottom-right"';
                   toastr.options.positionClass = 'toast-bottom-right';
                   toastr.warning('Please select the TSP type to add', 'Warning', 'positionclass = "toast-bottom-right"');
                }
                if($.trim($("#myTabContent").html())==''){
                  $("#buttonSet").remove();
                }
            });
        });
    </script>
@endsection
@section('scripts-extra')
@endsection
