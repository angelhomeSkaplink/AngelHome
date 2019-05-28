@extends('layouts.app')

@section('htmlheader_title')
    @lang("msg.Service Plan View")
@endsection

@section('contentheader_title')
<div class="row">
		<div class="col-lg-4 col-lg-offset-4 text-center">
		  <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>@lang("msg.Service Plan View")</strong></h3>
		</div>
		<div class="col-lg-4 pull-right">
            <div class="col-md-6">
              <select class="form-control" name="quicklink" id="quicklink" onchange="load_url()">
                <option value="#" selected>Quick Links</option>
                <option value="{{url('screening_view/'.$id)}}">Resident Details</option>
                <option value="{{url('assessment_period/resident/'.$id)}}">Assessment History</option>
                <option value="{{url('select_period/resident/'.$id)}}">Assessment</option>
                <option value="{{url('all_tsp/'.$id)}}">Temporary Service Plan</option>
                <option value="{{url('change_own_room/'.$id)}}">Room Book</option>
                <option value="{{url('injury_history/'.$id)}}">Incident</option>
                <option value="{{url('medication_incident_resident_report/'.$id)}}">Medication Incident</option>
                <option value="{{url('checkup/'.$id)}}">Vital Statistics</option>take_note
                <option value="{{url('take_note/'.$id)}}">Notes</option>
                <option value="{{url('set_task/'.$id)}}">Set Tasksheet</option>
              </select>
            </div>
            <div class="col-md-6">
			    <a href="../resident_service_plan" class="btn btn-success btn-block btn-flat btn-width btn-sm " style="margin-right:15px;border-radius:5px;" onclick="history.back();"><i class="material-icons">keyboard_arrow_left</i>@lang("msg.Back")</a>
            </div>
        </div>
		<!--<div class="col-lg-4">-->
		<!--	<a href="../resident_service_plan" class="btn btn-success btn-block btn-flat btn-width btn-sm " style="margin-right:15px;border-radius:5px;" onclick="history.back();"><i class="material-icons">keyboard_arrow_left</i>@lang("msg.Back")</a>-->
		<!--</div>-->
	</div>
@endsection

@section('main-content')
<style>
	.wickedpicker{
		z-index:999 !important;
	}
	.content-header
	{
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
    ->where([['pros_id', $id],['release_date',null]])
    ->first();
    if($room == null){
      $room = DB::table('resident_room')
    ->where([['pros_id', $id],['release_date','>',date('Y-m-d')]])
    ->orderby('release_date','dsc')
    ->first();
        }
if($room){
  $room_no = DB::table('facility_room')->where('room_id',$room->room_id)->first();
	$room_no = $room_no->room_no;
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
<div class="row" style="margin-bottom:0px;" >
	<div class="col-lg-12 " >
		<table class="table">
			<tr style="background-color:rgb(49, 68, 84) !important;margin:0.5px;">
				<td>
					<h4>@if($person->service_image == null)
							<img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40">
						@else
							<img src="../hsfiles/public/img/{{ $person->service_image }}" class="img-circle" width="40" height="40">
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
	<div class="col-lg-12">
		<h4><strong>@lang("msg.Current Service Plan")</strong> </h4>
	</div>
</div>
<div class="row" style="margin:0.5px;">
<div class="box box-primary ">   
	<h4 class="margin-0" style="padding:15px;margin:0px;"><b class="text-success">{{ $query->service_plan_name }}</b>	
	<span><b class="pull-right text-success">@lang("msg.Price"): ${{$query->price}}</b></span>
	</h4>    
 
</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<h4><strong>@lang("msg.Service Plan History")</strong></h4>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
        <div class="box box-primary border">				
            <div class="box-body border padding-top-0 padding-left-right-0">
				<div class="table-responsive">
					<table class="table table-striped">
						<tbody>
							<tr style="background-color:rgb(49, 68, 84) !important;">
								<th class="th-position text-uppercase font-500 font-12"><h6 style="color:aliceblue !important;"><strong>@lang("msg.Period")</strong></h6></th>							
								<th class="th-position text-uppercase font-500 font-12"><h6 style="color:aliceblue !important;"><strong>@lang("msg.Date")</strong></h6></th>						
								<th class="th-position text-uppercase font-500 font-12"><h6 class="pull-right" style="color:aliceblue !important;margin-right:15px;"><strong>@lang("msg.Action")</strong></h6></th>
							</tr>
							@foreach ($all_care as $ac)
							<tr>
								<td><strong>{{ $ac->period }}</strong></td>
								<td><strong>{{ $ac->date }}</strong></td>
								<td><span class="pull-right"><a href="../view_plan_details/{{ $ac->pros_id }}/{{$ac->care_plan_id}}" class="btn btn-default"><i class="material-icons md-22"> visibility </i>@lang("msg.View")</a></span></td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>					
            </div>                
        </div>
    </div>
</div>
@include('quick_link.quicklink')
@endsection
@section('scripts-extra')
<script type="text/javascript" language="javascript" src="{{ asset('/js/rec/res_assessment.js') }}"></script>
@endsection