
@extends('layouts.app')

@section('htmlheader_title')
    Prospective Add
@endsection

@section('contentheader_title')
	<div class="form-group has-feedback pull-right" style="padding-right:15px;">
        <a href="../screening_data_next/{{ $id }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom">next</a>
    </div>
	<div class="form-group has-feedback pull-right" style="padding-right:15px;">
        <a href="../screening_next/{{ $id }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom">Go Back</a>
    </div>
@endsection

@section('main-content')

<div class="row">
	<div class="col-md-12">
		<div class="box box-primary border-light-blue">
			<div class="box-body padding-top-5" style="padding-bottom:10px">
				<h4 class="font-500 text-uppercase font-15" >DRESSING</h4>
                <div class="form-inline border-top" style="padding-top:10px">
					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Choose Own Clothes : </label>
						<span class="font-14">{{ $reports_2->choose_own_clothes }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Note : </label>
						<span class="font-14">{{ $reports_2->choose_own_clothes_note }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Need Assistance : </label>
						<span class="font-14">{{ $reports_2->need_assist_dressing }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Note : </label>
						<span class="font-14">{{ $reports_2->need_assist_dressing_note }} </span>
					</div>	
				
                    <div style="clear:both; margin-top:5px;"></div>
                </div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="box box-primary border-light-blue">
			<div class="box-body padding-top-5" style="padding-bottom:10px">
				<h4 class="font-500 text-uppercase font-15" >TOILETING</h4>
                <div class="form-inline border-top" style="padding-top:10px">
					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Need Physical Assistance : </label>
						<span class="font-14">{{ $reports_2->physical_assist }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Note : </label>
						<span class="font-14">{{ $reports_2->physical_assist_note }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Incontinence Supplies : </label>
						<span class="font-14">{{ $reports_2->incont_supplies }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Note : </label>
						<span class="font-14">{{ $reports_2->incont_supplies_note }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Agree To Wear : </label>
						<span class="font-14">{{ $reports_2->agree_to_wear }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Note : </label>
						<span class="font-14">{{ $reports_2->agree_to_wear_note }} </span>
					</div>
                    <div style="clear:both; margin-top:5px;"></div>
                </div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="box box-primary border-light-blue">
			<div class="box-body padding-top-5" style="padding-bottom:10px">
				<h4 class="font-500 text-uppercase font-15" >AMBULATION/TRANSFER</h4>
                <div class="form-inline border-top" style="padding-top:10px">
					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Tired Easy : </label>
						<span class="font-14">{{ $reports_2->tired_easy }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">note : </label>
						<span class="font-14">{{ $reports_2->tired_easy_note }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Walking : </label>
						<span class="font-14">{{ $reports_2->walking_ambu }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">note : </label>
						<span class="font-14">{{ $reports_2->walking_ambu_note }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Need Assistance : </label>
						<span class="font-14">{{ $reports_2->need_assist_ambu }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">note : </label>
						<span class="font-14">{{ $reports_2->need_assist_ambu_note }}</span>
					</div>
					
					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Tranfers : </label>
						<span class="font-14">{{ $reports_2->transfers_ambu }} </span>
					</div>	

					<div class="col-md-6" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">note : </label>
						<span class="font-14">{{ $reports_2->transfers_ambu_note }}</span>
					</div>
				
                    <div style="clear:both; margin-top:5px;"></div>
                </div>
			</div>
		</div>
	</div>
</div>
<!--<div class="row">
	<div class="col-md-12">-->
		<div class="box box-primary">

			<div class="container">

				<div style="margin-top:10px"></div>
				<div class="tab-content" id="myTabContent">
					@if($reports_2 == NULL && $reports_2 == NULL)
					<p class="text-warning"><b>NO SCREENING RECORD FOUND</b></p>
					@else
					<div class="tab-pane fade" id="dressing" role="tabpanel" aria-labelledby="dressing-tab">
                        <div class="col-md-6"><br/>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Choose Own Clothes : </label>
                                <span class="font-14">{{ $reports_2->choose_own_clothes }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Choose Own Clothes Note : </label>
                                <span class="font-14">{{ $reports_2->choose_own_clothes_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Need Assistance : </label>
                                <span class="font-14">{{ $reports_2->need_assist_dressing }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Need Assistance Note : </label>
                                <span class="font-14">{{ $reports_2->need_assist_dressing_note }}</span>

                        </div>
                    </div>

                    <div class="tab-pane fade" id="toileting" role="tabpanel" aria-labelledby="toileting-tab">
                        <div class="col-md-6"><br/>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Need Physical Assistance : </label>
                                <span class="font-14">{{ $reports_2->physical_assist }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Physical Assistance Note : </label>
                                <span class="font-14">{{ $reports_2->physical_assist_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Incontinence Supplies : </label>
                                <span class="font-14">{{ $reports_2->incont_supplies }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Incontinence Supplies Note : </label>
                                <span class="font-14">{{ $reports_2->incont_supplies_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Agree To Wear : </label>
                                <span class="font-14">{{ $reports_2->agree_to_wear }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Agree To Wear Note : </label>
                                <span class="font-14">{{ $reports_2->agree_to_wear_note }}</span>

                        </div>
                    </div>


                    <div class="tab-pane fade" id="transfer" role="tabpanel" aria-labelledby="transfer-tab">
                        <div class="col-md-6"><br/>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Tired Easy : </label>
                                <span class="font-14">{{ $reports_2->tired_easy }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Tired Easy Note : </label>
                                <span class="font-14">{{ $reports_2->tired_easy_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Walking : </label>
                                <span class="font-14">{{ $reports_2->walking_ambu }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Walking Note : </label>
                                <span class="font-14">{{ $reports_2->walking_ambu_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Need Assistance : </label>
                                <span class="font-14">{{ $reports_2->need_assist_ambu }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Need Assistance Note : </label>
                                <span class="font-14">{{ $reports_2->need_assist_ambu_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Tranfers : </label>
                                <span class="font-14">{{ $reports_2->transfers_ambu }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Transfers Note : </label>
                                <span class="font-14">{{ $reports_2->transfers_ambu_note }}</span>

                        </div>
                    </div>

                    <div class="tab-pane fade" id="grooming" role="tabpanel" aria-labelledby="grooming-tab">
                        <div class="col-md-6"><br/>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Aware Of Needs : </label>
                                <span class="font-14">{{ $reports_2->aware_of_needs }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Aware Of Needs Note : </label>
                                <span class="font-14">{{ $reports_2->aware_of_needs_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Need Assistance : </label>
                                <span class="font-14">{{ $reports_2->need_assist_groom }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Need Assistance Note : </label>
                                <span class="font-14">{{ $reports_2->need_assist_groom_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Special Equipment : </label>
                                <span class="font-14">{{ $reports_2->special_equip_groom }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Special Equipment Note : </label>
                                <span class="font-14">{{ $reports_2->special_equip_groom_note }}</span>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="feeding" role="tabpanel" aria-labelledby="feeding-tab">
                        <div class="col-md-6"><br/>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Feed Self : </label>
                                <span class="font-14">{{ $reports_2->feed_self }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Feed Self Note : </label>
                                <span class="font-14">{{ $reports_2->feed_self_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Allergies : </label>
                                <span class="font-14">{{ $reports_2->allergies_feeding }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Allergies Note : </label>
                                <span class="font-14">{{ $reports_2->allergies_feeding_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Special Equipment : </label>
                                <span class="font-14">{{ $reports_2->spec_equip_feeding }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Special Equipment Note : </label>
                                <span class="font-14">{{ $reports_2->spec_equip_feeding_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Limitation : </label>
                                <span class="font-14">{{ $reports_2->limitation_feeding }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Limitation Note : </label>
                                <span class="font-14">{{ $reports_2->limitation_feeding_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Special Diet : </label>
                                <span class="font-14">{{ $reports_2->special_diet }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Special Diet Note : </label>
                                <span class="font-14">{{ $reports_2->special_diet_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Good Appetite : </label>
                                <span class="font-14">{{ $reports_2->good_appetite }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Good Appetite Note : </label>
                                <span class="font-14">{{ $reports_2->good_appetite_note }}</span>
                        </div>
                    </div>


                    <div class="tab-pane fade" id="communucation" role="tabpanel" aria-labelledby="communucation-tab">
                        <div class="col-md-6"><br/>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Speech : </label>
                                <span class="font-14">{{ $reports_2->speech_comm }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Speech Note : </label>
                                <span class="font-14">{{ $reports_2->speech_comm_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Vision : </label>
                                <span class="font-14">{{ $reports_2->vision_comm }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Vision Note : </label>
                                <span class="font-14">{{ $reports_2->vision_comm_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Hearing : </label>
                                <span class="font-14">{{ $reports_2->hearing_comm }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Hearing Note : </label>
                                <span class="font-14">{{ $reports_2->hearing_comm_note }}</span>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="night" role="tabpanel" aria-labelledby="night-tab">
                        <div class="col-md-6"><br/>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Sleep-Well : </label>
                                <span class="font-14">{{ $reports_2->sleep_well }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Sleep-Well Note : </label>
                                <span class="font-14">{{ $reports_2->sleep_well_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Assistance At Night : </label>
                                <span class="font-14">{{ $reports_2->assist_at_night }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Assistance At Night Note : </label>
                                <span class="font-14">{{ $reports_2->assist_at_night_note }}</span>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="exiting" role="tabpanel" aria-labelledby="exiting-tab">
                        <div class="col-md-6"><br/>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Need Assistance : </label>
                                <span class="font-14">{{ $reports_2->need_assist_emer }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Need Assistance Note : </label>
                                <span class="font-14">{{ $reports_2->need_assist_emer_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Equipment Need : </label>
                                <span class="font-14">{{ $reports_2->equip_need_emer }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Equipment Need Note : </label>
                                <span class="font-14">{{ $reports_2->equip_need_emer_note }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Activity and Preferences : </label>
                                <span class="font-14">{{ $reports_2->activity_pref_emer }}</span>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="fuctioning" role="tabpanel" aria-labelledby="fuctioning-tab">
                        <div class="col-md-6"><br/>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Overall Functioning : </label>
                                <span class="font-14">{{ $reports_2->level_ov }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Other Comments/Needs/Concerns : </label>
                                <span class="font-14">{{ $reports_2->other_concerns }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Preliminary Acceptable For Transfer Into This Facility? : </label>
                                <span class="font-14">{{ $reports_2->pre_acceptable }}</span>

                            <div style="margin-top:10px"></div>
                                <label class="text-capitalize font-500 font-14">Reason : </label>
                                <span class="font-14">{{ $reports_2->reasons }}</span>
                        </div>
                    </div>

				@endif
				</div>
		</div>
	</div>

@include('layouts.partials.scripts_auth')

@endsection
