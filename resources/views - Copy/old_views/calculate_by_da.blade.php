@extends('layouts.app')
@section('htmlheader_title')
    Arrear Calculation
@endsection
@section('contentheader_title')
    
@endsection
@section('main-content')

<script type="text/javascript" language="javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="../js/bootstrap-datepicker.js"></script>
<div class="row">
	<form action="calculate_arrears"  method="post">	
		{!! csrf_field() !!}
		<div class="col-md-4"></div>
		<div class="col-md-4">		
            <div class="box box-primary">
				<div class="box-header with-border">
				   <h3 class="box-title"><b>Arrear Calculation</b></h3>
				</div>
				<div class="box-body">
					<div class="form-group has-feedback">
						<b>DA Percentage</b>
						<input type="text" class="form-control" placeholder="DA" name="value" id="value" data-validation="number" data-validation-error-msg="Required Field. Numeric Value Only"/>
					</div>
					<div class="form-group has-feedback">
						<b>Effective From</b>
						<input type="text" class="form-control" placeholder="Effective From" name="effective_from" id="effective_from" data-validation="required" data-validation-error-msg="This Field is Required" />
						<script type="text/javascript"> $('#effective_from').datepicker({format: 'yyyy/mm/dd'});</script> 
					</div>
					<div class="form-group has-feedback">
						<b>Effective To</b>
						<input type="text" class="form-control" placeholder="Effective From" name="effective_to" id="effective_to" data-validation="required" data-validation-error-msg="This Field is Required" />
						<script type="text/javascript"> $('#effective_to').datepicker({format: 'yyyy/mm/dd'});</script> 
					</div>
					<div class="form-group has-feedback">
						<b>Remarks</b>
						<input type="text" class="form-control" placeholder="Remarks" name="remarks" id="remarks"/>
					</div>
					<div class="row">                    
						<div class="col-xs-4">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Calculate</button>
						</div>
					</div> 
				</div>   
			</div>
		</div>
	</form>
</div>
<script src="../js/jquery.form-validator.min.js" type="text/javascript"></script>
<script>
    $.validate({
    });
</script>

@include('layouts.partials.scripts_auth')
@endsection
