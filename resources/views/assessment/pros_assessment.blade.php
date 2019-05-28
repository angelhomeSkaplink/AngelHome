@extends('layouts.app')

@section('htmlheader_title')
    Resident Assessment
@endsection

@section('contentheader_title')
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
	<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>{{$flag}} Assessment</strong></h3>
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
		//display:none;
		padding: 2px 0px 1px 20px;
		margin-bottom: -10px;
	}
	.content {
		margin-top: 15px;
	}
</style>
<link href="{{ asset('/css/type_ahead.css') }}" rel="stylesheet" type="text/css"/>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">				
            <div class="box-body border padding-top-0 padding-left-right-0">
				<div class="table-responsive">
					<table class="table table-striped">
						<tbody>
							<tr style="background-color:rgb(49, 68, 84) !important;">								
								<th class="th-position text-uppercase font-500 font-12"><h5 style="color:aliceblue !important;"><strong>#</strong></h5></th>
								<th class="th-position text-uppercase font-500 font-12">
									<div class="autocomplete" style="width:200px;">
										<input id="myInput" type="text" placeHolder="@lang('msg.Resident')">
									</div>
								</th>
								<th class="th-position text-uppercase font-500 font-12"><h5 style="color:aliceblue !important;"><strong>@lang("msg.Phone No")</strong></h5></th>
								<th class="th-position text-uppercase font-500 font-12"><h5 style="color:aliceblue !important;"><strong>@lang("msg.Next Assessment Date")</strong></h5></th>
								<th class="th-position text-uppercase font-500 font-12"><h5 style="color:aliceblue !important;"><strong>@lang("msg.Assessment History")</strong></h5></th>
								<th class="th-position text-uppercase font-500 font-12"><h5 class="pull-right" style="color:aliceblue !important;"><strong>Action</strong></h5></th>								
							</tr>
							@foreach ($crms as $crm)
							@php
							$n = explode(",",$crm->pros_name);
							@endphp
							<tr>
								<input type="hidden" class="form-control" value="{{ $crm->id }}" name="id"/>
								@if($crm->service_image == NULL)
								<td><img src="hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>	
								@else
								<td><img src="hsfiles/public/img/{{ $crm->service_image }}" class="img-circle" width="40" height="40"></td>
								@endif
								<td><strong>{{ $n[0] }} {{ $n[1] }} {{ $n[2] }}</strong></td>
								<?php 
									$basic = DB::table('change_pross_record')->where([['pros_id', $crm->id], ['status', 1]])->first();{
								?>
								<td>{{ $basic->phone_p }}</td>
								<?php } ?>							
								<?php
									$status = DB::table('resident_assessment')->where([['pros_id', $crm->id], ['resident_assessment.assessment_status', 1]])->first();
									if(!$status){
								?>
								<td class="text-danger"><b>@lang("msg.No Assessment Done")</b></td>
								<?php } else{
									$today = date("Y-m-d");
									$next_date = DB::table('next_assessment')->where([['pros_id', $crm->id], ['next_assessment.assessment_status', 1]])->first();
									if(!$next_date){
								?>
								<td class="text-danger"><b>@lang("msg.No Next Assessment Date Found")</b></td>
								<?php } else{
									$max_date = $next_date->next_assessment_date;
									$diff = date_diff(date_create($max_date),date_create($today));
									$diff = $diff->days;
									if($diff>=30){
								?>
								<td class="text-success"><b>@lang("msg.Next Assessment Date")= {{ $next_date->next_assessment_date }}</b></td>
								<?php }elseif($diff<30 && $diff>0){ ?>
								<td class="text-warning"><b>@lang("msg.Next Assessment Date") = {{ $next_date->next_assessment_date }}</b></td>
								<?php } elseif($diff==0){?>
								<td class="text-danger"><b>@lang("msg.Next Assessment Date") = {{ $next_date->next_assessment_date }}</b></td>
								<?php } } } ?>
								<td class="padding-left-45">
									<a href="assessment_period/{{$flag}}/{{ $crm->id}}" class="material-icons material-icons gray md-22" style="background:transparent; border:none">history </button>
								</td>
								<td class="padding-left-15">										
									<span class="pull-right"><a class="btn btn-default" href="{{ url('select_assessments/Initial/'.$crm->id) }}"><i class="material-icons material-icons gray md-22"> add_circle_outline </i> Add</a></span>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="text-center">{{ $crms->links() }}</div>
            </div>                
        </div>
    </div>
</div>
@endsection
@section('scripts-extra')
<script type="text/javascript" language="javascript" src="{{ asset('/js/rec/res_assessment.js') }}"></script>
@endsection