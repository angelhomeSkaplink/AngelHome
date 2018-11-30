
@extends('layouts.app')

@section('htmlheader_title')
    Prospective Add
@endsection

@section('contentheader_title')
    <p class="text-danger"><b>ADD {{ $stage }} record for {{ $name->pros_name }}</b> 
	@if( $name->service_image == NULL)
	<img src="../../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40">
	@else
	<img src="../../hsfiles/public/img/{{ $name->service_image }}" class="img-circle" width="40" height="40">
	@endif
	</p>
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
		margin-bottom: -18px;
	}
	.content {
		margin-top: 15px;
	}
</style>

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
					@if($stage=='Appointment')
					<div class="form-group has-feedback">
						<label>Appointment Date</label>
						<input type="text" class="form-control" placeholder="" name="appointment_date" id="appointment_date" onkeyup="getdateofretirement();" autocomplete="off"/>
						<script type="text/javascript"> $('#appointment_date').datepicker({format: 'yyyy/mm/dd'});</script> 
					</div>
					<div class="form-group has-feedback">
						<label>Appointment Time</label>
						<div class='input-group date' id='datetimepicker3'>
							<input type="text" name="appointment_time"  class="form-control timepicker" />
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-time"></span>
							</span>
						</div>
					</div>
					@endif
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" placeholder="" name="date" value="<?php echo date('Y/m/d'); ?>"/>
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
