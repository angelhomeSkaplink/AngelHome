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
		<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
		<!--<script type="text/javascript" language="javascript" src="{{ asset('/js/jquery.min.js') }}"></script>-->
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
				<nav class="navbar navbar-static-top" role="navigation">
					<!-- Sidebar toggle button-->
					<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
						<span class="sr-only">Toggle navigation</span>
					</a>				
					<!-- Navbar Right Menu -->
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">							
							@if (Auth::guest())
								<li><a href="{{ url('/login') }}">Login</a></li>
								<li><a href="{{ url('/register') }}">Register</a></li>
							@else
							<!-- User Account Menu -->
					
								<li class="dropdown user user-menu">
									<!-- Menu Toggle Button -->
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="material-icons"> account_circle </i>	 
										<span class="hidden-xs" style="text-transform:uppercase; font-weight:600">{{ Auth::user()->firstname." ".Auth::user()->lastname }}</span>
									</a>
									<ul class="dropdown-menu">
										<!-- The user image in the menu -->
										<li class="user-header">
											<img src="{{ url(Auth::user()->image) }}" class="img-circle" alt="User Image"/>
											<p>
												{{ Auth::user()->firstname." ".Auth::user()->lastname }}
												<small>{{ Auth::user()->created_at->diffForHumans() }}</small>
											</p>
										</li>
										
										<li class="user-footer">
											<div class="pull-left">
												<a href="{{ url('profile') }}" class="btn btn-default btn-flat">Profile</a>
											</div>
											<div class="pull-right">
												<a href="{{ url('/logout') }}" class="btn btn-default btn-flat"
												   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
													Logout</a>

												<form id="logout-form" action="{{ url('/logout') }}" method="POST"
													  style="display: none;">
													{{ csrf_field() }}
												</form>
											</div>
										</li>
									</ul>
								</li>
							@endif
						</ul>
					</div>
				</nav>				
			</header>

			<!-- Left side column. contains the logo and sidebar -->
			<aside class="main-sidebar">
				<!-- sidebar: style can be found in sidebar.less -->
				<section class="sidebar">
					<!-- Sidebar user panel (optional) -->
					@if (! Auth::guest())						
					@endif
					<li class="bg-c text-center" style="padding:20px 16px 19px 15px; list-style-type: none;">
						<span><img src="" class="img-circle" style="width:69px">
					</li>
					<div style="margin-top:3px"></div>
					<ul class="sidebar-menu">
						
						@if(Auth::user()->role == '1')
							
						<li class="{{ Request::is('dashboard*') ? 'active' : '' }}"><a href="{{ url('dashboard') }}"><i class="material-icons md-18 dark-gray">dashboard </i><span class="padding-left-10">Dashboard</span></a></li>
						<li class="treeview">
							<a href="#">
					            <i class="material-icons md-18"> subdirectory_arrow_right</i>
					            <span class="padding-left-10">Master Entry</span>
					            <span class="pull-right-container">
					              <i class="fa fa-angle-left pull-right"></i>
					            </span>
					        </a>
					        <ul class="treeview-menu">								
								<li><a href="{{ url('all_member_list') }}"><i class="material-icons md-18 dark-gray"> perm_identity </i> Add User</a></li>
								<li><a href="{{ url('room_details') }}"><i class="material-icons md-18 dark-gray"> home </i> Add Room</a></li>
								<li><a href="{{ url('service_plan') }}"><i class="material-icons md-18 dark-gray">note_add</i> Service plan</a></li>
								<li><a href="{{ url('assessment_preview') }}"><i class="material-icons md-18 dark-gray">note_add</i>Assessments</a></li>

								<!--<li><a href="{{ url('room_details') }}">Admission Policies</a></li>-->
					        </ul>
						</li>
						<li class=""><a href="{{ url('activity_calendar') }}"><i class="material-icons md-18 dark-gray">date_range</i><span class="padding-left-10">Activity Calendar</span></a></li>
						<li class="treeview">
							<a href="#">
					            <i class="material-icons md-18"> subdirectory_arrow_right</i>
					            <span class="padding-left-10">Reports</span>
					            <span class="pull-right-container">
					              <i class="fa fa-angle-left pull-right"></i>
					            </span>
					        </a>
					        <ul class="treeview-menu">								
								<li><a href="{{ url('total_revenue') }}"><i class="material-icons md-18 dark-gray"> monetization_on </i> total Revenue </a></li>
								<li><a href="{{ url('room_reports') }}"><i class="material-icons md-18 dark-gray"> home </i> room report</a></li>
								<li><a href="{{ url('facility_sales_reports') }}"><i class="material-icons md-18"> report</i> sales Reports</a></li>
								<li><a href="{{ url('aging_report') }}"><i class="material-icons md-18 dark-gray">note_add</i> Aging report</a></li>
								<!--<li><a href="{{ url('assessment_preview') }}"><i class="material-icons md-18 dark-gray">note_add</i>Assessments</a></li>-->

								<!--<li><a href="{{ url('room_details') }}">Admission Policies</a></li>-->
					        </ul>
						</li>
						@endif
						
						@if(Auth::user()->role == '2')			
						<li class="{{ Request::is('dashboard*') ? 'active' : '' }}"><a href="{{ url('dashboard') }}"><i class='fa fa-tachometer'></i> <span>Dashboard</span></a></li>
						<li><a href="{{ url('sales_pipeline') }}">Inquiry</a></li>
						<li><a href="{{ url('appointment_schedule') }}"><i class="material-icons"> settings_backup_restore </i><span class="padding-left-10">Appointment Schedule</span></li>
						<li class=""><a href="{{ url('activity_calendar') }}"><i class="fa fa-calendar"></i><span>&nbsp;Activity Calendar</span></a></li>
						@endif
						
						@if(Auth::user()->role == '3')
						
						<li class="{{ Request::is('dashboard*') ? 'active' : '' }}"><a href="{{ url('dashboard') }}"><i class="material-icons md-18 dark-gray">dashboard </i><span class="padding-left-10">Dashboard</span></a></li>
						
						<li class="treeview">
							<a href="#">
					            <i class="material-icons md-18 dark-gray"> cloud_done</i>
					            <span class="padding-left-10">CRM</span>
					            <span class="pull-right-container">
								<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
					            </span>
					        </a>
					        <ul class="treeview-menu">
								<li><li><a href="{{ url('sales_stage_pipeline') }}"><i class="material-icons md-18"> insert_chart</i> Sales Pipeline</a></li></li>								
								<li><a href="{{ url('reports') }}"><i class="material-icons md-18"> report</i> Reports</a></li>
					        </ul>
							
							<li><a href="{{ url('appointment_schedule') }}"><i class="material-icons md-18 dark-gray"> assignment</i><span class="padding-left-10">Appointment Schedule</span></a></li>
							<li><a href="{{ url('personal_details') }}"><i class="material-icons md-18 dark-gray"> details </i><span class="padding-left-10">Personal Details</span></a></li>
							<li><a href="{{ url('screening') }}"><i class="material-icons md-18 dark-gray">queue_play_next </i><span class="padding-left-10">Screening</span></a></li>
							<li><a href="{{ url('booking') }}"><i class="material-icons md-18 dark-gray">home </i><span class="padding-left-10">BOOK room</span></a></li>
							<li class=""><a href="{{ url('activity_calendar') }}"><i class="fa fa-calendar"></i><span>&nbsp;Activity Calendar</span></a></li>
						</li>
						@endif	
						@if(Auth::user()->role == '4')
						
							<li class="{{ Request::is('dashboard*') ? 'active' : '' }}"><a href="{{ url('dashboard') }}"><i class="material-icons md-18 dark-gray">dashboard </i><span class="padding-left-10">Dashboard</span></a></li>
						
							<li><a href="{{ url('assessment') }}"><i class="material-icons md-18 dark-gray"> assignment</i><span class="padding-left-10">Assessment</span></a></li>
						@endif
						@if(Auth::user()->role == '5')
							<li class="{{ Request::is('dashboard*') ? 'active' : '' }}"><a href="{{ url('dashboard') }}"><i class="material-icons md-18">dashboard </i><span class="padding-left-10">Dashboard</span></a></li>
						
							<li><a href="{{ url('resident_assessment') }}"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">Assessment</span></a></li>
							<li><a href="{{ url('resident_service_plan') }}"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">Service Plan</span></a></li>
							<li><a href="{{ url('injury') }}"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">Incident</span></a></li>
							<li><a href="{{ url('resident_payment') }}"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">resident payment</span></a></li>
							<li><a href="{{ url('payment_report') }}"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">payment report</span></a></li>
						
						@endif
						@if(Auth::user()->role == '6')
						<li class="{{ Request::is('dashboard*') ? 'active' : '' }}"><a href="{{ url('dashboard') }}"><i class="material-icons md-18 dark-gray">dashboard </i><span class="padding-left-10">Dashboard</span></a></li>
						<li>
							<a href="{{ url('patients_list') }}">
								<i class="material-icons md-18 dark-gray"> local_hospital </i>
								<span class="padding-left-10">Doctor</span>
							</a>
						</li>						
						@endif
						@if(Auth::user()->role == '7')
							<li class="{{ Request::is('dashboard*') ? 'active' : '' }}"><a href="{{ url('dashboard') }}"><i class="material-icons md-18">dashboard </i><span class="padding-left-10">Dashboard</span></a></li>
						
							<li><a href="{{ url('patient_medicine') }}"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">MAR</span></a></li>
							<li><a href="{{ url('medicine_stocks_list') }}"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">Medicine stock</span></a></li>
						@endif
						<li class="dark-gray"><a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="material-icons md-18 dark-gray">exit_to_app</i><span class="padding-left-10">&nbsp;Logout</span></a></li>
						<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
					</ul>
				</section>
			</aside>
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
