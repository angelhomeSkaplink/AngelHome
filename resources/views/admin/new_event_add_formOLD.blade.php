
@extends('layouts.app')

@section('htmlheader_title')
    new event details
@endsection

@section('contentheader_title')
   new event details
@endsection

@section('main-content')
<br/> 
<style>
	.wickedpicker{
		z-index:999 !important;
	}
	.content-header{
		display:none;
	}
</style>
<script>
	function addMinutes(time, minsToAdd) {

		function D(J){ return (J<10? '0':'') + J};		  
		var piece = time.split(':');		
		var mins = piece[0]*60 + +piece[1] + +minsToAdd;
		return D(mins%(24*60)/60 | 0) + ':' + D(mins%60);
  
	}

	function calculateEndTime(format, str){	
		
		var timeInterval = document.getElementById("duration").value;	
		console.log(timeInterval);
		var time = $("#event_time").val();
		var hours = Number(time.match(/^(\d+)/)[1]);
		var minutes = Number(time.match(/\s:\s(\d+)/)[1]);
		var AMPM = time.match(/\s(.*)$/)[1];
		if (AMPM == "PM" && hours < 12) hours = hours + 12;
		if (AMPM == "AM" && hours == 12) hours = hours - 12;
		var sHours = hours.toString();
		var sMinutes = minutes.toString();
		if (hours < 10) sHours = "0" + sHours;
		if (minutes < 10) sMinutes = "0" + sMinutes;		
		var new_time = sHours + ":" + sMinutes + ":" + "00";
		var addMinute = addMinutes(new_time, timeInterval);
		var timeString = "18:00:00";
		var H = +addMinute.substr(0, 2);
		var h = (H % 12) || 12;
		var ampm = H < 12 ? "AM" : "PM";
		addMinute = h + addMinute.substr(2, 3);

		document.getElementById('end_time').value = addMinute + " " + ampm;
		
	}
	
</script>
<div class="row">
	<form action="new_event_add" method="post" enctype="multipart/form-data">
		<div class="col-md-6 col-md-offset-3">
			<div class="box box-primary">				
				<div class="box-body padding-bottom-15">
					<div class="form-group has-feedback">
						<label>@lang("msg.Name")</label>
						<input type="text" class="form-control" name="event_name" required />
					</div>					
					<div class="form-group has-feedback">
						<label>@lang("msg.description") </label>
						<textarea class="form-control" name="event_description" type="text" rows="4" ></textarea>
					</div>
					<div class="form-group has-feedback">
						<label>@lang("msg.venue")</label>
						<input type="text" class="form-control" name="event_place" id="event_place" required />
					</div>
					<div class="form-group has-feedback">
						<label class="sm-heading">@lang("msg.start Date")</label>
						<input type="text" class="form-control" name="event_date" id="event_date" autocomplete="off"/>
						<script type="text/javascript"> $('#event_date').datepicker({format: 'yyyy-mm-dd',startDate: new Date()});</script> 
					</div>
					<div class="form-group has-feedback">
						<label class="sm-heading">@lang("msg.end Date")</label>
						<input type="text" class="form-control" name="event_end_date" id="event_end_date" autocomplete="off"/>
						<script type="text/javascript"> $('#event_end_date').datepicker({format: 'yyyy-mm-dd', startDate: new Date()});</script> 
					</div>
					<div class="form-group has-feedback">
						<label>@lang("msg.start Time")</label>
						<div class='input-group date' id='datetimepicker3' >
							<input type="text" name="event_time" id="event_time"  class="form-control timepicker" onchange="calculateEndTime();"/>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-time"></span>
							</span>
						</div>
					</div>
					
					<div class="form-group has-feedback" >
						<label>@lang("msg.duration")</label>
						<select name="duration" id="duration" class="form-control" onchange="calculateEndTime();">
							<option value="">Select duration</option>
							<option value="15">15</option>
							<option value="30">30</option>
							<option value="45">45</option>
							<option value="60">60</option>
						</select>
					</div>
					<div class="form-group has-feedback">
						<label>@lang("msg.end time")</label>
						<input type="text" class="form-control" name="end_time" id="end_time" readonly />
					</div>
					<div class="form-group has-feedback">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
            			<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">@lang("msg.Submit")</button>
            		</div>

					<div class="form-group has-feedback">
                        <a href="{{  url('activity_calendar') }}" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right:15px">@lang("msg.Cancel")</a>
            		</div>					
				</div>
			</div>
		</div>		
		<div class="col-md-10"></div>					
	</form>
</div>
<script type="text/javascript">
	$(".myselect").select2();
</script>
@include('layouts.partials.scripts_auth')

@endsection
