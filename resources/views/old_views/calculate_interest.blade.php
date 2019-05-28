
@extends('layouts.app')

@section('htmlheader_title')
    Calculate Interest
@endsection

@section('contentheader_title')
    Calculate Interest
@endsection

@section('main-content')
<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="js/bootstrap-datepicker.js"></script>
<script>
	$(document).ready(function() {  
		$(document).ready(function() {
			$('select[name="emp_id"]').on('change', function() {
				var emp_id = $(this).val();
				if(emp_id) {
					$.ajax({
						url: 'employee_name/'+emp_id,
						type: "GET",						
						dataType: "json",
						success:function(data) {
							//console.log(data);
							$.each(data, function() {	
								document.getElementById('firstname').value = data.emp_f_name;
								document.getElementById('middlename').value = data.emp_m_name;
								document.getElementById('lastname').value = data.emp_l_name;
							});
						}
					});
				}					
			});
			$('select[name="emp_id"]').on('change', function() {
				var emp_id = $(this).val();
				if(emp_id) {
					$.ajax({
						url: 'loan_details/'+emp_id,
						type: "GET",						
						dataType: "json",
						success:function(data) {
							console.log(data);
							$.each(data, function() {	
								document.getElementById('principal_installment').value = data.principal_installment;
								document.getElementById('emi').value = data.emi;
								document.getElementById('no_of_instalment_interest').value = data.no_of_instalment_interest;
							});
						}
					});
				}
			});
		});
	});
</script>
<body class="hold-transition register-page">
    <div class="register-box">        
        <div class="register-box-body">
            <p class="login-box-msg">Calculate Interest</p>
            <form action="interest_calculation" method="post">
				<div class="form-group has-feedback">
					<select name="emp_id" id="emp_id" class="form-control" data-validation="required" data-validation-error-msg="Please Select employee ID">
						<option value="">Select Employee ID</option>
						<?php
							$users = DB::table('loan_trasection')->where('status', '3')->get();							
							foreach ($users as $user)
							{ 
								?>
									<option value="{{ $user->emp_id }}">{{ $user->emp_id }}</option>									
								<?php
							}														
						?>												
					</select>
				</div>
				<div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="First Name" name="firstname" id="firstname" value="" readonly />
                </div>
				<div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Middle Name" name="middlename" id="middlename" value="" readonly />
                </div>
				<div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Last Name" name="lastname" id="lastname" value="" readonly />
                </div>
				<div class="form-group has-feedback">
					Principal Installment
                    <input type="text" class="form-control" name="principal_installment" id="principal_installment" required pattern="[0-9]+" Title="Numeric Value Only" />
                </div>
				<div class="form-group has-feedback">
					Principal EMI
                    <input type="text" class="form-control" name="emi" id="emi" required pattern="[0-9]+" Title="Numeric Value Only" />
                </div>
				<div class="form-group has-feedback">
					Interest Percentage
                    <input type="text" class="form-control" placeholder="" name="interest" id="interest" required pattern="[0-9.]+" Title="Numeric Value Only" />
                </div>
				<div class="form-group has-feedback">
					No of Installment
                    <input type="text" class="form-control" name="no_of_instalment_interest" id="no_of_instalment_interest" required pattern="[0-9]+" Title="Numeric Value Only" />
                </div>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">                    
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
	<script src="js/jquery.form-validator.min.js" type="text/javascript"></script>
	<script>
        $.validate({
        });
    </script>
    @include('layouts.partials.scripts_auth')
</body>
@endsection
