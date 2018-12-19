@extends('layouts.app')

@section('htmlheader_title')
    Prospective Add
@endsection

@section('contentheader_title')
<?php $name = DB::table('sales_pipeline')->where('id', $id)->first(); ?>
  <p class="text-danger"><b>ADD FUNERAL HOME for {{ $name->pros_name }}</b></p>
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
        <a class="nav-link" href="../resposible_personal/{{ $id }}">RESPOSIBLE PERSONAL</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../significant_personal/{{ $id }}">SIGNIFICANT PERSONAL</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../resident_details/{{ $id }}">RESIDENT DETAILS</a>
      </li>
      <li class="nav-item ">
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
      <li class="nav-item active">
        <a class="nav-link" href="../funeral_home/{{ $id }}">FUNERAL HOME</a>
      </li>
    </ul>
    <div style="margin-top:35px"></div>
    <div class="tab-content" id="myTabContent">
      <div class="">
          <div class="col-md-2"></div>
        <div class="col-md-12">
			<form action="{{action('ScreeningController@add_funeralhome')}}" method="post">
				<input type="hidden" name="_method" value="PATCH">
				{{ csrf_field() }}
				<div class="box-body">		
				
					<div class="col-md-6">
						<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
						<div class="form-group has-feedback">
							<input type="text" class="form-control" placeholder="Funeral Home" name="funeral_home" pattern="[A-Za-z\s]+" Title="Alphabate Character Only" required />
						</div>
						
						<div class="form-group has-feedback">
							<input type="number" class="form-control" placeholder="Phone No" name="funeral_phone" required />
						</div>
						
				    	
					</div>
					<div class="col-md-6">
					    <div class="form-group has-feedback">
							<input type="text" class="form-control" placeholder="City" name="funeral_city" pattern="[A-Za-z\s]+" Title="Alphabate Character Only" required />
						</div>
						<div class="form-group has-feedback">
							<input type="text" class="form-control" placeholder="Adderss 1" name="funeral_address" required />
						</div>
						<div class="form-group has-feedback">
							<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">@lang("msg.Submit")</button>
						</div>
						<div class="form-group has-feedback">
							<button type="submit" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" onclick="history.back()" style="margin-right:15px">@lang("msg.Cancel")</button>
						</div>
						</br></br><br/>
					</div>
				</div>
				</form>
			</div>
		</div>
    </div>
	</div>
</div>
@include('layouts.partials.scripts_auth')

@endsection
