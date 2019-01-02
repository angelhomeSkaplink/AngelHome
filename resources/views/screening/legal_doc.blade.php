@extends('layouts.app')

@section('htmlheader_title')
    Leagl Document
@endsection

@section('contentheader_title')
<?php $name = DB::table('sales_pipeline')->where('id', $id)->first();
    $n = explode(",",$name->pros_name);
?>
  <p class="text-danger"><b>Upload legal document for {{ $n[0] }} {{ $n[1] }} {{ $n[2] }}</b></p>
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
<script type="text/javascript">
    function ShowHideDiv() {
        var ms = document.getElementById("ms");
        var appointScedule = document.getElementById("appointScedule");
        appointScedule.style.display = ms.value == "Married" ? "block" : "none";
    }

	function ShowInsuranceDiv() {
        var personal_responcible = document.getElementById("personal_responcible");
        var financial_matter = document.getElementById("financial_matter");
        financial_matter.style.display = personal_responcible.value == "Others" ? "block" : "none";
		financial_matter1.style.display = personal_responcible.value == "Others" ? "block" : "none";
    }
</script>
<div class="box box-primary padding-bottom-25">
  <div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-left:-14px; margin-right:-14px; margin-top:1px">
      <li class="nav-item">
        <a class="nav-link" href="../resposible_personal/{{ $id }}">RESPOSIBLE PERSONNEL</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../significant_personal/{{ $id }}">SIGNIFICANT PERSONNEL</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../resident_details/{{ $id }}">RESIDENT DETAILS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../primary_doctor/{{ $id }}">PHYSICIAN & DENTIST</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../pharmacy/{{ $id }}">HOSPITAL & PHARMACY</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../medical_equipment/{{ $id }}">MEDICAL EQUIPMENT</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../legal_doc/{{ $id }}">LEGAL DOCUMENT</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../insurance/{{ $id }}">INSURANCE</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../funeral_home/{{ $id }}">FUNERAL HOME</a>
      </li>
    </ul>
    <div style="margin-top:35px"></div>
        <div class="tab-content" id="myTabContent">
            <div class="">
                <div class="col-md-12">
                    
                        <div class="row">
                            
                                <div class="col-md-7">
                                <form action="{{ action('ScreeningController@add_legal_doc') }}" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_method" value="PATCH">
                                    {{ csrf_field() }}
                                    <div class="box box-primary">				
                                        <div class="box-body padding-bottom-15">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <input type="hidden" class="form-control" name="pros_id" value="{{ $id }}" />
                                                    <label>Document name</label>
                                                    <div class="form-group has-feedback">
                                                        <input type="text" class="form-control" name="doc_name" maxlength="100" placeholder="" required/>
                                                    </div>
                                                    <div class="form-group has-feedback">
                                                    <label>Upload the document here</label>
                                                    <input id="file" type="file" class="form-control" name="doc_file" accept="image/*,.doc, .docx,.pdf,.odf,.odt" size="2MB" required/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group has-feedback">
                                                        <p style=""><strong>Supported file types:<span style="color:#bfbfbf"> .jpeg, .jpg, .png, .gif, .tiff, .bmp, .doc, .docx, .pdf, .odf, .odt </span></strong></p>
                                                        <p style=""><strong>Max-Size:<span style="color:#bfbfbf"> 5MB </span></strong></p>
                                                    </div>
                                                    <div class="form-group has-feedback">
                                                        <button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">@lang("msg.Submit")</button>
                                                    </div>
                                                    <div class="form-group has-feedback">
                                                        <a href="{{  url('screening') }}" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right:15px">@lang("msg.Cancel")</a>
                                                    </div>
                                                </div>
                                            </div>
                                               
                                                	
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                <div class="col-lg-5">
                                    <div class="box box-primary" >	
                                        <div class="box-body padding-bottom-15" style="height:178px;overflow:scroll">
                                            <h4 style="margin:0px;padding-bottom:5px;"><strong><u>Document Uploaded:</u></strong></h4>
                                            @if($isDoc)
                                                <ol>
                                                @foreach($data as $d)
                                                    <li style="border-bottom:1px solid #e3e3e3;"> <a href="../hsfiles/public/legal_doc/{{ $d->doc_file }}" target=_blank> {{$d->doc_name}}  <i class="material-icons">get_app</i></a> <a class="pull-right" href="../delete_doc/{{$d->doc_id}}"><i class="material-icons">delete</i></a> </li>
                                                @endforeach
                                                </ol>
                                            @else
                                                <p class="text-center" style="padding-top:50px;color:#999999;">No document found</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.partials.scripts_auth')
<script>
    var uploadField = document.getElementById("file");
    uploadField.onchange = function() {
        if(this.files[0].size > 5242880){
        alert("File is too big!");
        this.value = "";
        };
    };
</script>
@endsection
