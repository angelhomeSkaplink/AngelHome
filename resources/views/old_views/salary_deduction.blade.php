@extends('layouts.app')
@section('htmlheader_title')
    Salary Deduction
@endsection
@section('contentheader_title')
    Salary Deduction
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
					url: 'salary_calculation/'+emp_id,
					type: "GET",						
					dataType: "json",
					success:function(data){
						//console.log(data);
						if(data){	
							document.getElementById('basic_pay').value = data.basic_pay;
							document.getElementById('nps_deduction').value = 0.1*data.basic_pay;
						}	
						else{
							document.getElementById('basic_pay').value = 0;
						}
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
					url: 'loan_calculation/'+emp_id,
					type: "GET",						
					dataType: "json",
					success:function(data){
						//console.log(data);
						var loan_ammount = data.loan_ammount;
						var emi = data.emi;
						if(loan_ammount > 0.00){
							document.getElementById('gpf_loan').value = emi;
						}
						else {
							document.getElementById('gpf_loan').value = 0;
						}
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
					url: 'housing_loan/'+emp_id,
					type: "GET",						
					dataType: "json",
					success:function(data){
						//console.log(data);
						var loan_ammount = data.loan_ammount;
						var emi = data.emi;
						var interest_emi = data.interest_emi
						if(loan_ammount > 0.00){
							document.getElementById('house_building_deduction').value = emi;
						}
						else {
							document.getElementById('house_building_deduction').value = interest_emi;
						}
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
					url: 'car_loan/'+emp_id,
					type: "GET",						
					dataType: "json",
					success:function(data){
						//console.log(data);
						var loan_ammount = data.loan_ammount;
						var emi = data.emi;
						var interest_emi = data.interest_emi
						if(loan_ammount > 0.00){
							document.getElementById('car_loan_deduction').value = emi;
						}
						else {
							document.getElementById('car_loan_deduction').value = interest_emi;
						}
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
					url: 'bike_loan/'+emp_id,
					type: "GET",						
					dataType: "json",
					success:function(data){
						console.log(data);
						var loan_ammount = data.loan_ammount;
						var emi = data.emi;
						var interest_emi = data.interest_emi
						if(loan_ammount > 0.00){
							document.getElementById('motor_cycle_deduction').value = emi;
						}
						else {
							document.getElementById('motor_cycle_deduction').value = interest_emi;
						}
					}					
				});
			}			
		});
	});
	
	function getGPFpersentage(){	
		var basic_pay = parseFloat(document.getElementById('basic_pay').value);
		var gpf_persentage = parseFloat(document.getElementById('gpf_persentage').value);
		var gpf_loan = parseFloat(document.getElementById('gpf_loan').value);
		var gpf_deduction = ((gpf_persentage/100)*basic_pay)+gpf_loan;
		document.getElementById('gpf_deduction').value = gpf_deduction;
		var nps_deduction = parseFloat(document.getElementById('nps_deduction').value);
		var festival_deduction = parseFloat(document.getElementById('festival_deduction').value);
		var house_building_deduction = parseFloat(document.getElementById('house_building_deduction').value);
		var car_loan_deduction = parseFloat(document.getElementById('car_loan_deduction').value);
		var motor_cycle_deduction = parseFloat(document.getElementById('motor_cycle_deduction').value);
		var group_deduction = parseFloat(document.getElementById('group_deduction').value);
		var salary_saving_deduction = parseFloat(document.getElementById('salary_saving_deduction').value);
		var professional_tax_deduction = parseFloat(document.getElementById('professional_tax_deduction').value);
		var income_tax_deduction = parseFloat(document.getElementById('income_tax_deduction').value);
		var welfare_deduction = parseFloat(document.getElementById('welfare_deduction').value);
		var other_deduction = parseFloat(document.getElementById('other_deduction').value);
		var total_deduction = gpf_deduction + nps_deduction + festival_deduction + house_building_deduction + car_loan_deduction + motor_cycle_deduction + group_deduction + salary_saving_deduction + professional_tax_deduction + income_tax_deduction + welfare_deduction + other_deduction;
		document.getElementById('total_deduction').value = total_deduction;		
	}	
</script>

