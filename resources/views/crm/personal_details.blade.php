
@extends('layouts.app')

@section('htmlheader_title')
    Resdident Info 
@endsection

@section('contentheader_title')
<div class="row">
	<div class="col-md-4 offset-md-4 text-center">
		<h3><strong>Resident Details</strong></h3>
	</div>
</div>
@endsection

@section('main-content')
<script>
$(document).ready(function() {
		$('select[name="id"]').on('change', function() {
			var pros_id = $(this).val();
			console.log(pros_id);
			if(pros_id) {
				$.ajax({
					url: 'select_personal_detail/'+pros_id,
					type: "GET",
					success:function(data) {
						window.location.replace('select_personal_detail/'+pros_id);
					}
				});
			}					
		});
	});
</script>
<link href="{{ asset('/css/type_ahead.css') }}" rel="stylesheet" type="text/css"/>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">				
            <div class="box-header with-border col-sm-2 pull-right"></div>
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
    							<th class="th-position text-uppercase font-500 font-12">Phone No</th>
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
    							<!--<th class="th-position text-uppercase font-500 font-12">Add Records</th>-->
    							<th class="th-position text-uppercase font-500 font-12">View Records</th>
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
    							<!--<td class="padding-left-35"><a href="details/{{ $crm->id }}" data-toggle="tooltip" data-placement="bottom" data-original-title="Add Records"><i class="material-icons gray md-22"> add_circle</i></a></td>-->
    							<td class="padding-left-35"><a href="screening_view/{{ $crm->id }}" data-toggle="tooltip" data-placement="bottom" data-original-title="view Records"><i class="material-icons gray md-22"> visibility </i></a></td>
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
<script type="text/javascript" language="javascript" src="{{ asset('/js/rec/personal_detail.js') }}"></script>
@endsection