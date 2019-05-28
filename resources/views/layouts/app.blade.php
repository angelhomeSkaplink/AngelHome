<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <link rel="shortcut icon" href="{{asset('/public/image/nwLogo.png') }}" />
    <title>@yield('htmlheader_title', 'ANGEL HOME') </title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('/public/dashboardPanel/app-assets/images/ico/apple-icon-60.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/public/dashboardPanel/app-assets/images/ico/apple-icon-76.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('/public/dashboardPanel/app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('/public/dashboardPanel/app-assets/images/ico/apple-icon-152.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('image/nwLogo.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('image/nwLogo.png') }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/public/dashboardPanel/app-assets/css/bootstrap.css') }}">
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/public/dashboardPanel/app-assets/fonts/icomoon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/public/dashboardPanel/app-assets/fonts/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/public/dashboardPanel/app-assets/vendors/css/extensions/pace.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/public/dashboardPanel/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/public/dashboardPanel/app-assets/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/public/dashboardPanel/app-assets/css/colors.css') }}">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/public/dashboardPanel/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/public/dashboardPanel/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/public/dashboardPanel/app-assets/css/core/colors/palette-gradient.css') }}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/public/dashboardPanel/assets/css/style.css') }}">
    {{-- custom css --}}
    <link rel="stylesheet" type="text/css" href="{{asset('/public/css/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/public/css/type_ahead.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <!-- END Custom CSS-->
  </head>
  <body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">
    @php
    $us = Auth::user()->user_id;
    $first_name = Auth::user()->firstname;
    $middle_name = Auth::user()->middlename;
    $last_name = Auth::user()->lastname;
    $userName = $first_name." ".$middle_name." ".$last_name;
    $roles = DB::table('role')->where('u_id',$us)->where('status',1)->get();
    $role_arr = array();
    foreach ($roles as $r) {
        array_push($role_arr,$r->id);
    }
    @endphp
    <!-- navbar-fixed-top-->
    <nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav">
            <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a></li>
            <li class="nav-item"><a href="index.html" class="navbar-brand nav-link"><img alt="branding logo" src="{{ asset('/public/dashboardPanel/app-assets/images/logo/robust-logo-light.png') }}" data-expand="{{ asset('/public/dashboardPanel/app-assets/images/logo/robust-logo-light.png') }}" data-collapse="{{ asset('/public/dashboardPanel/app-assets/images/logo/robust-logo-small.png') }}" class="brand-logo"></a></li>
            <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content container-fluid">
          <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
            <ul class="nav navbar-nav">
              <li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5">         </i></a></li>
              <li class="nav-item hidden-sm-down"><a href="#" class="nav-link nav-link-expand"><i class="ficon icon-expand2"></i></a></li>
            </ul>
            <ul class="nav navbar-nav float-xs-right">
              <li class="dropdown dropdown-language nav-item"><a id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link"><i class="flag-icon flag-icon-gb"></i><span class="selected-language">English</span></a>
                <div aria-labelledby="dropdown-flag" class="dropdown-menu"><a href="#" class="dropdown-item"><i class="flag-icon flag-icon-gb"></i> English</a><a href="#" class="dropdown-item"><i class="flag-icon flag-icon-fr"></i> French</a><a href="#" class="dropdown-item"><i class="flag-icon flag-icon-cn"></i> Chinese</a><a href="#" class="dropdown-item"><i class="flag-icon flag-icon-de"></i> German</a></div>
              </li>
              {{-- <li class="dropdown dropdown-notification nav-item"><a href="#" data-toggle="dropdown" class="nav-link nav-link-label"><i class="ficon icon-bell4"></i><span class="tag tag-pill tag-default tag-danger tag-default tag-up">5</span></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                  <li class="dropdown-menu-header">
                    <h6 class="dropdown-header m-0"><span class="grey darken-2">Notifications</span><span class="notification-tag tag tag-default tag-danger float-xs-right m-0">5 New</span></h6>
                  </li>
                  <li class="list-group scrollable-container"><a href="javascript:void(0)" class="list-group-item">
                      <div class="media">
                        <div class="media-left valign-middle"><i class="icon-cart3 icon-bg-circle bg-cyan"></i></div>
                        <div class="media-body">
                          <h6 class="media-heading">You have new order!</h6>
                          <p class="notification-text font-small-3 text-muted">Lorem ipsum dolor sit amet, consectetuer elit.</p><small>
                            <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">30 minutes ago</time></small>
                        </div>
                      </div></a><a href="javascript:void(0)" class="list-group-item">
                      <div class="media">
                        <div class="media-left valign-middle"><i class="icon-monitor3 icon-bg-circle bg-red bg-darken-1"></i></div>
                        <div class="media-body">
                          <h6 class="media-heading red darken-1">99% Server load</h6>
                          <p class="notification-text font-small-3 text-muted">Aliquam tincidunt mauris eu risus.</p><small>
                            <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Five hour ago</time></small>
                        </div>
                      </div></a><a href="javascript:void(0)" class="list-group-item">
                      <div class="media">
                        <div class="media-left valign-middle"><i class="icon-server2 icon-bg-circle bg-yellow bg-darken-3"></i></div>
                        <div class="media-body">
                          <h6 class="media-heading yellow darken-3">Warning notifixation</h6>
                          <p class="notification-text font-small-3 text-muted">Vestibulum auctor dapibus neque.</p><small>
                            <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Today</time></small>
                        </div>
                      </div></a><a href="javascript:void(0)" class="list-group-item">
                      <div class="media">
                        <div class="media-left valign-middle"><i class="icon-check2 icon-bg-circle bg-green bg-accent-3"></i></div>
                        <div class="media-body">
                          <h6 class="media-heading">Complete the task</h6><small>
                            <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Last week</time></small>
                        </div>
                      </div></a><a href="javascript:void(0)" class="list-group-item">
                      <div class="media">
                        <div class="media-left valign-middle"><i class="icon-bar-graph-2 icon-bg-circle bg-teal"></i></div>
                        <div class="media-body">
                          <h6 class="media-heading">Generate monthly report</h6><small>
                            <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Last month</time></small>
                        </div>
                      </div></a></li>
                  <li class="dropdown-menu-footer"><a href="javascript:void(0)" class="dropdown-item text-muted text-xs-center">Read all notifications</a></li>
                </ul>
              </li> --}}
              {{-- <li class="dropdown dropdown-notification nav-item"><a href="#" data-toggle="dropdown" class="nav-link nav-link-label"><i class="ficon icon-mail6"></i><span class="tag tag-pill tag-default tag-info tag-default tag-up">8</span></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                  <li class="dropdown-menu-header">
                    <h6 class="dropdown-header m-0"><span class="grey darken-2">Messages</span><span class="notification-tag tag tag-default tag-info float-xs-right m-0">4 New</span></h6>
                  </li>
                  <li class="list-group scrollable-container"><a href="javascript:void(0)" class="list-group-item">
                      <div class="media">
                        <div class="media-left"><span class="avatar avatar-sm avatar-online rounded-circle"><img src="{{ asset('/public/dashboardPanel/app-assets/images/portrait/small/avatar-s-1.png') }}" alt="avatar"><i></i></span></div>
                        <div class="media-body">
                          <h6 class="media-heading">Margaret Govan</h6>
                          <p class="notification-text font-small-3 text-muted">I like your portfolio, let's start the project.</p><small>
                            <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Today</time></small>
                        </div>
                      </div></a><a href="javascript:void(0)" class="list-group-item">
                      <div class="media">
                        <div class="media-left"><span class="avatar avatar-sm avatar-busy rounded-circle"><img src="{{ asset('/public/dashboardPanel/app-assets/images/portrait/small/avatar-s-2.png') }}" alt="avatar"><i></i></span></div>
                        <div class="media-body">
                          <h6 class="media-heading">Bret Lezama</h6>
                          <p class="notification-text font-small-3 text-muted">I have seen your work, there is</p><small>
                            <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Tuesday</time></small>
                        </div>
                      </div></a><a href="javascript:void(0)" class="list-group-item">
                      <div class="media">
                        <div class="media-left"><span class="avatar avatar-sm avatar-online rounded-circle"><img src="{{ asset('/public/dashboardPanel/app-assets/images/portrait/small/avatar-s-3.png') }}" alt="avatar"><i></i></span></div>
                        <div class="media-body">
                          <h6 class="media-heading">Carie Berra</h6>
                          <p class="notification-text font-small-3 text-muted">Can we have call in this week ?</p><small>
                            <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Friday</time></small>
                        </div>
                      </div></a><a href="javascript:void(0)" class="list-group-item">
                      <div class="media">
                        <div class="media-left"><span class="avatar avatar-sm avatar-away rounded-circle"><img src="{{ asset('/public/dashboardPanel/app-assets/images/portrait/small/avatar-s-6.png') }}" alt="avatar"><i></i></span></div>
                        <div class="media-body">
                          <h6 class="media-heading">Eric Alsobrook</h6>
                          <p class="notification-text font-small-3 text-muted">We have project party this saturday night.</p><small>
                            <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">last month</time></small>
                        </div>
                      </div></a></li>
                  <li class="dropdown-menu-footer"><a href="javascript:void(0)" class="dropdown-item text-muted text-xs-center">Read all messages</a></li>
                </ul>
              </li> --}}
              <li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar avatar-online"><img src="{{ asset('/public/dashboardPanel/app-assets/images/portrait/small/avatar-s-1.png') }}" alt="avatar"><i></i></span><span class="user-name">{{$userName}}</span></a>
                <div class="dropdown-menu dropdown-menu-right"><a href="#" class="dropdown-item"><i class="icon-head"></i> Edit Profile</a><a href="#" class="dropdown-item"><i class="icon-mail6"></i> My Inbox</a><a href="#" class="dropdown-item"><i class="icon-clipboard2"></i> Task</a><a href="#" class="dropdown-item"><i class="icon-calendar5"></i> Calender</a>
                  <div class="dropdown-divider"></div><a href="#" class="dropdown-item"><i class="icon-power3"></i> Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <!-- main menu-->
    <div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
      <!-- main menu header-->
      <div class="main-menu-header">
        <input type="text" placeholder="Search" class="menu-search form-control round"/>
      </div>
      <!-- / main menu header-->
      <!-- main menu content-->
      <div class="main-menu-content">
    <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
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
                    <span class="padding-left-10">Orbit</span>
                    <span class="pull-right-container">
                            
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
                    <span class="padding-left-10">@lang("msg.Denizen Info")</span>
                    <span class="pull-right-container"></span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ url('personal_details') }}">
                            <i class="material-icons md-18 dark-gray"> details </i>
                            <span class="padding-left-10">@lang("msg.Details")</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('resident_service_plan') }}">
                            <i class="material-icons md-18"> assignment</i>
                            <span class="padding-left-10">@lang("msg.Service Plan")</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('resident_room') }}">
                            <i class="material-icons md-18">home</i>
                            <span class="padding-left-10">@lang("msg.Room Details")</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="material-icons md-18"> subdirectory_arrow_right</i>
                    <span class="padding-left-10">@lang("msg.Histology") </span>
                    <span class="pull-right-container"></span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ url('resident_assessment') }}">
                            <i class="material-icons md-18 dark-gray"> assessment </i>
                            <span class="padding-left-10">@lang("msg.Assessments")</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('temporary_service_plan') }}">
                            <i class="material-icons md-18"> assignment</i>
                            <span class="padding-left-10">@lang("msg.Temporary Service Plan")</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('injury') }}">
                            <i class="material-icons md-18"> assignment</i>
                            <span class="padding-left-10">@lang("msg.Gen. Incident Management")</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('medication_incident_report') }}">
                            <i class="material-icons md-18"> assignment</i>
                            <span class="padding-left-10">Medication Incident</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('all_res_checkup') }}">
                            <i class="material-icons md-18"> assignment</i>
                            <span class="padding-left-10">@lang("msg.Vital Statistics")</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('all_res_notes') }}">
                            <i class="material-icons md-18"> assignment</i>
                            <span class="padding-left-10">@lang("msg.Notes")</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="material-icons md-18"> subdirectory_arrow_right</i>
                    <span class="padding-left-10">@lang("msg.Transmute")</span>
                    <span class="pull-right-container">
                            
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
                    <span class="padding-left-10">@lang("msg.Day Book")</span>
                    <span class="pull-right-container">
                            
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="#">
                            <i class="material-icons md-18 dark-gray"> cloud_done</i>
                            <span class="padding-left-10">@lang("msg.Tasksheet")</span>
                            <span class="pull-right-container">
                            
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
                    <span class="padding-left-10">@lang("msg.Pharma log / Health Log")</span>
                    <span class="pull-right-container">
                            
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('patient_medicine') }}"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">Mar</span></a></li>
                    <li><a href="{{ url('mar_report') }}"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">Mar @lang("msg.Reports")</span></a></li>
                    <li><a href="{{ url('medicine_stocks_list') }}"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">@lang("msg.Medicine Stock")</span></a></li>
                    <li><a href="{{ url('patients_list') }}"><i class="material-icons md-18 dark-gray"> local_hospital </i><span class="padding-left-10">@lang("msg.Pharmacy")</span></a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="material-icons md-18"> subdirectory_arrow_right</i>
                    <span class="padding-left-10">@lang("msg.Transaction Desk")</span>
                    <span class="pull-right-container">
                    
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
                    <span class="padding-left-10">@lang("msg.Visage")</span>
                    <span class="pull-right-container">
                    
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
            <li class="treeview">
                    <a href="#">
                        <i class="material-icons md-18"> subdirectory_arrow_right</i>
                        <span class="padding-left-10">@lang("msg.Setup")</span>
                        <span class="pull-right-container">
                            
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('all_member_list') }}"><i class="material-icons md-18 dark-gray"> perm_identity </i><span class="padding-left-10">@lang("msg.Add User")</a></li>
                        <li><a href="{{ url('room_details') }}"><i class="material-icons md-18 dark-gray"> home </i><span class="padding-left-10">@lang("msg.Add Room")</a></li>
                        <li><a href="{{ url('service_plan') }}"><i class="material-icons md-18 dark-gray">note_add</i><span class="padding-left-10">@lang("msg.Level Of Care")</a></li>
                        <li><a href="{{ url('assessment_preview') }}"><i class="material-icons md-18 dark-gray">note_add</i><span class="padding-left-10">@lang("msg.Assessments")</a></li>
                        <li><a href="{{ url('document_form') }}"><i class="material-icons md-18 dark-gray">note_add</i><span class="padding-left-10">@lang("msg.Document Title")</a></li>
                        <li><a href="{{ url('policy_doc_form') }}"><i class="material-icons md-18 dark-gray">insert_drive_file</i><span class="padding-left-10">@lang("msg.Policy Document")</a></li>
                    </ul>
                </li>
            <li class="treeview">
                <a href="#">
                    <i class="material-icons md-18"> subdirectory_arrow_right</i>
                    <span class="padding-left-10">@lang("msg.Report Center")</span>
                    <span class="pull-right-container">
                            
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('total_revenue') }}"><i class="material-icons md-18 dark-gray"> monetization_on </i><span class="padding-left-10">@lang("msg.Total Revenue")</a></li>
                    <li><a href="{{ url('room_reports') }}"><i class="material-icons md-18 dark-gray"> home </i><span class="padding-left-10">@lang("msg.Room Report")</a></li>
                    <li><a href="{{ url('facility_sales_reports') }}"><i class="material-icons md-18"> report</i><span class="padding-left-10">@lang("msg.Sales Reports")</a></li>
                    <li><a href="{{ url('aging_report') }}"><i class="material-icons md-18 dark-gray">note_add</i><span class="padding-left-10">@lang("msg.Aging Report")</a></li>
                    <li><a href="{{ url('activity_report') }}"><i class="material-icons md-18 dark-gray">local_activity</i><span class="padding-left-10">@lang("msg.Activity Report")</a></li>
                    <li><a href="{{ url('tasksheet_report') }}"><i class="material-icons md-18 dark-gray">list</i><span class="padding-left-10">@lang("msg.Task Sheet Report")</a></li>
                    <li><a href="{{ url('resident_service_plan_graph') }}"><i class="material-icons md-18 dark-gray">work</i><span class="padding-left-10"></span>@lang("msg.Service Plan Report")</a></li>
                    <li><a href="{{ url('assessment_report_graph') }}"><i class="material-icons md-18 dark-gray">work</i><span class="padding-left-10"></span>@lang("msg.Main Assessment Report")</a></li>
                    <li><a href="{{ url('assess_date') }}"><i class="material-icons md-18 dark-gray">calendar_today</i><span class="padding-left-10"></span>@lang("msg.Assessment Dues Report")</a></li>
                    <li><a href="{{ url('medicReport') }}">&#x1F48A;<span class="padding-left-10"></span>@lang("msg.Missed Medication")</a></li>
                    <li>
                        <a href="#">
                            <i class="material-icons md-18"> subdirectory_arrow_right</i>
                            <span class="padding-left-10">@lang("msg.Fall Tracker")</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('fall_report') }}"><i class="material-icons md-18 dark-gray">accessible</i><span class="padding-left-10"></span>@lang("msg.Fall Data Sheet")</a></li>
                            <li><a href="{{ url('post_ev_fall') }}"><i class="material-icons md-18 dark-gray">accessible</i><span class="padding-left-10"></span>@lang("msg.Post-Fall Evaluation")</a></li>
                            <li><a href="{{ url('fall_day') }}"><i class="material-icons md-18 dark-gray">accessible</i><span class="padding-left-10"></span>@lang("msg.Day Of Week Summary")</a></li>
                            <li><a href="{{ url('time_of_fall') }}"><i class="material-icons md-18 dark-gray">accessible</i><span class="padding-left-10"></span>@lang("msg.Time Of Fall Summary")</a></li>
                            <li><a href="{{ url('location_report') }}"><i class="material-icons md-18 dark-gray">accessible</i><span class="padding-left-10"></span>@lang("msg.Location Summary")</a></li>
                            <li><a href="{{ url('injury_report') }}"><i class="material-icons md-18 dark-gray">accessible</i><span class="padding-left-10"></span>@lang("msg.Injury and Transfer Summary")</a></li>        							
                        </ul>
                    </li>
                </ul>
            </li>
                @endif

            @if(in_array(2,$role_arr))
            <li class="{{ Request::is('dashboard*') ? 'active' : '' }}">
                <a href="{{ url('dashboard') }}">
                    <i class="material-icons md-18 dark-gray">dashboard </i>
                    <span class="padding-left-10">@lang("msg.Dashboard")</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="material-icons md-18"> subdirectory_arrow_right</i>
                    <span class="padding-left-10">Orbit</span>
                    <span class="pull-right-container">
                            
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
                    <span class="padding-left-10">@lang("msg.Visage")</span>
                    <span class="pull-right-container">
                    
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

            @if(in_array(3,$role_arr))
            <li class="{{ Request::is('dashboard*') ? 'active' : '' }}">
                <a href="{{ url('dashboard') }}">
                    <i class="material-icons md-18 dark-gray">dashboard </i>
                    <span class="padding-left-10">@lang("msg.Dashboard")</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="material-icons md-18"> subdirectory_arrow_right</i>
                    <span class="padding-left-10">Orbit</span>
                    <span class="pull-right-container">
                            
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
                    <span class="padding-left-10">@lang("msg.Visage")</span>
                    <span class="pull-right-container">
                    
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
            <li class="treeview">
                <a href="#">
                    <i class="material-icons md-18"> subdirectory_arrow_right</i>
                    <span class="padding-left-10">@lang("msg.Report Center")</span>
                    <span class="pull-right-container">
                            
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('total_revenue') }}"><i class="material-icons md-18 dark-gray"> monetization_on </i><span class="padding-left-10">@lang("msg.Total Revenue")</a></li>
                    <li><a href="{{ url('room_reports') }}"><i class="material-icons md-18 dark-gray"> home </i><span class="padding-left-10">@lang("msg.Room Report")</a></li>
                    <li><a href="{{ url('facility_sales_reports') }}"><i class="material-icons md-18"> report</i><span class="padding-left-10">@lang("msg.Sales Reports")</a></li>
                    <li><a href="{{ url('aging_report') }}"><i class="material-icons md-18 dark-gray">note_add</i><span class="padding-left-10">@lang("msg.Aging Report")</a></li>
                    <li><a href="{{ url('activity_report') }}"><i class="material-icons md-18 dark-gray">local_activity</i><span class="padding-left-10">@lang("msg.Activity Report")</a></li>
                    <li><a href="{{ url('tasksheet_report') }}"><i class="material-icons md-18 dark-gray">list</i><span class="padding-left-10">@lang("msg.Task Sheet Report")</a></li>
                    <li><a href="{{ url('resident_service_plan_graph') }}"><i class="material-icons md-18 dark-gray">work</i><span class="padding-left-10"></span>@lang("msg.Service Plan Report")</a></li>
                    <li><a href="{{ url('assessment_report_graph') }}"><i class="material-icons md-18 dark-gray">work</i><span class="padding-left-10"></span>@lang("msg.Main Assessment Report")</a></li>	
                    <li><a href="{{ url('assess_date') }}"><i class="material-icons md-18 dark-gray">calendar_today</i><span class="padding-left-10"></span>@lang("msg.Assessment Dues Report")</a></li>
                    <li><a href="{{ url('medicReport') }}">&#x1F48A;<span class="padding-left-10"></span>@lang("msg.Missed Medication")</a></li>
                    <li>
                        <a href="#">
                            <i class="material-icons md-18"> subdirectory_arrow_right</i>
                            <span class="padding-left-10">@lang("msg.Fall Tracker")</span>
                            <span class="pull-right-container">
                                   
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('fall_report') }}"><i class="material-icons md-18 dark-gray">accessible</i><span class="padding-left-10"></span>@lang("msg.Fall Data Sheet")</a></li>
                            <li><a href="{{ url('post_ev_fall') }}"><i class="material-icons md-18 dark-gray">accessible</i><span class="padding-left-10"></span>@lang("msg.Post-Fall Evaluation")</a></li>
                            <li><a href="{{ url('fall_day') }}"><i class="material-icons md-18 dark-gray">accessible</i><span class="padding-left-10"></span>@lang("msg.Day Of Week Summary")</a></li>
                            <li><a href="{{ url('time_of_fall') }}"><i class="material-icons md-18 dark-gray">accessible</i><span class="padding-left-10"></span>@lang("msg.Time Of Fall Summary")</a></li>
                            <li><a href="{{ url('location_report') }}"><i class="material-icons md-18 dark-gray">accessible</i><span class="padding-left-10"></span>@lang("msg.Location Summary")</a></li>
                            <li><a href="{{ url('injury_report') }}"><i class="material-icons md-18 dark-gray">accessible</i><span class="padding-left-10"></span>@lang("msg.Injury and Transfer Summary")</a></li>        							
                        </ul>
                    </li>						
                </ul>
            </li>
            @endif
            @if(in_array(4,$role_arr))
            <li class="{{ Request::is('dashboard*') ? 'active' : '' }}">
                <a href="{{ url('dashboard') }}">
                    <i class="material-icons md-18 dark-gray">dashboard </i>
                    <span class="padding-left-10">@lang("msg.Dashboard")</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="material-icons md-18"> subdirectory_arrow_right</i>
                    <span class="padding-left-10">Orbit</span>
                    <span class="pull-right-container">
                            
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
                    <span class="padding-left-10">@lang("msg.Book Room")</span>
                    <span class="pull-right-container">
                    
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
                    <span class="padding-left-10">@lang("msg.Visage")</span>
                    <span class="pull-right-container">
                    
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
            <li class="treeview">
                <a href="#">
                    <i class="material-icons md-18"> subdirectory_arrow_right</i>
                    <span class="padding-left-10">@lang("msg.Setup")</span>
                    <span class="pull-right-container">
                        
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('all_member_list') }}"><i class="material-icons md-18 dark-gray"> perm_identity </i><span class="padding-left-10">@lang("msg.Add User")</a></li>
                    <li><a href="{{ url('room_details') }}"><i class="material-icons md-18 dark-gray"> home </i><span class="padding-left-10">@lang("msg.Add Room")</a></li>
                    <li><a href="{{ url('service_plan') }}"><i class="material-icons md-18 dark-gray">note_add</i><span class="padding-left-10">Level Of Care</a></li>
                    <li><a href="{{ url('assessment_preview') }}"><i class="material-icons md-18 dark-gray">note_add</i><span class="padding-left-10">@lang("msg.Assessments")</a></li>
                    <li><a href="{{ url('document_form') }}"><i class="material-icons md-18 dark-gray">note_add</i><span class="padding-left-10">Document Title</a></li>
                    <li><a href="{{ url('policy_doc_form') }}"><i class="material-icons md-18 dark-gray">insert_drive_file</i><span class="padding-left-10">Policy Document</a></li>
                </ul>
            </li>
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
                    <span class="padding-left-10">Orbit</span>
                    <span class="pull-right-container">
                            
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
                    <span class="padding-left-10">@lang("msg.Day Book")</span>
                    <span class="pull-right-container">
                            
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="#">
                            <i class="material-icons md-18 dark-gray"> cloud_done</i>
                            <span class="padding-left-10">@lang("msg.Tasksheet")</span>
                            <span class="pull-right-container">
                            
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
                    <span class="padding-left-10">@lang("msg.Visage")</span>
                    <span class="pull-right-container">
                    
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
                <li><a href="{{ url('mar_report') }}"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">MAR @lang("msg.Reports")</span></a></li>
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
                    <span class="padding-left-10">Orbit</span>
                    <span class="pull-right-container">
                            
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
                                <span class="padding-left-10">@lang("msg.Denizen Info")</span>
                                <span class="pull-right-container"></span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="{{ url('personal_details') }}">
                                        <i class="material-icons md-18 dark-gray"> details </i>
                                        <span class="padding-left-10">@lang("msg.Details")</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('resident_service_plan') }}">
                                        <i class="material-icons md-18"> assignment</i>
                                        <span class="padding-left-10">@lang("msg.Service Plan")</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('resident_room') }}">
                                        <i class="material-icons md-18">home</i>
                                        <span class="padding-left-10">@lang("msg.Room Details")</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="material-icons md-18"> subdirectory_arrow_right</i>
                                <span class="padding-left-10">@lang("msg.Histology") </span>
                                <span class="pull-right-container"></span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="{{ url('resident_assessment') }}">
                                        <i class="material-icons md-18 dark-gray"> assessment </i>
                                        <span class="padding-left-10">@lang("msg.Assessments")</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('temporary_service_plan') }}">
                                        <i class="material-icons md-18"> assignment</i>
                                        <span class="padding-left-10">@lang("msg.Temporary Service Plan")</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('injury') }}">
                                        <i class="material-icons md-18"> assignment</i>
                                        <span class="padding-left-10">@lang("msg.Gen. Incident Management")</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('medication_incident_report') }}">
                                        <i class="material-icons md-18"> assignment</i>
                                        <span class="padding-left-10">Medication Incident</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('all_res_checkup') }}">
                                        <i class="material-icons md-18"> assignment</i>
                                        <span class="padding-left-10">@lang("msg.Vital Statistics")</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('all_res_notes') }}">
                                        <i class="material-icons md-18"> assignment</i>
                                        <span class="padding-left-10">@lang("msg.Notes")</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
            <li class="treeview">
                <a href="#">
                    <i class="material-icons md-18"> subdirectory_arrow_right</i>
                    <span class="padding-left-10">Transmute</span>
                    <span class="pull-right-container">
                            
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
                    <span class="padding-left-10">@lang("msg.Day Book")</span>
                    <span class="pull-right-container">
                            
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="#">
                            <i class="material-icons md-18 dark-gray"> cloud_done</i>
                            <span class="padding-left-10">@lang("msg.Tasksheet")</span>
                            <span class="pull-right-container">
                            
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
                    <span class="padding-left-10">@lang("msg.Pharma log / Health Log")</span>
                    <span class="pull-right-container">
                            
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('patient_medicine') }}"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">@lang("msg.MAR")</span></a></li>
                    <li><a href="{{ url('mar_report') }}"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">MAR @lang("msg.Reports")</span></a></li>
                    <li><a href="{{ url('medicine_stocks_list') }}"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">@lang("msg.Medicine Stock")</span></a></li>
                    <li><a href="{{ url('patients_list') }}"><i class="material-icons md-18 dark-gray"> local_hospital </i><span class="padding-left-10">Pharmacy</span></a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="material-icons md-18"> subdirectory_arrow_right</i>
                    <span class="padding-left-10">@lang("msg.Transaction Desk")</span>
                    <span class="pull-right-container">
                    
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
                    <span class="padding-left-10">@lang("msg.Visage")</span>
                    <span class="pull-right-container">
                    
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
                        <a href="{{action('PrintConfigController@print_configuration') }}">
                            <i class="material-icons">print</i> &nbsp;
                             <span>@lang(" Print Configuration")</span>
                        </a>
                    </li>
                    <li class="treeview">
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
                        <span class="padding-left-10">@lang("msg.Setup")</span>
                        <span class="pull-right-container">
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('staff_position_master') }}"><i class="material-icons md-18 dark-gray"> perm_identity </i><span class="padding-left-10">Add Staff Position</a></li>
                        <li><a href="{{ url('all_member_list') }}"><i class="material-icons md-18 dark-gray"> perm_identity </i><span class="padding-left-10">@lang("msg.Add User")</a></li>
                        <li><a href="{{ url('room_details') }}"><i class="material-icons md-18 dark-gray"> home </i><span class="padding-left-10">@lang("msg.Add Room")</a></li>
                        <li><a href="{{ url('service_plan') }}"><i class="material-icons md-18 dark-gray">note_add</i><span class="padding-left-10">Level Of Care</a></li>
                        <li><a href="{{ url('assessment_preview') }}"><i class="material-icons md-18 dark-gray">note_add</i><span class="padding-left-10">@lang("msg.Assessments")</a></li>
                        <li><a href="{{ url('document_form') }}"><i class="material-icons md-18 dark-gray">note_add</i><span class="padding-left-10">Document Title</a></li>
                        <li><a href="{{ url('policy_doc_form') }}"><i class="material-icons md-18 dark-gray">insert_drive_file</i><span class="padding-left-10">Policy Document</a></li>
                    </ul>
                </li>
            <li class="treeview">
                <a href="#">
                    <i class="material-icons md-18"> subdirectory_arrow_right</i>
                    <span class="padding-left-10">@lang("msg.Report Center")</span>
                    <span class="pull-right-container">
                            
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('total_revenue') }}"><i class="material-icons md-18 dark-gray"> monetization_on </i><span class="padding-left-10">@lang("msg.Total Revenue")</a></li>
                    <li><a href="{{ url('room_reports') }}"><i class="material-icons md-18 dark-gray"> home </i><span class="padding-left-10">@lang("msg.Room Report")</a></li>
                    <li><a href="{{ url('facility_sales_reports') }}"><i class="material-icons md-18"> report</i><span class="padding-left-10">@lang("msg.Sales Reports")</a></li>
                    <li><a href="{{ url('aging_report') }}"><i class="material-icons md-18 dark-gray">note_add</i><span class="padding-left-10">@lang("msg.Aging Report")</a></li>
                    <li><a href="{{ url('activity_report') }}"><i class="material-icons md-18 dark-gray">local_activity</i><span class="padding-left-10">@lang("msg.Activity Report")</a></li>
                    <li><a href="{{ url('tasksheet_report') }}"><i class="material-icons md-18 dark-gray">list</i><span class="padding-left-10">@lang("msg.Task Sheet Report")</a></li>
                    <li><a href="{{ url('resident_service_plan_graph') }}"><i class="material-icons md-18 dark-gray">work</i><span class="padding-left-10"></span>@lang("msg.Service Plan Report")</a></li>
                    <li><a href="{{ url('assessment_report_graph') }}"><i class="material-icons md-18 dark-gray">work</i><span class="padding-left-10"></span>@lang("msg.Main Assessment Report")</a></li>
                    <li><a href="{{ url('assess_date') }}"><i class="material-icons md-18 dark-gray">calendar_today</i><span class="padding-left-10"></span>@lang("msg.Assessment Dues Report")</a></li>
                    <li><a href="{{ url('medicReport') }}">&#x1F48A;<span class="padding-left-10"></span>@lang("msg.Missed Medication")</a></li>
                    <li>
                        <a href="#">
                            <i class="material-icons md-18"> subdirectory_arrow_right</i>
                            <span class="padding-left-10">@lang("msg.Fall Tracker")</span>
                            <span class="pull-right-container">
                                   
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('fall_report') }}"><i class="material-icons md-18 dark-gray">accessible</i><span class="padding-left-10"></span>@lang("msg.Fall Data Sheet")</a></li>
                            <li><a href="{{ url('post_ev_fall') }}"><i class="material-icons md-18 dark-gray">accessible</i><span class="padding-left-10"></span>@lang("msg.Post-Fall Evaluation")</a></li>
                            <li><a href="{{ url('fall_day') }}"><i class="material-icons md-18 dark-gray">accessible</i><span class="padding-left-10"></span>@lang("msg.Day Of Week Summary")</a></li>
                            <li><a href="{{ url('time_of_fall') }}"><i class="material-icons md-18 dark-gray">accessible</i><span class="padding-left-10"></span>@lang("msg.Time Of Fall Summary")</a></li>
                            <li><a href="{{ url('location_report') }}"><i class="material-icons md-18 dark-gray">accessible</i><span class="padding-left-10"></span>@lang("msg.Location Summary")</a></li>
                            <li><a href="{{ url('injury_report') }}"><i class="material-icons md-18 dark-gray">accessible</i><span class="padding-left-10"></span>@lang("msg.Injury and Transfer Summary")</a></li>        							
                        </ul>
                    </li>
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
                        <span class="pull-right-container"></span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="treeview">
                            <a href="#">
                                <i class="material-icons md-18"> subdirectory_arrow_right</i>
                                <span class="padding-left-10">@lang("msg.Denizen Info")</span>
                                <span class="pull-right-container"></span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="{{ url('personal_details') }}">
                                        <i class="material-icons md-18 dark-gray"> details </i>
                                        <span class="padding-left-10">@lang("msg.Details")</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('resident_service_plan') }}">
                                        <i class="material-icons md-18"> assignment</i>
                                        <span class="padding-left-10">@lang("msg.Service Plan")</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('resident_room') }}">
                                        <i class="material-icons md-18">home</i>
                                        <span class="padding-left-10">@lang("msg.Room Details")</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="material-icons md-18"> subdirectory_arrow_right</i>
                                <span class="padding-left-10">@lang("msg.Histology") </span>
                                <span class="pull-right-container"></span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="{{ url('resident_assessment') }}">
                                        <i class="material-icons md-18 dark-gray"> assessment </i>
                                        <span class="padding-left-10">@lang("msg.Assessments")</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('temporary_service_plan') }}">
                                        <i class="material-icons md-18"> assignment</i>
                                        <span class="padding-left-10">@lang("msg.Temporary Service Plan")</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('injury') }}">
                                        <i class="material-icons md-18"> assignment</i>
                                        <span class="padding-left-10">@lang("msg.Gen. Incident Management")</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('medication_incident_report') }}">
                                        <i class="material-icons md-18"> assignment</i>
                                        <span class="padding-left-10">Medication Incident</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('all_res_checkup') }}">
                                        <i class="material-icons md-18"> assignment</i>
                                        <span class="padding-left-10">@lang("msg.Vital Statistics")</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('all_res_notes') }}">
                                        <i class="material-icons md-18"> assignment</i>
                                        <span class="padding-left-10">@lang("msg.Notes")</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            <li class="treeview">
                <a href="#">
                    <i class="material-icons md-18"> subdirectory_arrow_right</i>
                    <span class="padding-left-10">@lang("msg.Day Book")</span>
                    <span class="pull-right-container">
                            
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="#">
                            <i class="material-icons md-18 dark-gray"> cloud_done</i>
                            <span class="padding-left-10">@lang("msg.Tasksheet")</span>
                            <span class="pull-right-container">
                            
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
                    <span class="padding-left-10">@lang("msg.Pharma log / Health Log")</span>
                    <span class="pull-right-container">
                            
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('patient_medicine') }}"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">@lang("msg.MAR")</span></a></li>
                    <li><a href="{{ url('mar_report') }}"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">MAR @lang("msg.Reports")</span></a></li>
                    <li><a href="{{ url('medicine_stocks_list') }}"><i class="material-icons md-18"> assignment</i><span class="padding-left-10">@lang("msg.Medicine Stock")</span></a></li>
                    <li><a href="{{ url('patients_list') }}"><i class="material-icons md-18 dark-gray"> local_hospital </i><span class="padding-left-10">Pharmacy</span></a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="material-icons md-18"> subdirectory_arrow_right</i>
                    <span class="padding-left-10">@lang("msg.Visage")</span>
                    <span class="pull-right-container">
                    
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
                    <span class="padding-left-10">Orbit</span>
                    <span class="pull-right-container">
                            
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
                    <span class="padding-left-10">@lang("msg.Transaction Desk")</span>
                    <span class="pull-right-container">
                    
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
                    <span class="padding-left-10">@lang("msg.Visage")</span>
                    <span class="pull-right-container">
                    
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
    </div>
      <!-- /main menu content-->
      <!-- main menu footer-->
      <!-- include includes/menu-footer-->
      <!-- main menu footer-->
    </div>
    <!-- / main menu-->

