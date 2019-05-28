
@extends('layouts.app')

@section('htmlheader_title')
    Time Scale Promotion
@endsection

@section('contentheader_title')
    Time Scale Promotion
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
							$.each(data, function() {	
								document.getElementById('firstname').value = data.emp_f_name;
								document.getElementById('middlename').value = data.emp_m_name;
								document.getElementById('lastname').value = data.emp_l_name;
								document.getElementById('current_post_id').value = data.post_id;
								var post_id = data.post_id;
								if(post_id){
									$.ajax({
										url: 'post_name/'+post_id,
										type: "GET",						
										dataType: "json",
										success:function(name) {
											console.log(name);
											document.getElementById('current_post_name').value = name.fld_PostName;
										}
									});
								}
							});
						}
					});
				}					
			});
		});
	});
	
	$(document).ready(function() {  
		$(document).ready(function() {
			$('select[name="new_post_id"]').on('change', function() {
				var fld_PostID = $(this).val();
				console.log(fld_PostID);
				if(fld_PostID) {
					$.ajax({
						url: 'pay_scale/'+fld_PostID,
						type: "GET",						
						dataType: "json",
						success:function(data) {
							console.log(data);
							$.each(data, function() {
								document.getElementById('scale').value = data.fld_PayScale;
								document.getElementById('grade_pay').value = data.fld_GradePay;
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
            <p class="login-box-msg">Time Scale Promotion</p>
            <form action="time_promotion_store" method="post">
				<div class="form-group has-feedback">
					<select name="emp_id" id="emp_id" class="form-control" data-validation="required" data-validation-error-msg="Required Field">
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
                    <input type="hidden" class="form-control" placeholder="" name="current_post_id" id="current_post_id" value="" readonly />
                </div>
				<div class="form-group has-feedback">
                    <input type="hidden" class="form-control" placeholder="" name="current_post_name" id="current_post_name" value="" readonly />
                </div>				
				<div class="form-group has-feedback">
					<input type="hidden" class="form-control" placeholder="" name="submission_date" id="submission_date" value="<?php echo date('Y/m/d'); ?>"/>
					<script type="text/javascript"> $('#submission_date').datepicker({format: 'yyyy/mm/dd'});</script>
				</div>	
				<div class="form-group has-feedback">
					Date of Promotion
					<input type="text" class="form-control" placeholder="" name="promotion_date" id="promotion_date" data-validation="required" data-validation-error-msg="Required Field"/>
					<script type="text/javascript"> $('#promotion_date').datepicker({format: 'yyyy/mm/dd'});</script>
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
	<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
	<script src="js/jquery.form-validator.min.js" type="text/javascript"></script>
	<script>
		$.validate({
		});
	</script>
    @include('layouts.partials.scripts_auth')
</body>
@endsection
