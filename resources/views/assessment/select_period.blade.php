
@extends('layouts.app')

@section('htmlheader_title')
    Assessment Period
@endsection
@section('contentheader_title')
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Assessment Period</strong></h3>
	</div>
	<div class="col-lg-4 pull-right">
        <div class="col-md-6">
              <select class="form-control" name="quicklink" id="quicklink" onchange="load_url()">
                    <option value="#" selected>Quick Links</option>
                    <option value="{{url('screening_view/'.$id)}}">Resident Details</option>
                    <option value="{{url('assessment_period/resident/'.$id)}}">Assessment History</option>
                    <option value="{{url('service_plan_period/'.$id)}}">Service Plan</option>
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
    	    @if($flag == "resident")
    			<a href="{{ url('resident_assessment') }}" class="btn btn-success btn-block btn-flat btn-width btn-sm pull-right" style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back</a>
    		@else
    			<a href="{{ url('initial_assessment') }}" class="btn btn-success btn-block btn-flat btn-width btn-sm pull-right" style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back</a>
    		@endif
        </div>
    </div>
	<!--<div class="col-lg-4">-->
	<!--	@if($flag == "resident")-->
	<!--		<a href="{{ url('resident_assessment') }}" class="btn btn-success btn-block btn-flat btn-width btn-sm pull-right" style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back</a>-->
	<!--	@else-->
	<!--		<a href="{{ url('initial_assessment') }}" class="btn btn-success btn-block btn-flat btn-width btn-sm pull-right" style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back</a>-->
	<!--	@endif-->
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
	.card{
	    border-radius:10px;
	    padding:100px;
	    background-color:rgb(49, 68, 84)!important;
	    text-align:center;
	}
	.card:hover{
	   background-color:#9e1c3f !important;
	}
	h3{
	    color:#fff !important;
	}
	.zoom {
  		transition: transform .2s; /* Animation */
  		/* margin: 0 auto; */
	}
	.zoom:hover {
		transform: scale(1.04); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
		font-size:1.5em;
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
								<img src="{{ asset('hsfiles/public/img/538642-user_512x512.png') }}" class="img-circle" width="40" height="40">
							@else
								<img src="{{ asset('hsfiles/public/img/'.$person->service_image) }}" class="img-circle" width="40" height="40">
							@endif
							<span class="text-success" style="color:aliceblue;"><strong>{{ $name[0] }} {{ $name[1] }} {{ $name[2] }}</strong>
						</h4>
				</td>				
				<td>
						<h4 class="text-center" style="margin-top:20px;">	<span class="text-center" style="color:aliceblue;"><strong>Room No: {{ $room_no }} </strong></span></h4>
				</td>
				<td>
						<h4><span class="pull-right" style="color:aliceblue;margin-top:10px;"><strong>Age: {{ $age }} </strong></span></h4>
				</td>
			</tr>
		</table>
	</div>
</div>
<div class="row">
    {{-- <a href="../../select_assessments/Initial/{{ $id }}">
	<div class="col-md-4">
	    <div class="panel-body box-body card zoom">
           <h3>Initial</h3>
        </div>
	</div>
	</a> --}}
	<a href="../../select_assessments/Monthly/{{ $id }}">
	<div class="col-md-4">
	    <div class="panel-body box-body card zoom">
           <h3>Monthly</h3>
        </div>
	</div>
	</a>
	<a href="../../select_assessments/Quarterly/{{ $id }}">
	<div class="col-md-4">
	    <div class="panel-body box-body card zoom ">
           <h3>Quarterly</h3>
        </div>
	</div>
	</a>
	<a href="../../select_assessments/HalfYearly/{{ $id }}">
	<div class="col-md-4">
	    <div class="panel-body box-body card zoom">
           <h3>Half-Yearly</h3>
        </div>
	</div>
	</a>
</div>
<div class="row" style="padding-top:30px;">
    {{-- <a href="../../select_assessments/HalfYearly/{{ $id }}">
	<div class="col-md-4">
	    <div class="panel-body box-body card zoom">
           <h3>Half-Yearly</h3>
        </div>
	</div>
	</a> --}}
	<a href="../../select_assessments/Annual/{{ $id }}">
	<div class="col-md-4">
	    <div class="panel-body box-body card zoom">
           <h3>Annual</h3>
        </div>
	</div>
	</a>
	<a href="../../select_assessments/Change-of-Condition/{{ $id }}">
	<div class="col-md-4">
	    <div class="panel-body box-body card zoom">
           <h3>Change Of Condition</h3>
        </div>
	</div>
	</a>
</div>
@include('quick_link.quicklink')
@endsection
@section('scripts-extra')
<script type="text/javascript" language="javascript" src="{{ asset('/js/rec/res_assessment.js') }}"></script>
@endsection