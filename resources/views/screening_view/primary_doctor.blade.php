@extends('layouts.app')

@section('htmlheader_title')
    Physician & Denstist
@endsection

@section('contentheader_title')
  <?php $name = DB::table('sales_pipeline')->where('id', $id)->first(); ?>
    <p class="text-danger"><b>Physician and Dentist details for {{ $name->pros_name }}</b></p>
    <span class="pull-right" style="padding-right:20px;"><button class="btn btn-primary" onclick="printDiv('printable')" id="printButton"><i class="material-icons md-22"> print </i> Print</button></span>
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
               <li class="nav-item">
                 <a class="nav-link" href="../details_view/{{ $id }}">RESIDENT DETAILS</a>
               </li>
               <li class="nav-item active">
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
        $data = DB::table('primary_doctor_details')->where([['pros_id',$id],['status',1]])->first();
    @endphp
    <div class="col-md-12">
        @if($data)
        <div class="box box-primary border-light-blue">
          <div class="box-body padding-top-5" style="padding-bottom:10px">
            <h4 class="font-500 text-uppercase font-15" > Physician Information</h4>
                    <div class="form-inline border-top" style="padding-top:10px">
              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                <label class="text-capitalize font-500 font-14">Primary Physician : </label>
                <span class="font-14">{{ $data->primary_doctor_primary }} </span>
              </div>	
    
              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                <label class="text-capitalize font-500 font-14">Address 1 : </label>
                <span class="font-14">{{ $data->address1_primary }} </span>
              </div>	
    
              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                <label class="text-capitalize font-500 font-14">Address 2 : </label>
                <span class="font-14">{{ $data->address2_primary }} </span>
              </div>	
    
              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                <label class="text-capitalize font-500 font-14">City : </label>
                <span class="font-14">{{ $data->city_primary }} </span>
              </div>	
    
              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                <label class="text-capitalize font-500 font-14">State : </label>
                <span class="font-14">{{ $data->state_primary }} </span>
              </div>	
    
              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                <label class="text-capitalize font-500 font-14">Zip Code : </label>
                <span class="font-14">{{ $data->zipcode_primary }}</span>
              </div>
    
              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                <label class="text-capitalize font-500 font-14">Phone : </label>
                <span class="font-14"> {{ $data->phone_primary_doctor }} </span>
              </div>	
    
              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                  <label class="text-capitalize font-500 font-14">Email : </label>
                  <span class="font-14"> {{ $data->email_primary_doctor }} </span>
              </div>
            </div>
          </div>
        </div>
        <div class="box box-primary border-light-blue">
          <div class="box-body padding-top-5" style="padding-bottom:10px">
            <h4 class="font-500 text-uppercase font-15" > Special Physician Information</h4>
              <div class="form-inline border-top" style="padding-top:10px">
              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                <label class="text-capitalize font-500 font-14">Special Physician : </label>
                <span class="font-14">{{ $data->specialist_doctor_primary }} </span>
              </div>	
    
              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                <label class="text-capitalize font-500 font-14">Address 1 : </label>
                <span class="font-14">{{ $data->specialist_address1_primary }} </span>
              </div>	
    
              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                <label class="text-capitalize font-500 font-14">Address 2 : </label>
                <span class="font-14">{{ $data->specialist_address2_primary }} </span>
              </div>	
    
              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                <label class="text-capitalize font-500 font-14">City : </label>
                <span class="font-14">{{ $data->specialist_city_primary }} </span>
              </div>	
    
              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                <label class="text-capitalize font-500 font-14">State : </label>
                <span class="font-14">{{ $data->specialist_state_primary }} </span>
              </div>	
    
              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                <label class="text-capitalize font-500 font-14">Zip Code : </label>
                <span class="font-14">{{ $data->specialist_zipcode_primary }}</span>
              </div>
    
              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                <label class="text-capitalize font-500 font-14">Phone : </label>
                <span class="font-14"> {{ $data->specialist_phone_primary_doctor }} </span>
              </div>
            </div>
          </div>
        </div>
        <div class="box box-primary border-light-blue">
          <div class="box-body padding-top-5" style="padding-bottom:10px">
            <h4 class="font-500 text-uppercase font-15" > Dentist Information</h4>
                    <div class="form-inline border-top" style="padding-top:10px">
              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                <label class="text-capitalize font-500 font-14">Dentist : </label>
                <span class="font-14">{{ $data->dentist }} </span>
              </div>	
    
              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                <label class="text-capitalize font-500 font-14">Address 1 : </label>
                <span class="font-14">{{ $data->dentist_address1 }} </span>
              </div>	
    
              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                <label class="text-capitalize font-500 font-14">Address 2 : </label>
                <span class="font-14">{{ $data->dentist_address2 }} </span>
              </div>	
    
              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                <label class="text-capitalize font-500 font-14">City : </label>
                <span class="font-14">{{ $data->dentist_city }} </span>
              </div>	
    
              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                <label class="text-capitalize font-500 font-14">State : </label>
                <span class="font-14">{{ $data->dentist_state }} </span>
              </div>	
    
              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                <label class="text-capitalize font-500 font-14">Zip Code : </label>
                <span class="font-14">{{ $data->dentist_zip }}</span>
              </div>
    
              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                <label class="text-capitalize font-500 font-14">Phone : </label>
                <span class="font-14"> {{ $data->dentist_phone }} </span>
              </div>
            </div>
          </div>
        </div>
        @else
        <h4 class="text-danger"><b>NO SCREENING RECORD FOUND</b></h4>
        @endif
      </div>
    </div>
</div>
<div class="hidden" id="printable">
      
</div>
@include('layouts.partials.scripts_auth')
<script>
  $('document').ready(function(){
    $('#printable').load('../AllScreen/'+{{ $id }});
  });
</script>
@endsection
