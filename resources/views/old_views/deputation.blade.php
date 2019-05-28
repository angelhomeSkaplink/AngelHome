
@extends('layouts.app')

@section('htmlheader_title')
    Deputation/Lien
@endsection

@section('contentheader_title')
    Deputation/Lien 
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
            <form action="deputation_insert" method="post">
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
					Deputation/Lien
					<select class="form-control" name="deputation" id="deputation" data-validation="required" data-validation-error-msg="This Field Is Required" >
						<option value="">Select a record</option>
						<option value="Deputation">Deputation</option>
						<option value="Lien">Lien</option>
					</select>
				</div>
				<div class="form-group has-feedback">
					Date
					<input type="text" class="form-control" placeholder="" name="date" id="date" data-validation="required" data-validation-error-msg="Required Field"/>
					<script type="text/javascript"> $('#date').datepicker({format: 'yyyy/mm/dd'});</script>
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
