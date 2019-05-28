@extends('layouts.app')

@section('htmlheader_title')
    Bundle Print
@endsection

@section('contentheader_title')
<div class="row">
    <div class="col-lg-4 col-lg-offset-4 text-center">
      <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Print View</strong></h3>
    </div>
    <div class="col-lg-4">
      <span class="pull-right" style="padding-right:30px;"><button class="btn btn-primary" onclick="printDiv('printableDiv')" id="printButton"><i class="material-icons md-22"> print </i> Print</button></span>
      <a href="" class="btn btn-success btn-block btn-flat btn-width btn-sm " style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back</a>
    </div>
</div>
@endsection

@section('main-content')
<style>
	.content-header
	{
		/* display:none; */
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
  table {
    border-collapse: collapse;
    }

    td {
    padding-top: .5em;
    padding-bottom: .5em;
    }
</style>
<style  type = "text/css" media = "print">
	.print-header{ display:block; }
	.print-footer{ 
    display:block;
    border-top: 5px solid #000;
   }
    table {
    border-collapse: collapse;
    }

    td {
    padding-top: .5em;
    padding-bottom: .5em;
    }
</style>
@php
$print_order=explode(",",$print_conf->elm_order);
// dd($print_order);
$screening = explode(",",$print_conf->screening);
$person = DB::table('sales_pipeline')->where('id',$pros_id)
			->join('resident_details','sales_pipeline.id','=','resident_details.pros_id')
			->first();
$room = DB::table('resident_room')
		->join('facility_room','resident_room.room_id','=','facility_room.room_id')
		->where([['resident_room.pros_id',$pros_id],['resident_room.status',1]])->first();
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
	$person = DB::table('sales_pipeline')->where('id',$pros_id)->first();
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
              <h4 class="text-center" style="margin-top:20px;">	<span class="text-center" style="color:aliceblue;"><strong>Room No: {{ $room_no }} </strong></span></h4>
          </td>
          <td>
              <h4><span class="pull-right" style="color:aliceblue;margin-top:10px;"><strong>Age: {{ $age }} </strong></span></h4>
          </td>
        </tr>
      </table>
    </div>
  </div>
<div class="panel-body" id="printableDiv">
    <div class="row">
        <div class="col-lg-12">
          <div class="print-header">
            <div class="row">
              <div class="col-lg-12 text-center">
                <table>
                  <tr style="border-bottom:5px solid #333">
                    <td>
                      @if($facility->facility_logo == NULL)
                      <img src="http://seniorsafetech.com/angel_home_s_admin/hsfiles/public/facility_logo/images.png"/>
                      @else
                      <img src="http://seniorsafetech.com/angel_home_s_admin/hsfiles/public/facility_logo/{{ $facility->facility_logo }}" />
                      @endif
                    </td>
                    <td style="width:90%;" class="text-center">
                      <h3><strong>Screening Report</strong></h3>
                      <h4><strong>Facility :: {{ $facility->facility_name }}</strong></h4>
                      <p><strong>{{ $facility->address }} {{ $facility->address_two }}</strong></p>
                      <p><strong><i class="material-icons"> phone</i>{{ $facility->phone }}   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="material-icons">email</i>
                        {{ $facility->facility_email }}
                      </strong></p>
                      <hr style="height:5px;border:none;color:#333;background-color:#333;">
                    </td>
                    <td style="width:5%;"></td>
                  </tr>
                </table>
              </div>
            </div>
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
                          <h4 class="text-center" style="margin-top:20px;">	<span class="text-center" style="color:aliceblue;"><strong>Room No: {{ $room_no }} </strong></span></h4>
                      </td>
                      <td>
                          <h4><span class="pull-right" style="color:aliceblue;margin-top:10px;"><strong>Age: {{ $age }} </strong></span></h4>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
          </div>
        </div>
    </div>
      @foreach($print_order as $order)
        @if($order == 'initial')
          @include('print_configuration.print_item.main_assessment')
        @elseif($order == 'screening')
          @include('print_configuration.print_item.all_screening')
        @elseif($order == 'policy_doc')
          @include('print_configuration.print_item.policy_doc')
        @elseif($order == 'legal_doc')
          @include('print_configuration.print_item.legal_doc')
        @elseif($order == 'lease_signing_doc')
          @include('print_configuration.print_item.lease_signing_doc')
        @endif
      @endforeach
        
        <div class="print-footer">
					<div class="row">
						<div class="col-lg-12 text-center">
							<table>
								<tr>
									<td style="width:90%;" class="text-center">
										<h4><b>Powered by Senior Safe Technology LLC.</b></h4>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
</div>
 </div>
@include('layouts.partials.scripts_auth')
<script>
	function printDiv(printableDiv) {

		var printContents = document.getElementById(printableDiv).innerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;
		window.location.reload(true);
	}
</script>
@endsection
