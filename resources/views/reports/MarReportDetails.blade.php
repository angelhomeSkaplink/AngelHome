@extends('layouts.app')

@section('htmlheader_title')
MAR
@endsection
@section('contentheader_title')
<div class="row">
    <div class="col-lg-4 col-lg-offset-4 text-center">
      <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Medication Administration Record (MAR)</strong></h3>
    </div>
    <div class="col-lg-4">
      <span class="pull-right" style="padding-right:30px;"><button class="btn btn-primary" onclick="printDiv('printableDiv')" id="printButton"><i class="material-icons md-22"> print </i> Print</button></span>
	<a href="{{ url('mar_report') }}" class="btn btn-success btn-block btn-flat btn-width btn-sm " style="margin-right:15px;border-radius:5px;" onclick="history.back();"><i class="material-icons">keyboard_arrow_left</i>Back</a>
    </div>
    <div class="row">
    <div class="col-md-2 col-md-offset-10" style="padding-right:45px;padding-top:5px;">
      <select class="form-control" name="quicklink" id="quicklink" onchange="load_url()">
        <option value="#" selected>Quick Links</option>
        <option value="{{url('patient_medicine')}}">MAR</option>
        <option value="{{url('medicine_stocks_list')}}">Medicine Stock</option>
        <option value="{{url('add_patient_details/'.$name->id)}}">Pharmacy</option>
      </select>
    </div>
</div>
</div>
@endsection

