@extends('layouts.app')

@section('htmlheader_title')
    Prospective Add
@endsection

@section('contentheader_title')
<?php $name = DB::table('sales_pipeline')->where('id', $id)->first(); ?>
  <p class="text-danger"><b>ADD medical equipment details for {{ $name->pros_name }}</b></p>
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
      <li class="nav-item">
        <a class="nav-link" href="../primary_doctor/{{ $id }}">PRIMARY DOCTOR</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../pharmacy/{{ $id }}">PHARMACY</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../medical_equipment/{{ $id }}">MEDICAL EQUIPMENT</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../mental_status/{{ $id }}">MENTAL STATUS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../bathing/{{ $id }}">BATHING</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../dressing/{{ $id }}">DRESSING</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../toileting/{{ $id }}">TOILETING</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../ambulation_transfer/{{ $id }}">AMBULATION/TRANSFER</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../personal_grooming_hygiene/{{ $id }}">PERSONAL GROOMING/HYGIENE</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../feeding_nutrition/{{ $id }}">FEEDING/NUTRITION</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../communication_abilities/{{ $id }}">COMMUNICATION ABILITIES</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../night_need/{{ $id }}">NIGHT NEED</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../emergency_exiting/{{ $id }}">EMERGENCY EXITING</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../overall/{{ $id }}">OVERALL LEVEL OF FUNCTIONING</a>
      </li>
    </ul>
    <div style="margin-top:35px"></div>
    <div class="tab-content" id="myTabContent">
      <div class="">
        <div class="col-md-12">
						<div class="box-body">
							<form action="{{action('ScreeningController@add_equipment')}}" method="post">
								<input type="hidden" name="_method" value="PATCH">
								{{ csrf_field() }}
								<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
								<div class="col-md-6">
									<div class="form-group has-feedback">
										<input type="text" placeholder="incontinency Supplies/Type*" name="inconsistency_supplies_type" id="" value="" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group has-feedback">
										<input type="text" placeholder="Pressure Relief Device Type*" name="pressure_relief_dev_type" id="" value="" class="form-control">
									</div>
								</div>
								<div class="col-md-12">	 <br/>
									<div class="row">
										<div class="col-md-2">
											<div class="form-check">
												<label style="font-size: 2.5em">
													<input type="checkbox" name="bed_pan_medical" id="bed_pan_medical">
													<span class="label-text">BED PAN</span>
												</label>
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-check">
												<label>
													<input type="checkbox" id="comode_medical" name="comode_medical">
													<span class="label-text">COMODE</span>
												</label>
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-check">
												<label>
													<input type="checkbox" id="urinal_medical" name="urinal_medical"> <span class="label-text">URINAL</span>
												</label>
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-check">
												<label>
													<input type="checkbox" id="crutches_medical" name="crutches_medical"> <span class="label-text">CRUTCHES</span>
												</label>
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-check">
												<label>
													<input type="checkbox" id="walker_medical" name="walker_medical"> <span class="label-text">WALKER</span>
												</label>
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-check">
												<label>
													<input type="checkbox" id="wheelchair_medical" name="wheelchair_medical"> <span class="label-text">WHEELCHAIR</span>
												</label>
											</div>
										</div>
									</div>
									<br/>
									<div class="row">
										<div class="col-md-2">
											<div class="form-check">
												<label>
													<input type="checkbox" id="cane_medical" name="cane_medical"> <span class="label-text">CANE</span>
												</label>
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-check">
												<label>
													<input type="checkbox" id="hospital_beds_medical"> <span class="label-text">HOSPITAL BED</span>
												</label>
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-check">
												<label>
													<input type="checkbox" id="trapeze_medical" name="trapeze_medical"> <span class="label-text">TRAPEZE</span>
												</label>
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-check">
												<label>
												<input type="checkbox" id="oxygen_medical" name="oxygen_medical"> <span class="label-text">OXYGEN</span>
												</label>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-check">
												<label>
													<input type="checkbox" id="protective_pads_medical"> <span class="label-text">PROTECTIVE PADS</span>
												</label>
											</div>
										</div>
										</div>
										<br/>
										<div class="row">
											<div class="col-md-4">
												<div class="form-check">
													<div class="col-md-2" style="padding-left:0; padding-right:0"><label style="margin-top:7px">Others: </label> </div>
													<div class="col-md-10" style="padding-left:7px"><input type="text" id="protective_pads_medical" name="protective_pads_medical" class="form-control"> </div>

												</div>
											</div>

											<!--<div class="form-group">
												<label for="bed_pan_medical" class="btn btn-info">BED PAN<input type="checkbox" id="bed_pan_medical" name="bed_pan_medical" class="badgebox"><span class="badge">&check;</span></label>
												<label for="comode_medical" class="btn btn-info">COMODE <input type="checkbox" id="comode_medical" name="comode_medical" class="badgebox"><span class="badge">&check;</span></label>
												<label for="urinal_medical" class="btn btn-info">URINAL <input type="checkbox" id="urinal_medical" name="urinal_medical" class="badgebox"><span class="badge">&check;</span></label>
												<label for="crutches_medical" class="btn btn-info">CRUTCHES<input type="checkbox" id="crutches_medical" name="crutches_medical" class="badgebox"><span class="badge">&check;</span></label>
											</div>
											<div class="form-group">
												<label for="walker_medical" class="btn btn-info">WALKER<input type="checkbox" id="walker_medical" name="walker_medical" class="badgebox"><span class="badge">&check;</span></label>
												<label for="wheelchair_medical" class="btn btn-info">WHEELCHAIR  <input type="checkbox" id="wheelchair_medical" name="wheelchair_medical" class="badgebox"><span class="badge">&check;</span></label>
												<label for="cane_medical" class="btn btn-info">CANE<input type="checkbox" id="cane_medical" name="cane_medical" class="badgebox"><span class="badge">&check;</span></label>
												<label for="hospital_beds_medical" class="btn btn-info">HOSPITAL BED<input type="checkbox" id="hospital_beds_medical" name="hospital_beds_medical" class="badgebox"><span class="badge">&check;</span></label>
											</div> -->
											<!--<div class="form-group">
												<label for="trapeze_medical" class="btn btn-info">TRAPEZE<input type="checkbox" id="trapeze_medical" name="trapeze_medical" class="badgebox"><span class="badge">&check;</span></label>
												<label for="oxygen_medical" class="btn btn-info">OXYGEN<input type="checkbox" id="oxygen_medical" name="oxygen_medical" class="badgebox"><span class="badge">&check;</span></label>
												<label for="protective_pads_medical" class="btn btn-info">PROTECTIVE PADS <input type="checkbox" id="protective_pads_medical" name="protective_pads_medical" class="badgebox"><span class="badge">&check;</span></label>
												<label>OTHER
													<input type="text" id="protective_pads_medical" name="protective_pads_medical" class="form-control">
												</label>
											</div>
											<div class="form-group">
												<button type="submit" class="btn btn-primary">Submit</button>
											</div>	 -->
										</div>
									</div>
									<div class="col-md-6"></div>
									<div class="col=md-6">
										<div class="form-group has-feedback">
											<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">@lang("msg.Submit")</button>
										</div>
										<div class="form-group has-feedback">
											<button type="submit" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" onclick="history.back()" style="margin-right:15px">@lang("msg.Cancel")</button>
										</div>
										<br/><br/>
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
