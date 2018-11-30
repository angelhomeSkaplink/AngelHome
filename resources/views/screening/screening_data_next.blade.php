
@extends('layouts.app')

@section('htmlheader_title')
    Prospective Add
@endsection

@section('contentheader_title')
	<div class="form-group has-feedback pull-right" style="padding-right:15px;">
        <a href="../screening_data_status/{{ $id }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom">next</a>
    </div>
	<div class="form-group has-feedback pull-right" style="padding-right:15px;">
        <a href="../screening_data/{{ $id }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom">Go Back</a>
    </div>
@endsection

@section('main-content')

<div class="row">
	<div class="col-md-12">
		<div class="box box-primary border-light-blue">
			<div class="box-body padding-top-5" style="padding-bottom:10px">
				<h4 class="font-500 text-uppercase font-15" >PERSONAL GROOMING/HYGIENE</h4>
                <div class="form-inline border-top" style="padding-top:10px">
					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Aware Of Needs : </label>
						<span class="font-14">{{ $reports_2->aware_of_needs }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Note : </label>
						<span class="font-14">{{ $reports_2->aware_of_needs_note }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Need Assistance : </label>
						<span class="font-14">{{ $reports_2->need_assist_groom }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Note : </label>
						<span class="font-14">{{ $reports_2->need_assist_groom_note }} </span>
					</div>	
					
					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Special Equipment : </label>
						<span class="font-14">{{ $reports_2->special_equip_groom }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Note : </label>
						<span class="font-14">{{ $reports_2->special_equip_groom_note }} </span>
					</div>	
				
                    <div style="clear:both; margin-top:5px;"></div>
                </div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="box box-primary border-light-blue">
			<div class="box-body padding-top-5" style="padding-bottom:10px">
				<h4 class="font-500 text-uppercase font-15" >FEEDING/NUTRITION</h4>
                <div class="form-inline border-top" style="padding-top:10px">
					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Feed Self : </label>
						<span class="font-14">{{ $reports_2->feed_self }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Note : </label>
						<span class="font-14">{{ $reports_2->feed_self_note }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Allergies : </label>
						<span class="font-14">{{ $reports_2->allergies_feeding }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Note : </label>
						<span class="font-14">{{ $reports_2->allergies_feeding_note }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Special Equipmentr : </label>
						<span class="font-14">{{ $reports_2->spec_equip_feeding }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Note : </label>
						<span class="font-14">{{ $reports_2->spec_equip_feeding_note }} </span>
					</div>
					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Limitation  : </label>
						<span class="font-14">{{ $reports_2->limitation_feeding }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Note : </label>
						<span class="font-14">{{ $reports_2->limitation_feeding_note }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Special Diet : </label>
						<span class="font-14">{{ $reports_2->special_diet }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Note : </label>
						<span class="font-14">{{ $reports_2->special_diet_note }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Good Appetite : </label>
						<span class="font-14">{{ $reports_2->good_appetite }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Note : </label>
						<span class="font-14">{{ $reports_2->good_appetite_note }} </span>
					</div>
                    <div style="clear:both; margin-top:5px;"></div>
                </div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="box box-primary border-light-blue">
			<div class="box-body padding-top-5" style="padding-bottom:10px">
				<h4 class="font-500 text-uppercase font-15" >COMMUNICATION ABILITIES</h4>
                <div class="form-inline border-top" style="padding-top:10px">
					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Speech : </label>
						<span class="font-14">{{ $reports_2->speech_comm }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">note : </label>
						<span class="font-14">{{ $reports_2->speech_comm_note }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Vision : </label>
						<span class="font-14">{{ $reports_2->vision_comm }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">note : </label>
						<span class="font-14">{{ $reports_2->vision_comm_note }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Hearing : </label>
						<span class="font-14">{{ $reports_2->hearing_comm }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">note : </label>
						<span class="font-14">{{ $reports_2->hearing_comm_note }}</span>
					</div>					
                    <div style="clear:both; margin-top:5px;"></div>
                </div>
			</div>
		</div>
	</div>
</div>

@include('layouts.partials.scripts_auth')

@endsection
