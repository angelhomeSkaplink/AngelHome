@extends('layouts.app')

@section('htmlheader_title')
   Incident
@endsection

@section('contentheader_title')
<div class="row">
 <div class="col-lg-5 col-lg-offset-3 text-center">
   <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Injury Incident</strong></h3>
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
    <div class="panel panel-default">
        @if($prospects->isEmpty())
          <h2 class="text-center" style="padding:50px;color:#e3e3e3;">No resident found to record incident</h2>
        @else
        <div class="table-responsive" style="padding-top:0px;">
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
                  $isHistoryNull = DB::table('resident_injury')->where([['pros_id',$prospect->id],['injury_status',1]])->get();
                @endphp
                @if($isHistoryNull->isEmpty())
                  <a class="btn btn-default" href="javascript:ShowNoHistoryWarning()"><i class="material-icons material-icons gray md-22"> history </i> View</a>
                @else
                  <a class="btn btn-default" href="injury_history/{{$prospect->id}}"><i class="material-icons material-icons gray md-22"> history </i> View</a>
                @endif
              </td>
              <td><a class="btn btn-default pull-right" href="injury_entry/{{$prospect->id}}/0"><i class="material-icons material-icons gray md-22"> add_circle_outline </i> Add</a></td>
            </tr>
            @endforeach
          </table>
        </div>
        @endif
      </div>
  </div>
</div>
@include('layouts.partials.scripts_auth')
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
<script teype="text/javascript">
  function ShowNoHistoryWarning(){
		toastr.optionsOverride = 'positionclass = "toast-bottom-right"';
        toastr.options.positionClass = 'toast-bottom-right';
        toastr.warning('Sorry! No History Data Present.', 'Warning', 'positionclass = "toast-bottom-right"');
	}
</script>
@endsection
