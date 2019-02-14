
@extends('layouts.app')

@section('htmlheader_title')
    @lang("msg.Resident Add")
@endsection

@section('contentheader_title')
	<div class="form-group has-feedback pull-right" style="padding-right:15px;">
        <a href="{{ url('personal_details') }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom">@lang("msg.Go Back")</a>
    </div>
@endsection

@section('main-content')
<style>
	.content-header{
		padding: 0px 0px 0px 20px;
		margin-bottom: -18px;
	}
	.content{
		margin-top: 15px;
	}
</style>
@if($reports_1 == NULL && $reports_2 == NULL)
<div class="box box-primary border-light-blue" style="padding:10px;padding-left: 25px;font-size:20px;color:red;">
    <p class="text-danger"><b>@lang("msg.No Record Found")</b></p>
</div>
@endif

@if($reports_1 != NULL && $reports_2 != NULL)
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary border-light-blue">
			<div class="box-body padding-top-5" style="padding-bottom:10px">
				<h4 class="font-500 text-uppercase font-15">@lang("msg.Personal Information")</h4>
                <div class="form-inline border-top" style="padding-top:10px">

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">@lang("msg.Gender") : </label>
						<span class="font-14">{{ $reports_1->gender }} </span>
					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">@lang("msg.Date Of Birth") : </label>
						<span class="font-14">{{ $reports_1->dob }} </span>
					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">@lang("msg.Place Of Birth") : </label>
						<span class="font-14">{{ $reports_1->pob }} </span>
					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">@lang("msg.Age") : </label>
						<span class="font-14">{{ $reports_1->age }} </span>
					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">@lang("msg.Marital Status") : </label>
						<span class="font-14">{{ $reports_1->ms }} </span>
					</div>	

                    @if($reports_1->ms == "Married")
					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">@lang("msg.Spouse name") : </label>
						<span class="font-14">{{ $reports_1->spouse_name }}</span>
					</div>	
                    @endif

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">@lang("msg.Religion") : </label>
						<span class="font-14"> {{ $reports_1->religion }} </span>
					</div>	

    				<div class="col-md-4" style="padding-left: 0; padding-right:0">
                        <label class="text-capitalize font-500 font-14">@lang("msg.Comments") : </label>
                        <span class="font-14"> {{ $reports_1->comment }} </span>
					</div>	
                    <div style="clear:both; margin-top:5px;"></div>
                </div>
				</div>
		</div>
	</div>

    <div class="col-md-12">
		<div class="box box-primary border-light-blue">
			<div class="box-body padding-top-5" style="padding-bottom:10px">
				<h4 class="font-500 text-uppercase font-15">@lang("msg.Insurance Information")</h4>
                <div class="form-inline border-top" style="padding-top:10px">
					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">@lang("msg.Social Security") : </label>
						<span class="font-14">{{ $reports_1->ss }}  </span>
					</div>
					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">@lang("msg.Medicare") : </label>
						<span class="font-14">{{ $reports_1->medicare }} </span>
					</div>
					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">@lang("msg.Supplemantal Insurance Name") : </label>
						<span class="font-14">{{ $reports_1->supplemental_insurance_name }} </span>
					</div>
					<div class="col-md-4" style="padding-left: 0; padding-right:0">

						<label class="text-capitalize font-500 font-14">@lang("msg.Policy") : </label>
						<span class="font-14">{{ $reports_1->policy }} </span>
					</div>
					<div class="col-md-4" style="padding-left: 0; padding-right:0">

						<label class="text-capitalize font-500 font-14">@lang("msg.Medicaid") : </label>
						<span class="font-14">{{ $reports_1->medicaid }} </span>
					</div>
					<div class="col-md-4" style="padding-left: 0; padding-right:0">

						<label class="text-capitalize font-500 font-14">@lang("msg.Responsible For Financial Matters") : </label>
						<span class="font-14">{{ $reports_1->personal_responcible }}</span>
					</div>
                    @if($reports_1->personal_responcible == "Others")
                    <div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">@lang("msg.Name") : </label>
						<span class="font-14">{{ $reports_1->name }}</span>
					</div>	

                    <div class="col-md-4" style="padding-left: 0; padding-right:0">

						<label class="text-capitalize font-500 font-14">@lang("msg.Phone") : </label>
						<span class="font-14">{{ $reports_1->phone }}</span>
						</div>

                    <div class="col-md-4" style="padding-left: 0; padding-right:0">

                        <label class="text-capitalize font-500 font-14">@lang("msg.Address") 1 : </label>
                        <span class="font-14">{{ $reports_1->address_1 }}</span>
						</div>

                   <div class="col-md-4" style="padding-left: 0; padding-right:0">

                        <label class="text-capitalize font-500 font-14">@lang("msg.Address") 2 : </label>
                        <span class="font-14">{{ $reports_1->address_2 }}</span>
					</div>	

                    <div class="col-md-4" style="padding-left: 0; padding-right:0">

						<label class="text-capitalize font-500 font-14">@lang("msg.City") : </label>
						<span class="font-14">{{ $reports_1->city }} </span>
						</div>

                   <div class="col-md-4" style="padding-left: 0; padding-right:0">

						<label class="text-capitalize font-500 font-14">@lang("msg.State") : </label>
                        @if($reports_1->state_id == 1)
						<span class="font-14">Assam</span>
                        @elseif($reports_1->state_id == 2)
                        <span class="font-14">Megahlaya</span>
						</div>
                        @endif

                    <div class="col-md-4" style="padding-left: 0; padding-right:0">

						<label class="text-capitalize font-500 font-14">Zip : </label>
						<span class="font-14">{{ $reports_1->zip }} </span>
					</div>	
						
                    @endif
                   <div class="col-md-4" style="padding-left: 0; padding-right:0">

						<label class="text-capitalize font-500 font-14">@lang("msg.Case Manager") : </label>
						<span class="font-14">{{ $reports_1->case_manager }} </span>
					</div>	

                    <div class="col-md-4" style="padding-left: 0; padding-right:0">

						<label class="text-capitalize font-500 font-14">@lang("msg.Case Manager Phone") : </label>
						<span class="font-14">{{ $reports_1->manager_phone }} </span>
						</div>

                    <div style="clear:both; margin-top:7px"></div>
                </div>
			</div>
		</div>
	</div>

    <div class="col-md-12">
		<div class="box box-primary border-light-blue">
			<div class="box-body padding-top-5" style="padding-bottom:10px">
				<h4 class="font-500 text-uppercase font-15">@lang("msg.Emergency Contact")</h4>
                <div class="form-inline border-top" style="padding-top:10px">

				<div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">@lang("msg.Name") 1 : </label>
					<span class="font-14">{{ $reports_2->name_1 }} </span>
				</div>	

				<div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">@lang("msg.Relation") : </label>
					<span class="font-14">{{ $reports_2->relation_1 }} </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">@lang("msg.Address") 1 : </label>
					<span class="font-14">{{ $reports_2->address_1 }} </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
                    <label class="text-capitalize font-500 font-14">@lang("msg.Address") 2 : </label>
                    <span class="font-14">{{ $reports_2->address_2 }} </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
                    <label class="text-capitalize font-500 font-14">@lang("msg.City") 1 : </label>
                    <span class="font-14">{{ $reports_2->city_1 }} </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">@lang("msg.Home Phone") 1 : </label>
					<span class="font-14">{{ $reports_2->home_phn_1 }} </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">@lang("msg.Work Phone") 1 : </label>
					<span class="font-14">{{ $reports_2->work_phone_1 }} </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">@lang("msg.Name") 2 : </label>
					<span class="font-14">{{ $reports_2->name_2 }} </span>
				</div>	

				<div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">@lang("msg.Relation") : </label>
					<span class="font-14">{{ $reports_2->relation_2 }} </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">@lang("msg.Address") 1 : </label>
					<span class="font-14">{{ $reports_2->address_1_1 }} </span>
				</div>	

               <div class="col-md-4" style="padding-left: 0; padding-right:0">
                    <label class="text-capitalize font-500 font-14">@lang("msg.Address") 2 : </label>
                    <span class="font-14">{{ $reports_2->address_2_2 }} </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
                    <label class="text-capitalize font-500 font-14">@lang("msg.City") 2 : </label>
                    <span class="font-14">{{ $reports_2->city_2 }} </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">@lang("msg.Home Phone") 2 : </label>
					<span class="font-14">{{ $reports_2->home_phn_2 }} </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">@lang("msg.Work Phone") 2 : </label>
					<span class="font-14">{{ $reports_2->work_phone_2 }} </span>
				</div>	

               <div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">@lang("msg.Power Of Attorney") : </label>
					<span class="font-14">{{ $reports_2->poa }} </span>
				</div>	

				<div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">POA @lang("msg.Relation") : </label>
					<span class="font-14">{{ $reports_2->poa_relation }} </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">POA @lang("msg.Phone") : </label>
					<span class="font-14">{{ $reports_2->poa_phone }} </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
                    <label class="text-capitalize font-500 font-14">@lang("msg.Guardian") : </label>
                    <span class="font-14">{{ $reports_2->guardian }} </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
                    <label class="text-capitalize font-500 font-14">@lang("msg.Guardian Phone") : </label>
                    <span class="font-14">{{ $reports_2->guardian_phone }} </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">@lang("msg.Guardian Address") 1 : </label>
					<span class="font-14">{{ $reports_2->guardian_address_1 }} </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">@lang("msg.Guardian Address") 2 : </label>
					<span class="font-14">{{ $reports_2->guardian_address_2 }} </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">@lang("msg.Guardian City") : </label>
					<span class="font-14">{{ $reports_2->guardian_city }} </span>
				</div>	

                </div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="box box-primary border-light-blue">
			<div class="box-body padding-top-5" style="padding-bottom:10px">
				<h4 class="font-500 text-uppercase font-15">@lang("msg.Physician Details")</h4>
				<div class="form-inline border-top" style="padding-top:10px">

					<div class="col-md-3" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">@lang("msg.Primary Physician") : </label>
					<span class="font-14">{{ $reports_1->primary_physician }} </span>
					</div>

					<div class="col-md-3" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">@lang("msg.Physician Phone") : </label>
					<span class="font-14">{{ $reports_1->pry_phone }} </span>
					</div>

					<div class="col-md-3" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">@lang("msg.Physician Address") 1 : </label>
					<span class="font-14">{{ $reports_1->pry_add_1 }} </span>
					</div>

					<div class="col-md-3" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">@lang("msg.Physician Address") 2 : </label>
					<span class="font-14">{{ $reports_1->pry_add_1 }} </span>
					</div>
					

					<div class="col-md-3" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">@lang("msg.Physician City") : </label>
					<span class="font-14">{{ $reports_1->pry_city }} </span>
					</div>

					<div class="col-md-3" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">@lang("msg.Specialist Physician") : </label>
					<span class="font-14">{{ $reports_1->spc_physician }} </span>
					</div>

					<div class="col-md-3" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">@lang("msg.Specialist Type") : </label>
					<span class="font-14">{{ $reports_1->spc_type }} </span>
					</div>

					<div class="col-md-3" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">@lang("msg.Specialist Phone") : </label>
					<span class="font-14">{{ $reports_1->spc_phone }} </span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-12">
		<div class="box box-primary border-light-blue">
			<div class="box-body padding-top-5" style="padding-bottom:10px">
				<h4 class="font-500 text-uppercase font-15">@lang("msg.Dentist Details")</h4>
				<div class="form-inline border-top" style="padding-top:10px">

					<div class="col-md-3" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">@lang("msg.Dentist Name") : </label>
					<span class="font-14">{{ $reports_1->dentist_name }} </span>
					</div>

					<div class="col-md-3" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">@lang("msg.Dentist Phone") : </label>
					<span class="font-14">{{ $reports_1->dentist_phone }} </span>
					</div>

					<div class="col-md-3" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">@lang("msg.Dentist Address") 1 : </label>
					<span class="font-14">{{ $reports_1->dentist_address_1 }} </span>
					</div>

					<div class="col-md-3" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">@lang("msg.Dentist Address") 2 : </label>
					<span class="font-14">{{ $reports_1->dentist_address }} </span>
					</div>

					<div class="col-md-3" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">@lang("msg.Dentist City") : </label>
					<span class="font-14">{{ $reports_1->dentist_city }} </span>
					</div>

					<div style="margin-top:10px"></div>
				</div>
			</div>
		</div>
	</div>

		<div class="col-md-12">
			<div class="box box-primary border-light-blue">
				<div class="box-body padding-top-5" style="padding-bottom:10px">
					<h4 class="font-500 text-uppercase font-15">@lang("msg.Hospital & Pharmacy")</h4>
					<div class="form-inline border-top" style="padding-top:10px">

						<div class="col-md-3" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">@lang("msg.Hospital Name") : </label>
						<span class="font-14">{{ $reports_1->hospital }} </span>
						</div>

						<div class="col-md-3" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">@lang("msg.Hospital Phone") : </label>
						<span class="font-14">{{ $reports_1->hospital_phone }} </span>
						</div>

						<div class="col-md-3" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">@lang("msg.Pharmacy") : </label>
						<span class="font-14">{{ $reports_1->pharmacy }} </span>
						</div>

						<div class="col-md-3" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">@lang("msg.Pharmacy Phone") : </label>
						<span class="font-14">{{ $reports_1->pharmacy_phone }} </span>
						</div>

						<div class="col-md-3" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">@lang("msg.Allergies") : </label>
						<span class="font-14">{{ $reports_1->allergies }} </span>
						</div>

						<div class="col-md-3" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">@lang("msg.Diagnosis") : </label>
						<span class="font-14">{{ $reports_1->diagnosis }} </span>
						</div>

						<div class="col-md-3" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">CPR @lang("msg.Status") : </label>
						<span class="font-14">{{ $reports_1->cpr_status }} </span>
						</div>

						<div style="margin-top:10px"></div>
					</div>
				</div>
			</div>
		</div>
	<div class="col-md-12">
		<div class="box box-primary border-light-blue">
			<div class="box-body padding-top-5" style="padding-bottom:10px">
				<h4 class="font-500 text-uppercase font-15">@lang("msg.Funeral Home")</h4>
				<div class="form-inline border-top" style="padding-top:10px">

					<div class="col-md-3" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">@lang("msg.Funeral Home") : </label>
					<span class="font-14">{{ $reports_1->funeral_home }} </span>
					</div>

				   <div class="col-md-3" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">@lang("msg.Phone") : </label>
					<span class="font-14">{{ $reports_1->funeral_phone }} </span>
					</div>
					<div style="margin-top:10px"></div>
				</div>
			</div>
		</div>
	</div>
</div>
@endif

@endsection
