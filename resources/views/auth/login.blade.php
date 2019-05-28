@extends('layouts.auth')

@section('htmlheader_title')
    Log in
@endsection

@section('content')
<body>
	
		<div class="limiter">
			<div class="container-login100">
					<form action="{{ url('login') }}" method="post" class="login100-form validate-form">
							{!! csrf_field() !!}
						<span class="login100-form-title">
							Member Login
						</span>
	
						<div class="wrap-input100">
							<input class="input100" type="text" name="email" placeholder="Email">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</span>
						</div>
	
						<div class="wrap-input100 validate-input" data-validate = "Password is required">
							<input class="input100" type="password" name="password" placeholder="Password">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-lock" aria-hidden="true"></i>
							</span>
						</div>
						<input type="hidden" class="form-control" name="status" value="1"/>
	
						<div class="container-login100-form-btn">
							<button class="login100-form-btn">
								Login
							</button>
						</div>
						<br>
						@include('layouts.errors')
					</form>
					
			</div>
			
		</div>
		
	
		
	<!--===============================================================================================-->	
		<script src="{{ asset('/public/login/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
	<!--===============================================================================================-->
		<script src="{{ asset('/public/login/vendor/bootstrap/js/popper.js') }}"></script>
		<script src="{{ asset('/public/login/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<!--===============================================================================================-->
		<script src="{{ asset('/public/login/vendor/select2/select2.min.js') }}"></script>
	<!--===============================================================================================-->
	<!--===============================================================================================-->
		<script src="{{ asset('/public/login/js/main.js') }}"></script>
		@include('layouts.partials.scripts_auth')
	</body>
@endsection
