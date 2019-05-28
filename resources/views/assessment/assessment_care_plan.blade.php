
@extends('layouts.app')

@section('htmlheader_title')
    @lang("msg.Care Plan")
@endsection

@section('contentheader_title')
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>@lang("msg.Care Plan")</strong></h3>
		<h5><strong><span class="text-danger">@lang("msg.Date"):</span> <span style="color:blue;">{{date("d-m-Y",time())}}</span></strong></h5>
	</div>
	<div class="col-lg-4">
		<a href="" class="btn btn-success btn-block btn-flat btn-width btn-sm pull-right" style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>@lang("msg.Back")</a>
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
		margin-bottom: -10px;
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
@if(!$reports->isEmpty())
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">				
            <div class="box-body border padding-top-0 padding-left-right-0">
				<form action="{{url('save_care_plan')}}" method="post">
					<div class="table-responsive">
						<table class="table">
							<tbody>
								<input type="hidden" class="form-control" name="period" value="{{ $period }}" required />
								<input type="hidden" class="form-control" name="pros_id" value="{{ $id }}" required />
								
								<tr>
									<th class="th-position text-uppercase font-400 font-13"><b>@lang("msg.Assessment Done")</b></th>
									<th class="th-position text-uppercase font-400 font-13"><b>@lang("msg.Assessment score")</b></th>
								</tr>
								@foreach ($reports as $report)							
								<tr>
									<td><label>{{ $report->assessment_form_name }}</label></td>	
									<td><label>{{ $report->score }}</label></td>
								</tr>
								@endforeach
								<tr>
									<td><label>@lang("msg.Assessment Total Score")</label></td>
									<td>{{ $initial->score }}</td>								
								</tr>
								<tr>
									<td><label>@lang("msg.Care Plan Score")</label></td>
									<td><input type="number" class="form-control"  name="total_point" value="{{ $initial->score }}" required/></td>								
								</tr>
								<tr>
									<td><label>@lang("msg.Note")</label></td>
									<td><textarea class="form-control" name="care_plan_detail" type="text" placeHolder="Reason for editing the score" rows="3" required ></textarea></td>								
								</tr>						
							</tbody>
						</table>
					</div>
					<div>
						<div class="form-group has-feedback">
							<input type="hidden" id="csrf" name="_token" value="{{ csrf_token() }}">
							<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm" id="submit-button" style="margin-right: 5px;">@lang("msg.Submit")</button>
						</div>

						<div class="form-group has-feedback">
							<a href="{{ url('select_assessments/'.$period.'/'.$id) }}" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right: 15px;">@lang("msg.Cancel")</a>
						</div>
					</div><br/><br/>
				</form>				
			</div>                
		</div>
	</div>
</div>
@endif
@endsection
@section('scripts-extra')

@endsection