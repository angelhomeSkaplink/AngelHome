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
					<b>MIS report by Salary deduction for {{ $month }}/{{ $year }}</b><br/>
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
								<th>GPF</th>
								<th>NPS</th>
								<th>GPF Loan</th>
								<th>Festival</th>
								<th>HBA</th>
								<th>LICI</th>
								<th>Professional Tax</th>
								<th>Income Tax</th>
								<th>Welfare</th>
								<th>Union Fee</th>
								<th>Kss</th>
								<th>GLSI</th>
								<th>Others</th>
								<th>Total</th>
							</tr>				
							
							<?php $i = 1; ?>
							@foreach ($loans as $loan)							
							<tr>
								<td>{{ $i++ }}</td>
								<td>{{ $loan->emp_id }}</td>
								<?php $employee = DB::table('employees')->where('emp_id', $loan->emp_id)->first(); ?>
								<td>{{ $employee->emp_f_name }} {{ $employee->emp_m_name }} {{ $employee->emp_l_name }}</td>
								<td>{{ $loan->gpf_deduction }}</td>
								<td>{{ $loan->nps_deduction }}</td>
								<td>{{ $loan->gpf_loan }}</td>
								<td>{{ $loan->festival_deduction }}</td>
								<td>{{ $loan->house_building_deduction }}</td>
								<td>{{ $loan->salary_saving_deduction }}</td>
								<td>{{ $loan->professional_tax_deduction }}</td>
								<td>{{ $loan->income_tax_deduction }}</td>
								<td>{{ $loan->welfare_deduction }}</td>
								<td>{{ $loan->union_fee }}</td>
								<td>{{ $loan->kss }}</td>
								<td>{{ $loan->glsi }}</td>
								<td>{{ $loan->other_deduction }}</td>
								<td>{{ $loan->total_deduction }}</td>
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
					<form action="deduction_excel" method="post">
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
