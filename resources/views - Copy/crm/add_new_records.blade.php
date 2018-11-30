
@extends('layouts.app')

@section('htmlheader_title')
    Prospective Add
@endsection

@section('contentheader_title')
    New Prospective
@endsection

@section('main-content')

<script type="text/javascript">
    function ShowHideDiv() {
        var sales_stage = document.getElementById("sales_stage");
        var appointScedule = document.getElementById("appointScedule");
        appointScedule.style.display = sales_stage.value == "Appointment" ? "block" : "none";
    }
</script>

<div class="row">		
	
	<div class="col-md-6 col-md-offset-2">
		<div class="box box-primary">
			<div class="box-body padding-bottom-15">
				
				<form action="{{action('ProspectiveController@new_records')}}" method="post">					
					<input type="hidden" name="_method" value="PATCH">
						{{ csrf_field() }}
					@if($stage==NULL)	
					<div class="form-group has-feedback">
						<label>Lead Type </label>
						<select name="lead_id" id="lead_id" class="form-control" required >							
							<option value="">Select Lead Type</option>
							<?php
								$leads = DB::table('leads')->get();							
								foreach ($leads as $lead)
								{ 
									?>
										<option value="{{ $lead->lead_id}}">{{ $lead->lead_type }}</option>
									<?php
								}														
							?>	
						</select>
					</div>
					<div class="form-group has-feedback">
						<label>Sales Stage </label>
						<select name="sales_stage" id="sales_stage" class="form-control" onchange = "ShowHideDiv()" required >
							<option value="">Select Sales Stage</option>
							<option value="Discovery">Discovery</option>
							<option value="Tour">Tour</option>
							<option value="Re-Tour">Re-Tour</option>
							<option value="Appointment">Appointment Scheduling</option>
							<option value="Signing">Signing</option>
							<option value="Move In">Move In</option>
						</select>
					</div>
					<div id="appointScedule" style="display: none">
						<div class="form-group has-feedback">
							<label>Appointment Date</label>
							<input type="text" class="form-control" placeholder="Appointment Date" name="appointment_date" id="appointment_date" onkeyup="getdateofretirement();" autocomplete="off"/>
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
					</div>
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" placeholder="" name="date" value="<?php echo date('Y/m/d'); ?>"/>
					</div>
					<div class="form-group has-feedback">						
						<input type="hidden" class="form-control" value="{{ $row->id }}" name="pipeline_id" id="pipeline_id" pattern="[A-Za-z\s]+" Title="Alphabate Character Only" readonly />
					</div>
					<div class="form-group has-feedback">
						<label>Notes </label>
						<textarea class="form-control" name="notes" type="text" rows="4" placeholder="Notes"></textarea>
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
					<div class="col-md-12"> 
						<div>
							<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
						</div>
					</div>
					@endif
					@if($stage!=NULL)
					<div class="form-group has-feedback">
						<label>Lead Type </label>
						<select name="lead_id" id="lead_id" class="form-control" required >							
							<?php
								$lead_state = DB::table('leads')->where('lead_id', $stage->lead_id)->first();
								{
								?>
									<option value="<?php echo $lead_state->lead_id ?>"><?php echo $lead_state->lead_type ?></option>
							<?php } ?>
							<?php
								$leads = DB::table('leads')->get();							
								foreach ($leads as $lead)
								{ 
									?>
										<option value="{{ $lead->lead_id}}">{{ $lead->lead_type }}</option>
									<?php
								}														
							?>	
						</select>
					</div>
									
					<div class="form-group has-feedback">
						<label>Sales Stage </label>
						<select name="sales_stage" id="sales_stage" class="form-control"  onchange = "ShowHideDiv()" required >
							<option value="{{ $stage->sales_stage }}">{{ $stage->sales_stage }}</option>
							<option value="Discovery">Discovery</option>
							<option value="Tour">Tour</option>
							<option value="Re-Tour">Re-Tour</option>
							<option value="Appointment">Appointment Scheduling</option>
							<option value="Signing">Signing</option>
							<option value="Move In">Move In</option>
						</select>
					</div>
					<div id="appointScedule" style="display: none">
						<div class="form-group has-feedback">
							<label>Appointment Date</label>
							<input type="text" class="form-control" placeholder="Appointment Date" name="appointment_date" id="appointment_date" onkeyup="getdateofretirement();" autocomplete="off"/>
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
					</div>
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" placeholder="" name="date" value="<?php echo date('Y/m/d'); ?>"/>
					</div>
					<div class="form-group has-feedback">						
						<input type="hidden" class="form-control" value="{{ $row->id }}" name="pipeline_id" id="pipeline_id" pattern="[A-Za-z\s]+" Title="Alphabate Character Only" readonly />
					</div>
					<div class="form-group has-feedback">
						<label>Notes </label>
						<textarea class="form-control" name="notes" type="text" rows="4" placeholder="Notes">{{ $stage->notes }}</textarea>
					</div>
					<div class="form-group has-feedback">
						<label>Latest Method of Communication </label>
						<select name="moc" id="noc" class="form-control" required >
							<option value="{{ $stage->moc }}">{{ $stage->moc }}</option>
							<option value="Phone">Phone</option>
							<option value="Email">Email</option>
							<option value="Direct-Contact">Direct-Contact</option>
						</select>
					</div>
					
					<div class="col-md-4"></div>
					
					<div class="col-md-4">
							<button type="submit" class="btn btn-primary btn-block btn-flat" style="margin-left:-65px">Submit</button>
					</div>
					
					<div class="col-md-4"></div>
					@endif
				</form>
				
			</div>
			
		</div>
		
		
	</div>
	
	
	
	
	
</div>
<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script src="js/jquery.form-validator.min.js" type="text/javascript"></script>
	<script>
        $.validate({
        });
    </script>
    @include('layouts.partials.scripts_auth')

@endsection
