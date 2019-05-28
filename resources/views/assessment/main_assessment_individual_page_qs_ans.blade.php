@extends('layouts.app')
@section('htmlheader_title')
    {{$assessment_page}} @lang("msg.Assessment Report")
@endsection

@section('contentheader_title')
<div class="row">
    <div class="col-lg-4 col-lg-offset-4 text-center">
      <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>@lang("msg.Assessment History")</strong></h3>
    </div>
    <div class="col-lg-4">
      <span class="pull-right" style="padding-right:30px;">
        <a href="{{ url('residents_in_each_assessment/'.$page_index) }}" class="btn btn-success btn-sm" style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>@lang("msg.Back")</a>
        <button class="btn btn-primary" onclick="printDiv('printableDiv')" id="printButton"><i class="material-icons md-22"> print </i>@lang("msg.Print")</button>
    </span>
    </div>
</div>
@endsection

@section('main-content')
<style>
	.content-header
	{
		padding: 2px 0px 1px 20px;
		margin-bottom: -10px;
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
@php
$person = DB::table('sales_pipeline')->where('id',$pros_details->id)
			->join('resident_details','sales_pipeline.id','=','resident_details.pros_id')
			->first();
$room = DB::table('resident_room')
		->join('facility_room','resident_room.room_id','=','facility_room.room_id')
		->where([['resident_room.pros_id',$pros_details->id],['resident_room.status',1]])->first();
if($room){
	$room_no = $room->room_no;
}
else{
	$room_no = "No Room Booked";
}
if($person){
	$age = (date('Y') - date('Y',strtotime($person->dob)))." years";
}
else{
	$person = DB::table('sales_pipeline')->where('id',$pros_details->id)->first();
	$age = "Not specified";
}
$name =  explode(",",$person->pros_name);
@endphp
<div class="row" >
	<div class="col-lg-12 table-responsive">
		<table class="table">
			<tr style="background-color:rgb(49, 68, 84) !important;margin:0.5px;">
				<td>
                    <h4>@if($person->service_image == null)
                            <img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40">
                        @else
                            <img src="../hsfiles/public/img/{{ $person->service_image }}" class="img-circle" width="40" height="40">
                        @endif
                        <span class="text-success" style="color:aliceblue;"><strong>{{ $name[0] }} {{ $name[1] }} {{ $name[2] }}</strong>
                    </h4>
				</td>				
				<td>
                    <h4 class="text-center" style="margin-top:20px;">	<span class="text-center" style="color:aliceblue;"><strong>@lang("msg.Room No"): {{ $room_no }} </strong></span></h4>
				</td>
				<td>
                    <h4><span class="pull-right" style="color:aliceblue;margin-top:10px;"><strong>@lang("msg.Age"): {{ $age }} </strong></span></h4>
				</td>
			</tr>
		</table>
	</div>
</div>
<div id="printableDiv">
<div class="row" style="padding-top:20px;">
    <div class="print-header">
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
                      <h3><strong> {{$assessment_page}} Assessment Report</strong></h3>
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
                      <td colspan="3" style="text-align:left;padding-left:20px;padding-bottom:10px;"><span style="font-size:1.5em;font-weight:bold;">
                      @if($pros_details->service_image == NULL)
                        <img src="../../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40">
                      @else
                        <img src="../../hsfiles/public/img/{{ $pros_details->service_image }}" class="img-circle" width="40" height="40">
                     @endif {{ $name[0] }} {{ $name[1] }} {{ $name[2] }}<span class="pull-right" style="padding-right:20px;">@lang("msg.Age"): {{$age}} @lang("msg.Room No"): {{$room_no}}</span></span></td>
                    </tr>
                </table>
              </div>
        </div>
    </div>
</div>
<div class="row" sstyle="padding-top:20px;">
    <div class="col-md-12">
        <div class="box box-primary border">
            <div class="box-body border padding-top-0 padding-left-right-0">
				<div class="table-responsive ">
					<table class="table table-striped">
						<tbody>
						   @foreach($qs_ans_arr as $qa)
							<tr class="Active">
								<td><h4><strong>@lang("msg.Question"): </strong>{{$qa->Question}}</h4></td>	
                            </tr>  
							<tr>
								<td><h6><strong>@lang("msg.Answer"):</strong> {{$qa->Answer}}</h6></td>
                            </tr>
							@endforeach                           
						</tbody>
					</table>
				</div>

            </div>
        </div>
    </div>
</div>
<div class="print-footer text-center" style="border-top:5px solid #333;">
    @lang("msg.Powered By") Senior Safe Technology LLC
</div>
</div>
@endsection
@section('scripts-extra')
<script type="text/javascript" language="javascript" src="{{ asset('/js/rec/service.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
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
