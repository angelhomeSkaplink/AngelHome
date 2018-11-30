@extends('layouts.app')
@section('htmlheader_title')
    Salary Claim
@endsection
@section('contentheader_title')
@endsection
@section('main-content')

<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script>
	$(document).ready(function() {
		$('select[name="emp_id"]').on('change', function() {
			var emp_id = $(this).val();
			if(emp_id) {
				$.ajax({
					url: 'employee_name/'+emp_id,
					type: "GET",
					dataType: "json",
					success:function(data) {
						$.each(data, function() {	
							document.getElementById('emp_f_name').value = data.emp_f_name;
							document.getElementById('emp_m_name').value = data.emp_m_name;
							document.getElementById('emp_l_name').value = data.emp_l_name;
						});
					}
				});
			}					
		});
	});
	
	$(document).ready(function() {
		$('select[name="emp_id"]').on('change', function() {
			var emp_id = $(this).val();			
			if(emp_id) {
				$.ajax({
					url: 'salary_details/'+emp_id,
					type: "GET",
					dataType: "json",
					success:function(data) {
						$.each(data, function() {
							document.getElementById('salary_claim_id').value = data.salary_claim_id;
							document.getElementById('basic_pay').value = data.basic_pay;
							document.getElementById('city_allowance').value = data.city_allowance;
							document.getElementById('conveyance_allowance').value = data.conveyance_allowance;
							document.getElementById('dearness_allowance').value = data.dearness_allowance;
							document.getElementById('gross_salary').value = data.gross_salary;
							document.getElementById('hra').value = data.hra;
							document.getElementById('medical_allowance').value = data.medical_allowance;
						});
					}
				});
			}		
		});
	});
	
	function getGrossSalary(){	
		var basic_pay = parseFloat(document.getElementById('basic_pay').value);
		var dearness_allowance = parseFloat(document.getElementById('dearness_allowance').value);
		var hra = parseFloat(document.getElementById('hra').value);
		var medical_allowance = parseFloat(document.getElementById('medical_allowance').value);
		var conveyance_allowance = parseFloat(document.getElementById('conveyance_allowance').value);
		var city_allowance = parseFloat(document.getElementById('city_allowance').value);
		var others = parseFloat(document.getElementById('others').value);
		var gross_salary = basic_pay + dearness_allowance + hra + medical_allowance + conveyance_allowance + city_allowance + others;
		document.getElementById('gross_salary').value = gross_salary;
	}
</script>
<div class="row">
	<form action="update_sallary_claim" method="post">	
	<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Salary Claim</h3>
				</div>
				<div class="box-body">	
					<div class="form-group has-feedback">
						<select name="emp_id" id="emp_id" class="form-control">
							<option value="0">Select Employee ID</option>
							<?php
								$users = DB::table('employees')->get();							
								foreach ($users as $user)
								{ 
								?>
									<option value="{{ $user->emp_id}}">{{ $user->emp_id }}</option>
								<?php
								}														
							?>												
						</select>
					</div>
					<div class="form-group has-feedback">
						First Name
						<input type="text" class="form-control" placeholder="" name="emp_f_name" id="emp_f_name" readonly />
					</div>
					<div class="form-group has-feedback">
						Middle Name
						<input type="text" class="form-control" placeholder="" name="emp_f_name" id="emp_m_name" readonly />
					</div>
					<div class="form-group has-feedback">
						Last Name
						<input type="text" class="form-control" placeholder="" name="emp_f_name" id="emp_l_name" readonly />
					</div>
					<div class="form-group has-feedback">
						Basic Pay
						<input type="text" class="form-control" placeholder="" name="basic_pay" id="basic_pay" onkeyup="getGrossSalary();" value="0" readonly />
					</div>										
				</div>
			</div>
		</div>
		<div class="col-md-4">			
			<div class="box box-primary">				
				<div class="box-body">
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" placeholder="" name="salary_claim_id" id="salary_claim_id" readonly />
					</div>
					<div class="form-group has-feedback">
						Dearness Allowance
						<input type="text" class="form-control" placeholder="" name="dearness_allowance" id="dearness_allowance" onkeyup="getGrossSalary();" value="0" readonly />
					</div>
					<div class="form-group has-feedback">
						HRA
						<input type="text" class="form-control" placeholder="" name="hra" id="hra" onkeyup="getGrossSalary();" value="0" readonly />
					</div>
					<div class="form-group has-feedback">
						Medical Allowance
						<input type="text" class="form-control" placeholder="" name="medical_allowance" id="medical_allowance" onkeyup="getGrossSalary();" value="0"/>
					</div>
					<div class="form-group has-feedback">
						Conveyance Allowance
						<input type="text" class="form-control" placeholder="" name="conveyance_allowance" id="conveyance_allowance" onkeyup="getGrossSalary();" value="0"/>
					</div>
					<div class="form-group has-feedback">
						City Allowance
						<input type="text" class="form-control" placeholder="" name="city_allowance" id="city_allowance" onkeyup="getGrossSalary();" value="0" />
					</div>					
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-body">
					<div class="form-group has-feedback">
						Other Allowance
						<input type="text" class="form-control" placeholder="" name="others" id="others" onkeyup="getGrossSalary();" value="0" />
					</div>
					<div class="form-group has-feedback">
						Gross Salary
						<input type="text" class="form-control" placeholder="" name="gross_salary" id="gross_salary" value="" readonly />
					</div>					
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="row">                    
						<div class="col-xs-4">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Update</button>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</form>
</div>
@include('layouts.partials.scripts_auth')
@endsection