@section('main-content')
<style>
	.tableContainer{
	  padding: 20px;
	}
	.content-header
	{
	  /* display:none; */
	  padding: 2px 0px 1px 20px;
	  margin-bottom: -18px;
	}
	.content {
	  margin-top: 15px;
	}
	.placeholder {
	  color: red;
	  opacity: 1; /* Firefox */
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
{{-- start of resident info header --}}
@php
$person = DB::table('sales_pipeline')->where('id',$name->id)
			->join('resident_details','sales_pipeline.id','=','resident_details.pros_id')
			->first();
$room = DB::table('resident_room')
		->join('facility_room','resident_room.room_id','=','facility_room.room_id')
		->where([['resident_room.pros_id',$name->id],['resident_room.status',1]])->first();
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
	$person = DB::table('sales_pipeline')->where('id',$name->id)->first();
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
	
	<div class="row text-center">
		<p><strong>Note: </strong><i class="material-icons md-36"> schedule</i> To be administered <strong>::</strong> <i class="material-icons md-36"> offline_pin</i>  Given in due time <strong>::</strong> <i class="material-icons md-36">  check_circle_outline </i>  Given either early or late <strong>::</strong> <i class="material-icons md-36"> cancel</i> Not given <strong>::</strong> <i class="material-icons md-36"> email</i> Refused-Mail sent to Doctor</p>
		<p><span class="text-danger"><strong>Print Setting:</strong></span><span><b>Paper:</b></span>  legal; <span><b>Layout:</b></span> landscape; <span><b>Scale:</b></span> 100</p>
	</div>
	<div class="row">
	<div class="col-lg-4"></div>
	<div class="col-lg-4 text-center">
		<form action="{{ action('ReportController@mar_monthly_report')}}" method="post">
			<input name="_method" type="hidden" value="POST">
			{!! csrf_field() !!}
			<input type="hidden" name="user_id" value="{{ $person->id }}">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="row">
						<div class="col-lg-4" style="padding-right:0px;">
							<select type="text" name="mar_month" id="mar_month" class="form-control" placeholder="">
								<option value=""></option>
								<option value="01">Jan</option>
								<option value="02">Feb</option>
								<option value="03">Mar</option>
								<option value="04">Apr</option>
								<option value="05">May</option>
								<option value="06">Jun</option>
								<option value="07">Jul</option>
								<option value="08">Aug</option>
								<option value="09">Sep</option>
								<option value="10">Oct</option>
								<option value="11">Nov</option>
								<option value="12">Dec</option>
							</select>
						</div>
						<div class="col-lg-4" style="padding-left:0px;padding-right:0px;">
							<select type="text" name="mar_year" id="mar_year" class="form-control" placeholder="">
							    <option value=""></option>
							    @for($i=2018;$i<=2050;$i++)
								<option value="{{ $i }}">{{ $i }}</option>
								@endfor
							</select>
						</div>
						<div class="col-lg-4" style="padding-left:0px;">
							<button class="btn btn-default form-control" type="submit" name="submit"><i class="material-icons md-36" style="color:#000;"> search </i></a>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
</div>


{{-- end --}}
<div class="tableContainer" style="background-color:#fff;">
	<div>
	<!-- Bootstrap core CSS -->
	<!-- TOP BAR -->
		<div class="row" style="overflow-x:auto;">
			<div class="box box-primary border" id="printableDiv">
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
										<h3><strong>Medication Administration Record (MAR)</strong></h3>
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
					<div class="row">
						<div class="col-lg-12">
							<h4><strong>Resident Name: {{ $name[0] }} {{ $name[1] }} {{ $name[2] }}</strong></h4>
							<h5><strong>Age: </strong> {{ $age }}</h5>
							<h5><strong>Room: </strong> {{ $room_no }}</h5>
						</div>
					</div>
				</div>
				<div class="row text-center">
            		<p><strong>Note: </strong><i class="material-icons md-36"> schedule</i> To be administered <strong>::</strong> <i class="material-icons md-36"> offline_pin</i>  Given in due time <strong>::</strong> <i class="material-icons md-36">  check_circle_outline </i>  Given either early or late <strong>::</strong> <i class="material-icons md-36"> cancel</i> Not given <strong>::</strong> <i class="material-icons md-36"> email</i> Refused-Mail sent to Doctor</p>            	</div>
				<div>
					<!--Table-->
					<table class="table table-bordered table-responsive">
						<thead>
							<tr>
								<th style="vertical-align : middle;text-align:center;" rowspan="3"class="th-position text-uppercase font-500 font-12">Drugs/Strenth/Form/Dose</th>
								<th style="vertical-align : middle;text-align:center;" rowspan="3" class="th-position text-uppercase font-500 font-12">Time to Take</th>
								<th colspan="31" class="align-middle th-position text-uppercase font-500 font-12">Month & Year: {{$month}}, {{$year}}</th>
							</tr>
							<tr>
								<?php
									$eachDate =  new Carbon\Carbon($start_month);
								?>
								@for ($i=1;$i<=$days;$i++)
								<?php
									$eachDateString = $eachDate->toDateString();
									$eachDay = $eachDate->format('D');
								?>
								<th>{{ $eachDay }}</th>
								<?php
									$eachDate =  new Carbon\Carbon($eachDateString);
									$eachDate = $eachDate->addDays(1);
								?>
								@endfor
							</tr>
							<tr>
								@for ($i=1;$i<=$days;$i++)
								<th>{{ $i }}</th>
								@endfor
							</tr>
						</thead>
						<tbody>
							@foreach ($result as $r)
						   <?php $time_to_take_med_12=date('h:i A', strtotime($r->time_to_take));
						        $doc = explode(",",$r->doctor_name);
						   ?>
							<tr>
								<td><strong>Doctor: </strong>{{ $doc[0] }} {{ $doc[1] }} {{ $doc[2] }}</br>
								<strong>Medicine: </strong>{{ $r->medicine_name }}</br>
								<strong>Quantity: </strong> {{ $r->quantity_of_med }}</br>
								<strong>Administer Via:</strong> {{ $r->apply_on }}</br>
								<strong>Allergy: </strong>{{ $r->allergy }}</br>
								<strong>Diet: </strong> {{ $r->diet }}</br>
								<strong>Instruction:</strong> {{ $r->other_instructions }}</br>
								</td>
								<td>{{ $time_to_take_med_12 }}</td>
								<?php
									for ($i=1;$i<=$days;$i++) {
									$flag =-1;
									foreach($query as $q) {
										$date=$q->mar_date;
										$date = explode('-',$date);
										$day_no = $date[2];
										if ($i==$day_no && $r->time_to_take == $q->time_to_take_med && $q->status == 0) {
											$flag=0;
											break;
										}elseif ($i==$day_no && $r->time_to_take == $q->time_to_take_med && $q->status == 1) {
											$earlyMarTime = strtotime($q->time_to_take_med) - 60*60;
											$lateMarTime = strtotime($q->time_to_take_med) + 60*60;
											$action_time = strtotime($q->action_performed_on);
											if ($action_time>$earlyMarTime && $action_time<$lateMarTime) {
												$flag=1;
												break;
											}
											else {
												$flag=2;
												break;
										   }
										}elseif($i==$day_no && $r->time_to_take == $q->time_to_take_med && $q->status == 2){
											$flag=3;
											break;
										}elseif($i==$day_no && $r->time_to_take == $q->time_to_take_med && $q->status == 3){
											$flag=4;
											break;
										}else{
											$flag=-1;
										}
										if($q->user_id != 0 ){
											$user_query = DB::table('users')->where('user_id',$q->user_id)->select('firstname','lastname')->first();
											$firstname=$user_query->firstname;
											$lastname=$user_query->lastname;
										}
									}
									if($flag==0){
										echo'<td style="padding:5px;text-align:center;color:gray;"><i class="material-icons md-36" style="margin-top:40%;"> schedule</i></td>';
									}elseif($flag==1){
										echo'<td style="padding:5px;text-align:center;"><a href="#" data-toggle="popover"data-placement="top" data-trigger="focus" title="'.$firstname.' '.$lastname.'" data-content="Medicine given.'.$q->reason_title.'. '.$q->reason_desc.' Action Time: '.date('h:i A', strtotime($q->action_performed_on)).'"><span style="color:green;"><i class="material-icons md-36" style="margin-top:40%;"> offline_pin</i></span></a></td>';
									}
									elseif($flag==2){
										echo'<td style="padding:5px;text-align:center;"><a href="#" data-toggle="popover"data-placement="top" data-trigger="focus" title="'.$firstname.' '.$lastname.'" data-content="Medicine given.'.$q->reason_title.'. '.$q->reason_desc.' Action Time: '.date('h:i A', strtotime($q->action_performed_on)).'"><span style="color:orange;"><i class="material-icons md-36" style="margin-top:40%;">  check_circle_outline </i></span></a></td>';
									}
									elseif($flag==3){
										echo'<td style="padding:5px;text-align:center;"><a href="#" data-toggle="popover" data-placement="top" data-trigger="focus" title="'.$firstname.' '.$lastname.'" data-content="Medicine not given.'.$q->reason_title.'. '.$q->reason_desc.' Action Time: '.date('h:i A', strtotime($q->action_performed_on)).'"><span style="color:black;"><i class="material-icons md-36" style="margin-top:40%;"> cancel</i></span></a></td>';
									}elseif($flag==4){
										echo'<td style="padding:5px;text-align:center;color:blue;"><a href="#" data-toggle="popover" data-placement="top" data-trigger="focus" title="'.$firstname.' '.$lastname.'" data-content="Refused ! Mail sent to doctor. Action Time: '.date('h:i A', strtotime($q->action_performed_on)).'"><i class="material-icons md-36" style="margin-top:40%;"> email</i></a></td>';
									}else{
										echo'<td></td>';
									}
								}
								?>
							</tr>
							@endforeach
						</tbody>
					</table>
				<!--Table-->
			
				</div>
				
				<div class="print-footer">
					<div class="row">
						<div class="col-lg-12 text-center">
							<table>
								<tr>
									<td style="width:90%;" class="text-center">
										<h4><b>Powered by Senior Safe Technology LCC.</b></h4>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom JavaScript for this theme -->
<!-- <script src="js/scrolling-nav.js"></script> -->
<script type="text/javascript">
  function getdate(){
    var date = new Date();
    document.getElementById("today").innerHTML=date;
  }
</script>

<script>
	$(document).ready(function(){
		$('[data-toggle="popover"]').popover({ container: 'body' });
	});
</script>
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
<script type="text/javascript">
	$(document).ready(function(){
		var mar_month = "<?php echo($month); ?>";
		var month = monthMaping(mar_month);
		var year = "<?php echo($year); ?>";
		$("#mar_month").val(month);
		$("#mar_year").val(year);
	});
	function monthMaping(m){
		var v ="";
		switch(m){
			case "January":v="01";break;
			case "February":v="02";break;
			case "March":v="03";break;
			case "April":v="04";break;
			case "May":v="05";break;
			case "June":v="06";break;
			case "July":v="07";break;
			case "August":v="08";break;
			case "September":v="09";break;
			case "October":v="10";break;
			case "November":v="11";break;
			case "December":v="12";break;
		}
		return v;
	}
</script>
@include('quick_link.quicklink')
@endsection
