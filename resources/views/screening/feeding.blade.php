@extends('layouts.app')

@section('htmlheader_title')
    Screening
@endsection

@section('contentheader_title')
<?php $name = DB::table('sales_pipeline')->where('id', $id)->first(); ?>
  <p class="text-danger"><b>ADD feeding details for {{ $name->pros_name }}</b></p>
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
      <li class="nav-item">
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
      <li class="nav-item active">
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
								<form action="{{action('ScreeningController@add_feeding')}}" method="post">
									<input type="hidden" name="_method" value="PATCH">
									{{ csrf_field() }}
									<div class="col-md-4">
										<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
										<div class="form-group has-feedback">
											<select name="feed_self" id="feed_self" class="form-control" required >
												<option value="">Feed Self</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<textarea class="form-control" placeholder="Notes" name="feed_self_note" type="text" rows="3"></textarea>
										</div>
										<div class="form-group has-feedback">
											<select name="allergies_feeding" id="allergies_feeding" class="form-control" required >
												<option value="">Allergies</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<textarea class="form-control" placeholder="Notes" name="allergies_feeding_note" type="text" rows="3"></textarea>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group has-feedback">
											<select name="spec_equip_feeding" id="spec_equip_feeding" class="form-control" required >
												<option value="">Special Equipment</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<textarea class="form-control" placeholder="Notes" name="spec_equip_feeding_note" type="text" rows="3"></textarea>
										</div>
										<div class="form-group has-feedback">
											<select name="limitation_feeding" id="limitation_feeding" class="form-control" required >
												<option value="">Limitation</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<textarea class="form-control" placeholder="Notes" name="limitation_feeding_note" type="text" rows="3"></textarea>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group has-feedback">
											<select name="special_diet" id="special_diet" class="form-control" required >
												<option value="">Special Diet</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<textarea class="form-control" placeholder="Notes" name="special_diet_note" type="text" rows="3"></textarea>
										</div>
										<div class="form-group has-feedback">
											<select name="good_appetite" id="good_appetite" class="form-control" required >
												<option value="">Good Appetite</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<textarea class="form-control" placeholder="Notes" name="good_appetite_note" type="text" rows="3"></textarea>
										</div>
										<div class="form-group has-feedback">
											<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">@lang("msg.Submit")</button>
										</div>
										<div class="form-group has-feedback">
											<button type="submit" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" onclick="history.back()" style="margin-right:15px">@lang("msg.Cancel")</button>
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
