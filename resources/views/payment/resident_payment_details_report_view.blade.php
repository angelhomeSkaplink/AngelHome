
@extends('layouts.app')

@section('htmlheader_title')
    Payment History
@endsection

@section('contentheader_title')
    <p class="text-danger"><b>Payment History</b>
    <a href="{{ url('payment_report') }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:100px !important; margin-top: -2px; margin-right: 15px;"><i class="material-icons md-14 font-weight-600"> keyboard_arrow_left </i> back</a>
    </p>
@endsection

@section('main-content')
<style>
	.content-header
	{
		//display:none;
		padding: 2px 0px 1px 20px;
		/*margin-bottom: -18px;*/
	}
		
	.content {
		margin-top: 15px;
	}
	.form-control{
		//text-transform: uppercase;
	}
</style>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">
            <div class="box-body border padding-top-0 padding-left-right-0">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
							<tr>
								<th class="th-position text-uppercase font-500 font-12">Payable amount</th>
								<th class="th-position text-uppercase font-500 font-12">Amount paid</th>
								<th class="th-position text-uppercase font-500 font-12">Outstanding Amount</th>
								<th class="th-position text-uppercase font-500 font-12">Amount to be paid</th>
								<th class="th-position text-uppercase font-500 font-12">month</th>
								<th class="th-position text-uppercase font-500 font-12">year</th>
								<th class="th-position text-uppercase font-500 font-12">Payment date</th>
								<th class="th-position text-uppercase font-500 font-12">Status</th>	
								<!--<th class="th-position text-uppercase font-500 font-12">work done by</th>-->	
							</tr>
							@foreach ($reports as $report)
							<tr>
								<td>{{ $report->ammount_pay }}</td>								
								<td>{{ $report->ammount_paid }}</td>
								<td>{{ $report->balance }}</td>
								<td>{{ $report->due_ammount }}</td>
								<td>{{ $report->month }}</td>
								<td>{{ $report->year }}</td>
								<td class="">{{ $report->payment_date }}</td>
								@if($report->due_ammount == 0)
								<td class="text-success"><b>Fully Paid</b></td>
								@endif
								@if($report->due_ammount != 0)
								<td class="text-danger"><b>Partially Paid</b></td>
								@endif
								<!--<td>Nandan Choudhury</td>-->
							</tr>
							@endforeach
                        </tbody>
                    </table>
                </div>
				<div class="text-center">{{ $reports->links() }}</div>					
            </div>                
        </div>
    </div>
</div>
@endsection
@section('scripts-extra')

@endsection