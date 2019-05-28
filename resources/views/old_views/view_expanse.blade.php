@extends('layouts.app')

@section('htmlheader_title')
    Bill
@endsection

@section('contentheader_title')
    Bill
@endsection

@section('main-content')
<style>
    @media print
    {
        body {font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif !important; font-size: 9px;}
        .table { font-size: 9px !important; border: none !important; }
    }
</style>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">                
                <div class="box-body" id="printableArea">
                    <table class="table table-bordered">
                        <tbody>
							<tr>
								<th>Sl. No</th>
								<th>Employee Code</th>								
								<th>Employee Name</th>
								<th>Expanse Type</th>
								<th>Bank Account No</th>
								<th>Bank Name</th>
								<th>Ifsc Code</th>
								<th>Amount</th>
							</tr>
							<?php $i=1 ?>
							@foreach ($rows as $row)
							<tr>
								<td>{{ $i++ }}</td>
								<td>{{ $row->emp_id }}</td>								
								<?php $employee = DB::table('employees')->where('emp_id', $row->emp_id)->first(); ?>
								<td>{{ $employee->emp_f_name }} {{ $employee->emp_m_name }} {{ $employee->emp_l_name }}</td>
								<td>{{ $row->expance }}</td>
								<td>{{ $employee->bank_account_number }}</td>
								<td>{{ $employee->bank_name }}</td>
								<td>{{ $employee->ifsc }}</td>
								<td>{{ $row->amount }}</td>
							</tr>
							@endforeach
                        </tbody>
                    </table>
                </div>
				<div class="col-md-8" style="margin-top:20px;"><input type="button" class="btn btn-success" target="_blank" onclick="printDiv('printableArea')" value="PRINT" /></div>
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
@endsection
@section('scripts-extra')

@endsection