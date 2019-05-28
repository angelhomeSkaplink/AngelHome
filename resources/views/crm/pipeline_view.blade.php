@extends('layouts.app')
@section('htmlheader_title')
Future Resident 
@endsection
@section('contentheader_title')
<div class="row">
    <div class="col-lg-4 offset-lg-4 text-center">
      <h3><strong>Future Resident</strong></h3>
    </div>
    <div class="col-lg-4">
      <a href="{{ url('new_pross_add') }}" class="btn btn-success btn-sm pull-right padding-7"><i class="material-icons">add</i>Add Future Resident</a>
    </div>
</div>
@endsection

@section('main-content')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
			<div class="panel-body border padding-top-0 padding-left-right-0">
			    <div class="table-responsive">
                    <table class="table">
                        <tbody>
    						<tr>
    							<th class="th-position text-uppercase font-400 font-13"></th>
    							<th class="th-position text-uppercase font-500 font-12">
    								<div class="autocomplete" style="width:200px;">
    									<input id="myInput" type="text" placeHolder="&#61442; FUTURE RESIDENT" style="font-family:Arial, FontAwesome"/>
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
    							<th class="th-position text-uppercase font-400 font-13">Change Records</th>
    						</tr>
    						@foreach ($crms as $crm)
    						<tr>
								@php
									$n=explode(",",$crm->pros_name);
									$m=explode(",",$crm->contact_person);
								@endphp
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
    							<td><a href="change_records/{{ $crm->id }}"><span class="btn btn-primary btn-sm">Change Records</a></span></td>
    						</tr>
    						@endforeach
                        </tbody>
                    </table>
                </div>
				<div class="paginate-div text-center">{{ $crms->links() }}</div>
            </div>                
        </div>
    </div>
</div>
@endsection
@section('scripts-extra')
<script type="text/javascript" language="javascript" src="{{ asset('/js/rec/rec.js') }}"></script>
@endsection