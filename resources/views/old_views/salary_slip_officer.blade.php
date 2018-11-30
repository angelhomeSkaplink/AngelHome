@extends('layouts.app')
@section('htmlheader_title')
    Salary Slip
@endsection
@section('contentheader_title')
OFFICE OF THE</br>
ASSAM HIGHER SECONDARY EDUCATION COUNCIL</br>
BAMUNIMAIDAM, GUWAHATI-21

@endsection
@section('main-content')

<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<body class="hold-transition register-page">
    <div class="register-box"> 
        <div class="register-box-body">
            <p class="login-box-msg">Generate Salary Slip</p>			
            <form action="salary_slip_generate_officer" method="post">				
				{!! csrf_field() !!}				
				<div class="required">
					<div class="form-group has-feedback">
						<b>Month</b>
						<select name="month" id="month" class="form-control" data-validation="required" data-validation-error-msg="This Field is Required">
							<option value="">Select Month</option>
							<option value="January">January</option>
							<option value="February">February</option>
							<option value="March">March</option>
							<option value="April">April</option>
							<option value="May">May</option>
							<option value="June">June</option>
							<option value="July">July</option>
							<option value="August">August</option>
							<option value="September">September</option>
							<option value="October">October</option>
							<option value="November">November</option>
							<option value="December">December</option>
						</select>
					</div>
				</div>
				<div class="required">
					<div class="form-group has-feedback">
						<b>Year</b>
						<select name="year" id="year" class="form-control" data-validation="required" data-validation-error-msg="This Field is Required">
							<option value="">Select Year</option>
							<option value="2016">2016</option>
							<option value="2017">2017</option>
							<option value="2018">2018</option>
							<option value="2019">2019</option>
							<option value="2020">2020</option>
							<option value="2021">2021</option>
							<option value="2022">2022</option>
							<option value="2023">2023</option>
							<option value="2024">2024</option>
							<option value="2025">2025</option>
							<option value="2026">2026</option>
							<option value="2027">2027</option>
							<option value="2028">2028</option>
						</select>
					</div>
				</div>
				<div class="form-group has-feedback">
					<b>Select Employee</b>
					<select name="emp_id" id="emp_id" class="form-control" data-validation="required" data-validation-error-msg="This Field is Required">
						<option value="">Select Employee ID</option>
						<?php
							$users = DB::table('employees')
							->whereBetween('post_id', ['1', '7'])
							->get();							
							foreach ($users as $user)
							{ 
							?>
							<option value="{{ $user->emp_id }}">{{ $user->emp_id }}</option>
							<?php 
							}														
						?>												
					</select>
				</div>
				<div class="row">                    
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                    </div>
                </div>
			</form>
		</div>
	</div>
</body>
<script src="../js/jquery.form-validator.min.js" type="text/javascript"></script>
<script>
    $.validate({
    });
</script>
@include('layouts.partials.scripts_auth')
@endsection
