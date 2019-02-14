@extends('layouts.app')

@section('htmlheader_title')
    Payment History
@endsection

@section('contentheader_title')
<div class="row">
    <div class="col-lg-4 col-lg-offset-4 text-center">
      <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Payment History</strong></h3>
    </div>
    <div class="col-lg-4">
	  <span class="pull-right" style="padding-right:30px;">
		<a href="{{ url('facility_graph_reports/'.$id) }}" class="btn btn-success btn-sm" style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back to graph</a>
		<button class="btn btn-primary" onclick="printDiv('printableDiv')" id="printButton"><i class="material-icons md-22"> print </i> Print</button>
      </span>
    </div>
</div>
@endsection

@section('main-content')
<style>	
	.content-header{
		padding: 2px 0px 1px 20px;
		margin-bottom: -10px;
	}
</style>

<style  type = "text/css" media = "screen">
	.print-header{
		display:none;
	}
	thead{ display:none;}
	tfoot{ display:none; }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">
            <div class="box-body border padding-top-0 padding-left-right-0">
				<div class="table-responsive" id="printableDiv">
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
		window.location.reload(true);
	}
</script>
@endsection