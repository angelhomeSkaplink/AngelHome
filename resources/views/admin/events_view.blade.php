
@extends('layouts.app')

@section('htmlheader_title')
    Events Details
@endsection

@section('contentheader_title')
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Sales Reports</strong></h3>
	</div>
	<?php
		$us = Auth::user()->user_id;
		$roles = DB::table('role')->where('u_id',$us)->where('status',1)->get();
		$role_arr = array();
		foreach ($roles as $r) {
			array_push($role_arr,$r->id);
		}
	?>	
	<div class="col-lg-4">
		@if(in_array(1,$role_arr) || in_array(11,$role_arr))
			<a href="{{ url('new_event_add_form') }}" class="btn btn-success btn-sm pull-right"><i class="material-icons">add</i>Add New Event</a>
		@endif
	</div>
</div>
@endsection

@section('main-content')
<br/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css" />
<style>	
	/*.content-header{
		display:none;
	} */	
	.content {
		margin-top: 0px;
	}
	.border {
		border: 1px solid #ab8383 !important;
	}
</style>
<!--<div class="row margin-left-right-15">
	<form action="{{action('RoomController@search_event')}}" method="post" enctype="multipart/form-data">
		<input type="hidden" name="_method" value="PATCH">
		{{ csrf_field() }}
		
		<div class="col-md-4">
			<div class="form-group has-feedback">
				<label class="sm-heading">@lang("msg.SELECT event")</label>
				
				<select name="event_name" id="event_name" class="form-control" >
					<option value=""> @lang("msg.SELECT event")</option>
					@foreach ($venues as $venue)
						<option value="{{ $venue->event_name }}"> {{ $venue->event_name }} </option>	
					@endforeach
				</select>
					
			</div>			
		</div>
		<div class="col-md-4">
			<div class="form-group has-feedback">
				<label class="sm-heading">@lang("msg.SELECT venue")</label>					
				<select name="event_place" id="event_place" class="form-control" >
					<option value=""> @lang("msg.SELECT venue") </option>
					@foreach ($venues as $venue)
					<option value="{{ $venue->event_place }}"> {{ $venue->event_place }} </option>
					@endforeach						
				</select>
				
			</div>			
		</div>
		<div class="col-md-2">
			<div class="form-group has-feedback">
				<button type="submit" class="btn btn-primary btn-block btn-flat padding-top-bottom-4" style="width:90% !important; margin-top:24px">
					<i class="material-icons"> search </i> @lang("msg.Search")
				</button>
			</div>			
		</div>
		@if(Auth::user()->role == '1')
		<div class="col-md-2">
			<div class="form-group has-feedback">
				<a href="{{ url('new_event_add_form') }}"><span class="label label-primary font-size-85pc padding-7 custom-lebel"> <i class="material-icons md-15" style="vertical-align:sub !important"> add </i> @lang("msg.Add New Event")</a>					
           
			</div>			
		</div>
		@endif
	</form>
</div>-->
<div class="row">
    <div class="col-md-6">
        <div class="box box-primary border">			
            <div class="box-body border padding-top-0 padding-left-right-0">
                <div class="panel-body">{!! $calendar->calendar() !!} {!! $calendar->script() !!} </div> 					
            </div>
        </div>
    </div>
	<div class="col-md-6" >
        <div class="box box-primary border">			
            <div class="box-body border padding-top-0 padding-left-right-0" style="height: 502px;">
                <table class="table">
                    <tbody>
						@if($side_events->isEmpty())
						<tr>
							<th class="text-danger"><b>@lang("msg.No Scheduled Event For This Month") </b></th>
						</tr>
						@endif
						@if(!$side_events->isEmpty())
						<tr>
							<th class="th-position text-uppercase font-400 font-13"><b>@lang("msg.Event")</b></th>
							<th class="th-position text-uppercase font-400 font-13"><b>@lang("msg.Date")</b></th>
							<th class="th-position text-uppercase font-400 font-13"><b>@lang("msg.Venue")</b></th>
							@if(in_array(11,$role_arr))
							<th class="th-position text-uppercase font-400 font-13"><b>@lang("msg.Attendee")</b></th>
							@endif
						</tr>
							
						@foreach ($side_events as $side_event)
						<tr>
							<td>&#x{{$side_event->emoji_code}};{{ $side_event->event_name }}</td>								
							<td>{{ $side_event->event_date }}</td>
							<td>{{ $side_event->event_place }}</td>
							@if(in_array(11,$role_arr))
							<td><a href="attendee/{{ $side_event->event_id }}"><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400">Attendee</a></span></td>
							@endif
						</tr>
						@endforeach						
                    </tbody>
					@endif
                </table>	
				<div class="text-center">{{ $side_events->links() }}</div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts-extra')

@endsection