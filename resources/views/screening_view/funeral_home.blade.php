@extends('layouts.app')

@section('htmlheader_title')
    Funeral Home Details
@endsection

@section('contentheader_title')
  <?php $name = DB::table('sales_pipeline')->where('id', $id)->first(); ?>
    <p class="text-danger"><b>Funeral Home Details For {{ $name->pros_name }}</b></p>
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
               <li class="nav-item active">
                 <a class="nav-link" href="../funeral_view/{{ $id }}">FUNERAL HOME</a>
               </li>
             </ul>
        </div>
    </div>
    <div class="row" style="padding-top:5px; ">
        @php
        $data = DB::table('funeral_home')->where([['pros_id',$id],['status',1]])->first();
    @endphp
    <div class="col-md-12">
        @if($data)
        <div class="box box-primary border-light-blue">
          <div class="box-body padding-top-5" style="padding-bottom:10px">
            <h4 class="font-500 text-uppercase font-15" >Funeral Home Information</h4>
                    <div class="form-inline border-top" style="padding-top:10px">
              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                <label class="text-capitalize font-500 font-14">Name : </label>
                <span class="font-14">{{ $data->funeral_home }} </span>
              </div>	
    
              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                <label class="text-capitalize font-500 font-14">Phone : </label>
                <span class="font-14">{{ $data->phone }} </span>
              </div>	
    
              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                <label class="text-capitalize font-500 font-14">City : </label>
                <span class="font-14">{{ $data->city }} </span>
              </div>	
    
              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                <label class="text-capitalize font-500 font-14">Address : </label>
                <span class="font-14">{{ $data->address }} </span>
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
<div class="hidden" id="printable">
      
</div>
@include('layouts.partials.scripts_auth')
<script>
  $('document').ready(function(){
    $('#printable').load('../AllScreen/'+{{ $id }});
  });
</script>
@endsection
