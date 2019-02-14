
@extends('layouts.app')

@section('htmlheader_title')
    Facility Room Report 
@endsection

@section('contentheader_title')
<div class="row">
    <div class="col-lg-4 col-lg-offset-4 text-center">
      <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Facility Room Report</strong></h3>
    </div>
    <div class="col-lg-4">
      <span class="pull-right" style="padding-right:30px;">
	  <a href="{{ url('facility_room_graph/'.$id) }}" class="btn btn-success btn-sm" style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back To Graph</a>
	  <button class="btn btn-primary" onclick="printDiv('printableDiv')" id="printButton"><i class="material-icons md-22"> print </i> Print</button>
	</span>
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
<style  type = "text/css" media = "screen">
	.print-header{ display:none; }
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
   								<th class="th-position text-uppercase font-500 font-12">Room no</th>
   								<th class="th-position text-uppercase font-500 font-12">Room Type</th>
   								<th class="th-position text-uppercase font-500 font-12">Unit Status</th>
   								<th class="th-position text-uppercase font-500 font-12">Original Rate</th>
   								<th class="th-position text-uppercase font-500 font-12">Our Room Rate</th>
   								<th class="th-position text-uppercase font-500 font-12">By</th>
   							</tr>
							@foreach ($reports as $report)
   							<tr>
   								<td>{{ $report->room_no }}</a></td>
   								<td>{{ $report->room_type }}</td>
   								@if($report->room_status==0)
   								<td class="text-danger"><b>Vacant<b/></td>
   								<td>{{ $report->price }}</td>
   								<td>0</td>
   								<td></td>
   								@endif
								   @if($report->room_status==1)
								   <?php 
										$doc = DB::table('resident_room')
											->Join('sales_pipeline', 'resident_room.pros_id', '=', 'sales_pipeline.id')
											->where([['room_id',$report->room_id]])->first();
											$n = explode(",",$doc->pros_name);
									?>
									@if($doc->stage === "MoveIn")
								   		<td class="text-success"><b>Occupied</b></td>
									@else
										<td class="text-success"><b>Booked</b></td>
									@endif
									<td>{{ $report->price }}</td>
									<td>{{ $doc->price }}</td>
									<td>{{ $n[0] }} {{ $n[1] }} {{ $n[2] }}</td>
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