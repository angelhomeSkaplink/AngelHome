@extends('layouts.app')

@section('htmlheader_title')
    @lang("msg.Add Staff Position")
@endsection

@section('contentheader_title')
<div class="row">
 <div class="col-lg-5 col-lg-offset-3 text-center">
   <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>@lang("msg.Staff Position")</strong></h3>
 </div>
 <div class="col-lg-4">
     <a href="dashboard" class="btn btn-success btn-block btn-flat btn-width btn-sm pull-right" style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>@lang("msg.Back")</a>
 </div>
</div>
@endsection

@section('main-content')
<style media="screen">
  .content{
    margin-top:0px;
  }
  .panel-heading h4{
    color:aliceblue !important;
  }
</style>
<div class="row">
  <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading" style="background-color:rgb(49, 68, 84) !important;">
            <h4><strong>@lang("msg.Add New Staff Position")</strong></h4>
        </div>
        <div class="panel-body">
          <form class="form" action="add_staff_position" method="post">
            <input type="hidden" name="_method" value="post">
            {{ csrf_field() }}
          <!-- 1st row -->
          <div class="row">
            <div class="col-lg-4">
              <div class="form-group">
                <label for="dept">@lang("msg.Department")*</label>
                <input class="form-control" type="text" name="dept" required/>
                <!-- <select class="form-control" name="dept">
                  <option value="0">Select Deartment</option>
                  <option value="">Other</option>
                </select> -->
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label for="pos">@lang("msg.Position Title")*</label>
                <input type="text" class="form-control" name="pos" required/>
                <!-- <select class="form-control" name="pos">
                  <option value="0">Select Position Title</option>
                  <option value="">Other</option>
                </select> -->
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label for="shorthand">@lang("msg.Shorthand")*</label>
                <input type="text" class="form-control" name="shorthand" required/>
                <!-- <select class="form-control" name="dept">
                  <option value="0">Select Deartment</option>
                  <option value="">Other</option>
                </select> -->
              </div>
            </div>
          </div>
          <!-- End of 1st row -->

          <!-- 2nd row -->
          <div class="row">
            <div class="col-lg-6">
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label for="reports_to">@lang("msg.Reports To")</label>
                    <input type="text" class="form-control" name="reports_to">
                    <!-- <select class="form-control" name="pos">
                      <option value="0">Select reports to</option>
                      <option value="">Other</option>
                    </select> -->
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label for="dept">@lang("msg.Staffing Guidance")</label>
                    <input class="form-control" type="text" name="staffing_guidance">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label for="notes">@lang("msg.Notes")</label>
                    <textarea class="form-control" name="notes" rows="6" style="resize:none;">
                    </textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End of 2nd row -->

          <!-- 3rd row  -->
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="pc">Laptop/PC</label>
                <input type="text" class="form-control" name="pc">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="printer">@lang("msg.Printer")</label>
                <input type="text" class="form-control" name="printer">
              </div>
            </div>
          </div>
          <!-- End of 3rd row -->

          <!-- 4th row  -->
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="cellphone">@lang("msg.Phone")</label>
                <input type="text" class="form-control" name="cellphone">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="uniform">@lang("msg.Uniform")</label>
                <input type="text" class="form-control" name="uniform">
              </div>
            </div>
          </div>
          <!-- End of 4th row -->

          <!-- 5th row -->
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group form-inline pull-right">
                <a href="dashboard" class="form-control btn btn-default"><span style="font-size:1.2em;color:#404040 !important;"><strong>@lang("msg.Cancel")</strong></span></a> &nbsp; &nbsp;
                  <button type="submit" class="form-control btn btn-success"><span style="font-size:1.2em;color:aliceblue !important;"><strong>@lang("msg.Save")</strong></span></button>
              </div>
            </div>
          </div>
          <!-- End of 5th row -->
          </form>
        </div>
      </div>
  </div>
</div>
@include('layouts.partials.scripts_auth')
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
<script teype="text/javascript">
	function ShowWarning(){
		toastr.optionsOverride = 'positionclass = "toast-bottom-right"';
        toastr.options.positionClass = 'toast-bottom-right';
        toastr.warning('Person reporting incident can not be supervisor !', 'Warning', 'positionclass = "toast-bottom-right"');
	}
</script>
@endsection
