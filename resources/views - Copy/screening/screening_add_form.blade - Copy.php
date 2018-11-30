
@extends('layouts.app')

@section('htmlheader_title')
    Prospective Add
@endsection

@section('contentheader_title')
    
@endsection

@section('main-content')

<style>

/* Hiding the checkbox, but allowing it to be focused */
.badgebox
{
    opacity: 0;
}

.badgebox + .badge
{
    /* Move the check mark away when unchecked */
    text-indent: -999999px;
    /* Makes the badge's width stay the same checked and unchecked */
	width: 27px;
}

.badgebox:focus + .badge
{
    /* Set something to make the badge looks focused */
    /* This really depends on the application, in my case it was: */
    
    /* Adding a light border */
    box-shadow: inset 0px 0px 5px;
    /* Taking the difference out of the padding */
}

.badgebox:checked + .badge
{
    /* Move the check mark back when checked */
	text-indent: 0;
}

</style>

<script type="text/javascript">
    function ShowHideDiv() {
        var ms = document.getElementById("ms");
        var appointScedule = document.getElementById("appointScedule");
        appointScedule.style.display = ms.value == "Married" ? "block" : "none";
    }
	
	function ShowInsuranceDiv() {
        var personal_responcible = document.getElementById("personal_responcible");
        var financial_matter = document.getElementById("financial_matter");
        financial_matter.style.display = personal_responcible.value == "Others" ? "block" : "none";
		financial_matter1.style.display = personal_responcible.value == "Others" ? "block" : "none";
    }
</script>

