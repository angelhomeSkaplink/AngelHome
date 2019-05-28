
@extends('layouts.app')

@section('htmlheader_title')
    @lang("msg.Future Resident Info") 
@endsection

@section('contentheader_title')
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important; margin:.5px;"><strong>@lang("msg.Resident Serice Plan")</strong></h3>
	</div>
</div>
@endsection

@section('main-content')
<style>	
	.content-header
	{
		padding: 2px 0px 1px 20px;
		margin-bottom: 0.5px;
	}
	.content {
		margin-top: 5px;
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
								<th class="th-position text-uppercase font-500 font-12"><h5 style="color:aliceblue !important;"></h5></th>
								<th class="th-position text-uppercase font-500 font-12">
									<div class="autocomplete" style="width:200px;">
										<input id="myInput" type="text" placeHolder="@lang('msg.Resident')">
									</div>
								</th>
								<th class="th-position text-uppercase font-500 font-12"><h5 style="color:aliceblue !important;"><strong>@lang("msg.Phone No")</strong></h5></th>
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
								<th class="th-position text-uppercase font-500 font-12"><h5 style="color:aliceblue !important;"><strong>@lang("msg.View Plan Details")</strong></h5></th>
							</tr>
							@foreach ($crms as $crm)
							@php
							    $n = explode(",", $crm->pros_name);
							    $m = explode(",", $crm->contact_person);
							@endphp
							<tr>
								@if($crm->service_image == NULL)
								<td><img src="hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>	
								@else
								<td><img src="hsfiles/public/img/{{ $crm->service_image }}" class="img-circle" width="40" height="40"></td>
								@endif
								<td><strong>{{ $n[0] }} {{ $n[1] }} {{ $n[2] }}</strong></td>
								<td>{{ $crm->phone_p }}</td>
								<td>{{ $crm->email_p }}</td>
								<td>{{ $m[0] }} {{ $m[1] }} {{ $m[2] }}</td>
								<td style="padding-left:55px !important">
									<a class="btn btn-default" href="service_plan_period/{{ $crm->id }}">
										<i class="material-icons gray md-22"> visibility </i> @lang("msg.View")
									</a>
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
<script type="text/javascript" language="javascript" src="{{ asset('/js/rec/service.js') }}"></script>
@endsection