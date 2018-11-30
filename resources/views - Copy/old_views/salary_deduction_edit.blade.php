@extends('layouts.app')
@section('htmlheader_title')
    Salary Deduction Edit
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
					url: 'salary_deduction_details/'+emp_id,
					type: "GET",
					dataType: "json",
					success:function(data) {
						$.each(data, function() {							
							document.getElementById('salary_deduction_id').value = data.salary_deduction_id;
							document.getElementById('gpf_deduction').value = data.gpf_deduction;
							document.getElementById('gpf_loan').value = data.gpf_loan;								
							document.getElementById('nps_deduction').value = data.nps_deduction;
							document.getElementById('festival_deduction').value = data.festival_deduction;
							document.getElementById('house_building_deduction').value = data.house_building_deduction;
							document.getElementById('car_loan_deduction').value = data.car_loan_deduction;
							document.getElementById('motor_cycle_deduction').value = data.motor_cycle_deduction;
							document.getElementById('salary_saving_deduction').value = data.salary_saving_deduction;
							document.getElementById('professional_tax_deduction').value = data.professional_tax_deduction;
							document.getElementById('income_tax_deduction').value = data.income_tax_deduction;
							document.getElementById('welfare_deduction').value = data.welfare_deduction;
							document.getElementById('other_deduction').value = data.other_deduction;
							document.getElementById('union_fee').value = data.union_fee;
							document.getElementById('kss').value = data.kss;
							document.getElementById('glsi').value = data.glsi;
							document.getElementById('total_deduction').value = data.total_deduction;
						});
					}
				});
			}		
		});
		$('select[name="emp_id"]').on('change', function() {
			var emp_id = $(this).val();			
			if(emp_id) {
				$.ajax({
					url: 'gpf_percentage/'+emp_id,
					type: "GET",
					dataType: "json",
					success:function(data) {
						$.each(data, function() {													
							document.getElementById('gpf_percentage').value = data.gpf_persentage;
							document.getElementById('basic_pay').value = data.basic_pay;
						});
					}
				});
			}		
		});	
	});
	
	function getGPFpersentage(){
		var basic_pay = document.getElementById('basic_pay').value;		
		var gpf_deduction = parseFloat(document.getElementById('gpf_deduction').value);
		var gpf_loan = parseFloat(document.getElementById('gpf_loan').value);
		var nps_deduction = parseFloat(document.getElementById('nps_deduction').value);
		var festival_deduction = parseFloat(document.getElementById('festival_deduction').value);
		var house_building_deduction = parseFloat(document.getElementById('house_building_deduction').value);
		var car_loan_deduction = parseFloat(document.getElementById('car_loan_deduction').value);
		var motor_cycle_deduction = parseFloat(document.getElementById('motor_cycle_deduction').value);
		var salary_saving_deduction = parseFloat(document.getElementById('salary_saving_deduction').value);
		var professional_tax_deduction = parseFloat(document.getElementById('professional_tax_deduction').value);
		var income_tax_deduction = parseFloat(document.getElementById('income_tax_deduction').value);
		var welfare_deduction = parseFloat(document.getElementById('welfare_deduction').value);
		var other_deduction = parseFloat(document.getElementById('other_deduction').value);
		var union_fee = parseFloat(document.getElementById('union_fee').value);
		var kss = parseFloat(document.getElementById('kss').value);
		var glsi = parseFloat(document.getElementById('glsi').value);
		var total_deduction = gpf_deduction + gpf_loan + nps_deduction + festival_deduction + house_building_deduction + car_loan_deduction + motor_cycle_deduction + salary_saving_deduction + professional_tax_deduction + income_tax_deduction + welfare_deduction + other_deduction + union_fee + kss + glsi;
		document.getElementById('total_deduction').value = total_deduction;	
	}
</script>

