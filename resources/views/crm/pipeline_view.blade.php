@extends('layouts.app')
@section('htmlheader_title')
    Prospective Info 
@endsection
@section('contentheader_title')
	<p class="text-danger"><b>Future resident</b>
		<a href="{{ url('new_pross_add') }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:187px !important; margin-top: -2px; margin-right: 10px;"><i class="material-icons md-14 font-weight-600"> add </i> Add New Prospective</a>
	</p>
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
<link href="{{ asset('/css/type_ahead.css') }}" rel="stylesheet" type="text/css"/>

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">
			<div class="box-body border padding-top-0 padding-left-right-0">
                <table class="table">
                    <tbody>
						<tr>
							<th class="th-position text-uppercase font-400 font-13">######</th>
							<th class="th-position text-uppercase font-500 font-12">
								<div class="autocomplete" style="width:200px;">
									<input id="myInput" type="text" placeHolder="FUTURE RESIDENT">
								</div>
								<!--<select name="id" id="id" class="form-control" >
									<option value=""> @lang("msg.FUTURE RESIDENT")</option>
									@foreach ($prospectives as $prospective)
										<option value="{{ $prospective->id }}"> {{ $prospective->pros_name }} </option>	
									@endforeach
								</select>-->
							</th>
							<th class="th-position text-uppercase font-400 font-13">Phone No</th>
							<th class="th-position text-uppercase font-500 font-12">
								<div class="emailautocomplete" style="width:200px;">
									<input id="emailInput" type="text" placeHolder="EMAIL">
								</div>
							</th>
							<th class="th-position text-uppercase font-500 font-12">
								<div class="contactautocomplete" style="width:200px;">
									<input id="contactInput" type="text" placeHolder="CONTACT PERSON">
								</div>
							</th>
							<th class="th-position text-uppercase font-400 font-13">Change Records</th>
						</tr>
						@foreach ($crms as $crm)
						<tr>
							@if($crm->service_image == NULL)
							<td><img src="hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>	
							@else
							<td><img src="hsfiles/public/img/{{ $crm->service_image }}" class="img-circle" width="40" height="40"></td>
							@endif
							<td>{{ $crm->pros_name }}</td>
							<?php 
								$basic = DB::table('change_pross_record')->where([['pros_id', $crm->id], ['status', 1]])->first();{
							?>
							<td>{{ $basic->phone_p }}</td>
							<td>{{ $basic->email_p }}</td>
							<td>{{ $basic->contact_person }}</td>
							<?php } ?>
							<td><a href="change_records/{{ $crm->id }}"><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400">Change Records</a></span></td>
						</tr>
						@endforeach
                    </tbody>
                </table>
				<div class="text-center">{{ $crms->links() }}</div>
            </div>                
        </div>
    </div>
</div>
@endsection
@section('scripts-extra')
<script type="text/javascript" language="javascript" src="{{ asset('/js/rec/rec.js') }}"></script>
@endsection