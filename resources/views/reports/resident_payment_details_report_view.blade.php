
@extends('layouts.app')

@section('htmlheader_title')
    Payment History
@endsection

@section('contentheader_title')
    <p class="text-danger"><b>Payment History</b>
	<a href="{{ url('facility_graph_reports/' . $id) }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:135px !important; margin-right:15px !important;"><i class="material-icons md-14 font-weight-600"> keyboard_arrow_left </i> Back to graph</a>
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
	<form action="{{action('ReportController@date_range_report')}}" method="post">					
		<input type="hidden" name="_method" value="PATCH">
	
		{!! csrf_field() !!}
		
		<input type="hidden" class="form-control" name="facility_id" id="facility_id" value="{{ $id }}" />					
		<div class="col-md-4">
			<div class="form-group has-feedback">
				<label class="sm-heading">From Date</label>
				<input type="text" class="form-control" placeholder="From Date" name="from" id="from" autocomplete="off"/>
				<script type="text/javascript"> $('#from').datepicker({format: 'yyyy/mm/dd'});</script> 
			</div>			
		</div>
		<div class="col-md-4">
			<div class="form-group has-feedback">
				<label class="sm-heading">To Date</label>
				<input type="text" class="form-control" placeholder="To Date" name="to" id="to" autocomplete="off" />
				<script type="text/javascript"> $('#to').datepicker({format: 'yyyy/mm/dd'});</script> 
			</div>			
		</div>			
		<div class="col-md-4">
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
            <div class="box-body border padding-top-0 padding-left-right-0">
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
								<th class="th-position text-uppercase font-500 font-12">Resident</th>
								<th class="th-position text-uppercase font-500 font-12">Payable amount</th>
								<th class="th-position text-uppercase font-500 font-12">Amount paid</th>
								<th class="th-position text-uppercase font-500 font-12">Amount to be paid</th>
								<th class="th-position text-uppercase font-500 font-12">month</th>
								<th class="th-position text-uppercase font-500 font-12">year</th>
								<th class="th-position text-uppercase font-500 font-12">Payment date</th>
								<th class="th-position text-uppercase font-500 font-12">Status</th>	
							</tr>
							@foreach ($reports as $report)
							@php
								$n = explode(",",$report->pros_name);
							@endphp
							<tr>
								<td><label>{{ $n[0] }} {{ $n[1] }} {{ $n[2] }}</label></td>
								<td><label>{{ $report->ammount_pay }}</label></td>								
								<td><label>{{ $report->ammount_paid }}</label></td>
								<td><label>{{ $report->due_ammount }}</label></td>
								<td><label>{{ $report->month }}</label></td>
								<td><label>{{ $report->year }}</label></td>
								<td class=""><label>{{ $report->payment_date }}</label></td>
								@if($report->due_ammount == 0)
								<td class="text-success"><b>FULLY PAID</b></td>
								@endif
								@if($report->due_ammount != 0)
								<td class="text-danger"><b>PARTIALLY PAID</b></td>
								@endif
							</tr>							
							@endforeach							
						</tbody>
						<tfoot>
							<tr>
								<td colspan="8">Powered by Senior Safe Technology LCC</td>
							</tr>
						</tfoot>
					</table>									
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