
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
									<a href="{{ url('appointment_schedule') }}">
										<i class="material-icons"> settings_backup_restore </i>
										<span class="padding-left-10">@lang("msg.Appointment Schedule")</span>
									</a>
								</li>
								<li>
									<a href="{{ url('sales_stage_pipeline') }}">
										<i class="material-icons md-18"> insert_chart</i>
										<span class="padding-left-10">@lang("msg.Sales Pipeline")</span>
									</a>
								</li>
								<li>
									<a href="{{ url('reports') }}">
										<i class="material-icons md-18"> report</i>Sales Reports 
									</a>
								</li>
								<li>
									<a href="{{ url('personal_details') }}">
										<i class="material-icons md-18 dark-gray"> details </i>
										<span class="padding-left-10">@lang("msg.Future Resident Details")</span>
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
								<span class="padding-left-10">Compass Care</span>
								<span class="pull-right-container">
										<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
								</span>
							</a>
							<ul class="treeview-menu">
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
        							<a href="#">
        								<i class="material-icons md-18"> subdirectory_arrow_right</i>
        								<span class="padding-left-10">@lang("msg.Assessment")</span>
        								<span class="pull-right-container">
        								<i class="material-icons pull-right dark-gray" style="font-size:18px !important; position:relative"> expand_more </i>
        								</span>
        							</a>
        							<ul class="treeview-menu">
        								<li><a href="{{ url('preadmin_resident_assessment') }}"><i class="material-icons md-18 dark-gray"> assessment </i><span class="padding-left-10">@lang("msg.Preadmission Evaluation")</a></li>
        								<li><a href="{{ url('resident_assessment') }}"><i class="material-icons md-18 dark-gray"> assessment </i><span class="padding-left-10">@lang("msg.Sub Assessments")</a></li>
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
								<span class="padding-left-10">Link Us</span>
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
								<li><a href="{{ url('patients_list') }}"><i class="material-icons md-18 dark-gray"> local_hospital </i><span class="padding-left-10">@lang("msg.Doctor")</span></a></li>
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
										<li><a href="{{ url('service_plan') }}"><i class="material-icons md-18 dark-gray">note_add</i><span class="padding-left-10">@lang("msg.Service Plan")</a></li>
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