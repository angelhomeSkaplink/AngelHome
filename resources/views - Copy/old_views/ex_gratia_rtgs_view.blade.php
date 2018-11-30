@extends('layouts.app')
@section('htmlheader_title')
    Ex Gratia
@endsection
@section('contentheader_title')
    OFFICE OF THE</br>
ASSAM HIGHER SECONDARY EDUCATION COUNCIL</br>
BAMUNIMAIDAM, GUWAHATI-21

@endsection
@section('main-content')

<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<style>
    @media print{
        body {font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif !important; font-size: 9px;}
        .table { font-size: 9px !important; border: none !important; }
    }
</style>
<div class="row" id="printableArea">
        <div class="col-md-12">						
            <div class="box box-primary"> 
                <div class="box-body">
					<b>Ex Gratia for the Month of  "{{ $month }}/{{ $year }}"</b>
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
								<td>{{ $loan->amount }}</td>
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
                </div>                
            </div>
        </div>
    </div>
<script>
	function printDiv(printpage)
	{
		var headstr = "<html><head><title>Ex Gratia</title></head><body>";
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
