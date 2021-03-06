@extends('layouts.app')

@section('htmlheader_title')
    TSP
@endsection


@section('contentheader_title')
<div class="row">
  <div class="col-lg-4 col-lg-offset-4 text-center">
    <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>TSP FORM</strong></h3>
  </div>
  <div class="col-lg-4 pull-right">
    <div class="col-md-6">
      <select class="form-control" name="quicklink" id="quicklink" onchange="load_url()">
        <option value="#" selected>Quick Links</option>
        <option value="{{url('screening_view/'.$id)}}">Resident Details</option>
        <option value="{{url('assessment_period/resident/'.$id)}}">Assessment History</option>
        <option value="{{url('select_period/resident/'.$id)}}">Assessment</option>
        <option value="{{url('service_plan_period/'.$id)}}">Service Plan</option>
        <option value="{{url('change_own_room/'.$id)}}">Room Book</option>
        <option value="{{url('injury_history/'.$id)}}">Incident</option>
        <option value="{{url('medication_incident_resident_report/'.$id)}}">Medication Incident</option>
        <option value="{{url('checkup/'.$id)}}">Vital Statistics</option>
        <option value="{{url('take_note/'.$id)}}">Notes</option>
        <option value="{{url('set_task/'.$id)}}">Set Tasksheet</option>
      </select>
    </div>
    <div class="col-md-6">
    <a href="../temporary_service_plan" class="btn btn-success btn-block btn-flat btn-width btn-sm " style="margin-right:15px;border-radius:5px;" onclick="history.back();"><i class="material-icons">keyboard_arrow_left</i>Back</a>
    </div>
  </div>
  <!--<div class="col-lg-4">-->
  <!--  <a href="../temporary_service_plan" class="btn btn-success btn-block btn-flat btn-width btn-sm " style="margin-right:15px;border-radius:5px;" onclick="history.back();"><i class="material-icons">keyboard_arrow_left</i>Back</a>-->
  <!--</div>-->
</div>
@endsection

@section('main-content')

@php
$person = DB::table('sales_pipeline')->where('id',$residents->id)
			->join('resident_details','sales_pipeline.id','=','resident_details.pros_id')
			->first();
if($person){
	$age = (date('Y') - date('Y',strtotime($person->dob)))." years";
}
else{
	$person = DB::table('sales_pipeline')->where('id',$residents->id)->first();
	$age = "Not specified";
}
$name =  explode(",",$person->pros_name);
@endphp
<div class="row" style="background-color:rgb(49, 68, 84) !important;margin:0.5px;">
	<div class="col-lg-12">
		<h4>@if($person->service_image == null)
			<img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40">
		@else
			<img src="../hsfiles/public/img/{{ $person->service_image }}" class="img-circle" width="40" height="40">
		@endif
		<span class="text-success" style="color:aliceblue;"><strong>{{ $name[0] }} {{ $name[1] }} {{ $name[2] }}</strong>
		<span class="pull-right" style="color:aliceblue;padding-top:10px;"><strong>Age: {{ $age }} </strong></span>
		</h4>
	</div>
</div>
    <div style="padding-top:0px;">
    <form class="" action="{{action('tspController@storeTsp')}}" method="post">
        <div class="row" style="margin-top:-70px;padding-top:0px;">
          <div class="col-lg-4 pull-right">
            <div class="form-group form-inline pull-right">
              <input type="hidden" name="_method" value="PATCH">
              {{ csrf_field() }}
              <input type="hidden" name="pros_id" value="{{ $residents->id }}">
              <label for="Date">TSP Date</label>
              <input class="form-control" type="date" name="tsp_date" id="tsp_date" value="" required>
            </div>
          </div>
        </div>
          <div class="tab-content" id="myTabContent">

          </div>
          <div class="box box-primary">
              <div class="tab-content">
                  <div class="box box-primary" style="padding-top:5px;padding-bottom:5px;margin-bottom:0px;">
                      <div class="row" style="padding:20px;">
                        <div class="col-lg-3">
                            <h4 class="pull-right"><strong>Select TSP Type to Add</strong></h4>
                        </div>
                        <div class="col-lg-9">
                          <div class="row">
                            <div class="col-lg-10">
                              <!-- <label for="selected_selected_tsp_type">TSP Type:</label> -->
                              <select type="text" id="selected_tsp_type" class="form-control" placeholder="">
                                <option value="0" id="0">TSP type list</option>
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
                              <p style="color:#e3e3e3;">Note: Add at least one TSP to continue</p>
                            </div>
                            <div class="col-lg-2">
                              <span class="btn btn-primary form-control" id="addTsp"><i class="material-icons md-36" style="color:#fff;"> add_circle </i> <font color="#fff">Add</font></span>
                            </div>
                          </div>
                        </div>

                      </div>
                  </div>
              </div>
          </div>
          <div class="box box-primary" id="buttonContainer">

          </div>
        </form>
    </div>
@include('quick_link.quicklink')
@endsection


@section('scripts-extra')
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
<script type="text/javascript">
        $(document).ready(function(){
            $("#addTsp").click(function () {
                var selected_tsp_type = $("#selected_tsp_type").val();
                var tsp = '<div class="box box-primary" id="box'+ selected_tsp_type + '">';
                console.log(tsp);
                if(selected_tsp_type != 0){
                  $('#'+selected_tsp_type).addClass("hidden");
                  $('#myTabContent').append($(tsp).load('/'+selected_tsp_type));
                  $("#selected_tsp_type").val(0);
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
