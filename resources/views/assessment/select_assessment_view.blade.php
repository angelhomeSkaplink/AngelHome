
@extends('layouts.app')

@section('htmlheader_title')
    SELECT ASSESSMENT
@endsection

@section('contentheader_title')   
	<div class="row">
		<div class="col-lg-4 col-lg-offset-4 text-center">
			<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Assessments</strong></h3>
			<span class="text-danger"><strong>Period: <span style="color:#0047b3;">{{$period}}</span></strong></span>
		</div>
		<div class="col-lg-4">
			@php
			$status = array();
			foreach($status_array as $sa){
				array_push($status,$sa->status);
			}
		@endphp
		@if(!in_array("Work in progress",$status) && in_array("Done",$status))
		<a href="../../care_plan/{{ $id }}/{{ $period }}" class="btn btn-primary  btn-flat   pull-right" style="margin-right:15px;border-radius:5px;"><strong><i class="material-icons material-icons md-22"> add_circle_outline </i> @lang("msg.Care Plan")</strong></a>
		@else		
		<a href="javascript:ShowWarning()" class="btn btn-primary  btn-flat   pull-right" style="margin-right:15px;border-radius:5px;"><strong><i class="material-icons material-icons md-22"> add_circle_outline </i> @lang("msg.Care Plan")</strong></a>
		@endif
		<a class="btn btn-success btn-block btn-flat btn-width btn-sm pull-right" style="margin-right:15px;border-radius:5px;" onclick="history.back();"><strong><i class="material-icons">keyboard_arrow_left</i>@lang("msg.Back")</strong></a>
		</div>
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
@if(!empty(Session::get('error_code')) && Session::get('error_code') == 5)
    <script type="text/javascript">
        $(document).ready(function() {
			console.log('HI');
			//alert('You must done the assessment first.');
            $('#popupmodal').modal();
        });
    </script>
    <div id="popupmodal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>Notification: Please read</h3>
        </div>
        <div class="modal-body">
            <p>
                {{ Session::get('error_code') }}
            </p>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">@lang("msg.Close")</button>
        </div>
    </div>
@endif
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">
			<div class="box-header with-border col-sm-2 pull-right"></div>
            <div class="box-body border padding-top-0 padding-left-right-0">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
    						<tr style="background-color:rgb(49, 68, 84) !important;color:aliceblue;">
								<th class="th-position text-uppercase font-500 font-12"><strong>@lang("msg.Assessments")</strong></th>
								<th class="th-position text-uppercase font-500 font-12"><strong>@lang("msg.Status")</strong></th>
    							<th class="th-position text-uppercase font-500 font-12"><span class="pull-right" style="padding-right:20px;"><strong>Action</strong></span></th>
    							
    						</tr>
    						@foreach ($assessments as $key => $assessment)
    						<tr>
    							<td><i class="material-icons">library_books</i><strong>&nbsp; {{ $assessment->assessment_form_name }}</strong></td>
    							{{-- <!--<td><a href="../assessment_choose/{{ $assessment->assessment_id }}/{{ $id }}"><i class="material-icons material-icons gray md-22"> edit </i></a></td>--> --}}
    															
							<td style="color:{{$status_array[$key]->color}};">
									<strong>{{$status_array[$key]->status}}</strong>
								</td>
								<td>
    								<span class="pull-right"><a class="btn btn-default" href="../../assessment_choose/{{ $assessment->assessment_id }}/{{ $period }}/{{ $id }}/{{ $cur_date }}"><i class="material-icons material-icons gray md-22"> add_circle_outline </i> Add</a></span>
    							</td>
    						</tr>
    						@endforeach
                        </tbody>
                    </table>
                </div>
            </div>                
        </div>
    </div>
</div>
@endsection
@section('scripts-extra')
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
<script teype="text/javascript">
	function ShowWarning(){
		toastr.optionsOverride = 'positionclass = "toast-bottom-right"';
        toastr.options.positionClass = 'toast-bottom-right';
        toastr.warning('Please complete the assessment', 'Warning', 'positionclass = "toast-bottom-right"');
	}
</script>
@endsection