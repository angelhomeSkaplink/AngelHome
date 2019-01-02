@extends('layouts.app')

@section('htmlheader_title')
    Significant Personnel
@endsection

@section('contentheader_title')
<?php $name = DB::table('sales_pipeline')->where('id', $id)->first();
$n = explode(",",$name->pros_name);
?>
  <p class="text-danger"><b>ADD significant personal details for {{ $n[0] }} {{ $n[1] }} {{ $n[2] }}</b></p>
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
</script>
<div class="box box-primary padding-bottom-25">
  <div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-left:-14px; margin-right:-14px; margin-top:1px">
       <li class="nav-item">
        <a class="nav-link" href="../resposible_personal/{{ $id }}">RESPOSIBLE PERSONNEL</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../significant_personal/{{ $id }}">SIGNIFICANT PERSONNEL</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../resident_details/{{ $id }}">RESIDENT DETAILS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../primary_doctor/{{ $id }}">PHYSICIAN & DENTIST</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../pharmacy/{{ $id }}">HOSPITAL & PHARMACY</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../medical_equipment/{{ $id }}">MEDICAL EQUIPMENT</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../legal_doc/{{ $id }}">LEGAL DOCUMENT</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../insurance/{{ $id }}">INSURANCE</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../funeral_home/{{ $id }}">FUNERAL HOME</a>
      </li>
    </ul>
    <div style="margin-top:35px"></div>
    <div class="tab-content" id="myTabContent">
      <!-- <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"> -->
      <div class="">
					{{-- <div class="col-md-2"></div> --}}
					<div class="col-md-12">
						<div class="box-body">
							<form action="{{action('ScreeningController@add_significant_person')}}" method="post" enctype="multipart/form-data">
								<input type="hidden" name="_method" value="PATCH">
								{{ csrf_field() }}
								<div class="col-md-6">
									<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
									<label>Name*</label>
									@php
											$name = explode(",",$data->other_significant_person_significant);
									@endphp
									<div class="row">
										<div class="col-lg-4">
											<div class="form-group">
												<input type="text" class="form-control" value="{{$name[0]}}" placeholder="First Name*" pattern="[A-Za-z\s]+" name="other_significant_person_significant[]" required/>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<input type="text" class="form-control" value="{{$name[1]}}" placeholder="Middle Name" pattern="[A-Za-z\s]+" name="other_significant_person_significant[]"/>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<input type="text" class="form-control" value="{{$name[2]}}" placeholder="Last Name*" pattern="[A-Za-z\s]+" name="other_significant_person_significant[]" required/>
											</div>
										</div>
									</div>	
									<label>Adderss 1*</label>
									<div class="form-group has-feedback">
										<input type="text" class="form-control" placeholder="" name="address1_significant" value="{{ $data->address1_significant }}" required />
									</div>
									<label>State*</label>
									<div class="form-group has-feedback">
										<select name="state_significant" id="state_id" class="form-control" required >
											<option value="{{ $data->state_significant }}">{{ $data->state_significant }}</option>
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
									<label>Email*</label>
									<div class="form-group has-feedback">
										<input type="email" class="form-control" placeholder="" name="email_significant" value="{{ $data->email_significant }}" />
									</div>
								</div>

								<div class="col-md-6">
								    <label>Phone No*</label>
									<div class="form-group has-feedback">
										<input type="number" class="form-control" placeholder="" name="phone_significant" value="{{ $data->phone_significant }}" required />
									</div>
									<label>Address 2*</label>
									<div class="form-group has-feedback">
										<input type="text" class="form-control" placeholder="" name="address2_significant" value="{{ $data->address2_significant }}"/>
									</div>
									<label>City*</label>
									<div class="form-group has-feedback">
										<input type="text" class="form-control" placeholder="" name="city_significant" value="{{ $data->city_significant }}" pattern="[A-Za-z\s]+" Title="Alphabate Character Only" required />
									</div>
									<label>Zip*</label>
									<div class="form-group has-feedback">
										<input type="number" class="form-control" placeholder="" name="zipcode_significant" value="{{ $data->zipcode_significant }}"/>
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
    </div>
  </div>
</div>
@include('layouts.partials.scripts_auth')

@endsection