<div class="row">
	@if(Session::has('msg'))
		<div class="alert alert-danger">
			<strong>{{ Session::get('msg') }}</strong>
		</div>
	@endif
	<form action="salary_deduction_update" method="post">
		<div class="col-md-4">
			<div class="box box-primary">				
				<div class="box-body">
					<div class="form-group has-feedback">
						Employee ID
						<select name="emp_id" id="emp_id" class="form-control" data-validation="required" data-validation-error-msg="Please Select Employee ID">
							<option value="">Select Employee ID</option>
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
						<input type="text" class="form-control" placeholder="" name="emp_f_name" id="emp_f_name"  />
					</div>
					<div class="form-group has-feedback">
						Middle Name
						<input type="text" class="form-control" placeholder="" name="emp_f_name" id="emp_m_name"  />
					</div>
					<div class="form-group has-feedback">
						Last Name
						<input type="text" class="form-control" placeholder="" name="emp_f_name" id="emp_l_name"  />
					</div>
					<div class="form-group has-feedback">
						Basic Pay
						<input type="text" class="form-control" placeholder="" name="basic_pay" id="basic_pay" onkeyup="getGPFpersentage();" data-validation="number" data-validation-error-msg="Numeric Value Only"  />
					</div>
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" placeholder="" name="salary_deduction_id" id="salary_deduction_id" onkeyup="getGPFpersentage();" />
					</div>
					<td><input type="hidden" class="form-control" placeholder="" name="gpf_percentage" id="gpf_percentage" onkeyup="getGPFpersentage();" /></td>
					<div class="form-group has-feedback">
						GPF Deduction
						<input type="text" class="form-control" placeholder="" name="gpf_deduction" id="gpf_deduction" onkeyup="getGPFpersentage();" data-validation="number" data-validation-error-msg="Numeric Value Only"  />
					</div>
					<div class="form-group has-feedback">
						GPF loan
						<input type="text" class="form-control" placeholder="" name="gpf_loan" id="gpf_loan" onkeyup="getGPFpersentage();" data-validation="number" data-validation-error-msg="Numeric Value Only"  />
					</div>
					<div class="form-group has-feedback">
						NPS Deduction
						<input type="text" class="form-control" placeholder="" name="nps_deduction" id="nps_deduction" data-validation="number" data-validation-error-msg="Numeric Value Only"  />
					</div>
					<div class="form-group has-feedback">
						Festival Deduction
						<input type="text" class="form-control" placeholder="" name="festival_deduction" id="festival_deduction" onkeyup="getGPFpersentage();" data-validation="number" data-validation-error-msg="Numeric Value Only" />
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-body">						
					<div class="form-group has-feedback">
						House Building Deduction
						<input type="text" class="form-control" placeholder="" name="house_building_deduction" id="house_building_deduction" onkeyup="getGPFpersentage();" data-validation="number" data-validation-error-msg="Numeric Value Only" />
					</div>
					<div class="form-group has-feedback">
						Car Loan Deduction
						<input type="text" class="form-control" placeholder="" name="car_loan_deduction" id="car_loan_deduction" onkeyup="getGPFpersentage();" data-validation="number" data-validation-error-msg="Numeric Value Only"  />
					</div>
					<div class="form-group has-feedback">
						Motor Bike Deduction
						<input type="text" class="form-control" placeholder="" name="motor_cycle_deduction" id="motor_cycle_deduction" onkeyup="getGPFpersentage();" data-validation="number" data-validation-error-msg="Numeric Value Only" />
					</div>					
					<div class="form-group has-feedback">
						Salary Savings/LIC
						<input type="text" class="form-control" placeholder="" name="salary_saving_deduction" id="salary_saving_deduction" onkeyup="getGPFpersentage();" data-validation="number" data-validation-error-msg="Numeric Value Only" />
					</div>
					<div class="form-group has-feedback">
						Professional Tax
						<input type="text" class="form-control" placeholder="" name="professional_tax_deduction" id="professional_tax_deduction" value="208" onkeyup="getGPFpersentage();" required pattern="[0-9.]+" />
					</div>
					<div class="form-group has-feedback">
						Income Tax
						<input type="text" class="form-control" placeholder="" name="income_tax_deduction" id="income_tax_deduction" onkeyup="getGPFpersentage();" required pattern="[0-9.]+" />
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-body">					
					<div class="form-group has-feedback">
						Welfare
						<input type="text" class="form-control" placeholder="" name="welfare_deduction" id="welfare_deduction" onkeyup="getGPFpersentage();" required pattern="[0-9.]+" />
					</div>
					<div class="form-group has-feedback">
						Others
						<input type="text" class="form-control" placeholder="" name="other_deduction" id="other_deduction" onkeyup="getGPFpersentage();" required pattern="[0-9.]+" />
					</div>
					<div class="form-group has-feedback">
						Union Fee
						<input type="text" class="form-control" placeholder="" name="union_fee" id="union_fee" onkeyup="getGPFpersentage();" required pattern="[0-9.]+" />
					</div>
					<div class="form-group has-feedback">
						KSS
						<input type="text" class="form-control" placeholder="" name="kss" id="kss" onkeyup="getGPFpersentage();" required pattern="[0-9.]+" />
					</div>
					<div class="form-group has-feedback">
						GLSI
						<input type="text" class="form-control" placeholder="" name="glsi" id="glsi" onkeyup="getGPFpersentage();" required pattern="[0-9.]+" />
					</div>
					<div class="form-group has-feedback">
						Total
						<input type="text" class="form-control" placeholder="" name="total_deduction" id="total_deduction" onkeyup="getGPFpersentage();" required pattern="[0-9.]+" />
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
<script src="js/jquery.form-validator.min.js" type="text/javascript"></script>
<script>
    $.validate({
    });
</script>
@include('layouts.partials.scripts_auth')
@endsection
