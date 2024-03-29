@extends('layouts.app')

@section('htmlheader_title')
    List of Patients
@endsection

@section('contentheader_title')
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Patient List</strong></h3>
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
    									<input id="myInput" type="text" placeHolder="&#61442; RESIDENT" style="font-family: FontAwesome, Arial; font-style: normal">
    								</div>
    							</th>
                                <th class="th-position text-uppercase font-500 font-12">Contact no</th>
                                <th class="th-position text-uppercase font-500 font-12">Address</th>
                                <th class="th-position text-uppercase font-500 font-12">
    								<div class="contactautocomplete" style="width:200px;">
    									<input id="contactInput" type="text" placeHolder="&#61442; CONTACT PERSON" style="font-family: FontAwesome, Arial; font-style: normal">
    								</div>
    							</th>
                                <th class="th-position text-uppercase font-500 font-12">Add Medication</th>
                                <th class="th-position text-uppercase font-500 font-12">View Details</th>
                            </tr>
                            @foreach ($patients as $patient)
                            @php
                                $n = explode(",",$patient->pros_name);
                                $m = explode(",",$patient->contact_person);
                            @endphp
                            <tr>
    							@if($patient->service_image == NULL)
    							<td><img src="hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>	
    							@else
    							<td><img src="hsfiles/public/img/{{ $patient->service_image }}" class="img-circle" width="40" height="40"></td>
    							@endif
                                <td>{{ $n[0] }} {{ $n[1] }} {{ $n[2] }}</td>
                                <td>{{ $patient->phone_p }}</td>
                                <td>{{ $patient->city_p }}</td>
                                <td>{{ $m[0] }} {{ $m[1] }} {{ $m[2] }}</td>
                                <td class="padding-left-35">
                                    <a href="add_patient_details/{{ $patient->id }}">
                                        <i class="material-icons gray md-22"> add_circle</i>
                                    </a>
                                </td>
                                <td class="padding-left-35">
                                    <a href="view_patient_details/{{ $patient->id }}">
                                        <i class="material-icons gray md-22"> visibility</i>
                                    </a>
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
<script type="text/javascript" language="javascript" src="{{ asset('/js/rec/patient.js') }}"></script>
@endsection
