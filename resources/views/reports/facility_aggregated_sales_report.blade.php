
@extends('layouts.app')

@section('htmlheader_title')
    @lang("msg.Resident Info") 
@endsection

@section('contentheader_title')
    <p class="text-danger"><b>@lang("msg.Sales Reports")</b><a href="{{ url('facility_sales_reports') }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:150px !important; margin-top: -2px; margin-right: 10px;"><i class="material-icons md-14 font-weight-600"> keyboard_arrow_left </i> @lang("msg.Back")</a></p>
@endsection

@section('main-content')
<style>	
	.content-header
	{
		padding: 2px 0px 0px 20px;
		margin-bottom: -18px;
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
<!--<div class="row margin-left-right-15">
	<form action="../inquiery_reports" method="post" enctype="multipart/form-data">

		{!! csrf_field() !!}
		<div class="col-md-2">
			<div class="form-group has-feedback">
				<label class="sm-heading">From Date</label>
				<input type="text" class="form-control" placeholder="From Date" name="from" id="from" onkeyup="getdateofretirement();" autocomplete="off"/>
				<script type="text/javascript"> $('#from').datepicker({format: 'yyyy/mm/dd'});</script> 
			</div>			
		</div>
		<div class="col-md-2">
			<div class="form-group has-feedback">
				<label class="sm-heading">To Date</label>
				<input type="text" class="form-control" placeholder="To Date" name="to" id="to" onkeyup="getdateofretirement();" autocomplete="off" />
				<script type="text/javascript"> $('#to').datepicker({format: 'yyyy/mm/dd'});</script> 
			</div>			
		</div>
		<div class="col-md-3">
			<div class="form-group has-feedback">
				<label>Prospectives</label><br/>
				<select name="id" id="id" class="form-control">
					<option value="">Select Prospective</option>
					@foreach ($reports as $prospect)
					<option value="{{ $prospect->id}}">{{ $prospect->pros_name }}</option>
					@endforeach
				</select>
			</div>			
		</div>
		<div class="col-md-3">
			<div class="form-group has-feedback">
				<label class="sm-heading">Sales Stage </label>
				<select name="sales_stage" id="sales_stage" class="form-control" >
					<option value="">Select Sales Stage</option>
					<option value="Discovery">Discovery</option>
					<option value="Tour">Tour</option>
					<option value="Re-Tour">Re-Tour</option>
					<option value="Signing">Signing</option>
					<option value="Move In">Move In</option>
				</select>
			</div>			
		</div>
		<div class="col-md-2">
			<div class="form-group has-feedback">
				<button type="submit" class="btn btn-primary btn-block btn-flat padding-top-bottom-4" style="width:90% !important; margin-top:24px">
					<i class="material-icons"> search </i> Search
				</button>
			</div>			
		</div>
	</form>
</div>-->

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
						<tr>
							@if($report->service_image == NULL)
							<td><img src="hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>	
							@else
							<td><img src="hsfiles/public/img/{{ $report->service_image }}" class="img-circle" width="40" height="40"></td>
							@endif
							<td>{{ $report->pros_name }}</td>
							<?php 
								$basic = DB::table('change_pross_record')->where([['pros_id', $report->id], ['status', 1]])->first();{
							?>
							<td>{{ $basic->phone_p }}</td>
							<td>{{ $basic->email_p }}</td>
							<td>{{ $basic->address_p }}</td>
							<td>{{ $basic->contact_person }}</td>
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