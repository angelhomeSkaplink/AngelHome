
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
		
		<div class="col-md-4">
			<div class="box box-primary">
				@if(Session::has('msg'))
					<div class="alert alert-danger">
						<strong>{{ Session::get('msg') }}</strong>
					</div>
				@endif
				<div class="box-body">	
					
					<form action="{{action('ProspectiveController@new_records')}}" method="post">
					
					<input type="hidden" name="_method" value="PATCH">

						{{ csrf_field() }}
					
					
					<div class="form-group has-feedback">
						Lead Type
						<select name="lead_id" id="lead_id" class="form-control" required >
							<?php
								$lead_type = DB::table('leads')->where('lead_id', $stage->lead_id)->first();
								{
								?>
									<option value="<?php echo $lead_type->lead_id ?>"><?php echo $lead_type->lead_type ?></option>
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
						Sales Stage
						<select name="sales_stage" id="sales_stage" class="form-control" required >
							<option value="{{ $stage->sales_stage }}">{{ $stage->sales_stage }}</option>
							<option value="Discovery">Discovery</option>
							<option value="Tour">Tour</option>
							<option value="Re-Tour">Re-Tour</option>
							<option value="Signing">Signing</option>
							<option value="Move In">Move In</option>
						</select>
					</div>
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" placeholder="" name="date" value="<?php echo date('Y/m/d'); ?>"/>
					</div>
					<div class="form-group has-feedback">						
						<input type="text" class="form-control" value="{{ $row->id }}" name="pipeline_id" />
					</div>
					<div class="form-group has-feedback">
						Notes
						<textarea class="form-control" name="notes" type="text" rows="5" placeholder="Notes">{{ $stage->notes}}</textarea>
					</div>
					
					<div class="form-group has-feedback">
						Method of Communication
						<select name="moc" id="noc" class="form-control" required >
						<option value="{{ $stage->moc }}">{{ $stage->moc }}</option>
							<option value="Phone">Phone</option>
							<option value="Email">Email</option>
							<option value="Direct-Contact">Direct-Contact</option>
						</select>
					</div>
					
					<div class="form-group has-feedback">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
					</div>
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
