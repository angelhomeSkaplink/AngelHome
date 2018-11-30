
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
	

	function clearForm() {
		document.getElementById("personal_detail").reset();
	}
</script>
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
<!--<div class="row">		
	<div class="col-md-12">-->
		<div class="box box-primary padding-bottom-25">
			
			<div class="container">
				
				<ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-left:-15px; margin-top:1px">
					<li class="nav-item active">
						<a class="nav-link" href="../details/{{ $id }}">PERSONAL DETAILS</a>
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
				<div class="col-md-10">
					<div class="box-body">
						<div class="tab-content" id="myTabContent">
							<!--<div class="container">-->							
								<div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
									
									<form action="{{action('PersonalDetailsController@add_personal_records')}}" id="personal_detail" method="post" enctype="multipart/form-data>
										<input type="hidden" name="_method" value="PATCH">
										{{ csrf_field() }}
										<div class="col-md-4">
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
											<div class="form-group has-feedback">
												<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">@lang("msg.Submit")</button>
											</div>
											<div class="form-group has-feedback">
												<button type="submit" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" onclick="history.back()" style="margin-right:15px">@lang("msg.Cancel")</button>
											</div>
											</br></br>					
										</div >	
									</form>
								</div>
							<!--</div>-->
						</div>
					</div>
				</div>
			<!--</div>-->
		</div>	
	<!--</div>

</div>-->

@include('layouts.partials.scripts_auth')

@endsection
