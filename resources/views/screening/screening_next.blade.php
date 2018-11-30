
@extends('layouts.app')

@section('htmlheader_title')
    Prospective Add
@endsection

@section('contentheader_title')
	<div class="form-group has-feedback pull-right" style="padding-right:15px;">
        <a href="../screening_status/{{ $id }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom">next</a>
    </div>
	<div class="form-group has-feedback pull-right" style="padding-right:15px;">
        <a href="../screening_view/{{ $id }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom">Go Back</a>
    </div>
@endsection

@section('main-content')

<div class="row">
	<div class="col-md-12">
		<div class="box box-primary border-light-blue">
			<div class="box-body padding-top-5" style="padding-bottom:10px">
				<h4 class="font-500 text-uppercase font-15" >PRIMARY DOCTOR</h4>
                <div class="form-inline border-top" style="padding-top:10px">
					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Name : </label>
						<span class="font-14">{{ $reports_1->primary_doctor_primary }} </span>
					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Address 1 : </label>
						<span class="font-14">{{ $reports_1->address1_primary }} </span>
					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Address 2 : </label>
						<span class="font-14">{{ $reports_1->address2_primary }} </span>
					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">City : </label>
						<span class="font-14">{{ $reports_1->city_primary }} </span>
					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">State : </label>
						<span class="font-14">{{ $reports_1->state_primary }} </span>
					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Zip Code : </label>
						<span class="font-14">{{ $reports_1->zipcode_primary }}</span>
					</div>

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Phone : </label>
						<span class="font-14"> {{ $reports_1->phone_primary_doctor }} </span>
					</div>	

    				<div class="col-md-4" style="padding-left: 0; padding-right:0">
                        <label class="text-capitalize font-500 font-14">Medical Diagnosis : </label>
                        <span class="font-14"> {{ $reports_1->medical_diagnosis }} </span>
					</div>	
					
					<div class="col-md-4" style="padding-left: 0; padding-right:0">
                        <label class="text-capitalize font-500 font-14">Other Medical/Physical Problems : </label>
                        <span class="font-14"> {{ $reports_1->other_m_p_prob_primary }} </span>
					</div>
                    <div style="clear:both; margin-top:5px;"></div>
                </div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="box box-primary border-light-blue">
			<div class="box-body padding-top-5" style="padding-bottom:10px">
				<h4 class="font-500 text-uppercase font-15" >PHARMACY</h4>
                <div class="form-inline border-top" style="padding-top:10px">
					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Pharmacy Name : </label>
						<span class="font-14">{{ $reports_1->pharmacy }} </span>
					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">pharmacy Phone No : </label>
						<span class="font-14">{{ $reports_1->phone_pharmacy }} </span>
					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Mortuary Name : </label>
						<span class="font-14">{{ $reports_1->mortuary }} </span>
					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Mortuary Phone : </label>
						<span class="font-14">{{ $reports_1->phone2_mortuary }} </span>
					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Special Medical Needs : </label>
						<span class="font-14">{{ $reports_1->special_med_needs_pharmacy }} </span>
					</div>	
				
                    <div style="clear:both; margin-top:5px;"></div>
                </div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="box box-primary border-light-blue">
			<div class="box-body padding-top-5" style="padding-bottom:10px">
				<h4 class="font-500 text-uppercase font-15" >MEDICAL EQUIPMENT</h4>
                <div class="form-inline border-top" style="padding-top:10px">
					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Inconsistency Supplies/Type : </label>
						<span class="font-14">{{ $reports_1->inconsistency_supplies_type }} </span>
					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Pressure Releif Devices Type : </label>
						<span class="font-14">{{ $reports_1->pressure_relief_dev_type }} </span>
					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Bed Pan : </label>
						@if($reports_1->bed_pan_medical == "on")
                            <span class="font-14">Required</span>
                        @else
                                <span class="font-14">Not Required</span>
                                @endif
					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Comode : </label>
						@if($reports_1->comode_medical == "on")
                                <span class="font-14">Required</span>
                                @else
                                <span class="font-14">Not Required</span>
                                @endif

					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Urinal : </label>
						@if($reports_1->urinal_medical == "on")
                                <span class="font-14">Required</span>
                                @else
                                <span class="font-14">Not Required</span>
                                @endif
					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Cruthches : </label>
						@if($reports_1->crutches_medical == "on")
                                <span class="font-14">Required</span>
                                @else
                                <span class="font-14">Not Required</span>
                                @endif
					</div>
					
					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Walker : </label>
						@if($reports_1->walker_medical == "on")
                                <span class="font-14">Required</span>
                                @else
                                <span class="font-14">Not Required</span>
                                @endif
					</div>
					
					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Wheelchair : </label>
						@if($reports_1->wheelchair_medical == "on")
                                <span class="font-14">Required</span>
                                @else
                                <span class="font-14">Not Required</span>
                                @endif
					</div>
					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Cane : </label>
						@if($reports_1->cane_medical == "on")
                                <span class="font-14">Required</span>
                                @else
                                <span class="font-14">Not Required</span>
                                @endif
					</div>
					
					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Hospital Bed : </label>
						@if($reports_1->hospital_beds_medical == "on")
                                <span class="font-14">Required</span>
                                @else
                                <span class="font-14">Not Required</span>
                                @endif
					</div>
					
					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Trapeze : </label>
						@if($reports_1->trapeze_medical == "on")
                                <span class="font-14">Required</span>
                                @else
                                <span class="font-14">Not Required</span>
                                @endif
					</div>
					
					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Oxygen : </label>
						@if($reports_1->oxygen_medical == "on")
                                <span class="font-14">Required</span>
                                @else
                                <span class="font-14">Not Required</span>
                                @endif
					</div>
					
					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Protective Pads : </label>
						@if($reports_1->protective_pads_medical == "on")
                                <span class="font-14">Required</span>
                                @else
                                <span class="font-14">Not Required</span>
                                @endif
					</div>
					
					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Other : </label>
						<span class="font-14">{{ $reports_1->other_medical }}</span>
					</div>
				
                    <div style="clear:both; margin-top:5px;"></div>
                </div>
			</div>
		</div>
	</div>
</div>

@include('layouts.partials.scripts_auth')

@endsection
