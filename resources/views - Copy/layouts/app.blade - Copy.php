<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title> @yield('htmlheader_title', 'AHSEC') </title>
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
		
		@yield('header-extra')
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<style>	
		.button {
			color: #fff;
			text-decoration: none;
			display: inline-block;
			padding: 14px 23px;
			-webkit-border-radius: 5px;
		}
		.button.black {
			background-image: -webkit-gradient(linear, left top, left bottom, 
			from(#3c8dbc),
			color-stop(0.5, #303749), 
			color-stop(0.5, #121a2e), 
			to(#121a2e));
			border: solid 1px rgba(79, 79, 79, 0.75);
		}
		.button.black:hover {
			background-image: -webkit-gradient(linear, left top, left bottom, 
			from(#4286f5), 
			color-stop(0.5, #4286f5),
			color-stop(0.5, #194fdb),
			to(#194fdb));
		}
	</style>
	<body class="skin-blue sidebar-mini">
		<div class="wrapper">
			<!-- Main Header -->
			<header class="main-header">
				<!-- Logo -->
				<a href="{{ url('/dashboard') }}" class="logo">
					<!-- mini logo for sidebar mini 50x50 pixels -->
					<span class="logo-mini"><b>A</b>LT</span>
					<!-- logo for regular state and mobile devices -->
					<span class="logo-lg"><b>Admin</b> Panel </span>
				</a>
				<!-- Header Navbar -->
				<nav class="navbar navbar-static-top" role="navigation">
					<!-- Sidebar toggle button-->
					<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
						<span class="sr-only">Toggle navigation</span>
					</a>
					<button class="button back black" onclick="history.back(-1)"><span></span>Back</button>				
					<!-- Navbar Right Menu -->
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<!-- Messages: style can be found in dropdown.less-->
							<!--<li class="dropdown messages-menu">
								<!-- Menu toggle button -->
								<!--<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-envelope-o"></i>
									<span class="label label-success">4</span>
								</a>-->
								<!--<ul class="dropdown-menu">
									<li class="header">You have 4 messages</li>
									<li>
										<!-- inner menu: contains the messages -->
										<!--<ul class="menu">
											<li><!-- start message -->
												<!--<a href="#">
													<div class="pull-left">
														<!-- User Image -->
														<!--<img src="{{ Auth::user()->image }}" class="img-circle"
															 alt="User Image"/>
													</div>
													<!-- Message title and timestamp -->
													<!--<h4>
														Support Team
														<small><i class="fa fa-clock-o"></i> 5 mins</small>
													</h4>
													<!-- The message -->
													<!--<p>Why not buy a new awesome theme?</p>
												</a>
											</li><!-- end message -->
										<!--</ul><!-- /.menu -->
									<!--</li>
									<li class="footer"><a href="#">See All Messages</a></li>
								</ul>
							</li><!-- /.messages-menu -->

							<!-- Notifications Menu -->
							<!--<li class="dropdown notifications-menu">
								<!-- Menu toggle button -->
								<!--<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-bell-o"></i>
									<span class="label label-warning">10</span>
								</a>
								<ul class="dropdown-menu">
									<li class="header">You have 10 notifications</li>
									<li>
										<!-- Inner Menu: contains the notifications -->
										<!--<ul class="menu">
											<li><!-- start notification -->
												<!--<a href="#">
													<i class="fa fa-users text-aqua"></i> 5 new members joined today
												</a>
											</li><!-- end notification -->
										<!--</ul>
									</li>
									<li class="footer"><a href="#">View all</a></li>
								</ul>
							</li>
							<!-- Tasks Menu -->
							<!--<li class="dropdown tasks-menu">
								<!-- Menu Toggle Button -->
								<!--a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-flag-o"></i>
									<span class="label label-danger">9</span>
								</a>
								<ul class="dropdown-menu">
									<li class="header">You have 9 tasks</li>
									<li>
										<!-- Inner menu: contains the tasks -->
										<!--<ul class="menu">
											<li><!-- Task item -->
												<!--<a href="#">
													<!-- Task title and progress text -->
													<!--<h3>
														Design some buttons
														<small class="pull-right">20%</small>
													</h3>
													<!-- The progress bar -->
													<!--<div class="progress xs">
														<!-- Change the css width attribute to simulate progress -->
														<!--<div class="progress-bar progress-bar-aqua" style="width: 20%"
															 role="progressbar" aria-valuenow="20" aria-valuemin="0"
															 aria-valuemax="100">
															<span class="sr-only">20% Complete</span>
														</div>
													</div>
												</a>
											</li><!-- end task item -->
										<!--</ul>
									</li>
									<li class="footer">
										<a href="#">View all tasks</a>
									</li>
								</ul>
							</li>-->
							@if (Auth::guest())
								<li><a href="{{ url('/login') }}">Login</a></li>
								<li><a href="{{ url('/register') }}">Register</a></li>
							@else
							<!-- User Account Menu -->								
								<li class="dropdown user user-menu">
									<!-- Menu Toggle Button -->
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<!-- The user image in the navbar-->
										<!--<img src="{{ Auth::user()->image }}" class="user-image" alt="User Image"/>-->
										<!-- hidden-xs hides the username on small devices so only the image appears. -->
										<span class="hidden-xs">{{ Auth::user()->firstname." ".Auth::user()->lastname }}</span>
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
										<!-- Menu Body -->
										<!--<li class="user-body">
											<div class="col-xs-4 text-center">
												<a href="#">Followers</a>
											</div>
											<div class="col-xs-4 text-center">
												<a href="#">Sales</a>
											</div>
											<div class="col-xs-4 text-center">
												<a href="#">Friends</a>
											</div>
										</li><!--
										<!-- Menu Footer-->
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
						<div class="user-panel">
							<div class="pull-left image">
								<img src="{{ url(Auth::user()->image) }}" class="img-circle" alt="User Image"/>
							</div>
							<div class="pull-left info">
								<p>{{ Auth::user()->firstname." ".Auth::user()->lastname }}</p>
								<!-- Status -->
								<!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
							</div>
						</div>
				@endif

				<!-- search form (Optional) -->
					<!--<form action="#" method="get" class="sidebar-form">
						<div class="input-group">
							<input type="text" name="q" class="form-control" placeholder="Search..."/>
							<span class="input-group-btn">
						<button type='submit' name='search' id='search-btn' class="btn btn-flat"><i
									class="fa fa-search"></i></button>
					  </span>
						</div>
					</form>-->
					<!-- /.search form -->

					<!-- Sidebar Menu -->
					
					<ul class="sidebar-menu">
						<li class="header">Links</li>
					<!-- USE {{ Request::is('route-name*') ? 'active' : '' }} to dynamically set active tab -->
						<?php if(Auth::user()->role == '1'){ ?>				
						<li class="{{ Request::is('dashboard*') ? 'active' : '' }}"><a href="{{ url('dashboard') }}"><i class='fa fa-tachometer'></i> <span>Dashboard</span></a></li>
						<li class="treeview">
							<a href="#">
					            <i class="fa fa-users"></i>
					            <span>Master Entry</span>
					            <span class="pull-right-container">
					              <i class="fa fa-angle-left pull-right"></i>
					            </span>
					        </a>
					        <ul class="treeview-menu">								
								<li><a href="{{ url('post_view') }}">Designation</a></li>
								<li><a href="{{ url('department_view') }}">Department</a></li>
								<li><a href="{{ url('parameter_view') }}">Parameter</a></li>
								<li><a href="{{ url('conveyance_allowance_view') }}">Conveyance Allowance Parameter</a></li>
								<li><a href="{{ url('scale_revision') }}">Scale Revision</a></li>
								<li><a href="{{ url('grade_pay_revision') }}">Grade Pay Revision</a></li>
								<li><a href="{{ url('new_scale') }}">New Scale</a></li>
								<li><a href="{{ url('new_grade_pay') }}">New Grade Pay</a></li>
								<li><a href="{{ url('leave_view') }}">Leave</a></li>								
								<li><a href="{{ url('qualification_view') }}">Qualification</a></li>
					        </ul>
						</li>
						<li><a href="{{ url('admin') }}"><i class='fa fa-link'></i> <span>User</span></a></li>
						<li><a href="{{ url('dependantview') }}"><i class='fa fa-link'></i> <span>Dependant</span></a></li>
						<li class="treeview">
							<a href="#">
					            <i class="fa fa-users"></i>
					            <span>Employees</span>
					            <span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
					            </span>
					        </a>
					        <ul class="treeview-menu">							
								<li><a href="{{ url('employee_view') }}">View Employees</a></li>
								<li><a href="{{ url('tax_view') }}">Employee Income Tax</a></li>
								<li><a href="{{ url('employee_lic') }}">Employee LIC</a></li>
								<li><a href="{{ url('transfer') }}">Transfer</a></li>								
								<li><a href="{{ url('employee_regularization') }}">Employee Regularization</a></li>	
								<li><a href="{{ url('increment') }}">Increment</a></li>
								<li><a href="{{ url('promotion_view') }}">Promotion</a></li>
								<li><a href="{{ url('time_scale_promotion') }}">Time Scale Promotion</a></li>
								<li><a href="{{ url('suspension_view') }}">Suspension</a></li>
								<li><a href="{{ url('deputation_view') }}">Deputation/Lien</a></li>
								<li><a href="{{ url('stop_salary_view') }}">Stop Salary</a></li>
					        </ul>
						</li>
						<li><a href="{{ url('servicebookview') }}"><i class='fa fa-link'></i> <span>Pay Fixation</span></a></li>
						<li><a href="{{ url('showattendance') }}"><i class='fa fa-link'></i> <span>Attendance</span></a></li>
						<li class="treeview">
							<a href="#">
					            <i class="fa fa-users"></i>
					            <span>Salary</span>
					            <span class="pull-right-container">
					              <i class="fa fa-angle-left pull-right"></i>
					            </span>
					        </a>
							<ul class="treeview-menu">	
								<li><a href="{{ url('kss_upload') }}"><i class="fa fa-angle-right"></i> Upload KSS</a></li>
					            <li><a href="{{ url('salary_type') }}"><i class="fa fa-angle-right"></i> Salary Process</a></li>
					            <li><a href="{{ url('salary_claim_edit') }}"><i class="fa fa-angle-right"></i> Edit Salary Claims</a></li>
					            <li><a href="{{ url('salary_deduction_edit') }}"><i class="fa fa-angle-right"></i> Edit Salary Deductions</a></li>
								<li><a href="{{ url('generate_rtgs') }}"><i class="fa fa-angle-right"></i> Generate Salary Statement</a></li>
								<li>
									<a href="#">
										<i class="fa fa-users"></i>
										<span>Salary Slip</span>
										<span class="pull-right-container">
											<i class="fa fa-angle-left pull-right"></i>
										</span>
									</a>
									<ul class="treeview-menu">
										<li><a href="{{ url('salary_slip') }}">For Staff</a></li>
										<li><a href="{{ url('salary_slip_officer') }}">For Officer</a></li>	
									</ul>
								</li>
					        </ul>
						</li>
						<li class="treeview">
							<a href="#">
					            <i class="fa fa-users"></i>
					            <span>Pension</span>
					            <span class="pull-right-container">
					              <i class="fa fa-angle-left pull-right"></i>
					            </span>
					        </a>
					        <ul class="treeview-menu">
								<li><a href="{{ route('pension.view_list.employees.add_pension_details') }}"><i class="fa fa-angle-right"></i> Add Bank/Address Info</a></li>
					            <li><a href="{{ route('pension.employees.pension_details.view') }}"><i class="fa fa-angle-right"></i> View Address/Bank Details</a></li>
					            <li><a href="{{ route('pension.view.employees') }}"><i class="fa fa-angle-right"></i> Settle</a></li>
					            <li><a href="{{ route('employees.settled.pension_data') }}"><i class="fa fa-angle-right"></i> View All Settled Employee Data</a></li>
					            <li><a href="{{ route('pension.prepare.rtgs')}}"><i class="fa fa-angle-right"></i> Gebnerate Pension Statement</a></li>
								<li>
									<a href="#">
										<i class="fa fa-users"></i>
										<span>Voluntary Retirement</span>
										<span class="pull-right-container">
											<i class="fa fa-angle-left pull-right"></i>
										</span>
									</a>
									<ul class="treeview-menu">
										<li><a href="{{ url('voluntary') }}">Add Bank Detail</a></li>
										<li><a href="{{ url('') }}">View Settle Employee</a></li>	
									</ul>
								</li>
								<li>
									<a href="#">
										<i class="fa fa-users"></i>
										<span>Employees Death</span>
										<span class="pull-right-container">
											<i class="fa fa-angle-left pull-right"></i>
										</span>
									</a>
									<ul class="treeview-menu">
										<li><a href="{{ url('death_while_working') }}">Death while Working</a></li>
										<li><a href="{{ url('death_after_retirement') }}">Death after Retirement</a></li>	
									</ul>
								</li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
					            <i class="fa fa-users"></i>
					            <span>Arrears</span>
					            <span class="pull-right-container">
					              <i class="fa fa-angle-left pull-right"></i>
					            </span>
					        </a>
					        <ul class="treeview-menu">
								<li><a href="{{ url('arrears/calculate_by_da') }}"><i class="fa fa-angle-right"></i> Arrears by DA</a></li>
					            <li><a href="{{ url('arrears/calculate_by_scale') }}"><i class="fa fa-angle-right"></i> Arrears by Pay Scale</a></li> 
								<li><a href="{{ url('arrears/miscellaneous') }}"><i class="fa fa-angle-right"></i>Miscellaneous Arrear</a></li>
								<li><a href="{{ url('arrears/promotion') }}"><i class="fa fa-angle-right"></i>Promotion Arrear</a></li>
							</ul>
						</li>						
						<li class="treeview">
							<a href="#">
					            <i class="fa fa-users"></i>
					            <span>MIS Reports</span>
					            <span class="pull-right-container">
					              <i class="fa fa-angle-left pull-right"></i>
					            </span>
					        </a>
					        <ul class="treeview-menu">							
								<li><a href="#">By Salary</a>
									<ul class="treeview-menu">
								<li><a href="{{ url('mis/salarydeduction') }}"><i class="fa fa-angle-right"></i> By Deduction</a></li>
					            <li><a href="{{ url('mis/salaryclaim') }}"><i class="fa fa-angle-right"></i> By Claims</a></li> 
							</ul>
								</li>
								<li><a href="{{ url('mis/attendance/view') }}">By Attendance</a></li>
								<li><a href="{{ url('loan_mis') }}">Loan</a></li>
								<li><a href="{{ url('lic_statement') }}">LIC Statement</a></li>
					        </ul>
						</li>
						<!--<li class="treeview">
							<a href="#">
					            <i class="fa fa-users"></i>
					            <span>Users</span>
					            <span class="pull-right-container">
					              <i class="fa fa-angle-left pull-right"></i>
					            </span>
					        </a>
							<ul class="treeview-menu">					              	
					            <li><a href="{{ url('member') }}"><i class="fa fa-angle-right"></i> Add User</a></li>
					            <li><a href="{{ url('admin') }}"><i class="fa fa-angle-right"></i> View User</a></li>
					            <li><a href="{{ url('admin') }}"><i class="fa fa-angle-right"></i> Edit/Delete User</a></li>
					        </ul>
						</li>
						<li class="treeview">
							<a href="#">
					            <i class="fa fa-users"></i>
					            <span>Dependant</span>
					            <span class="pull-right-container">
					              <i class="fa fa-angle-left pull-right"></i>
					            </span>
					        </a>
							<ul class="treeview-menu">					              	
					            <li><a href="{{ url('dependant') }}"><i class="fa fa-angle-right"></i> Add Dependant</a></li>
					            <li><a href="{{ url('dependantview') }}"><i class="fa fa-angle-right"></i> View Dependant</a></li>
					            <li><a href="{{ url('dependantview') }}"><i class="fa fa-angle-right"></i> Edit/Delete Dependant</a></li>
					        </ul>
						</li>
						<li class="treeview">
							<a href="#">
					            <i class="fa fa-users"></i>
					            <span>Master Entry</span>
					            <span class="pull-right-container">
					              <i class="fa fa-angle-left pull-right"></i>
					            </span>
					        </a>
					        <ul class="treeview-menu">
					            <li>
					              <a href="#"><i class="fa fa-recycle"></i> Qualification
					                <span class="pull-right-container">
					                  <i class="fa fa-angle-left pull-right"></i>
					                </span>
					              </a>
					              <ul class="treeview-menu">					              	
					              	<li><a href="{{ url('qualification') }}"><i class="fa fa-angle-right"></i> Add Qualification</a></li>
					              	<li><a href="{{ url('qualification_view') }}"><i class="fa fa-angle-right"></i> View Qualification</a></li>
					                <li><a href="{{ url('qualification_view') }}"><i class="fa fa-angle-right"></i> Edit Qualification</a></li>
					              </ul>
					            </li>
								<li>
					              <a href="#"><i class="fa fa-recycle"></i> Parameter
					                <span class="pull-right-container">
					                  <i class="fa fa-angle-left pull-right"></i>
					                </span>
					              </a>
					              <ul class="treeview-menu">					              	
					              	<li><a href="{{ url('parameter') }}"><i class="fa fa-angle-right"></i> Add Parameter Type</a></li>
									<li><a href="{{ url('parameter_value') }}"><i class="fa fa-angle-right"></i> Add Parameter Value</a></li>
					              	<li><a href="{{ url('parameter_view') }}"><i class="fa fa-angle-right"></i> View Parameter</a></li>
					                <li><a href="{{ url('parameter_view') }}"><i class="fa fa-angle-right"></i> Edit Parameter</a></li>
					              </ul>
					            </li>
								<li>
					              <a href="#"><i class="fa fa-recycle"></i> Department
					                <span class="pull-right-container">
					                  <i class="fa fa-angle-left pull-right"></i>
					                </span>
					              </a>
					              <ul class="treeview-menu">					              	
					              	<li><a href="{{ url('department') }}"><i class="fa fa-angle-right"></i> Add Department</a></li>
					              	<li><a href="{{ url('department_view') }}"><i class="fa fa-angle-right"></i> View Department</a></li>
					                <li><a href="{{ url('department_view') }}"><i class="fa fa-angle-right"></i> Delete Department</a></li>
					              </ul>
					            </li>
								<li>
					              <a href="#"><i class="fa fa-recycle"></i> Designation
					                <span class="pull-right-container">
					                  <i class="fa fa-angle-left pull-right"></i>
					                </span>
					              </a>
					              <ul class="treeview-menu">					              	
					              	<li><a href="{{ url('post') }}"><i class="fa fa-angle-right"></i> Add Designation</a></li>
					              	<li><a href="{{ url('post_view') }}"><i class="fa fa-angle-right"></i> View Designation</a></li>
					                <li><a href="{{ url('post_view') }}"><i class="fa fa-angle-right"></i> Delete Designation</a></li>
									<li><a href="{{ url('revision') }}"><i class="fa fa-angle-right"></i> Revision</a></li>
					              </ul>
					            </li>
								<li>
					              <a href="#"><i class="fa fa-recycle"></i> Increment
					                <span class="pull-right-container">
					                  <i class="fa fa-angle-left pull-right"></i>
					                </span>
					              </a>
					              <ul class="treeview-menu">					              	
					              	<li><a href="{{ url('increment') }}"><i class="fa fa-angle-right"></i>Calculate Increment</a></li>					              	
					              </ul>
					            </li>
					        </ul>
						</li>
						<li class="treeview">
							<a href="#">
					            <i class="fa fa-users"></i>
					            <span>Employees</span>
					            <span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
					            </span>
					        </a>
					        <ul class="treeview-menu">
								<li><a href="{{ url('employee') }}">Add Employees</a></li>
								<li><a href="{{ url('employee_view') }}">View Employees</a></li>
								<li><a href="{{ url('employee_view') }}">Edit Employees</a></li>
								<li><a href="{{ url('promotion') }}">Employees Promotion</a></li>
								<li><a href="{{ url('transfer') }}">Employees Transfer</a></li>
								<li><a href="{{ url('pay_fixation') }}">Pay Fixation</a></li>
					        </ul>
						</li>
						<li class="treeview">
							<a href="#">
					            <i class="fa fa-users"></i>
					            <span>Service Book</span>
					            <span class="pull-right-container">
					              <i class="fa fa-angle-left pull-right"></i>
					            </span>
					        </a>
							<ul class="treeview-menu">					              	
					            <li><a href="{{ url('servicebook') }}"><i class="fa fa-angle-right"></i> Add Service Book</a></li>
					            <li><a href="{{ url('servicebookview') }}"><i class="fa fa-angle-right"></i> View Service Book</a></li>
					        </ul>
						</li>
						<li class="treeview">
							<a href="#">
					            <i class="fa fa-users"></i>
					            <span>Salary</span>
					            <span class="pull-right-container">
					              <i class="fa fa-angle-left pull-right"></i>
					            </span>
					        </a>
							<ul class="treeview-menu">	
								<li><a href="{{ url('kss_upload') }}"><i class="fa fa-angle-right"></i> Upload KSS</a></li>
					            <li><a href="{{ url('salary_claim_batch') }}"><i class="fa fa-angle-right"></i> Salary Process</a></li>
					            <li><a href="{{ url('salary_claim_edit') }}"><i class="fa fa-angle-right"></i> Edit Salary Claims</a></li>
					            <li><a href="{{ url('salary_deduction_edit') }}"><i class="fa fa-angle-right"></i> Edit Salary Deductions</a></li>
								<li><a href="{{ url('generate_rtgs') }}"><i class="fa fa-angle-right"></i> Generate RTGS</a></li>
					        </ul>
						</li>
						<li class="treeview">
							<a href="#">
					            <i class="fa fa-users"></i>
					            <span>Pension</span>
					            <span class="pull-right-container">
					              <i class="fa fa-angle-left pull-right"></i>
					            </span>
					        </a>
					        <ul class="treeview-menu">
								<li><a href="{{ route('pension.view_list.employees.add_pension_details') }}"><i class="fa fa-angle-right"></i> Add Bank/Address Info</a></li>
					            <li><a href="{{ route('pension.employees.pension_details.view') }}"><i class="fa fa-angle-right"></i> View Address/Bank Details</a></li>
					            <li><a href="{{ route('pension.view.employees') }}"><i class="fa fa-angle-right"></i> Settle</a></li>
					            <li><a href="{{ route('employees.settled.pension_data') }}"><i class="fa fa-angle-right"></i> View All Settled Employee Data</a></li>
					            <li><a href="{{ route('pension.prepare.rtgs')}}"><i class="fa fa-angle-right"></i> Gebnerate RTGS</a></li>					            
								<li><a href="{{ url('employee_view') }}">Calculate Arrears</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
					            <i class="fa fa-users"></i>
					            <span>Attendance</span>
					            <span class="pull-right-container">
					              <i class="fa fa-angle-left pull-right"></i>
					            </span>
					        </a>
					        <ul class="treeview-menu">
								<li><a href="{{ url('showattendanceform') }}">Insert Attendance</a></li>
								<li><a href="{{ url('showattendance') }}">View Attendance</a></li>
					        </ul>
						</li>-->
						<li class="treeview">
							<a href="#">
					            <i class="fa fa-users"></i>
					            <span>Bill</span>
					            <span class="pull-right-container">
					              <i class="fa fa-angle-left pull-right"></i>
					            </span>
					        </a>
					        <ul class="treeview-menu">
					            <li>
					              <a href="#"><i class="fa fa-recycle"></i> Over Time
					                <span class="pull-right-container">
					                  <i class="fa fa-angle-left pull-right"></i>
					                </span>
					              </a>
					              <ul class="treeview-menu">					              	
					              	<li><a href="{{ url('ot_view') }}">Over Time Calculation</a></li>
									<li><a href="{{ url('ot_rtgs') }}">Generate OT Rtgs</a></li>
					              </ul>
					            </li>
								<li>
					              <a href="#"><i class="fa fa-recycle"></i> Ex Gratia
					                <span class="pull-right-container">
					                  <i class="fa fa-angle-left pull-right"></i>
					                </span>
					              </a>
					              <ul class="treeview-menu">					              	
					              	<li><a href="{{ url('ex_gratia') }}">Calculate Ex Gratia</a></li>
									<li><a href="{{ url('ex_gratia_rtgs') }}">Generate Rtgs</a></li>
					              </ul>
					            </li>
								<li class="treeview">
									<a href="#">
										<i class="fa fa-users"></i>
										<span>Other Bill</span>
										<span class="pull-right-container">
										  <i class="fa fa-angle-left pull-right"></i>
										</span>
									</a>
									<ul class="treeview-menu">
										<li><a href="{{ url('common_view/Tour Advance') }}"><i class="fa fa-angle-right"></i>Tour Advance</a></li>
										<li><a href="{{ url('common_view/Telephone Bill') }}"><i class="fa fa-angle-right"></i>Telephone Bill</a></li> 										
										<li><a href="{{ url('common_view/LTC') }}"><i class="fa fa-angle-right"></i>LTC</a></li> 
										<li><a href="{{ url('get_expanse') }}"><i class="fa fa-angle-right"></i> View Miscellaneous Exapanse</a></li> 
									</ul>
								</li>								
					        </ul>
						</li>
						<li><a href="{{ url('leaveapplication') }}"><i class='fa fa-link'></i> <span>View Applied Leave</span></a></li>
						<li><a href="{{ url('loanapplication') }}"><i class='fa fa-link'></i> <span>View Applied Loans</span></a></li>						
						<li><a href="{{ url('additionalloan') }}"><i class='fa fa-link'></i> <span>View Additional Loans</span></a></li>
						<li><a href="{{ url('calculate_interest') }}"><i class='fa fa-link'></i> <span>Calculate Interest</span></a></li>
						<li><a href="{{ url('audit_trail') }}"><i class='fa fa-link'></i> <span>Audit Trail</span></a></li>
												
						<?php } ?>
						
						<?php if(Auth::user()->role == '2'){ ?>				
						<li class="{{ Request::is('dashboard*') ? 'active' : '' }}"><a href="{{ url('dashboard') }}"><i
										class='fa fa-tachometer'></i> <span>Dashboard</span></a></li>
						<li><a href="{{ url('viewapplyleave') }}"><i class='fa fa-link'></i> <span>View Applied Leave</span></a></li>
						<li><a href="{{ url('apply_loan_view') }}"><i class='fa fa-link'></i> <span>View Applied Loan</span></a></li>
						<li><a href="{{ url('additionalloanapplication') }}"><i class='fa fa-link'></i> <span>View Additional Loans</span></a></li>
						<?php } ?>
						
						<?php if(Auth::user()->role == '3'){ ?>
						<li><a href="manageleave"><i class='fa fa-link'></i> <span>Manage Employee Leave</span></a></li>
						<!--<li><a href=""><i class='fa fa-link'></i> <span>Manage Employee Loan</span></a></li>-->
						<?php } ?>
						
						<?php if(Auth::user()->role == '5'){ ?>
						<li class="{{ Request::is('dashboard*') ? 'active' : '' }}"><a href="{{ url('dashboard') }}"><i class='fa fa-tachometer'></i> <span>Dashboard</span></a></li>
						<?php } ?>
						<?php if(Auth::user()->role == '6'){ ?>
						<li class="{{ Request::is('dashboard*') ? 'active' : '' }}"><a href="{{ url('dashboard') }}"><i class='fa fa-tachometer'></i> <span>Dashboard</span></a></li>
						<?php } ?>
						<?php if(Auth::user()->role == '8'){ ?>
						<li class="{{ Request::is('dashboard*') ? 'active' : '' }}"><a href="{{ url('dashboard') }}"><i class='fa fa-tachometer'></i> <span>Dashboard</span></a></li>
						<li><a href="{{ url('leaveapplication') }}"><i class='fa fa-link'></i> <span>View Applied Leave</span></a></li>
						<li><a href="{{ url('loanapplication') }}"><i class='fa fa-link'></i> <span>View Applied Loans</span></a></li>						
						<li><a href="{{ url('additionalloan') }}"><i class='fa fa-link'></i> <span>View Additional Loans</span></a></li>
						<li class="treeview">
							<a href="#">
					            <i class="fa fa-users"></i>
					            <span>MIS Reports</span>
					            <span class="pull-right-container">
					              <i class="fa fa-angle-left pull-right"></i>
					            </span>
					        </a>
					        <ul class="treeview-menu">							
								<li><a href="{{ url('mis/salary') }}">By Salary</a></li>
								<li><a href="{{ url('mis/attendance/view') }}">By Attendance</a></li>
								<li><a href="{{ url('loan_mis') }}">Loan</a></li>
								<li><a href="{{ url('lic_statement') }}">LIC Statement</a></li>
					        </ul>
						</li>
						<?php } ?>
					</ul><!-- /.sidebar-menu -->
				</section>
				<!-- /.sidebar -->
			</aside>

			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">

				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1>
						@yield('contentheader_title', 'Page Header here')
						<small>@yield('contentheader_description')</small>
					</h1>
				</section>

				<!-- Main content -->
				<section class="content">
					<!-- Your Page Content Here -->
					@yield('main-content')
				</section><!-- /.content -->
			</div><!-- /.content-wrapper -->

			<!-- Control Sidebar -->
			<!--<aside class="control-sidebar control-sidebar-dark">
				<!-- Create the tabs -->
				<!--<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
					<li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
					<li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
				</ul>
				<!-- Tab panes -->
				<!--<div class="tab-content">
					<!-- Home tab content -->
					<!--<div class="tab-pane active" id="control-sidebar-home-tab">
						<h3 class="control-sidebar-heading">Recent Activity</h3>
						<ul class='control-sidebar-menu'>
							<li>
								<a href=''>
									<i class="menu-icon fa fa-birthday-cake bg-red"></i>
									<div class="menu-info">
										<h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
										<p>Will be 23 on April 24th</p>
									</div>
								</a>
							</li>
						</ul><!-- /.control-sidebar-menu -->

						<!--<h3 class="control-sidebar-heading">Tasks Progress</h3>
						<ul class='control-sidebar-menu'>
							<li>
								<a href=''>
									<h4 class="control-sidebar-subheading">
										Custom Template Design
										<span class="label label-danger pull-right">70%</span>
									</h4>
									<div class="progress progress-xxs">
										<div class="progress-bar progress-bar-danger" style="width: 70%"></div>
									</div>
								</a>
							</li>
						</ul><!-- /.control-sidebar-menu -->

					<!--</div><!-- /.tab-pane -->
					<!-- Stats tab content -->
					<!--<div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
					<!-- Settings tab content -->
					<!--<div class="tab-pane" id="control-sidebar-settings-tab">
						<form method="post">
							<h3 class="control-sidebar-heading">General Settings</h3>
							<div class="form-group">
								<label class="control-sidebar-subheading">
									Report panel usage
									<input type="checkbox" class="pull-right" checked/>
								</label>
								<p>
									Some information about this general settings option
								</p>
							</div><!-- /.form-group -->
						<!--/form>
					<!--</div><!-- /.tab-pane -->
				<!--</div>
			</aside><!-- /.control-sidebar -->

			<!-- Add the sidebar's background. This div must be placed
				   immediately after the control sidebar -->
			<div class='control-sidebar-bg'></div>
		</div><!-- ./wrapper -->
		@include('layouts.partials.scripts')
		@yield('scipts-extra')
	</body>
</html>
