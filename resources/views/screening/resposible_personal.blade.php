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
    <div class="tab-content " id="myTabContent">
      <div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
			<div class="col-md-12">
				<div class="box box-body">
					<form action="{{action('ScreeningController@add_responsible_person')}}" method="post" enctype="multipart/form-data">
						<input type="hidden" name="_method" value="PATCH">
						{{ csrf_field() }}
						<div class="col-md-6">
							<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
							<label>Name *</label>
							@php
									$name = explode(",",$data->responsible_person_responsible);
							@endphp
							<div class="row">
								<div class="col-lg-4">
									<div class="form-group">
										<input type="text" class="form-control" value="{{$name[0]}}" placeholder="First Name*" pattern="[A-Za-z\s]+" name="responsible_person_responsible[]" required/>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<input type="text" class="form-control" value="{{$name[1]}}" placeholder="Middle Name" pattern="[A-Za-z\s]+" name="responsible_person_responsible[]"/>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<input type="text" class="form-control" value="{{$name[2]}}" placeholder="Last Name*" pattern="[A-Za-z\s]+" name="responsible_person_responsible[]" required/>
									</div>
								</div>
							</div>	
							<div class="form-group has-feedback">
							<label>Adderss 1*</label>
								<input type="text" class="form-control" placeholder="" name="address1_responsible" value="{{$data->address1_responsible}}" required />
							</div>
							<label>State</label>
							<div class="form-group has-feedback">
								<select name="state_responsible" id="state_id" class="form-control" required >
									<option value="{{$data->state_responsible}}">{{$data->state_responsible}}</option>
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
								<input type="number" class="form-control" placeholder="" name="zipcode_responsible" value="{{ $data->zipcode_responsible }}" required />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group has-feedback">
							<label>Phone No*</label>
								<input type="number" class="form-control" placeholder="" name="phone_responsible" value="{{ $data->phone_responsible }}" required />
							</div>
							<div class="form-group has-feedback">
							<label>Address 2</label>
								<input type="text" class="form-control" placeholder="" name="address2_responsible" value="{{ $data->address2_responsible }}" />
							</div>
							<label>City</label>
							<div class="form-group has-feedback">
								<input type="text" class="form-control" placeholder="" name="city_responsible" value="{{ $data->city_responsible }}"  pattern="[A-Za-z\s]+"/>
							</div>
							<div class="form-group has-feedback">
							<label>Email</label>
								<input type="email" class="form-control" placeholder="" name="email_responsible" value="{{ $data->email_responsible }}" required/>
							</div>
							<div class="form-group has-feedback">
								<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">@lang("msg.Submit")</button>
							</div>
							<div class="form-group has-feedback">
								<button type="button" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" onclick="history.back()" style="margin-right:15px">@lang("msg.Cancel")</button>
							</div>
							<br/><br/><br/>
						</div>
					</form>
				</div>
			</div>
</div>
