
@extends('layouts.app')

@section('htmlheader_title')
    Prospective Add
@endsection

@section('contentheader_title')

@endsection

@section('main-content')

<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="js/bootstrap-datepicker.js"></script>
<!-- <div style="margin-bottom:-30px"></div> -->


@if($reports_1 == NULL && $reports_2 == NULL)
<div class="box box-primary border-light-blue" style="padding:10px;padding-left: 25px;font-size:20px;color:red;">
    <span>No records found!</span><br>
    <button style="color:black;" onclick="javascript:history.back()">Go Back</button>
</div>
@endif

@if($reports_1 != NULL && $reports_2 != NULL)
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary border-light-blue">
			@if(Session::has('msg'))
				<div class="alert alert-danger">
					<strong>{{ Session::get('msg') }}</strong>
				</div>
			@endif
			<div class="box-body padding-top-5" style="padding-bottom:10px">
				<h4 class="font-500 text-uppercase font-15">Personal Information</h4>
                <div class="form-inline border-top" style="padding-top:10px">

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Gender : </label>
						<span class="font-14">{{ $reports_1->gender }} </span>
					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Date Of Birth : </label>
						<span class="font-14">{{ $reports_1->dob }} </span>
					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Place Of Birth : </label>
						<span class="font-14">{{ $reports_1->pob }} </span>
					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Age : </label>
						<span class="font-14">{{ $reports_1->age }} </span>
					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Marital Status : </label>
						<span class="font-14">{{ $reports_1->ms }} </span>
					</div>	

                    @if($reports_1->ms == "Married")
					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Spouse name : </label>
						<span class="font-14">{{ $reports_1->spouse_name }}</span>
					</div>	
                    @endif

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Religion : </label>
						<span class="font-14"> {{ $reports_1->religion }} </span>
					</div>	

    				<div class="col-md-4" style="padding-left: 0; padding-right:0">
                        <label class="text-capitalize font-500 font-14">Comments : </label>
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
				<h4 class="font-500 text-uppercase font-15">Insurance Information</h4>

                <div class="form-inline border-top" style="padding-top:10px">
                <div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Social Security : </label>
						<span class="font-14">{{ $reports_1->ss }}  </span>
					</div>	


					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Medicare : </label>
						<span class="font-14">{{ $reports_1->medicare }} </span>
					</div>	


					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Supplemantal Insurance Name : </label>
						<span class="font-14">{{ $reports_1->supplemental_insurance_name }} </span>
						</div>


					<div class="col-md-4" style="padding-left: 0; padding-right:0">

						<label class="text-capitalize font-500 font-14">Policy : </label>
						<span class="font-14">{{ $reports_1->policy }} </span>
					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">

						<label class="text-capitalize font-500 font-14">Medicaid : </label>
						<span class="font-14">{{ $reports_1->medicaid }} </span>
					</div>	


					<div class="col-md-4" style="padding-left: 0; padding-right:0">

						<label class="text-capitalize font-500 font-14">Responsible For Financial Matters : </label>
						<span class="font-14">{{ $reports_1->personal_responcible }}</span>
					</div>	

                    @if($reports_1->personal_responcible == "Others")
                    <div class="col-md-4" style="padding-left: 0; padding-right:0">

						<label class="text-capitalize font-500 font-14">Name : </label>
						<span class="font-14">{{ $reports_1->name }}</span>
					</div>	

                    <div class="col-md-4" style="padding-left: 0; padding-right:0">

						<label class="text-capitalize font-500 font-14">Phone : </label>
						<span class="font-14">{{ $reports_1->phone }}</span>
						</div>

                    <div class="col-md-4" style="padding-left: 0; padding-right:0">

                        <label class="text-capitalize font-500 font-14">Address 1 : </label>
                        <span class="font-14">{{ $reports_1->address_1 }}</span>
						</div>

                   <div class="col-md-4" style="padding-left: 0; padding-right:0">

                        <label class="text-capitalize font-500 font-14">Address 2 : </label>
                        <span class="font-14">{{ $reports_1->address_2 }}</span>
					</div>	

                    <div class="col-md-4" style="padding-left: 0; padding-right:0">

						<label class="text-capitalize font-500 font-14">City : </label>
						<span class="font-14">{{ $reports_1->city }} </span>
						</div>

                   <div class="col-md-4" style="padding-left: 0; padding-right:0">

						<label class="text-capitalize font-500 font-14">State : </label>
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

						<label class="text-capitalize font-500 font-14">Case Manager : </label>
						<span class="font-14">{{ $reports_1->case_manager }} </span>
					</div>	

                    <div class="col-md-4" style="padding-left: 0; padding-right:0">

						<label class="text-capitalize font-500 font-14">Case Manager Phone : </label>
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
				<h4 class="font-500 text-uppercase font-15">Emergency Contact</h4>
                <div class="form-inline border-top" style="padding-top:10px">

				<div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">Name 1 : </label>
					<span class="font-14">{{ $reports_2->name_1 }} </span>
				</div>	

				<div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">Relation : </label>
					<span class="font-14">{{ $reports_2->relation_1 }} </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">Address 1 : </label>
					<span class="font-14">{{ $reports_2->address_1 }} </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
                    <label class="text-capitalize font-500 font-14">Address 2 : </label>
                    <span class="font-14">{{ $reports_2->address_2 }} </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
                    <label class="text-capitalize font-500 font-14">City 1 : </label>
                    <span class="font-14">{{ $reports_2->city_1 }} </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">Home Phone 1 : </label>
					<span class="font-14">{{ $reports_2->home_phn_1 }} </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">Work Phone 1 : </label>
					<span class="font-14">{{ $reports_2->work_phone_1 }} </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">Name 2 : </label>
					<span class="font-14">{{ $reports_2->name_2 }} </span>
				</div>	

				<div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">Relation : </label>
					<span class="font-14">{{ $reports_2->relation_2 }} </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">Address 1 : </label>
					<span class="font-14">{{ $reports_2->address_1_1 }} </span>
				</div>	

               <div class="col-md-4" style="padding-left: 0; padding-right:0">
                    <label class="text-capitalize font-500 font-14">Address 2 : </label>
                    <span class="font-14">{{ $reports_2->address_2_2 }} </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
                    <label class="text-capitalize font-500 font-14">City 2 : </label>
                    <span class="font-14">{{ $reports_2->city_2 }} </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">Home Phone 2 : </label>
					<span class="font-14">{{ $reports_2->home_phn_2 }} </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">Work Phone 2 : </label>
					<span class="font-14">{{ $reports_2->work_phone_2 }} </span>
				</div>	

               <div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">Power Of Attorney : </label>
					<span class="font-14">{{ $reports_2->poa }} </span>
				</div>	

				<div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">POA Relation : </label>
					<span class="font-14">{{ $reports_2->poa_relation }} </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">POA Phone : </label>
					<span class="font-14">{{ $reports_2->poa_phone }} </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
                    <label class="text-capitalize font-500 font-14">Guardian : </label>
                    <span class="font-14">{{ $reports_2->guardian }} </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
                    <label class="text-capitalize font-500 font-14">Guardian Phone : </label>
                    <span class="font-14">{{ $reports_2->guardian_phone }} </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">Guardian Address 1 : </label>
					<span class="font-14">{{ $reports_2->guardian_address_1 }} </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">Guardian Address 2 : </label>
					<span class="font-14">{{ $reports_2->guardian_address_2 }} </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">Guardian City : </label>
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
        <h4 class="font-500 text-uppercase font-15">Physician Details</h4>
        <div class="form-inline border-top" style="padding-top:10px">

            <div class="col-md-3" style="padding-left: 0; padding-right:0">
            <label class="text-capitalize font-500 font-14">Primary Physician : </label>
            <span class="font-14">{{ $reports_1->primary_physician }} </span>
			</div>

            <div class="col-md-3" style="padding-left: 0; padding-right:0">
            <label class="text-capitalize font-500 font-14">Physician Phone : </label>
            <span class="font-14">{{ $reports_1->pry_phone }} </span>
			</div>

            <div class="col-md-3" style="padding-left: 0; padding-right:0">
            <label class="text-capitalize font-500 font-14">Physician Address 1 : </label>
            <span class="font-14">{{ $reports_1->pry_add_1 }} </span>
			</div>

            <div class="col-md-3" style="padding-left: 0; padding-right:0">
            <label class="text-capitalize font-500 font-14">Physician Address 2 : </label>
            <span class="font-14">{{ $reports_1->pry_add_1 }} </span>
			</div>
			

            <div class="col-md-3" style="padding-left: 0; padding-right:0">
            <label class="text-capitalize font-500 font-14">Physician City : </label>
            <span class="font-14">{{ $reports_1->pry_city }} </span>
			</div>

            <div class="col-md-3" style="padding-left: 0; padding-right:0">
            <label class="text-capitalize font-500 font-14">Specialist Physician : </label>
            <span class="font-14">{{ $reports_1->spc_physician }} </span>
			</div>

            <div class="col-md-3" style="padding-left: 0; padding-right:0">
            <label class="text-capitalize font-500 font-14">Specialist Type : </label>
            <span class="font-14">{{ $reports_1->spc_type }} </span>
			</div>

            <div class="col-md-3" style="padding-left: 0; padding-right:0">
            <label class="text-capitalize font-500 font-14">Specialist Phone : </label>
            <span class="font-14">{{ $reports_1->spc_phone }} </span>
			</div>
        </div>
    </div>
