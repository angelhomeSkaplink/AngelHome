
@extends('layouts.app')

@section('htmlheader_title')
    Facility Room Report 
@endsection

@section('contentheader_title')
    <p class="text-danger"><b>Facility room report</b>
	<a href="{{ url('facility_room_graph/' . $id) }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:150px !important; height:26px !important; margin-right: 15px; !important;"><i class="material-icons md-14 font-weight-600"> keyboard_arrow_left </i> Back to graph</a>
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
	.print-header{ display:none; }
	thead{ display:none;}
	tfoot{ display:none; }
</style>
<!--<div class="row">
	<form action="{{action('ReportController@date_range_room_report')}}" method="post">					
		<input type="hidden" name="_method" value="PATCH">
		
		{!! csrf_field() !!}
		<input type="hidden" class="form-control" name="facility_id" id="facility_id" value="{{ $id }}">
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
            <div class="box-header with-border col-sm-2 pull-right">                   
            </div>
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
   								<th class="th-position text-uppercase font-500 font-12">Room no</th>
   								<th class="th-position text-uppercase font-500 font-12">Room Type</th>
   								<th class="th-position text-uppercase font-500 font-12">unit status</th>
   								<th class="th-position text-uppercase font-500 font-12">original rate</th>
   								<th class="th-position text-uppercase font-500 font-12">resident room rate</th>
   								<th class="th-position text-uppercase font-500 font-12">room occupaied by</th>
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
   								<td class="text-success"><b>Occupied</b></td>
   								<?php 
   									$doc = DB::table('resident_room')
   										->Join('sales_pipeline', 'resident_room.pros_id', '=', 'sales_pipeline.id')
   										->where([['room_id',$report->room_id]])->first();
   								?>
   								<td>{{ $report->price }}</td>
   								<td>{{ $doc->price }}</td>
   								<td>{{ $doc->pros_name }}</td>
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