@extends('layouts.app')
@section('htmlheader_title')
    Salary
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
   <b>OFFICE OF THE</br>
ASSAM HIGHER SECONDARY EDUCATION COUNCIL</br>
BAMUNIMAIDAM, GUWAHATI-21</br></b>
<div class="row">
        <div class="col-md-12">		
            <div class="box box-primary"> 
                <div class="box-body">
				<b>Salary Statement for {{ $month }}/{{ $year }}</b>
                    <table class="table table-bordered">
                        <tbody>
							<tr>
								<th>Sl. No</th>
								<th>Employee Code</th>
								<th>Employee Name</th>								
								<th>Bank Account No</th>
								<th>Bank Name</th>
								<th>Ifsc Code</th>
								<th>Amount</th>
							</tr>
							@if(count($loans)>0)
							<?php $i = 1; ?>
							@foreach ($loans as $loan)
							<tr>
								<td>{{ $i++ }}</td>
								<td>{{ $loan->emp_id }}</td>
								<?php $employee = DB::table('employees')->where('emp_id', $loan->emp_id)->first(); ?>
								<td>{{ $employee->emp_f_name }} {{ $employee->emp_m_name }} {{ $employee->emp_l_name }}</td>
								<td>{{ $employee->bank_account_number }}</td>
								<td>{{ $employee->bank_name }}</td>
								<td>{{ $employee->ifsc }}</td>
								<?php $net_salary = $loan->gross_salary-$loan->total_deduction; ?>
								<td>{{ $net_salary }}</td>
							</tr>							
							@endforeach
							<tr>
								<td></td>							
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>Total</td>
								<td>{{ $net }}</td>
							</tr>
							@else
							<div class="alert alert-danger">
								<strong>No Data Found</strong>
							</div>
							@endif
                        </tbody>
                    </table>
					<br/><br/><br/><br/><br/><br/><br/>
					<div class="col-md-8"></div>
					<div class="col-md-4">
						<b>Secretary<br/>
						Assam Higher Secondary Education Council<br/>
						Bamunimaidam,Guwahati-21</b>
					</div>
					<div class="col-md-8" style="margin-top:20px;"><input type="button" class="btn btn-success" target="_blank" onclick="printDiv('printableArea')" value="PRINT" /></div>
					<form action="rtgs_mis_excel" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="data" value="{{ json_encode($loans) }}">
						<button class="btn btn-info" style="margin-top:20px;" type="submit">Export Data to Excel <i class="fa fa-file-excel-o" aria-hidden="true"></i></button>
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
