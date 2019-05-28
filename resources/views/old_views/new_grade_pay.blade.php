
@extends('layouts.app')

@section('htmlheader_title')
    New Grade Pay
@endsection

@section('contentheader_title')
    New Grade Pay
@endsection

@section('main-content')
<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="js/bootstrap-datepicker.js"></script>
<body class="hold-transition register-page">
    <div class="register-box">        
        <div class="register-box-body">
            <p class="login-box-msg">New Grade Pay</p>
            <form action="new_grade_pay_add" method="post">			
				
				{{ csrf_field() }}	
					
				<div class="form-group has-feedback">
					New Grade Pay
					<input type="text" class="form-control" placeholder="" name="grade_pay" id="grade_pay" data-validation="number" data-validation-error-msg="Required.Numeric Value Only" />
				</div>
				<div class="form-group has-feedback">
					<select name="fld_GradePay" id="fld_GradePay" class="form-control" data-validation="required" data-validation-error-msg="Please Select Grade Pay">
						<option value="">Select Pay Scale</option>
						<?php
							$users = DB::table('scale')->get();							
							foreach ($users as $user)
							{ 
								?>
									<option value="{{ $user->payScale_lower_limit}}">{{ $user->payScale_lower_limit }} - {{ $user->payScale_uper_limit }}</option>									
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
	<script src="js/jquery.form-validator.min.js" type="text/javascript"></script>
	<script>
        $.validate({
        });
    </script>
    @include('layouts.partials.scripts_auth')
</body>
@endsection
