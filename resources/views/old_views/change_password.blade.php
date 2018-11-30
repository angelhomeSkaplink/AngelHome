
@extends('layouts.app')

@section('htmlheader_title')
    Change Password
@endsection

@section('contentheader_title')
    Change Password
@endsection

@section('main-content')
<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="js/bootstrap-datepicker.js"></script>
<script>	
	function checkPass(){
		var password = document.getElementById('password').value;
		var confirm_password = document.getElementById('confirm_password').value;
		if(password == confirm_password){
			$('#message').html('Passwords Match!').css('color', 'green');
		}
		else{
			$('#message').html('Passwords Do Not Match!').css('color', 'red');
		}
	}
		
</script>
<body class="hold-transition register-page">
    <div class="register-box">        
        <div class="register-box-body">
            <p class="login-box-msg">Change Password</p>
            <form action="password_change" method="post">							
				<div class="form-group has-feedback">
					New Password
                    <input type="password" class="form-control" placeholder="New Password" name="password" id="password" data-validation="required" data-validation-error-msg="Type New Password"/>
                </div>
				<div class="form-group has-feedback">
					Re Type New Password
                    <input type="password" class="form-control" placeholder="New Password" name="confirm_password" id="confirm_password" onkeyup="checkPass();" />
                </div>
				<span id='message'></span>
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
