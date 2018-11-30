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
						<b>MIS report by Loan for {{ $month }}/{{ $year }}</b><br/>
					</div>
					@if(count($loans)>0)
                    <table class="table table-bordered">
                        <tbody>
							<tr>
								<th>Sl. No</th>
								<th>Employee Code</th>
								<th>Employee Name</th>								
								<th>Department</th>
								<th>Designation</th>
								<th>Loan Type</th>
								<th>Recovered Amount</th>
								<th>Outstanding Amount</th>
								<th>Installment</th>								
							</tr>						
							<?php $i = 1; ?>
							@foreach ($loans as $loan)							
							<tr>
								<td>{{ $i++ }}</td>
								<td>{{ $loan->emp_id }}</td>
								<?php $employee = DB::table('employees')->where('emp_id', $loan->emp_id)->first(); ?>
								<td>{{ $employee->emp_f_name }} {{ $employee->emp_m_name }} {{ $employee->emp_l_name }}</td>
								<?php $dept = DB::table('departments')->where([['fld_DeptID', $loan->fld_DeptID], ['fld_Status', 1]])->first(); ?>
								<td>{{ $dept->fld_Department }}</td>
								<?php $r = DB::table('posts')->where('fld_PostID', $employee->post_id)->first(); ?>
								<td>{{ $r->fld_PostName }}</td>
								<?php $row = DB::table('loan_type')->where('loan_type_id', $loan->loan_type_id)->first(); ?>
								<td>{{ $row->loan_type }}</td>
								<td>{{ $loan->loan_ammount - $loan->outstanding_principal }}</td>
								<td>{{ $loan->outstanding_principal }}</td>
								<td>{{ $loan->principal_installment }}/{{ $loan->no_of_instalment }}</td>
							</tr>							
							@endforeach
							@else
							<div class="alert alert-danger">
								<strong>No Data Found</strong>
							</div>
							@endif
                        </tbody>
                    </table>
					<div class="col-md-8" style="margin-top:20px;">
						<input type="button" class="btn btn-success" target="_blank" onclick="printDiv('printableArea')" value="PRINT" />
					</div>							
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
