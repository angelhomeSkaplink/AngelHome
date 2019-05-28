@extends('layouts.app')

@section('htmlheader_title')
    Medication Incident Report & Action
@endsection

@section('contentheader_title')
<div class="row">
 <div class="col-lg-5 col-lg-offset-3 text-center">
   <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Incident Error Reporting</strong></h3>
 </div>
 <div class="col-lg-4 pull-right">
    <div class="col-md-6">
      <select class="form-control" name="quicklink" id="quicklink" onchange="load_url()">
        <option value="#" selected>Quick Links</option>
        <option value="{{url('screening_view/'.$pros_id)}}">Resident Details</option>
        <option value="{{url('assessment_period/resident/'.$pros_id)}}">Assessment History</option>
        <option value="{{url('select_period/resident/'.$pros_id)}}">Assessment</option>
        <option value="{{url('service_plan_period/'.$pros_id)}}">Service Plan</option>
        <option value="{{url('all_tsp/'.$pros_id)}}">Temporary Service Plan</option>
        <option value="{{url('change_own_room/'.$pros_id)}}">Room Book</option>
        <option value="{{url('injury_history/'.$pros_id)}}">Incident</option>
        <!--<option value="{{url('medication_incident_resident_report/'.$pros_id)}}">Medication Incident</option>-->
        <option value="{{url('checkup/'.$pros_id)}}">Vital Statistics</option>
        <option value="{{url('take_note/'.$pros_id)}}">Notes</option>
        <option value="{{url('set_task/'.$pros_id)}}">Set Tasksheet</option>
      </select>
    </div>
    <div class="col-md-6">
     <a href="../medication_incident_report" class="btn btn-success btn-block btn-flat btn-width btn-sm pull-right" style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back</a>
    </div>
  </div>
 <!--<div class="col-lg-4">-->
 <!--    <a href="../medication_incident_report" class="btn btn-success btn-block btn-flat btn-width btn-sm pull-right" style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back</a>-->
 <!--</div>-->
</div>
@endsection

@section('main-content')
<style media="screen">
  .content{
    margin-top:0px;
  }
</style>
@php
$person = DB::table('sales_pipeline')->where('id',$pros_id)
      ->join('resident_details','sales_pipeline.id','=','resident_details.pros_id')
      ->first();
$room = DB::table('resident_room')
    ->join('facility_room','resident_room.room_id','=','facility_room.room_id')
    ->where([['resident_room.pros_id',$pros_id],['resident_room.status',1]])->first();
