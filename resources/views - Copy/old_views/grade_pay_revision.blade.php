@extends('layouts.app')

@section('htmlheader_title')
    Grade Pay
@endsection

@section('contentheader_title')
    Grade Pay
@endsection

@section('main-content')
<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="js/bootstrap-datepicker.js"></script>

<body class="hold-transition register-page">
    <div class="register-box">        
        <div class="register-box-body">
            <p class="login-box-msg">Grade Pay Revision</p>
            <form action="{{action('PostController@grade_pay_revision_update')}}" method="post">
				
				<input type="hidden" name="_method" value="PATCH">

						{{ csrf_field() }}						
				
				<div class="form-group has-feedback">
					<select name="GradePay" id="GradePay" class="form-control" data-validation="required" data-validation-error-msg="Required Field">
						<option value="">Select Old Grade Pay</option>
						<?php
							$users = DB::table('posts')->distinct()->get(['fld_GradePay']);							
							foreach ($users as $user)
							{ 
								?>
									<option value="{{ $user->fld_GradePay}}">{{ $user->fld_GradePay }}</option>									
								<?php
							}														
						?>												
					</select>
				</div>
				<div class="form-group has-feedback">
					New Grade Pay
					<input type="text" class="form-control" placeholder="" name="fld_GradePay" id="fld_GradePay" data-validation="number" data-validation-error-msg="Required Field.Numeric Value Only" />
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
