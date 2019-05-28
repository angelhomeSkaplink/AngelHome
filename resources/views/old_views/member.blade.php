
@extends('layouts.app')

@section('htmlheader_title')
    Users
@endsection

@section('contentheader_title')
    Users 
@endsection

@section('main-content')
<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
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
								var name = data.emp_f_name.toLowerCase();
								var first_name = name.replace(/\s+/g, '');
								var user_name = emp_id.concat(first_name);
								document.getElementById('user_name').value = user_name;
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
            <p class="login-box-msg">Members</p>
            <form action="insert" method="post">

                {!! csrf_field() !!}
				<div class="required">
					<div class="form-group has-feedback">
						<select name="emp_id" id="emp_id" class="form-control" data-validation="required" data-validation-error-msg="Enter Name">
							<option value="">Select User ID</option>
							<?php
								$users = DB::table('employees')->where('status', 1)->get();							
								foreach ($users as $user)
								{ 
									?>
										<option value="{{ $user->emp_id}}">{{ $user->emp_id }}</option>
									<?php 
								} ?>											
						</select>
					</div>
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
                    <input type="text" class="form-control" placeholder="User Name" name="email" id="user_name" data-validation="required" data-validation-error-msg="Enter User Name"/>
                </div> 
				<div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password" data-validation="required" data-validation-error-msg="Enter Password"/>
                </div>
				<div class="form-group has-feedback">
					<select class="form-control" multiple="true" name="role[]" id="role" data-validation="required" data-validation-error-msg="This Field Is Required" >
						<option value="">Select a Role</option>
						<option value="1">Admin</option>
						<option value="2">Establishment</option>						
						<option value="3">Accounts</option>
						<option value="4">Pension</option>
						<option value="5">Employee</option>
						<option value="6">Operator</option>
						<option value="7">Deputy Secretary</option>
						<option value="8">Secretary</option>
						<option value="9">Chairman</option>
					</select>
				</div>
				<input type="hidden" class="form-control" placeholder="Password" name="status" value="1"/>				
				<div class="form-group has-feedback">
                    <input type="hidden" class="form-control" placeholder="" name="submission_date" value="<?php echo date('Y/m/d'); ?>"/>
				</div>
                <div class="row">                    
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/jquery.form-validator.min.js" type="text/javascript"></script>
	<script>
        $.validate({
        });
    </script>
@include('layouts.partials.scripts_auth')
</body>
@endsection
