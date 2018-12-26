
@extends('layouts.app')

@section('htmlheader_title')
    Prospective Info 
@endsection

@section('contentheader_title')
    <p class="text-danger"><b>resident Info</b></p>
@endsection

@section('main-content')
<style>	
	.content-header
	{
		padding: 2px 0px 1px 20px;
		margin-bottom: -18px;
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
    									<input id="myInput" type="text" placeHolder="@lang('msg.RESIDENT')">
    								</div>
    							</th>
    							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Phone No")</th>
    							<th class="th-position text-uppercase font-500 font-12">
    								<div class="emailautocomplete" style="width:200px;">
    									<input id="emailInput" type="text" placeHolder="@lang('msg.Email')">
    								</div>
    							</th>
    							<th class="th-position text-uppercase font-500 font-12">
    								<div class="contactautocomplete" style="width:200px;">
    									<input id="contactInput" type="text" placeHolder="@lang('msg.Contact Person')">
    								</div>
    							</th>
    							<th class="th-position text-uppercase font-500 font-12">@lang("msg.View Plan Details")</th>
    						</tr>
							@foreach ($crms as $crm)
							@php
								$n = explode(",",$crm->pros_name);
								$m = explode(",",$crm->contact_person);
							@endphp
    						<tr>
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
    							<td>{{ $basic->email_p }}</td>
    							<td>{{ $m[0] }} {{ $m[1] }} {{ $m[2] }}</td>
    							<?php } ?>
    							<td style="padding-left:55px !important">
    								<a  href="view_plan_details/{{ $crm->id }}">
    									<i class="material-icons gray md-22"> visibility </i>
    								</a>
    							</td>
    							<!--<td style="padding-left:22px !important"><a href="view_plan_details/{{ $crm->id }}">
    							<i class="material-icons material-icons gray md-22"> pageview </i> </a></td>-->
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
<!--<div class="modal fade" id="pointModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="myModalLabel">Resident Service plan details</h4>
			</div>
			<div class="modal-body">					
			</div>
		</div>
	</div>
</div>-->
@endsection
@section('scripts-extra')
<script type="text/javascript" language="javascript" src="{{ asset('/js/rec/service.js') }}"></script>
@endsection