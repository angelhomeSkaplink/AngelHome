@extends('layouts.app')
@section('htmlheader_title')
   Conveyance Allowance
@endsection
@section('contentheader_title')
    Conveyance Allowance
@endsection
@section('main-content')

<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
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
			<form action="charge_insert" method="post">
                {!! csrf_field() !!}				
				<div class="form-group has-feedback">
					<select name="emp_id" id="emp_id" class="form-control" data-validation="required" data-validation-error-msg="Please Select employee ID">
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
                    <input type="text" class="form-control" placeholder="First Name" name="firstname" id="firstname" value="" readonly />
                </div>
				<div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Middle Name" name="middlename" id="middlename" value="" readonly />
                </div>
				<div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Last Name" name="lastname" id="lastname" value="" readonly />
                </div>
				<div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Amount" name="amount" id="amount" data-validation="number" data-validation-error-msg="Numeric Value Only" />
                </div>				
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
