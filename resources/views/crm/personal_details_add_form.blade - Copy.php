
@extends('layouts.app')

@section('htmlheader_title')
    Personal Detail
@endsection

@section('contentheader_title')
	<?php $name = DB::table('sales_pipeline')->where('id', $id)->first(); ?>
    <p class="text-danger"><b>ADD personal details for {{ $name->pros_name }}</b></p>
@endsection

@section('main-content')

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
	
	//$('#home').tab('show');
</script>

<!--<div class="row">		
	<div class="col-md-12">-->
		<div class="box box-primary padding-bottom-25">
			
			<div class="container">
				
				<ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-left:-15px; margin-top:1px">
					<li class="nav-item active">
						<a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">PERSONAL DETAILS</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../personal_insurance/{{ $id }}">INSURANCE INFORMATION</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../contact/{{ $id }}">EMERGENCY CONTACT</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../physician/{{ $id }}">PHYSICIAN</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../dentist/{{ $id }}">DENTIST</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../funeral/{{ $id }}">FUNERAL HOME & PHARMACY</a>
					</li>
				</ul>	
				<div style="margin-top:35px"></div>				
				<div class="tab-content" id="myTabContent">
					<!--<div class="container">-->
						
						<div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
							
							<form action="{{action('PersonalDetailsController@add_personal_records')}}" method="post" enctype="multipart/form-data>
								<input type="hidden" name="_method" value="PATCH">
								{{ csrf_field() }}
								<div class="col-md-4">
									<?php //$check = DB::table('personal_details')->where('pros_id', $id)->first(); 
										//if($check){
									?>
									<!--<div class="alert alert-danger"> DONE </div>-->
									<?php //} else { ?>				
									<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
									<div class="form-group has-feedback">
										<label>Select Gender </label>
										<select name="gender" id="gender" class="form-control" onchange = "ShowHideDiv()" required >
											<option value="">Select Gender</option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label>Date of Birth</label>
										<input type="text" class="form-control" placeholder="Date of Birth" name="dob" id="dob" required autocomplete="off"/>
										<script type="text/javascript"> $('#dob').datepicker({format: 'yyyy/mm/dd'});</script> 
									</div>
																
								</div>
								<div class="col-md-4">
								
								<div class="form-group has-feedback">
										<label>Place of Birth</label>
										<input type="text" class="form-control" placeholder="Place of Birth" name="pob" required pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>
									</div> 
									<div class="form-group has-feedback">
										<label>Age</label>
										<input type="number" class="form-control" placeholder="Age" name="age" pattern="[0-9]" required Title="Numeric Value."/>
									</div>
																
								</div>
								
								<div class="col-md-4">
								<div class="form-group has-feedback">
										<label>Marital Status </label>
										<select name="ms" id="ms" class="form-control" onchange = "ShowHideDiv()" required >
											<option value="">Select Marital Status </option>
											<option value="Single">Single</option>
											<option value="Married">Married</option>
											<option value="Divorcee">Divorcee</option>
											<option value="Widow">Widow</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label>Religion</label>
										<input type="text" class="form-control" placeholder="Religion" name="religion" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
									</div>
									
									<div id="appointScedule" style="display: none">
										<div class="form-group has-feedback">
											<label>Spouse Name</label>
											<input type="text" class="form-control" placeholder="Spouse Name" name="spouse_name" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
										</div>								
									</div>
								</div>
								
								<div class="col-md-12">
									<div class="form-group has-feedback">
										<label>Comments </label>
										<textarea class="form-control" name="comment" type="text" rows="5" placeholder="Comments"></textarea>
									</div>
									
									<div class="col-md-4">
										<button type="submit" class="btn btn-primary btn-block btn-flat btn-width" onclick="history.back()">Cancel</button>
									</div>	
									<div class="col-md-4">
										<button type="submit" class="btn btn-primary btn-block btn-flat btn-width">Submit</button>
									</div>									
								</div>
								
							</form>
							<?php //} ?>
						</div>	
						
						<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
							<form action="{{action('PersonalDetailsController@add_insurance')}}" method="post">
								<input type="hidden" name="_method" value="PATCH">
								{{ csrf_field() }}
								<div class="col-md-6">				
									<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
									<div class="form-group has-feedback">
										<label>SOCIAL SECURITY</label>									
										<input type="text" class="form-control" placeholder="" name="ss"/>
									</div>
									<div class="form-group has-feedback">
										<label>MEDICARE</label>									
										<input type="text" class="form-control" placeholder="" name="medicare"/>
									</div>
									<div class="form-group has-feedback">
										<label>SUPPLEMENTAL INSURANCE NAME</label>									
										<input type="text" class="form-control" placeholder="" name="supplemental_insurance_name"/>
									</div>
									<div class="form-group has-feedback">
										<label>POLICY</label>									
										<input type="text" class="form-control" placeholder="" name="policy"/>
									</div>	
									
								</div>
								<div class="col-md-6">	
									<div class="form-group has-feedback">
										<label>MEDICAID</label>									
										<input type="text" class="form-control" placeholder="" name="medicaid"/>
									</div>
									
									<div class="form-group has-feedback">
										<label>responsible for financial matters</label><br/>
										<select name="personal_responcible" id="personal_responcible" class="form-control" onchange = "ShowInsuranceDiv()" required >
											<option value="">Choose an Option </option>
											<option value="Self">Self</option>
											<option value="Others">Others</option>
										</select>
									</div>
									<div id="financial_matter" style="display: none">
										<div class="form-group has-feedback">
											<label>Name</label>
											<input type="text" class="form-control" placeholder="" name="name" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
										</div>
										<div class="form-group has-feedback">
											<label>Phne No</label>
											<input type="number" class="form-control" placeholder="" name="phone" />									
										</div>
										<div class="form-group has-feedback">
											<label>Adderss 1</label>
											<input type="text" class="form-control" placeholder="" name="address_1"/>									
										</div>
										<div class="form-group has-feedback">
											<label>Address 2</label>
											<input type="text" class="form-control" placeholder="" name="address_2"/>
										</div>
									</div>
									
									<div id="financial_matter1" style="display: none">
										<div class="form-group has-feedback">
											<label>City</label>
											<input type="text" class="form-control" placeholder="" name="city" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
										</div>
										<div class="form-group has-feedback">
										<label>State</label>
											<select name="state_id" id="state_id" class="form-control" required >
												<option value="">Select State</option>
												<?php
													$states = DB::table('state')->get();							
													foreach ($states as $state)
													{ 
														?>
															<option value="{{ $state->state_id}}">{{ $state->state_name }}</option>
														<?php
													}														
												?>	
											</select>
										</div>
										<div class="form-group has-feedback">
											<label>Zip</label>
											<input type="number" class="form-control" placeholder="" name="zip" />									
										</div>
									</div>
									
									<div class="form-group has-feedback">
										<label>CASE MANAGER</label>
										<input type="text" class="form-control" placeholder="" name="case_manager" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
									</div>
									
									<div class="form-group has-feedback">
										<label>CASE MANAGER PHONE </label>
										<input type="number" class="form-control" placeholder="" name="manager_phone" />									
									</div>
										
									<div class="col-md-4">
										<button type="submit" class="btn btn-primary btn-block btn-flat btn-width" onclick="history.back()">Cancel</button>
									</div>	
									<div class="col-md-4">
										<button type="submit" class="btn btn-primary btn-block btn-flat btn-width">Submit</button>
									</div>
								</div>
								
							</form>
						</div>
						<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
							<form action="{{action('PersonalDetailsController@add_emergency')}}" method="post">
								<input type="hidden" name="_method" value="PATCH">
								{{ csrf_field() }}
								<div class="col-md-4">
												
									<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
									<div class="form-group has-feedback">
										<label> (I)	Name </label>
										<input type="text" class="form-control" name="name_1" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
									</div>
									<div class="form-group has-feedback">
										<label>Relation </label>
										<input type="text" class="form-control" name="relation_1" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
									</div>									
									<div class="form-group has-feedback">
										<label>Adderss 1</label>
										<input type="text" class="form-control" name="address_1"/>									
									</div>
									<div class="form-group has-feedback">
										<label>Address 2</label>
										<input type="text" class="form-control" name="address_2"/>
									</div>
									<div class="form-group has-feedback">
										<label>City </label>
										<input type="text" class="form-control" name="city_1" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
									</div>
									<div class="form-group has-feedback">
										<label>Home Phone No </label>
										<input type="number" class="form-control" name="home_phn_1" />									
									</div>
									<div class="form-group has-feedback">
										<label>Work Phone No </label>
										<input type="number" class="form-control" name="work_phone_1" />									
									</div>
								</div>
								<div class="col-md-4">
									
									<div class="form-group has-feedback">
										<label>(II) Name </label>
										<input type="text" class="form-control" placeholder="" name="name_2" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
									</div>
									<div class="form-group has-feedback">
										<label>Relation </label>
										<input type="text" class="form-control" placeholder="" name="relation_2" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
									</div>									
									<div class="form-group has-feedback">
										<label>Adderss 1</label>
										<input type="text" class="form-control" placeholder="" name="address_1_1"/>									
									</div>
									<div class="form-group has-feedback">
										<label>Address 2</label>
										<input type="text" class="form-control" placeholder="" name="address_2_2"/>
									</div>
									<div class="form-group has-feedback">
										<label>City </label>
										<input type="text" class="form-control" placeholder="" name="city_2" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
									</div>
									<div class="form-group has-feedback">
										<label>Home Phone No </label>
										<input type="number" class="form-control" placeholder="" name="home_phn_2" />									
									</div>
									<div class="form-group has-feedback">
										<label>Work Phone No </label>
										<input type="number" class="form-control" placeholder="" name="work_phone_2" />									
									</div>
								</div>
								<div class="col-md-4">									
									<div class="form-group has-feedback">
										<label>POWER OF ATTORNEY </label>
										<input type="text" class="form-control" placeholder="" name="poa" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
									</div>
									<div class="form-group has-feedback">
										<label>Relation </label>
										<input type="text" class="form-control" placeholder="" name="poa_relation" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
									</div>	
									<div class="form-group has-feedback">
										<label> Phne No </label>
										<input type="number" class="form-control" placeholder="" name="poa_phone" />									
									</div>
									<div class="form-group has-feedback">
										<label>guardian </label>
										<input type="text" class="form-control" placeholder="" name="guardian" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
									</div>
									<div class="form-group has-feedback">
										<label> Phone No </label>
										<input type="number" class="form-control" placeholder="" name="guardian_phone" />									
									</div>
									<div class="form-group has-feedback">
										<label>Adderss 1</label>
										<input type="text" class="form-control" placeholder="" name="guardian_address_1"/>									
									</div>
									<div class="form-group has-feedback">
										<label>Address 2</label>
										<input type="text" class="form-control" placeholder="" name="guardian_address_1"/>
									</div>
									<div class="form-group has-feedback">
										<label>City </label>
										<input type="text" class="form-control" placeholder="" name="guardian_city" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
									</div>
									<div class="col-md-4">
										<button type="submit" class="btn btn-primary btn-block btn-flat btn-width" onclick="history.back()">Cancel</button>
									</div>	
									<div class="col-md-4">
										<button type="submit" class="btn btn-primary btn-block btn-flat btn-width">Submit</button>
									</div>
									<!--<div class="form-group has-feedback">
										<button type="submit" class="btn btn-primary btn-block btn-flat btn-width">Submit</button>										
									</div>-->
								</div>
							</form>
						</div>
						<div class="tab-pane fade" id="physician" role="tabpanel" aria-labelledby="physician-tab">
							<form action="{{action('PersonalDetailsController@add_physician')}}" method="post">
								<input type="hidden" name="_method" value="PATCH">
								{{ csrf_field() }}
								<div class="col-md-6">
									<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
									<div class="form-group has-feedback">
										<label>primary physician </label>
										<input type="text" class="form-control" name="primary_physician" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
									</div>
									
									<div class="form-group has-feedback">
										<label>Address 2</label>
										<input type="text" class="form-control" name="pry_add_2"/>
									</div>
									<div class="form-group has-feedback">
										<label>Phone No </label>
										<input type="number" class="form-control" name="pry_phone" />									
									</div>	
									
									<div class="form-group has-feedback">
										<label>SPECIALIST PHYSICIAN </label>
										<input type="text" class="form-control" name="spc_physician" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
									</div>
									<div class="form-group has-feedback">
										<label>Phone No </label>
										<input type="number" class="form-control" name="spc_phone" />									
									</div>
								</div>
								<div class="col-md-6">
								<div class="form-group has-feedback">
										<label>Adderss 1</label>
										<input type="text" class="form-control" name="pry_add_1"/>									
									</div>
								<div class="form-group has-feedback">
										<label>City </label>
										<input type="text" class="form-control" name="pry_city" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
									</div><br/>	
									<div class="form-group has-feedback">
										<label></label>
										<input type="hidden" class="form-control" name=""/>									
									</div>
									<div class="form-group has-feedback">
										
										<input type="hidden" class="form-control" name=""/>									
									</div>
									<div class="form-group has-feedback">
										<label>type</label>
										<input type="text" class="form-control" name="spc_type"/>									
									</div>						
									<div class="col-md-4">
										<button type="submit" class="btn btn-primary btn-block btn-flat btn-width" onclick="history.back()">Cancel</button>
									</div>	
									<div class="col-md-4">
										<button type="submit" class="btn btn-primary btn-block btn-flat btn-width">Submit</button>
									</div>
								</div>
							</form>
						</div>
						<div class="tab-pane fade" id="dentist" role="tabpanel" aria-labelledby="dentist-tab">
							<form action="{{action('PersonalDetailsController@add_dentist')}}" method="post">
								<input type="hidden" name="_method" value="PATCH">
								{{ csrf_field() }}
								
								<div class="col-md-6">
									<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
									<div class="form-group has-feedback">
										<label>dentist name</label>
										<input type="text" class="form-control" name="dentist_name" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
									</div>
									<div class="form-group has-feedback">
										<label>Address 2</label>
										<input type="text" class="form-control" name="dentist_address"/>
									</div>
									<div class="form-group has-feedback">
										<label>dentist phone</label>
										<input type="number" class="form-control" name="dentist_phone" />									
									</div>								
									
									</div>
									<div class="col-md-6">
									<div class="form-group has-feedback">
										<label>Adderss 1</label>
										<input type="text" class="form-control" name="dentist_address_1"/>									
									</div>
									
									<div class="form-group has-feedback">
										<label>City </label>
										<input type="text" class="form-control" name="dentist_city" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
									</div>	
									<div class="col-md-4">
										<button type="submit" class="btn btn-primary btn-block btn-flat btn-width" onclick="history.back()">Cancel</button>
									</div>	
									<div class="col-md-4">
										<button type="submit" class="btn btn-primary btn-block btn-flat btn-width">Submit</button>
									</div>
								</div>
							</form>
						</div>
						<div class="tab-pane fade" id="funeral" role="tabpanel" aria-labelledby="funeral-tab">
							<form action="{{action('PersonalDetailsController@add_others')}}" method="post">
								<input type="hidden" name="_method" value="PATCH">
								{{ csrf_field() }}
								<div class="col-md-6">
									<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
									<div class="form-group has-feedback">
										<label>funeral home</label>
										<input type="text" class="form-control" name="funeral_home" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
									</div>
									<div class="form-group has-feedback">
										<label>pharmacy </label>
										<input type="text" class="form-control" name="pharmacy" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
									</div>								
									<div class="form-group has-feedback">
										<label>hospital</label>
										<input type="text" class="form-control" name="hospital"/>									
									</div>
									<div class="form-group has-feedback">
										<label>allergies</label>
										<input type="text" class="form-control" name="allergies" />									
									</div>
									<div class="form-group has-feedback">
										<label>cpr status</label>
										<input type="text" class="form-control" name="cpr_status"/>
									</div>		
								</div>
								<div class="col-md-6">
									<div class="form-group has-feedback">
										<label>Phone No </label>
										<input type="number" class="form-control" name="funeral_phone" />									
									</div>
									<div class="form-group has-feedback">
										<label>pharmacy phone</label>
										<input type="number" class="form-control" name="pharmacy_phone"/>									
									</div>
									
									<div class="form-group has-feedback">
										<label>hospital phone</label>
										<input type="number" class="form-control" name="hospital_phone"/>
									</div>
																	
									<div class="form-group has-feedback">
										<label>diagnosis</label>
										<input type="text" class="form-control" name="diagnosis"/>									
									</div>
									<div class="col-md-4">
										<button type="submit" class="btn btn-primary btn-block btn-flat btn-width" onclick="history.back()">Cancel</button>
									</div>	
									<div class="col-md-4">
										<button type="submit" class="btn btn-primary btn-block btn-flat btn-width">Submit</button>
									</div>		
								</div>
							</form>
						</div>
					<!--</div>-->
				</div>
			<!--</div>-->
		</div>	
	<!--</div>

</div>-->

@include('layouts.partials.scripts_auth')

@endsection
