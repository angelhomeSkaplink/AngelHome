
@extends('layouts.app')

@section('htmlheader_title')
    Events Details
@endsection

@section('contentheader_title')
    Upcoming Events
@endsection

@section('main-content')
<br/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css" />

<div class="row margin-left-right-15">
		<form action="{{action('RoomController@search_event')}}" method="post" enctype="multipart/form-data">
			<input type="hidden" name="_method" value="PATCH">
			{{ csrf_field() }}
			
			<div class="col-md-4">
				<div class="form-group has-feedback">
					<label class="sm-heading">SELECT event</label>
					
					<select name="event_name" id="event_name" class="form-control" >
						<option value=""> SELECT EVENT</option>
						@foreach ($venues as $venue)
							<option value="{{ $venue->event_name }}"> {{ $venue->event_name }} </option>	
						@endforeach
					</select>
					
				</div>			
			</div>
			<div class="col-md-4">
				<div class="form-group has-feedback">
					<label class="sm-heading">SELECT venue</label>					
					<select name="event_place" id="event_place" class="form-control" >
						<option value=""> SELECT VENUE </option>
						@foreach ($venues as $venue)
							<option value="{{ $venue->event_place }}"> {{ $venue->event_place }} </option>
						@endforeach						
					</select>
					
				</div>			
			</div>
			<div class="col-md-2">
				<div class="form-group has-feedback">
					<button type="submit" class="btn btn-primary btn-block btn-flat padding-top-bottom-4" style="width:90% !important; margin-top:24px">
						<i class="material-icons"> search </i> Search
					</button>
				</div>			
			</div>
			@if(Auth::user()->role == '1')
			<div class="col-md-2">
				<div class="form-group has-feedback">
					<a href="{{ url('new_event_add_form') }}"><span class="label label-primary font-size-85pc padding-7 custom-lebel"> <i class="material-icons md-15" style="vertical-align:sub !important"> add </i> Add New Event</a>					
            
				</div>			
			</div>
			@endif
		</form>
	</div>
<div class="row">
    <div class="col-md-6 col-md-offset-2">
        <div class="box box-primary border">
			
            <div class="box-body border padding-top-0 padding-left-right-0">
                <div class="panel-body"> {!! $calendar->calendar() !!} {!! $calendar->script() !!} </div> 					
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts-extra')

@endsection