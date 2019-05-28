
@extends('layouts.app')

@section('htmlheader_title')
    New Scale
@endsection

@section('contentheader_title')
    New Scale
@endsection

@section('main-content')
<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="js/bootstrap-datepicker.js"></script>
<body class="hold-transition register-page">
    <div class="register-box">        
        <div class="register-box-body">
            <p class="login-box-msg">New Scale</p>
            <form action="new_scale_add" method="post">	
				{{ csrf_field() }}
				<div class="form-group has-feedback">
					New Scale Lower Limit
					<input type="text" class="form-control" placeholder="" name="payScale_lower_limit" id="payScale_lower_limit" data-validation="number" data-validation-error-msg="Required.Numeric Value Only" />
				</div>
				<div class="form-group has-feedback">
					New Scale Upper Limit
					<input type="text" class="form-control" placeholder="" name="payScale_uper_limit" id="payScale_uper_limit" data-validation="number" data-validation-error-msg="Required.Numeric Value Only" />
				</div>	
				<div class="form-group has-feedback">
					Grade Pay
					<input type="text" class="form-control" placeholder="" name="grade_pay" id="grade_pay" data-validation="number" data-validation-error-msg="Required.Numeric Value Only" />
				</div>
				<div class="form-group has-feedback">
					City Allowance
					<input type="text" class="form-control" placeholder="" name="city_allowance" id="city_allowance" data-validation="number" data-validation-error-msg="Required.Numeric Value Only" />
				</div>
				<div class="form-group has-feedback">
					<b>Grade</b>
					<select name="grade" id="grade" class="form-control" data-validation="required" data-validation-error-msg="Required Field">
						<option value="">Select Post Grade</option>
						<option value="1">I</option>
						<option value="2">II</option>
						<option value="3">III</option>
						<option value="4">IV</option>
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
