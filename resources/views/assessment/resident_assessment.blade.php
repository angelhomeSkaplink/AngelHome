
@extends('layouts.app')

@section('htmlheader_title')
    Prospective Info 
@endsection

@section('contentheader_title')
    <p class="text-danger"><b>Resident ASSESSMENT</b></p>
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
                    <table class="table">
                        <tbody>
    						<tr>								
    							<th class="th-position text-uppercase font-500 font-12">#</th>
    							<th class="th-position text-uppercase font-500 font-12">
    								<div class="autocomplete" style="width:200px;">
    									<input id="myInput" type="text" placeHolder="@lang('msg.Resident')">
    								</div>
    							</th>
    							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Phone No")</th>
    							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Add Assessment")</th>								
    							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Assessment History")</th>
    							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Next Assessment Date")</th>
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
								<td>{{ $n[0] }} {{ $n[1] }} {{ $n[2] }}</td>
    							<?php 
    								$basic = DB::table('change_pross_record')->where([['pros_id', $crm->id], ['status', 1]])->first();{
    							?>
    							<td>{{ $basic->phone_p }}</td>
    							<?php } ?>								
    							<input type="hidden" id="csrf" name="_token" value="{{ csrf_token() }}">
    							<td class="padding-left-45">
    								<a href="select_assessments/{{ $crm->id}}" class="material-icons material-icons gray md-22" style="background:transparent; border:none">add_circle_outline </button>
    							</td>
    							<td class="padding-left-45">
    								<a href="assessment_history/{{ $crm->id}}" class="material-icons material-icons gray md-22" style="background:transparent; border:none">history </button>
    							</td>
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