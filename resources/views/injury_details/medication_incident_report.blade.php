@extends('layouts.app')

@section('htmlheader_title')
    Medication Incident Report & Action
@endsection

@section('contentheader_title')
<div class="row">
 <div class="col-lg-5 col-lg-offset-3 text-center">
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
        <li class="pull-right"><a><h4><strong>Date: {{date("d-m-Y h:m",time())}}</strong></h4></a></li>
      </ul>
      <div class="tab-content">
          <div id="ErrorReporting" class="tab-pane fade in active">
            <div class="panel panel-default">
              @if($prospects->isEmpty())
                <h2 class="text-center" style="padding:50px;color:#e3e3e3;">No resident found to record incident</h2>
              @else
              <div class="table-responsive" style="padding-top:10px;">
                <table class="table table-striped">
                  <tr style="background-color:rgb(49, 68, 84) !important;">
                    <th style="color:aliceblue;"><strong>Resident</strong></th>
                    <th style="color:aliceblue;"><strong>Age</strong></th>
                    <th style="color:aliceblue;"><strong>Room No.</strong></th>
                    <th class="text-center" style="color:aliceblue;"><strong>Incident History</strong></th>
                    <th style="color:aliceblue;"><span class="pull-right"><strong>Action</strong></span></th>
                  </tr>
                  @foreach ($prospects as $prospect)
                  @php
                    $person = DB::table('sales_pipeline')->where('id',$prospect->id)
                          ->join('resident_details','sales_pipeline.id','=','resident_details.pros_id')
                          ->first();
                    $room = DB::table('resident_room')
                        ->join('facility_room','resident_room.room_id','=','facility_room.room_id')
                        ->where([['resident_room.pros_id',$prospect->id],['resident_room.status',1]])->first();
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
                      $age = "Not specified";
                    }
                    $n = explode(",",$prospect->pros_name);
                  @endphp
                  <tr>
                    <td>
                      @if($prospect->service_image == NULL)
                        <img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="30" height="30">
                      @else
                        <img src="../hsfiles/public/img/{{ $prospect->service_image }}" class="img-circle" width="30" height="30">
                      <strong>
                       {{ $n[0] }} {{ $n[1] }} {{ $n[2] }}
                      </strong>
                      @endif
                    </td>
                    <td> <strong> {{$age}}</strong> </td>
                    <td> <strong> {{$room_no}} </strong> </td>
                    <td class="text-center">
                      @php
                        $isHistoryNull = DB::table('med_incident_record')->where([['pros_id',$prospect->id],['status',1]])->get();
                      @endphp
                      @if($isHistoryNull->isEmpty())
                        <a class="btn btn-default" href="javascript:ShowNoHistoryWarning()"><i class="material-icons material-icons gray md-22"> history </i> View</a>
                      @else
                        <a class="btn btn-default" href="medication_incident_resident_history/{{$prospect->id}}"><i class="material-icons material-icons gray md-22"> history </i> View</a>
                      @endif
                    </td>
                    <td><a class="btn btn-default pull-right" href="medication_incident_resident_report/{{$prospect->id}}"><i class="material-icons material-icons gray md-22"> add_circle_outline </i> Add</a></td>
                  </tr>
                  @endforeach
                </table>
              </div>
              @endif
            </div>
          </div>
          <div id="Supervision" class="tab-pane fade">
            <div class="panel panel-default">
                <div class="panel-body">
                  <!-- 1st Row  -->
                  <div class="row">
                    <div class="col-lg-12">
                      @if($incidents->isEmpty())
                      <div class="form-group text-center">
                        <h4 style="padding:50px;color:#e3e3e3 !important">No incident record found</h4>
                      </div>
                      @else
                      <div class="form-group">
                        <div class="panel-group" id="accordion">
                          @foreach($incidents as $key=>$inc)
                          @php
                            $pros = explode(",",$inc->pros_name);
                          @endphp
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <div class="panel-title">
                                <div class="row">
                                    <div class="col-lg-3">
                                      @if($inc->service_image == NULL)
                                  			<img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="30" height="30">
                                  		@else
                                  			<img src="../hsfiles/public/img/{{ $inc->service_image }}" class="img-circle" width="30" height="30">
                                  		@endif
                                      <strong>{{ $pros[0] }} {{ $pros[1] }} {{ $pros[2] }}</strong>
                                    </div>
                                    <div class="col-lg-5">
                                        <strong>Error:</strong> <span class="text-danger">{{$inc->err_desc}}</span>
                                    </div>
                                    <div class="col-lg-2">
                                      <strong>Date:</strong> {{$inc->dt_incident}}
                                    </div>
                                    <div class="col-lg-2">
                                      <a class="btn btn-default pull-right" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$key}}">
                                        Analyze
                                      </a>
                                    </div>
                                </div>
                              </div>
                            </div>
                            <div id="collapse{{$key}}" class="panel-collapse collapse">
                              <form class="form" action="medication_incident_action" method="post">
                                <input type="hidden" name="_method" value="post">
                                <input type="hidden" name="incident_id" value="{{$inc->med_incident_record_id}}">
                                {{ csrf_field() }}
                              <div class="panel-body">
                                      <!-- 1st Row  -->
                                      <div class="row">
                                        <div class="col-lg-6">
                                          <div class="form-group">
                                            <label for="resident_diagnosis">Resident diagnosis</label>
                                            <input type="text" class="form-control" name="resident_diagnosis" required/>
                                          </div>
                                        </div>
                                        <div class="col-lg-6">
                                          <div class="form-group">
                                            <label for="">Medication</label>
                                            <input type="text" class="form-control" name="Medication" required/>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- End of 1st Row -->

                                      <!-- Row  -->
                                      <div class="row">
                                        <div class="col-lg-4">
                                          <div class="form-group">
                                            <label for="resident_diagnosis">Who made the error</label>
                                            @php
                                            $employee = DB::table('users')->where([['users.user_id',$inc->err_made_emp],['users.facility_id', Auth::user()->facility_id],['users.status',1]])
                                                    ->join('staff_position','staff_position.staff_position_id','=','users.staff_position_id')
                                                    ->first();
                                            @endphp
                                            <select class="form-control" name="who_made_err" readonly>
                                              <option value="{{$employee->user_id}}">{{$employee->firstname}} {{$employee->middlename}} {{$employee->lastname}}</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="col-lg-4">
                                          <div class="form-group">
                                            <label for="">Role</label>
                                            <input type="text" class="form-control" name="role" value="{{$employee->pos_title}}" readonly/>
                                          </div>
                                        </div>
                                        <div class="col-lg-4">
                                          <div class="form-group">
                                            <label for="">Shift</label>
                                            <input type="text" class="form-control" name="shift" value="{{$inc->shift_incident}}" readonly/>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- End of Row -->

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
                                            <textarea rows="5" class="form-control" name="prevention_step" placeHolder="Type text here..." style="resize:none;" />
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
                                            <a href="#collapse{{$key}}" data-toggle="collapse" data-parent="#accordion"  class="form-control btn btn-default"><span style="font-size:1.2em;color:#404040 !important;"><strong>Cancel</strong></span></a> &nbsp; &nbsp;
                                            @if($user->user_id == $inc->user_err_entry)
                                              <a href="javascript:ShowWarning();" class="form-control btn btn-success"><span style="font-size:1.2em;color:aliceblue !important;"><strong>Save</strong></span></a>
                                            @else
                                              <button type="submit" class="form-control btn btn-success"><span style="font-size:1.2em;color:aliceblue !important;"><strong>Save</strong></span></button>
                                            @endif
                                          </div>
                                        </div>
                                      </div>
                                      <!-- End of 5th Row -->
                              </div>
                              </form>
                            </div>
                          </div>
                          @endforeach
                        </div>
                      </div>
                      @endif
                    </div>
                  </div>
                  <!-- End of 1st Row -->
                </div>
            </div>
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

  function ShowNoHistoryWarning(){
		toastr.optionsOverride = 'positionclass = "toast-bottom-right"';
        toastr.options.positionClass = 'toast-bottom-right';
        toastr.warning('Sorry! No History Data Present.', 'Warning', 'positionclass = "toast-bottom-right"');
	}

  function GetEmployeeRole(){
    var emp_id= $('#error_done_by').val();
    $("#emp_role").val(emp_id);
  }
</script>
@endsection
