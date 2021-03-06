
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
	.content-header
	{
		//display:none;
		padding: 2px 0px 1px 20px;
		margin-bottom: -18px;
	}
		
	.content {
		margin-top: 15px;
	}
	.form-control{
		//text-transform: uppercase;
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
<div class="box box-primary padding-bottom-25">
	<div class="container">
		<ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-left:-14px; margin-right:-14px; margin-top:1px">
			<li class="nav-item active">
				<a class="nav-link active" id="home-tab" data-toggle="tab" href="resposible_personal/{{ $id }}" role="tab" aria-controls="home" aria-selected="true">RESPONSIBLE PERSONAL</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="profile-tab" data-toggle="tab" href="significant_personal" role="tab" aria-controls="profile" aria-selected="false">SIGNIFICANT PERSONAL</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="contact-tab" data-toggle="tab" href="resident_details" role="tab" aria-controls="contact" aria-selected="false">RESIDENT DETAILS</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="physician-tab" data-toggle="tab" href="primary_doctor" role="tab" aria-controls="physician" aria-selected="physician">MEDICAL PROVIDER</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="dentist-tab" data-toggle="tab" href="pharmacy" role="tab" aria-controls="dentist" aria-selected="dentist">PHARMACY</a>
			<li class="nav-item">
				<a class="nav-link" id="funeral-tab" data-toggle="tab" href="" role="tab" aria-controls="funeral" aria-selected="funeral">MEDICAL EQUIPMENT</a>
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
		<div style="margin-top:35px"></div>					
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="box-body">						
							<form action="{{action('ScreeningController@add_responsible_person')}}" method="post" enctype="multipart/form-data">
								<input type="hidden" name="_method" value="PATCH">
								{{ csrf_field() }}
								<div class="col-md-6">
									<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
									<div class="form-group has-feedback">
									<label></label>
										<input type="text" class="form-control" placeholder="Name*" name="responsible_person_responsible" required pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
									</div>
									<div class="form-group has-feedback">
									<label></label>
										<input type="text" class="form-control" placeholder="Adderss 1*" name="address1_responsible" required />									
									</div>
											
									<div class="form-group has-feedback">
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
									<label></label>
										<input type="number" class="form-control" placeholder="Zip" name="zipcode_responsible" />									
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group has-feedback">
									<label></label>
										<input type="number" class="form-control" placeholder="Phone No*" name="phone_responsible" />									
									</div>
									<div class="form-group has-feedback">
									<label></label>
										<input type="text" class="form-control" placeholder="Address 2" name="address2_responsible"/>
									</div>
									<div class="form-group has-feedback">
										<input type="text" class="form-control" placeholder="City" name="city_responsible" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
									</div>
									<div class="form-group has-feedback">
									<label></label>
										<input type="email" class="form-control" placeholder="Email" name="email_responsible"/>						
									</div>									
									<div class="form-group has-feedback">
										<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">@lang("msg.Submit")</button>
									</div>
									<div class="form-group has-feedback">
										<button type="submit" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" onclick="history.back()" style="margin-right:15px">@lang("msg.Cancel")</button>
									</div>
									</br></br><br/>						
								</div>
							</form>
						</div>	
					</div>
				</div>
				<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="box-body">						
							<form action="{{action('ScreeningController@add_significant_person')}}" method="post" enctype="multipart/form-data">
								<input type="hidden" name="_method" value="PATCH">
								{{ csrf_field() }}
								<div class="col-md-6">											
									<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
									<div class="form-group has-feedback">
										<input type="text" class="form-control" placeholder="Name" name="other_significant_person_significant" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
									</div>
									<div class="form-group has-feedback">
										<input type="text" class="form-control" placeholder="Adderss 1" name="address1_significant"/>									
									</div>
									
									<div class="form-group has-feedback">
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
										<input type="email" class="form-control" placeholder="Email" name="email_significant"/>						
									</div>	
								</div>
								
								<div class="col-md-6">
									<div class="form-group has-feedback">
										<input type="number" class="form-control" placeholder="Phone No" name="phone_significant" />									
									</div>	
									<div class="form-group has-feedback">
										<input type="text" class="form-control" placeholder="Address 2" name="address2_significant"/>
									</div>
									<div class="form-group has-feedback">
										<input type="text" class="form-control" placeholder="City" name="city_significant" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
									</div>
									<div class="form-group has-feedback">
										<input type="number" class="form-control" placeholder="Zip" name="zipcode_significant" />									
									</div>
									<div class="form-group has-feedback">
										<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">@lang("msg.Submit")</button>
									</div>
									<div class="form-group has-feedback">
										<button type="submit" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" onclick="history.back()" style="margin-right:15px">@lang("msg.Cancel")</button>
									</div>
										</br></br><br/>							
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">						
					<div class="col-md-2"></div>
						<div class="col-md-8">
						<div class="box-body">
							<form action="{{action('ScreeningController@add_resident_details')}}" method="post">
								<input type="hidden" name="_method" value="PATCH">
								{{ csrf_field() }}									
								<div class="col-md-6">
									<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
									<div class="form-group has-feedback">
										<label></label>
										<select name="height_resident" id="height_resident"  class="form-control" required >
											<option value="">Select Height(feet inc)</option>
											<option value="4.0">4.0</option>
											<option value="4.1">4.1</option>
											<option value="4.2">4.2</option>
											<option value="4.3">4.3</option>
											<option value="4.4">4.4</option>
											<option value="4.5">4.5</option>
											<option value="4.6">4.6</option>
											<option value="4.7">4.7</option>
											<option value="4.8">4.8</option>
											<option value="4.9">4.9</option>
											<option value="4.10">4.10</option>
											<option value="4.11">4.11</option>
											<option value="5.0">5.0</option>
											<option value="5.1">5.1</option>
											<option value="5.2">5.2</option>
											<option value="5.3">5.3</option>
											<option value="5.4">5.4</option>
											<option value="5.5">5.5</option>
											<option value="5.6">5.6</option>
											<option value="5.7">5.7</option>
											<option value="5.8">5.8</option>
											<option value="5.9">5.9</option>
											<option value="5.10">5.10</option>
											<option value="5.11">5.11</option>
											<option value="6.0">6.0</option>
											<option value="6.1">6.1</option>
											<option value="6.2">6.2</option>
											<option value="6.3">6.3</option>
											<option value="6.4">6.4</option>
											<option value="6.5">6.5</option>
											<option value="6.6">6.6</option>
											<option value="6.7">6.7</option>
											<option value="6.8">6.8</option>
											<option value="6.9">6.9</option>
											<option value="6.10">6.10</option>
											<option value="6.11">6.11</option>
											<option value="7.0">7.0</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label></label>
										<select name="medicare_resident" id="medicare_resident" class="form-control" required >
											<option value="">Select Medicare</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label> </label>
										<input type="text" class="form-control" placeholder="Social Security" name="social_security_resident" required />									
									</div>
								</div>	
								<div class="col-md-6">
									<div class="form-group has-feedback">
										<label></label>
										<select name="weight_resident" id="weight_resident" class="form-control" required >
											<option value="">Select Weight(LB)</option>
											<?php for($i=60; $i<=300; $i++){?>
											<option value="<?php echo $i?>"><?php echo $i?></option>							
											<?php }?>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label></label>
										<select name="va_resident" id="va_resident" class="form-control" required >
											<option value="">Select VA</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label></label>
										<input type="text" class="form-control" placeholder="Other Insurance Name" name="other_insurance_name_resident" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
									</div>									
									<div class="form-group has-feedback">
										<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">@lang("msg.Submit")</button>
									</div>
									<div class="form-group has-feedback">
										<button type="submit" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" onclick="history.back()" style="margin-right:15px">@lang("msg.Cancel")</button>
									</div>
									</br></br><br/>	
								</div>
							</form>
						</div>
					</div>
					<!--<script type="text/javascript">
						//$(".myselect").select2();
					</script>-->
				</div>
				<div class="tab-pane fade" id="physician" role="tabpanel" aria-labelledby="physician-tab">
					<!--<div class="col-md-2"></div>-->
					<div class="col-md-12">
						<div class="box-body">
							<form action="{{action('ScreeningController@add_primary_doctor')}}" method="post">
								<input type="hidden" name="_method" value="PATCH">
								{{ csrf_field() }}
								<div class="col-md-4">													
									<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
									<div class="form-group has-feedback">
										<input type="text" class="form-control" placeholder="Primary Doctor" name="primary_doctor_primary" pattern="[A-Za-z\s]+" Title="Alphabate Character Only" required />									
									</div>										
									<div class="form-group has-feedback">
										<input type="text" class="form-control" placeholder="City" name="city_primary" pattern="[A-Za-z\s]+" Title="Alphabate Character Only" required />									
									</div>
									<div class="form-group has-feedback">
										<input type="number" class="form-control" placeholder="Phone No" name="phone_primary_doctor" required />									
									</div>
									<div class="form-group has-feedback">
										<input type="number" class="form-control" placeholder="Email" name="email_primary_doctor" required />									
									</div>
								</div>
								<div class="col-md-4"> 
									<div class="form-group has-feedback">
										<input type="text" class="form-control" placeholder="Adderss 1" name="address1_primary" required />									
									</div>										
									<div class="form-group has-feedback">
										<input type="number" class="form-control" placeholder="Zip" name="zipcode_primary" required />	
									</div>	
									<div class="form-group has-feedback">
										<input type="text" class="form-control" placeholder="Medical Diagnosis" name="medical_diagnosis"/>						
									</div>
									<div class="form-group has-feedback">
										<input type="text" class="form-control" placeholder="Fax" name="fax_primary_doctor"/>						
									</div>
								</div>									
								<div class="col-md-4">
									<div class="form-group has-feedback">
										<input type="text" class="form-control" placeholder="Address 2" name="address2_primary"/>
									</div>										
									<div class="form-group has-feedback">
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
									<div class="form-group has-feedback">
										<input type="text" class="form-control" placeholder="Other Medical/Physical Problems" name="other_m_p_prob_primary" required />						
									</div>
									<div class="form-group has-feedback">
										<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">@lang("msg.Submit")</button>
									</div>
									<div class="form-group has-feedback">
										<button type="submit" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" onclick="history.back()" style="margin-right:15px">@lang("msg.Cancel")</button>
									</div>
									</br></br><br/>							
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="dentist" role="tabpanel" aria-labelledby="dentist-tab">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="box-body">
							<form action="{{action('ScreeningController@add_pharmacy')}}" method="post">
								<input type="hidden" name="_method" value="PATCH">
								{{ csrf_field() }}								
								<div class="col-md-6">
									<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
									<div class="form-group has-feedback">
										<label></label>
										<input type="text" class="form-control" placeholder="Pharmacy" name="pharmacy" pattern="[A-Za-z\s]+" Title="Alphabate Character Only" />									
									</div>						
									<div class="form-group has-feedback">
										<label></label>
										<input type="text" class="form-control" placeholder="Mortuary" name="mortuary"/>									
									</div>	
									<div class="form-group has-feedback">
										<label> </label>
										<input type="text" class="form-control" placeholder="Special Medical Needs" name="special_med_needs_pharmacy" />									
									</div>
								</div>								
								<div class="col-md-6">
									<div class="form-group has-feedback">
										<label> </label>
										<input type="number" class="form-control" placeholder="Pharmacy Phone No" name="phone_pharmacy" />									
									</div>
									<div class="form-group has-feedback">
										<label></label>
										<input type="number" class="form-control" placeholder="Mortuary Phone" name="phone2_mortuary"/>
									</div>
									<div class="form-group has-feedback">
										<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">@lang("msg.Submit")</button>
									</div>
									<div class="form-group has-feedback">
										<button type="submit" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" onclick="history.back()" style="margin-right:15px">@lang("msg.Cancel")</button>
									</div>
								</br></br><br/>								
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="funeral" role="tabpanel" aria-labelledby="funeral-tab">
					<!--<div class="col-md-2"></div>-->
					<div class="col-md-12">
						<div class="box-body">
							<form action="{{action('ScreeningController@add_equipment')}}" method="post">
								<input type="hidden" name="_method" value="PATCH">
								{{ csrf_field() }}									
								<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
								<div class="col-md-6">
									<div class="form-group has-feedback">
										<input type="text" placeholder="incontinency Supplies/Type*" name="inconsistency_supplies_type" id="" value="" class="form-control">	
									</div>
								</div>									
								<div class="col-md-6">
									<div class="form-group has-feedback">
										<input type="text" placeholder="Pressure Relief Device Type*" name="pressure_relief_dev_type" id="" value="" class="form-control">	
									</div>
								</div>
								<div class="col-md-12">	 <br/>
									<div class="row">
										<div class="col-md-2">
											<div class="form-check">
												<label style="font-size: 2.5em">
													<input type="checkbox" name="bed_pan_medical" id="bed_pan_medical"> 
													<span class="label-text">BED PAN</span>
												</label>
											</div>
										</div>									
										<div class="col-md-2">
											<div class="form-check">
												<label>
													<input type="checkbox" id="comode_medical" name="comode_medical"> 
													<span class="label-text">COMODE</span>
												</label>
											</div>
										</div>									
										<div class="col-md-2">
											<div class="form-check">
												<label>
													<input type="checkbox" id="urinal_medical" name="urinal_medical"> <span class="label-text">URINAL</span>
												</label>
											</div>
										</div>									
										<div class="col-md-2">
											<div class="form-check">
												<label>
													<input type="checkbox" id="crutches_medical" name="crutches_medical"> <span class="label-text">CRUTCHES</span>
												</label>
											</div>
										</div>									
										<div class="col-md-2">
											<div class="form-check">
												<label>
													<input type="checkbox" id="walker_medical" name="walker_medical"> <span class="label-text">WALKER</span>
												</label>
											</div>
										</div>										
										<div class="col-md-2">
											<div class="form-check">
												<label>
													<input type="checkbox" id="wheelchair_medical" name="wheelchair_medical"> <span class="label-text">WHEELCHAIR</span>
												</label>
											</div>
										</div>										
									</div>
									<br/>
									<div class="row">										
										<div class="col-md-2">
											<div class="form-check">
												<label>
													<input type="checkbox" id="cane_medical" name="cane_medical"> <span class="label-text">CANE</span>
												</label>
											</div>
										</div>										
										<div class="col-md-2">
											<div class="form-check">
												<label>
													<input type="checkbox" id="hospital_beds_medical"> <span class="label-text">HOSPITAL BED</span>
												</label>
											</div>
										</div>										
										<div class="col-md-2">
											<div class="form-check">
												<label>
													<input type="checkbox" id="trapeze_medical" name="trapeze_medical"> <span class="label-text">TRAPEZE</span>
												</label>
											</div>
										</div>										
										<div class="col-md-2">
											<div class="form-check">
												<label>
												<input type="checkbox" id="oxygen_medical" name="oxygen_medical"> <span class="label-text">OXYGEN</span>
												</label>
											</div>
										</div>										
										<div class="col-md-4">
											<div class="form-check">
												<label>
													<input type="checkbox" id="protective_pads_medical"> <span class="label-text">PROTECTIVE PADS</span>
												</label>
											</div>
										</div>
										</div>
										<br/>
										<div class="row">
											<div class="col-md-4">
												<div class="form-check">
													<div class="col-md-2" style="padding-left:0; padding-right:0"><label style="margin-top:7px">Others: </label> </div>
													<div class="col-md-10" style="padding-left:7px"><input type="text" id="protective_pads_medical" name="protective_pads_medical" class="form-control"> </div>
												
												</div>
											</div>
											
											<!--<div class="form-group">
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
											</div> -->
											<!--<div class="form-group">
												<label for="trapeze_medical" class="btn btn-info">TRAPEZE<input type="checkbox" id="trapeze_medical" name="trapeze_medical" class="badgebox"><span class="badge">&check;</span></label>
												<label for="oxygen_medical" class="btn btn-info">OXYGEN<input type="checkbox" id="oxygen_medical" name="oxygen_medical" class="badgebox"><span class="badge">&check;</span></label>
												<label for="protective_pads_medical" class="btn btn-info">PROTECTIVE PADS <input type="checkbox" id="protective_pads_medical" name="protective_pads_medical" class="badgebox"><span class="badge">&check;</span></label>
												<label>OTHER
													<input type="text" id="protective_pads_medical" name="protective_pads_medical" class="form-control">
												</label>																			
											</div>									
											<div class="form-group">
												<button type="submit" class="btn btn-primary">Submit</button>										
											</div>	 -->	
										</div>
									</div>
									<div class="col-md-6"></div>
									<div class="col=md-6">
										<div class="form-group has-feedback">
											<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">@lang("msg.Submit")</button>
										</div>
										<div class="form-group has-feedback">
											<button type="submit" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" onclick="history.back()" style="margin-right:15px">@lang("msg.Cancel")</button>
										</div>
										<br/><br/>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="mental" role="tabpanel" aria-labelledby="mental-tab">					
						<div class="col-md-12">
							<div class="box-body">
								<form action="{{action('ScreeningController@add_mental_status')}}" method="post">
									<input type="hidden" name="_method" value="PATCH">
									{{ csrf_field() }}
									<div class="col-md-4">
										<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
										<div class="form-group has-feedback">
											<label> </label>
											<select name="oriented" id="oriented" class="form-control" required >
												<option value="">Oriented</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<label></label>
											<textarea class="form-control" placeholder="Oriented Notes" name="oriented_note" type="text" rows="3"></textarea>
										</div>
										<div class="form-group has-feedback">
											<label>  </label>
											<select name="wanders" id="wanders" class="form-control" required >
												<option value="">Wanders</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<label></label>
											<textarea class="form-control" placeholder="Wanders Notes" name="wanders_note" type="text" rows="3"></textarea>
										</div>									
									</div>
									<div class="col-md-4">
										<div class="form-group has-feedback">
											<label></label>
											<select name="history_mental_ill" id="history_mental_ill" class="form-control" required >
												<option value="">History of Mental Illness</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<label>  </label>
											<textarea class="form-control" placeholder="Mental Illness Notes" name="history_mental_ill_note" type="text" rows="3"></textarea>
										</div>
										<div class="form-group has-feedback">
											<label></label>
											<select name="memory_lapses" id="memory_lapses" class="form-control" required >
												<option value="">Memory Lapess</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<label> </label>
											<textarea class="form-control" placeholder="Memory Lapess Notes" name="memory_lapses_note" type="text" rows="3"></textarea>
										</div>									
									</div>
									<div class="col-md-4">
										<div class="form-group has-feedback">
											<label></label>
											<select name="danger_to_s_o" id="danger_to_s_o" class="form-control" required >
												<option value="">Danger To Self/Other</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<label>  </label>
											<textarea class="form-control" placeholder="Notes" name="danger_to_s_o_note" type="text" rows="3"></textarea>
										</div>
										<div class="form-group has-feedback">
											<label></label>
											<select name="behaviors" id="behaviors" class="form-control" required >
												<option value="">Behaviors</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<label></label>
											<textarea class="form-control" placeholder="Behaviors Notes" name="behaviors_note" type="text" rows="3"></textarea>
										</div>
										<div class="form-group has-feedback">
											<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">@lang("msg.Submit")</button>
										</div>
										<div class="form-group has-feedback">
											<button type="submit" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" onclick="history.back()" style="margin-right:15px">@lang("msg.Cancel")</button>
										</div>
										<br/><br/>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="bathing" role="tabpanel" aria-labelledby="bathing-tab">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="box-body">
								<form action="{{action('ScreeningController@add_bathing')}}" method="post">
									<input type="hidden" name="_method" value="PATCH">
									{{ csrf_field() }}									
									<div class="col-md-6">
										<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
										<div class="form-group has-feedback">
											<label></label>
											<select name="need_assist" id="need_assist" class="form-control" required >
												<option value="">Need Assistance</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<label> </label>
											<textarea class="form-control" placeholder="Notes" name="need_assist_note" type="text" rows="3"></textarea>
										</div>										
									</div>										
									<div class="col-md-6">
										<div class="form-group has-feedback">
											<label></label>
											<select name="spec_equip" id="spec_equip" class="form-control" required >
												<option value="">Special Equipment</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<label> </label>
											<textarea class="form-control" placeholder="Notes" name="spec_equip_note" type="text" rows="3"></textarea>
										</div>
										<div class="form-group has-feedback">
											<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">@lang("msg.Submit")</button>
										</div>
										<div class="form-group has-feedback">
											<button type="submit" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" onclick="history.back()" style="margin-right:15px">@lang("msg.Cancel")</button>
										</div>
										<br/><br/>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="dressing" role="tabpanel" aria-labelledby="dressing-tab">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="box-body">
								<form action="{{action('ScreeningController@add_dressing')}}" method="post">
									<input type="hidden" name="_method" value="PATCH">
									{{ csrf_field() }}
									
									<div class="col-md-6">
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
										</div>
										
										<div class="col-md-6">
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
											<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">@lang("msg.Submit")</button>
										</div>
										<div class="form-group has-feedback">
											<button type="submit" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" onclick="history.back()" style="margin-right:15px">@lang("msg.Cancel")</button>
										</div>
										<br/><br/>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="toileting" role="tabpanel" aria-labelledby="toileting-tab">
						<!--<div class="col-md-2"></div>-->
						<div class="col-md-12">
							<div class="box-body">
								<form action="{{action('ScreeningController@add_toileting')}}" method="post">
									<input type="hidden" name="_method" value="PATCH">
									{{ csrf_field() }}
									<div class="col-md-4">
										<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
										<div class="form-group has-feedback">
											<select name="physical_assist" id="physical_assist" class="form-control" required >
												<option value="">Physical Assistance</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<textarea class="form-control" placeholder="Notes" name="physical_assist_note" type="text" rows="3"></textarea>
										</div>																	
									</div>
									<div class="col-md-4">
										<div class="form-group has-feedback">
											<select name="incont_supplies" id="incont_supplies" class="form-control" required >
												<option value="">Incontinence Supplies</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<textarea class="form-control" placeholder="Notes" name="incont_supplies_note" type="text" rows="3"></textarea>
										</div>																		
									</div>
									<div class="col-md-4">
										<div class="form-group has-feedback">
											<select name="agree_to_wear" id="agree_to_wear" class="form-control" required >
												<option value=""><label>Agree to Wear</label></option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<textarea class="form-control" placeholder="Notes" name="agree_to_wear_note" type="text" rows="3"></textarea>
										</div>									
										<div class="form-group has-feedback">
											<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">@lang("msg.Submit")</button>
										</div>
										<div class="form-group has-feedback">
											<button type="submit" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" onclick="history.back()" style="margin-right:15px">@lang("msg.Cancel")</button>
										</div>
										<br/><br/>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="transfer" role="tabpanel" aria-labelledby="transfer-tab">
						<div class="col-md-12">
							<div class="box-body">
								<form action="{{action('ScreeningController@add_transfer')}}" method="post">
									<input type="hidden" name="_method" value="PATCH">
									{{ csrf_field() }}
									<div class="col-md-6">
										<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
										<div class="form-group has-feedback">
											<select name="tired_easy" id="tired_easy" class="form-control" required >
												<option value="">Tired Easy</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<textarea class="form-control" placeholder="Notes" name="tired_easy_note" type="text" rows="3"></textarea>
										</div>	
										<div class="form-group has-feedback">
											<select name="need_assist_ambu" id="need_assist_ambu" class="form-control" required >
												<option value="">Walking</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<textarea class="form-control" placeholder="Notes" name="need_assist_ambu_note" type="text" rows="3"></textarea>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group has-feedback">
											<select name="walking_ambu" id="walking_ambu" class="form-control" required >
												<option value="">Need Assistance</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<textarea class="form-control" placeholder="Notes" name="walking_ambu_note" type="text" rows="3"></textarea>
										</div>
										<div class="form-group has-feedback">
											<select name="transfers_ambu" id="transfers_ambu" class="form-control" required >
												<option value="">Transfer</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<textarea class="form-control" placeholder="Notes" name="transfers_ambu_note" type="text" rows="3"></textarea>
										</div>
										<div class="form-group has-feedback">
											<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">@lang("msg.Submit")</button>
										</div>
										<div class="form-group has-feedback">
											<button type="submit" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" onclick="history.back()" style="margin-right:15px">@lang("msg.Cancel")</button>
										</div>
										<br/><br/>
									</div>				
								</form>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="grooming" role="tabpanel" aria-labelledby="grooming-tab">
						<div class="col-md-12">
							<div class="box-body">
								<form action="{{action('ScreeningController@add_grooming')}}" method="post">
									<input type="hidden" name="_method" value="PATCH">
									{{ csrf_field() }}
									<div class="col-md-4">
										<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
										<div class="form-group has-feedback">
											<select name="aware_of_needs" id="aware_of_needs" class="form-control" required >
												<option value="">Aware of Need</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<textarea class="form-control" placeholder="Notes" name="aware_of_needs_note" type="text" rows="3"></textarea>
										</div>																	
									</div>
									<div class="col-md-4">
										<div class="form-group has-feedback">
											<select name="need_assist_groom" id="need_assist_groom" class="form-control" required >
												<option value="">Need Assistance</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<textarea class="form-control" placeholder="Notes" name="need_assist_groom_note" type="text" rows="3"></textarea>
										</div>																		
									</div>
									<div class="col-md-4">
										<div class="form-group has-feedback">
											<select name="special_equip_groom" id="special_equip_groom" class="form-control" required >
												<option value="">Special Equipment</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<textarea class="form-control" placeholder="Notes" name="special_equip_groom_note" type="text" rows="3"></textarea>
										</div>									
										<div class="form-group has-feedback">
											<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">@lang("msg.Submit")</button>
										</div>
										<div class="form-group has-feedback">
											<button type="submit" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" onclick="history.back()" style="margin-right:15px">@lang("msg.Cancel")</button>
										</div>
										<br/><br/>
									</div>									
								</form>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="feeding" role="tabpanel" aria-labelledby="feeding-tab">
						<div class="col-md-12">
							<div class="box-body">
								<form action="{{action('ScreeningController@add_feeding')}}" method="post">
									<input type="hidden" name="_method" value="PATCH">
									{{ csrf_field() }}
									<div class="col-md-4">
										<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
										<div class="form-group has-feedback">
											<select name="feed_self" id="feed_self" class="form-control" required >
												<option value="">Feed Self</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<textarea class="form-control" placeholder="Notes" name="feed_self_note" type="text" rows="3"></textarea>
										</div>	
										<div class="form-group has-feedback">
											<select name="allergies_feeding" id="allergies_feeding" class="form-control" required >
												<option value="">Allergies</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<textarea class="form-control" placeholder="Notes" name="allergies_feeding_note" type="text" rows="3"></textarea>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group has-feedback">
											<select name="spec_equip_feeding" id="spec_equip_feeding" class="form-control" required >
												<option value="">Special Equipment</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<textarea class="form-control" placeholder="Notes" name="spec_equip_feeding_note" type="text" rows="3"></textarea>
										</div>	
										<div class="form-group has-feedback">
											<select name="limitation_feeding" id="limitation_feeding" class="form-control" required >
												<option value="">Limitation</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<textarea class="form-control" placeholder="Notes" name="limitation_feeding_note" type="text" rows="3"></textarea>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group has-feedback">
											<select name="special_diet" id="special_diet" class="form-control" required >
												<option value="">Special Diet</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<textarea class="form-control" placeholder="Notes" name="special_diet_note" type="text" rows="3"></textarea>
										</div>	
										<div class="form-group has-feedback">
											<select name="good_appetite" id="good_appetite" class="form-control" required >
												<option value="">Good Appetite</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<textarea class="form-control" placeholder="Notes" name="good_appetite_note" type="text" rows="3"></textarea>
										</div>
										<div class="form-group has-feedback">
											<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">@lang("msg.Submit")</button>
										</div>
										<div class="form-group has-feedback">
											<button type="submit" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" onclick="history.back()" style="margin-right:15px">@lang("msg.Cancel")</button>
										</div>
										<br/><br/><br/>
									</div>									
								</form>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="communucation" role="tabpanel" aria-labelledby="communucation-tab">
						<div class="col-md-12">
							<div class="box-body">
								<form action="{{action('ScreeningController@add_communucation')}}" method="post">
									<input type="hidden" name="_method" value="PATCH">
									{{ csrf_field() }}
									<div class="col-md-4">
										<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
										<div class="form-group has-feedback">
											<select name="speech_comm" id="speech_comm" class="form-control" required >
												<option value="">Speech</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<textarea class="form-control" placeholder="Notes" name="speech_comm_note" type="text" rows="3"></textarea>
										</div>																	
									</div>
									<div class="col-md-4">
										<div class="form-group has-feedback">
											<select name="vision_comm" id="vision_comm" class="form-control" required >
												<option value="">Vision</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<textarea class="form-control" placeholder="Notes" name="vision_comm_note" type="text" rows="3"></textarea>
										</div>																		
									</div>
									<div class="col-md-4">
										<div class="form-group has-feedback">
											<select name="hearing_comm" id="hearing_comm" class="form-control" required >
												<option value="">Hearing</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<textarea class="form-control" placeholder="Notes" name="hearing_comm_note" type="text" rows="3"></textarea>
										</div>									
										<div class="form-group has-feedback">
											<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">@lang("msg.Submit")</button>
										</div>
										<div class="form-group has-feedback">
											<button type="submit" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" onclick="history.back()" style="margin-right:15px">@lang("msg.Cancel")</button>
										</div>
										<br/><br/><br/>
									</div>									
								</form>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="night" role="tabpanel" aria-labelledby="night-tab">
						<div class="col-md-12">
							<div class="box-body">
								<form action="{{action('ScreeningController@add_night_need')}}" method="post">
									<input type="hidden" name="_method" value="PATCH">
									{{ csrf_field() }}
									<div class="col-md-6">
										<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
										<div class="form-group has-feedback">
											<select name="sleep_well" id="sleep_well" class="form-control" required >
												<option value="">Sleep Well</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<textarea class="form-control" placeholder="Notes" name="sleep_well_note" type="text" rows="3"></textarea>
										</div>																	
									</div>
									<div class="col-md-6">
										<div class="form-group has-feedback">
											<select name="assist_at_night" id="assist_at_night" class="form-control" required >
												<option value="">Assistance at Night</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<textarea class="form-control" placeholder="Notes" name="assist_at_night_note" type="text" rows="3"></textarea>
										</div>									
										<div class="form-group has-feedback">
											<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">@lang("msg.Submit")</button>
										</div>
										<div class="form-group has-feedback">
											<button type="submit" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" onclick="history.back()" style="margin-right:15px">@lang("msg.Cancel")</button>
										</div>
										<br/><br/><br/>
									</div>									
								</form>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="exiting" role="tabpanel" aria-labelledby="exiting-tab">
						<div class="col-md-12">
							<div class="box-body">
								<form action="{{action('ScreeningController@add_exiting')}}" method="post">
									<input type="hidden" name="_method" value="PATCH">
									{{ csrf_field() }}
									<div class="col-md-4">
										<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
										<div class="form-group has-feedback">
											<select name="need_assist_emer" id="need_assist_emer" class="form-control" required >
												<option value="">Need Assistance</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<textarea class="form-control" placeholder="Notes" name="need_assist_emer_note" type="text" rows="3"></textarea>
										</div>																	
									</div>
									<div class="col-md-4">
										<div class="form-group has-feedback">
											<select name="equip_need_emer" id="equip_need_emer" class="form-control" required >
												<option value="">Equipment Need</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<textarea class="form-control" placeholder="Notes" name="equip_need_emer_note" type="text" rows="3"></textarea>
										</div>
									</div>	
									<div class="col-md-4">
										<div class="form-group has-feedback">
											<textarea class="form-control"placeholder="Activity & Preferences" name="activity_pref_emer" type="text" rows="3"></textarea>
										</div>
										<div class="form-group has-feedback">
											<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">@lang("msg.Submit")</button>
										</div>
										<div class="form-group has-feedback">
											<button type="submit" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" onclick="history.back()" style="margin-right:15px">@lang("msg.Cancel")</button>
										</div>
										<br/><br/><br/>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="fuctioning" role="tabpanel" aria-labelledby="fuctioning-tab">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							<div class="box-body">
								<form action="{{action('ScreeningController@add_overall_fuctioning')}}" method="post">
									<input type="hidden" name="_method" value="PATCH">
									{{ csrf_field() }}
								
									<div class="col-md-12">
										<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
										<div class="form-group has-feedback">
											<select name="level_ov" id="level_ov" class="form-control" required >
												<option value="INDEPENDENT [ Resident can manage ADL without assistance or reminding. ]">INDEPENDENT (Resident can manage ADL without assistance or reminding)</option>
												<option value="ASSISTANCE [ Resident is able to help with the task but cannot do it entirely alone.]">ASSISTANCE (Resident is able to help with the task but cannot do it entirely alone)</option>
												<option value="DEPENDENT [ Resident cannot do any part of the task and it must be done entirely by other person.]">DEPENDENT (Resident cannot do any part of the task and it must be done entirely by other person)</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<input type="text" placeholder="Other Comment/Needs/Concerns" class="form-control" name="other_concerns" />									
										</div>
								
										<div class="form-group has-feedback">
											<select name="pre_acceptable" id="pre_acceptable" class="form-control" required >
												<option value="">Preliminary Acceptable For Transfer Into This Facility</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<textarea class="form-control" placeholder="Reason" name="reasons" type="text" rows="3"></textarea>
										</div>
										<div class="form-group has-feedback">
											<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">@lang("msg.Submit")</button>
										</div>
										<div class="form-group has-feedback">
											<button type="submit" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" onclick="history.back()" style="margin-right:15px">@lang("msg.Cancel")</button>
										</div>
										<br/><br/><br/>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

@include('layouts.partials.scripts_auth')

@endsection
