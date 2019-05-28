
@extends('layouts.app')

@section('htmlheader_title')
    @lang("msg.Future Resident Add")
@endsection

@section('contentheader_title')
<div class="row">
	<div class="col-lg-4 offset-lg-4 text-center">
		<h3><strong>@lang("msg.Future Resident Add")</strong></h3>
	</div>
</div>
@endsection

@section('main-content')

<div class="row">
	<form action="new_prospective" name="form_p" method="post" enctype="multipart/form-data">		
		<div class="col-md-4">
			<div class="panel panel-default">				
				<div class="panel-body border padding-7">
					<h4 class="text-center">@lang("msg.Future Resident")</h4>
					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="First Name*" pattern="[A-Za-z\s]+" name="pros_name[]" />
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">					
								<input type="text" class="form-control" placeholder="Middle Name" pattern="[A-Za-z\s]+" name="pros_name[]" />
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">					
								<input type="text" class="form-control" placeholder="Last Name*" pattern="[A-Za-z\s]+" name="pros_name[]" />
							</div>
						</div>
					</div>		
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Phone No"  pattern="[0-9]{10}" name="phone_p" />
					</div>					
					<div class="form-group has-feedback">
						<input type="email" class="form-control" placeholder="Email" name="email_p" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" />
					</div>					
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Address Line 1" name="address_p" />
					</div>					
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Address Line 2" name="address_p_two" />
					</div>					
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="City" name="city_p" pattern="[A-Za-z\s]+" />
					</div>
					<div class="form-group has-feedback">
						<select name="state_id_p" id="state_id_p" class="form-control" >
							<option value="">@lang("msg.Select State")</option>
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
						<input type="number" class="form-control" placeholder="Zip Code" name="zip_p" pattern="[0-9]" />
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-default">				
				<div class="panel-body border padding-7">
					<h4 class="text-center">@lang("msg.Contact Person")</h4>
					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="First Name*" name="contact_person[]" />
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<!--<label>Contact Person*</label>-->
								<input type="text" class="form-control" placeholder="Middle Name" name="contact_person[]" pattern="[A-Za-z\s]+" />
							</div> 
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<!--<label>Contact Person*</label>-->
								<input type="text" class="form-control" placeholder="Last Name*" name="contact_person[]" />
							</div>
						</div>
					</div>
					<div class="form-group has-feedback">
						<!--<label>Phone No*</label>-->
						<input type="text" class="form-control" placeholder="Phone No" name="phone_c" pattern="[0-9]{10}" />
					</div>
					<div class="form-group has-feedback">
					<!--<label>Email*</label>-->
						<input type="email" class="form-control" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="email_c" />
					</div>					
					<div class="form-group has-feedback">
					<!--<label>Address Line 1*</label>-->
						<input type="text" class="form-control" placeholder="Address Line 1*" name="address_c" />
					</div>					
					<div class="form-group has-feedback">
					<!--<label>Address Line 2</label>-->
						<input type="text" class="form-control" placeholder="Address Line 2" name="address_c_two" />
					</div> 					
					<div class="form-group has-feedback">
					<!--<label>City*</label>-->
						<input type="text" class="form-control" placeholder="City" name="city_c" pattern="[A-Za-z\s]+"/>
					</div>
					<div class="form-group has-feedback">
					<!--<label>Select State*</label>-->
						<select name="stste_id_c" id="stste_id_c" class="form-control" >
							<option value="">@lang("msg.Select State")</option>
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
						<input type="number" class="form-control" placeholder="Zip Code" name="zip_c" />
					</div>					
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-default">				
				<div class="panel-body border padding-7">
					<div class="form-group has-feedback">
					<!--<label>Relation*</label>-->
						<input type="text" class="form-control" placeholder="Relation" name="relation" id="relation" pattern="[A-Za-z\s]+" />
					</div>
					<!--<div class="form-group has-feedback">
						<label>Source*</label>
						<input type="text" class="form-control" placeholder="Source*" name="source" id="source" pattern="[A-Za-z\s]+" oninvalid="this.setCustomValidity('Enter Source')" oninput="this.setCustomValidity('')"    />
					</div>-->
					<div class="form-group has-feedback">
					<!--<label>Select State*</label>-->
						<select name="source" id="source" class="form-control" >
							<option value="">@lang("msg.Select Source")</option>
							<option value="Referral">@lang("msg.Referral")</option>
							<option value="Internet">@lang("msg.Internet")</option>
							<option value="Newspaper">@lang("msg.Newspaper")</option>
							<option value="TV">@lang("msg.TV")</option>
							<option value="Flyer">@lang("msg.Flyer")</option>							
						</select>
					</div>
					<div class="form-group has-feedback">
						<!--<label>Remarks </label>-->
						<textarea type="text" class="form-control" placeholder="Source Detail" name="source_detail" size="8"></textarea>
					</div>
					<div class="form-group has-feedback">
						<!--<label>Remarks </label>-->
						<textarea type="text" class="form-control" placeholder="Remarks" name="remarks" size="8"></textarea>
					</div>
					<div class="form-group has-feedback">
						<label>upload profile photo</label>
						<input type="file" class="form-control" name="service_image" id="service_image" value=""/>
					</div>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="row">
						<div class="col-md-6 text-center">
							<div class="form-group has-feedback">
								<a href="{{  url('sales_pipeline') }}" class="btn btn-danger btn-width" style="margin-right:15px">@lang("msg.Cancel")</a>
							</div>
						</div>
						<div class="col-md-6 text-center">
							<div class="form-group has-feedback">
								<button type="submit" class="btn btn-success btn-width">@lang("msg.Submit")</button>
							</div>
						</div>
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
