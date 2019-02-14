@extends('layouts.app')

@section('htmlheader_title')
    @lang("msg.Room Details")
@endsection

@section('contentheader_title')
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Reschedule Appointment</strong></h3>
	</div>
	<div class="col-lg-4">
		<a href="../booking" class="btn btn-success btn-block btn-flat btn-width btn-sm pull-right" style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back</a>
	</div>
</div>
@endsection

@section('main-content')
<br/>
<style>
.content-header {
    position: relative;
    padding: 1px 0px 1px 12px;
}
.content {
	margin-top: 0px;
}

</style>
<script>
	$(document).ready(function(){
        $("#roomModal").on("show.bs.modal", function(e) {
            var id = $(e.relatedTarget).data('target-id');
            $.get( '../room_details_view/' + id, function( data ) {
				var res = JSON.parse(data);
				var $template = `
					<div class="user_info">
						<h4><b>${res.pros_name}</b></h4>
					</div>
				`;
                $(".modal-body").html($template);
            });

        });
    });
</script>
<style>
  .btn-circle.btn-lg {
    width: 35px;
    height: 35px;
    padding: 5px 8px;
    font-size: 12px;
    line-height: 1.00;
    border-radius: 25px;
  }
</style>
@php
$person = DB::table('sales_pipeline')->where('id',$id)
			->join('resident_details','sales_pipeline.id','=','resident_details.pros_id')
			->first();
if($person){
	$age = (date('Y') - date('Y',strtotime($person->dob)))." years";
}
else{
	$person = DB::table('sales_pipeline')->where('id',$id)->first();
	$age = "Not specified";
}
$name =  explode(",",$person->pros_name); 
@endphp
<div class="row" style="background-color:rgb(49, 68, 84) !important;">
	<div class="col-lg-12">
		<h4>@if($person->service_image == NULL)
			<img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40">
		@else
			<img src="../hsfiles/public/img/{{ $person->service_image }}" class="img-circle" width="40" height="40">
		@endif
		<span class="text-success" style="color:aliceblue;"><strong>{{ $name[0] }} {{ $name[1] }} {{ $name[2] }}</strong>
		<span class="pull-right" style="color:aliceblue;padding-top:10px;"><strong>Age: {{ $age }} </strong></span>		
		</h4>
	</div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">
            <div class="box-body border padding-top-0 padding-left-right-0">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
              				<tr>
    							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Room No")</th>
              					<th class="th-position text-uppercase font-500 font-12">@lang("msg.Room Type")</th>
              					<th class="th-position text-uppercase font-500 font-12">@lang("msg.Special Feature")</th>
              					<th class="th-position text-uppercase font-500 font-12">@lang("msg.Market Rate")</th>
              					<th class="th-position text-uppercase font-500 font-12">@lang("msg.Actual Rate")</th>
              					<th class="th-position text-uppercase font-500 font-12">@lang("msg.Book")</th>
              				</tr>
              				<tr>
              					@if($reports == NULL && $rooms != NULL)
              						@foreach ($rooms as $room)
    									<form action="{{action('RoomController@room_change')}}" method="post">
    										<input type="hidden" name="_method" value="PATCH">
    										{{ csrf_field() }}
    										<input type="hidden" class="form-control" name="pros_id" value="{{ $id }}"/>
        									<input type="hidden" class="form-control" name="room_id" value="{{ $room->room_id}}"/>
              								<td style="vertical-align:middle">{{ $room->room_no }}</td>
              								<td style="vertical-align:middle">{{ $room->room_type }}</td>
              								<td style="vertical-align:middle">{{ $room->special_feature }}</td>
              								<td style="vertical-align:middle">${{ $room->price }}</td>
              								<!--<input type="hidden" class="form-control" name="actual_price" value="{{ $room->price }}"/>-->
              								@if($room->room_status == 1)
              									<?php $actual_rate = DB::table('resident_room')->where([['room_id', $room->room_id], ['status', 1]])->first(); ?>
              									<td style="vertical-align:middle">${{ $actual_rate->price }}</td>
              									@endif
              									@if($room->room_status == 0)
              									<td ><input style="width:110px" type="number" class="form-control" placeholder="PRICE" name="price" value="{{ $room->price }}" required pattern="[0-9]"/></td>
              									@endif
              									<input style="width:110px" type="hidden" class="form-control" name="orgnl_price" value="{{ $room->price }}"/>
              									@if($room->room_status == 0)
              									<td><button type="submit" class="btn btn-success btn-circle btn-lg"><i class="glyphicon glyphicon-link"></i></button></td></tr>
              									@endif
              									@if($room->room_status == 1)
              									<!--<td><a href="view_book_resident/{{ $room->room_id }}" class="btn btn-danger btn-block btn-flat">Room Booked</a></td></tr>-->
              									<td><button type="button" class="btn btn-danger btn-circle btn-lg" id="{{ $room->room_id }}" data-toggle="modal" data-target-id="{{ $room->room_id }}"  data-target="#roomModal" ><i class="glyphicon glyphicon-remove"></i></button></td></tr>
              									@endif
              							</form>
              						@endforeach
              					@endif
              					@if($reports == NULL && $rooms == NULL)
              						@lang("msg.No Rooms Available")
              					@endif
              					@if($reports != NULL)
              						@foreach ($reports as $room)
              							<form action="{{action('RoomController@room_change')}}" method="post">
              								<input type="hidden" name="_method" value="PATCH">
              								{{ csrf_field() }}
              								<input type="hidden" class="form-control" name="pros_id" value="{{ $id }}"/>
              								<input type="hidden" class="form-control" name="room_id" value="{{ $room->room_id}}"/>
              									<td>{{ $room->room_no }}</td>
              									<td>{{ $room->room_type }}</td>
              									<td>{{ $room->special_feature }}</td>
              									@if($room->room_status == 1)
              									<td>${{ $room->price }}</td>
              									@endif
              									@if($room->room_status == 0)
              									<td><input type="number" class="form-control" placeholder="PRICE" name="price" value="{{ $room->price }}" required pattern="[0-9]" /></td>
              									@endif
              									@if($room->room_status == 0)
              									<td><button type="submit" class="btn btn-success btn-circle btn-lg"><i class="glyphicon glyphicon-link"></i>@lang("msg.Available")</button></td></tr>
              									@endif
              									@if($room->room_status == 1)
              									<!--<td><a href="view_book_resident/{{ $room->room_id }}" class="btn btn-danger btn-block btn-flat">Room Booked</a></td></tr>-->
              									<td><button type="button" class="btn btn-danger btn-circle btn-lg" id="{{ $room->room_id }}" data-toggle="modal" data-target-id="{{ $room->room_id }}"  data-target="#roomModal"><i class="glyphicon glyphicon-remove"></i></button></td></tr>
              									@endif
              							</form>
              						@endforeach
              					@endif
              				</tr>
                        </tbody>
                    </table>
                </div>
				<div class="text-center">{{ $rooms->links() }}</div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="roomModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="myModalLabel"><b>@lang("msg.This Room Is Booked By")&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="adv_booking/{{ $id }}">@lang("msg.Advance Booking")</b></h4>
			</div>
			<div class="modal-body">
			<h4 class="modal-title" id=""><b></b></h4>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts-extra')

@endsection