</div>
</div>

<div class="col-md-12">
<div class="box box-primary border-light-blue">
    <div class="box-body padding-top-5" style="padding-bottom:10px">
        <h4 class="font-500 text-uppercase font-15">Dentist Details</h4>
        <div class="form-inline border-top" style="padding-top:10px">

            <div class="col-md-3" style="padding-left: 0; padding-right:0">
            <label class="text-capitalize font-500 font-14">Dentist Name : </label>
            <span class="font-14">{{ $reports_1->dentist_name }} </span>
			</div>

            <div class="col-md-3" style="padding-left: 0; padding-right:0">
            <label class="text-capitalize font-500 font-14">Dentist Phone : </label>
            <span class="font-14">{{ $reports_1->dentist_phone }} </span>
			</div>

            <div class="col-md-3" style="padding-left: 0; padding-right:0">
            <label class="text-capitalize font-500 font-14">Dentist Address 1 : </label>
            <span class="font-14">{{ $reports_1->dentist_address_1 }} </span>
			</div>

            <div class="col-md-3" style="padding-left: 0; padding-right:0">
            <label class="text-capitalize font-500 font-14">Dentist Address 2 : </label>
            <span class="font-14">{{ $reports_1->dentist_address }} </span>
			</div>

            <div class="col-md-3" style="padding-left: 0; padding-right:0">
            <label class="text-capitalize font-500 font-14">Dentist City : </label>
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
        <h4 class="font-500 text-uppercase font-15">Funeral Home And Pharmacy</h4>
        <div class="form-inline border-top" style="padding-top:10px">

            <div class="col-md-3" style="padding-left: 0; padding-right:0">
            <label class="text-capitalize font-500 font-14">Funeral Home : </label>
            <span class="font-14">{{ $reports_1->funeral_home }} </span>
			</div>

           <div class="col-md-3" style="padding-left: 0; padding-right:0">
            <label class="text-capitalize font-500 font-14">Phone : </label>
            <span class="font-14">{{ $reports_1->funeral_phone }} </span>
			</div>

            <div class="col-md-3" style="padding-left: 0; padding-right:0">
            <label class="text-capitalize font-500 font-14">Hospital Name : </label>
            <span class="font-14">{{ $reports_1->hospital }} </span>
			</div>

            <div class="col-md-3" style="padding-left: 0; padding-right:0">
            <label class="text-capitalize font-500 font-14">Hospital Phone : </label>
            <span class="font-14">{{ $reports_1->hospital_phone }} </span>
			</div>

            <div class="col-md-3" style="padding-left: 0; padding-right:0">
            <label class="text-capitalize font-500 font-14">Pharmacy : </label>
            <span class="font-14">{{ $reports_1->pharmacy }} </span>
			</div>

            <div class="col-md-3" style="padding-left: 0; padding-right:0">
            <label class="text-capitalize font-500 font-14">Pharmacy Phone : </label>
            <span class="font-14">{{ $reports_1->pharmacy_phone }} </span>
			</div>

            <div class="col-md-3" style="padding-left: 0; padding-right:0">
            <label class="text-capitalize font-500 font-14">Allergies : </label>
            <span class="font-14">{{ $reports_1->allergies }} </span>
			</div>

            <div class="col-md-3" style="padding-left: 0; padding-right:0">
            <label class="text-capitalize font-500 font-14">Diagnosis : </label>
            <span class="font-14">{{ $reports_1->diagnosis }} </span>
			</div>

            <div class="col-md-3" style="padding-left: 0; padding-right:0">
            <label class="text-capitalize font-500 font-14">CPR Status : </label>
            <span class="font-14">{{ $reports_1->cpr_status }} </span>
			</div>

            <div style="margin-top:10px"></div>
        </div>
    </div>
</div>
</div>

</div>
@endif

@endsection
