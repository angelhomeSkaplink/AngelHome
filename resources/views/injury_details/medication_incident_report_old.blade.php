@extends('layouts.app')

@section('htmlheader_title')
    Medication Incident Report & Action
@endsection

@section('contentheader_title')
<div class="row">
 <div class="col-lg-6 col-lg-offset-2 text-center">
   <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Medication Incident Report & Action</strong></h3>
 </div>
 <div class="col-lg-4">
     <a href="dashboard" class="btn btn-success btn-block btn-flat btn-width btn-sm pull-right" style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back</a>
 </div>
</div>
@endsection

@section('main-content')
<style media="screen">
  .content{
    margin-top:0px;
  }
  .tab-head ul li a h4{
    color:aliceblue !important;
  }
  .tab-head ul li a:hover{
    background-color:#3c8dbc !important;
  }
</style>
<div class="row">
  <div class="col-lg-12 tab-head">
      <ul class="nav nav-pills" style="background-color:rgb(49, 68, 84) !important;">
        <li class="active"><a data-toggle="pill" href="#ErrorReporting"><h4><strong>MEDICATION INCIDENT REPORT</strong></h4></a></li>
        <li><a data-toggle="pill" href="#Supervision"><h4><strong> SUPERVISOR’S ANALYSIS AND ACTION RECORD</strong></h4></a></li>
        <li class="pull-right"><a ><h4><strong>Date: {{date("d-m-Y h:m",time())}}</strong></h4></a></li>
      </ul>
      <div class="tab-content">
          <div id="ErrorReporting" class="tab-pane fade in active">
            <div class="panel panel-default">
                <div class="panel-body">
                  <form action="medication_incident_entry" method="post">
                    <input type="hidden" name="_method" value="post">
                    {{ csrf_field() }}
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

                    <!--Second Row  -->
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label for="resident_name"><strong>Resident Name</strong></label>
                          <select class="form-control" name="resident_name">
                            <option value="">@lang("msg.Select Resident")</option>
            								@foreach ($prospects as $prospect)
            								@php
            									$n = explode(",",$prospect->pros_name);
            								@endphp
            								<option value="{{ $prospect->id}}">{{ $n[0] }} {{ $n[1] }} {{ $n[2] }}</option>
            								@endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                    <!--End of Second Row  -->

                    <!-- Third Row -->
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="error_done_by"> <strong>Employee making error</strong> </label>
                          <input type="text" class="form-control" name="error_done_by" required/>
                          <!-- <select class="form-control" name="error_done_by">
                            <option value="">Select Employee</option>
                            <option value="">Mumu</option>
                          </select> -->
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="role"> <strong>Role</strong> </label>
                          <input type="text" class="form-control" name="emp_role" required/>
                          <!-- <select class="form-control" name="emp_role">
                            <option value="">Select Role</option>
                            <option value="">Med Tech</option>
                            <option value="">Care Taker</option>
                          </select> -->
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
                          <input type="text" class="form-control" name="physician_response">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="action_taken">What action was taken</label>
                          <input type="text" class="form-control" name="action_taken">
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
                          <a href="dashboard" class="form-control btn btn-default"><span style="font-size:1.2em;color:#404040 !important;"><strong>Cancel</strong></span></a> &nbsp; &nbsp;
                          <button type="submit" class="form-control btn btn-success" name="submit"><span style="font-size:1.2em;color:aliceblue !important;"><strong>Save</strong></span></button>
                        </div>
                      </div>
                    </div>
                    <!-- End of Ninth Row -->
                    </form>
                </div>
            </div>
          </div>
          <div id="Supervision" class="tab-pane fade">
            <div class="panel panel-default">
                <div class="panel-body">
                  <!-- 0th Row  -->
                  <!-- <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label for="resident_diagnosis">Medication Error Incident</label>
                        <input type="text" class="form-control" name="resident_diagnosis" value="">
                      </div>
                    </div>
                  </div> -->
                  <!-- End of 0th Row -->

                  <!-- 1st Row  -->
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="resident_diagnosis">Resident diagnosis</label>
                        <!-- <input type="text" class="form-control" name="resident_diagnosis" value=""> -->
                        <select class="form-control" name="resident_diagnosis">
                          <option value="">@lang("msg.Select Resident")</option>
                          @foreach ($prospects as $prospect)
                          @php
                            $n = explode(",",$prospect->pros_name);
                          @endphp
                          <option value="{{ $prospect->id}}">{{ $n[0] }} {{ $n[1] }} {{ $n[2] }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="">Medication</label>
                        <input type="text" class="form-control" name="Medication" value="">
                      </div>
                    </div>
                  </div>
                  <!-- End of 1st Row -->

                  <!-- 2nd Row  -->
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="resident_diagnosis">Has made other errors</label>
                        <!-- <input type="text" class="form-control" name="other_err" value=""> -->
                        <select class="form-control" name="other_err">
                          <option value="No">No</option>
                          <option value="Yes">Yes</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="">Scope / severity</label>
                        <input type="text" class="form-control" name="scope_severity" >
                      </div>
                    </div>
                  </div>
                  <!-- End of 2nd Row -->

                  <!-- 3rd Row  -->
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="action_taken">Action taken with employee</label>
                        <textarea rows="5" class="form-control" name="action_taken" placeHolder="Type text here..." style="resize:none;" required/>
                        </textarea>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="prevention_step">Steps to prevent reoccurrence</label>
                        <textarea rows="5" class="form-control" name="prevention_step" placeHolder="Type text here..." style="resize:none;" required/>
                        </textarea>
                      </div>
                    </div>
                  </div>
                  <!-- End of 3rd Row -->

                  <!-- 4th Row -->
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label for="person_completing_report">Person Supervising </label>
                        @php
                            $user= Auth::user();
                        @endphp
                        <input type="text" class="form-control" name="person_completing_report" value="{{$user->firstname}} {{$user->middlename}} {{$user->lastname}}" readonly>
                      </div>
                    </div>
                  </div>
                  <!-- End of 4th Row -->

                  <!-- 5th Row -->
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group form-inline pull-right">
                        <button type="button" class="form-control btn btn-default" name="button"><span style="font-size:1.2em;color:#404040 !important;"><strong>Cancel</strong></span></button> &nbsp; &nbsp;
                        <button type="button" class="form-control btn btn-success" name="button"><span style="font-size:1.2em;color:aliceblue !important;"><strong>Save</strong></span></button>
                      </div>
                    </div>
                  </div>
                  <!-- End of 5th Row -->
                </div>
            </div>
          </div>
      </div>
  </div>
</div>
@include('layouts.partials.scripts_auth')
@endsection
