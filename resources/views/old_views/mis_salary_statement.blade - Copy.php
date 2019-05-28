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
						<b>MIS report by Salary Statement for {{ $month }}/{{ $year }}</b><br/>
					</div>
					@if(count($loans)>0)
                    <table class="table table-bordered">
                        <tbody>
							<tr>								
								<th>Name</th>								
								<th>Basic</th>
								<th>DA</th>
								<th>HRA</th>
								<th>Medical</th>
								<th>Conveyance</th>
								<th>City</th>
								<th>Charge</th>
								<th>Gross</th>
								<th>GPF</th>
								<th>NPS</th>
								<th>Festival</th>
								<th>HBA</th>
								<th>LICI</th>
								<th>P Tax</th>
								<th>I Tax</th>
								<th>Welfare</th>
								<th>Union Fee</th>
								<th>Kss</th>
								<th>GLSI</th>
								<th>Total</th>
								<th>Net Pay</th>
							</tr>														
							<?php $i = 1; ?>
							@foreach ($loans as $loan)							
							<tr>								
								<?php $employee = DB::table('employees')->where('emp_id', $loan->emp_id)->first(); ?>
								<td>{{ $employee->emp_f_name }} {{ $employee->emp_m_name }} {{ $employee->emp_l_name }}</td>
								<td>{{ $loan->basic_pay }}</td>
								<td>{{ $loan->dearness_allowance }}</td>
								<td>{{ $loan->hra }}</td>
								<td>{{ $loan->medical_allowance }}</td>
								<td>{{ $loan->conveyance_allowance }}</td>
								<td>{{ $loan->city_allowance }}</td>
								<td>{{ $loan->charge_allow }}</td>
								<td>{{ $loan->gross_salary }}</td>
								@if($loan->gpf_loan>0)
									<td>{{ $loan->principal_installment }}/{{ $loan->no_of_instalment }}<br/>{{ $loan->gpf_loan }}<br/>{{ $loan->gpf_deduction }}</td>
								@else
									<td>{{ $loan->gpf_deduction }}</td>
								@endif
								<td>{{ $loan->nps_deduction }}</td>
								<td>{{ $loan->festival_deduction }}</td>
								<?php if($loan->house_building_deduction>0) {?>
									@if($loan->house_building_deduction==$loan->emi||$loan->house_building_deduction==$loan->f_installment)
										<td>{{ $loan->principal_installment }}/{{ $loan->no_of_instalment }}<br/>{{ $loan->house_building_deduction }}</td>
									@else
										<td>{{ $loan->interest_installment }}/{{ $loan->no_of_instalment_interest }}<br/>{{ $loan->house_building_deduction }}</td>
									@endif	
								<?php } else {?>
									<td>{{ $loan->house_building_deduction }}</td>
								<?php } ?>	
								<td>{{ $loan->salary_saving_deduction }}</td>								
								<td>{{ $loan->professional_tax_deduction }}</td>
								<td>{{ $loan->income_tax_deduction }}</td>
								<td>{{ $loan->welfare_deduction }}</td>
								<td>{{ $loan->union_fee }}</td>
								<td>{{ $loan->kss }}</td>
								<td>{{ $loan->glsi }}</td>
								<td>{{ $loan->total_deduction }}</td>
								<td>{{ $loan->gross_salary -  $loan->total_deduction}}</td>
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