<div class="row">
	<form action="salary_deduction_insert" method="post">
		<div class="col-md-4">
			<div class="box box-primary">				
				<div class="box-body">
					<div class="form-group has-feedback">
						Employee ID
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
						<input type="text" class="form-control" placeholder="" name="basic_pay" id="basic_pay" onkeyup="getGPFpersentage();" value="0" readonly />
					</div>
					<div class="form-group has-feedback">
						GPF Persentage
						<input type="text" class="form-control" placeholder="" name="gpf_persentage" id="gpf_persentage" onkeyup="getGPFpersentage();"/>
					</div>
					<div class="form-group has-feedback">
						GPF Loan
						<input type="text" class="form-control" placeholder="" name="gpf_loan" id="gpf_loan" onkeyup="getGPFpersentage();"  value="0" readonly  />
					</div>
					<div class="form-group has-feedback">
						GPF Deduction
						<input type="text" class="form-control" placeholder="" name="gpf_deduction" id="gpf_deduction" onkeyup="getGPFpersentage();" value="0" readonly />
					</div>					
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-body">
					<div class="form-group has-feedback">
						NPS Deduction
						<input type="text" class="form-control" placeholder="" name="nps_deduction" id="nps_deduction" readonly />
					</div>
					<div class="form-group has-feedback">
						Festival Deduction
						<input type="text" class="form-control" placeholder="" name="festival_deduction" id="festival_deduction" onkeyup="getGPFpersentage();" value="0" />
					</div>	
					<div class="form-group has-feedback">
						House Building Deduction
						<input type="text" class="form-control" placeholder="" name="house_building_deduction" id="house_building_deduction" onkeyup="getGPFpersentage();" value="0" readonly />
					</div>
					<div class="form-group has-feedback">
						Car Loan Deduction
						<input type="text" class="form-control" placeholder="" name="car_loan_deduction" id="car_loan_deduction" onkeyup="getGPFpersentage();" value="0" readonly />
					</div>
					<div class="form-group has-feedback">
						Motor Bike Deduction
						<input type="text" class="form-control" placeholder="" name="motor_cycle_deduction" id="motor_cycle_deduction" onkeyup="getGPFpersentage();" value="0" readonly />
					</div>
					<div class="form-group has-feedback">
						Group Insurance
						<input type="text" class="form-control" placeholder="" name="group_deduction" id="group_deduction" onkeyup="getGPFpersentage();" value="0" />
					</div>
					<div class="form-group has-feedback">
						Salary Savings/LIC
						<input type="text" class="form-control" placeholder="" name="salary_saving_deduction" id="salary_saving_deduction" onkeyup="getGPFpersentage();" value="0" />
					</div>
					<div class="form-group has-feedback">
						Professional Tax
						<input type="text" class="form-control" placeholder="" name="professional_tax_deduction" id="professional_tax_deduction" value="208" onkeyup="getGPFpersentage();" readonly />
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-body">
					<div class="form-group has-feedback">
						Income Tax
						<input type="text" class="form-control" placeholder="" name="income_tax_deduction" id="income_tax_deduction" onkeyup="getGPFpersentage();" value="0" />
					</div>
					<div class="form-group has-feedback">
						Welfare
						<input type="text" class="form-control" placeholder="" name="welfare_deduction" id="welfare_deduction" onkeyup="getGPFpersentage();" value="0" />
					</div>
					<div class="form-group has-feedback">
						Others
						<input type="text" class="form-control" placeholder="" name="other_deduction" id="other_deduction" onkeyup="getGPFpersentage();" value="0" />
					</div>
					<div class="form-group has-feedback">
						Total
						<input type="text" class="form-control" placeholder="" name="total_deduction" id="total_deduction" onkeyup="getGPFpersentage();"readonly />
					</div>
					<div class="form-group has-feedback">
						Month
						<select name="month" id="month" class="form-control">
							<option value="0">Select month</option>
							<option value="January">January</option>
							<option value="February">February</option>
							<option value="March">March</option>
							<option value="April">April</option>
							<option value="May">May</option>
							<option value="June">June</option>
							<option value="July">July</option>
							<option value="August">August</option>
							<option value="September">September</option>
							<option value="October">October</option>
							<option value="November">November</option>
							<option value="December">December</option>
						</select>
						</div>
					<div class="form-group has-feedback">
						Year
						<input type="text" class="form-control" placeholder="" name="year" id="year" value="" />
					</div>
					<div class="form-group has-feedback">
						Remarks
						<input type="text" class="form-control" placeholder="" name="remarks" id="remarks" value="" />
					</div>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="row">                    
						<div class="col-xs-4">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
						</div>
					</div>	
				</div>
			</div>
		</div>
		
	</form>
</div>


    @include('layouts.partials.scripts_auth')
@endsection
