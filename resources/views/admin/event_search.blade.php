
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

<div class="row">
    <div class="col-md-6 col-md-offset-2">
        <div class="box box-primary border">
			
            <div class="box-body border padding-top-0 padding-left-right-0">
				@if(Session::has('msg'))
					<div class="alert alert-danger">
						<strong>{{ Session::get('msg') }}</strong>
					</div>
				@endif
                <div class="panel-body"> {!! $calendar->calendar() !!} {!! $calendar->script() !!} </div> 					
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts-extra')

@endsection