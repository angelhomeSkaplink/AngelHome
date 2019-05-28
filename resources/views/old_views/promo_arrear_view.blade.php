@extends('layouts.app')
@section('htmlheader_title')
    Arrears Calculation(Promotion/Scale Change)
@endsection
@section('contentheader_title')

Arrears Calculation(Promotion/Scale Change)
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
					@if(count($arrears)>0)
                    <table class="table table-bordered">
                        <tbody>
							<tr>
								<th>Name</th>
								<th>Initial Pay</th>
								<th>Grade Pay</th>
								<th>Basic</th>
								<th>DA</th>
								<th>HRA</th>
								<th>Medical</th>
								<th>Conveyance</th>
								<th>City</th>
								<th>Charge</th>
								<th>Gross</th>
								<th>GPF</th>
								<th>GPF Loan</th>
								<th>HBA</th>
								<th>Kss</th>
								<th>GLSI</th>
								<th>LICI</th>
								<th>P Tax</th>
								<th>CPS</th>
								<th>I Tax</th>
								<th>Welfare</th>
								<th>Union Fee</th>
								<th>Total Deduction</th>
								<th>Net Pay</th>
								<th>Reason</th>
							</tr>														
							<?php $i = 1; ?>
							@foreach ($arrears as $loan)							
							<tr>								
								<td>{{ $loan->emp_name }}</td>								
								<td>{{ $loan->initial_pay }}</td>
								<td>{{ $loan->grade_pay }}</td>								
								<td>{{ $loan->basic_pay }}</td>
								<td>{{ $loan->da }}</td>
								<td>{{ $loan->hra }}</td>
								<td>{{ $loan->ma }}</td>
								<td>{{ $loan->conv_allow }}</td>
								<td>{{ $loan->city_allow }}</td>
								<td>{{ $loan->charge_allow }}</td>
								<td>{{ $loan->gross }}</td>
								<td>{{ $loan->gpf }}</td>
								<td>{{ $loan->gpf_loan }}</td>
								<td>{{ $loan->hba }}</td>
								<td>{{ $loan->kss }}</td>
								<td>{{ $loan->gis }}</td>										
								<td>{{ $loan->lici }}</td>								
								<td>{{ $loan->p_tax }}</td>
								<td>{{ $loan->cps }}</td>
								<td>{{ $loan->i_tax }}</td>
								<td>{{ $loan->welfare }}</td>
								<td>{{ $loan->union_fee }}</td>
								<td>{{ $loan->total_deduction }}</td>
								<td>{{ $loan->net_pay }}</td>
								<td>{{ $loan->remarks }}</td>
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
