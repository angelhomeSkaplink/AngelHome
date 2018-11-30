@extends('layouts.app')

@section('htmlheader_title')
    Incident Record
@endsection

@section('contentheader_title')
   <p class="text-danger"><b>Incident Record</b></p>   
@endsection

@section('main-content')

<script type="text/javascript" language="javascript" src="{{ asset('/js/injury_report.js') }}"></script>
<style>
	.wickedpicker{
		z-index:999 !important;
	}
	#submit-button {
		position: fixed;
		bottom: 30px;
		right: 130px; 
	}
	
	#cancel-button {
		position: fixed;
		bottom: 30px;
		right: 25px; 
	}
.content-header
	{
		//display:none;
		padding: 2px 0px 1px 20px;
		margin-bottom: -18px;
	}
	.content {
		margin-top: 15px;
	}
</style>
<div class="box box-primary" style="padding-top:15px; margin-top:22px;">
	<form action="injury_record_entry" method="post">
		<div class="container">
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
					<div class="col-md-3">
						<div class="form-group has-feedback">
							<label>@lang("msg.Resident")</label><br/>
							<select name="pros_id" id="pros_id" class="form-control" style="width:100%; height: 34px;" required >
								<option value="">@lang("msg.Select Resident")</option>
								@foreach ($prospects as $prospect)
								<option value="{{ $prospect->id}}">{{ $prospect->pros_name }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group has-feedback">
							<label>@lang("msg.Date Of Incident")*</label>
							<input type="text" class="form-control" name="injury_date" id="injury_date" autocomplete="off" required>
						   <script type="text/javascript"> $('#injury_date').datepicker({format: 'yyyy/mm/dd'});</script>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group has-feedback">
							<label>@lang("msg.Med. Record No")</label><br/>
							<input type="text" class="form-control" name="med_record_no" required />
						</div>	
					</div>
					<div class="col-md-3">
						<div class="form-group has-feedback">
							<label>@lang("msg.Time Of Incident")</label>
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
							<label>@lang("msg.Incident Code")</label><br/>
							<select name="event_code" id="event_code" class="form-control" onchange = "ShowotherEvent()" style="width:100%; height: 34px;" required >
								<option value="">@lang("msg.Select Incident Code")</option>
								@foreach ($event_codes as $event_code)
								<option value="{{ $event_code->code}}">{{ $event_code->code }}</option>
								@endforeach
								<option value="event_others">@lang("msg.Others")</option>
							</select>
						</div>
						<div id="othereventShow" style="display: none">
							<div class="form-group has-feedback">
								<label>@lang("msg.Incident Code(Others)")</label><br/>
								<input type="text" class="form-control" name="other_event_code" />
							</div>
						</div>
					</div>
					<div class="col-md-4">										
						<div class="form-group has-feedback">
							<label>@lang("msg.Location Code")</label><br/>
							<select name="location_code" id="location_code" class="form-control" onchange = "ShowotherLocation()" style="width:100%; height: 34px;" required >
								<option value="">@lang("msg.Select Location Code")</option>
								@foreach ($location_codes as $location_code)
								<option value="{{ $location_code->location_code}}">{{ $location_code->location_code }}</option>
								@endforeach
								<option value="location_others">@lang("msg.Others")</option>
							</select>
						</div>
						<div id="otherlocationShow" style="display: none">
							<div class="form-group has-feedback">
								<label>@lang("msg.Location code(Others)")</label><br/>
								<input type="text" class="form-control" name="location_code_others" />
							</div>
						</div>
					</div>
					<div class="col-md-4">										
						<div class="form-group has-feedback">
							<label>@lang("msg.Injury Code")</label><br/>
							<select name="injury_code" id="injury_code" class="form-control" onchange = "ShowotherInjury()" style="width:100%; height: 34px;" required >
								<option value="">@lang("msg.Select Injury Code")</option>
								@foreach ($injury_codes as $injury_code)
								<option value="{{ $injury_code->injury_code}}">{{ $injury_code->injury_code }}</option>
								@endforeach
								<option value="injury_others">@lang("msg.Others")</option>
							</select>
						</div>
						<div id="otherinjuryShow" style="display: none">
							<div class="form-group has-feedback">
								<label>@lang("msg.Injury code(Others)")</label><br/>
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
							<label>@lang("msg.Brief Narrative Of What Happened") </label>
							<textarea class="form-control" name="injury_brief_details" type="text" rows="4"></textarea>
						</div>
						<div class="form-group has-feedback">
							<label>@lang("msg.Attach Witness Statements")</label><br/>
							<input type="file" class="form-control" name="attachment" />
						</div>
					</div>
					<div class="col-md-6">										
						<div class="form-group has-feedback">
							<label>@lang("msg.Person Involved")</label>
							<textarea class="form-control" name="person_involve" type="text" rows="4"></textarea>
						</div>
					</div>					
				</div>
			</div> 
		</div>
		<div class="container">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active in">
                    <div class="col-md-6">
    					<div class="form-group has-feedback">
    						<label>@lang("msg.First Aid Given")?</label>
                            <select class="form-control" name="first_aid" id="first_aid" required>
                                <option value="">@lang("msg.Choose An Option")</option>
                                <option value="yes">@lang("msg.Yes")</option>
                                <option value="no">@lang("msg.No")</option>
                            </select>
    					</div>
    				</div>
                </div>
            </div>
        </div>
		<div class="container">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active in">
                    <div class="col-md-6">
    					<div class="form-group has-feedback">
    						<label>@lang("msg.Was Abuse Ruled Out")?</label>
                            <select class="form-control" name="rulled_out" id="rulled_out" onchange = "ShowRulledOut()" required>
                                <option value="">@lang("msg.Choose An Option")</option>
                                <option value="yes">@lang("msg.Yes")</option>
                                <option value="no">@lang("msg.No")</option>
                            </select>
    					</div>
                        <div id="rulled_txt" style="display: none">
    						<div class="form-group has-feedback">
    							<label>@lang("msg.How")?</label><br/>
    							<textarea class="form-control" name="rulled_how" type="text" rows="3"></textarea>
    						</div>
    					</div>
    				</div>
                    <div class="col-md-6">
                        <label>@lang("msg.Was APS Notified")</label>
                        <select class="form-control" name="aps_notified" required>
                            <option value="">@lang("msg.Choose An Option")</option>
                            <option value="yes">@lang("msg.Yes")</option>
                            <option value="no">@lang("msg.No")</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
		<div class="container">
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
					<div class="col-md-6">										
						<div class="form-group has-feedback">
							<label>@lang("msg.Action Taken & CP Updated")</label><br/>
							<select name="action_taken" id="action_taken" class="form-control" onchange = "ShowotherActiontaken()" style="width:100%; height: 34px;" required >
								<option value="">Choose An Option</option>
								@foreach ($action_takens as $action_taken)
								<option value="{{ $action_taken->action_taken}}">{{ $action_taken->action_taken }}</option>
								@endforeach
								<option value="non_action">@lang("msg.Non Action")</option>
							</select>
						</div>
						<div id="nonActionShow" style="display: none">
							<div class="form-group has-feedback">
								<label>@lang("msg.No Need Reason")</label><br/>
								<input type="text" class="form-control" name="no_action_reason" />
							</div>
						</div>
						<div class="form-group has-feedback">
							<label>@lang("msg.Action Taken & CP Updated")</label><br/>
							<select name="cp_update" id="cp_update" class="form-control" onchange = "Showothercp()" style="width:100%; height: 34px;" required >
								<option value="">@lang("msg.Choose An Option")</option>
								@foreach ($cp_updates as $cp_update)
								<option value="{{ $cp_update->cp}}">{{ $cp_update->cp }}</option>
								@endforeach
								<option value="specify_others">Others</option>
							</select>
						</div>
						<div id="othercpShow" style="display: none">
							<div class="form-group has-feedback">
								<label>@lang("msg.Specify Other")</label><br/>
								<input type="text" class="form-control" name="other_cp" />
							</div>
						</div>
					</div>
					<div class="col-md-6">	
						<div class="form-group has-feedback">
							<label>@lang("msg.Staff Member")</label><br/>
							<input type="text" class="form-control" name="action_taken_nurse" />
						</div>
						<div class="form-group has-feedback">
							<label>@lang("msg.Staff Member")</label><br/>
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
								<span class="label-text">@lang("msg.Hospital Transfer")</span>
							</label>
						</div>
					</div>								
					<div class="col-md-3">
						<div class="form-check">
							<label>
								<input type="checkbox" id="check_notice1" name="check_notice1"> 
								<span class="label-text">@lang("msg.Family Notified")</span>
							</label>
						</div>
					</div>								
					<div class="col-md-3">
						<div class="form-check">
							<label>
								<input type="checkbox" id="check_notice2" name="check_notice2"> <span class="label-text">@lang("msg.Physician Notified")</span>
							</label>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-check">
							<label>
								<input type="checkbox" id="check_notice3" name="check_notice3"> <span class="label-text">@lang("msg.Care Plan")</span>
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
								<input type="checkbox" id="check_notice4" name="check_notice4"> <span class="label-text">@lang("msg.24hr Report")</span>
							</label>
						</div>
					</div>								
					<div class="col-md-3">
						<div class="form-check">
							<label>
								<input type="checkbox" id="check_notice5" name="check_notice5"> <span class="label-text">@lang("msg.Alert Charting")</span>
							</label>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-check">
							<label>
								<input type="checkbox" id="check_notice6" name="check_notice6"> <span class="label-text">@lang("msg.Skin Sheets If Needed")</span>
							</label>
						</div>
					</div>								
					<div class="col-md-3">
						<div class="form-check">
							<label>
								<input type="checkbox" id="check_notice7" name="check_notice7"> <span class="label-text">@lang("msg.Neuro Check Flow Sheet")</span>
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
						<p class="text-danger text-center"><b style="font-size:17px">@lang("msg.Nursing Fall Investigation Information")</b></p>
						
						<p class="text-success text-center"><b>@lang("msg.Please Complete The Following If The Resident Incident Was A Fall")</b></p>
						<div style="border-bottom:1px solid #ccc; margin-right:278px; margin-left:270px"></div> <br/>
						<div class="col-md-6">
							<div class="form-group has-feedback">
								<label>@lang("msg.Time Of Fallen")</label>
								<div class='input-group date' id='datetimepicker3'>
									<input type="text" name="fall_time"  class="form-control timepicker" />
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-time"></span>
									</span>
								</div>
							</div>
							<div class="form-group has-feedback">
								<label>@lang("msg.Where/How Found")</label>
								<input type="text" class="form-control" name="where_found" />
							</div>
							<div class="col-md-3" style="padding-left:0">
								<div class="form-group has-feedback">
									<label>@lang("msg.B/P Lying")</label><br/>
									<input type="text" class="form-control" name="bp_lying" />
								</div>
							</div>
							<div class="col-md-3" style="padding-left:0">
								<div class="form-group has-feedback">
									<label>@lang("msg.B/P Sitting")</label><br/>
									<input type="text" class="form-control" name="bp_sitting" />
								</div>
							</div>
							<div class="col-md-3" style="padding-left:0">
								<div class="form-group has-feedback">
									<label>@lang("msg.Pulse")</label><br/>
									<input type="text" class="form-control" name="puls" />
								</div>
							</div>
							<div class="col-md-3" style="padding-right:0; padding-left:0">
								<div class="form-group has-feedback">
									<label>@lang("msg.Resp")</label><br/>
									<input type="text" class="form-control" name="resp" />
								</div>
							</div>
							<div class="col-md-6" style="padding-left:0">
								<div class="form-group has-feedback">
									<label>@lang("msg.Diabetic")</label><br/>
									<select name="diabetic" id="diabetic" class="form-control" onchange = "Showbloodsuger()"  >
										<option value="">@lang("msg.Choose An Option")</option>
										<option value="Yes">@lang("msg.Yes")</option>
										<option value="No">@lang("msg.No")</option>
									</select>
								</div>
							</div>
							<div class="col-md-6" id="sugerShow" style="display: none">
								<div class="form-group has-feedback">
									<label>@lang("msg.Blood Sugar")</label><br/>
									<input type="text" class="form-control" name="blood_suger"  />
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>@lang("msg.Shoes")</label>
								<select name="incontinence" class="form-control" >
									<option value="">@lang("msg.Choose An Option")</option>
									<option value="ON">@lang("msg.On")</option>
									<option value="OFF">@lang("msg.Off")</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>@lang("msg.Socks")</label>
								<select name="use_of_wc" class="form-control" >
									<option value="">@lang("msg.Choose An Option")</option>
									<option value="ON">@lang("msg.On")</option>
									<option value="OFF">@lang("msg.Off")</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group has-feedback">
								<label>@lang("msg.Activity At Time Of Fall")</label>
								<input type="text" name="fall_activity" class="form-control" />
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>@lang("msg.Resident Used Call Light")</label>
								<select name="use_of_call_light" class="form-control" >
									<option value="">@lang("msg.Choose An Option")</option>
									<option value="YES">@lang("msg.Yes")</option>
									<option value="NO">@lang("msg.No")</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>@lang("msg.Call Light Within Reach")</label>
								<select name="call_light_within_use" class="form-control">
									<option value="">@lang("msg.Choose An Option")</option>
									<option value="YES">@lang("msg.Yes")</option>
									<option value="NO">@lang("msg.No")</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group has-feedback">
								<label>@lang("msg.Bedrail Position")</label>
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
								<label>@lang("msg.Incontinence")</label>
								<select name="incontinence" class="form-control" >
									<option value="">@lang("msg.Choose An Option")</option>
									<option value="Yes">@lang("msg.Yes")</option>
									<option value="No">@lang("msg.No")</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>@lang("msg.Use Of W/C")</label>
								<select name="use_of_wc" class="form-control" >
									<option value="">@lang("msg.Choose An Option")</option>
									<option value="Yes">@lang("msg.Yes")</option>
									<option value="No">@lang("msg.No")</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>@lang("msg.Brakes On W/C")</label>
								<select name="brakes_on_wc" class="form-control" >
									<option value="">@lang("msg.Choose An Option")</option>
									<option value="ON">@lang("msg.On")</option>
									<option value="OFF">@lang("msg.Off")</option>
									<option value="NA">@lang("msg.NA")</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>@lang("msg.Ambulatory")</label>
								<select name="ambulatory" class="form-control">
									<option value="">@lang("msg.Choose An Option")</option>
									<option value="Yes">@lang("msg.Yes")</option>
									<option value="No">@lang("msg.No")</option>
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
								<label>@lang("msg.Last Meal Time")</label>
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
								<label>@lang("msg.Type & Location Of Assist Device")</label>
								<input type="text" name="type_of_location_of_assist_device" class="form-control" />
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group has-feedback">
								<label>@lang("msg.Alarm(Bed)")</label>
								<select name="alarm_bed" class="form-control">
									<option value="">@lang("msg.Select")</option>
									<option value="ON">@lang("msg.On")</option>
									<option value="OFF">@lang("msg.Off")</option>
									<option value="NA">@lang("msg.NA")</option>
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group has-feedback">
								<label>@lang("msg.Alarm(Chair)")</label>
								<select name="alarm_chair" class="form-control">
									<option value="">@lang("msg.Select")</option>
									<option value="ON">@lang("msg.On")</option>
									<option value="OFF">@lang("msg.Off")</option>
									<option value="NA">@lang("msg.NA")</option>
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group has-feedback">
								<label>@lang("msg.Alarm(Others)")</label>
								<select name="alarm_other" class="form-control">
									<option value="">@lang("msg.Select")</option>
									<option value="ON">@lang("msg.On")</option>
									<option value="OFF">@lang("msg.Off")</option>
									<option value="NA">@lang("msg.NA")</option>
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
								<label>@lang("msg.Glasses")</label>
								<select name="glasses" class="form-control">
									<option value="">@lang("msg.Choose An Option")</option>
									<option value="ON">@lang("msg.On")</option>
									<option value="OFF">@lang("msg.Off")</option>
									<option value="NA">@lang("msg.NA")</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>@lang("msg.Hearing Aids")</label>
								<select name="hearing_aide" class="form-control" >
									<option value="">@lang("msg.Choose An Option")</option>
									<option value="ON">@lang("msg.On")</option>
									<option value="OFF">@lang("msg.Off")</option>
									<option value="NA">@lang("msg.NA")</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group has-feedback">
								<label>@lang("msg.Resident Confused")</label>
								<select name="resident_confused" class="form-control" >
									<option value="">@lang("msg.Choose An Option")</option>
									<option value="Yes">@lang("msg.Yes")</option>
									<option value="No">@lang("msg.No")</option>
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
								<label>@lang("msg.Floor Clear")</label>
								<select name="floor_clear" class="form-control" >
									<option value="">@lang("msg.Choose An Option")</option>
									<option value="Yes">@lang("msg.Yes")</option>
									<option value="No">@lang("msg.No")</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>@lang("msg.Specifics")</label>
								<input type="text" name="floor_clear_specific" class="form-control" />
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>@lang("msg.Psychotropic Med")</label>
								<input type="text" name="psychotropic_med" class="form-control" />
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>@lang("msg.Psychotropic Med Time")</label>
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
								<label>@lang("msg.Lighting")</label>
								<select name="lighting" class="form-control" >
									<option value="">@lang("msg.Choose An Option")</option>
									<option value="Yes">@lang("msg.Yes")</option>
									<option value="No">@lang("msg.No")</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>@lang("msg.Others")</label>
								<input type="text" name="lighting_other" class="form-control" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group has-feedback">
								<label>@lang("msg.Bed Brakes")</label>
								<select name="bed_brakes" class="form-control" >
									<<option value="">@lang("msg.Choose An Option")</option>
									<option value="ON">@lang("msg.On")</option>
									<option value="OFF">@lang("msg.Off")</option>
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
								<label>@lang("msg.Last Time Toileted (If Applicable)")</label>
								<input type="text" name="last_toilet" class="form-control" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group has-feedback">
								<label>@lang("msg.Other Information")</label>
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
						<p class="text-danger text-center"><b style="font-size:17px">@lang("msg.Skin Tear / Bruise Investigation Information")</b></p>						
						<p class="text-success text-center"><b>@lang("msg.Please Complete The Following If The Resident Incident Was A Skin Tear Or A Bruise"):</b></p>
						<div style="border-bottom:1px solid #ccc; margin-right:278px; margin-left:270px"></div> <br/>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>@lang("msg.Environmental Issues")</label><br/>
								<select name="environmental_issues" id="environmental_issues" class="form-control" onchange = "ShowEnv()">
									<option value="">@lang("msg.Choose An Option")</option>
									<option value="Yes">@lang("msg.Yes")</option>
									<option value="No">@lang("msg.No")</option>
								</select>
							</div>
							<div id="envSpecify" class="form-group has-feedback" style="display: none">
								<label>@lang("msg.Specify")</label>
								<input type="text" name="environmental_issues_specify" class="form-control" />
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>@lang("msg.Resident Location When Found")</label><br/>
								<select name="resident_location_when_found" id="resident_location_when_found" class="form-control" onchange = "ShowLoc()">
									<option value="">@lang("msg.Choose An Option")</option>
									<option value="Bed">@lang("msg.Bed")</option>
									<option value="W/C">@lang("msg.W/C")</option>
									<option value="Others">@lang("msg.Others")</option>
								</select>
							</div>
							<!--<div id="locSpecify" class="form-group has-feedback" style="display: none">
								<label>Specify Others</label>
								<input type="text" name="resident_location_when_found_other" class="form-control" />
							</div>-->
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>@lang("msg.Visitor Prior 8 Hours")</label><br/>
								<select name="visitor_prior_8_hours" id="visitor_prior_8_hours" class="form-control" onchange = "ShowVisitor()">
									<option value="">@lang("msg.Choose An Option")</option>
									<option value="Yes">@lang("msg.Yes")</option>
									<option value="No">@lang("msg.No")</option>
								</select>
							</div>
							<div id="visitorSpecify" class="form-group has-feedback" style="display: none">
								<label>@lang("msg.Who")</label>
								<input type="text" name="visitor_prior_8_hours_who" class="form-control" />
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>@lang("msg.New Staff Assigned")</label><br/>
								<select name="new_staff_assigned" id="new_staff_assigned" class="form-control" onchange = "ShowStaff()">
									<option value="">@lang("msg.Choose An Option")</option>
									<option value="Yes">@lang("msg.Yes")</option>
									<option value="No">@lang("msg.No")</option>
								</select>
							</div>
							<div id="staffSpecify" class="form-group has-feedback" style="display: none">
								<label>@lang("msg.Name")</label>
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
								<label>@lang("msg.Behavior Issues Past 72 Hours")</label><br/>
								<select name="behavior_issues_past_72_hours" id="behavior_issues_past_72_hours" class="form-control" onchange = "ShowBehave()">
									<option value="">@lang("msg.Choose An Option")</option>
									<option value="Yes">@lang("msg.Yes")</option>
									<option value="No">@lang("msg.No")</option>
								</select>
							</div>
							<div id="behaveSpecify" class="form-group has-feedback" style="display: none">
								<label>@lang("msg.Specify")</label>
								<input type="text" name="behavior_issues_past_72_hours_yes" class="form-control" />
							</div>
						</div>
						<div class="col-md-3">
							<div id="locSpecify" class="form-group has-feedback">
								<label>@lang("msg.Bedrail Position")</label>
								<input type="text" name="bedrail_position_skin" class="form-control" />
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>@lang("msg.Resident Confused")</label><br/>
								<select name="resident_confused_skin" id="resident_confused_skin" class="form-control">
									<option value="">@lang("msg.Choose An Option")</option>
									<option value="Yes">@lang("msg.Yes")</option>
									<option value="No">@lang("msg.No")</option>
								</select>
							</div>							
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>@lang("msg.On Prednisone")</label><br/>
								<select name="on_prednisone" id="on_prednisone" class="form-control" >
									<option value="">@lang("msg.Choose An Option")</option>
									<option value="Yes">@lang("msg.Yes")</option>
									<option value="No">@lang("msg.No")</option>
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
								<label>@lang("msg.Equipment Issues")</label><br/>
								<select name="equipment_issues" id="equipment_issues" class="form-control" onchange = "ShowEquipment()">
									<option value="">@lang("msg.Choose An Option")</option>
									<option value="Yes">@lang("msg.Yes")</option>
									<option value="No">@lang("msg.No")</option>
								</select>
							</div>
							<div id="equipmentSpecify" class="form-group has-feedback" style="display: none">
								<label>@lang("msg.Specify")</label>
								<input type="text" name="equipment_issues_specify" class="form-control" />
							</div>
						</div>
						<div class="col-md-3">
							<div id="locSpecify" class="form-group has-feedback">
								<label>@lang("msg.Activity At Time Of Skin Tear")</label>
								<input type="text" name="activity_at_time_of_bruiseskin_tear" class="form-control" />
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>@lang("msg.Transfer From Bed Or Chair")?</label><br/>
								<select name="transfer_from_bed_or_chair" id="transfer_from_bed_or_chair" class="form-control">
									<option value="">@lang("msg.Choose An Option")</option>
									<option value="Yes">@lang("msg.Yes")</option>
									<option value="No">@lang("msg.No")</option>
								</select>
							</div>							
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>@lang("msg.Recent Fall Past 72 Hours")?</label><br/>
								<select name="recent_fall_past_72_hours_skin" id="recent_fall_past_72_hours_skin" class="form-control" >
									<option value="">@lang("msg.Choose An Option")</option>
									<option value="Yes">@lang("msg.Yes")</option>
									<option value="No">@lang("msg.No")</option>
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
								<label>@lang("msg.Seated Next To Another Res").</label><br/>
								<select name="seated_next_to" id="seated_next_to" class="form-control" onchange = "ShowSeated()">
									<option value="">@lang("msg.Choose An Option")</option>
									<option value="Yes">@lang("msg.Yes")</option>
									<option value="No">@lang("msg.No")</option>
								</select>
							</div>
							<div id="personSpecify" class="form-group has-feedback" style="display: none">
								<label>@lang("msg.Specify")</label>
								<input type="text" name="seated_next_to_person" class="form-control" />
							</div>
						</div>
						
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>@lang("msg.Ambulatory"):</label><br/>
								<select name="ambulatory_skin" id="ambulatory_skin" class="form-control">
									<option value="">@lang("msg.Choose An Option")</option>
									<option value="Yes">@lang("msg.Yes")</option>
									<option value="No">@lang("msg.No")</option>
								</select>
							</div>							
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>@lang("msg.On Coumadin")?</label><br/>
								<select name="on_coumadin" id="on_coumadin" class="form-control" >
									<option value="">@lang("msg.Choose An Option")</option>
									<option value="Yes">@lang("msg.Yes")</option>
									<option value="No">@lang("msg.No")</option>
								</select>
							</div>							
						</div>
						<div class="col-md-3">
							<div id="locSpecify" class="form-group has-feedback">
								<label>@lang("msg.Other Pertinent Info")</label>
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
								<span class="label-text">@lang("msg.Please Click Here If The Resident Has Been In Engaged In A Resident Altercation"):</span>
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
								<label>@lang("msg.Environmental Issues")</label><br/>
								<select name="behaviour_environmental_issues" id="behaviour_environmental_issues" class="form-control" onchange = "ShowBevEnv()">
									<option value="">@lang("msg.Choose An Option")</option>
									<option value="Yes">@lang("msg.Yes")</option>
									<option value="No">@lang("msg.No")</option>
								</select>
							</div>
							<div id="envbevSpecify" class="form-group has-feedback" style="display: none">
								<label>@lang("msg.Specify")</label>
								<input type="text" name="behaviour_environmental_issues_specify" class="form-control" />
							</div>
						</div>
						<div class="col-md-3">
							<div id="" class="form-group has-feedback">
								<label>@lang("msg.Assessed For Pain: Results")</label>
								<input type="text" name="assessed_for_pain" class="form-control" />
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group has-feedback">
								<label>@lang("msg.Medicated")?</label><br/>
								<select name="assessed_for_pain_medicated" id="assessed_for_pain_medicated" class="form-control" >
									<option value="">@lang("msg.Choose An Option")</option>
									<option value="Yes">@lang("msg.Yes")</option>
									<option value="No">@lang("msg.No")</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div id="" class="form-group has-feedback">
								<label>@lang("msg.Urine Dip Results (prn)")</label>
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
								<label>@lang("msg.Activity At Time Of Behavior")</label>
								<input type="text" name="activity_at_time_of_behavior" class="form-control" />
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group has-feedback">
								<label>@lang("msg.Unfamiliar Care Giver")?</label><br/>
								<select name="unfamiliar_care_giver" id="unfamiliar_care_giver" class="form-control" onchange = "ShowCareGiver()">
									<option value="">@lang("msg.Choose An Option")</option>
									<option value="Yes">@lang("msg.Yes")</option>
									<option value="No">@lang("msg.No")</option>
								</select>
							</div>
							<div id="caregivername" class="form-group has-feedback" style="display: none">
								<label>@lang("msg.Care Giver Name")</label>
								<input type="text" name="care_giver_name" class="form-control" />
							</div>
						</div>
						<div class="col-md-4">
							<div id="" class="form-group has-feedback">
								<label>@lang("msg.Other Pertinent Info")</label>
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
								<label>@lang("msg.Investigation/Follow-Up") </label>
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
					<div class="col-md-4">										
						<div class="form-group has-feedback">
							<label>@lang("msg.Assessment Required") ?*</label><br/>
							<select name="need_assessment" id="need_assessment" class="form-control" onchange = "ShowNeedAssessment()" style="width:100%; height: 34px;" required >
								<option value="">@lang("msg.Choose An Option")</option>
									<option value="Yes">@lang("msg.Yes")</option>
									<option value="No">@lang("msg.No")</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">										
						<div id="needAssessmentShow" style="display: none">
							<div class="form-group has-feedback">
								<label>@lang("msg.Assessment Date")</label><br/>
								<input type="text" class="form-control" name="next_assessment_date" id="next_assessment_date" />
								<script type="text/javascript"> $('#next_assessment_date').datepicker({format: 'yyyy/mm/dd'});</script>
							</div>
						</div>
					</div>
				</div>
			</div>			
		</div>
		<div class="container">
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
					<div class="col-md-6"></div>											
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
						
					<div class="form-group has-feedback">
						<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm" id="submit-button">@lang("msg.Submit")</button>
					</div>

					<div class="form-group has-feedback">
                        <a href="{{  url('dashboard') }}" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" id="cancel-button">@lang("msg.Cancel")</a>
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
