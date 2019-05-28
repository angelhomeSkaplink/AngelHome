
@extends('layouts.app')

@section('htmlheader_title')
    Future Resident Add
@endsection
@section('contentheader_title')
<div class="row">
    <div class="col-lg-4 col-lg-offset-4 text-center">
      <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Add {{ $stage }} Record</strong></h3>
    </div>
    <div class="col-lg-4">
      <a href="{{ url('view_records/'.$id) }}" class="btn btn-success btn-sm pull-right" style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back</a>
    </div>
</div>
@endsection


@section('main-content')

<script type="text/javascript">
    function ShowHideDiv() {
        var sales_stage = document.getElementById("sales_stage");
        var appointScedule = document.getElementById("appointScedule");
        appointScedule.style.display = sales_stage.value == "Appointment" ? "block" : "none";
    }
</script>
<style>
	.wickedpicker{
		z-index:999 !important;
	}
	.content-header
	{
		//display:none;
		padding: 2px 0px 1px 20px;
		margin-bottom: -10px;
	}
	.content {
		margin-top: 15px;
	}
</style>
@php
$person = DB::table('sales_pipeline')->where('id',$id)
			->join('resident_details','sales_pipeline.id','=','resident_details.pros_id')
			->first();
$room = DB::table('resident_room')
		->join('facility_room','resident_room.room_id','=','facility_room.room_id')
		->where([['resident_room.pros_id',$id],['resident_room.status',1]])->first();
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
	$person = DB::table('sales_pipeline')->where('id',$id)->first();
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
								<img src="{{ asset('hsfiles/public/img/538642-user_512x512.png') }}" class="img-circle" width="40" height="40">
							@else
								<img src="{{ asset('hsfiles/public/img/'.$person->service_image) }}" class="img-circle" width="40" height="40">
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

<div class="row">

	
	<div class="col-md-6 col-md-offset-2">
	
		<div class="box box-primary">
			<div class="box-body padding-bottom-15">				
				<form action="{{action('ProspectiveController@new_records_pros_add')}}" method="post">					
					<input type="hidden" name="_method" value="PATCH">
						{{ csrf_field() }}
					<div class="form-group has-feedback">
						<label>Lead Type </label>
						<select name="lead_id" id="lead_id" class="form-control" required >							
							<option value="">Select Lead Type</option>
							@foreach($leads as $lead)
								<option value="{{ $lead->lead_id}}">{{ $lead->lead_type }}</option>
							@endforeach							
						</select>
					</div>
					<div class="form-group has-feedback">						
						<input type="hidden" class="form-control" value="{{ $stage }}" name="sales_stage" id="sales_stage" readonly />
					</div>
					@if($stage=='Tour' || $stage=='Re-Tour')
					<div class="form-group has-feedback">
						<label>Tour Date</label>
						<input type="text" class="form-control" placeholder="" name="appointment_date" id="appointment_date" onkeyup="getdateofretirement();" autocomplete="off"/>
						<script type="text/javascript"> $('#appointment_date').datepicker({format: 'yyyy/mm/dd'});</script> 
					</div>
					<div class="form-group has-feedback">
						<label>Tour Time</label>
						<div class='input-group date' id='datetimepicker3'>
							<input type="text" name="appointment_time"  class="form-control timepicker" required/>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-time"></span>
							</span>
						</div>
					</div>
					@endif
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" placeholder="" name="date" value="<?php echo date('Y/m/d'); ?>" required/>
					</div>
					<div class="form-group has-feedback">						
						<input type="hidden" class="form-control" value="{{ $id }}" name="pipeline_id" id="pipeline_id" readonly />
					</div>
					<div class="form-group has-feedback">
						@if($stage=='Appointment')
						<label>Comment </label>
						@else
						<label>Notes </label>
						@endif
						<textarea class="form-control" name="notes" type="text" rows="4" placeholder=""></textarea>
					</div>						
					<div class="form-group has-feedback">
						<label>Method of Communication </label>
						<select name="moc" id="noc" class="form-control" required >
							<option value="">Select Method of Communication </option>
							<option value="Phone">Phone</option>
							<option value="Email">Email</option>
							<option value="Direct-Contact">Direct-Contact</option>
						</select>
					</div>	
					<div class="form-group has-feedback">
						<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">Submit</button>
					</div>
					<div class="form-group has-feedback">
						<a href="../../view_records/{{ $id }}" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right:15px">Cancel</a>
					</div><br/><br/>
				</form>				
			</div>			
		</div>
	</div>
</div>
@include('layouts.partials.scripts_auth')

@endsection
