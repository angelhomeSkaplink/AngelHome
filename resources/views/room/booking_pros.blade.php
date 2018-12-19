@extends('layouts.app')

@section('htmlheader_title')
    resident Info 
@endsection

@section('contentheader_title')
    <p class="text-danger"><b>residents</b>
		<a href="{{ url('booking') }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:122px !important; margin-top: -2px; margin-right: 15px;"><i class="material-icons md-14 font-weight-600"> keyboard_arrow_left </i> back</a>
	</p>
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
        url: '../booking_pros/'+pros_id,
        type: "GET",
        success:function(data) {
          window.location.replace('../booking_pros/'+pros_id);
        }
      });
    }
  });
});
</script>
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
    							<th class="th-position text-uppercase font-400 font-13">resident
    								<!--<select name="id" id="id" class="form-control" >
    									<option value="">SELECT RESIDENT</option>
    								  {{-- @foreach ($reports_all as $prospect)
    								  <option value="{{ $prospect->id}}">{{ $prospect->pros_name }}</option>
    								  @endforeach --}}
    								</select>-->
    							</th>
    							<th class="th-position text-uppercase font-500 font-12">Phone No</th>
    							<th class="th-position text-uppercase font-500 font-12">Email</th>
    							<th class="th-position text-uppercase font-500 font-12">Contact Person</th>
    							<!--<th class="th-position text-uppercase font-500 font-12">Add Records</th>-->
    							<th class="th-position text-uppercase font-500 font-12">Status</th>
    							<th class="th-position text-uppercase font-500 font-12">Change Room</th>
    							<th class="th-position text-uppercase font-500 font-12">Leave Room</th>
    						</tr>
    						@foreach ($reports as $crm)
    						<tr>
    							@if($crm->service_image == NULL)
    							<td><img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>
    							@else
    							<td><img src="../hsfiles/public/img/{{ $crm->service_image }}" class="img-circle" width="40" height="40"></td>
    							@endif
    							<td>{{ $crm->pros_name }}</td>
    							<?php
    								$basic = DB::table('change_pross_record')->where([['pros_id', $crm->id], ['status', 1]])->first();{
    							?>
    							<td>{{ $basic->phone_p }}</td>
    							<td>{{ $basic->email_p }}</td>
    							<td>{{ $basic->contact_person }}</td>
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
    							<td style="padding-left:35px"><a href="../change_own_room/{{ $crm->id }}"><i class="material-icons gray md-22"> track_changes</i></a></td>
    							<td style="padding-left:35px"><a href="../leave_own_room/{{ $crm->id }}"><i class="material-icons gray md-22"> cancel_presentation</i></a></td>
    						</tr>
    						@endforeach
                        </tbody>
                    </table>
                </div>
            </div>                
        </div>
    </div>
</div>

@endsection
@section('scripts-extra')
@endsection
