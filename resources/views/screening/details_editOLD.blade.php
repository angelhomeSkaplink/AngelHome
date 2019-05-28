@extends('layouts.app')
@section('htmlheader_title')
    Edit Resident Details
@endsection
@section('contentheader_title')
<div class="row">
    <div class="col-lg-4 col-lg-offset-4 text-center">
      <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Edit Resident Details</strong></h3>
    </div>
    <div class="col-lg-4">
    <a href="{{ url('screening_view/'.$id) }}" class="btn btn-success btn-block btn-flat btn-width btn-sm " style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back</a>
    </div>
</div>
@endsection
@section('main-content')
<style>
	.content-header
	{
		/* display:none; */
		padding: 2px 0px 1px 20px;
		margin-bottom: -18px;
	}
	.content {
		margin-top: 15px;
	}
</style>
<style  type = "text/css" media = "screen">
	.print-header{ display:none; }
	.print-footer{ display:none; }
  table tr td,th{
    border:none !important;
    padding: 0px!important;
  }
</style>
<style  type = "text/css" media = "print">
	.print-header{ display:block; }
	.print-footer{ 
    display:block;
    border-top: 5px solid #000;
   }
  table tr td,th{
    border:none !important;
    padding: 0px!important;
  }
</style>
@php
$person = DB::table('sales_pipeline')->where('id',$id)
			->join('resident_details','sales_pipeline.id','=','resident_details.pros_id')
			->first();
$room = DB::table('resident_room')
		->join('facility_room','resident_room.room_id','=','facility_room.room_id')
		->where([['resident_room.pros_id',$id],['resident_room.status',1]])->first();
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
	$person = DB::table('sales_pipeline')->where('id',$id)->first();
	$age = "Not specified";
}
$n =  explode(",",$person->pros_name);
@endphp
<div class="row" >
    <div class="col-lg-12 table-responsive">
        <table class="table">
        <tr style="background-color:rgb(49, 68, 84) !important;margin:0.5px;">
            <td>
                <h4>@if($person->service_image == null)
                    <img src="{{ asset('hsfiles/public/img/538642-user_512x512.png') }}" class="img-circle" width="40" height="40">
                @else
                    <img src="{{ asset('hsfiles/public/img/'.$person->service_image) }}" class="img-circle" width="40" height="40">
                @endif
                <span class="text-success" style="color:aliceblue;"><strong>{{ $n[0] }} {{ $n[1] }} {{ $n[2] }}</strong>
                </h4>
            </td>				
            <td>
                <h4 class="text-center" style="margin-top:20px;">	<span class="text-center" style="color:aliceblue;"><strong>Room No: {{ $room_no }} </strong></span></h4>
            </td>
            <td>
                <h4><span class="pull-right" style="color:aliceblue;margin-top:10px;"><strong>Age: {{ $age }} </strong></span></h4>
            </td>
        </tr>
        </table>
    </div>
</div>
@if ($scr == "responsible_personnel")
    @include('screening.resposible_personal')
@elseif($scr == "significant_personnel")
    @include('screening.significant_personal')
@elseif($scr == "resident_details")
    @include('screening.resident_details')
@elseif($scr == "physician")
    @include('screening.primary_doctor')
@elseif($scr == "pharmacy")
    @include('screening.pharmacy')
@elseif($scr == "medical_equipment")
    @include('screening.medical_equipment')
@elseif($scr == "legal_document")
    @include('screening.legal_doc')
@elseif($scr == "insurance")
    @include('screening.insurance')
@elseif($scr == "funeral_home")
    @include('screening.funeral_home')
@endif
@endsection