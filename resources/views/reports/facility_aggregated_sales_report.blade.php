@extends('layouts.app')

@section('htmlheader_title')
    @lang("msg.Resident Info") 
@endsection

@section('contentheader_title')
<div class="row">
    <div class="col-lg-4 col-lg-offset-4 text-center">
      <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Aggregated Sales Report</strong></h3>
    </div>
    <div class="col-lg-4">
      <a href="{{ url('facility_sales_reports') }}" class="btn btn-success btn-sm pull-right" style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back</a>
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
<script>
$(document).ready(function() {
		$('select[name="pros_id"]').on('change', function() {
			var pros_id = $(this).val();
			console.log(pros_id);
			if(pros_id) {
				$.ajax({
					url: '../../reports_pros/'+pros_id,
					type: "GET",
					success:function(data) {
						window.location.replace('reports_pros/'+pros_id);
					}
				});
			}
		});
	});
</script>
<br/>
<div class="row">
    <div class="col-md-12">		
        <div class="box box-primary border">				
            <div class="box-header with-border col-sm-2 pull-right">                   
            </div>
            <div class="box-body border padding-top-0 padding-left-right-0">
                <table class="table">
                    <tbody>
						<tr>
							<th class="th-position text-uppercase font-500 font-12">###</th>
							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Residents")</th>
							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Phone No")</th>
							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Email")</th>
							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Address")</th>
							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Contact Person")</th>
							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Phone No")</th>
							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Email")</th>
							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Address")</th>
							<!--<th class="th-position text-uppercase font-500 font-12">Sales stage</th>-->
						</tr>
						@foreach ($reports as $report)
						@php
							$n = explode(",",$report->pros_name);
						@endphp
						<tr>
							@if($report->service_image == NULL)
							<td><img src="hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>	
							@else
							<td><img src="hsfiles/public/img/{{ $report->service_image }}" class="img-circle" width="40" height="40"></td>
							@endif
							<td>{{ $n[0] }} {{ $n[1] }} {{ $n[2] }}</td>
							<?php 
								$basic = DB::table('change_pross_record')->where([['pros_id', $report->id], ['status', 1]])->first();{
								$m = explode(",",$basic->contact_person);
							?>
							<td>{{ $basic->phone_p }}</td>
							<td>{{ $basic->email_p }}</td>
							<td>{{ $basic->address_p }}</td>
							<td>{{ $m[0] }} {{ $m[1] }} {{ $m[2] }}</td>
							<td>{{ $basic->phone_c }}</td>
							<td>{{ $basic->email_c }}</td>
							<td>{{ $basic->address_c }}</td>
							<?php } ?>
						</tr>
						@endforeach
                    </tbody>
                </table>
            </div>                
        </div>
    </div>
</div>
@endsection
@section('scripts-extra')

@endsection