<div class="app-content content container-fluid">
    <div class="content-wrapper">
            <section class="content-header">
					<h4>
						@yield('contentheader_title', 'Page Header here')
						<small>@yield('contentheader_description')</small>
					</h4>
				</section>
				<!-- Main content -->
				<section class="content-body">
					<!-- Your Page Content Here -->
					@yield('main-content')
				</section><!-- /.content -->
    </div>
</div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->


    {{-- <footer class="footer footer-static footer-light navbar-border">
      <p class="clearfix text-muted text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2017 <a href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank" class="text-bold-800 grey darken-2">PIXINVENT </a>, All rights reserved. </span><span class="float-md-right d-xs-block d-md-inline-block">Hand-crafted & Made with <i class="icon-heart5 pink"></i></span></p>
    </footer> --}}

    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('/public/dashboardPanel/app-assets/js/core/libraries/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/public/dashboardPanel/app-assets/vendors/js/ui/tether.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/public/dashboardPanel/app-assets/js/core/libraries/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/public/dashboardPanel/app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/public/dashboardPanel/app-assets/vendors/js/ui/unison.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/public/dashboardPanel/app-assets/vendors/js/ui/blockUI.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/public/dashboardPanel/app-assets/vendors/js/ui/jquery.matchHeight-min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/public/dashboardPanel/app-assets/vendors/js/ui/screenfull.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/public/dashboardPanel/app-assets/vendors/js/extensions/pace.min.js') }}" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{ asset('/public/dashboardPanel/app-assets/vendors/js/charts/chart.min.js') }}" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="{{ asset('/public/dashboardPanel/app-assets/js/core/app-menu.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/public/dashboardPanel/app-assets/js/core/app.js') }}" type="text/javascript"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{ asset('/public/dashboardPanel/app-assets/js/scripts/pages/dashboard-lite.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
  </body>
</html>