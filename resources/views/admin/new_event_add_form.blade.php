
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
		display:block;
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
	function set_emoji(code){
		document.getElementById("emoji_code").value = code;
		var showEmoji = document.getElementById('showEmojiId');
		showEmoji.innerHTML = "&#x"+code+";";	
		$('#myModal').modal('hide');
	}
	function DoSubmit(){
		var emoji_code = document.getElementById("emoji_code").value;
		if(emoji_code == ""){
			toastr.warning('Please add an emoji for the event.');
			document.getElementById('emoji_btn').focus();
			return false;
		}
	}
</script>
<div class="row">
	<form action="new_event_add" method="post" enctype="multipart/form-data">
		<div class="col-md-12">
			<div class="col-md-6">
				<div class="box box-primary">
					<div class="box-body">
					<div class="form-group has-feedback">
						<label>@lang("msg.Name")</label>
					<input type="text" class="form-control" name="event_name" value="" required />
					</div>
					<div class="form-group has-feedback form-inline">
						<a href="#modal" id="emoji_btn" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="material-icons md-36" style="color:#fff;"> add_circle </i> Add Emoji</a>
						<h2><span id="showEmojiId"></span></h2>
						<input type="text" class="form-control hidden" class="hidden" placeholder="Add an icon" value="" id="emoji_code" name="emoji_code" required />
					</div>
					<div class="form-group has-feedback">
						<label>@lang("msg.description") </label>
						<textarea class="form-control" name="event_description" type="text" rows="4" required ></textarea>
					</div>
					<div class="form-group has-feedback">
						<label>@lang("msg.venue")</label>
						<input type="text" class="form-control" name="event_place" id="event_place" required />
					</div>
					<div class="form-group has-feedback">
						<label>@lang("msg.Open To")</label>
						<select class="form-control" name="open_to" id="open_to">
						    <option value="0">@lang("msg.Residents")</option>
						    <option value="1">@lang("msg.Family & Friends")</option>
						</select>
					</div>
				</div>
			</div>
			</div>
			<div class="col-md-6">
				<div class="box box-primary">
					<div class="box-body">
					<div class="form-group has-feedback">
						<label>@lang("msg.start Date")</label>
						<input type="text" class="form-control" name="event_date" id="event_date" autocomplete="off" required/>
						<script type="text/javascript"> $('#event_date').datepicker({format: 'yyyy-mm-dd',startDate: new Date()});</script> 
					</div>
					<div class="form-group has-feedback">
						<label>@lang("msg.end Date")</label>
						<input type="text" class="form-control" name="event_end_date" id="event_end_date" autocomplete="off" required/>
						<script type="text/javascript"> $('#event_end_date').datepicker({format: 'yyyy-mm-dd', startDate: new Date()});</script> 
					</div>
					<div class="form-group has-feedback">
						<label>@lang("msg.start Time")</label>
						<div class='input-group date' id='datetimepicker3' >
							<input type="text" name="event_time" id="event_time"  class="form-control timepicker" onchange="calculateEndTime();" required/>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-time"></span>
							</span>
						</div>
					</div>
					
					<div class="form-group has-feedback" >
						<label>@lang("msg.duration")</label>
						<select name="duration" id="duration" class="form-control" onchange="calculateEndTime();" required>
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
						<button type="submit" onClick="DoSubmit();" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">@lang("msg.Submit")</button>
					</div>
					<div class="form-group has-feedback">
								<a href="{{  url('activity_calendar') }}" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right:15px">@lang("msg.Cancel")</a>
					</div>
				</div>
			</div>
			</div>
		</div>
		
	</form>
</div>	
		<div class="col-md-10"></div>					
	</form>
</div>
<div id="myModal" class="modal fade" role="dialog" style="z-index:9999999;">
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
										   <p style="font-size:1.3em;color:#b3b3b3;"><a href="#" onClick="set_emoji('<?php echo $emoji1->code ?>')">&#x{{$emoji1->code}}; {{$emoji1->title}}</a> <span class=""></span></p>
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
										   <p style="font-size:1.3em;color:#b3b3b3;"><a href="#" onClick="set_emoji('<?php echo $emoji2->code ?>')">&#x{{$emoji2->code}}; {{$emoji2->title}} </a><span class=""></span></p>
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
										   <p style="font-size:1.3em;color:#b3b3b3;"><a href="#" onClick="set_emoji('<?php echo $emoji3->code ?>')">&#x{{$emoji3->code}}; {{$emoji3->title}} </a> <span class=""></span></p>
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
										 <p style="font-size:1.3em;color:#b3b3b3;"><a href="#" onClick="set_emoji('<?php echo $emoji4->code ?>')">&#x{{$emoji4->code}}; {{$emoji4->title}} </a><span class=""></span></p>
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
										   <p style="font-size:1.3em;color:#b3b3b3;"><a href="#" onClick="set_emoji('<?php echo $emoji5->code ?>')">&#x{{$emoji5->code}}; {{$emoji5->title}} </a> <span class=""></span></p>
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
										   <p style="font-size:1.3em;color:#b3b3b3;"><a href="#" onClick="set_emoji('<?php echo $emoji6->code ?>')">&#x{{$emoji6->code}}; {{$emoji6->title}} </a><span class=""></span></p>
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
										 <p style="font-size:1.3em;color:#b3b3b3;"><a href="#" onClick="set_emoji('<?php echo $emoji7->code ?>')">&#x{{$emoji7->code}}; {{$emoji7->title}} </a> <span class=""></span></p>
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
										 <p style="font-size:1.3em;color:#b3b3b3;"><a href="#" onClick="set_emoji('<?php echo $emoji8->code ?>')">&#x{{$emoji8->code}}; {{$emoji8->title}} </a><span class=""></span></p>
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
										 <p style="font-size:1.3em;color:#b3b3b3;"><a href="#" onClick="set_emoji('<?php echo $emoji9->code ?>')">&#x{{$emoji9->code}}; {{$emoji9->title}} </a><span class=""></span></p>
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
										 <p style="font-size:1.3em;color:#b3b3b3;"><a href="#" onClick="set_emoji('<?php echo $emoji10->code ?>')">&#x{{$emoji10->code}}; {{$emoji10->title}} </a><span class=""></span></p>
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
