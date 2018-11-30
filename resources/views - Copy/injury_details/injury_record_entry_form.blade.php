
@extends('layouts.app')

@section('htmlheader_title')
    Injury Record Entry
@endsection

@section('contentheader_title')
   Injury Record Entry    
@endsection

@section('main-content')

<script type="text/javascript" language="javascript" src="{{ asset('/js/injury_report.js') }}"></script>
<style>
.wickedpicker{
	z-index:999 !important;
}

</style>
<div class="box box-primary" style="padding-top:15px; margin-top:22px;">
	<form action="injury_record_entry" method="post">
		<div class="container">
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
					<div class="col-md-3">
						<div class="form-group has-feedback">
							<label>Prospectives</label><br/>
							<select name="pros_id" id="pros_id" class="myselect" style="width:100%; height: 34px;" required >
								<option value="">Select Prospective</option>
								@foreach ($prospects as $prospect)
								<option value="{{ $prospect->id}}">{{ $prospect->pros_name }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group has-feedback">
							<label>Date of Event*</label>
							<input type="text" class="form-control" name="injury_date" id="injury_date" autocomplete="off" required>
						   <script type="text/javascript"> $('#injury_date').datepicker({format: 'yyyy/mm/dd'});</script>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group has-feedback">
							<label>Med. Record No</label><br/>
							<input type="text" class="form-control" name="med_record_no" required />
						</div>	
					</div>
					<div class="col-md-3">
						<div class="form-group has-feedback">
							<label>time of event</label>
							<div class='input-group date' id='datetimepicker3'>
								<input type="text" name="appointment_time"  class="form-control timepicker" />
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-time"></span>
								</span>
							</div>
						</div>
					</div>
					<div class="col-md-4">										
						<div class="form-group has-feedback">
							<label>Event code</label><br/>
							<select name="event_code" id="event_code" class="myselect" onchange = "ShowotherEvent()" style="width:100%; height: 34px;" required >
								<option value="">Select Event code</option>
								@foreach ($event_codes as $event_code)
								<option value="{{ $event_code->code}}">{{ $event_code->code }}</option>
								@endforeach
								<option value="event_others">Others</option>
							</select>
						</div>
						<div id="othereventShow" style="display: none">
							<div class="form-group has-feedback">
								<label>Event code(Others)</label><br/>
								<input type="text" class="form-control" name="other_event_code" />
							</div>
						</div>
					</div>
					<div class="col-md-4">										
						<div class="form-group has-feedback">
							<label>location code</label><br/>
							<select name="location_code" id="location_code" class="myselect" onchange = "ShowotherLocation()" style="width:100%; height: 34px;" required >
								<option value="">Select Location code</option>
								@foreach ($location_codes as $location_code)
								<option value="{{ $location_code->location_code}}">{{ $location_code->location_code }}</option>
								@endforeach
								<option value="location_others">Others</option>
							</select>
						</div>
						<div id="otherlocationShow" style="display: none">
							<div class="form-group has-feedback">
								<label>Location code(Others)</label><br/>
								<input type="text" class="form-control" name="location_code_others" />
							</div>
						</div>
					</div>
					<div class="col-md-4">										
						<div class="form-group has-feedback">
							<label>injury code</label><br/>
							<select name="injury_code" id="injury_code" class="myselect" onchange = "ShowotherInjury()" style="width:100%; height: 34px;" required >
								<option value="">Select injury code</option>
								@foreach ($injury_codes as $injury_code)
								<option value="{{ $injury_code->injury_code}}">{{ $injury_code->injury_code }}</option>
								@endforeach
								<option value="injury_others">Others</option>
							</select>
						</div>
						<div id="otherinjuryShow" style="display: none">
							<div class="form-group has-feedback">
								<label>Injury code(Others)</label><br/>
								<input type="text" class="form-control" name="injury_code_others" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
					<div class="col-md-6">										
						<div class="form-group has-feedback">
							<label>Brief narrative of what happened </label>
							<textarea class="form-control" name="injury_brief_details" type="text" rows="4"></textarea>
						</div>
						<div class="form-group has-feedback">
							<label>Attach witness statements</label><br/>
							<input type="file" class="form-control" name="attachment" />
						</div>
					</div>
					<div class="col-md-6">										
						<div class="form-group has-feedback">
							<label>person involved</label>
							<textarea class="form-control" name="person_involve" type="text" rows="4"></textarea>
						</div>
					</div>					
				</div>
			</div> 
		</div>
		<div class="container">
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
					<div class="col-md-6">										
						<div class="form-group has-feedback">
							<label>ACTION TAKEN & CP Updated</label><br/>
							<select name="action_taken" id="action_taken" class="myselect" onchange = "ShowotherActiontaken()" style="width:100%; height: 34px;" required >
								<option value="">Choose an Option</option>
								@foreach ($action_takens as $action_taken)
								<option value="{{ $action_taken->action_taken}}">{{ $action_taken->action_taken }}</option>
								@endforeach
								<option value="non_action">Non Action</option>
							</select>
						</div>
						<div id="nonActionShow" style="display: none">
							<div class="form-group has-feedback">
								<label>No need reason</label><br/>
								<input type="text" class="form-control" name="no_action_reason" />
							</div>
						</div>
						<div class="form-group has-feedback">
							<label>ACTION TAKEN & CP Updated</label><br/>
							<select name="cp_update" id="cp_update" class="myselect" onchange = "Showothercp()" style="width:100%; height: 34px;" required >
								<option value="">Choose an Option</option>
								@foreach ($cp_updates as $cp_update)
								<option value="{{ $cp_update->cp}}">{{ $cp_update->cp }}</option>
								@endforeach
								<option value="specify_others">Others</option>
							</select>
						</div>
						<div id="othercpShow" style="display: none">
							<div class="form-group has-feedback">
								<label>Specify Other</label><br/>
								<input type="text" class="form-control" name="other_cp" />
							</div>
						</div>
					</div>
					<div class="col-md-6">	
						<div class="form-group has-feedback">
							<label>Nurse</label><br/>
							<input type="text" class="form-control" name="action_taken_nurse" />
						</div>
						<div class="form-group has-feedback">
							<label>nurse</label><br/>
							<input type="text" class="form-control" name="cp_upload_nurse" />
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
					<div class="col-md-3">
						<div class="form-check">
							<label style="font-size: 2.5em">
								<input type="checkbox" name="check_notice" id="check_notice"> 
								<span class="label-text">Hospital transfer</span>
							</label>
						</div>
					</div>								
					<div class="col-md-3">
						<div class="form-check">
							<label>
								<input type="checkbox" id="check_notice1" name="check_notice1"> 
								<span class="label-text">Family notified</span>
							</label>
						</div>
					</div>								
					<div class="col-md-3">
						<div class="form-check">
							<label>
								<input type="checkbox" id="check_notice2" name="check_notice2"> <span class="label-text">Physician notified</span>
							</label>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-check">
							<label>
								<input type="checkbox" id="check_notice3" name="check_notice3"> <span class="label-text">Care Plan</span>
							</label>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">	
					<div class="col-md-3">
						<div class="form-check">
							<label>
								<input type="checkbox" id="check_notice4" name="check_notice4"> <span class="label-text">24hr report</span>
							</label>
						</div>
					</div>								
					<div class="col-md-3">
						<div class="form-check">
							<label>
								<input type="checkbox" id="check_notice5" name="check_notice5"> <span class="label-text">Alert charting</span>
							</label>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-check">
							<label>
								<input type="checkbox" id="check_notice6" name="check_notice6"> <span class="label-text">Skin sheets if needed</span>
							</label>
						</div>
					</div>								
					<div class="col-md-3">
						<div class="form-check">
							<label>
								<input type="checkbox" id="check_notice7" name="check_notice7"> <span class="label-text">Neuro check flow sheet</span>
							</label>
						</div>
					</div>
				</div>
			</div>
			
		</div><br/><br/>
		<div style="border-bottom:1px solid #ccc;"></div> <br/>
		<div id="fallInfo" style="display: none">
			<div class="container">
				<div class="tab-content" id="myTabContent">					
					<div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
						<p class="text-danger text-center"><b style="font-size:17px">NURSING FALL INVESTIGATION INFORMATION</b></p>
						
						<p class="text-success text-center"><b>Please complete the following if the resident incident was a fall</b></p>
						<div style="border-bottom:1px solid #ccc; margin-right:278px; margin-left:270px"></div> <br/>
						<div class="col-md-6">
							<div class="form-group has-feedback">
								<label>time of fallen</label>
								<div class='input-group date' id='datetimepicker3'>
									<input type="text" name="fall_time"  class="form-control timepicker" />
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-time"></span>
									</span>
								</div>
							</div>
							<div class="form-group has-feedback">
								<label>where/how found</label>
								<input type="text" class="form-control" name="where_found" />
							</div>
							<div class="col-md-3" style="padding-left:0">
								<div class="form-group has-feedback">
									<label>B/P lying</label><br/>
									<input type="text" class="form-control" name="bp_lying" />
								</div>
							</div>
							<div class="col-md-3" style="padding-left:0">
								<div class="form-group has-feedback">
									<label>B/P sitting</label><br/>
									<input type="text" class="form-control" name="bp_sitting" />
								</div>
							</div>
							<div class="col-md-3" style="padding-left:0">
								<div class="form-group has-feedback">
									<label>Pulse</label><br/>
									<input type="text" class="form-control" name="puls" />
								</div>
							</div>
							<div class="col-md-3" style="padding-right:0; padding-left:0">
								<div class="form-group has-feedback">
									<label>Resp</label><br/>
									<input type="text" class="form-control" name="resp" />
								</div>
							</div>
							<div class="col-md-6" style="padding-left:0">
								<div class="form-group has-feedback">
									<label>Diabetic</label><br/>
									<select name="diabetic" id="diabetic" class="form-control" onchange = "Showbloodsuger()">
										<option value="">Choose an Option</option>
										<option value="Yes">Yes</option>
										<option value="No">No</option>
									</select>
								</div>
							</div>
							<div class="col-md-6" id="sugerShow" style="display: none">
								<div class="form-group has-feedback">
									<label>Blood Suger</label><br/>
									<input type="text" class="form-control" name="blood_suger" />
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>Shoes</label>
								<select name="incontinence" class="form-control">
									<option value="">Choose an Option</option>
									<option value="ON">ON</option>
									<option value="OFF">OFF</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>Socks</label>
								<select name="use_of_wc" class="form-control">
									<option value="">Choose an Option</option>
									<option value="ON">ON</option>
									<option value="OFF">OFF</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group has-feedback">
								<label>Activity at time of fall</label>
								<input type="text" name="fall_activity" class="form-control" />
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>Resident used call light</label>
								<select name="use_of_call_light" class="form-control">
									<option value="">Choose an Option</option>
									<option value="YES">YES</option>
									<option value="NO">NO</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>Call light within reach</label>
								<select name="call_light_within_use" class="form-control">
									<option value="">Choose an Option</option>
									<option value="YES">YES</option>
									<option value="NO">NO</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group has-feedback">
								<label>Bedrail position</label>
								<input type="text" name="bedrail_position" class="form-control" />
							</div>
						</div>					
					</div>	
				</div>
			</div>
			<div class="container">
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>Incontinence</label>
								<select name="incontinence" class="form-control" >
									<option value="">Choose an Option</option>
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>use of w/c</label>
								<select name="use_of_wc" class="form-control">
									<option value="">Choose an Option</option>
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>Brakes on w/c</label>
								<select name="brakes_on_wc" class="form-control">
									<option value="">Choose an Option</option>
									<option value="ON">ON</option>
									<option value="OFF">OFF</option>
									<option value="NA">NA</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>Ambulatory</label>
								<select name="ambulatory" class="form-control">
									<option value="">Choose an Option</option>
									<option value="YES">YES</option>
									<option value="NO">NO</option>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>last meal time</label>
								<div class='input-group date' id='datetimepicker3'>
									<input type="text" name="last_meal_time"  class="form-control timepicker" />
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-time"></span>
									</span>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>Type & location of assist Device</label>
								<input type="text" name="type_of_location_of_assist_device" class="form-control" />
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group has-feedback">
								<label>alarm(bed)</label>
								<select name="alarm_bed" class="form-control">
									<option value="">Select</option>
									<option value="ON">ON</option>
									<option value="OFF">OFF</option>
									<option value="NA">NA</option>
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group has-feedback">
								<label>alarm(chair)</label>
								<select name="alarm_chair" class="form-control">
									<option value="">Select</option>
									<option value="ON">ON</option>
									<option value="OFF">OFF</option>
									<option value="NA">NA</option>
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group has-feedback">
								<label>alarm(others)</label>
								<select name="alarm_other" class="form-control">
									<option value="">Select</option>
									<option value="ON">ON</option>
									<option value="OFF">OFF</option>
									<option value="NA">NA</option>
								</select>
							</div>
						</div>
					</div>						
				</div>
			</div>
			<div class="container">
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>Glasses</label>
								<select name="glasses" class="form-control">
									<<option value="">Choose an Option</option>
									<option value="OFF">OFF</option>
									<option value="OFF">OFF</option>
									<option value="NA">NA</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>hearing Aids</label>
								<select name="hearing_aide" class="form-control" >
									<option value="">Choose an Option</option>
									<option value="OFF">OFF</option>
									<option value="OFF">OFF</option>
									<option value="NA">NA</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group has-feedback">
								<label>Resident confused</label>
								<select name="resident_confused" class="form-control" >
									<option value="">Choose an Option</option>
									<option value="YES">YES</option>
									<option value="NO">NO</option>
								</select>
							</div>
						</div>
					</div>					
				</div>
			</div>
			<div class="container">
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>Floor clear</label>
								<select name="floor_clear" class="form-control" >
									<<option value="">Choose an Option</option>
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>Specifics</label>
								<input type="text" name="floor_clear_specific" class="form-control" />
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>Psychotropic Med</label>
								<input type="text" name="psychotropic_med" class="form-control" />
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>Psychotropic Med Time</label>
								<input type="text" name="psychotropic_med_time" class="form-control" />
							</div>
						</div>
					</div>
						
				</div>
			</div>
			<div class="container">
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>lighting</label>
								<select name="lighting" class="form-control" >
									<<option value="">Choose an Option</option>
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>others</label>
								<input type="text" name="lighting_other" class="form-control" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group has-feedback">
								<label>Bed Brakes</label>
								<select name="bed_brakes" class="form-control" >
									<<option value="">Choose an Option</option>
									<option value="ON">ON</option>
									<option value="OFF">OFF</option>
								</select>
							</div>
						</div>
					</div>					
				</div>
			</div>
			<div class="container">
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
						<div class="col-md-6">
							<div class="form-group has-feedback">
								<label>Last time toileted (if applicable)</label>
								<input type="text" name="last_toilet" class="form-control" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group has-feedback">
								<label>Other Information</label>
								<input type="text" name="other_info" class="form-control" />
							</div>
						</div>
					</div>
				</div>			
			</div>
			<div style="border-bottom:1px solid #ccc;"></div> <br/>
		</div>
		
		<div id="skinInfo"  style="display: none">
			<div class="container">
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
						<p class="text-danger text-center"><b style="font-size:17px">SKIN TEAR / BRUISE INVESTIGATION INFORMATION</b></p>						
						<p class="text-success text-center"><b>Please complete the following if the resident incident was a skin tear or a bruise:</b></p>
						<div style="border-bottom:1px solid #ccc; margin-right:278px; margin-left:270px"></div> <br/>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>Environmental issues</label><br/>
								<select name="environmental_issues" id="environmental_issues" class="form-control" onchange = "ShowEnv()">
									<option value="">Choose an Option</option>
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								</select>
							</div>
							<div id="envSpecify" class="form-group has-feedback" style="display: none">
								<label>Specify</label>
								<input type="text" name="environmental_issues_specify" class="form-control" />
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>Resident location when found</label><br/>
								<select name="resident_location_when_found" id="resident_location_when_found" class="form-control" onchange = "ShowLoc()">
									<option value="">Choose an Option</option>
									<option value="Bed">Bed</option>
									<option value="W/C">W/C</option>
									<option value="Others">Others</option>
								</select>
							</div>
							<div id="locSpecify" class="form-group has-feedback" style="display: none">
								<label>Specify Others</label>
								<input type="text" name="resident_location_when_found_other" class="form-control" />
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>Visitor prior 8 hours</label><br/>
								<select name="visitor_prior_8_hours" id="visitor_prior_8_hours" class="form-control" onchange = "ShowVisitor()">
									<option value="">Choose an Option</option>
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								</select>
							</div>
							<div id="visitorSpecify" class="form-group has-feedback" style="display: none">
								<label>Who</label>
								<input type="text" name="visitor_prior_8_hours_who" class="form-control" />
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>New staff assigned</label><br/>
								<select name="new_staff_assigned" id="new_staff_assigned" class="form-control" onchange = "ShowStaff()">
									<option value="">Choose an Option</option>
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								</select>
							</div>
							<div id="staffSpecify" class="form-group has-feedback" style="display: none">
								<label>Name</label>
								<input type="text" name="new_staff_assigned_who" class="form-control" />
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>Behavior issues past 72 hours</label><br/>
								<select name="behavior_issues_past_72_hours" id="behavior_issues_past_72_hours" class="form-control" onchange = "ShowBehave()">
									<option value="">Choose an Option</option>
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								</select>
							</div>
							<div id="behaveSpecify" class="form-group has-feedback" style="display: none">
								<label>Specify</label>
								<input type="text" name="behavior_issues_past_72_hours_yes" class="form-control" />
							</div>
						</div>
						<div class="col-md-3">
							<div id="locSpecify" class="form-group has-feedback">
								<label>Bedrail position</label>
								<input type="text" name="bedrail_position_skin" class="form-control" />
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>Resident confused</label><br/>
								<select name="resident_confused_skin" id="resident_confused_skin" class="form-control">
									<option value="">Choose an Option</option>
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								</select>
							</div>							
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>On Prednisone</label><br/>
								<select name="on_prednisone" id="on_prednisone" class="form-control" >
									<option value="">Choose an Option</option>
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								</select>
							</div>							
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>Equipment issues</label><br/>
								<select name="equipment_issues" id="equipment_issues" class="form-control" onchange = "ShowEquipment()">
									<option value="">Choose an Option</option>
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								</select>
							</div>
							<div id="equipmentSpecify" class="form-group has-feedback" style="display: none">
								<label>Specify</label>
								<input type="text" name="equipment_issues_specify" class="form-control" />
							</div>
						</div>
						<div class="col-md-3">
							<div id="locSpecify" class="form-group has-feedback">
								<label>Activity at time of skin tear</label>
								<input type="text" name="activity_at_time_of_bruiseskin_tear" class="form-control" />
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>transfer from bed or chair?</label><br/>
								<select name="transfer_from_bed_or_chair" id="transfer_from_bed_or_chair" class="form-control">
									<option value="">Choose an Option</option>
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								</select>
							</div>							
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>Recent fall past 72 hours?</label><br/>
								<select name="recent_fall_past_72_hours_skin" id="recent_fall_past_72_hours_skin" class="form-control" >
									<option value="">Choose an Option</option>
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								</select>
							</div>							
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>Seated next to another res.</label><br/>
								<select name="seated_next_to" id="seated_next_to" class="form-control" onchange = "ShowSeated()">
									<option value="">Choose an Option</option>
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								</select>
							</div>
							<div id="personSpecify" class="form-group has-feedback" style="display: none">
								<label>Specify</label>
								<input type="text" name="seated_next_to_person" class="form-control" />
							</div>
						</div>
						
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>Ambulatory:</label><br/>
								<select name="ambulatory_skin" id="ambulatory_skin" class="form-control">
									<option value="">Choose an Option</option>
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								</select>
							</div>							
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>On Coumadin?</label><br/>
								<select name="on_coumadin" id="on_coumadin" class="form-control" >
									<option value="">Choose an Option</option>
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								</select>
							</div>							
						</div>
						<div class="col-md-3">
							<div id="locSpecify" class="form-group has-feedback">
								<label>other pertinent info</label>
								<input type="text" name="other_pertinent_info_skin" class="form-control" />
							</div>
						</div>
					</div>
				</div>
			</div>
			<div style="border-bottom:1px solid #ccc;"></div> <br/>
		</div>
		
		<div class="container">
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
					<div class="col-md-12">
						<div class="form-check">
							<label>
								<input type="checkbox" id="check_notice_desc" name="check_notice1" onclick = "ShowResidentAlter()"> 
								<span class="label-text">Please click here if the resident has been in engaged in a resident altercation:</span>
							</label>
						</div>
					</div>
				</div>
			</div>
		</div><br/>
		<div id="alterTab" style="display: none">
			<div class="container">
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>Environmental issues</label><br/>
								<select name="behaviour_environmental_issues" id="behaviour_environmental_issues" class="form-control" onchange = "ShowBevEnv()">
									<option value="">Choose an Option</option>
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								</select>
							</div>
							<div id="envbevSpecify" class="form-group has-feedback" style="display: none">
								<label>Specify</label>
								<input type="text" name="behaviour_environmental_issues_specify" class="form-control" />
							</div>
						</div>
						<div class="col-md-3">
							<div id="" class="form-group has-feedback">
								<label>Assessed for pain: Results</label>
								<input type="text" name="assessed_for_pain" class="form-control" />
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>Medicated?</label><br/>
								<select name="assessed_for_pain_medicated" id="assessed_for_pain_medicated" class="form-control" >
									<option value="">Choose an Option</option>
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div id="" class="form-group has-feedback">
								<label>Urine dip results (prn)</label>
								<input type="text" name="urine_dip_results" class="form-control" />
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
						<div class="col-md-4">
							<div id="" class="form-group has-feedback">
								<label>Activity at time of behavior</label>
								<input type="text" name="activity_at_time_of_behavior" class="form-control" />
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group has-feedback">
								<label>Unfamiliar care giver?</label><br/>
								<select name="unfamiliar_care_giver" id="unfamiliar_care_giver" class="form-control" onchange = "ShowCareGiver()">
									<option value="">Choose an Option</option>
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								</select>
							</div>
							<div id="caregivername" class="form-group has-feedback" style="display: none">
								<label>Care Giver Name</label>
								<input type="text" name="care_giver_name" class="form-control" />
							</div>
						</div>
						<div class="col-md-4">
							<div id="" class="form-group has-feedback">
								<label>Other pertinent info</label>
								<input type="text" name="other_pertinent_info_behaviour" class="form-control" />
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
						<div class="col-md-6">
							<div class="form-group has-feedback">
								<label>Investigation/Follow-up </label>
								<textarea class="form-control" name="investigation" type="text" rows="6"></textarea>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div style="border-bottom:1px solid #ccc;"></div> <br/>
		</div>
		
		<div class="container">
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
					<div class="col-md-6"></div>
					<div class="col-md-6">											
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group has-feedback">
							<button type="submit" class="btn btn-primary btn-block btn-flat btn-width">Submit</button>
						</div>					
					</div>
				</div>
			</div>			
		</div>
	</form>
</div>
<script type="text/javascript">
	$(".myselect").select2();
</script>
@include('layouts.partials.scripts_auth')

@endsection
