
@extends('layouts.app')

@section('htmlheader_title')
    Prospective Add
@endsection

@section('contentheader_title')
    New Prospective
@endsection

@section('main-content')

<div class="row">
	<form action="new_prospective" method="post" enctype="multipart/form-data">		
		<div class="col-md-4">
			<div class="box box-primary">
				@if(Session::has('msg'))
					<div class="alert alert-danger">
						<strong>{{ Session::get('msg') }}</strong>
					</div>
				@endif
				<div class="box-body" style="height:665px">
					<div class="form-group has-feedback">
					
					<label>Prospective Name</label>
						<input type="text" class="form-control" placeholder="Prospective Name" name="pros_name" required pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>
					</div> 
					
					
					<div class="form-group has-feedback">
					<label>Phone No</label>
						<input type="text" class="form-control" placeholder="Phone No" name="phone_p" pattern="[0-9]{10}" Title="Numeric Value. 10 Digit"/>
					</div>
					
					
					<div class="form-group has-feedback">
					<label>Email</label>
						<input type="email" class="form-control" placeholder="Email" name="email_p" />
					</div>
					
					<div class="form-group has-feedback">
					<label>Address Line 1</label>
						<input type="text" class="form-control" placeholder="Address Line 1" name="address_p" required />
					</div> 
					
					<div class="form-group has-feedback">
					<label>Address Line 2</label>
						<input type="text" class="form-control" placeholder="Address Line 2" name="address_p_two" />
					</div> 
					
					<div class="form-group has-feedback">
					<label>City</label>
						<input type="text" class="form-control" placeholder="City" name="city_p" required pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>
					</div>
					<div class="form-group has-feedback">
					<label>State</label>
						<select name="state_id_p" id="state_id_p" class="form-control" required >
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
					<label>Zip code</label>
						<input type="number" class="form-control" placeholder="Zip Code" name="zip_p" pattern="[0-9]" Title="Numeric Value."/>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-body" style="height:665px">
				
				
					<div class="form-group has-feedback">
					<label>Contact Person</label>
						<input type="text" class="form-control" placeholder="Contact Person" name="contact_person" required pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>
					</div> 
					<div class="form-group has-feedback">
						<label>PHone No</label>
						<input type="text" class="form-control" placeholder="Phone No" name="phone_c" pattern="[0-9]{10}" Title="Numeric Value. 10 Digit"/>
					</div>
					<div class="form-group has-feedback">
					<label>Email</label>
						<input type="email" class="form-control" placeholder="Email" name="email_c" />
					</div>
					
					<div class="form-group has-feedback">
					<label>Address Line 1</label>
						<input type="text" class="form-control" placeholder="Address Line 1" name="address_c" required />
					</div> 
					
					<div class="form-group has-feedback">
					<label>Address Line 2</label>
						<input type="text" class="form-control" placeholder="Address Line 2" name="address_c_two" />
					</div> 
					
					<div class="form-group has-feedback">
					<label>City</label>
						<input type="text" class="form-control" placeholder="City" name="city_c" required pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>
					</div>
					<div class="form-group has-feedback">
					<label>Select State</label>
						<select name="stste_id_c" id="stste_id_c" class="form-control" required >
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
					<label>Zip Code</label>
						<input type="number" class="form-control" placeholder="Zip Code" name="zip_c" pattern="[0-9]" Title="Numeric Value."/>
					</div>
					
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-body" style="height:665px">
					<div class="form-group has-feedback">
					<label>Relation</label>
						<input type="text" class="form-control" placeholder="Relation" name="relation" id="relation" pattern="[A-Za-z\s]+" Title="Alphabate Character Only" />
					</div>
					<div class="form-group has-feedback">
					<label>Source</label>
						<input type="text" class="form-control" placeholder="Source" name="source" id="source" pattern="[A-Za-z\s]+" Title="Alphabate Character Only" />
					</div>
					
					<div class="col-md-12">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group has-feedback">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-10"></div>
		
					
	</form>
</div>

@include('layouts.partials.scripts_auth')

@endsection