<!--<div class="row">		
	<div class="col-md-12">-->
		<div class="box box-primary">
			
			<!--<div class="container">-->
				
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item active">
						<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">RESPONSIBLE PERSONAL</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">SIGNIFICANT PERSONAL</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">RESIDENT DETAILS</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="physician-tab" data-toggle="tab" href="#physician" role="tab" aria-controls="physician" aria-selected="physician">PRIMARY DOCTOR</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="dentist-tab" data-toggle="tab" href="#dentist" role="tab" aria-controls="dentist" aria-selected="dentist">PHARMACY</a>
					<li class="nav-item">
						<a class="nav-link" id="funeral-tab" data-toggle="tab" href="#funeral" role="tab" aria-controls="funeral" aria-selected="funeral">MEDICAL EQUIPMENT</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="mental-tab" data-toggle="tab" href="#mental" role="tab" aria-controls="mental" aria-selected="mental">MENTAL STATUS</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="bathing-tab" data-toggle="tab" href="#bathing" role="tab" aria-controls="bathing" aria-selected="bathing">BATHING</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="dressing-tab" data-toggle="tab" href="#dressing" role="tab" aria-controls="dressing" aria-selected="dressing">DRESSING</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="toileting-tab" data-toggle="tab" href="#toileting" role="tab" aria-controls="toileting" aria-selected="toileting">TOILETING</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="transfer-tab" data-toggle="tab" href="#transfer" role="tab" aria-controls="transfer" aria-selected="transfer">AMBULATION/TRANSFER</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="grooming-tab" data-toggle="tab" href="#grooming" role="tab" aria-controls="grooming" aria-selected="grooming">PERSONAL GROOMING/HYGIENE</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="feeding-tab" data-toggle="tab" href="#feeding" role="tab" aria-controls="feeding" aria-selected="feeding">FEEDING/NUTRITION</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="communucation-tab" data-toggle="tab" href="#communucation" role="tab" aria-controls="communucation" aria-selected="communucation">COMMUNICATION ABILITIES</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="night-tab" data-toggle="tab" href="#night" role="tab" aria-controls="night" aria-selected="night">NIGHT NEED</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="exiting-tab" data-toggle="tab" href="#exiting" role="tab" aria-controls="exiting" aria-selected="exiting">EMERGENCY EXITING</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="fuctioning-tab" data-toggle="tab" href="#fuctioning" role="tab" aria-controls="fuctioning" aria-selected="fuctioning">OVERALL LEVEL OF FUNCTIONING</a>
					</li>
				</ul>				
				<div class="tab-content" id="myTabContent">
					<!--<div class="container">-->
						
						<div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
							
							<form action="{{action('ScreeningController@add_responsible_person')}}" method="post" enctype="multipart/form-data>
								<input type="hidden" name="_method" value="PATCH">
								{{ csrf_field() }}
								<div class="col-md-4"><br/>
									<?php //$check = DB::table('personal_details')->where('pros_id', $id)->first(); 
										//if($check){
									?>
									<!--<div class="alert alert-danger"> DONE </div>-->
									<?php //} else { ?>				
									<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
									<div class="form-group has-feedback">
										<label>Name</label>
										<input type="text" class="form-control" placeholder="" name="responsible_person_responsible" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
									</div>
									
									<div class="form-group has-feedback">
										<label>Adderss 1</label>
										<input type="text" class="form-control" placeholder="" name="address1_responsible"/>									
									</div>
									<div class="form-group has-feedback">
										<label>Address 2</label>
										<input type="text" class="form-control" placeholder="" name="address2_responsible"/>
									</div>	
									<div class="form-group has-feedback">
										<label>City</label>
										<input type="text" class="form-control" placeholder="" name="city_responsible" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
									</div>
								</div>
								<div class="col-md-4"><br/>
									<div class="form-group has-feedback">
									<label>State</label>
										<select name="state_responsible" id="state_id" class="form-control" required >
											<option value="">Select State</option>
											<?php
												$states = DB::table('state')->get();							
												foreach ($states as $state)
												{ 
													?>
														<option value="{{ $state->state_name}}">{{ $state->state_name }}</option>
													<?php
												}														
											?>	
										</select>
									</div>
									<div class="form-group has-feedback">
										<label>Zip</label>
										<input type="number" class="form-control" placeholder="" name="zipcode_responsible" />									
									</div>
									<div class="form-group has-feedback">
										<label>Phone No</label>
										<input type="number" class="form-control" placeholder="" name="phone_responsible" />									
									</div>
									<div class="form-group has-feedback">
										<label>Email</label>
										<input type="email" class="form-control" name="email_responsible"/>						
									</div>									
									<div class="form-group has-feedback">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>										
									</div>							
								</div>
							</form>
							<?php //} ?>
						</div>					
						<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
							<<form action="{{action('ScreeningController@add_significant_person')}}" method="post" enctype="multipart/form-data>
								<input type="hidden" name="_method" value="PATCH">
								{{ csrf_field() }}
								<div class="col-md-4"><br/>
									<?php //$check = DB::table('personal_details')->where('pros_id', $id)->first(); 
										//if($check){
									?>
									<!--<div class="alert alert-danger"> DONE </div>-->
									<?php //} else { ?>				
									<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
									<div class="form-group has-feedback">
										<label>Name</label>
										<input type="text" class="form-control" placeholder="" name="other_significant_person_significant" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
									</div>
									
									<div class="form-group has-feedback">
										<label>Adderss 1</label>
										<input type="text" class="form-control" placeholder="" name="address1_significant"/>									
									</div>
									<div class="form-group has-feedback">
										<label>Address 2</label>
										<input type="text" class="form-control" placeholder="" name="address2_significant"/>
									</div>	
									<div class="form-group has-feedback">
										<label>City</label>
										<input type="text" class="form-control" placeholder="" name="city_significant" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
									</div>
								</div>
								<div class="col-md-4"><br/>
									<div class="form-group has-feedback">
									<label>State</label>
										<select name="state_significant" id="state_id" class="form-control" required >
											<option value="">Select State</option>
											<?php
												$states = DB::table('state')->get();							
												foreach ($states as $state)
												{ 
													?>
														<option value="{{ $state->state_name}}">{{ $state->state_name }}</option>
													<?php
												}														
											?>	
										</select>
									</div>
									<div class="form-group has-feedback">
										<label>Zip</label>
										<input type="number" class="form-control" placeholder="" name="zipcode_significant" />									
									</div>
									<div class="form-group has-feedback">
										<label>Phone No</label>
										<input type="number" class="form-control" placeholder="" name="phone_significant" />									
									</div>
									<div class="form-group has-feedback">
										<label>Email</label>
										<input type="email" class="form-control" name="email_significant"/>						
									</div>									
									<div class="form-group has-feedback">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>										
									</div>							
								</div>
							</form>
						</div>
						<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
							<form action="{{action('ScreeningController@add_resident_details')}}" method="post">
								<input type="hidden" name="_method" value="PATCH">
								{{ csrf_field() }}
								<div class="col-md-3"></div>
								<div class="col-md-3"><br/>	
									<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
									<div class="form-group has-feedback">
										<label>Height</label>
										<input type="text" class="form-control" placeholder="" name="height_resident" required />									
									</div>
									<div class="form-group has-feedback">
										<label> weight </label>
										<input type="number" class="form-control" placeholder="" name="weight_resident" required />									
									</div>
									<div class="form-group has-feedback">
										<label>social security </label>
										<input type="text" class="form-control" placeholder="" name="social_security_resident" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
									</div>
									<div class="form-group has-feedback">
										<label>medicare</label>
										<input type="text" class="form-control" placeholder="" name="medicare_resident" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
									</div>
									<div class="form-group has-feedback">
										<label> va</label>
										<input type="text" class="form-control" placeholder="" name="va_resident" />									
									</div>
									<div class="form-group has-feedback">
										<label>other insurance name</label>
										<input type="text" class="form-control" placeholder="" name="other_insurance_name_resident" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
									</div>									
									<div class="form-group has-feedback">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>										
									</div>
								</div>
							</form>
						</div>
						<div class="tab-pane fade" id="physician" role="tabpanel" aria-labelledby="physician-tab">
							<form action="{{action('ScreeningController@add_primary_doctor')}}" method="post">
								<input type="hidden" name="_method" value="PATCH">
								{{ csrf_field() }}
								
								<div class="col-md-4"><br/>
									<?php //$check = DB::table('personal_details')->where('pros_id', $id)->first(); 
										//if($check){
									?>
									<!--<div class="alert alert-danger"> DONE </div>-->
									<?php //} else { ?>				
									<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
									<div class="form-group has-feedback">
										<label>primary DOCTOR</label>
										<input type="text" class="form-control" placeholder="" name="primary_doctor_primary" pattern="[A-Za-z\s]+" Title="Alphabate Character Only" required />									
									</div>
									
									<div class="form-group has-feedback">
										<label>Adderss 1</label>
										<input type="text" class="form-control" placeholder="" name="address1_primary" required />									
									</div>
									<div class="form-group has-feedback">
										<label>Address 2</label>
										<input type="text" class="form-control" placeholder="" name="address2_primary"/>
									</div>	
									<div class="form-group has-feedback">
										<label>City</label>
										<input type="text" class="form-control" placeholder="" name="city_primary" pattern="[A-Za-z\s]+" Title="Alphabate Character Only" required />									
									</div>
									<div class="form-group has-feedback">
									<label>State</label>
										<select name="state_primary" id="state_id" class="form-control" required >
											<option value="">Select State</option>
											<?php
												$states = DB::table('state')->get();							
												foreach ($states as $state)
												{ 
													?>
														<option value="{{ $state->state_name}}">{{ $state->state_name }}</option>
													<?php
												}														
											?>	
										</select>
									</div>
								</div>
								<div class="col-md-4"><br/>
									
									<div class="form-group has-feedback">
										<label>Zip</label>
										<input type="number" class="form-control" placeholder="" name="zipcode_primary" required />									
									</div>
									<div class="form-group has-feedback">
										<label>Phone No</label>
										<input type="number" class="form-control" placeholder="" name="phone_primary_doctor" required />									
									</div>
									<div class="form-group has-feedback">
										<label>medical diagnosis</label>
										<input type="text" class="form-control" name="medical_diagnosis"/>						
									</div>	
									<div class="form-group has-feedback">
										<label>OTHERS MEDICAL/PHYSICAL PROBLEMS </label>
										<input type="text" class="form-control" name="other_m_p_prob_primary" required />						
									</div><br/>
									<div class="form-group has-feedback">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>										
									</div>							
								</div>
							</form>
						</div>
						<div class="tab-pane fade" id="dentist" role="tabpanel" aria-labelledby="dentist-tab">
							<form action="{{action('ScreeningController@add_pharmacy')}}" method="post">
								<input type="hidden" name="_method" value="PATCH">
								{{ csrf_field() }}
								<div class="col-md-3"></div>
								<div class="col-md-4"><br/>
									<input type="text" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
									<div class="form-group has-feedback">
										<label>pharmacy</label>
										<input type="text" class="form-control" name="pharmacy" pattern="[A-Za-z\s]+" Title="Alphabate Character Only" />									
									</div>
									<div class="form-group has-feedback">
										<label>pharmacy Phone No </label>
										<input type="number" class="form-control" name="phone_pharmacy" />									
									</div>								
									<div class="form-group has-feedback">
										<label>mortuary</label>
										<input type="text" class="form-control" name="mortuary"/>									
									</div>
									<div class="form-group has-feedback">
										<label>mortuary phone</label>
										<input type="number" class="form-control" name="phone2_mortuary"/>
									</div>
									<div class="form-group has-feedback">
										<label>SPECIAL MEDICAL NEEDS </label>
										<input type="text" class="form-control" name="special_med_needs_pharmacy" />									
									</div>
									<div class="form-group has-feedback">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>										
									</div>									
								</div>
							</form>
						</div>
						<div class="tab-pane fade" id="funeral" role="tabpanel" aria-labelledby="funeral-tab">
							<form action="{{action('ScreeningController@add_equipment')}}" method="post">
								<input type="hidden" name="_method" value="PATCH">
								{{ csrf_field() }}
								<div class="col-md-9"><br/>
									<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
									<div class="form-group">
										<label class="col-sm-2 control-label" for="contactName"><small>INCONTINENCY SUPPLIES/TYPE <span class="star"></span></small></label>
										<div class="col-sm-4">
											<input type="text" name="inconsistency_supplies_type" id="" value="" class="form-control input-sm">
										</div>
											<label class="col-sm-2 control-label" for="contactName"><small>PRESSURE RELIEF DEVICES TYPE <span class="star"></span></small></label>
										<div class="col-sm-4">
											<input type="text" name="pressure_relief_dev_type" id="" value="" class="form-control input-sm">
										</div>
									</div><br/>
									<div class="form-group">
										<label for="bed_pan_medical" class="btn btn-info">BED PAN<input type="checkbox" id="bed_pan_medical" name="bed_pan_medical" class="badgebox"><span class="badge">&check;</span></label>
										<label for="comode_medical" class="btn btn-info">COMODE <input type="checkbox" id="comode_medical" name="comode_medical" class="badgebox"><span class="badge">&check;</span></label>
										<label for="urinal_medical" class="btn btn-info">URINAL <input type="checkbox" id="urinal_medical" name="urinal_medical" class="badgebox"><span class="badge">&check;</span></label>
										<label for="crutches_medical" class="btn btn-info">CRUTCHES<input type="checkbox" id="crutches_medical" name="crutches_medical" class="badgebox"><span class="badge">&check;</span></label>										
									</div>
									<div class="form-group">
										<label for="walker_medical" class="btn btn-info">WALKER<input type="checkbox" id="walker_medical" name="walker_medical" class="badgebox"><span class="badge">&check;</span></label>
										<label for="wheelchair_medical" class="btn btn-info">WHEELCHAIR  <input type="checkbox" id="wheelchair_medical" name="wheelchair_medical" class="badgebox"><span class="badge">&check;</span></label>
										<label for="cane_medical" class="btn btn-info">CANE<input type="checkbox" id="cane_medical" name="cane_medical" class="badgebox"><span class="badge">&check;</span></label>
										<label for="hospital_beds_medical" class="btn btn-info">HOSPITAL BED<input type="checkbox" id="hospital_beds_medical" name="hospital_beds_medical" class="badgebox"><span class="badge">&check;</span></label>										
									</div>
									<div class="form-group">
										<label for="trapeze_medical" class="btn btn-info">TRAPEZE<input type="checkbox" id="trapeze_medical" name="trapeze_medical" class="badgebox"><span class="badge">&check;</span></label>
										<label for="oxygen_medical" class="btn btn-info">OXYGEN<input type="checkbox" id="oxygen_medical" name="oxygen_medical" class="badgebox"><span class="badge">&check;</span></label>
										<label for="protective_pads_medical" class="btn btn-info">PROTECTIVE PADS <input type="checkbox" id="protective_pads_medical" name="protective_pads_medical" class="badgebox"><span class="badge">&check;</span></label>
										<label>OTHER
											<input type="text" id="protective_pads_medical" name="protective_pads_medical" class="form-control">
										</label>																			
									</div>									
									<div class="form-group">
										<button type="submit" class="btn btn-primary">Submit</button>										
									</div>		
								</div>
							</form>
						</div>
						<div class="tab-pane fade" id="mental" role="tabpanel" aria-labelledby="mental-tab">
							<form action="{{action('ScreeningController@add_mental_status')}}" method="post">
								<input type="hidden" name="_method" value="PATCH">
								{{ csrf_field() }}
								<div class="col-md-3"><br/>
									<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
									<div class="form-group has-feedback">
										<label>ORIENTED </label>
										<select name="oriented" id="oriented" class="form-control" required >
											<option value="">Choose an Option</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label>ORIENTED Notes </label>
										<textarea class="form-control" name="oriented_note" type="text" rows="3"></textarea>
									</div>
									<div class="form-group has-feedback">
										<label>WANDERS  </label>
										<select name="wanders" id="wanders" class="form-control" required >
											<option value="">Choose an Option</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label>WANDERS Notes </label>
										<textarea class="form-control" name="wanders_note" type="text" rows="3"></textarea>
									</div>									
								</div>
								<div class="col-md-3"><br/>
									<div class="form-group has-feedback">
										<label>HISTORY OF MENTAL ILLNESS </label>
										<select name="history_mental_ill" id="history_mental_ill" class="form-control" required >
											<option value="">Choose an Option</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label> Notes </label>
										<textarea class="form-control" name="history_mental_ill_note" type="text" rows="3"></textarea>
									</div>
									<div class="form-group has-feedback">
										<label>MEMORY LAPSES </label>
										<select name="memory_lapses" id="memory_lapses" class="form-control" required >
											<option value="">Choose an Option</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label>Notes </label>
										<textarea class="form-control" name="memory_lapses_note" type="text" rows="3"></textarea>
									</div>									
								</div>
								<div class="col-md-3"><br/>
									<div class="form-group has-feedback">
										<label>DANGER TO SELF/OTHER</label>
										<select name="danger_to_s_o" id="danger_to_s_o" class="form-control" required >
											<option value="">Choose an Option</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label> Notes </label>
										<textarea class="form-control" name="danger_to_s_o_note" type="text" rows="3"></textarea>
									</div>
									<div class="form-group has-feedback">
										<label>BEHAVIORS </label>
										<select name="behaviors" id="behaviors" class="form-control" required >
											<option value="">Choose an Option</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label>Notes </label>
										<textarea class="form-control" name="behaviors_note" type="text" rows="3"></textarea>
									</div>
									<div class="form-group has-feedback">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>										
									</div>
								</div>
							</form>
						</div>
						<div class="tab-pane fade" id="bathing" role="tabpanel" aria-labelledby="bathing-tab">
							<form action="{{action('ScreeningController@add_bathing')}}" method="post">
								<input type="hidden" name="_method" value="PATCH">
								{{ csrf_field() }}
								<div class="col-md-3"></div>
								<div class="col-md-3"><br/>
									<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
									<div class="form-group has-feedback">
										<label>NEED ASSISTANCE </label>
										<select name="need_assist" id="need_assist" class="form-control" required >
											<option value="">Choose an Option</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label>Notes </label>
										<textarea class="form-control" name="need_assist_note" type="text" rows="3"></textarea>
									</div>
									<div class="form-group has-feedback">
										<label>SPECIAL EQUIPMENT</label>
										<select name="spec_equip" id="spec_equip" class="form-control" required >
											<option value="">Choose an Option</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label>Notes </label>
										<textarea class="form-control" name="spec_equip_note" type="text" rows="3"></textarea>
									</div>
									<div class="form-group has-feedback">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>										
									</div>
								</div>
							</form>
						</div>
						<div class="tab-pane fade" id="dressing" role="tabpanel" aria-labelledby="dressing-tab">
							<form action="{{action('ScreeningController@add_dressing')}}" method="post">
								<input type="hidden" name="_method" value="PATCH">
								{{ csrf_field() }}
								<div class="col-md-3"></div>
								<div class="col-md-3"><br/>
									<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
									<div class="form-group has-feedback">
										<label>CHOOSE OWN CLOTHES</label>
										<select name="choose_own_clothes" id="choose_own_clothes" class="form-control" required >
											<option value="">Choose an Option</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label>Notes </label>
										<textarea class="form-control" name="choose_own_clothes_note" type="text" rows="3"></textarea>
									</div>
									<div class="form-group has-feedback">
										<label>NEED ASSISTANCE</label>
										<select name="need_assist_dressing" id="need_assist_dressing" class="form-control" required >
											<option value="">Choose an Option</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label>Notes </label>
										<textarea class="form-control" name="need_assist_dressing_note" type="text" rows="3"></textarea>
									</div>
									<div class="form-group has-feedback">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>										
									</div>
								</div>
							</form>
						</div>
						<div class="tab-pane fade" id="toileting" role="tabpanel" aria-labelledby="toileting-tab">
							<form action="{{action('ScreeningController@add_toileting')}}" method="post">
								<input type="hidden" name="_method" value="PATCH">
								{{ csrf_field() }}
								<div class="col-md-3"><br/>
									<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
									<div class="form-group has-feedback">
										<label>PHYSICAL ASSISTANCE  </label>
										<select name="physical_assist" id="physical_assist" class="form-control" required >
											<option value="">Choose an Option</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label>Notes </label>
										<textarea class="form-control" name="physical_assist_note" type="text" rows="3"></textarea>
									</div>																	
								</div>
								<div class="col-md-3"><br/>
									<div class="form-group has-feedback">
										<label>INCONTINENCE SUPPLIES</label>
										<select name="incont_supplies" id="incont_supplies" class="form-control" required >
											<option value="">Choose an Option</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label> Notes </label>
										<textarea class="form-control" name="incont_supplies_note" type="text" rows="3"></textarea>
									</div>																		
								</div>
								<div class="col-md-3"><br/>
									<div class="form-group has-feedback">
										<label>AGREE TO WEAR</label>
										<select name="agree_to_wear" id="agree_to_wear" class="form-control" required >
											<option value="">Choose an Option</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label> Notes </label>
										<textarea class="form-control" name="agree_to_wear_note" type="text" rows="3"></textarea>
									</div>									
									<div class="form-group has-feedback">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>										
									</div>
								</div>
							</form>
						</div>
						<div class="tab-pane fade" id="transfer" role="tabpanel" aria-labelledby="transfer-tab">
							<form action="{{action('ScreeningController@add_transfer')}}" method="post">
								<input type="hidden" name="_method" value="PATCH">
								{{ csrf_field() }}
								<div class="col-md-3"><br/>
									<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
									<div class="form-group has-feedback">
										<label>TIRED EASY</label>
										<select name="tired_easy" id="tired_easy" class="form-control" required >
											<option value="">Choose an Option</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label>Notes </label>
										<textarea class="form-control" name="tired_easy_note" type="text" rows="3"></textarea>
									</div>	
									<div class="form-group has-feedback">
										<label>WALKING</label>
										<select name="need_assist_ambu" id="need_assist_ambu" class="form-control" required >
											<option value="">Choose an Option</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label>Notes </label>
										<textarea class="form-control" name="need_assist_ambu_note" type="text" rows="3"></textarea>
									</div>
								</div>
								<div class="col-md-3"><br/>
									<div class="form-group has-feedback">
										<label>NEED ASSISTANCE</label>
										<select name="walking_ambu" id="walking_ambu" class="form-control" required >
											<option value="">Choose an Option</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label> Notes </label>
										<textarea class="form-control" name="walking_ambu_note" type="text" rows="3"></textarea>
									</div>
									<div class="form-group has-feedback">
										<label>TRANSFERS</label>
										<select name="transfers_ambu" id="transfers_ambu" class="form-control" required >
											<option value="">Choose an Option</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label> Notes </label>
										<textarea class="form-control" name="transfers_ambu_note" type="text" rows="3"></textarea>
									</div>
									<div class="form-group has-feedback">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>										
									</div>
								</div>				
							</form>
						</div>
						<div class="tab-pane fade" id="grooming" role="tabpanel" aria-labelledby="grooming-tab">
							<form action="{{action('ScreeningController@add_grooming')}}" method="post">
								<input type="hidden" name="_method" value="PATCH">
								{{ csrf_field() }}
								<div class="col-md-3"><br/>
									<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
									<div class="form-group has-feedback">
										<label>AWARE OF NEEDS</label>
										<select name="aware_of_needs" id="aware_of_needs" class="form-control" required >
											<option value="">Choose an Option</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label>Notes </label>
										<textarea class="form-control" name="aware_of_needs_note" type="text" rows="3"></textarea>
									</div>																	
								</div>
								<div class="col-md-3"><br/>
									<div class="form-group has-feedback">
										<label>NEED ASSISTANCE</label>
										<select name="need_assist_groom" id="need_assist_groom" class="form-control" required >
											<option value="">Choose an Option</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label> Notes </label>
										<textarea class="form-control" name="need_assist_groom_note" type="text" rows="3"></textarea>
									</div>																		
								</div>
								<div class="col-md-3"><br/>
									<div class="form-group has-feedback">
										<label>SPECIAL EQUIPMENT</label>
										<select name="special_equip_groom" id="special_equip_groom" class="form-control" required >
											<option value="">Choose an Option</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label> Notes </label>
										<textarea class="form-control" name="special_equip_groom_note" type="text" rows="3"></textarea>
									</div>									
									<div class="form-group has-feedback">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>										
									</div>
								</div>									
							</form>
						</div>
						<div class="tab-pane fade" id="feeding" role="tabpanel" aria-labelledby="feeding-tab">
							<form action="{{action('ScreeningController@add_feeding')}}" method="post">
								<input type="hidden" name="_method" value="PATCH">
								{{ csrf_field() }}
								<div class="col-md-3"><br/>
									<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
									<div class="form-group has-feedback">
										<label>FEED SELF</label>
										<select name="feed_self" id="feed_self" class="form-control" required >
											<option value="">Choose an Option</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label>Notes </label>
										<textarea class="form-control" name="feed_self_note" type="text" rows="3"></textarea>
									</div>	
									<div class="form-group has-feedback">
										<label>ALLERGIES</label>
										<select name="allergies_feeding" id="allergies_feeding" class="form-control" required >
											<option value="">Choose an Option</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label>Notes </label>
										<textarea class="form-control" name="allergies_feeding_note" type="text" rows="3"></textarea>
									</div>
								</div>
								<div class="col-md-3"><br/>
									<div class="form-group has-feedback">
										<label>SPECIAL EQUIPMENT</label>
										<select name="spec_equip_feeding" id="spec_equip_feeding" class="form-control" required >
											<option value="">Choose an Option</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label> Notes </label>
										<textarea class="form-control" name="spec_equip_feeding_note" type="text" rows="3"></textarea>
									</div>	
									<div class="form-group has-feedback">
										<label>LIMITATION</label>
										<select name="limitation_feeding" id="limitation_feeding" class="form-control" required >
											<option value="">Choose an Option</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label> Notes </label>
										<textarea class="form-control" name="limitation_feeding_note" type="text" rows="3"></textarea>
									</div>
								</div>
								<div class="col-md-3"><br/>
									<div class="form-group has-feedback">
										<label>SPECIAL DIET </label>
										<select name="special_diet" id="special_diet" class="form-control" required >
											<option value="">Choose an Option</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label> Notes </label>
										<textarea class="form-control" name="special_diet_note" type="text" rows="3"></textarea>
									</div>	
									<div class="form-group has-feedback">
										<label>GOOD APPETITE </label>
										<select name="good_appetite" id="good_appetite" class="form-control" required >
											<option value="">Choose an Option</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label> Notes </label>
										<textarea class="form-control" name="good_appetite_note" type="text" rows="3"></textarea>
									</div>
									<div class="form-group has-feedback">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>										
									</div>
								</div>									
							</form>
						</div>
						<div class="tab-pane fade" id="communucation" role="tabpanel" aria-labelledby="communucation-tab">
							<form action="{{action('ScreeningController@add_communucation')}}" method="post">
								<input type="hidden" name="_method" value="PATCH">
								{{ csrf_field() }}
								<div class="col-md-3"><br/>
									<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
									<div class="form-group has-feedback">
										<label>SPEECH</label>
										<select name="speech_comm" id="speech_comm" class="form-control" required >
											<option value="">Choose an Option</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label>Notes </label>
										<textarea class="form-control" name="speech_comm_note" type="text" rows="3"></textarea>
									</div>																	
								</div>
								<div class="col-md-3"><br/>
									<div class="form-group has-feedback">
										<label>VISION</label>
										<select name="vision_comm" id="vision_comm" class="form-control" required >
											<option value="">Choose an Option</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label> Notes </label>
										<textarea class="form-control" name="vision_comm_note" type="text" rows="3"></textarea>
									</div>																		
								</div>
								<div class="col-md-3"><br/>
									<div class="form-group has-feedback">
										<label>HEARING </label>
										<select name="hearing_comm" id="hearing_comm" class="form-control" required >
											<option value="">Choose an Option</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label> Notes </label>
										<textarea class="form-control" name="hearing_comm_note" type="text" rows="3"></textarea>
									</div>									
									<div class="form-group has-feedback">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>										
									</div>
								</div>									
							</form>
						</div>
						<div class="tab-pane fade" id="night" role="tabpanel" aria-labelledby="night-tab">
							<form action="{{action('ScreeningController@add_night_need')}}" method="post">
								<input type="hidden" name="_method" value="PATCH">
								{{ csrf_field() }}
								<div class="col-md-3"><br/>
									<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
									<div class="form-group has-feedback">
										<label>SLEEP WELL</label>
										<select name="sleep_well" id="sleep_well" class="form-control" required >
											<option value="">Choose an Option</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label>Notes </label>
										<textarea class="form-control" name="sleep_well_note" type="text" rows="3"></textarea>
									</div>																	
								</div>
								<div class="col-md-3"><br/>
									<div class="form-group has-feedback">
										<label>ASSISTANCE AT NIGHT</label>
										<select name="assist_at_night" id="assist_at_night" class="form-control" required >
											<option value="">Choose an Option</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label> Notes </label>
										<textarea class="form-control" name="assist_at_night_note" type="text" rows="3"></textarea>
									</div>									
									<div class="form-group has-feedback">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>										
									</div>
								</div>									
							</form>
						</div>
						<div class="tab-pane fade" id="exiting" role="tabpanel" aria-labelledby="exiting-tab">
							<form action="{{action('ScreeningController@add_exiting')}}" method="post">
								<input type="hidden" name="_method" value="PATCH">
								{{ csrf_field() }}
								<div class="col-md-3"><br/>
									<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
									<div class="form-group has-feedback">
										<label>NEED ASSISTANCE</label>
										<select name="need_assist_emer" id="need_assist_emer" class="form-control" required >
											<option value="">Choose an Option</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label>Notes </label>
										<textarea class="form-control" name="need_assist_emer_note" type="text" rows="3"></textarea>
									</div>																	
								</div>
								<div class="col-md-3"><br/>
									<div class="form-group has-feedback">
										<label>EQUIPMENT NEED</label>
										<select name="equip_need_emer" id="equip_need_emer" class="form-control" required >
											<option value="">Choose an Option</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label> Notes </label>
										<textarea class="form-control" name="equip_need_emer_note" type="text" rows="3"></textarea>
									</div>									
									
								</div>	
								<div class="col-md-3"><br/>
									<div class="form-group has-feedback">
										<label> ACTIVITY AND PREFERENCES </label>
										<textarea class="form-control" name="activity_pref_emer" type="text" rows="3"></textarea>
									</div>
									<div class="form-group has-feedback">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>										
									</div>
								</div>
							</form>
						</div>
						<div class="tab-pane fade" id="fuctioning" role="tabpanel" aria-labelledby="fuctioning-tab">
							<form action="{{action('ScreeningController@add_overall_fuctioning')}}" method="post">
								<input type="hidden" name="_method" value="PATCH">
								{{ csrf_field() }}
								<div class="col-md-3"></div>
								<div class="col-md-3"><br/>
									<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
									<div class="form-group has-feedback">
										<select name="level_ov" id="level_ov" class="form-control" required >
											<option value="INDEPENDENT [ Resident can manage ADL without assistance or reminding. ]">INDEPENDENT [ Resident can manage ADL without assistance or reminding. ]</option>
											<option value="ASSISTANCE [ Resident is able to help with the task but cannot do it entirely alone.]">ASSISTANCE [ Resident is able to help with the task but cannot do it entirely alone.]</option>
											<option value="DEPENDENT [ Resident cannot do any part of the task and it must be done entirely by other person.]">DEPENDENT [ Resident cannot do any part of the task and it must be done entirely by other person.]</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label>OTHER COMMENTS/NEEDS/CONCERNS</label>
										<input type="text" class="form-control" name="other_concerns" />									
									</div>
										
									<div class="form-group has-feedback">
										<label>PRELIMINARY ACCEPTABLE FOR TRANSFER INTO THIS FACILITY?</label>
										<select name="pre_acceptable" id="pre_acceptable" class="form-control" required >
											<option value="">Choose an Option</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label>Reason </label>
										<textarea class="form-control" name="reasons" type="text" rows="3"></textarea>
									</div>
									<div class="form-group has-feedback">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>										
									</div>
								</div>
							</form>
						</div>
					<!--</div>-->
				</div>
			<!--</div>-->
		<!--</div>-->	
	<!--</div>

</div>-->

@include('layouts.partials.scripts_auth')

@endsection
