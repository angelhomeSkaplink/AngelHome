
@extends('layouts.app')

@section('htmlheader_title')
    Sales Report 
@endsection

@section('contentheader_title')
    <p class="text-danger"><b>Future Resident Report from {{ $from }} to {{ $to }}</b>
    <button onclick="history.back()" class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:100px !important; height:26px !important"><i class="material-icons md-14 font-weight-600"> details </i> Go Back</a>
    </p>
@endsection
@section('main-content')
<style>	
	.content-header{
		padding: 2px 0px 1px 20px;
		margin-bottom: -18px;
	}
	#printButton {
		position: fixed;
		bottom: 30px;
		right: 25px; 
	}
</style>

<style  type = "text/css" media = "screen">
	.print-header{
		display:none;
	}
</style>

<style  type = "text/css" media="print">
	.print-header{
		display:block;
	}
	.print-header{
		display: -webkit-box;
		display: -webkit-flex;
		display: -ms-flexbox;
		display: flex;
		justify-content: space-between;
	}
	.print-logo img{
		width:40px;
		height: 40px;
		padding: 10px;
	}
	.print-right{
		display: -webkit-box;
		display: -webkit-flex;
		display: -ms-flexbox;
		display: flex;
	    justify-content: center;
	    align-items: center;
	    padding: 10px;
	}
</style>

<!--<div class="row">
	<form action="inquiery_reports" method="post" enctype="multipart/form-data">
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
				<label>Future Residents</label><br/>
				<select name="id" id="id" class="form-control">
					<option value="">Select Future Resident</option>
					@foreach ($prospectives as $prospective)
					<option value="{{ $prospective->id}}">{{ $prospective->pros_name }}</option>
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
			<div class="box-header with-border col-sm-2 pull-right"></div>				
			<div class="box-body border padding-top-0 padding-left-right-0">				
				<div id="printableDiv">
					<!--<div class="print-header">
						<?php 
							$facility_info = DB::table('facility')->where('id', Auth::user()->facility_id)->first();
						?>						
						<div class="print-logo">
							@if($facility_info->facility_logo == NULL)
								<img src="http://localhost/angel_home_s_admin/hsfiles/public/facility_logo/images.png" />
							@else
								<img src="http://localhost/angel_home_s_admin/hsfiles/public/facility_logo/{{ $facility_info->facility_logo }}" />
							@endif
						</div>
						
						<div class="print-right">
							<p><b><label>{{ $facility_info->facility_name }}<label></b></p>
							<p class="text-danger"><b>FUTURE RESIDENT REPORTS FROM {{ $from }} to {{ $to }}</b></p>
						</div>
					</div>-->
					<div class="print-header">
						<table>
							<?php 
								$facility_info = DB::table('facility')->where('id', Auth::user()->facility_id)->first();
							?>	
							<tr>
								<td class="print-logo">
									@if($facility_info->facility_logo == NULL)
										<img src="http://seniorsafetech.com/angel_home_s_admin/hsfiles/public/facility_logo/images.png"/>
									@else
										<img src="http://seniorsafetech.com/angel_home_s_admin/hsfiles/public/facility_logo/{{ $facility_info->facility_logo }}" />
									@endif
								</td>
							
								<td>
									<p><b><label>{{ $facility_info->facility_name }}</label></b></p>
									<p><b><label>Address :  {{ $facility_info->address }}, {{ $facility_info->address_two }}</label></b></b></p>
									<p><b><label>Phone no : {{ $facility_info->phone }}</b></p>
									<p><b><label>email :</label>{{ $facility_info->facility_email }}</b></p>
									
								</td>
							</tr>
							<tr>
								<td>
									<p class="text-danger"><b>FUTURE RESIDENT REPORTS FROM {{ $from }} to {{ $to }}</b></p>
								</td>
							</tr>
						</table>
					</div>
					<table class="table">
						<tbody>
							<tr>
								<th class="th-position text-uppercase font-500 font-12">#</th>
								<th class="th-position text-uppercase font-500 font-12">Prospective</th>
								<th class="th-position text-uppercase font-500 font-12">Phone No</th>
								<th class="th-position text-uppercase font-500 font-12">Date</th>
								<th class="th-position text-uppercase font-500 font-12">Sales Stage</th>
								<th class="th-position text-uppercase font-500 font-12">Note</th>
								<th class="th-position text-uppercase font-500 font-12">Method of Communication</th>
								<th class="th-position text-uppercase font-500 font-12">work done by</th>
							</tr>
							@foreach ($reports as $report)
							<tr>
								@if($report->service_image == NULL)
								<td><img src="hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>	
								@else
								<td><img src="hsfiles/public/img/{{ $report->service_image }}" class="img-circle" width="40" height="40"></td>
								@endif
								<td>{{ $report->pros_name }}</td>
								<td>{{ $report->phone_p }}</td>
								<td>{{ $report->date }}</td>
								<td>{{ $report->sales_stage }}</td>
								<td>{{ $report->notes }}</td>
								<td>{{ $report->moc }}</td>	
								<?php 
									$user = DB::table('users')->where([['user_id', $report->marketing_id]])->first();{
								?>
								<td>{{ $user->firstname }} {{ $user->lastname }}</td>
								<?php } ?>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<button class="btn btn-info pull-right" id="printButton" type="submit" onclick="printDiv('printableDiv')">Print<i class="material-icons md-22" aria-hidden="true"> description </i></button>
				<!--<form action="prospect_date_btween_excel" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="data" value="{{ json_encode($reports) }}">
					<button class="btn btn-info pull-right" style="margin-top:15px; margin-bottom:15px; margin-right:7px" type="submit">Export Data to Excel <i class="material-icons md-22" aria-hidden="true"> description </i></button>
				</form>-->     
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts-extra')
<script>
	function printDiv(printableDiv) {
		var printContents = document.getElementById(printableDiv).innerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;
	}
</script>
@endsection