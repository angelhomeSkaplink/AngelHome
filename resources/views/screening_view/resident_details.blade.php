@extends('layouts.app')

@section('htmlheader_title')
    Personal Details
@endsection

@section('contentheader_title')
  <?php $name = DB::table('sales_pipeline')->where('id', $id)->first(); ?>
    <p class="text-danger"><b>Personal details for {{ $name->pros_name }}</b></p>
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
<div class="panel-body">
    <div class="row">
        <div class="col-lg-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist" sstyle="margin-left:-14px; margin-right:-14px; margin-top:1px">
                <li class="nav-item">
                 <a class="nav-link" href="../screening_view/{{ $id }}">RESPOSIBLE PERSONNEL</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="../significant_view/{{ $id }}">SIGNIFICANT PERSONNEL</a>
               </li>
               <li class="nav-item active">
                 <a class="nav-link" href="../details_view/{{ $id }}">RESIDENT DETAILS</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="../physician_view/{{ $id }}">PHYSICIAN & DENTIST</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="../hospital_view/{{ $id }}">HOSPITAL & PHARMACY</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="../equipment_view/{{ $id }}">MEDICAL EQUIPMENT</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="../doc_view/{{ $id }}">LEGAL DOCUMENT</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="../insurance_view/{{ $id }}">INSURANCE</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="../funeral_view/{{ $id }}">FUNERAL HOME</a>
               </li>
             </ul>
        </div>
    </div>
    <div class="row" style="padding-top:5px; ">
        @php
        $data = DB::table('resident_details')->where([['pros_id',$id],['status',1]])->first();
    @endphp
    <div class="col-md-12">
        @if($data)
        <div class="box box-primary border-light-blue">
          <div class="box-body padding-top-5" style="padding-bottom:10px">
            <h4 class="font-500 text-uppercase font-15" >Personal Information</h4>
                    <div class="form-inline border-top" style="padding-top:10px">
              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                <label class="text-capitalize font-500 font-14">Height : </label>
                <span class="font-14">{{ $data->height_resident }} </span>
              </div>	
    
              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                <label class="text-capitalize font-500 font-14">Weight : </label>
                <span class="font-14">{{ $data->weight_resident }} </span>
              </div>	
    
              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                <label class="text-capitalize font-500 font-14">Gender : </label>
                <span class="font-14">{{ $data->gender }} </span>
              </div>	
    
              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                <label class="text-capitalize font-500 font-14">Date Of Birth : </label>
                <span class="font-14">{{ $data->dob }} </span>
              </div>	
    
              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                <label class="text-capitalize font-500 font-14">Place Of Birth : </label>
                <span class="font-14">{{ $data->pob }} </span>
              </div>	
    
              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                <label class="text-capitalize font-500 font-14">Marital Status : </label>
                <span class="font-14">{{ $data->marital }}</span>
              </div>
    
              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                <label class="text-capitalize font-500 font-14">Religion : </label>
                <span class="font-14"> {{ $data->religion }} </span>
              </div>	
    
              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                  <label class="text-capitalize font-500 font-14">Social Security : </label>
                  <span class="font-14"> {{ $data->social_security_resident }} </span>
              </div>

              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                <label class="text-capitalize font-500 font-14">Medicare : </label>
                <span class="font-14"> {{ $data->medicare_resident }} </span>
              </div>

              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                <label class="text-capitalize font-500 font-14">VA : </label>
                <span class="font-14"> {{ $data->va_resident }} </span>
              </div>

              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                <label class="text-capitalize font-500 font-14">Other Insurance : </label>
                <span class="font-14"> {{ $data->other_insurance_name_resident }} </span>
              </div> 					
                  <div style="clear:both; margin-top:5px;"></div>
              </div>
          </div>
        </div>
        @else
        <h4 class="text-danger"><b>NO SCREENING RECORD FOUND</b></h4>
        @endif
      </div>
    </div>
</div>
@include('layouts.partials.scripts_auth')

@endsection
