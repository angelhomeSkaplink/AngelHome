@extends('layouts.app')

@section('htmlheader_title')
    ROOM DETAILS
@endsection

@section('contentheader_title')
	<?php $name = DB::table('sales_pipeline')->where('id', $id)->first(); ?>
    <p class="text-danger"><b>book room for {{ $name->pros_name }}</b>
	@if( $name->service_image == NULL)
	<img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40">
	@else
	<img src="../hsfiles/public/img/{{ $name->service_image }}" class="img-circle" width="40" height="40">
	@endif
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
<div class="row margin-left-right-15">
	<form action="{{action('RoomController@select_room')}}" method="post" enctype="multipart/form-data">
		<input type="hidden" name="_method" value="PATCH">
		{{ csrf_field() }}
		<div class="col-md-3">
			<div class="form-group has-feedback">
				<label class="sm-heading">Price Low</label>
				<input type="number" class="form-control" placeholder="Price Low" name="price_from" id="price_from" autocomplete="off"/>
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group has-feedback">
				<label class="sm-heading">Price High</label>
				<input type="number" class="form-control" placeholder="Price High" name="price_to" id="price_to" autocomplete="off" />
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group has-feedback">
				<label class="sm-heading">Sales Room Type </label>
				<select name="room_type" id="room_type" class="form-control" >
					<option value="">Sales Room Type </option>
					<option value="AC">AC</option>
					<option value="NON-AC">NON-AC</option>
				</select>
			</div>
		</div>
		<input type="hidden" class="form-control" name="pros_id" value="{{ $id }}" />
		<div class="col-md-2">
			<div class="form-group has-feedback">
				<button type="submit" class="btn btn-primary btn-block btn-flat padding-top-bottom-4" style="width:90% !important; margin-top:24px">
					<i class="material-icons"> search </i> Search
				</button>
			</div>
		</div>
	</form>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">
            <div class="box-body border padding-top-0 padding-left-right-0">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
              				<tr>
    							<th class="th-position text-uppercase font-500 font-12">Room No</th>
              					<th class="th-position text-uppercase font-500 font-12">Room Type</th>
              					<th class="th-position text-uppercase font-500 font-12">Special Feature</th>
              					<th class="th-position text-uppercase font-500 font-12">Market Rate</th>
              					<th class="th-position text-uppercase font-500 font-12">Actual Rate</th>
              					<th class="th-position text-uppercase font-500 font-12">Book</th>
              				</tr>
              				<tr>
              					@if($reports == NULL && $rooms != NULL)
              						@foreach ($rooms as $room)
    									<form action="{{action('RoomController@room_book')}}" method="post">
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
              									<td ><input style="width:110px" type="number" class="form-control" placeholder="PRICE" name="price" value="{{ $room->price }}" required pattern="[0-9]" Title="Numeric Value only"/></td>
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
              						NO ROOMS AVAILABLE
              					@endif
              					@if($reports != NULL)
              						@foreach ($reports as $room)
              							<form action="{{action('RoomController@room_book')}}" method="post">
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
              									<td><input type="number" class="form-control" placeholder="PRICE" name="price" value="{{ $room->price }}" required pattern="[0-9]" Title="Numeric Value only"/></td>
              									@endif
              									@if($room->room_status == 0)
              									<td><button type="submit" class="btn btn-success btn-circle btn-lg"><i class="glyphicon glyphicon-link"></i>Available</button></td></tr>
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
				<h4 class="modal-title" id="myModalLabel"><b>This room is Booked by&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="adv_booking/{{ $id }}">Advance Booking</b></h4>
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
