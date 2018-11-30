
@extends('layouts.app')

@section('htmlheader_title')
    Facility Info 
@endsection

@section('contentheader_title')
    Facility List
@endsection

@section('main-content')
    <div class="row">
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
	</div>
	<div class="row">
	<br/>
        <div class="col-md-12">	
            <div class="box box-primary border">				
                <div class="box-header with-border col-sm-2 pull-right">                   
                </div>
				
                <div class="box-body border padding-top-0 padding-left-right-0">
                    <table class="table">
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
                    </table>
                </div>                
            </div>
        </div>
    </div>
@endsection
@section('scripts-extra')

@endsection