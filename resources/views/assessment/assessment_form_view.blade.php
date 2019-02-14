@extends('layouts.app')

@section('htmlheader_title')
   Assessment Forms
@endsection

@section('contentheader_title')
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Assessment</strong></h3>
	</div>
	<div class="col-lg-4">
		<a href="../../../../select_assessments/{{ $period }}/{{ $id }}" class="btn btn-success btn-block btn-flat btn-width btn-sm pull-right" style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back</a>
	</div>
</div>
@endsection

@section('main-content')
<style>
	.content-header{
		padding: 2px 0px 1px 20px;
		margin-bottom: -10px;
	}
	.content{
		margin-top: 15px;
	}
	.sv_header h3{
		font-size: 1.1em !important;
		font-weight: bold !important;
	}
	.sv_page_title{
	    font-size: 1.1em !important;
	}
</style>
<script>
	var assessment = {!! $assessment !!} 
</script>
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
								<img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40">
							@else
								<img src="../hsfiles/public/img/{{ $person->service_image }}" class="img-circle" width="40" height="40">
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
    <div class="col-md-12">
        <div class="box box-primary border">
            <div class="box-body border padding-top-0 padding-left-right-0">
                <div>
					<div id="surveyElement"></div>
					<input type="hidden" class="form-control" id="assessment_period" name="assessment_period" value="{{ $period }}" />
					<input type="hidden" class="form-control" id="care_plan_date" name="care_plan_date" value="{{ $cur_date }}" />
					<input type="hidden" class="form-control" id="pros_id" name="pros_id" value="{{ $id }}" />
					<input type="hidden" id="csrf" name="_token" value="{{ csrf_token() }}">
				</div>				
            </div>                
        </div>
    </div>
</div>
@endsection
@section('scripts-extra')
<script>
	var pros_id = {!! $id !!}
	var assessment_id = {!! $assessment !!}
	var storageName = "SurveyJS_LoadState";
	var timerId = 0;
	function loadState(survey) {		
		$.ajax({
			url: "../../../../find_assessment/"+assessment_id.assessment_id+"/"+pros_id,
			method: "GET",
			success: function(data) {
				var data = JSON.parse(data);
				console.log(data);
				storageSt = data.assessment_json;			
				var res = {};
				if (storageSt)
					res = JSON.parse(storageSt);					
				else 
					res = {
						currentPageNo: 0,
						data: {
						},
						id: {!! $id !!}
					};
				
				if (res.currentPageNo) 
					survey.currentPageNo = res.currentPageNo;
				if (res.data) 
					survey.data = res.data;
				if (res.id) 
					survey.id = res.id;
			},
		});
	}		
	function saveState(survey) {
		console.log(survey);
		var res = {
			currentPageNo: survey.currentPageNo,
			data: survey.data,
			id: survey.id
		};
		window
			.localStorage
			.setItem(storageName, JSON.stringify(res));
		
		var surveyId = assessment_id.assessment_id;	
		var prosId = {!! $id !!};
		var csrf = $('#csrf').val();
		var url =  "{!! url('save_temporary_json') !!}";
		var answer = JSON.stringify(res.data);
		answer = JSON.parse(answer);
		$.post( url,{ 
			surveyId: surveyId, 
			answer: {data:answer},
			score: 0,
			point: 0,
			prosId: prosId,
			_token: csrf			
		})
		console.log("You are Here "+JSON.stringify(res));
	}
	survey
		.onCurrentPageChanged
		.add(function (survey, options) {
			saveState(survey);
		});
	survey
		.onComplete
		.add(function (survey, options) {
			clearInterval(timerId);
			saveState(survey);
		});

	loadState(survey);

	timerId = window.setInterval(function () {
		saveState(survey);
	}, 100000000000);
	survey.render("surveyElement");
</script>
@endsection

