
@extends('layouts.app')

@section('htmlheader_title')
    @lang("msg.Service Plan")
@endsection

@section('contentheader_title')
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>@lang("msg.Service Plan Details")</strong></h3>
	</div>
	<div class="col-lg-4">
		<a class="btn btn-success btn-block btn-flat btn-width btn-sm " style="margin-right:15px;border-radius:5px;" onclick="history.back();"><i class="material-icons">keyboard_arrow_left</i>@lang("msg.Back")</a>
	</div>
</div>
@endsection

@section('main-content')
<style>
	.content-header{
		padding: 2px 0px 1px 20px;
		margin-bottom: -18px;
	}
	.content {
		margin-top: 15px;
	}
</style>
@php
$person = DB::table('sales_pipeline')->where('id',$id)
			->join('resident_details','sales_pipeline.id','=','resident_details.pros_id')
			->first();
$room = DB::table('resident_room')
		->join('facility_room','resident_room.room_id','=','facility_room.room_id')
		->where([['resident_room.pros_id',$id],['resident_room.status',1]])->first();
if($room){
	$room_no = $room->room_no;
}
else{
	$room_no = "No Room Booked";
}
if($person){
	$age = (date('Y') - date('Y',strtotime($person->dob)))." years";
}
else{
	$person = DB::table('sales_pipeline')->where('id',$id)->first();
	$age = "Not specified";
}
$name =  explode(",",$person->pros_name);
@endphp
<div class="row" >
	<div class="col-lg-12 table-responsive">
		<table class="table">
			<tr style="background-color:rgb(49, 68, 84) !important;margin:0.5px;">
				<td>
					<h4>@if($person->service_image == null)
							<img src="{{ asset('/hsfiles/public/img/538642-user_512x512.png') }}" class="img-circle" width="40" height="40">
						@else
							<img src="{{ asset('/hsfiles/public/img/'.$person->service_image) }}" class="img-circle" width="40" height="40">
						@endif
						<span class="text-success" style="color:aliceblue;"><strong>{{ $name[0] }} {{ $name[1] }} {{ $name[2] }}</strong>
					</h4>
				</td>				
				<td>
					<h4 class="text-center" style="margin-top:20px;">	<span class="text-center" style="color:aliceblue;"><strong>@lang("msg.Room No"): {{ $room_no }} </strong></span></h4>
				</td>
				<td>
					<h4><span class="pull-right" style="color:aliceblue;margin-top:10px;"><strong>@lang("msg.Age"): {{ $age }} </strong></span></h4>
				</td>
			</tr>
		</table>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary border-light-blue">			
			<div class="box-body padding-top-5">
				@if(count($reports)<=0)
					<p class="text-danger"><b>&nbsp;&nbsp;@lang("msg.No Assessment Record Found")</b></p>
				@endif
				@if(count($reports)>0)
				<div class="table-responsive">
					<table class="table table-striped">
						<tbody>
							<tr style="background-color:rgba(0, 0, 0, 0.87);color:aliceblue;">
								<th class="th-position text-uppercase font-500 font-12"><strong>@lang("msg.Assessment")</strong></th>								
								<th class="th-position text-uppercase font-500 font-12"><strong>@lang("msg.Date")</strong></th>	
								<th class="th-position text-uppercase font-500 font-12"><strong>@lang("msg.Point")</strong></th>
								<th class="th-position text-uppercase font-500 font-12 text-center"><span class="pull-right" style="margin-right:15px;"><strong>@lang("msg.Action")</strong></span></th>
							</tr>
							@foreach ($reports as $report)
							<tr>
								<td><i class="material-icons">library_books</i> &nbsp; {{ $report->assessment_form_name }}</td>
								<td>{{ $report->assessment_date }}</td>
								<td>{{ $report->score }}</td>
								<td class="text-center" width="12%"><a class="btn btn-default btn-block" href="../../../history/{{$report->pros_id}}/{{$report->id}}"><i class="material-icons md-22"> visibility </i>@lang("msg.View")</a></span></td>
							</tr>
							@endforeach
							<tr style="background-color: #e3e3e3;color:black">
								<td><label><strong>@lang("msg.Total Assessment score")</strong></label></td>
								<td></td>
								<td><strong>{{ $total_score }}</strong></td>	
								<td></td>
							</tr>
						</tbody>
					</table>
				</div>
				@endif
			</div>
		</div>
	</div>
	@if(count($reports)>0)
	<br/>
	<div class="col-md-12"><h4 class="font-500 text-uppercase font-15">@lang("msg.Service Plan Details")</h4></div>
	<div class="col-md-12">
		<div class="box box-primary border-light-blue">			
			<div class="box-body padding-top-5">
				<div class="table-responsive">
					<table class="table">
						<tbody>	
							<tr style="background-color:rgba(0, 0, 0, 0.87);color:aliceblue;">
								<th>@lang("msg.Service Plan Total Score")(@lang("msg.From All Assessments"))</th>
								<th>@lang("msg.Note")</th>
								<th>@lang("msg.Resident Service Plan")</th>
								<th>@lang("msg.Price")</th>
							</tr>	
							<tr>
								<td>{{ $cp_data->total_point }}</td>
								<td>{{ $cp_data->care_plan_detail }}</td>
								<td>{{ $service_plan->service_plan_name }}</td>
								<td>$ {{ $service_plan->price }}</td>
							</tr>	
						</tbody>
					</table>
				</div>
			</div>
		</div>		
	</div>
	@endif
</div>
@include('layouts.partials.scripts_auth')

@endsection
