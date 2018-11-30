
@extends('layouts.app')

@section('htmlheader_title')
    Personal Detail
@endsection

@section('contentheader_title')
	<?php $name = DB::table('sales_pipeline')->where('id', $id)->first(); ?>
    <p class="text-danger"><b>ADD personal details for {{ $name->pros_name }}</b></p>
@endsection

@section('main-content')
<style>
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
	
	function clearForm() {
		document.getElementById("insurance").reset();
	}
</script>

<!--<div class="row">		
	<div class="col-md-12">-->
		<div class="box box-primary padding-bottom-25">
			
			<div class="container">
				
				<ul class="nav nav-tabs" style="margin-left:-15px; margin-top:1px">
					<li class="nav-item">
						<a class="nav-link" href="../details/{{ $id }}">PERSONAL DETAILS</a>
					</li>
					<li class="nav-item active">
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
				<div class="col-md-10">
					<div class="box-body">
						<form action="{{action('PersonalDetailsController@add_insurance')}}" id="insurance" method="post">
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
										<option value="Self"><b>Self</b></option>
										<option value="Others"><b>Others</b></option>
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
								<div class="form-group has-feedback">
								  	<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">@lang("msg.Submit")</button>
								</div>
								<div class="form-group has-feedback">
									<button type="submit" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" onclick="history.back()" style="margin-right:15px">@lang("msg.Cancel")</button>
								</div>
								</br></br>		
									
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
