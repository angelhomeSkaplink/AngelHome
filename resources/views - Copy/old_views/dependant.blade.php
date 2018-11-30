
@extends('layouts.app')

@section('htmlheader_title')
    Dependant Master
@endsection

@section('contentheader_title')
    Dependant Master
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
            <p class="login-box-msg">Dependant</p>
            <form action="dependantinsert" method="post">
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
					<select name="relation" id="relation" class="form-control" data-validation="required" data-validation-error-msg="Please Select Relation Type">
						<option value="">Select Relation</option>
						<option value="Mother">Mother</option>
						<option value="Father">Father</option>
						<option value="Brother">Brother</option>
						<option value="Sister">Sister</option>
						<option value="Spouse">Spouse</option>
					</select>
				</div>
				<div class="form-group has-feedback">
					Dependant First Name
                    <input type="text" class="form-control" placeholder="First Name" name="first_name" required pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>
                </div>
				<div class="form-group has-feedback">
					Dependant Last Name
                    <input type="text" class="form-control" placeholder="Last Name" name="last_name" required pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>
                </div>
				<div class="form-group has-feedback">
					Dependant Date of Birth
                    <input type="text" class="form-control" placeholder="Dependant Date of Birth" name="dob" id="dob" value=""/>
					<script type="text/javascript"> $('#dob').datepicker({format: 'yyyy/mm/dd'});</script>
                </div>
				<div class="form-group has-feedback">
					Dependant Profession
                    <input type="text" class="form-control" placeholder="Profession" name="profession" data-validation="required" data-validation-error-msg="Enter Dependant Profession"/>
                </div>
				<div class="form-group has-feedback">
					<input type="hidden" class="form-control" placeholder="Profession" name="status" value="1"/>
                </div>
				<div class="form-group has-feedback">
                    <input type="hidden" class="form-control" placeholder="Profession" name="submission_date" value="<?php echo date('Y/m/d'); ?>"/>
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
