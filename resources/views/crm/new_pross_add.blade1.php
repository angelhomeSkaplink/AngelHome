
@extends('layouts.app')

@section('htmlheader_title')
    Prospective Add
@endsection

@section('contentheader_title')
    <p class="text-danger">Add New Prospective</p>
@endsection

@section('main-content')
@if($errors->any())
	<?= 'Please Fill the form according to the field'?>
	@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
	@endforeach
@endif
<style>	
	.content-header
	{
		padding: 2px 0px 1px 20px;
		margin-bottom: -18px;
	}
	.content {
		margin-top: 0px;
	}
</style>
<link href="{{ asset('/css/custom.css') }}" rel="stylesheet" type="text/css"/>
<div class="row">
	<form action="new_prospective" name="form_p" method="post" enctype="multipart/form-data" class="form-horizontal">		
		<div class="col-md-4">
		<div class="form-content">
			<!--<div class="box box-primary">-->
				
				<!--<div class="box-body" style="height:665px">-->
					
					<div class="form-group has-feedback">					
						<!--<label>Prospective Name*</label>-->
						<input type="text" class="form-control" placeholder="Prospective Name" oninvalid="this.setCustomValidity('Enter Prospective Name')" oninput="this.setCustomValidity('')" required pattern="[A-Za-z\s]+" name="pros_name" />
					</div> 
					
					<div class="form-group has-feedback">
					<!--<label>Phone No*</label>-->
						<input type="text" class="form-control" placeholder="Phone No" oninvalid="this.setCustomValidity('Enter 10 digit Mobile Number')" oninput="this.setCustomValidity('')" pattern="[0-9]{10}" name="phone_p" required />
					</div>					
					
					<div class="form-group has-feedback">
					<!--<label>Email*</label>-->
						<input type="email" class="form-control" placeholder="Email" oninvalid="this.setCustomValidity('Enter valid Email')" oninput="this.setCustomValidity('')" name="email_p" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required />
					</div>
					
					<div class="form-group has-feedback">
					<!--<label>Address Line 1*</label>-->
						<input type="text" class="form-control" placeholder="Address Line 1" oninvalid="this.setCustomValidity('Enter correct Address')" oninput="this.setCustomValidity('')" name="address_p" required />
					</div> 
					
					<div class="form-group has-feedback">
					<!--<label>Address Line 2</label>-->
						<input type="text" class="form-control" placeholder="Address Line 2" name="address_p_two" />
					</div> 
					
					<div class="form-group has-feedback">
					<!--<label>City*</label>-->
						<input type="text" class="form-control" placeholder="City" name="city_p" oninvalid="this.setCustomValidity('Enter city name')" oninput="this.setCustomValidity('')" required pattern="[A-Za-z\s]+" />
					</div>
					<div class="form-group has-feedback">
					<!--<label>State*</label>-->
						<select name="state_id_p" id="state_id_p" class="form-control" oninvalid="this.setCustomValidity('Select city')" oninput="this.setCustomValidity('')" required >
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
						<!--<label>Zip code*</label>-->
						<input type="number" class="form-control" placeholder="Zip Code" name="zip_p" oninvalid="this.setCustomValidity('Numeric Value Only')" oninput="this.setCustomValidity('')" pattern="[0-9]" required />
					</div>
				<!--</div>-->
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-content">
			<!--<div class="box box-primary">-->
				<!--<div class="box-body" style="height:665px">-->
				
				
					<div class="form-group has-feedback">
					<!--<label>Contact Person*</label>-->
						<input type="text" class="form-control" placeholder="Contact Person" name="contact_person" oninvalid="this.setCustomValidity('Enter Name')" oninput="this.setCustomValidity('')" required pattern="[A-Za-z\s]+" />
					</div> 
					<div class="form-group has-feedback">
						<!--<label>Phone No*</label>-->
						<input type="text" class="form-control" placeholder="Phone No" name="phone_c" oninvalid="this.setCustomValidity('Enter 10 digit mobile number')" oninput="this.setCustomValidity('')" pattern="[0-9]{10}" required />
					</div>
					<div class="form-group has-feedback">
					<!--<label>Email*</label>-->
						<input type="email" class="form-control" placeholder="Email" oninvalid="this.setCustomValidity('Enter valid Email')" oninput="this.setCustomValidity('')" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="email_c" required />
					</div>
					
					<div class="form-group has-feedback">
					<!--<label>Address Line 1*</label>-->
						<input type="text" class="form-control" placeholder="Address Line 1" name="address_c" oninvalid="this.setCustomValidity('Enter correct address')" oninput="this.setCustomValidity('')" required />
					</div> 
					
					<div class="form-group has-feedback">
					<!--<label>Address Line 2</label>-->
						<input type="text" class="form-control" placeholder="Address Line 2" name="address_c_two" />
					</div> 
					
					<div class="form-group has-feedback">
					<!--<label>City*</label>-->
						<input type="text" class="form-control" placeholder="City" name="city_c" oninvalid="this.setCustomValidity('Enter city')" oninput="this.setCustomValidity('')" required pattern="[A-Za-z\s]+"/>
					</div>
					<div class="form-group has-feedback">
					<!--<label>Select State*</label>-->
						<select name="stste_id_c" id="stste_id_c" class="form-control" oninvalid="this.setCustomValidity('Select State')" oninput="this.setCustomValidity('')" required >
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
					<!--<label>Zip Code *</label>-->
						<input type="number" class="form-control" placeholder="Zip Code" name="zip_c" pattern="[0-9]" oninvalid="this.setCustomValidity('Numeric Value onlu')" oninput="this.setCustomValidity('')" required />
					</div>
					
				<!--</div>-->
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-content">
			<!--<div class="box box-primary">-->
				<!--<div class="box-body" style="height:665px">-->
					<div class="form-group has-feedback">
					<!--<label>Relation*</label>-->
						<input type="text" class="form-control" placeholder="Relation" name="relation" id="relation" pattern="[A-Za-z\s]+" oninvalid="this.setCustomValidity('Enter Relation')" oninput="this.setCustomValidity('')" required />
					</div>
					<div class="form-group has-feedback">
						<!--<label>Source*</label>-->
						<input type="text" class="form-control" placeholder="Source" name="source" id="source" pattern="[A-Za-z\s]+" oninvalid="this.setCustomValidity('Enter Source')" oninput="this.setCustomValidity('')" required />
					</div>
					<div class="form-group has-feedback">
						<!--<label>Remarks </label>-->
						<textarea type="text" class="form-control" placeholder="Remarks" name="remarks" size="6"></textarea>
					</div>
					<div class="form-group has-feedback">
						<!--<label>Photograph</label>-->
						<input type="file" class="form-control" name="service_image" id="service_image" value=""/>
					</div>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group has-feedback">
						<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">Submit</button>
					</div>

					<div class="form-group has-feedback">
						<a href="{{  url('sales_pipeline') }}" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right:15px">Cancel</a>
					</div><br/><br/><br/>					
				</div>
			<!--</div>-->
		</div>
		<div class="col-md-10"></div>
	</form>
</div>

@include('layouts.partials.scripts_auth')

@endsection
