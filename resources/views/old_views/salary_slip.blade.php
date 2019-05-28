@extends('layouts.app')
@section('htmlheader_title')
    Salary
@endsection
@section('contentheader_title')

Salary Slip for Staff
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
	BAMUNIMAIDAM, GUWAHATI-21</b>
	<div class="box-body">
		<div class="row">
		@if(Session::has('msg'))
					<div class="alert alert-danger">
						<strong>{{ Session::get('msg') }}</strong>
					</div>
				@endif
			@if(count($loan)>0)
			<div class="col-md-12">		
				<div class="box box-primary">
					<div class="box-header with-border">
						   <h3 class="box-title">Salary Slip for <b>{{ $loan->month }}/{{ $loan->year }}</b></h3>
					</div>
					<div class="box-body">
						<b>Name:
						<?php
							$employee = DB::table('employees')->where('emp_id', $loan->emp_id)->get();
							foreach($employee as $emp)
								echo $emp->emp_f_name ?>&nbsp;<?php echo $emp->emp_m_name ?>&nbsp;<?php echo $emp->emp_l_name
						?> </br>
						Designation:
						<?php 
							$employee = DB::table('posts')->where('fld_PostID', $emp->post_id)->first();
							echo $employee->fld_PostName;
						?> </br>
						Department:
						<?php 
							$employee = DB::table('departments')->where('fld_DeptID', $emp->fld_DeptID)->first();
							echo $employee->fld_Department;
						?></b>
						<table class="table table-bordered">
							<tbody>					
								<tr>
									<th style="width:50%">Claims</th>
									<th style="width:50%">Deductions</th>
								</tr>
								<table class="">
									<tr>
										<td>
											<table class="table table-bordered">
												<tr>
													<td style="width:300px">Basic Pay</td>
													<td style="width:300px"> {{ $loan->basic_pay }}</td>
													<td style="width:300px">GPF</td>
													<td style="width:300px">{{ $loan->gpf_deduction }}</td>												
												</tr>
												<tr>
													<td style="width:500px">Dearness Allowance</td>
													<td style="width:500px">{{ $loan->dearness_allowance }}</td>
													<td style="width:500px">NPS</td>
													<td style="width:500px">{{ $loan->nps_deduction }}</td>
												</tr>
												<tr>
													<td style="width:500px">HRA</td>
													<td style="width:500px">{{ $loan->hra }}</td>
													<td style="width:500px">Festival</td>
													<td style="width:500px">{{ $loan->festival_deduction }}</td>
												</tr>
												<tr>
													<td style="width:500px">Medical Allowance</td>
													<td style="width:500px">{{ $loan->medical_allowance }}</td>
													<td style="width:500px">House Building</td>
													<td style="width:500px">{{ $loan->house_building_deduction }}</td>
												</tr>
												<tr>
													@if($loan->conveyance_allowance>0)
													<td style="width:500px">Conveyance Allowance</td>
													<td style="width:500px">{{ $loan->conveyance_allowance }}</td>
													@else
													<td style="width:500px"></td>
													<td style="width:500px"></td>
													@endif
													<td style="width:300px">GPF Loan</td>
													<td style="width:300px">{{ $loan->gpf_loan }}</td>
												</tr>
												<tr>
													<td style="width:500px">City Allowance</td>
													<td style="width:500px">{{ $loan->city_allowance }}</td>
													<td style="width:500px">Bike Loan</td>
													<td style="width:500px">{{ $loan->motor_cycle_deduction }}</td>
												</tr>
												<tr>
													<td style="width:500px">Charge Allowance</td>
													<td style="width:500px">{{ $loan->charge_allow }}</td>
													
												</tr>
												<tr>
													<td style="width:500px">Other Allowance</td>
													<td style="width:500px">{{ $loan->others }}</td>
												</tr>
												<tr>
													<td style="width:500px">Gross</td>
													<td style="width:500px">{{ $loan->gross_salary }}</td>
													<td style="width:500px">Salary Saving</td>
													<td style="width:500px">{{ $loan->salary_saving_deduction }}</td>
												</tr>
												<tr>
													<td style="width:500px"></td>
													<td style="width:500px"></td>
													<td style="width:500px">Profissional Tax</td>
													<td style="width:500px">{{ $loan->professional_tax_deduction }}</td>
												</tr>
												<tr>
													<td style="width:500px"></td>
													<td style="width:500px"></td>
													<td style="width:500px">Income Tax</td>
													<td style="width:500px">{{ $loan->income_tax_deduction }}</td>
												</tr>
												<tr>
													<td style="width:500px"></td>
													<td style="width:500px"></td>
													<td style="width:500px">Welfare</td>
													<td style="width:500px">{{ $loan->welfare_deduction }}</td>
												</tr>
												<tr>
													<td style="width:500px"></td>
													<td style="width:500px"></td>
													<td style="width:500px">Union Fees</td>
													<td style="width:500px">{{ $loan->union_fee }}</td>
												</tr>
												<tr>
													<td style="width:500px"></td>
													<td style="width:500px"></td>
													<td style="width:500px">KSS</td>
													<td style="width:500px">{{ $loan->kss }}</td>
												</tr>
												<tr>
													<td style="width:500px"></td>
													<td style="width:500px"></td>
													<td style="width:500px">GLSI</td>
													<td style="width:500px">{{ $loan->glsi }}</td>
												</tr>
												<tr>
													<td style="width:500px"></td>
													<td style="width:500px"></td>
													<td style="width:500px">Others</td>
													<td style="width:500px">{{ $loan->other_deduction }}</td>
												</tr>
												<tr>
													<td style="width:500px"></td>
													<td style="width:500px"></td>
													<td style="width:500px">Total Deduction</td>
													<td style="width:500px">{{ $loan->total_deduction }}</td>
												</tr>
											</table>
										</td>
									</tr>						
								</table>
							</tbody>
						</table>
						<b>Net Salary = {{ $loan->gross_salary - $loan->total_deduction }}</b>
						<div class="col-md-8" style="margin-top:20px;"><input type="button" class="btn btn-success" target="_blank" onclick="printDiv('printableArea')" value="PRINT" /></div>
					</div>
					@else
						<div class="alert alert-danger">
							<strong>No Data Found</strong>
						</div>
					@endif	
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
