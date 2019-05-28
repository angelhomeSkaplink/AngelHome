
@extends('layouts.app')

@section('htmlheader_title')
    Income Tax
@endsection

@section('contentheader_title')
    Income Tax
@endsection

@section('main-content')
<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="js/bootstrap-datepicker.js"></script>
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
						console.log(data);
						$.each(data, function() {	
							document.getElementById('firstname').value = data.emp_f_name;
							document.getElementById('middlename').value = data.emp_m_name;
							document.getElementById('lastname').value = data.emp_l_name;
						});
					}
				});
			}					
		});
	});
</script>
<div class="row">
	<form action="incometax_store" method="post">
		{{ csrf_field() }}
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-header with-border">
				   <h3 class="box-title">Income Tax</h3>
				</div>
				<div class="box-body">					
					<div class="required">
						<div class="form-group has-feedback">
							<select required x-moz-errormessage="Please Select an item from the list" name="emp_id" id="emp_id" class="form-control">
								<option value="">Select Employee ID</option>
								<?php
									$users = DB::table('employees')->get();							
									foreach ($users as $user)
									{ 
										?>
											<option value="{{ $user->emp_id }}">{{ $user->emp_id }}</option>
										<?php 
									}														
								?>												
							</select>
						</div>	
					</div>
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="First Name" name="firstname" id="firstname" data-validation="required" data-validation-error-msg="This Field is Required" readonly />
					</div>
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Middle Name" name="middlename" id="middlename" value="" readonly />
					</div>
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Last Name" name="lastname" id="lastname" value="" readonly />
					</div>
									
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="PAN No" name="pan_no" id="pan_no" data-validation="required" data-validation-error-msg="Required Field"/>
					</div> 					
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="box box-primary">				
				<div class="box-body">
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="LIC Policy No" name="lic_policy_no" id="lic_policy_no"/>
					</div>
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="LIC Policy Amount" name="bank_account_number" id="bank_account_number" data-validation="required" data-validation-error-msg="This Field is Required"/>
					</div>
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="PLI No" name="pli_no" id="pli_no" value=""/>
					</div>
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="PLI Amount" name="pli_amount" id="pli_amount" value=""/>
					</div>
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="PPF No" name="ppf_no" id="ppf_no" value=""/>
					</div>
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="PPF Amount" name="ppf_amount" id="ppf_amount" value=""/>
					</div> 
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="box box-primary"> 							
				<div class="box-body">					
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="NSC No" name="nsc_no" id="nsc_no" value=""/>
					</div>
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="NSC Amount" name="nsc_amount" id="nsc_amount" value=""/>
					</div>
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="HRA" name="hra" id="hra" value=""/>
					</div>
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Housing Loan" name="housing_loan" id="housing_loan" value=""/>
					</div>
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Any Other" name="any_other" value=""/>
					</div>
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
<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script src="js/jquery.form-validator.min.js" type="text/javascript"></script>
<script>
    $.validate({
    });
</script>
    @include('layouts.partials.scripts_auth')

@endsection
