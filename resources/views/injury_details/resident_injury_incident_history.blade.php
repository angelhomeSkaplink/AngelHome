@extends('layouts.app')

@section('htmlheader_title')
   Incident History
@endsection

@section('contentheader_title')
<div class="row">
 <div class="col-lg-5 col-lg-offset-3 text-center">
   <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Incident History</strong></h3>
 </div>
 <div class="col-lg-4">
     <a href="../injury" class="btn btn-success btn-block btn-flat btn-width btn-sm pull-right" style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back</a>
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
  <div class="col-lg-12 tab-head">
    <div class="panel panel-default">
           <div class="row">
  <div class="" style="padding:10px;margin-top:-20px;">
    <div class="panel-group" id="accordion">
      @php
        $i=0;
      @endphp
      @foreach ($history_data as $data)
        @php
            $i=$i+1;
        @endphp
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a href="../injury_entry/{{$pros_id}}/{{$data->resident_injury_id}}">
                 <i class="material-icons">error</i><span style="color:blue;font-size:1.0em;padding-left:5px;text-transform:capitalize;"> {{$data->injury_code}}: {{$data->injury_brief_details}}</span> <span class="pull-right" style="font-size:0.9em;"><i class="material-icons">event</i> {{ date("D d-m-Y", strtotime($data->injury_date))}}  <i class="material-icons">access_time</i> {{date('h:i A', strtotime($data->injury_time))}}</span>
              </a>
            </h4>
          </div>
          <!--<div id="{{$data->resident_injury_id}}" class="showAll panel-collapse collapse {{$i}}">-->
          <!--  <div class="panel-body">-->
          <!--      <div class="row">-->
          <!--          <div class="col-lg-4">-->
                     	
          <!--          </div>-->
          <!--          <div class="col-lg-4">-->
                     	
          <!--          </div>-->
          <!--          <div class="col-lg-4">-->
                     	
          <!--          </div>-->
          <!--      </div>-->
          <!--  </div>-->
          <!--</div>-->
        </div>
      @endforeach
    </div>

  </div>
  </div>
      </div>
  </div>
</div>
@include('layouts.partials.scripts_auth')
@endsection
