
@extends('layouts.app')

@section('htmlheader_title')
    Prospective Info 
@endsection

@section('contentheader_title')
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Room Booking</strong></h3>
	</div>
</div>
@endsection

@section('main-content')
<style>
	.wickedpicker{
		z-index:999 !important;
	}
	.content-header
	{
		//display:none;
		padding: 2px 0px 1px 20px;
		margin-bottom: -10px;
	}
	.content {
		margin-top: 15px;
	}
</style>
<script>
	$(document).ready(function() {
	  $('select[name="id"]').on('change', function() {
		var pros_id = $(this).val();
		console.log(pros_id);
		if(pros_id) {
		  $.ajax({
			url: 'booking_pros/'+pros_id,
			type: "GET",
			success:function(data) {
			  window.location.replace('booking_pros/'+pros_id);
			}
		  });
		}
	  });
	});
</script>
<link href="{{ asset('/css/type_ahead.css') }}" rel="stylesheet" type="text/css"/>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">				
            <div class="box-header with-border col-sm-2 pull-right"></div>
            <div class="box-body border padding-top-0 padding-left-right-0">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
    						<tr>
    							<th class="th-position text-uppercase font-500 font-12">#</th>
    							<th class="th-position text-uppercase font-500 font-12">
    								<div class="autocomplete" style="width:200px;">
    									<input id="myInput" type="text" placeHolder="&#61442; RESIDENT" style="font-family: FontAwesome, Arial; font-style: normal">
    								</div>
    							</th>
    							<th class="th-position text-uppercase font-500 font-12">Phone No</th>
    							<th class="th-position text-uppercase font-500 font-12">
    								<div class="emailautocomplete" style="width:200px;">
    									<input id="emailInput" type="text" placeHolder="&#61442; EMAIL" style="font-family: FontAwesome, Arial; font-style: normal">
    								</div>
    							</th>
    							<!--<th class="th-position text-uppercase font-500 font-12">Book Room</th>-->
    							<th class="th-position text-uppercase font-500 font-12">Status</th>
    							<th class="th-position text-uppercase font-500 font-12">Change Room</th>
    							<th class="th-position text-uppercase font-500 font-12">Leave Room</th>
    						</tr>
							@foreach ($crms as $crm)
							@php
								$n = explode(",",$crm->pros_name);
							@endphp
    						<tr>
    							@if($crm->service_image == NULL)
    							<td><img src="hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>	
    							@else
    							<td><img src="hsfiles/public/img/{{ $crm->service_image }}" class="img-circle" width="40" height="40"></td>
    							@endif
    							<td>{{ $n[0] }} {{ $n[1] }} {{ $n[2] }}</td>
    							<?php 
    								$basic = DB::table('change_pross_record')->where([['pros_id', $crm->id], ['status', 1]])->first();{
    							?>
    							<td>{{ $basic->phone_p }}</td>
    							<td>{{ $basic->email_p }}</td>
    							<?php } ?>
    							<!--<td style="padding-left:35px"><a data-toggle="tooltip" data-placement="bottom" data-original-title="Add Screening Records" href="book_room/{{ $crm->id }}"><i class="material-icons gray md-22"> add_circle</i></a></td>-->
    							<?php 
    								$room = DB::table('resident_room')->where([['pros_id', $crm->id], ['status', 1]])->first(); if($room){
    								$room_no = DB::table('facility_room')->where([['room_id', $room->room_id]])->first();
    							?>
    							<td class="text-success"><b>BOOKED ROOM NO <label>{{$room_no->room_no}}</label> FROM <label>{{ $room->booked_date }}</label></b> </td>
    							<?php } else{?>
    							<td class="text-danger"><b>NO BOOKING HISTORY FOUND</b></td>
    							<?php } ?>
    							<td style="padding-left:35px"><a href="change_own_room/{{ $crm->id }}"><i class="material-icons gray md-22"> track_changes</i></a></td>
    							<td style="padding-left:35px"><a href="leave_own_room/{{ $crm->id }}"><i class="material-icons gray md-22"> cancel_presentation</i></a></td>
    						</tr>
    						@endforeach
                           </tbody>
                    </table>
                </div>
				<div class="text-center">{{ $crms->links() }}</div>					
            </div>                
        </div>
    </div>
</div>
@endsection
@section('scripts-extra')
<script type="text/javascript" language="javascript" src="{{ asset('/js/rec/booking.js') }}"></script>
@endsection