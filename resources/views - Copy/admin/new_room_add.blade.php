
@extends('layouts.app')

@section('htmlheader_title')
    new room details
@endsection

@section('contentheader_title')
   new room details
@endsection

@section('main-content')
<br/>
<div class="row">
	<form action="new_room" method="post" enctype="multipart/form-data">	
		
		<div class="col-md-6 col-md-offset-2">
			<div class="box box-primary">
				@if(Session::has('msg'))
					<div class="alert alert-danger">
						<strong>{{ Session::get('msg') }}</strong>
					</div>
				@endif
				<div class="box-body" style="height:465px">
					<div class="form-group has-feedback">
						<label>Room no</label>
						<input type="text" class="form-control" placeholder="ROOM NO" name="room_no" required />
					</div> 
					<div class="form-group has-feedback">
						<label class="sm-heading">Room Type </label>
						<select name="room_type" id="room_type" class="form-control" required >
							<option value="">SELECT ROOM TYPE</option>
							<option value="AC">AC</option>
							<option value="NON-AC">NON-AC</option>
						</select>
					</div>
					<div class="form-group has-feedback">
						<label>special feature </label>
						<textarea class="form-control" name="special_feature" type="text" rows="5" placeholder="SPECIAL FEATURE"></textarea>
					</div>
					<div class="form-group has-feedback">
					<label>price</label>
						<input type="number" class="form-control" placeholder="PRICE" name="price" required pattern="[0-9]"/>
					</div>
					
					<div class="col-md-12">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group has-feedback">
							<button type="submit" class="btn btn-primary btn-block btn-flat btn-width">Submit</button>
						</div>
					</div>
				</div>
			</div>
		</div>		
		<div class="col-md-10"></div>					
	</form>
</div>
    @include('layouts.partials.scripts_auth')

@endsection
