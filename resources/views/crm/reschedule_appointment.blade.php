@extends('layouts.app')

@section('htmlheader_title')
    @lang("msg.Resident Add")
@endsection

@section('contentheader_title')
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Reschedule Appointment</strong></h3>
	</div>
	<div class="col-lg-4 pull-right">
    <div class="col-md-6">
      <select class="form-control" name="quicklink" id="quicklink" onchange="load_url()">
        <option value="#" selected>Quick Links</option>
        <option value="{{url('change_records/'.$row->pros_id)}}">Inquiry</option>
        <option value="{{url('change_pro_records/'.$row->pros_id)}}">Sales Pipeline</option>
        <option value="{{url('screening/'.$row->pros_id)}}">Screening</option>
        <option value="{{url('select_assessments/Initial/'.$row->pros_id)}}">Assessment</option>
        <option value="{{url('change_own_room/'.$row->pros_id)}}">Room Book</option>
      </select>
    </div>
    <div class="col-md-6">
		<a href="../appointment_schedule" class="btn btn-success btn-block btn-flat btn-width btn-sm pull-right" style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back</a>
    </div>
  </div>
</div>

@endsection

@section('main-content')
<style>
	.wickedpicker{
		z-index:999 !important;
	}
	.content-header{
		padding: 2px 0px 1px 20px;
		margin-bottom: -18px;
	}

</style>
@php
$n=explode(",",$pros->pros_name);
@endphp
<div class="row" style="background-color:rgb(49, 68, 84) !important;margin:0.5px;">
	<div class="col-lg-12">
		<h4>@if($pros->service_image == NULL)
			<img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40">
		@else
			<img src="../hsfiles/public/img/{{ $pros->service_image }}" class="img-circle" width="40" height="40">
		@endif
		<span class="text-success" style="color:aliceblue;"><strong>{{ $n[0] }} {{ $n[1] }} {{ $n[2] }}</strong>
		</h4>
	</div>
</div>
<div class="row">	
	<form action="{{action('ProspectiveController@change_appointment')}}" method="post">					
	<input type="hidden" name="_method" value="PATCH">
	{{ csrf_field() }}
	
	<div class="col-md-6 col-md-offset-3">
		<div class="box box-primary">			
			<div class="box-body padding-bottom-25">			
				
				<input type="hidden" class="form-control" name="appoiuntment_id" value="{{ $row->appoiuntment_id }}"  />
				<input type="hidden" class="form-control" value="{{ $row->pros_id }}" name="pros_id" />
				
				<div class="form-group has-feedback">
					<label>@lang("msg.Appointment Date")</label>
					<input type="text" class="form-control" placeholder="Appointment Date" name="appointment_date" id="appointment_date" value="{{ $row->appointment_date }}" required
					oninvalid="this.setCustomValidity('Required Field')"
					oninput="this.setCustomValidity('')" 
					autocomplete="off"/>
					<script type="text/javascript"> $('#appointment_date').datepicker({format: 'yyyy/mm/dd'});</script> 
				</div>
				
				<div class="form-group has-feedback">
					<label>@lang("msg.Appointment Time")</label>
					<div class='input-group date' id='datetimepicker3' style="width:100%">
						<input type="text" name="appointment_time" value="{{ $row->appointment_date }}" class="form-control timepicker" />
						<!-- <span class="input-group-addon">
							<i class="material-icons gray md-22"> watch_later </i> 
						</span> -->
					</div>
				</div>
				<div class="form-group has-feedback">
					<label>@lang("msg.Comment") </label>
					<textarea class="form-control" name="comments" type="text" rows="4" placeholder=""></textarea>
				</div>
				<div class="form-group has-feedback">
					<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">@lang("msg.Submit")</button>
				</div>

				<div class="form-group has-feedback">
					<a href="{{  url('appointment_schedule') }}" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right:15px">@lang("msg.Cancel")</a>
				</div><br/><br/><br/>
				
			</div>
		</div>
	</div>	
	
	</form>
</div>
@include('quick_link.quicklink')
@endsection
