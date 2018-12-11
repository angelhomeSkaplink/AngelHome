<!DOCTYPE html>
<html lang="en">
	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title> <?php echo $__env->yieldContent('htmlheader_title', 'ANGEL HOME'); ?> </title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<!-- Bootstrap 3.3.4 -->
		<link href="<?php echo e(asset('/css/bootstrap.css')); ?>" rel="stylesheet" type="text/css"/>
		<!-- Font Awesome Icons -->
		<link href="<?php echo e(asset('/css/ionicons.min.css')); ?>" rel="stylesheet" type="text/css"/>
		<!-- Ionicons -->
		<link href="<?php echo e(asset('/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css"/>
		<!-- Theme style -->
		<link href="<?php echo e(asset('/css/AdminLTE.css')); ?>" rel="stylesheet" type="text/css"/>
		<!-- AdminLTE Skin (Blue) -->
		<link href="<?php echo e(asset('/css/skins/skin-blue.css')); ?>" rel="stylesheet" type="text/css"/>
		<!-- iCheck -->
		<link href="<?php echo e(asset('/plugins/iCheck/square/blue.css')); ?>" rel="stylesheet" type="text/css"/>
		<!-- Toastr -->
		<link href="<?php echo e(asset('/css/toastr.min.css')); ?>" rel="stylesheet" type="text/css"/>
		<!-- SweetAlert2 -->
		<link href="<?php echo e(asset('/css/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css"/>
		<!-- Bootstrap calendar CSS -->
		<link href="<?php echo e(asset('/css/bootstrap-datepicker3.css')); ?>" rel="stylesheet" type="text/css"/>
		<!-- Material icon added KALYAN -->

		<!-- Assessment start -->

		<link href="<?php echo e(asset('/css/assessment/surveyeditor.css')); ?>" rel="stylesheet" type="text/css"/>

		<link href="<?php echo e(asset('/css/assessment/survey.css')); ?>" rel="stylesheet" type="text/css"/>
		<link href="<?php echo e(asset('/css/assessment/index.css')); ?>" rel="stylesheet" type="text/css"/>
		<link href="<?php echo e(asset('/css/select2.min.css')); ?>" rel="stylesheet" type="text/css"/>
		<link href="<?php echo e(asset('/css/nav-bar.css')); ?>" rel="stylesheet" type="text/css"/>

		<link href="<?php echo e(asset('/css/assessment/custom.css')); ?>" rel="stylesheet" type="text/css"/>
		<link href="<?php echo e(asset('/css/assessment/jquery-confirm.min.css')); ?>" rel="stylesheet" type="text/css"/>
		<link href="<?php echo e(asset('/css/assessment/jquery-ui.css')); ?>" rel="stylesheet" type="text/css"/>
		<!-- Assessment end -->

		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script src="<?php echo e(asset('/plugins/jQuery/jQuery-2.1.4.min.js')); ?>"></script>
		<script type="text/javascript" language="javascript" src="<?php echo e(asset('/js/bootstrap-datepicker.js')); ?>"></script>
		<script type="text/javascript" language="javascript" src="<?php echo e(asset('/js/select2.min.js')); ?>"></script>
		


		<?php echo $__env->yieldContent('header-extra'); ?>
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
					<a href="<?php echo e(url('/dashboard')); ?>" class="logo">
                    <?php
						$logo = DB::table('facility')->where('id', Auth::user()->facility_id)->first();
					?>
					<!-- mini logo for sidebar mini 50x50 pixels -->
					<?php if($logo->facility_logo==NULL): ?>
					<span class="logo-lg"><img src="http://seniorsafetech.com/angel_home_s_admin/hsfiles/public/facility_logo/images.png" class="img-circle" width="40" height="40"></span>
					<?php else: ?>
					<span class="logo-lg"><img src="http://seniorsafetech.com/angel_home_s_admin/hsfiles/public/facility_logo/<?php echo e($logo->facility_logo); ?>" class="img-circle" width="40" height="40"></span>
					
					<?php endif; ?>
					<!-- logo for regular state and mobile devices -->
					
					<?php if($logo->facility_logo==NULL): ?>
					<span class="logo-lg"><img src="http://documentcluster.com/angel_home/hsfiles/public/facility_logo/images.png" class="img-circle" width="40" height="40"></span>
					<?php else: ?>
					<span class="logo-lg"><img src="http://documentcluster.com/angel_home/hsfiles/public/facility_logo/<?php echo e($logo->facility_logo); ?>" class="img-circle" width="40" height="40"></span>
					
					<?php endif; ?>
				</a>
				<!-- Header Navbar -->
				<nav class="navbar navbar-static-top" role="navigation">
					<!-- Sidebar toggle button-->
					<a href="#" class="sidebar-toggle cust-remove-nav-side-open-lg" data-toggle="offcanvas" role="button"></a>
					<div class="herder-text" data-toggle="" role="button">
						<?php $facility_name = DB::table('facility')->where('id', Auth::user()->facility_id)->first(); ?>
						<span class=""><b><?php echo app('translator')->get("msg.Welcome To"); ?> <?php echo e($facility_name->facility_name); ?></b></span>
					</div>
					<!-- Navbar Right Menu -->
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<?php if(Auth::guest()): ?>
								<li><a href="<?php echo e(url('/login')); ?>">Login</a></li>
								<li><a href="<?php echo e(url('/register')); ?>">Register</a></li>
							<?php else: ?>
							<!-- User Account Menu -->
								<?php
									$route_name = url()->full();
								?>
								<div class="herder-language">
									<form action="<?php echo e($route_name); ?>" method="get">
										<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
										<?php echo e(csrf_field()); ?>

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
							<?php endif; ?>
						</ul>
					</div>
				</nav>
			</header>

			<!-- Left side column. contains the logo and sidebar -->
			<aside class="main-sidebar">
				<!-- sidebar: style can be found in sidebar.less -->
				<section class="sidebar">
					<!-- Sidebar user panel (optional) -->
					<?php if(! Auth::guest()): ?>
					<?php endif; ?>
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
						<?php if(in_array(1,$role_arr)): ?>
						<li class="<?php echo e(Request::is('dashboard*') ? 'active' : ''); ?>">
							<a href="<?php echo e(url('dashboard')); ?>">
								<i class="material-icons md-18 dark-gray">dashboard </i>
								<span class="padding-left-10"><?php echo app('translator')->get("msg.Dashboard"); ?></span>
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
									<a href="<?php echo e(url('sales_pipeline')); ?>">
										<i class="material-icons"> image_search </i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Inquiry"); ?></span>
									</a>
								</li>
								<li>
									<a href="<?php echo e(url('appointment_schedule')); ?>">
										<i class="material-icons"> settings_backup_restore </i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Appointment Schedule"); ?></span>
									</a>
								</li>
								<li>
									<a href="<?php echo e(url('sales_stage_pipeline')); ?>">
										<i class="material-icons md-18"> insert_chart</i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Sales Pipeline"); ?></span>
									</a>
								</li>
								<li>
									<a href="<?php echo e(url('reports')); ?>">
										<i class="material-icons md-18"> report</i>Sales Reports 
									</a>
								</li>
								<li>
									<a href="<?php echo e(url('personal_details')); ?>">
										<i class="material-icons md-18 dark-gray"> details </i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Future Resident Details"); ?></span>
									</a>
								</li>
								<li>
									<a href="<?php echo e(url('screening')); ?>">
										<i class="material-icons md-18 dark-gray">queue_play_next </i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Screening"); ?></span>
									</a>
								</li>
								<li>
									<a href="<?php echo e(url('booking')); ?>">
										<i class="material-icons md-18 dark-gray">home </i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Book Room"); ?></span>
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
									<a href="<?php echo e(url('temporary_service_plan')); ?>">
										<i class="material-icons md-18"> assignment</i>
										<span class="padding-left-10">Temporary Service Plan</span>
									</a>
								</li>
								<li>
									<a href="<?php echo e(url('resident_service_plan')); ?>">
										<i class="material-icons md-18"> assignment</i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Resident Service Plan"); ?></span>
									</a>
								</li>
								<li>
									<a href="<?php echo e(url('injury')); ?>">
										<i class="material-icons md-18"> assignment</i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Incident"); ?></span>
									</a>
								</li>
								<li>
									<a href="<?php echo e(url('all_res_checkup')); ?>">
										<i class="material-icons md-18"> assignment</i>
										<span class="padding-left-10">Check-up</span>
									</a>
								</li>
								<li>
        							<a href="#">
        								<i class="material-icons md-18"> subdirectory_arrow_right</i>
        								<span class="padding-left-10"><?php echo app('translator')->get("msg.Assessment"); ?></span>
        								<span class="pull-right-container">
        								<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
        								</span>
        							</a>
        							<ul class="treeview-menu">
        								<li><a href="<?php echo e(url('preadmin_resident_assessment')); ?>"><i class="material-icons md-18 dark-gray"> assessment </i><span class="padding-left-10"><?php echo app('translator')->get("msg.Preadmission Evaluation"); ?></a></li>
        								<li><a href="<?php echo e(url('resident_assessment')); ?>"><i class="material-icons md-18 dark-gray"> assessment </i><span class="padding-left-10"><?php echo app('translator')->get("msg.Sub Assessments"); ?></a></li>
        							</ul>
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
									<a href="<?php echo e(url('assessment')); ?>">
										<i class="material-icons md-18 dark-gray"> assignment</i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Assessments Upload"); ?></span>
									</a>
								</li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="material-icons md-18"> subdirectory_arrow_right</i>
								<span class="padding-left-10">Link Us</span>
								<span class="pull-right-container">
										<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="#">
										<i class="material-icons md-18 dark-gray"> cloud_done</i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Tasksheet"); ?></span>
										<span class="pull-right-container">
										<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
										</span>
									</a>
									<ul class="treeview-menu">
										<li><a href="<?php echo e(url('tasksheet')); ?>"><i class="material-icons md-18"> list</i><span class="padding-left-10"><?php echo app('translator')->get("msg.Set Tasksheet"); ?></span></a></li>
										<li><a href="<?php echo e(url('main_task')); ?>"><i class="material-icons md-18"> list</i><span class="padding-left-10"><?php echo app('translator')->get("msg.Set Assignee"); ?></span></a></li>
									</ul>
								</li>
								<li>
									<a href="<?php echo e(url('main_task_list')); ?>">
										<i class="material-icons md-18 dark-gray">assignment</i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Daily Task"); ?></span>
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
								<li><a href="<?php echo e(url('patient_medicine')); ?>"><i class="material-icons md-18"> assignment</i><span class="padding-left-10"><?php echo app('translator')->get("msg.MAR"); ?></span></a></li>
								<li><a href="<?php echo e(url('mar_report')); ?>"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">MAR REPORT</span></a></li>
								<li><a href="<?php echo e(url('medicine_stocks_list')); ?>"><i class="material-icons md-18"> assignment</i><span class="padding-left-10"><?php echo app('translator')->get("msg.Medicine Stock"); ?></span></a></li>
								<li><a href="<?php echo e(url('patients_list')); ?>"><i class="material-icons md-18 dark-gray"> local_hospital </i><span class="padding-left-10"><?php echo app('translator')->get("msg.Doctor"); ?></span></a></li>
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
								<li><a href="<?php echo e(url('resident_payment')); ?>"><i class="material-icons md-18"> assignment</i><span class="padding-left-10"><?php echo app('translator')->get("msg.Resident Payment"); ?></span></a></li>
								<li><a href="<?php echo e(url('payment_report')); ?>"><i class="material-icons md-18"> assignment</i><span class="padding-left-10"><?php echo app('translator')->get("msg.Payment Report"); ?></span></a></li>
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
									<a href="<?php echo e(url('activity_calendar')); ?>">
										<i class="material-icons">calendar_today</i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Activity Calendar"); ?></span>
									</a>
								</li>
								<li class="treeview">
									<a href="#">
										<i class="material-icons md-18"> subdirectory_arrow_right</i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Master Entry"); ?></span>
										<span class="pull-right-container">
											<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
										</span>
									</a>
									<ul class="treeview-menu">
										<li><a href="<?php echo e(url('all_member_list')); ?>"><i class="material-icons md-18 dark-gray"> perm_identity </i><span class="padding-left-10"><?php echo app('translator')->get("msg.Add User"); ?></a></li>
										<li><a href="<?php echo e(url('room_details')); ?>"><i class="material-icons md-18 dark-gray"> home </i><span class="padding-left-10"><?php echo app('translator')->get("msg.Add Room"); ?></a></li>
										<li><a href="<?php echo e(url('service_plan')); ?>"><i class="material-icons md-18 dark-gray">note_add</i><span class="padding-left-10"><?php echo app('translator')->get("msg.Service Plan"); ?></a></li>
										<li><a href="<?php echo e(url('assessment_preview')); ?>"><i class="material-icons md-18 dark-gray">note_add</i><span class="padding-left-10"><?php echo app('translator')->get("msg.Assessments"); ?></a></li>
									</ul>
								</li>
								<li class="">
									<a href="<?php echo e(action('ProfileController@change_password')); ?>">
										<i class="material-icons">swap_horiz</i>
										<span><?php echo app('translator')->get("msg.Change Password"); ?></span>
									</a>
								</li>
								<li class="dark-gray"><a href="<?php echo e(url('/logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="material-icons md-18 dark-gray">exit_to_app</i><span class="padding-left-10">&nbsp;<?php echo app('translator')->get("msg.Logout"); ?></span></a></li>
								<form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;"><?php echo e(csrf_field()); ?></form>
							</ul>
						</li>
                        <li class="treeview">
							<a href="#">
								<i class="material-icons md-18"> subdirectory_arrow_right</i>
								<span class="padding-left-10"><?php echo app('translator')->get("msg.Reports"); ?></span>
								<span class="pull-right-container">
										<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo e(url('total_revenue')); ?>"><i class="material-icons md-18 dark-gray"> monetization_on </i><span class="padding-left-10"><?php echo app('translator')->get("msg.Total Revenue"); ?></a></li>
								<li><a href="<?php echo e(url('room_reports')); ?>"><i class="material-icons md-18 dark-gray"> home </i><span class="padding-left-10"><?php echo app('translator')->get("msg.Room Report"); ?></a></li>
								<li><a href="<?php echo e(url('facility_sales_reports')); ?>"><i class="material-icons md-18"> report</i><span class="padding-left-10"><?php echo app('translator')->get("msg.Sales Reports"); ?></a></li>
								<li><a href="<?php echo e(url('aging_report')); ?>"><i class="material-icons md-18 dark-gray">note_add</i><span class="padding-left-10"><?php echo app('translator')->get("msg.Aging Report"); ?></a></li>
								<li><a href="<?php echo e(url('activity_report')); ?>"><i class="material-icons md-18 dark-gray">local_activity</i><span class="padding-left-10"><?php echo app('translator')->get("msg.Activity Report"); ?></a></li>
								<li><a href="<?php echo e(url('tasksheet_report')); ?>"><i class="material-icons md-18 dark-gray">list</i><span class="padding-left-10"><?php echo app('translator')->get("msg.Task Sheet Report"); ?></a></li>
							</ul>
						</li>
						<?php endif; ?>

						<?php if(in_array(2,$role_arr)): ?>
						<li class="<?php echo e(Request::is('dashboard*') ? 'active' : ''); ?>">
							<a href="<?php echo e(url('dashboard')); ?>">
								<i class="material-icons md-18 dark-gray">dashboard </i>
								<span class="padding-left-10"><?php echo app('translator')->get("msg.Dashboard"); ?></span>
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
									<a href="<?php echo e(url('sales_pipeline')); ?>">
										<i class="material-icons"> image_search </i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Inquiry"); ?></span>
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
									<a href="<?php echo e(url('activity_calendar')); ?>">
										<i class="material-icons">calendar_today</i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Activity Calendar"); ?></span>
									</a>
								</li>
								<li class="">
									<a href="<?php echo e(action('ProfileController@change_password')); ?>">
										<i class="material-icons">swap_horiz</i>
										<span><?php echo app('translator')->get("msg.Change Password"); ?></span>
									</a>
								</li>
								<li class="dark-gray"><a href="<?php echo e(url('/logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="material-icons md-18 dark-gray">exit_to_app</i><span class="padding-left-10">&nbsp;<?php echo app('translator')->get("msg.Logout"); ?></span></a></li>
								<form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;"><?php echo e(csrf_field()); ?></form>
							</ul>
						</li>
						<?php endif; ?>

						<?php if(in_array(3,$role_arr)): ?>
						<li class="<?php echo e(Request::is('dashboard*') ? 'active' : ''); ?>">
							<a href="<?php echo e(url('dashboard')); ?>">
								<i class="material-icons md-18 dark-gray">dashboard </i>
								<span class="padding-left-10"><?php echo app('translator')->get("msg.Dashboard"); ?></span>
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
									<a href="<?php echo e(url('sales_pipeline')); ?>">
										<i class="material-icons"> image_search </i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Inquiry"); ?></span>
									</a>
								</li>
								<li>
									<a href="<?php echo e(url('appointment_schedule')); ?>">
										<i class="material-icons"> settings_backup_restore </i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Appointment Schedule"); ?></span>
									</a>
								</li>
								<li>
									<a href="<?php echo e(url('sales_stage_pipeline')); ?>">
										<i class="material-icons md-18"> insert_chart</i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Sales Pipeline"); ?></span>
									</a>
								</li>
								<li>
									<a href="<?php echo e(url('reports')); ?>">
										<i class="material-icons md-18"> report</i>Sales Reports 
									</a>
								</li>
								<li>
									<a href="<?php echo e(url('personal_details')); ?>">
										<i class="material-icons md-18 dark-gray"> details </i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Future Resident Details"); ?></span>
									</a>
								</li>
								<li>
									<a href="<?php echo e(url('screening')); ?>">
										<i class="material-icons md-18 dark-gray">queue_play_next </i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Screening"); ?></span>
									</a>
								</li>
								<li>
									<a href="<?php echo e(url('booking')); ?>">
										<i class="material-icons md-18 dark-gray">home </i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Book Room"); ?></span>
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
									<a href="<?php echo e(url('activity_calendar')); ?>">
										<i class="material-icons">calendar_today</i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Activity Calendar"); ?></span>
									</a>
								</li>
								<li class="">
									<a href="<?php echo e(action('ProfileController@change_password')); ?>">
										<i class="material-icons">swap_horiz</i>
										<span><?php echo app('translator')->get("msg.Change Password"); ?></span>
									</a>
								</li>
								<li class="dark-gray"><a href="<?php echo e(url('/logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="material-icons md-18 dark-gray">exit_to_app</i><span class="padding-left-10">&nbsp;<?php echo app('translator')->get("msg.Logout"); ?></span></a></li>
								<form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;"><?php echo e(csrf_field()); ?></form>
							</ul>
						</li>
						<?php endif; ?>
						<?php if(in_array(4,$role_arr)): ?>

						<li class="<?php echo e(Request::is('dashboard*') ? 'active' : ''); ?>">
							<a href="<?php echo e(url('dashboard')); ?>">
								<i class="material-icons md-18 dark-gray">dashboard </i>
								<span class="padding-left-10"><?php echo app('translator')->get("msg.Dashboard"); ?></span>
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
									<a href="<?php echo e(url('appointment_schedule')); ?>">
										<i class="material-icons"> settings_backup_restore </i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Appointment Schedule"); ?></span>
									</a>
								</li>
								<li>
									<a href="<?php echo e(url('screening')); ?>">
										<i class="material-icons md-18 dark-gray">queue_play_next </i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Screening"); ?></span>
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
									<a href="<?php echo e(url('temporary_service_plan')); ?>">
										<i class="material-icons md-18"> assignment</i>
										<span class="padding-left-10">Temporary Service Plan</span>
									</a>
								</li>
								<li>
									<a href="<?php echo e(url('resident_service_plan')); ?>">
										<i class="material-icons md-18"> assignment</i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Resident Service Plan"); ?></span>
									</a>
								</li>
								<li>
									<a href="<?php echo e(url('injury')); ?>">
										<i class="material-icons md-18"> assignment</i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Incident"); ?></span>
									</a>
								</li>
								<li>
        							<a href="#">
        								<i class="material-icons md-18"> subdirectory_arrow_right</i>
        								<span class="padding-left-10"><?php echo app('translator')->get("msg.Assessment"); ?></span>
        								<span class="pull-right-container">
        								<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
        								</span>
        							</a>
        							<ul class="treeview-menu">
        								<li><a href="<?php echo e(url('preadmin_resident_assessment')); ?>"><i class="material-icons md-18 dark-gray"> assessment </i><span class="padding-left-10"><?php echo app('translator')->get("msg.Preadmission Evaluation"); ?></a></li>
        								<li><a href="<?php echo e(url('resident_assessment')); ?>"><i class="material-icons md-18 dark-gray"> assessment </i><span class="padding-left-10"><?php echo app('translator')->get("msg.Sub Assessments"); ?></a></li>
        							</ul>
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
									<a href="<?php echo e(url('assessment')); ?>">
										<i class="material-icons md-18 dark-gray"> assignment</i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Assessments Upload"); ?></span>
									</a>
								</li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="material-icons md-18"> subdirectory_arrow_right</i>
								<span class="padding-left-10">Link Us</span>
								<span class="pull-right-container">
										<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="#">
										<i class="material-icons md-18 dark-gray"> cloud_done</i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Tasksheet"); ?></span>
										<span class="pull-right-container">
										<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
										</span>
									</a>
									<ul class="treeview-menu">
										<li><a href="<?php echo e(url('tasksheet')); ?>"><i class="material-icons md-18"> list</i><span class="padding-left-10"><?php echo app('translator')->get("msg.Set Tasksheet"); ?></span></a></li>
										<li><a href="<?php echo e(url('main_task')); ?>"><i class="material-icons md-18"> list</i><span class="padding-left-10"><?php echo app('translator')->get("msg.Set Assignee"); ?></span></a></li>
									</ul>
								</li>
								<li>
									<a href="<?php echo e(url('main_task_list')); ?>">
										<i class="material-icons md-18 dark-gray">assignment</i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Daily Task"); ?></span>
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
								<li><a href="<?php echo e(url('patient_medicine')); ?>"><i class="material-icons md-18"> assignment</i><span class="padding-left-10"><?php echo app('translator')->get("msg.MAR"); ?></span></a></li>
								<li><a href="<?php echo e(url('mar_report')); ?>"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">MAR REPORT</span></a></li>
								<li><a href="<?php echo e(url('medicine_stocks_list')); ?>"><i class="material-icons md-18"> assignment</i><span class="padding-left-10"><?php echo app('translator')->get("msg.Medicine Stock"); ?></span></a></li>
								<li><a href="<?php echo e(url('patients_list')); ?>"><i class="material-icons md-18 dark-gray"> local_hospital </i><span class="padding-left-10"><?php echo app('translator')->get("msg.Doctor"); ?></span></a></li>
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
									<a href="<?php echo e(url('activity_calendar')); ?>">
										<i class="material-icons">calendar_today</i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Activity Calendar"); ?></span>
									</a>
								</li>
								<li class="">
									<a href="<?php echo e(action('ProfileController@change_password')); ?>">
										<i class="material-icons">swap_horiz</i>
										<span><?php echo app('translator')->get("msg.Change Password"); ?></span>
									</a>
								</li>
								<li class="dark-gray"><a href="<?php echo e(url('/logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="material-icons md-18 dark-gray">exit_to_app</i><span class="padding-left-10">&nbsp;<?php echo app('translator')->get("msg.Logout"); ?></span></a></li>
								<form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;"><?php echo e(csrf_field()); ?></form>
							</ul>
						</li>
                        <li class="treeview">
							<a href="#">
								<i class="material-icons md-18"> subdirectory_arrow_right</i>
								<span class="padding-left-10"><?php echo app('translator')->get("msg.Reports"); ?></span>
								<span class="pull-right-container">
										<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo e(url('total_revenue')); ?>"><i class="material-icons md-18 dark-gray"> monetization_on </i><span class="padding-left-10"><?php echo app('translator')->get("msg.Total Revenue"); ?></a></li>
								<li><a href="<?php echo e(url('room_reports')); ?>"><i class="material-icons md-18 dark-gray"> home </i><span class="padding-left-10"><?php echo app('translator')->get("msg.Room Report"); ?></a></li>
								<li><a href="<?php echo e(url('facility_sales_reports')); ?>"><i class="material-icons md-18"> report</i><span class="padding-left-10"><?php echo app('translator')->get("msg.Sales Reports"); ?></a></li>
								<li><a href="<?php echo e(url('aging_report')); ?>"><i class="material-icons md-18 dark-gray">note_add</i><span class="padding-left-10"><?php echo app('translator')->get("msg.Aging Report"); ?></a></li>
								<li><a href="<?php echo e(url('activity_report')); ?>"><i class="material-icons md-18 dark-gray">local_activity</i><span class="padding-left-10"><?php echo app('translator')->get("msg.Activity Report"); ?></a></li>
								<li><a href="<?php echo e(url('tasksheet_report')); ?>"><i class="material-icons md-18 dark-gray">list</i><span class="padding-left-10"><?php echo app('translator')->get("msg.Task Sheet Report"); ?></a></li>
							</ul>
						</li>
						<?php endif; ?>
						<?php if(in_array(5,$role_arr)): ?>
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
											<a href="#">
												<i class="material-icons md-18"> subdirectory_arrow_right</i>
												<span class="padding-left-10"><?php echo app('translator')->get("msg.Assessment"); ?></span>
												<span class="pull-right-container">
												<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
												</span>
											</a>
											<ul class="treeview-menu">
												<li><a href="<?php echo e(url('preadmin_resident_assessment')); ?>"><i class="material-icons md-18 dark-gray"> assessment </i><span class="padding-left-10"><?php echo app('translator')->get("msg.Preadmission Evaluation"); ?></a></li>
												<li><a href="<?php echo e(url('resident_assessment')); ?>"><i class="material-icons md-18 dark-gray"> assessment </i><span class="padding-left-10"><?php echo app('translator')->get("msg.Sub Assessments"); ?></a></li>
											</ul>
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
									<a href="<?php echo e(url('assessment')); ?>">
										<i class="material-icons md-18 dark-gray"> assignment</i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Assessments Upload"); ?></span>
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
										<a href="<?php echo e(action('ProfileController@change_password')); ?>">
											<i class="material-icons">swap_horiz</i>
											<span><?php echo app('translator')->get("msg.Change Password"); ?></span>
										</a>
									</li>
									<li class="dark-gray"><a href="<?php echo e(url('/logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="material-icons md-18 dark-gray">exit_to_app</i><span class="padding-left-10">&nbsp;<?php echo app('translator')->get("msg.Logout"); ?></span></a></li>
									<form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;"><?php echo e(csrf_field()); ?></form>
								</ul>
						</li>
						<?php endif; ?>
						<?php if(in_array(6,$role_arr)): ?>
						<li>
							<a href="<?php echo e(url('patients_list')); ?>">
								<i class="material-icons md-18 dark-gray"> local_hospital </i>
								<span class="padding-left-10"><?php echo app('translator')->get("msg.Doctor"); ?></span>
							</a>
						</li>
						<?php endif; ?>
						<?php if(in_array(7,$role_arr)): ?>
							<li><a href="<?php echo e(url('patient_medicine')); ?>"><i class="material-icons md-18"> assignment</i><span class="padding-left-10"><?php echo app('translator')->get("msg.MAR"); ?></span></a></li>
							<li><a href="<?php echo e(url('mar_report')); ?>"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">MAR REPORT</span></a></li>
							<li><a href="<?php echo e(url('medicine_stocks_list')); ?>"><i class="material-icons md-18"> assignment</i><span class="padding-left-10"><?php echo app('translator')->get("msg.Medicine Stock"); ?></span></a></li>
						<?php endif; ?>
						<?php if(in_array(8,$role_arr)): ?>
						<li class="<?php echo e(Request::is('dashboard*') ? 'active' : ''); ?>">
							<a href="<?php echo e(url('dashboard')); ?>">
								<i class="material-icons md-18 dark-gray">dashboard </i>
								<span class="padding-left-10"><?php echo app('translator')->get("msg.Dashboard"); ?></span>
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
									<a href="<?php echo e(url('sales_pipeline')); ?>">
										<i class="material-icons"> image_search </i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Inquiry"); ?></span>
									</a>
								</li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="material-icons md-18"> subdirectory_arrow_right</i>
								<span class="padding-left-10">Link Us</span>
								<span class="pull-right-container">
										<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="#">
										<i class="material-icons md-18 dark-gray"> cloud_done</i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Tasksheet"); ?></span>
										<span class="pull-right-container">
										<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
										</span>
									</a>
									<ul class="treeview-menu">
										<li><a href="<?php echo e(url('tasksheet')); ?>"><i class="material-icons md-18"> list</i><span class="padding-left-10"><?php echo app('translator')->get("msg.Set Tasksheet"); ?></span></a></li>
										<li><a href="<?php echo e(url('main_task')); ?>"><i class="material-icons md-18"> list</i><span class="padding-left-10"><?php echo app('translator')->get("msg.Set Assignee"); ?></span></a></li>
									</ul>
								</li>
								<li>
									<a href="<?php echo e(url('main_task_list')); ?>">
										<i class="material-icons md-18 dark-gray">assignment</i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Daily Task"); ?></span>
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
									<a href="<?php echo e(action('ProfileController@change_password')); ?>">
										<i class="material-icons">swap_horiz</i>
										<span><?php echo app('translator')->get("msg.Change Password"); ?></span>
									</a>
								</li>
								<li class="dark-gray"><a href="<?php echo e(url('/logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="material-icons md-18 dark-gray">exit_to_app</i><span class="padding-left-10">&nbsp;<?php echo app('translator')->get("msg.Logout"); ?></span></a></li>
								<form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;"><?php echo e(csrf_field()); ?></form>
							</ul>
						</li>
						<?php endif; ?>
						<?php if(in_array(11,$role_arr)): ?>
						<li class="<?php echo e(Request::is('dashboard*') ? 'active' : ''); ?>">
							<a href="<?php echo e(url('dashboard')); ?>">
								<i class="material-icons md-18 dark-gray">dashboard </i>
								<span class="padding-left-10"><?php echo app('translator')->get("msg.Dashboard"); ?></span>
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
									<a href="<?php echo e(url('sales_pipeline')); ?>">
										<i class="material-icons"> image_search </i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Inquiry"); ?></span>
									</a>
								</li>
								<li>
									<a href="<?php echo e(url('appointment_schedule')); ?>">
										<i class="material-icons"> settings_backup_restore </i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Appointment Schedule"); ?></span>
									</a>
								</li>
								<li>
									<a href="<?php echo e(url('sales_stage_pipeline')); ?>">
										<i class="material-icons md-18"> insert_chart</i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Sales Pipeline"); ?></span>
									</a>
								</li>
								<li>
									<a href="<?php echo e(url('reports')); ?>">
										<i class="material-icons md-18"> report</i>Sales Reports 
									</a>
								</li>
								<li>
									<a href="<?php echo e(url('personal_details')); ?>">
										<i class="material-icons md-18 dark-gray"> details </i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Future Resident Details"); ?></span>
									</a>
								</li>
								<li>
									<a href="<?php echo e(url('screening')); ?>">
										<i class="material-icons md-18 dark-gray">queue_play_next </i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Screening"); ?></span>
									</a>
								</li>
								<li>
									<a href="<?php echo e(url('booking')); ?>">
										<i class="material-icons md-18 dark-gray">home </i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Book Room"); ?></span>
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
									<a href="<?php echo e(url('temporary_service_plan')); ?>">
										<i class="material-icons md-18"> assignment</i>
										<span class="padding-left-10">Temporary Service Plan</span>
									</a>
								</li>
								<li>
									<a href="<?php echo e(url('resident_service_plan')); ?>">
										<i class="material-icons md-18"> assignment</i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Resident Service Plan"); ?></span>
									</a>
								</li>
								<li>
									<a href="<?php echo e(url('injury')); ?>">
										<i class="material-icons md-18"> assignment</i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Incident"); ?></span>
									</a>
								</li>
								<li>
        							<a href="#">
        								<i class="material-icons md-18"> subdirectory_arrow_right</i>
        								<span class="padding-left-10"><?php echo app('translator')->get("msg.Assessment"); ?></span>
        								<span class="pull-right-container">
        								<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
        								</span>
        							</a>
        							<ul class="treeview-menu">
        								<li><a href="<?php echo e(url('preadmin_resident_assessment')); ?>"><i class="material-icons md-18 dark-gray"> assessment </i><span class="padding-left-10"><?php echo app('translator')->get("msg.Preadmission Evaluation"); ?></a></li>
        								<li><a href="<?php echo e(url('resident_assessment')); ?>"><i class="material-icons md-18 dark-gray"> assessment </i><span class="padding-left-10"><?php echo app('translator')->get("msg.Sub Assessments"); ?></a></li>
        							</ul>
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
									<a href="<?php echo e(url('assessment')); ?>">
										<i class="material-icons md-18 dark-gray"> assignment</i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Assessments Upload"); ?></span>
									</a>
								</li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="material-icons md-18"> subdirectory_arrow_right</i>
								<span class="padding-left-10">Link Us</span>
								<span class="pull-right-container">
										<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="#">
										<i class="material-icons md-18 dark-gray"> cloud_done</i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Tasksheet"); ?></span>
										<span class="pull-right-container">
										<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
										</span>
									</a>
									<ul class="treeview-menu">
										<li><a href="<?php echo e(url('tasksheet')); ?>"><i class="material-icons md-18"> list</i><span class="padding-left-10"><?php echo app('translator')->get("msg.Set Tasksheet"); ?></span></a></li>
										<li><a href="<?php echo e(url('main_task')); ?>"><i class="material-icons md-18"> list</i><span class="padding-left-10"><?php echo app('translator')->get("msg.Set Assignee"); ?></span></a></li>
									</ul>
								</li>
								<li>
									<a href="<?php echo e(url('main_task_list')); ?>">
										<i class="material-icons md-18 dark-gray">assignment</i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Daily Task"); ?></span>
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
								<li><a href="<?php echo e(url('patient_medicine')); ?>"><i class="material-icons md-18"> assignment</i><span class="padding-left-10"><?php echo app('translator')->get("msg.MAR"); ?></span></a></li>
								<li><a href="<?php echo e(url('mar_report')); ?>"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">MAR REPORT</span></a></li>
								<li><a href="<?php echo e(url('medicine_stocks_list')); ?>"><i class="material-icons md-18"> assignment</i><span class="padding-left-10"><?php echo app('translator')->get("msg.Medicine Stock"); ?></span></a></li>
								<li><a href="<?php echo e(url('patients_list')); ?>"><i class="material-icons md-18 dark-gray"> local_hospital </i><span class="padding-left-10"><?php echo app('translator')->get("msg.Doctor"); ?></span></a></li>
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
								<li><a href="<?php echo e(url('resident_payment')); ?>"><i class="material-icons md-18"> assignment</i><span class="padding-left-10"><?php echo app('translator')->get("msg.Resident Payment"); ?></span></a></li>
								<li><a href="<?php echo e(url('payment_report')); ?>"><i class="material-icons md-18"> assignment</i><span class="padding-left-10"><?php echo app('translator')->get("msg.Payment Report"); ?></span></a></li>
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
									<a href="<?php echo e(url('activity_calendar')); ?>">
										<i class="material-icons">calendar_today</i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Activity Calendar"); ?></span>
									</a>
								</li>
								<li class="treeview">
									<a href="#">
										<i class="material-icons md-18"> subdirectory_arrow_right</i>
										<span class="padding-left-10"><?php echo app('translator')->get("msg.Master Entry"); ?></span>
										<span class="pull-right-container">
											<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
										</span>
									</a>
									<ul class="treeview-menu">
										<li><a href="<?php echo e(url('all_member_list')); ?>"><i class="material-icons md-18 dark-gray"> perm_identity </i><span class="padding-left-10"><?php echo app('translator')->get("msg.Add User"); ?></a></li>
										<li><a href="<?php echo e(url('room_details')); ?>"><i class="material-icons md-18 dark-gray"> home </i><span class="padding-left-10"><?php echo app('translator')->get("msg.Add Room"); ?></a></li>
										<li><a href="<?php echo e(url('service_plan')); ?>"><i class="material-icons md-18 dark-gray">note_add</i><span class="padding-left-10"><?php echo app('translator')->get("msg.Service Plan"); ?></a></li>
										<li><a href="<?php echo e(url('assessment_preview')); ?>"><i class="material-icons md-18 dark-gray">note_add</i><span class="padding-left-10"><?php echo app('translator')->get("msg.Assessments"); ?></a></li>
									</ul>
								</li>
								<li class="">
									<a href="<?php echo e(action('ProfileController@change_password')); ?>">
										<i class="material-icons">swap_horiz</i>
										<span><?php echo app('translator')->get("msg.Change Password"); ?></span>
									</a>
								</li>
								<li class="dark-gray"><a href="<?php echo e(url('/logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="material-icons md-18 dark-gray">exit_to_app</i><span class="padding-left-10">&nbsp;<?php echo app('translator')->get("msg.Logout"); ?></span></a></li>
								<form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;"><?php echo e(csrf_field()); ?></form>
							</ul>
						</li>
                        <li class="treeview">
							<a href="#">
								<i class="material-icons md-18"> subdirectory_arrow_right</i>
								<span class="padding-left-10"><?php echo app('translator')->get("msg.Reports"); ?></span>
								<span class="pull-right-container">
										<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo e(url('total_revenue')); ?>"><i class="material-icons md-18 dark-gray"> monetization_on </i><span class="padding-left-10"><?php echo app('translator')->get("msg.Total Revenue"); ?></a></li>
								<li><a href="<?php echo e(url('room_reports')); ?>"><i class="material-icons md-18 dark-gray"> home </i><span class="padding-left-10"><?php echo app('translator')->get("msg.Room Report"); ?></a></li>
								<li><a href="<?php echo e(url('facility_sales_reports')); ?>"><i class="material-icons md-18"> report</i><span class="padding-left-10"><?php echo app('translator')->get("msg.Sales Reports"); ?></a></li>
								<li><a href="<?php echo e(url('aging_report')); ?>"><i class="material-icons md-18 dark-gray">note_add</i><span class="padding-left-10"><?php echo app('translator')->get("msg.Aging Report"); ?></a></li>
								<li><a href="<?php echo e(url('activity_report')); ?>"><i class="material-icons md-18 dark-gray">local_activity</i><span class="padding-left-10"><?php echo app('translator')->get("msg.Activity Report"); ?></a></li>
								<li><a href="<?php echo e(url('tasksheet_report')); ?>"><i class="material-icons md-18 dark-gray">list</i><span class="padding-left-10"><?php echo app('translator')->get("msg.Task Sheet Report"); ?></a></li>
							</ul>
						</li>
						<?php endif; ?>
				</ul>
			</section>
			</aside>
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<div style="padding-top:4px"></div>
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h4>
						<?php echo $__env->yieldContent('contentheader_title', 'Page Header here'); ?>
						<small><?php echo $__env->yieldContent('contentheader_description'); ?></small>
					</h4>
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Your Page Content Here -->
					<?php echo $__env->yieldContent('main-content'); ?>
				</section><!-- /.content -->
			</div><!-- /.content-wrapper -->
			<div class='control-sidebar-bg'></div>
		</div><!-- ./wrapper -->
		<?php echo $__env->make('layouts.partials.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->yieldContent('scipts-extra'); ?>
	</body>
</html>
