
@extends('layouts.app')

@section('htmlheader_title')
    Service Plan:{{$plan}}
@endsection

@section('contentheader_title')
<div class="row">
    <div class="col-lg-4 col-lg-offset-4 text-center">
      <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Assessment History</strong></h3>
    </div>
    <div class="col-lg-4">
      <a href="{{ url('resident_service_plan_graph') }}" class="btn btn-success btn-sm pull-right" style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back</a>
    </div>
</div>
@endsection

@section('main-content')
<style>
	.content-header
	{
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
								<th class="th-position text-uppercase font-500 font-12"></th>
								<th class="th-position text-uppercase font-500 font-12">
									<div class="autocomplete" style="width:200px;">
										<input id="myInput" type="text" placeHolder="@lang('msg.Resident')">
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
							@if($data->isempty())
							<tr>
							    <td colspan=6 class="text-center"><p>Currently there is no resident in this service plan.</p></td>
							</tr>
							@else
                              @foreach ($data as $crm)
                              @php
                                  $n = explode(",", $crm->pros_name);
                                  $m = explode(",", $crm->contact_person);
                              @endphp
                              <tr>
                                @if($crm->service_image == NULL)
                                <td><img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>
                                @else
                                <td><img src="../hsfiles/public/img/{{ $crm->service_image }}" class="img-circle" width="40" height="40"></td>
                                @endif
                                <td>{{ $n[0] }} {{ $n[1] }} {{ $n[2] }}</td>
                                <td>{{ $crm->phone_p }}</td>
                                <td>{{ $crm->email_p }}</td>
                                <td>{{ $m[0] }} {{ $m[1] }} {{ $m[2] }}</td>
                                <td style="padding-left:55px !important">
                                  <a href="../service_plan_period/{{ $crm->id }}">
                                    <i class="material-icons gray md-22"> visibility </i>
                                  </a>
                                </td>
                              </tr>
                              @endforeach
                            @endif
						</tbody>
					</table>
				</div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts-extra')
<script type="text/javascript" language="javascript" src="{{ asset('/js/rec/service.js') }}"></script>
@endsection
