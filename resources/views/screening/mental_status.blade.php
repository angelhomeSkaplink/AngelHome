@extends('layouts.app')

@section('htmlheader_title')
    Prospective Add
@endsection

@section('contentheader_title')
<?php $name = DB::table('sales_pipeline')->where('id', $id)->first(); ?>
  <p class="text-danger"><b>ADD mental status details for {{ $name->pros_name }}</b></p>
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
      <li class="nav-item active">
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
								<form action="{{action('ScreeningController@add_mental_status')}}" method="post">
									<input type="hidden" name="_method" value="PATCH">
									{{ csrf_field() }}
									<div class="col-md-4">
										<input type="hidden" class="form-control" placeholder="" name="pros_id" value="{{ $id }}"/>
										<div class="form-group has-feedback">
											<label> </label>
											<select name="oriented" id="oriented" class="form-control" required >
												<option value="">Oriented</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<label></label>
											<textarea class="form-control" placeholder="Oriented Notes" name="oriented_note" type="text" rows="3"></textarea>
										</div>
										<div class="form-group has-feedback">
											<label>  </label>
											<select name="wanders" id="wanders" class="form-control" required >
												<option value="">Wanders</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<label></label>
											<textarea class="form-control" placeholder="Wanders Notes" name="wanders_note" type="text" rows="3"></textarea>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group has-feedback">
											<label></label>
											<select name="history_mental_ill" id="history_mental_ill" class="form-control" required >
												<option value="">History of Mental Illness</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<label>  </label>
											<textarea class="form-control" placeholder="Mental Illness Notes" name="history_mental_ill_note" type="text" rows="3"></textarea>
										</div>
										<div class="form-group has-feedback">
											<label></label>
											<select name="memory_lapses" id="memory_lapses" class="form-control" required >
												<option value="">Memory Lapess</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<label> </label>
											<textarea class="form-control" placeholder="Memory Lapess Notes" name="memory_lapses_note" type="text" rows="3"></textarea>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group has-feedback">
											<label></label>
											<select name="danger_to_s_o" id="danger_to_s_o" class="form-control" required >
												<option value="">Danger To Self/Other</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<label>  </label>
											<textarea class="form-control" placeholder="Notes" name="danger_to_s_o_note" type="text" rows="3"></textarea>
										</div>
										<div class="form-group has-feedback">
											<label></label>
											<select name="behaviors" id="behaviors" class="form-control" required >
												<option value="">Behaviors</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<div class="form-group has-feedback">
											<label></label>
											<textarea class="form-control" placeholder="Behaviors Notes" name="behaviors_note" type="text" rows="3"></textarea>
										</div>
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
