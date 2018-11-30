
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
		document.getElementById("dentist").reset();
	}
</script>
<div class="box box-primary padding-bottom-25">
	<div class="container">
		<ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-left:-15px; margin-top:1px">
			<li class="nav-item">
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
			<li class="nav-item active">
				<a class="nav-link" href="../dentist/{{ $id }}">DENTIST</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../funeral/{{ $id }}">FUNERAL HOME & PHARMACY</a>
			</li>
		</ul>	
		<div style="margin-top:35px"></div>				
		<div class="col-md-10">
			<div class="box-body">
				<form action="{{action('PersonalDetailsController@add_dentist')}}" id="dentist" method="post">
					<input type="hidden" name="_method" value="PATCH">
								
					{{ csrf_field() }}
								
					<div class="col-md-6">
						<input type="hidden" class="form-control" name="pros_id" value="{{ $id }}"/>
						<div class="form-group has-feedback">
							<label></label>
							<input type="text" class="form-control" placeholder="Dentist Name" name="dentist_name" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
						</div>
						<div class="form-group has-feedback">
							<label></label>
							<input type="text" class="form-control" placeholder="Adderss 1" name="dentist_address_1"/>									
						</div>	
						<div class="form-group has-feedback">
							<label> </label>
							<input type="text" class="form-control" placeholder="City" name="dentist_city" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>									
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group has-feedback">
							<label></label>
							<input type="number" class="form-control" placeholder="Dentist Phone No" name="dentist_phone" />									
						</div>
						<div class="form-group has-feedback">
							<label></label>
							<input type="text" class="form-control" placeholder="Address 2" name="dentist_address"/>
						</div>							
						<div class="form-group has-feedback">
							<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">@lang("msg.Submit")</button>
						</div>
						<div class="form-group has-feedback">
							<button type="submit" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" onclick="history.back()" style="margin-right:15px">@lang("msg.Cancel")</button>
						</div>
						</br></br><br/>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@include('layouts.partials.scripts_auth')

@endsection