if($room){
  $room_no = $room->room_no;
}
else{
  $room_no = "No Room Booked";
}
if($person){
  $age = (date('Y') - date('Y',strtotime($person->dob)))." years";
}
else{
  $person = DB::table('sales_pipeline')->where('id',$pros_id)->first();
  $age = "Not specified";
}
$name =  explode(",",$person->pros_name);
@endphp
<div class="row" >
  <div class="col-lg-12 table-responsive">
    <table class="table">
      <tr style="background-color:rgb(49, 68, 84) !important;margin:0.5px;">
        <td style="padding-top:0px;padding-bottom:0px;">
            <h4>@if($person->service_image == null)
                <img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40">
              @else
                <img src="../hsfiles/public/img/{{ $person->service_image }}" class="img-circle" width="40" height="40">
              @endif
              <span class="text-success" style="color:aliceblue;"><strong>{{ $name[0] }} {{ $name[1] }} {{ $name[2] }}</strong>
            </h4>
        </td>
        <td style="padding-top:0px;padding-bottom:0px;">
            <h4 class="text-center" style="margin-top:20px;">	<span class="text-center" style="color:aliceblue;"><strong>Room No: {{ $room_no }} </strong></span></h4>
        </td>
        <td style="padding-top:0px;padding-bottom:0px;">
            <h4><span class="pull-right" style="color:aliceblue;margin-top:10px;"><strong>Age: {{ $age }} </strong></span></h4>
        </td>
      </tr>
    </table>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                  <form action="../medication_incident_entry" method="post">
                    <input type="hidden" name="_method" value="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="pros_id" value="{{$pros_id}}">
                  <!-- First Row -->
                  <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="incident_date"><strong>Date of Incident</strong></label>
                          <input type="date" class="form-control" name="incident_date" required/>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="shift"><strong>Shift</strong></label>
                          <select class="form-control" name="shift">
                            <option value="Morning">Morning</option>
                            <option value="Day">Day</option>
                            <option value="Evening">Evening</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="incident_time"><strong>Time of Incident</strong></label>
                          <input type="time" class="form-control" name="incident_time" required/>
                        </div>
                      </div>
                    </div>
                    <!--End of First Row  -->

                    <!-- Third Row -->
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="error_done_by"> <strong>Employee making error</strong> </label>
                          <select class="form-control" name="error_done_by" id="error_done_by" onchange="javascript:GetEmployeeRole()">
                            <option value="0">Select Employee</option>
                            @foreach($employee as $emp)
                              <option value="{{$emp->user_id}}">{{$emp->firstname}} {{$emp->middlename}} {{$emp->lastname}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="role"> <strong>Role</strong> </label>
                          <!-- <input type="text" class="form-control" name="emp_role" required/> -->
                          <select class="form-control" name="emp_role" id="emp_role" readonly/>
                            <option value="0">Please Select Role</option>
                            @foreach($employee as $emp)
                              <option value="{{$emp->user_id}}">{{$emp->pos_title}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- End of Third row -->

                    <!-- Fourth Row -->
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="error_desc"> <strong>Describe error in your own words</strong> </label>
                          <textarea rows="5" class="form-control" name="error_desc" placeHolder="Type text here..." style="resize:none;" required/>
                          </textarea>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="error_contrib"> <strong>Describe what might have contributed to this error</strong> </label>
                          <textarea rows="5" class="form-control" name="error_contrib" placeholder="Type text here..." style="resize:none;">
                          </textarea>
                        </div>
                      </div>
                    </div>
                    <!-- End of Fourth row -->

                    <!-- Fifth Row -->
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="physician_informed_date_time"> <strong>Date-Time Physician was informed</strong> </label>
                          <div class="row">
                            <div class="col-lg-6">
                                <input type="date" class="form-control" name="physician_informed_date" required/>
                            </div>
                            <div class="col-lg-6">
                              <input type="time" class="form-control" name="physician_informed_time" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="resident_informed"> <strong>Resident informed</strong> </label>
                          <select class="form-control" name="resident_informed">
                            <option value="No">No</option>
                            <option value="Yes">Yes</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- End of Fifth row -->

                    <!-- Sixth Row  -->
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="physician_response">Physician Response</label>
                          <!-- <input type="text" class="form-control" name="physician_response"> -->
                          <textarea rows="5" class="form-control" name="physician_response" placeholder="Type text here..." style="resize:none;">
                          </textarea>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="action_taken">What action was taken</label>
                          <!-- <input type="text" class="form-control" name="action_taken"> -->
                          <textarea rows="5" class="form-control" name="action_taken" placeholder="Type text here..." style="resize:none;">
                          </textarea>
                        </div>
                      </div>
                    </div>
                    <!-- End of Sixth Row  -->

                    <!-- Seventh Row  -->
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="Res_party_informed">Responsible party informed</label>
                          <select class="form-control" name="Res_party_informed">
                            <option value="No">No</option>
                            <option value="Yes">Yes</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="direction_received">Directions received</label>
                          <select class="form-control" name="direction_received">
                            <option value="No">No</option>
                            <option value="Yes">Yes</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- End of Seventh Row  -->

                    <!-- Eighth Row -->
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label for="person_completing_report">Person completing report</label>
                          @php
                              $user= Auth::user();
                          @endphp
                          <input type="text" class="form-control" name="person_completing_report" value="{{$user->firstname}} {{$user->middlename}} {{$user->lastname}}" readonly>
                        </div>
                      </div>
                    </div>
                    <!-- End of Eighth Row -->

                    <!-- Ninth Row -->
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group form-inline pull-right">
                          <a href="../medication_incident_report" class="form-control btn btn-default"><span style="font-size:1.2em;color:#404040 !important;"><strong>Cancel</strong></span></a> &nbsp; &nbsp;
                          <button type="submit" class="form-control btn btn-success" name="submit"><span style="font-size:1.2em;color:aliceblue !important;"><strong>Save</strong></span></button>
                        </div>
                      </div>
                    </div>
                    <!-- End of Ninth Row -->
                    </form>
                </div>
            </div>
  </div>
</div>
@include('layouts.partials.scripts_auth')
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
<script teype="text/javascript">
  function GetEmployeeRole(){
    var emp_id= $('#error_done_by').val();
    $("#emp_role").val(emp_id);
  }
</script>
@include('quick_link.quicklink')
@endsection
