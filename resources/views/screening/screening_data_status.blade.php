
@extends('layouts.app')

@section('htmlheader_title')
    Prospective Add
@endsection

@section('contentheader_title')
	<div class="form-group has-feedback pull-right" style="padding-right:15px;">
        <a href="../screening_data_next/{{ $id }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom">Go Back</a>
    </div>
@endsection

@section('main-content')

<div class="row">
	<div class="col-md-12">
		<div class="box box-primary border-light-blue">
			<div class="box-body padding-top-5" style="padding-bottom:10px">
				<h4 class="font-500 text-uppercase font-15" >NIGHT NEED</h4>
                <div class="form-inline border-top" style="padding-top:10px">
					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Sleep-Well : </label>
						<span class="font-14">{{ $reports_2->sleep_well }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Note : </label>
						<span class="font-14">{{ $reports_2->sleep_well_note }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Assistance At Night : </label>
						<span class="font-14">{{ $reports_2->assist_at_night }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Note : </label>
						<span class="font-14">{{ $reports_2->assist_at_night_note }} </span>
					</div>	
					
                    <div style="clear:both; margin-top:5px;"></div>
                </div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="box box-primary border-light-blue">
			<div class="box-body padding-top-5" style="padding-bottom:10px">
				<h4 class="font-500 text-uppercase font-15" >EMERGENCY EXITING</h4>
                <div class="form-inline border-top" style="padding-top:10px">
					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Need Assistance : </label>
						<span class="font-14">{{ $reports_2->need_assist_emer }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Note : </label>
						<span class="font-14">{{ $reports_2->need_assist_emer_note }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Equipment Need : </label>
						<span class="font-14">{{ $reports_2->equip_need_emer }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Note : </label>
						<span class="font-14">{{ $reports_2->equip_need_emer_note }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Activity and Preferences : </label>
						<span class="font-14">{{ $reports_2->activity_pref_emer }} </span>
					</div>	

                    <div style="clear:both; margin-top:5px;"></div>
                </div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="box box-primary border-light-blue">
			<div class="box-body padding-top-5" style="padding-bottom:10px">
				<h4 class="font-500 text-uppercase font-15" >OVERALL LEVEL OF FUNCTIONING</h4>
                <div class="form-inline border-top" style="padding-top:10px">
					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Overall Functioning : </label>
						<span class="font-14">{{ $reports_2->level_ov }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Other Comments/Needs/Concerns : </label>
						<span class="font-14">{{ $reports_2->other_concerns }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Preliminary Acceptable For Transfer Into This Facility? : </label>
						<span class="font-14">{{ $reports_2->pre_acceptable }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0"></div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Reason : </label>
						<span class="font-14">{{ $reports_2->reasons }} </span>
					</div>	
				
                    <div style="clear:both; margin-top:5px;"></div>
                </div>
			</div>
		</div>
	</div>
</div>

@include('layouts.partials.scripts_auth')

@endsection
