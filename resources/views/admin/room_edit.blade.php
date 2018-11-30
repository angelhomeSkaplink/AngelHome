
@extends('layouts.app')

@section('htmlheader_title')
    edit room details
@endsection

@section('contentheader_title')
   edit room details
@endsection

@section('main-content')

<div class="row">
	<form action="{{action('RoomController@new_room_edit')}}" method="post">
		<input type="hidden" name="_method" value="PATCH">
			{{ csrf_field() }}
		<div class="col-md-6 col-md-offset-2">
			<div class="box box-primary">				
				<div class="box-body" style="height:500px">
					<input type="hidden" class="form-control" name="room_id" value="{{ $row->room_id }}" />
					<div class="form-group has-feedback">
						<label>Room no</label>
						<input type="text" class="form-control" placeholder="ROOM NO" name="room_no" value="{{ $row->room_no }}" required />
					</div> 
					<div class="form-group has-feedback">
						<label class="sm-heading">Room Type </label>
						<select name="room_type" id="room_type" class="form-control" required >
							<option value="{{ $row->room_type }}">{{ $row->room_type }}</option>
							<option value="AC">AC</option>
							<option value="NON-AC">NON-AC</option>
						</select>
					</div>
					<div class="form-group has-feedback">
						<label>special feature </label>
						<textarea class="form-control" name="special_feature" type="text" rows="5" placeholder="SPECIAL FEATURE">{{ $row->special_feature }}</textarea>
					</div>
					<div class="form-group has-feedback">
					<label>price</label>
						<input type="number" class="form-control" placeholder="PRICE" name="price" value="{{ $row->price }}" required pattern="[0-9]"
						oninvalid="this.setCustomValidity('Required Field.Numeric Value Only')"
						oninput="this.setCustomValidity('')"/>
					</div>
					
					<div class="form-group has-feedback">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
            			<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">@lang("msg.Submit")</button>
            		</div>

					<div class="form-group has-feedback">
                        <a href="{{  url('room_details') }}" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right:15px">@lang("msg.Cancel")</a>
            		</div>
				</div>
			</div>
		</div>		
		<div class="col-md-10"></div>					
	</form>
</div>
    @include('layouts.partials.scripts_auth')

@endsection
