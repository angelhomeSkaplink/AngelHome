
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
						{{-- <label>@lang("msg.Name")</label> --}}
						<a href="#modal" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="material-icons md-36" style="color:#fff;"> add_circle </i> Add Emoji</a>
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
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
			<div class="modal-header" style="background-color:#1a1a1a;">
				<button type="button" class="close" data-dismiss="modal"><span style="color:#fff;">&times;</span></button>
				<h4 class="modal-title"><span style="color:#fff;">&#x1F605; Add Emoji to the EVENT!</span></h4>
			</div>
			<div class="modal-content">
				<div class="modal-body">
						<div class="panel panel-default">
								<div class="panel-body">
								  <div class="row">
									  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
										<h4><strong><u>Smileys & People</u></strong></h4>
										<?php
											$data1 = DB::table('emoji_library')->select('emoji_library.*')->where('category','=',1)->get();
										?>
										@if($data1->isEmpty())
										  <p style="font-size:0.8em;color:#b3b3b3;">Not available</p>
										@else
										  @foreach($data1 as $emoji1)
										   <p style="font-size:1.3em;color:#b3b3b3;">&#x{{$emoji1->code}}; {{$emoji1->title}} <span class=""></span></p>
										  @endforeach
										@endif
									  </div>
									  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
										<h4><strong><u>Animals & Nature</u></strong></h4>
										<?php
											$data2 = DB::table('emoji_library')->select('emoji_library.*')->where('category','=',2)->get();
										?>
										@if($data2->isEmpty())
										  <p style="font-size:0.8em;color:#b3b3b3;">Not available</p>
										@else
										  @foreach($data2 as $emoji2)
										   <p style="font-size:1.3em;color:#b3b3b3;">&#x{{$emoji2->code}}; {{$emoji2->title}} <span class=""></span></p>
										  @endforeach
										@endif
									  </div>
									  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
										<h4><strong><u>Food & Drink</u></strong></h4>
										<?php
											$data3 = DB::table('emoji_library')->select('emoji_library.*')->where('category','=',3)->get();
										?>
										@if($data3->isEmpty())
										  <p style="font-size:0.8em;color:#b3b3b3;">Not available</p>
										@else
										  @foreach($data3 as $emoji3)
										   <p style="font-size:1.3em;color:#b3b3b3;">&#x{{$emoji3->code}}; {{$emoji3->title}}  <span class=""></span></p>
										  @endforeach
										@endif
									  </div>
					  
								  </div>
								  <div class="row">
									<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
									  <h4><strong><u>Activity</u></strong></h4>
									  <?php
										  $data4 = DB::table('emoji_library')->select('emoji_library.*')->where('category','=',4)->get();
									  ?>
									  @if($data4->isEmpty())
										<p style="font-size:0.8em;color:#b3b3b3;">Not available</p>
									  @else
										@foreach($data4 as $emoji4)
										 <p style="font-size:1.3em;color:#b3b3b3;">&#x{{$emoji4->code}}; {{$emoji4->title}} <span class=""></span></p>
										@endforeach
									  @endif
									</div>
									  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
										<h4><strong><u>Travel & Places</u></strong></h4>
										<?php
											$data5 = DB::table('emoji_library')->select('emoji_library.*')->where('category','=',5)->get();
										?>
										@if($data5->isEmpty())
										  <p style="font-size:0.8em;color:#b3b3b3;">Not available</p>
										@else
										  @foreach($data5 as $emoji5)
										   <p style="font-size:1.3em;color:#b3b3b3;">&#x{{$emoji5->code}}; {{$emoji5->title}} <span class=""></span></p>
										  @endforeach
										@endif
									  </div>
									  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
										<h4><strong><u>Objects</u></strong></h4>
										<?php
											$data6 = DB::table('emoji_library')->select('emoji_library.*')->where('category','=',6)->get();
										?>
										@if($data6->isEmpty())
										  <p style="font-size:0.8em;color:#b3b3b3;">Not available</p>
										@else
										  @foreach($data6 as $emoji6)
										   <p style="font-size:1.3em;color:#b3b3b3;">&#x{{$emoji6->code}}; {{$emoji6->title}} <span class=""></span></p>
										  @endforeach
										@endif
									  </div>
					  
					  
								  </div>
								  <div class="row">
									<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
									  <h4><strong><u>Symbols</u></strong></h4>
									  @php
										  $data7 = DB::table('emoji_library')->select('emoji_library.*')->where('category','=',7)->get();
									  @endphp
									  @if($data7->isEmpty())
										<p style="font-size:0.8em;color:#b3b3b3;">Not available</p>
									  @else
										@foreach($data7 as $emoji7)
										 <p style="font-size:1.3em;color:#b3b3b3;">&#x{{$emoji7->code}}; {{$emoji7->title}} <span class=""></span></p>
										@endforeach
									  @endif
									</div>
									<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
									  <h4><strong><u>Flags</u></strong></h4>
									  <?php
										  $data8 = DB::table('emoji_library')->select('emoji_library.*')->where('category','=',8)->get();
									  ?>
									  @if($data8->isEmpty())
										<p style="font-size:0.8em;color:#b3b3b3;">Not available</p>
									  @else
										@foreach($data8 as $emoji8)
										 <p style="font-size:1.3em;color:#b3b3b3;">&#x{{$emoji8->code}}; {{$emoji8->title}} <span class=""></span></p>
										@endforeach
									  @endif
									</div>
									<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
									  <h4><strong><u>Skin Tones</u></strong></h4>
									  <?php
										  $data9 = DB::table('emoji_library')->select('emoji_library.*')->where('category','=',9)->get();
									  ?>
									  @if($data9->isEmpty())
										<p style="font-size:0.8em;color:#b3b3b3;">Not available</p>
									  @else
										@foreach($data9 as $emoji9)
										 <p style="font-size:1.3em;color:#b3b3b3;">&#x{{$emoji9->code}}; {{$emoji9->title}} <span class=""></span></p>
										@endforeach
									  @endif
									</div>
								  </div>
								  <div class="row">
									<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
									  <h4><strong><u>Uncategorized</u></strong></h4>
									  <?php
										  $data10 = DB::table('emoji_library')->select('emoji_library.*')->where('category','=',10)->get();
									  ?>
									  @if($data10->isEmpty())
										<p style="font-size:0.8em;color:#b3b3b3;">Not available</p>
									  @else
										@foreach($data10 as $emoji10)
										 <p style="font-size:1.3em;color:#b3b3b3;">&#x{{$emoji10->code}}; {{$emoji10->title}} <span class=""></span></p>
										@endforeach
									  @endif
									</div>
								  </div>
								</div>
							</div>
				</div>
			</div>
	</div>
</div>
{{-- @include('layouts.partials.scripts_auth') --}}

@endsection
