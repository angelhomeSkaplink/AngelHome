
@extends('layouts.app')

@section('htmlheader_title')
    Transfer
@endsection

@section('contentheader_title')
    Transfer
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
							$.each(data, function() {	
								document.getElementById('firstname').value = data.emp_f_name;
								document.getElementById('middlename').value = data.emp_m_name;
								document.getElementById('lastname').value = data.emp_l_name;
								document.getElementById('current_dept_id').value = data.fld_DeptID;
								var fld_DeptID = data.fld_DeptID;
								if(fld_DeptID){
									$.ajax({
										url: 'department_name/'+fld_DeptID,
										type: "GET",						
										dataType: "json",
										success:function(name) {
											console.log(name);
											document.getElementById('current_dept').value = name.fld_Department;
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
	
</script>
<body class="hold-transition register-page">
    <div class="register-box">        
        <div class="register-box-body">
            <p class="login-box-msg">Transfer</p>
            <form action="transfer_store" method="post">
				<div class="form-group has-feedback">
					<select name="emp_id" id="emp_id" class="form-control">
						<option value="0">Select Employee ID</option>
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
                    <input type="hidden" class="form-control" placeholder="" name="current_dept_id" id="current_dept_id" value="" readonly />
                </div>
				<div class="form-group has-feedback">
					Current Department
                    <input type="text" class="form-control" placeholder="" name="current_dept" id="current_dept" value="" readonly />
                </div>
				
				<div class="form-group has-feedback">
					<select name="new_dept_id" id="new_dept_id" class="form-control">
						New Department
						<option value="0">Select Department</option>
						<?php
							$users = DB::table('departments')->where('fld_Status', '1')->get();							
							foreach ($users as $user)
							{ 
								?>
									<option value="{{ $user->fld_DeptID}}">{{ $user->fld_Department }}</option>
								<?php
							}														
						?>												
					</select>
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
    @include('layouts.partials.scripts_auth')
</body>
@endsection
