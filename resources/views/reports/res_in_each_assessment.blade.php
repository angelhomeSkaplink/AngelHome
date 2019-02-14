
@extends('layouts.app')

@section('htmlheader_title')
    {{$assessment}} Assessment Report
@endsection

@section('contentheader_title')
<div class="row">
    <div class="col-lg-4 col-lg-offset-4 text-center">
      <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>{{$assessment}} Assessment</strong></h3>
    </div>
    <div class="col-lg-4 form-inline" style="padding-right:30px;">
        <a href="#" class="btn btn-primary btn-block btn-flat btn-width btn-sm pull-right" onclick="printDiv('printableDiv')" id="printButton" ><i class="material-icons md-22"> print </i> Print</a>
        <a href="../assessment_report_graph" class="btn btn-success btn-block btn-flat btn-width btn-sm pull-right" style="margin-right:15px;margin-top:-0px;border-radius:3px;"><i class="material-icons md-22"> keyboard_arrow_left </i>Back</a>
    </div>
</div>
@endsection

@section('main-content')
<style>
	.content-header
	{
		padding: 2px 0px 1px 20px;
		margin-bottom: -18px;
	}
	.content {
		margin-top: 15px;
	}
</style>
<style  type = "text/css" media = "screen">
      .print-header{ display:none; }
      .print-footer{ display:none; }
</style>
<style  type = "text/css" media = "print">
      .print-header{ display:block; }
      .print-footer{ display:block; }
</style>
<link href="{{ asset('/css/type_ahead.css') }}" rel="stylesheet" type="text/css"/>
<div id="printableDiv">
    <div class="row" style="padding-top:20px;">
        <div class="print-header">
            @php
                $facility = DB::table('facility')->where('id',Auth::user()->facility_id)->first();
            @endphp
            <div class="row">
                  <div class="col-lg-12 text-center">
                    <table>
                      <tr>
                        <td style="padding-left:20px;">
                          @if($facility->facility_logo == NULL)
                          <img src="http://seniorsafetech.com/angel_home_s_admin/hsfiles/public/facility_logo/images.png"/>
                          @else
                          <img src="http://seniorsafetech.com/angel_home_s_admin/hsfiles/public/facility_logo/{{ $facility->facility_logo }}" />
                          @endif
                        </td>
                        <td style="width:86%;" class="text-center">
                          <h3><strong>{{$assessment}} Assessment Report</strong></h3>
                          <h4><strong>Facility :: {{ $facility->facility_name }}</strong></h4>
                          <p><strong>{{ $facility->address }} {{ $facility->address_two }}</strong></p>
                          <p><strong><i class="material-icons"> phone</i>{{ $facility->phone }}   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="material-icons">email</i>
                            {{ $facility->facility_email }}
                          </strong></p>
                          <hr style="height:5px;border:none;color:#333;background-color:#333;">
                        </td>
                        <td style="width:5%;"></td>
                      </tr>
                      <tr style="width:100%;border-bottom:5px solid #333;">
                      <td colspan="3" style="text-align:left;padding-left:20px;padding-bottom:10px;">
                          <span style="font-size:1.5em;font-weight:bold;">Resedents:</span>
                       </td>
                      </tr>
                    </table>
                  </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary border">
                <div class="box-body border padding-top-0 padding-left-right-0">
    				<div class="table-responsive">
    					<table class="table">
    						<tbody>
    							<tr>
    								<th class="th-position text-uppercase font-500 font-12">#</th>
    								<th class="th-position text-uppercase font-500 font-12">
    									<div class="autocomplete" style="width:200px;">
    										<input id="myInput" type="text" placeHolder="@lang('msg.Resident')">
    									</div>
    								</th>
    								<th class="th-position text-uppercase font-500 font-12">@lang("msg.Phone No")</th>
    								<th class="th-position text-uppercase font-500 font-12">
    									<div class="emailautocomplete" style="width:200px;">
    										<input id="emailInput" type="text" placeHolder="@lang('msg.Email')">
    									</div>
    								</th>
    								<th class="th-position text-uppercase font-500 font-12">
    									<div class="contactautocomplete" style="width:200px;">
    										<input id="contactInput" type="text" placeHolder="@lang('msg.Contact Person')">
    									</div>
    								</th>
    								<th class="th-position text-uppercase font-500 font-12">@lang("msg.View")</th>
    							</tr>
    							@if($residents->isempty())
    							<tr>
    							    <td colspan=6 class="text-center"><p>No resident has done this assessment.</p></td>
    							</tr>
    							@else
                                  @foreach ($residents as $crm)
                                  @php
                                      $n = explode(",", $crm->pros_name);
                                      $m = explode(",", $crm->contact_person);
                                  @endphp
                                  <tr>
                                    @if($crm->service_image == NULL)
                                    <td><img src="hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>
                                    @else
                                    <td><img src="../hsfiles/public/img/{{ $crm->service_image }}" class="img-circle" width="40" height="40"></td>
                                    @endif
                                    <td>{{ $n[0] }} {{ $n[1] }} {{ $n[2] }}</td>
                                    <td>{{ $crm->phone_p }}</td>
                                    <td>{{ $crm->email_p }}</td>
                                    <td>{{ $m[0] }} {{ $m[1] }} {{ $m[2] }}</td>
                                    <td style="padding-left:55px !important">
                                      @php
                                        $assessment = str_replace('/', '_', $assessment);
                                      @endphp
                                      <a href="../individual_page_in_main_assessment/{{ $crm->id }}/{{$assessment}}">
                                        <i class="material-icons gray md-22"> visibility </i>
                                      </a>
                                    </td>
                                  </tr>
                                  @endforeach
                                @endif
    						</tbody>
    					</table>
    				</div>
    
                </div>
            </div>
        </div>
    </div>
    <div class="print-footer text-center" style="border-top:5px solid #333;">
        Powered by Senior Safe Technology LLC
    </div>
</div>
@endsection
@section('scripts-extra')
<script type="text/javascript" language="javascript" src="{{ asset('/js/rec/service.js') }}"></script>
<script>
    function printDiv(printableDiv) {      
		var printContents = document.getElementById(printableDiv).innerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;
		window.location.reload();
	}
  </script>
@endsection
