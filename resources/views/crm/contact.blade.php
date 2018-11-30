
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
	
	function clearForm() {
		document.getElementById("contact").reset();
	}
</script>

<!--<div class="row">		
	<div class="col-md-12">-->
		<div class="box box-primary padding-bottom-25">
			
			<div class="container">
				
				<ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-left:-15px; margin-top:1px">
					<li class="nav-item">
						<a class="nav-link" href="../details/{{ $id }}">PERSONAL DETAILS</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../personal_insurance/{{ $id }}">INSURANCE INFORMATION</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="../contact/{{ $id }}" aria-selected="true">EMERGENCY CONTACT</a>
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
							<form action="{{action('PersonalDetailsController@add_emergency')}}" id="contact" method="post">
								<input type="hidden" name="_method" value="PATCH">
								{{ csrf_field() }}
								<div class="col-md-4">
												
									<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
									<div class="form-group has-feedback">
										  
										<input type="text" class="form-control" placeholder="(I)Name*" name="name_1" required pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
									</div>
									<div class="form-group has-feedback">
										 
										<input type="text" class="form-control" placeholder="Relation*" name="relation_1" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
									</div>									
									<div class="form-group has-feedback">
										
										<input type="text" class="form-control" placeholder="Adderss 1*" required name="address_1"/>									
									</div>
									<div class="form-group has-feedback">
										
										<input type="text" class="form-control" placeholder="Address 2" name="address_2"/>
									</div>
									<div class="form-group has-feedback">
										 
										<input type="text" class="form-control" placeholder="City*" name="city_1" required pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
									</div>
									<div class="form-group has-feedback">
										
										<input type="number" class="form-control" required placeholder="Home Phone No*" name="home_phn_1" />									
									</div>
									<div class="form-group has-feedback">
										 
										<input type="number" class="form-control" placeholder="Work Phone No" name="work_phone_1" />									
									</div>
								</div>
								<div class="col-md-4">
									
									<div class="form-group has-feedback">
										 
										<input type="text" class="form-control" placeholder="(II) Name" name="name_2" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
									</div>
									<div class="form-group has-feedback">
										 
										<input type="text" class="form-control" placeholder="Relation" name="relation_2" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
									</div>									
									<div class="form-group has-feedback">
										
										<input type="text" class="form-control" placeholder="Adderss 1" name="address_1_1"/>									
									</div>
									<div class="form-group has-feedback">
										
										<input type="text" class="form-control" placeholder="Address 2" name="address_2_2"/>
									</div>
									<div class="form-group has-feedback">
										 
										<input type="text" class="form-control" placeholder="City" name="city_2" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
									</div>
									<div class="form-group has-feedback">
										 
										<input type="number" class="form-control" placeholder="Home Phone No" name="home_phn_2" />									
									</div>
									<div class="form-group has-feedback">
										 
										<input type="number" class="form-control" placeholder="Work Phone No" name="work_phone_2" />									
									</div>
								</div>
								<div class="col-md-4">									
									<div class="form-group has-feedback">
										 
										<input type="text" class="form-control" placeholder="Power Oo Attorney*" required name="poa" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
									</div>
									<div class="form-group has-feedback">
										 
										<input type="text" class="form-control" placeholder="Relation*" required name="poa_relation" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
									</div>	
									<div class="form-group has-feedback">
										  
										<input type="number" class="form-control" placeholder="Phone No" name="poa_phone" required />									
									</div>
									<div class="form-group has-feedback">
										 
										<input type="text" class="form-control" placeholder="Guardian*" required name="guardian" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
									</div>
									<div class="form-group has-feedback">										  
										<input type="number" class="form-control" placeholder="Guardian Phone No" required name="guardian_phone" />									
									</div>
									<div class="form-group has-feedback">
										
										<input type="text" class="form-control" placeholder="Guardian Adderss*" required name="guardian_address_1"/>									
									</div>
									
									<div class="form-group has-feedback">
										 
										<input type="text" class="form-control" placeholder="City" name="guardian_city" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
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
