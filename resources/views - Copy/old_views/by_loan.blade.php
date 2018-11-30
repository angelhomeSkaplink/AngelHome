@extends('layouts.app')

@section('htmlheader_title')
    Employee Loan MIS Report 
@endsection

@section('contentheader_title')
   
@endsection

@section('main-content')
<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="js/bootstrap-datepicker.js"></script>
<script type="text/javascript" language="javascript" src="js/zebra_datepicker.js"></script>
<link href="css/default.css" rel="stylesheet" type="text/css" />
<body class="hold-transition register-page">
    <div class="register-box"> 
        <div class="register-box-body">
            <p class="login-box-msg">Employee Loan MIS Report for </p>
			@if(Session::has('msg'))
				<div class="alert alert-danger">
					<strong>{{ Session::get('msg') }}</strong>
				</div>
			@endif
            <form action="mis_by_loan" method="post">
				{!! csrf_field() !!}		
				
				<div class="form-group has-feedback">
					<select name="emp_id" id="emp_id" class="form-control">
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
				<div class="form-group has-feedback">
					<b>Loan Type</b>
					<select name="loan_type_id" id="loan_type_id" class="form-control">
						<option value="">Select Loan Type</option>
						<option value="1">House Building Advance</option>
						<option value="4">GPF Loan</option>
					</select>
				</div>
				<!--<div class="form-group has-feedback">
					Employee Code
					<input type="text" class="form-control" placeholder="Employee Code" name="emp_id" id="emp_id" pattern="[0-9]+" Title="All Employee"/>
				</div>-->
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
