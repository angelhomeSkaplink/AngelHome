@extends('layouts.app')
@section('htmlheader_title')
    MIS by Salary Claims
@endsection
@section('contentheader_title')

Salary Statement 
@endsection
@section('main-content')
<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<style>
    @media print
    {
        body {font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif !important; font-size: 9px;}
        .table { font-size: 9px !important; border: none !important; }
    }
</style>
<div id="printableArea">  
	<div class="row">
        <div class="col-md-12">		
            <div class="box box-primary"> 
                <div class="box-body">
				<div class="alert alert-success">
					<b>MIS report by Salary claim for {{ $month }}/{{ $year }}</b><br/>
				</div>
				@if(count($loans)>0)
				@if($status==1)
				<div class="alert alert-danger">
					<b>Salary Slip for this month does not generate</b>
				</div>
				@endif
                    <table class="table table-bordered">
                        <tbody>
							<tr>
								<th>Sl. No</th>
								<th>Employee Code</th>
								<th>Employee Name</th>								
								<th>Basic Pay</th>
								<th>Dearness Allowance</th>
								<th>HRA</th>
								<th>Medical</th>
								<th>Conveyance</th>
								<th>City</th>
								<th>Charge</th>
								<th>Others</th>
								<th>Gross</th>
							</tr>
							
							
							<?php $i = 1; ?>
							@foreach ($loans as $loan)							
							<tr>
								<td>{{ $i++ }}</td>
								<td>{{ $loan->emp_id }}</td>
								<?php $employee = DB::table('employees')->where('emp_id', $loan->emp_id)->first(); ?>
								<td>{{ $employee->emp_f_name }} {{ $employee->emp_m_name }} {{ $employee->emp_l_name }}</td>
								<td>{{ $loan->basic_pay }}</td>
								<td>{{ $loan->dearness_allowance }}</td>
								<td>{{ $loan->hra }}</td>
								<td>{{ $loan->medical_allowance }}</td>
								<td>{{ $loan->conveyance_allowance }}</td>
								<td>{{ $loan->city_allowance }}</td>
								<td>{{ $loan->charge_allow }}</td>
								<td>{{ $loan->others }}</td>
								<td>{{ $loan->gross_salary }}</td>
							</tr>							
							@endforeach
							@else
							<div class="alert alert-danger">
								<strong>No Data Found</strong>
							</div>
							@endif
                        </tbody>
                    </table>
					<div class="col-md-8" style="margin-top:20px;"><input type="button" class="btn btn-success" target="_blank" onclick="printDiv('printableArea')" value="PRINT" /></div>
					<form action="claim_excel" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="data" value="{{ json_encode($loans) }}">
						<button class="btn btn-info" type="submit">Export Data to Excel <i class="fa fa-file-excel-o" aria-hidden="true"></i></button>
					</form>		
                </div>                
            </div>
        </div>
    </div>
</div>
<script>
	function printDiv(printpage)
	{
		var headstr = "<html><head><title>Salary Slip</title></head><body>";
		var footstr = "</body>";
		var newstr = document.all.item(printpage).innerHTML;
		var oldstr = document.body.innerHTML;
		document.body.innerHTML = headstr+newstr+footstr;
		window.print();
		document.body.innerHTML = oldstr;
		return false;
	}
</script>
    @include('layouts.partials.scripts_auth')
@endsection
