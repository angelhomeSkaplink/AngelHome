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
		<script type="text/javascript" language="javascript" src="{{ asset('/js/bootstrap-datepicker.js') }}"></script>
		<script type="text/javascript" language="javascript" src="{{ asset('/js/select2.min.js') }}"></script>
		


		@yield('header-extra')
	</head>
	<script type="text/javascript">
		$(document).ready(function() {
			$(".wrapper").on("contextmenu",function(){
				return true;
			}); 
		});
	</script>
	<style>
		.herder-text {
			float: left;
			background-color: transparent;
			color: #ffffff;
			background-image: none;
			padding: 19px 15px;
			font-size: 14px !important;
			font-family: source sans pro !important;
			text-transform: uppercase;
		}

		.herder-language {
			float: left;
			background-color: transparent;
			color: #ffffff;
			background-image: none;
			padding: 12px 15px;
			font-family: fontAwesome;
		}
		.navbar-custom-menu {
			float: right;
			height: 57px !important;
		}
		
	</style>
	<body class="skin-blue sidebar-mini">
		<div class="wrapper">
			<!-- Main Header -->
			<header class="main-header">
				<!-- Logo -->
					<a href="{{ url('/dashboard') }}" class="logo">
                    <?php
						$logo = DB::table('facility')->where('id', Auth::user()->facility_id)->first();
					?>
					<!-- mini logo for sidebar mini 50x50 pixels -->
					@if($logo->facility_logo==NULL)
					<span class="logo-lg"><img src="http://seniorsafetech.com/angel_home_s_admin/hsfiles/public/facility_logo/images.png" class="img-circle" width="40" height="40"></span>
					@else
					<span class="logo-lg"><img src="http://seniorsafetech.com/angel_home_s_admin/hsfiles/public/facility_logo/{{ $logo->facility_logo }}" class="img-circle" width="40" height="40"></span>
					
					@endif
					<!-- logo for regular state and mobile devices -->
					
					@if($logo->facility_logo==NULL)
					<span class="logo-lg"><img src="http://documentcluster.com/angel_home/hsfiles/public/facility_logo/images.png" class="img-circle" width="40" height="40"></span>
					@else
					<span class="logo-lg"><img src="http://documentcluster.com/angel_home/hsfiles/public/facility_logo/{{ $logo->facility_logo }}" class="img-circle" width="40" height="40"></span>
					
					@endif
				</a>
				<!-- Header Navbar -->
				<nav class="navbar navbar-static-top" role="navigation">
					<!-- Sidebar toggle button-->
					<a href="#" class="sidebar-toggle cust-remove-nav-side-open-lg" data-toggle="offcanvas" role="button"></a>
					<div class="herder-text" data-toggle="" role="button">
						<?php $facility_name = DB::table('facility')->where('id', Auth::user()->facility_id)->first(); ?>
						<span class=""><b>@lang("msg.Welcome To") {{ $facility_name->facility_name }}</b></span>
					</div>
					<!-- Navbar Right Menu -->
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							@if (Auth::guest())
								<li><a href="{{ url('/login') }}">Login</a></li>
								<li><a href="{{ url('/register') }}">Register</a></li>
							@else
							<!-- User Account Menu -->
								<?php
									$route_name = url()->full();
								?>
								<div class="herder-language">
									<form action="{{ $route_name }}" method="get">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										{{ csrf_field() }}
										<li class="">
											<div class="form-group has-feedback" >
												<select name="language" id="language" class="form-control" onchange="this.form.submit()">
													<option value="">CHANGE LANGUAGE</option>
													<option value="en">ENGLISH</option>
													<option value="fr">FRENCH</option>
													<option value="es">SPANISH</option>
												</select>
											</div>
										</li>
									</form>
								</div>					
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
					<?php
						$us = Auth::user()->user_id;
						$roles = DB::table('role')->where('u_id',$us)->where('status',1)->get();
						$role_arr = array();
						foreach ($roles as $r) {
							array_push($role_arr,$r->id);
						}
					?>
					<li class="bg-c text-center" style="padding:20px 16px 19px 15px; list-style-type: none;">
						<span><img src="" class="img-circle" style="width:69px">
					</li>
					<div style="margin-top:3px"></div>
					<ul class="sidebar-menu">
						<li class="cust-remove-side-open-sm">
							<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
								<i class="material-icons md-18 dark-gray">view_headline</i>
								<span class="sr-only">Toggle navigation</span>
							</a>
						</li>
						@if(in_array(1,$role_arr))
						<li class="{{ Request::is('dashboard*') ? 'active' : '' }}">
							<a href="{{ url('dashboard') }}">
								<i class="material-icons md-18 dark-gray">dashboard </i>
								<span class="padding-left-10">@lang("msg.Dashboard")</span>
							</a>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="material-icons md-18"> subdirectory_arrow_right</i>
								<span class="padding-left-10">Vista View</span>
								<span class="pull-right-container">
										<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="{{ url('sales_pipeline') }}">
										<i class="material-icons"> image_search </i>
										<span class="padding-left-10">@lang("msg.Inquiry")</span>
									</a>
								</li>
								<li>
									<a href="{{ url('sales_stage_pipeline') }}">
										<i class="material-icons md-18"> insert_chart</i>
										<span class="padding-left-10">@lang("msg.Sales Pipeline")</span>
									</a>
								</li>
								<li>
									<a href="{{ url('appointment_schedule') }}">
										<i class="material-icons"> settings_backup_restore </i>
										<span class="padding-left-10">@lang("msg.Appointment Schedule")</span>
									</a>
								</li>
								<li>
									<a href="{{ url('screening') }}">
										<i class="material-icons md-18 dark-gray">queue_play_next </i>
										<span class="padding-left-10">@lang("msg.Screening")</span>
									</a>
								</li>
								<li>
								    <a href="{{ url('initial_assessment') }}">
								        <i class="material-icons md-18 dark-gray"> assessment </i>
								        <span class="padding-left-10">@lang("msg.Assessment")</span>
							        </a>
							    </li>
							    <li>
									<a href="{{ url('booking') }}">
										<i class="material-icons md-18 dark-gray">home </i>
										<span class="padding-left-10">@lang("msg.Book Room")</span>
									</a>
								</li>
								<li>
									<a href="{{ url('reports') }}">
										<i class="material-icons md-18"> report</i>
										<span class="padding-left-10">@lang("msg.Sales Reports") </span>
									</a>
								</li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="material-icons md-18"> subdirectory_arrow_right</i>
								<span class="padding-left-10">Compass Care</span>
								<span class="pull-right-container">
										<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
								</span>
							</a>
							<ul class="treeview-menu">
							    <li>
									<a href="{{ url('personal_details') }}">
										<i class="material-icons md-18 dark-gray"> details </i>
										<span class="padding-left-10">@lang("msg.Resident Details")</span>
									</a>
								</li>
								<li>
									<a href="{{ url('temporary_service_plan') }}">
										<i class="material-icons md-18"> assignment</i>
										<span class="padding-left-10">Temporary Service Plan</span>
									</a>
								</li>
								<li>
									<a href="{{ url('resident_service_plan') }}">
										<i class="material-icons md-18"> assignment</i>
										<span class="padding-left-10">@lang("msg.Resident Service Plan")</span>
									</a>
								</li>
								<li>
									<a href="{{ url('injury') }}">
										<i class="material-icons md-18"> assignment</i>
										<span class="padding-left-10">@lang("msg.Incident")</span>
									</a>
								</li>
								<li>
									<a href="{{ url('all_res_checkup') }}">
										<i class="material-icons md-18"> assignment</i>
										<span class="padding-left-10">Vital Statistics</span>
									</a>
								</li>
								<li>
									<a href="{{ url('all_res_notes') }}">
										<i class="material-icons md-18"> assignment</i>
										<span class="padding-left-10">Notes</span>
									</a>
								</li>
								<li>
        							<a href="#">
        								<i class="material-icons md-18"> subdirectory_arrow_right</i>
        								<span class="padding-left-10">@lang("msg.Assessment")</span>
        								<span class="pull-right-container">
        								<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
        								</span>
        							</a>
        							<ul class="treeview-menu">
        								<li><a href="{{ url('preadmin_resident_assessment') }}"><i class="material-icons md-18 dark-gray"> assessment </i><span class="padding-left-10">@lang("msg.Main Assessment")</a></li>
        								<li><a href="{{ url('resident_assessment') }}"><i class="material-icons md-18 dark-gray"> assessment </i><span class="padding-left-10">@lang("msg.Sub Assessments")</a></li>
        							</ul>
						        </li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="material-icons md-18"> subdirectory_arrow_right</i>
								<span class="padding-left-10">Audio Drop</span>
								<span class="pull-right-container">
										<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="{{ url('assessment') }}">
										<i class="material-icons md-18 dark-gray"> assignment</i>
										<span class="padding-left-10">@lang("msg.Assessments Upload")</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="material-icons md-18"> subdirectory_arrow_right</i>
								<span class="padding-left-10">Trans Link</span>
								<span class="pull-right-container">
										<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="#">
										<i class="material-icons md-18 dark-gray"> cloud_done</i>
										<span class="padding-left-10">@lang("msg.Tasksheet")</span>
										<span class="pull-right-container">
										<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
										</span>
									</a>
									<ul class="treeview-menu">
										<li><a href="{{ url('tasksheet') }}"><i class="material-icons md-18"> list</i><span class="padding-left-10">@lang("msg.Set Tasksheet")</span></a></li>
										<li><a href="{{ url('main_task') }}"><i class="material-icons md-18"> list</i><span class="padding-left-10">@lang("msg.Set Assignee")</span></a></li>
									</ul>
								</li>
								<li>
									<a href="{{ url('main_task_list') }}">
										<i class="material-icons md-18 dark-gray">assignment</i>
										<span class="padding-left-10">@lang("msg.Daily Task")</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="material-icons md-18"> subdirectory_arrow_right</i>
								<span class="padding-left-10">Med Rec</span>
								<span class="pull-right-container">
										<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="{{ url('patient_medicine') }}"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">@lang("msg.MAR")</span></a></li>
								<li><a href="{{ url('mar_report') }}"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">MAR REPORT</span></a></li>
								<li><a href="{{ url('medicine_stocks_list') }}"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">@lang("msg.Medicine Stock")</span></a></li>
								<li><a href="{{ url('patients_list') }}"><i class="material-icons md-18 dark-gray"> local_hospital </i><span class="padding-left-10">Pharmacy</span></a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="material-icons md-18"> subdirectory_arrow_right</i>
								<span class="padding-left-10">Business Office</span>
								<span class="pull-right-container">
								<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="{{ url('resident_payment') }}"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">@lang("msg.Resident Payment")</span></a></li>
								<li><a href="{{ url('payment_report') }}"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">@lang("msg.Payment Report")</span></a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="material-icons md-18"> subdirectory_arrow_right</i>
								<span class="padding-left-10">General</span>
								<span class="pull-right-container">
								<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li class="">
									<a href="{{ url('activity_calendar') }}">
										<i class="material-icons">calendar_today</i>
										<span class="padding-left-10">@lang("msg.Activity Calendar")</span>
									</a>
								</li>
								<li class="treeview">
									<a href="#">
										<i class="material-icons md-18"> subdirectory_arrow_right</i>
										<span class="padding-left-10">@lang("msg.Master Entry")</span>
										<span class="pull-right-container">
											<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
										</span>
									</a>
									<ul class="treeview-menu">
										<li><a href="{{ url('all_member_list') }}"><i class="material-icons md-18 dark-gray"> perm_identity </i><span class="padding-left-10">@lang("msg.Add User")</a></li>
										<li><a href="{{ url('room_details') }}"><i class="material-icons md-18 dark-gray"> home </i><span class="padding-left-10">@lang("msg.Add Room")</a></li>
										<li><a href="{{ url('service_plan') }}"><i class="material-icons md-18 dark-gray">note_add</i><span class="padding-left-10">Level Of Care</a></li>
										<li><a href="{{ url('assessment_preview') }}"><i class="material-icons md-18 dark-gray">note_add</i><span class="padding-left-10">@lang("msg.Assessments")</a></li>
									</ul>
								</li>
								<li class="">
									<a href="{{action('ProfileController@change_password') }}">
										<i class="material-icons">swap_horiz</i>
										<span>@lang("msg.Change Password")</span>
									</a>
								</li>
								<li class="dark-gray"><a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="material-icons md-18 dark-gray">exit_to_app</i><span class="padding-left-10">&nbsp;@lang("msg.Logout")</span></a></li>
								<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
							</ul>
						</li>
                        <li class="treeview">
							<a href="#">
								<i class="material-icons md-18"> subdirectory_arrow_right</i>
								<span class="padding-left-10">@lang("msg.Reports")</span>
								<span class="pull-right-container">
										<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="{{ url('total_revenue') }}"><i class="material-icons md-18 dark-gray"> monetization_on </i><span class="padding-left-10">@lang("msg.Total Revenue")</a></li>
								<li><a href="{{ url('room_reports') }}"><i class="material-icons md-18 dark-gray"> home </i><span class="padding-left-10">@lang("msg.Room Report")</a></li>
								<li><a href="{{ url('facility_sales_reports') }}"><i class="material-icons md-18"> report</i><span class="padding-left-10">@lang("msg.Sales Reports")</a></li>
								<li><a href="{{ url('aging_report') }}"><i class="material-icons md-18 dark-gray">note_add</i><span class="padding-left-10">@lang("msg.Aging Report")</a></li>
								<li><a href="{{ url('activity_report') }}"><i class="material-icons md-18 dark-gray">local_activity</i><span class="padding-left-10">@lang("msg.Activity Report")</a></li>
								<li><a href="{{ url('tasksheet_report') }}"><i class="material-icons md-18 dark-gray">list</i><span class="padding-left-10">@lang("msg.Task Sheet Report")</a></li>
							</ul>
						</li>
							@endif

						@if(in_array(2,$role_arr))
						<li><a href="{{ url('sales_pipeline') }}"><i class="material-icons"> image_search </i><span class="padding-left-10">@lang("msg.Inquiry")</span></a></li>
						<li>
							<a href="{{ url('appointment_schedule') }}">
								<i class="material-icons"> settings_backup_restore </i>
								<span class="padding-left-10">@lang("msg.Appointment Schedule")</span>
							</a>
						</li>
						@endif

						@if(in_array(3,$role_arr))
						<li class="treeview">
							<a href="#">
								<i class="material-icons md-18 dark-gray"> cloud_done</i>
								<span class="padding-left-10">@lang("msg.CRM")</span>
								<span class="pull-right-container">
									<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="{{ url('sales_stage_pipeline') }}">
										<i class="material-icons md-18"> insert_chart</i>@lang("msg.Sales Pipeline") 
									</a>
								</li>
								<li>
									<a href="{{ url('reports') }}">
										<i class="material-icons md-18"> report</i>@lang("msg.Reports") 
									</a>
								</li>
							</ul>

							<li><a href="{{ url('appointment_schedule') }}"><i class="material-icons md-18 dark-gray"> assignment</i><span class="padding-left-10">@lang("msg.Appointment Schedule")</span></a></li>
							<li><a href="{{ url('personal_details') }}"><i class="material-icons md-18 dark-gray"> details </i><span class="padding-left-10">@lang("msg.Personal Details")</span></a></li>
							<li><a href="{{ url('screening') }}"><i class="material-icons md-18 dark-gray">queue_play_next </i><span class="padding-left-10">@lang("msg.Screening")</span></a></li>
							<li><a href="{{ url('booking') }}"><i class="material-icons md-18 dark-gray">home </i><span class="padding-left-10">@lang("msg.Book Room")</span></a></li>
						</li>
						@endif
						@if(in_array(4,$role_arr))
						<li><a href="{{ url('assessment') }}"><i class="material-icons md-18 dark-gray"> assignment</i><span class="padding-left-10">@lang("msg.Assessments Upload")</span></a></li>
						<li>
    							 <a href="#">
    								<i class="material-icons md-18"> subdirectory_arrow_right</i>
    								<span class="padding-left-10">@lang("msg.Assessment")</span>
    								<span class="pull-right-container">
    									<i class="fa fa-angle-left pull-right"></i>
    								</span>
    							    </a>
    							<ul class="treeview-menu">
    								<li><a href="{{ url('preadmin_resident_assessment') }}"><i class="material-icons md-18 dark-gray"> assessment </i><span class="padding-left-10">@lang("msg.Main Assessment")</a></li>
    								<li><a href="{{ url('resident_assessment') }}"><i class="material-icons md-18 dark-gray"> assessment </i><span class="padding-left-10">@lang("msg.Sub Assessments")</a></li>
    							</ul>
							
							</li>
						<li><a href="{{ url('patient_medicine') }}"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">@lang("msg.MAR")</span></a></li>
						<li><a href="{{ url('mar_report') }}"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">MAR REPORT</span></a></li>
						<li><a href="{{ url('medicine_stocks_list') }}"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">@lang("msg.Medicine Stock")</span></a></li>
						<li><a href="{{ url('resident_service_plan') }}"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">@lang("msg.Resident Service Plan")</span></a></li>
						@endif
						@if(in_array(5,$role_arr))
						<li class="{{ Request::is('dashboard*') ? 'active' : '' }}">
							<a href="{{ url('dashboard') }}">
								<i class="material-icons md-18 dark-gray">dashboard </i>
								<span class="padding-left-10">@lang("msg.Dashboard")</span>
							</a>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="material-icons md-18"> subdirectory_arrow_right</i>
								<span class="padding-left-10">Vista View</span>
								<span class="pull-right-container">
										<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="{{ url('sales_pipeline') }}">
										<i class="material-icons"> image_search </i>
										<span class="padding-left-10">@lang("msg.Inquiry")</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="material-icons md-18"> subdirectory_arrow_right</i>
								<span class="padding-left-10">Trans Link</span>
								<span class="pull-right-container">
										<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="#">
										<i class="material-icons md-18 dark-gray"> cloud_done</i>
										<span class="padding-left-10">@lang("msg.Tasksheet")</span>
										<span class="pull-right-container">
										<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
										</span>
									</a>
									<ul class="treeview-menu">
										<li><a href="{{ url('tasksheet') }}"><i class="material-icons md-18"> list</i><span class="padding-left-10">@lang("msg.Set Tasksheet")</span></a></li>
										<li><a href="{{ url('main_task') }}"><i class="material-icons md-18"> list</i><span class="padding-left-10">@lang("msg.Set Assignee")</span></a></li>
									</ul>
								</li>
								<li>
									<a href="{{ url('main_task_list') }}">
										<i class="material-icons md-18 dark-gray">assignment</i>
										<span class="padding-left-10">@lang("msg.Daily Task")</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="material-icons md-18"> subdirectory_arrow_right</i>
								<span class="padding-left-10">General</span>
								<span class="pull-right-container">
								<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li class="">
									<a href="{{action('ProfileController@change_password') }}">
										<i class="material-icons">swap_horiz</i>
										<span>@lang("msg.Change Password")</span>
									</a>
								</li>
								<li class="dark-gray"><a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="material-icons md-18 dark-gray">exit_to_app</i><span class="padding-left-10">&nbsp;@lang("msg.Logout")</span></a></li>
								<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
							</ul>
						@endif
						@if(in_array(6,$role_arr))
						<li>
							<a href="{{ url('patients_list') }}">
								<i class="material-icons md-18 dark-gray"> local_hospital </i>
								<span class="padding-left-10">Pharmacy</span>
							</a>
						</li>
						@endif
						@if(in_array(7,$role_arr))
							<li><a href="{{ url('patient_medicine') }}"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">@lang("msg.MAR")</span></a></li>
							<li><a href="{{ url('mar_report') }}"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">MAR REPORT</span></a></li>
							<li><a href="{{ url('medicine_stocks_list') }}"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">@lang("msg.Medicine Stock")</span></a></li>
						@endif
						@if(in_array(8,$role_arr))
							<li><a href="{{ url('main_task_list') }}"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">@lang("msg.Daily Task")</span></a></li>
							<li><a href="{{ url('patient_medicine') }}"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">@lang("msg.MAR")</span></a></li>
						@endif
						@if(in_array(11,$role_arr))
						<li class="{{ Request::is('dashboard*') ? 'active' : '' }}">
							<a href="{{ url('dashboard') }}">
								<i class="material-icons md-18 dark-gray">dashboard </i>
								<span class="padding-left-10">@lang("msg.Dashboard")</span>
							</a>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="material-icons md-18"> subdirectory_arrow_right</i>
								<span class="padding-left-10">Vista View</span>
								<span class="pull-right-container">
										<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="{{ url('sales_pipeline') }}">
										<i class="material-icons"> image_search </i>
										<span class="padding-left-10">@lang("msg.Inquiry")</span>
									</a>
								</li>
								<li>
									<a href="{{ url('sales_stage_pipeline') }}">
										<i class="material-icons md-18"> insert_chart</i>
										<span class="padding-left-10">@lang("msg.Sales Pipeline")</span>
									</a>
								</li>
								<li>
									<a href="{{ url('appointment_schedule') }}">
										<i class="material-icons"> settings_backup_restore </i>
										<span class="padding-left-10">@lang("msg.Appointment Schedule")</span>
									</a>
								</li>
								<li>
									<a href="{{ url('screening') }}">
										<i class="material-icons md-18 dark-gray">queue_play_next </i>
										<span class="padding-left-10">@lang("msg.Screening")</span>
									</a>
								</li>
								<li>
								    <a href="{{ url('initial_assessment') }}">
								        <i class="material-icons md-18 dark-gray"> assessment </i>
								        <span class="padding-left-10">@lang("msg.Assessment")</span>
							        </a>
							    </li>
							    <li>
									<a href="{{ url('booking') }}">
										<i class="material-icons md-18 dark-gray">home </i>
										<span class="padding-left-10">@lang("msg.Book Room")</span>
									</a>
								</li>
								<li>
									<a href="{{ url('reports') }}">
										<i class="material-icons md-18"> report</i>
										<span class="padding-left-10">@lang("msg.Sales Reports") </span>
									</a>
								</li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="material-icons md-18"> subdirectory_arrow_right</i>
								<span class="padding-left-10">Compass Care</span>
								<span class="pull-right-container">
										<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
								</span>
							</a>
							<ul class="treeview-menu">
							    <li>
									<a href="{{ url('personal_details') }}">
										<i class="material-icons md-18 dark-gray"> details </i>
										<span class="padding-left-10">@lang("msg.Resident Details")</span>
									</a>
								</li>
								<li>
									<a href="{{ url('temporary_service_plan') }}">
										<i class="material-icons md-18"> assignment</i>
										<span class="padding-left-10">Temporary Service Plan</span>
									</a>
								</li>
								<li>
									<a href="{{ url('resident_service_plan') }}">
										<i class="material-icons md-18"> assignment</i>
										<span class="padding-left-10">@lang("msg.Resident Service Plan")</span>
									</a>
								</li>
								<li>
									<a href="{{ url('injury') }}">
										<i class="material-icons md-18"> assignment</i>
										<span class="padding-left-10">@lang("msg.Incident")</span>
									</a>
								</li>
								<li>
									<a href="{{ url('all_res_checkup') }}">
										<i class="material-icons md-18"> assignment</i>
										<span class="padding-left-10">Check-up</span>
									</a>
								</li>
								<li>
									<a href="{{ url('all_res_notes') }}">
										<i class="material-icons md-18"> assignment</i>
										<span class="padding-left-10">Notes</span>
									</a>
								</li>
								<li>
        							<a href="#">
        								<i class="material-icons md-18"> subdirectory_arrow_right</i>
        								<span class="padding-left-10">@lang("msg.Assessment")</span>
        								<span class="pull-right-container">
        								<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
        								</span>
        							</a>
        							<ul class="treeview-menu">
        								<li><a href="{{ url('preadmin_resident_assessment') }}"><i class="material-icons md-18 dark-gray"> assessment </i><span class="padding-left-10">@lang("msg.Main Assessment")</a></li>
        								<li><a href="{{ url('resident_assessment') }}"><i class="material-icons md-18 dark-gray"> assessment </i><span class="padding-left-10">@lang("msg.Sub Assessments")</a></li>
        							</ul>
						        </li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="material-icons md-18"> subdirectory_arrow_right</i>
								<span class="padding-left-10">Audio Drop</span>
								<span class="pull-right-container">
										<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="{{ url('assessment') }}">
										<i class="material-icons md-18 dark-gray"> assignment</i>
										<span class="padding-left-10">@lang("msg.Assessments Upload")</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="material-icons md-18"> subdirectory_arrow_right</i>
								<span class="padding-left-10">Trans Link</span>
								<span class="pull-right-container">
										<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="#">
										<i class="material-icons md-18 dark-gray"> cloud_done</i>
										<span class="padding-left-10">@lang("msg.Tasksheet")</span>
										<span class="pull-right-container">
										<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
										</span>
									</a>
									<ul class="treeview-menu">
										<li><a href="{{ url('tasksheet') }}"><i class="material-icons md-18"> list</i><span class="padding-left-10">@lang("msg.Set Tasksheet")</span></a></li>
										<li><a href="{{ url('main_task') }}"><i class="material-icons md-18"> list</i><span class="padding-left-10">@lang("msg.Set Assignee")</span></a></li>
									</ul>
								</li>
								<li>
									<a href="{{ url('main_task_list') }}">
										<i class="material-icons md-18 dark-gray">assignment</i>
										<span class="padding-left-10">@lang("msg.Daily Task")</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="material-icons md-18"> subdirectory_arrow_right</i>
								<span class="padding-left-10">Med Rec</span>
								<span class="pull-right-container">
										<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="{{ url('patient_medicine') }}"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">@lang("msg.MAR")</span></a></li>
								<li><a href="{{ url('mar_report') }}"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">MAR REPORT</span></a></li>
								<li><a href="{{ url('medicine_stocks_list') }}"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">@lang("msg.Medicine Stock")</span></a></li>
								<li><a href="{{ url('patients_list') }}"><i class="material-icons md-18 dark-gray"> local_hospital </i><span class="padding-left-10">Pharmacy</span></a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="material-icons md-18"> subdirectory_arrow_right</i>
								<span class="padding-left-10">Business Office</span>
								<span class="pull-right-container">
								<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="{{ url('resident_payment') }}"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">@lang("msg.Resident Payment")</span></a></li>
								<li><a href="{{ url('payment_report') }}"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">@lang("msg.Payment Report")</span></a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="material-icons md-18"> subdirectory_arrow_right</i>
								<span class="padding-left-10">General</span>
								<span class="pull-right-container">
								<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li class="">
									<a href="{{ url('activity_calendar') }}">
										<i class="material-icons">calendar_today</i>
										<span class="padding-left-10">@lang("msg.Activity Calendar")</span>
									</a>
								</li>
								<li class="treeview">
									<a href="#">
										<i class="material-icons md-18"> subdirectory_arrow_right</i>
										<span class="padding-left-10">@lang("msg.Master Entry")</span>
										<span class="pull-right-container">
											<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
										</span>
									</a>
									<ul class="treeview-menu">
										<li><a href="{{ url('all_member_list') }}"><i class="material-icons md-18 dark-gray"> perm_identity </i><span class="padding-left-10">@lang("msg.Add User")</a></li>
										<li><a href="{{ url('room_details') }}"><i class="material-icons md-18 dark-gray"> home </i><span class="padding-left-10">@lang("msg.Add Room")</a></li>
										<li><a href="{{ url('service_plan') }}"><i class="material-icons md-18 dark-gray">note_add</i><span class="padding-left-10">Level Of Care</a></li>
										<li><a href="{{ url('assessment_preview') }}"><i class="material-icons md-18 dark-gray">note_add</i><span class="padding-left-10">@lang("msg.Assessments")</a></li>
									</ul>
								</li>
								<li class="">
									<a href="{{action('ProfileController@change_password') }}">
										<i class="material-icons">swap_horiz</i>
										<span>@lang("msg.Change Password")</span>
									</a>
								</li>
								<li class="dark-gray"><a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="material-icons md-18 dark-gray">exit_to_app</i><span class="padding-left-10">&nbsp;@lang("msg.Logout")</span></a></li>
								<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
							</ul>
						</li>
                        <li class="treeview">
							<a href="#">
								<i class="material-icons md-18"> subdirectory_arrow_right</i>
								<span class="padding-left-10">@lang("msg.Reports")</span>
								<span class="pull-right-container">
										<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="{{ url('total_revenue') }}"><i class="material-icons md-18 dark-gray"> monetization_on </i><span class="padding-left-10">@lang("msg.Total Revenue")</a></li>
								<li><a href="{{ url('room_reports') }}"><i class="material-icons md-18 dark-gray"> home </i><span class="padding-left-10">@lang("msg.Room Report")</a></li>
								<li><a href="{{ url('facility_sales_reports') }}"><i class="material-icons md-18"> report</i><span class="padding-left-10">@lang("msg.Sales Reports")</a></li>
								<li><a href="{{ url('aging_report') }}"><i class="material-icons md-18 dark-gray">note_add</i><span class="padding-left-10">@lang("msg.Aging Report")</a></li>
								<li><a href="{{ url('activity_report') }}"><i class="material-icons md-18 dark-gray">local_activity</i><span class="padding-left-10">@lang("msg.Activity Report")</a></li>
								<li><a href="{{ url('tasksheet_report') }}"><i class="material-icons md-18 dark-gray">list</i><span class="padding-left-10">@lang("msg.Task Sheet Report")</a></li>
							</ul>
						</li>
						@endif
						@if(in_array(12,$role_arr))
						<li class="{{ Request::is('dashboard*') ? 'active' : '' }}">
                        	<a href="{{ url('dashboard') }}">
                        		<i class="material-icons md-18 dark-gray">dashboard </i>
                        		<span class="padding-left-10">@lang("msg.Dashboard")</span>
                        	</a>
                        </li>
                        <li class="treeview">
                    		<a href="#">
                    			<i class="material-icons md-18"> subdirectory_arrow_right</i>
                    			<span class="padding-left-10">Compass Care</span>
                    			<span class="pull-right-container">
                    					<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
                    			</span>
                    		</a>
                    		<ul class="treeview-menu">
                    		    <li>
									<a href="{{ url('personal_details') }}">
										<i class="material-icons md-18 dark-gray"> details </i>
										<span class="padding-left-10">@lang("msg.Resident Details")</span>
									</a>
								</li>
                    			<li>
                    				<a href="{{ url('temporary_service_plan') }}">
                    					<i class="material-icons md-18"> assignment</i>
                    					<span class="padding-left-10">Temporary Service Plan</span>
                    				</a>
                    			</li>
                    			<li>
                    				<a href="{{ url('resident_service_plan') }}">
                    					<i class="material-icons md-18"> assignment</i>
                    					<span class="padding-left-10">@lang("msg.Resident Service Plan")</span>
                    				</a>
                    			</li>
                    			<li>
                    				<a href="{{ url('injury') }}">
                    					<i class="material-icons md-18"> assignment</i>
                    					<span class="padding-left-10">@lang("msg.Incident")</span>
                    				</a>
                    			</li>
                    			<li>
                    				<a href="{{ url('all_res_checkup') }}">
                    					<i class="material-icons md-18"> assignment</i>
                    					<span class="padding-left-10">Vital Statistics</span>
                    				</a>
                    			</li>
                    			<li>
                    				<a href="{{ url('all_res_notes') }}">
                    					<i class="material-icons md-18"> assignment</i>
                    					<span class="padding-left-10">Notes</span>
                    				</a>
                    			</li>
                    		</ul>
                    	</li>
                    	<li class="treeview">
                    		<a href="#">
                    			<i class="material-icons md-18"> subdirectory_arrow_right</i>
                    			<span class="padding-left-10">Trans Link</span>
                    			<span class="pull-right-container">
                    					<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
                    			</span>
                    		</a>
                    		<ul class="treeview-menu">
                    			<li>
                    				<a href="#">
                    					<i class="material-icons md-18 dark-gray"> cloud_done</i>
                    					<span class="padding-left-10">@lang("msg.Tasksheet")</span>
                    					<span class="pull-right-container">
                    					<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
                    					</span>
                    				</a>
                    				<ul class="treeview-menu">
                    					<li><a href="{{ url('tasksheet') }}"><i class="material-icons md-18"> list</i><span class="padding-left-10">@lang("msg.Set Tasksheet")</span></a></li>
                    					<li><a href="{{ url('main_task') }}"><i class="material-icons md-18"> list</i><span class="padding-left-10">@lang("msg.Set Assignee")</span></a></li>
                    				</ul>
                    			</li>
                    			<li>
                    				<a href="{{ url('main_task_list') }}">
                    					<i class="material-icons md-18 dark-gray">assignment</i>
                    					<span class="padding-left-10">@lang("msg.Daily Task")</span>
                    				</a>
                    			</li>
                    		</ul>
                    	</li>
                    	<li class="treeview">
                    		<a href="#">
                    			<i class="material-icons md-18"> subdirectory_arrow_right</i>
                    			<span class="padding-left-10">Med Rec</span>
                    			<span class="pull-right-container">
                    					<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
                    			</span>
                    		</a>
                    		<ul class="treeview-menu">
                    			<li><a href="{{ url('patient_medicine') }}"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">@lang("msg.MAR")</span></a></li>
                    			<li><a href="{{ url('mar_report') }}"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">MAR REPORT</span></a></li>
                    			<li><a href="{{ url('medicine_stocks_list') }}"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">@lang("msg.Medicine Stock")</span></a></li>
                    			<li><a href="{{ url('patients_list') }}"><i class="material-icons md-18 dark-gray"> local_hospital </i><span class="padding-left-10">Pharmacy</span></a></li>
                    		</ul>
                    	</li>
                    	<li class="treeview">
                    		<a href="#">
                    			<i class="material-icons md-18"> subdirectory_arrow_right</i>
                    			<span class="padding-left-10">General</span>
                    			<span class="pull-right-container">
                    			<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
                    			</span>
                    		</a>
                    		<ul class="treeview-menu">
                    			<li class="">
                    				<a href="{{ url('activity_calendar') }}">
                    					<i class="material-icons">calendar_today</i>
                    					<span class="padding-left-10">@lang("msg.Activity Calendar")</span>
                    				</a>
                    			</li>
                    			<li class="">
                    				<a href="{{action('ProfileController@change_password') }}">
                    					<i class="material-icons">swap_horiz</i>
                    					<span>@lang("msg.Change Password")</span>
                    				</a>
                    			</li>
                    			<li class="dark-gray"><a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="material-icons md-18 dark-gray">exit_to_app</i><span class="padding-left-10">&nbsp;@lang("msg.Logout")</span></a></li>
                    			<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                            </ul>
                		</li>
						@endif
						@if(in_array(13,$role_arr))
						<li class="{{ Request::is('dashboard*') ? 'active' : '' }}">
                    		<a href="{{ url('dashboard') }}">
                    			<i class="material-icons md-18 dark-gray">dashboard </i>
                    			<span class="padding-left-10">@lang("msg.Dashboard")</span>
                    		</a>
                    	</li>
                    	<li class="treeview">
                    		<a href="#">
                    			<i class="material-icons md-18"> subdirectory_arrow_right</i>
                    			<span class="padding-left-10">Vista View</span>
                    			<span class="pull-right-container">
                    					<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
                    			</span>
                    		</a>
                    		<ul class="treeview-menu">
                    		    <li>
                    				<a href="{{ url('booking') }}">
                    					<i class="material-icons md-18 dark-gray">home </i>
                    					<span class="padding-left-10">@lang("msg.Book Room")</span>
                    				</a>
                    			</li>
                			</ul>
            			</li>
            			<li class="treeview">
                    		<a href="#">
                    			<i class="material-icons md-18"> subdirectory_arrow_right</i>
                    			<span class="padding-left-10">Business Office</span>
                    			<span class="pull-right-container">
                    			<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
                    			</span>
                    		</a>
                    		<ul class="treeview-menu">
                    			<li><a href="{{ url('resident_payment') }}"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">@lang("msg.Resident Payment")</span></a></li>
                    			<li><a href="{{ url('payment_report') }}"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">@lang("msg.Payment Report")</span></a></li>
                    		</ul>
                    	</li>
                    	<li class="treeview">
                    		<a href="#">
                    			<i class="material-icons md-18"> subdirectory_arrow_right</i>
                    			<span class="padding-left-10">General</span>
                    			<span class="pull-right-container">
                    			<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
                    			</span>
                    		</a>
                    		<ul class="treeview-menu">
                    			<li class="">
                    				<a href="{{ url('activity_calendar') }}">
                    					<i class="material-icons">calendar_today</i>
                    					<span class="padding-left-10">@lang("msg.Activity Calendar")</span>
                    				</a>
                    			</li>
                    			<li class="">
                    				<a href="{{action('ProfileController@change_password') }}">
                    					<i class="material-icons">swap_horiz</i>
                    					<span>@lang("msg.Change Password")</span>
                    				</a>
                    			</li>
                    			<li class="dark-gray"><a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="material-icons md-18 dark-gray">exit_to_app</i><span class="padding-left-10">&nbsp;@lang("msg.Logout")</span></a></li>
                    			<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                			</ul>
            			</li>
				    @endif
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
