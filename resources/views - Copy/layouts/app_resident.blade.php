<!DOCTYPE html>
<html lang="en">
	<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title> @yield('htmlheader_title', 'ANGEL HOME') </title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<!-- Bootstrap 3.3.4 -->
		<link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet" type="text/css"/>
		<!-- Font Awesome Icons -->
		<link href="{{ asset('/css/ionicons.min.css') }}" rel="stylesheet" type="text/css"/>
		<!-- Ionicons -->
		<link href="{{ asset('/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
		<!-- Theme style -->
		<link href="{{ asset('/css/AdminLTE.css') }}" rel="stylesheet" type="text/css"/>
		<!-- AdminLTE Skin (Blue) -->
		<link href="{{ asset('/css/skins/skin-blue.css') }}" rel="stylesheet" type="text/css"/>
		<!-- iCheck -->
		<link href="{{ asset('/plugins/iCheck/square/blue.css') }}" rel="stylesheet" type="text/css"/>
		<!-- Toastr -->
		<link href="{{ asset('/css/toastr.min.css') }}" rel="stylesheet" type="text/css"/>
		<!-- SweetAlert2 -->
		<link href="{{ asset('/css/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"/>
		<!-- Bootstrap calendar CSS -->
		<link href="{{ asset('/css/bootstrap-datepicker3.css') }}" rel="stylesheet" type="text/css"/>
		<!-- Material icon added KALYAN -->
		
		<!-- Assessment start -->

		<link href="{{ asset('/css/assessment/surveyeditor.css') }}" rel="stylesheet" type="text/css"/>

		<link href="{{ asset('/css/assessment/survey.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ asset('/css/assessment/index.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ asset('/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ asset('/css/nav-bar.css') }}" rel="stylesheet" type="text/css"/>
		
		<link href="{{ asset('/css/assessment/custom.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ asset('/css/assessment/jquery-confirm.min.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ asset('/css/assessment/jquery-ui.css') }}" rel="stylesheet" type="text/css"/>
		<!-- Assessment end -->
		
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		
		<script type="text/javascript" language="javascript" src="{{ asset('/js/jquery.min.js') }}"></script>
		<script type="text/javascript" language="javascript" src="{{ asset('/js/bootstrap-datepicker.js') }}"></script>
		<script type="text/javascript" language="javascript" src="{{ asset('/js/select2.min.js') }}"></script>
		<!--<script type="text/javascript" language="javascript" src="{{ asset('/js/bootstrap-datepicker.js') }}"></script>-->
			
			

		@yield('header-extra')
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="skin-blue sidebar-mini">
		<div class="wrapper">
			<!-- Main Header -->
			<header class="main-header">
				<!-- Logo -->
				
				<!-- <a href="{{ url('/dashboard') }}" class="logo">-->
					<!-- mini logo for sidebar mini 50x50 pixels -->
					<!-- <span class="logo-mini"><b>A</b>LT</span>-->
					<!-- logo for regular state and mobile devices -->
					<!-- <span class="logo-lg">Angel Home</span> -->
				<!-- </a> -->
				<!-- Header Navbar -->
								
			</header>

			<!-- Left side column. contains the logo and sidebar -->
			
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<div style="padding-top:4px"></div>
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h4>
						@yield('contentheader_title', 'Page Header here')
						<small>@yield('contentheader_description')</small>
					</h4>
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Your Page Content Here -->
					@yield('main-content')
				</section><!-- /.content -->
			</div><!-- /.content-wrapper -->
			<div class='control-sidebar-bg'></div>
		</div><!-- ./wrapper -->
		@include('layouts.partials.scripts')
		@yield('scipts-extra')
	</body>
</html>
