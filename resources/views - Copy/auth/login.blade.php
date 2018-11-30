<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@extends('layouts.auth')

@section('htmlheader_title')
    Log in
@endsection

@section('content')
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <!-- <a href="#"><b>Angel Home</b></a> -->
        </div><!-- /.login-logo -->

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
				<li>These credentials do not match our records.</li>
				<li>Check Your User Name/Password/Role</li>
                <!--@foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach-->
            </ul>
        </div>
    @endif

		<div class="login-box-body">
			<p class="login-box-msg">Log-in</p>
				<form action="{{ url('/login') }}" method="post">

				{!! csrf_field() !!}

				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="User Name" name="email"/>
					<span class="form-control-feedback"> <i class="material-icons" style="position: relative; top:5px;"> email </i> </span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" placeholder="Password" name="password"/>
					<span class="form-control-feedback"> <i class="material-icons" style="position: relative; top:5px;"> lock </i> </span>
				</div>
				<div class="form-group has-feedback">
					<select class="form-control" name="role" id="role" data-validation="required" data-validation-error-msg="This Field Is Required" >
						<option value="">Select a Role</option>
						<option value="1">Admin</option>
						<option value="2">Receptionist</option>						
						<option value="3">Marketing</option>
						<option value="4">RCC</option>
						<option value="5">Back Office</option>
						<option value="6">Doctor</option>
						<option value="7">Wellness Director</option>
					</select>
				</div>
				<div class="row">
					<!--<div class="col-xs-8">
						<div class="checkbox icheck">
							<label>
								<input type="checkbox" name="remember"> Remember Me
							</label>
						</div>
					</div><!-- /.col -->
					<div class="col-xs-4"></div>
					<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat" style="width:100% !important">Login</button>
					</div><!-- /.col -->
					<div class="col-xs-4"></div>
				</div>
			</form>	
    <!--<a href="{{ url('/password/reset') }}">I forgot my password</a><br>
    <a href="{{ url('/register') }}" class="text-center">Register a new membership</a>-->
		</div><!-- /.login-box-body -->
	</div><!-- /.login-box -->

    @include('layouts.partials.scripts_auth')

</body>



@endsection
