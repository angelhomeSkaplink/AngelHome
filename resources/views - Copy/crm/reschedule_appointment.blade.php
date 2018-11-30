@extends('layouts.app')

@section('htmlheader_title')
    Prospective Add
@endsection

@section('contentheader_title')
    New Prospective
@endsection

@section('main-content')

<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="js/bootstrap-datepicker.js"></script>

<div class="row">	
	<form action="{{action('ProspectiveController@change_appointment')}}" method="post">					
	<input type="hidden" name="_method" value="PATCH">
	{{ csrf_field() }}
	
	<div class="col-md-6 col-md-offset-2">
		<div class="box box-primary">			
			<div class="box-body padding-bottom-25">			
				
				<input type="hidden" class="form-control" name="appoiuntment_id" value="{{ $row->appoiuntment_id }}"  />
				<input type="hidden" class="form-control" value="{{ $row->pros_id }}" name="pros_id" />
				
				<div class="form-group has-feedback">
					<label>Appointment Date</label>
					<input type="text" class="form-control" placeholder="Appointment Date" name="appointment_date" id="appointment_date" value="{{ $row->appointment_date }}" autocomplete="off"/>
					<script type="text/javascript"> $('#appointment_date').datepicker({format: 'yyyy/mm/dd'});</script> 
				</div>
				
				<div class="form-group has-feedback">
					<label>Appointment Time</label>
					<div class='input-group date' id='datetimepicker3' style="width:100%">
						<input type="text" name="appointment_time" value="{{ $row->appointment_date }}" class="form-control timepicker" />
						<!-- <span class="input-group-addon">
							<i class="material-icons gray md-22"> watch_later </i> 
						</span> -->
					</div>
				</div>
				
				<div class="form-group has-feedback">
					<button type="submit" class="btn btn-primary btn-block btn-flat btn-width">Submit</button>
				</div>
			</div>
		</div>
	</div>	
	
	</form>
</div>
<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script src="js/jquery.form-validator.min.js" type="text/javascript"></script>
	<script>
        $.validate({
        });
    </script>
    @include('layouts.partials.scripts_auth')

@endsection
