@extends('layouts.app')
@section('htmlheader_title')
Resident Payment 
@endsection
@section('contentheader_title')
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Resident Payment</strong></h3>
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
                    <table class="table">
                        <tbody>
    						<tr>
    							<th class="th-position text-uppercase font-400 font-13"></th>
    							<th class="th-position text-uppercase font-500 font-12">
    								<div class="autocomplete" style="width:200px;">
    									<input id="myInput" type="text" placeHolder="&#61442; RESIDENTS" style="font-family: FontAwesome, Arial; font-style: normal">
    								</div>
    							</th>
    							<th class="th-position text-uppercase font-400 font-13">Phone No</th>
    							<th class="th-position text-uppercase font-500 font-12">
    								<div class="emailautocomplete" style="width:200px;">
    									<input id="emailInput" type="text" placeHolder="&#61442; EMAIL" style="font-family: FontAwesome, Arial; font-style: normal">
    								</div>
    							</th>
    							<th class="th-position text-uppercase font-500 font-12">
    								<div class="contactautocomplete" style="width:200px;">
    									<input id="contactInput" type="text" placeHolder="&#61442; CONTACT PERSON" style="font-family: FontAwesome, Arial; font-style: normal">
    								</div>
    							</th>
    							<th class="th-position text-uppercase font-400 font-13">Make Payment</th>
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
    							<td><a href="resident_make_payment/{{ $crm->id }}"><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400">MAKE PAYMENT</a></span></td>
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
<script type="text/javascript" language="javascript" src="{{ asset('/js/rec/payment.js') }}"></script>
@endsection