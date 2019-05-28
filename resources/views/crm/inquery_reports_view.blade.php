
@extends('layouts.app')

@section('htmlheader_title')
    Resident Report from {{ $from }} to {{ $to }}
@endsection

@section('contentheader_title')
    <p class="text-danger"><b>Resident Report from {{ $from }} to {{ $to }}</b>
    <button onclick="history.back()" class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:100px !important; height:26px !important; margin-right: 15px !important;"><i class="material-icons md-14 font-weight-600"> keyboard_arrow_left </i> Go Back</a>
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
	thead{ display:none;}
	tfoot{ display:none; }
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
			    <div class="table-responsive">				
    				<div id="printableDiv">						
    					<table class="table">
    						<thead>
    							<?php 
    								$facility_info = DB::table('facility')->where('id', Auth::user()->facility_id)->first();
    							?>	
    							<tr>								
    								<td><div style="width: 80px">
    									@if($facility_info->facility_logo == NULL)
    										<img src="http://seniorsafetech.com/angel_home_s_admin/hsfiles/public/facility_logo/images.png"/>
    									@else
    										<img src="http://seniorsafetech.com/angel_home_s_admin/hsfiles/public/facility_logo/{{ $facility_info->facility_logo }}" />
    									@endif
    								</div></td>							
    								<td colspan="7">
    									<p><b></b><br/>
    									<b>{{ $facility_info->facility_name }}, {{ $facility_info->address }}, {{ $facility_info->address_two }}</b><br/>
    									<b>{{ $facility_info->phone }}</b><br/>
    									<b>{{ $facility_info->facility_email }}</b></p>
    									
    								</td>								
    							</tr>								
    						</thead>
    						<tbody>						
    							<tr>
    								<th class="th-position text-uppercase font-500 font-12">#</th>
    								<th class="th-position text-uppercase font-500 font-12">Resident</th>
    								<th class="th-position text-uppercase font-500 font-12">Phone No</th>
    								<th class="th-position text-uppercase font-500 font-12">Date</th>
    								<th class="th-position text-uppercase font-500 font-12">Sales Stage</th>
    								<th class="th-position text-uppercase font-500 font-12">Note</th>
    								<th class="th-position text-uppercase font-500 font-12">Method of Communication</th>
    								<!--<th class="th-position text-uppercase font-500 font-12">work done by</th>-->
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
    								<!--<td>{{ $user->firstname }} {{ $user->lastname }}</td>-->
    								<?php } ?>
    							</tr>
    							@endforeach
    						</tbody>
    						<tfoot>
    							<tr>
    								<td colspan="8">Powered by Senior Safe Technology LLC</td>
    							</tr>
    						</tfoot>
    					</table>
    				</div>
    			</div>
				<button class="btn btn-info pull-right" id="printButton" type="submit" onclick="printDiv('printableDiv')">Print<i class="material-icons md-22" aria-hidden="true"> description </i></button>
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