
@extends('layouts.app')

@section('htmlheader_title')
    Payment History
@endsection

@section('contentheader_title')
    Payment History
@endsection

@section('main-content')
<div class="row">
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
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">
            <div class="box-body border padding-top-0 padding-left-right-0">
                <table class="table">
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
							<th class="th-position text-uppercase font-500 font-12">work done by</th>	
						</tr>
						@foreach ($reports as $report)
						<tr>
							<td><label>{{ $report->pros_name }}</label></td>
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
							<td><label>Nandan Choudhury</label></td>
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