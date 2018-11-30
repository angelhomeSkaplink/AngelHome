
@extends('layouts.app')

@section('htmlheader_title')
    Prospective Add
@endsection

@section('contentheader_title')
	@if($reports_1 != NULL && $reports_2 != NULL)
	<div class="form-group has-feedback pull-right" style="padding-right:15px;">
        <a href="../screening_next/{{ $id }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom">next</a>
    </div>
	@endif
	<div class="form-group has-feedback pull-right" style="padding-right:15px;">
        <a href="{{ url('screening') }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom">Go Back</a>
    </div>
@endsection

@section('main-content')

<div class="row">
	<div class="col-md-12">
		@if($reports_1 == NULL && $reports_2 == NULL)
		<h4 class="text-danger"><b>NO SCREENING RECORD FOUND</b></h4>
		@else
		<div class="box box-primary border-light-blue">
			<div class="box-body padding-top-5" style="padding-bottom:10px">
				<h4 class="font-500 text-uppercase font-15" >Responsible Personal Information</h4>
                <div class="form-inline border-top" style="padding-top:10px">
					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Name : </label>
						<span class="font-14">{{ $reports_1->responsible_person_responsible }} </span>
					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Address 1 : </label>
						<span class="font-14">{{ $reports_1->address1_responsible }} </span>
					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Address 2 : </label>
						<span class="font-14">{{ $reports_1->address2_responsible }} </span>
					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">City : </label>
						<span class="font-14">{{ $reports_1->city_responsible }} </span>
					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">State : </label>
						<span class="font-14">{{ $reports_1->state_responsible }} </span>
					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Zip Code : </label>
						<span class="font-14">{{ $reports_1->zipcode_responsible }}</span>
					</div>

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Phone : </label>
						<span class="font-14"> {{ $reports_1->phone_responsible }} </span>
					</div>	

    				<div class="col-md-4" style="padding-left: 0; padding-right:0">
                        <label class="text-capitalize font-500 font-14">Email : </label>
                        <span class="font-14"> {{ $reports_1->email_responsible }} </span>
					</div>					
                    <div style="clear:both; margin-top:5px;"></div>
                </div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="box box-primary border-light-blue">
			<div class="box-body padding-top-5" style="padding-bottom:10px">
				<h4 class="font-500 text-uppercase font-15" >Significant Personal Information</h4>
                <div class="form-inline border-top" style="padding-top:10px">
					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Name : </label>
						<span class="font-14">{{ $reports_1->other_significant_person_significant }} </span>
					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Address 1 : </label>
						<span class="font-14">{{ $reports_1->address1_significant }} </span>
					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Address 2 : </label>
						<span class="font-14">{{ $reports_1->address2_significant }} </span>
					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">City : </label>
						<span class="font-14">{{ $reports_1->city_significant }} </span>
					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">State : </label>
						<span class="font-14">{{ $reports_1->state_significant }} </span>
					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Zip Code : </label>
						<span class="font-14">{{ $reports_1->zipcode_significant }}</span>
					</div>

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Phone : </label>
						<span class="font-14"> {{ $reports_1->phone_significant }} </span>
					</div>	

    				<div class="col-md-4" style="padding-left: 0; padding-right:0">
                        <label class="text-capitalize font-500 font-14">Email : </label>
                        <span class="font-14"> {{ $reports_1->email_significant }} </span>
					</div>					
                    <div style="clear:both; margin-top:5px;"></div>
                </div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="box box-primary border-light-blue">
			<div class="box-body padding-top-5" style="padding-bottom:10px">
				<h4 class="font-500 text-uppercase font-15" >RESIDENT DETAIL</h4>
                <div class="form-inline border-top" style="padding-top:10px">
					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Height : </label>
						<span class="font-14">{{ $reports_1->height_resident }} </span>
					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">weight : </label>
						<span class="font-14">{{ $reports_1->weight_resident }} </span>
					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Social Security : </label>
						<span class="font-14">{{ $reports_1->social_security_resident }} </span>
					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Medicare : </label>
						<span class="font-14">{{ $reports_1->medicare_resident }} </span>
					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">VA : </label>
						<span class="font-14">{{ $reports_1->va_resident }} </span>
					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">Other Insurance Name : </label>
						<span class="font-14">{{ $reports_1->other_insurance_name_resident }}</span>
					</div>
				
                    <div style="clear:both; margin-top:5px;"></div>
                </div>
			</div>
		</div>
	</div>
	@endif
</div>

@include('layouts.partials.scripts_auth')

@endsection
