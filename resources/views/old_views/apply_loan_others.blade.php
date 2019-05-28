@extends('layouts.app')
@section('htmlheader_title')
    Apply Loan
@endsection
@section('contentheader_title')
     Apply Loan
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
							console.log(data);
							$.each(data, function() {	
								document.getElementById('firstname').value = data.emp_f_name;
								document.getElementById('middlename').value = data.emp_m_name;
								document.getElementById('lastname').value = data.emp_l_name;
								document.getElementById('fld_DeptID').value = data.fld_DeptID;
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
			<p class="login-box-msg"> Apply Loan</p>
			<form action="loaninsert" method="post">
                {!! csrf_field() !!}					
				<div class="form-group has-feedback">
					<select name="emp_id" id="emp_id" class="form-control" data-validation="required" data-validation-error-msg="Please Select employee ID">
						<option value="">Select Employee ID</option>
						<?php
							$users = DB::table('employees')->where('status', 1)->get();							
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
                    <input type="text" class="form-control" placeholder="First Name" name="firstname" id="firstname" value="" readonly />
                </div>
				<div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Middle Name" name="middlename" id="middlename" value="" readonly />
                </div>
				<div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Last Name" name="lastname" id="lastname" value="" readonly />
                </div>
				<div class="form-group has-feedback">
					<select name="loan_type_id" id="loan_type_id" class="form-control" required >
						<option value="0">Select Loan Type</option>
						<?php
							$users = DB::table('loan_type')->get();							
							foreach ($users as $user)
							{ 
								?>
									<option value="{{ $user->loan_type_id}}">{{ $user->loan_type }}</option>
								<?php 
							} ?>											
					</select>
				</div>
							
				<div class="form-group has-feedback">							
					Loan Amount 
                    <input type="text" class="form-control" placeholder="Loan Amount" name="loan_ammount" id='loan_ammount' value='' onkeyup='setGrades();' required pattern="[0-9]+" Title="Numeric Value Only"/>
                </div>				
                
				<div class="form-group has-feedback">
					Applied On
                    <input type="text" class="form-control" placeholder="" name="applied_on" value="<?php echo date("y/m/d") ?>" readonly />
                </div>
				<div class="form-group has-feedback">
					Applied For
                    <input type="text" class="form-control" placeholder="Applied For" name="applied_for" pattern="[A-Za-z]+" Title="Alphabate character Only"/>
                </div>				
				<div class="form-group has-feedback">
                    <input type="hidden" class="form-control" placeholder="" name="fld_DeptID" id="fld_DeptID" readonly />
                </div>
				<div class="form-group has-feedback">
                    <input type="hidden" class="form-control" placeholder="Status" name="status" value="1" readonly />
                </div>
                <div class="row">                    
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @include('layouts.partials.scripts_auth')
</body>

@endsection
