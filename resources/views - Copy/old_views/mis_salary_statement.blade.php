@extends('layouts.app')
@section('htmlheader_title')
    MIS report by Salary Statement
@endsection
@section('contentheader_title')

MIS report by Salary Statement
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
								<th colspan="11"></th>
								<th colspan="11" style="text-align:center">Deduction</th>
								
							</tr>
							<tr>
								<th>NAME</th>
								<th>INITIAL PAY</th>
								<th>PAY BAND</th>
								<th>BASIC PAY</th>
								<th>DA</th>
								<th>HRA</th>
								<th>MA</th>
								<th>CONV</th>
								<th>CA</th>
								<th>CHA</th>
								<th>GROSS SALARY</th>
								<th>GPF</th>
								<th>HB AVD</th>
								<th>KSS</th>
								<th>GIS</th>
								<th>LIC (SSS)</th>
								<th>P Tax</th>
								<th>C.P.S</th>
								<th>I Tax</th>
								<th>WELFARE</th>
								<th>UNION FEE</th>
								<th>FESTIVAL</th>
								<th>TOTAL DEDUC-TION</th>
								<th>NET PAY</th>
							</tr>
														
							<?php $i = 1; ?>
							@foreach ($loans as $loan)							
							<tr>
								<?php $employee = DB::table('employees')->where('emp_id', $loan->emp_id)->first(); ?>
								<?php $post = DB::table('posts')->where([['fld_PostID', $employee->post_id], ['fld_Status', 1]])->first(); ?>
								<td>{{ $employee->emp_f_name }} {{ $employee->emp_m_name }} {{ $employee->emp_l_name }},<br/>{{ $post->fld_PostName }}</td>
								<?php $pay = DB::table('servicebooks')->where([['emp_id', $loan->emp_id], ['status', 1]])->first(); ?>
								<td>{{ $pay->initialpay }}</td>
								<td>{{ $loan->basic_pay - $pay->initialpay }}</td>
								<td>{{ $loan->basic_pay }}</td>
								<td>{{ $loan->dearness_allowance }}</td>
								<td>{{ $loan->hra }}</td>
								<td>{{ $loan->medical_allowance }}</td>
								<td>{{ $loan->conveyance_allowance }}</td>
								<td>{{ $loan->city_allowance }}</td>
								<td>{{ $loan->charge_allow }}</td>
								<td>{{ $loan->gross_salary }}</td>
								@if($loan->gpf_loan>0)
								<td>{{ $loan->gpf_loan }}<br/>{{ $loan->gpf_deduction }}</td>
								@else
								<td>{{ $loan->gpf_deduction }}</td>
								@endif
								<td>{{ $loan->house_building_deduction }}</td>
								<td>{{ $loan->kss }}</td>
								<td>{{ $loan->glsi }}</td>
								<td>{{ $loan->salary_saving_deduction }}</td>
								<td>{{ $loan->professional_tax_deduction }}</td>
								<td>{{ $loan->nps_deduction }}</td>
								<td>{{ $loan->income_tax_deduction }}</td>
								<td>{{ $loan->welfare_deduction }}</td>
								<td>{{ $loan->union_fee }}</td>
								<td>{{ $loan->festival_deduction }}</td>
								<td>{{ $loan->total_deduction }}</td>
								<td>{{ $loan->gross_salary -  $loan->total_deduction}}</td>
							</tr>
							@endforeach
							<tr>
								<td><b>GRAND TOTAL</b></td>
								<td><b>{{ $initial_pay }}</b></td>							
								<td><b>{{ $grade_pay }}</b></td>
								<td><b>{{ $basic_pay }}</b></td>
								<td><b>{{ $dearness_allowance }}</b></td>
								<td><b>{{ $hra }}</b></td>
								<td><b>{{ $medical_allowance }}</b></td>
								<td><b>{{ $conveyance_allowance }}</b></td>
								<td><b>{{ $city_allowance }}</b></td>
								<td><b>{{ $charge_allow }}</b></td>
								<td><b>{{ $gross_salary }}</b></td>
								<td><b>{{ $total_gpf }}</b></td>
								<td><b>{{ $house_building_deduction }}</b></td>
								<td><b>{{ $kss }}</b></td>
								<td><b>{{ $glsi }}</b></td>
								<td><b>{{ $salary_saving_deduction }}</b></td>
								<td><b>{{ $professional_tax_deduction }}</b></td>
								<td><b>{{ $nps_deduction }}</b></td>
								<td><b>{{ $income_tax_deduction }}</b></td>
								<td><b>{{ $welfare_deduction }}</b></td>
								<td><b>{{ $union_fee }}</b></td>
								<td><b>{{ $festival_deduction }}</b></td>
								<td><b>{{ $total }}</b></td>
								<td><b>{{ $gross_salary - $total }}</b></td>
							</tr>
							@else
							<div class="alert alert-danger">
								<strong>No Data Found</strong>
							</div>
							@endif
                        </tbody>
                    </table><br/><br/>
					<br/><br/><br/><br/><br/>	
					<table class="table table-bordered">
                        <tbody>
							<tr>
								<th colspan="">CASHIER </th>
								<th colspan="3">SUPERINTENDENT A/C</th>
								<th colspan="">ASSTT. SECY. (F)	 </th>
								<th colspan="">DY. SECY. (FINANCE) A/C</th>
								<th colspan="">SECRET	ARY </th>
							</tr>
						</tbody>
					</table>
					<div class="col-md-8" style="margin-top:20px;">
						<input type="button" class="btn btn-success" target="_blank" onclick="printDiv('printableArea')" value="PRINT" />						
					</div>	
					<form action="statement_excel" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="data" value="{{ json_encode($loans) }}">
						<input type="hidden" name="data1" value="{{ json_encode($month) }}">
						<button class="btn btn-info" type="submit" style="margin-top:20px;">Export Data to Excel <i class="fa fa-file-excel-o" aria-hidden="true"></i></button>
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
