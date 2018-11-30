
@extends('layouts.app')

@section('htmlheader_title')
    Parameter Value
@endsection

@section('contentheader_title')
    Parameter Value
@endsection

@section('main-content')
<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="js/bootstrap-datepicker.js"></script>
<body class="hold-transition register-page">
    <div class="register-box">        
        <div class="register-box-body">
            <p class="login-box-msg">Parameter Value</p>
            <form action="parameter_value_insert" method="post">
				<div class="form-group has-feedback">
					<select name="parameter_id" id="parameter_id" class="form-control" data-validation="required" data-validation-error-msg="Please Select Parameter Type">
						<option value="">Select Parameter Type</option>
						<?php
							$users = DB::table('parameters')->where('status', '1')->get();							
							foreach ($users as $user)
							{ 
								?>
									<option value="{{ $user->parameter_id}}">{{ $user->parameter_type }}</option>									
								<?php
							}														
						?>												
					</select>
				</div>				                
				<div class="form-group has-feedback">
					Parameter Value
                    <input type="text" class="form-control" placeholder="" name="value" data-validation="number" data-validation-error-msg="Input Should be an Numeric Value"/>
                </div>
				<div class="form-group has-feedback">
					Fixed Rate/Percentage
					<select name="relation" id="relation" class="form-control">
						<option value="">Select Type</option>
						<option value="1">Fixed Rate</option>
						<option value="2">Percentage</option>
					</select>
				</div>
				<div class="form-group has-feedback">
					Effect On
					<select name="relation" id="relation" class="form-control">
						<option value="">Select Nature</option>
						<option value="1">Salary Claim</option>
						<option value="2">Salary Deduction</option>
					</select>
				</div>
				<div class="form-group has-feedback">
					Effective From
                    <input type="text" class="form-control" placeholder="" name="effective_from" id="effective_from"/>
					<script type="text/javascript"> $('#effective_from').datepicker({format: 'yyyy/mm/dd'});</script> 
                </div>
				<div class="form-group has-feedback">
					Effective To
                    <input type="text" class="form-control" placeholder="" name="effective_to" id="effective_to" value=""/>
					<script type="text/javascript"> $('#effective_to').datepicker({format: 'yyyy/mm/dd'});</script> 
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
