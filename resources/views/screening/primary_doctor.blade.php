@section('main-content')
<style>
	.content-header
	{
		//display:none;
		padding: 2px 0px 1px 20px;
		margin-bottom: -10px;
	}
		
	.content {
		margin-top: 15px;
	}
</style>
<div class="box box-primary">
    <div class="tab-content" id="myTabContent">
        <div class="col-md-12">
			<form action="{{action('ScreeningController@add_primary_doctor')}}" method="post">
				<input type="hidden" name="_method" value="PATCH">
				{{ csrf_field() }}
				<div class="box box-body">				
					<div class="col-md-4">
						<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
						<label>Primary Doctor</label>
						@php
							$name = explode(",",$data->primary_doctor_primary);
						@endphp
						<div class="row">
							<div class="col-lg-4">
								<div class="form-group">
									<input type="text" class="form-control" value="{{$name[0]}}" placeholder="First Name*" pattern="[A-Za-z\s]+" name="primary_doctor_primary[]" required/>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<input type="text" class="form-control" value="{{$name[1]}}" placeholder="Middle Name" pattern="[A-Za-z\s]+" name="primary_doctor_primary[]"/>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<input type="text" class="form-control" value="{{$name[2]}}" placeholder="Last Name*" pattern="[A-Za-z\s]+" name="primary_doctor_primary[]" required/>
								</div>
							</div>
						</div>
						<label>City</label>
						<div class="form-group has-feedback">
							<input type="text" class="form-control" placeholder="" name="city_primary" value="{{ $data->city_primary }}" pattern="[A-Za-z\s]+" required />
						</div>
						<label>Phone No</label>
						<div class="form-group has-feedback">
							<input type="number" class="form-control" placeholder="" name="phone_primary_doctor" value="{{ $data->phone_primary_doctor }}" required />
						</div>
						<label>Email</label>
						<div class="form-group has-feedback">
							<input type="email" class="form-control" placeholder="" name="email_primary_doctor" value="{{ $data->email_primary_doctor }}" required />									
						</div>
					</div>
					<div class="col-md-4">
					    <label>Adderss 1</label>
						<div class="form-group has-feedback">
							<input type="text" class="form-control" placeholder="" name="address1_primary" value="{{ $data->address1_primary }}" required />
						</div>
						<label>Zip</label>
						<div class="form-group has-feedback">
							<input type="number" class="form-control" placeholder="" name="zipcode_primary" value="{{ $data->zipcode_primary }}" required />
						</div>
						<label>Medical Diagnosis</label>
						<div class="form-group has-feedback">
							<input type="text" class="form-control" placeholder="" name="medical_diagnosis" value="{{ $data->medical_diagnosis }}" />
						</div>
						<label>Fax</label>
						<div class="form-group has-feedback">
							<input type="text" class="form-control" placeholder="" name="fax_primary_doctor" value="{{ $data->fax_primary_doctor }}" />						
						</div>
					</div>
					
					<div class="col-md-4">
					    <label>Address 2</label>
						<div class="form-group has-feedback">
							<input type="text" class="form-control" placeholder="" name="address2_primary" value="{{ $data->address2_primary }}" />
						</div>
						<label>State</label>
						<div class="form-group has-feedback">
							<select name="state_primary" id="state_id" class="form-control" required >
								<option value="{{$data->state_primary}}">{{$data->state_primary}}</option>
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
				</div>
				<div class="box box-body">				
					<div class="col-md-4">
					  <label>Specialist  Doctor</label>
						@php
							$name1 = explode(",",$data->specialist_doctor_primary);
						@endphp
						<div class="row">
							<div class="col-lg-4">
								<div class="form-group">
									<input type="text" class="form-control" value="{{$name1[0]}}" placeholder="First Name*" pattern="[A-Za-z\s]+" name="specialist_doctor_primary[]"/>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<input type="text" class="form-control" value="{{$name1[1]}}" placeholder="Middle Name" pattern="[A-Za-z\s]+" name="specialist_doctor_primary[]"/>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<input type="text" class="form-control" value="{{$name1[2]}}" placeholder="Last Name*" pattern="[A-Za-z\s]+" name="specialist_doctor_primary[]"/>
								</div>
							</div>
						</div>
						<label>City</label>
						<div class="form-group has-feedback">
							<input type="text" class="form-control" placeholder="" name="specialist_city_primary" value="{{ $data->specialist_city_primary }}" pattern="[A-Za-z\s]+" />
						</div>
						<label>Phone No</label>
						<div class="form-group has-feedback">
							<input type="number" class="form-control" placeholder="" name="specialist_phone_primary_doctor" value="{{ $data->specialist_phone_primary_doctor }}" />
						</div>
					</div>
					<div class="col-md-4">
					    <label>Adderss 1</label>
						<div class="form-group has-feedback">
							<input type="text" class="form-control" placeholder="" name="specialist_address1_primary" value="{{ $data->specialist_address1_primary }}" />
						</div>
						<label>Zip</label>
						<div class="form-group has-feedback">
							<input type="number" class="form-control" placeholder="" name="specialist_zipcode_primary" value="{{ $data->specialist_zipcode_primary }}" />
						</div>
					</div>
					<div class="col-md-4">
					    <label>Address 2</label>
						<div class="form-group has-feedback">
							<input type="text" class="form-control" placeholder="" name="specialist_address2_primary" value="{{ $data->specialist_address2_primary }}"/>
						</div>
						<label>State</label>
						<div class="form-group has-feedback">
							<select name="specialist_state_primary" id="state_id" class="form-control" >
								<option value="{{$data->specialist_state_primary}}">{{$data->specialist_state_primary}}</option>
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
					</div>
					<div class="box box-body">				
					<div class="col-md-4">
					    <label>Dentist</label>
							@php
							$name2 = explode(",",$data->dentist);
						@endphp
						<div class="row">
							<div class="col-lg-4">
								<div class="form-group">
									<input type="text" class="form-control" value="{{$name2[0]}}" placeholder="First Name*" pattern="[A-Za-z\s]+" name="dentist[]"/>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<input type="text" class="form-control" value="{{$name2[1]}}" placeholder="Middle Name" pattern="[A-Za-z\s]+" name="dentist[]"/>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<input type="text" class="form-control" value="{{$name2[2]}}" placeholder="Last Name*" pattern="[A-Za-z\s]+" name="dentist[]"/>
								</div>
							</div>
						</div>
						<label>City</label>
						<div class="form-group has-feedback">
							<input type="text" class="form-control" placeholder="" name="dentist_city" value="{{ $data->dentist_city }}" pattern="[A-Za-z\s]+"/>
						</div>
						<label>Phone No</label>
						<div class="form-group has-feedback">
							<input type="number" class="form-control" placeholder="" name="dentist_phone" value="{{ $data->dentist_phone }}" pattern="[0-9]"/>
						</div>
					</div>
					<div class="col-md-4">
					    <label>Adderss 1</label>
						<div class="form-group has-feedback">
							<input type="text" class="form-control" placeholder="" name="dentist_address1" value="{{ $data->dentist_address1 }}" />
						</div>
						<label>Zip</label>
						<div class="form-group has-feedback">
							<input type="number" class="form-control" placeholder="" name="dentist_zip" value="{{ $data->dentist_zip }}" />
						</div>
					</div>
					<div class="col-md-4">
					    <label>Address 2</label>
						<div class="form-group has-feedback">
							<input type="text" class="form-control" placeholder="" name="dentist_address2" value="{{ $data->dentist_address2 }}"/>
						</div>
						<label>State</label>
						<div class="form-group has-feedback">
							<select name="dentist_state" id="state_id" class="form-control" >
								<option value="{{$data->dentist_state}}">{{$data->dentist_state}}</option>
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
							<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">@lang("msg.Submit")</button>
						</div>
						<div class="form-group has-feedback">
							<button type="button" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" onclick="history.back()" style="margin-right:15px">@lang("msg.Cancel")</button>
						</div>
						<br><br><br>
					</div>					
					</div>
				</form>
			</div>
		</div>
    </div>
</div>
