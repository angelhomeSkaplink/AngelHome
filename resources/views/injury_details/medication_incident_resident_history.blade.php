@extends('layouts.app')

@section('htmlheader_title')
    Medication Incident History
@endsection

@section('contentheader_title')
<div class="row">
 <div class="col-lg-5 col-lg-offset-3 text-center">
   <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Medication Incident History</strong></h3>
 </div>
 <div class="col-lg-4">
     <a href="../medication_incident_report" class="btn btn-success btn-block btn-flat btn-width btn-sm pull-right" style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back</a>
 </div>
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
      <div class="panel-group" id="accordion">
        @foreach($history as $key=>$value)
        <div class="panel panel-default">
          <div class="panel-heading">
                <div class="panel-title">
                <div class="row">
                    <div class="col-lg-3">
                      <strong><i class="material-icons">calendar_today</i>    {{ $value->dt_incident }} {{ $value->time_incident }}</strong>
                    </div>
                    <div class="col-lg-5">
                        <strong>Description:</strong> <span class="text-danger"><strong>{{$value->err_desc}}</strong></span>
                    </div>
                    <div class="col-lg-3">
                        <strong>Error Made:</strong> <span>{{$value->firstname}} {{$value->middlename}} {{$value->lastname}}</span>
                    </div>
                    <div class="col-lg-1">
                      <a class="btn btn-default pull-right" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$key}}">
                        Explore
                      </a>
                    </div>
                </div>
                </div>
          </div>
          <div id="collapse{{$key}}" class="panel-collapse collapse" style="padding:20px;">
            <!-- <div class="row">
              <div class="col-lg-12">

              </div>
            </div> -->
            <div id="printableDiv{{$key}}">
              <div class="row">
                <div class="col-lg-4">
                    <h4><strong>Date of Incident:</strong> {{$value->dt_incident}}</h4>
                </div>
                <div class="col-lg-4">
                    <h4><strong>Shift: </strong>{{$value->shift_incident}}</h4>
                </div>
                <div class="col-lg-4">
                      <h4><strong>Time of Incident: </strong>{{$value->time_incident}}</h4>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                    <h4><strong>Error Description:</strong> {{$value->err_desc}}</h4>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                    <h4><strong>WHAT MIGHT HAVE CONTRIBUTED TO THIS ERROR:</strong> {{$value->err_contribution}}</h4>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                    <h4><strong>EMPLOYEE MAKING ERROR:</strong> {{$value->firstname}} {{$value->middlename}} {{$value->lastname}}</h4>
                </div>
                <div class="col-lg-6">
                    <h4><strong>Employee Role:</strong> {{ $value->pos_title }}</h4>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                    <h4><strong>Date PHYSICIAN WAS INFORMED:</strong> {{$value->dt_physcn_infrmd}}</h4>
                </div>
                <div class="col-lg-6">
                    <h4><strong>Time Physician Informed:</strong> {{$value->tm_physcn_infrmd}}</h4>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                    <h4><strong>Physician Response:</strong> {{$value->physcn_response}}</h4>
                </div>
                <div class="col-lg-6">
                    <h4><strong>WHAT ACTION WAS TAKEN by Physician:</strong> {{$value->physcn_action}}</h4>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                    <h4><strong>Resident Informed:</strong> {{$value->resident_infrmd}}</h4>
                </div>
                <div class="col-lg-6">
                    <h4><strong>Responsible Person Informed:</strong> {{$value->resp_person_infrmd}}</h4>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                    <h4><strong>Direction Received:</strong> {{$value->direction_received}}</h4>
                </div>
                <div class="col-lg-6">
                  <h4><strong>Date of Recording Error:</strong> {{$value->dt_recording}}</h4>
                </div>
              </div>
              <div class="row">
              <div class="col-lg-6">
                @php
                $reporting_user = DB::table('users')->where([['user_id',$value->user_err_entry],['facility_id', Auth::user()->facility_id],['status',1]])->first();
                @endphp
                <h4><strong>User Reporting Error:</strong> {{$reporting_user->firstname}} {{$reporting_user->middlename}} {{$reporting_user->lastname}}</h4>
              </div>
              <div class="col-lg-6">
                @if($value->action == 1)
                <h4> <strong>SUPERVISOR's Action: </strong><span class="text-success"> Done </span></h4>
                @else
                <h4> <strong>SUPERVISOR's Action: </strong><span class="text-primary"> Pending </span></h4>
                @endif
              </div>
            </div>
            </div>
            <div class="row">
              <div class="col-lg-12 form-inline">
                <a href="javascript:printDiv('printableDiv{{$key}}')" class="btn btn-primary pull-right"> <i class="material-icons md-22"> print </i> Print</a>
                <a class="btn btn-default pull-right" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$key}}" style="margin-right:10px;">
                  Cancel
                </a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
  </div>
</div>
@include('layouts.partials.scripts_auth')
<script type="text/javascript">
  function printDiv(printableDiv) {
    var printContents = document.getElementById(printableDiv).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
    window.location.reload();
  }
</script>
@endsection
