@extends('layouts.app')

@section('htmlheader_title')
@endsection

@section('contentheader_title')
@endsection

@section('main-content')
<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="js/bootstrap-datepicker.js"></script>

<form action="emp_retire"  method="post">
{!! csrf_field() !!}	
    <div class="row">
		<div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="box box-primary">                
                <div class="box-body">
                    <div class="form-group has-feedback">
						<b>From Date</b>
						<input type="text" class="form-control" placeholder="" name="effective_from" id="effective_from" data-validation="required" data-validation-error-msg="This Field is Required" />
						<script type="text/javascript"> $('#effective_from').datepicker({format: 'yyyy-mm-dd'});</script> 
					</div>
					<div class="form-group has-feedback">
						<b>To Date</b>
						<input type="text" class="form-control" placeholder="" name="effective_to" id="effective_to" data-validation="required" data-validation-error-msg="This Field is Required" />
						<script type="text/javascript"> $('#effective_to').datepicker({format: 'yyyy-mm-dd'});</script> 
					</div>					
					<div class="row">                    
						<div class="col-xs-4">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Go</button>
						</div>
					</div>
                </div>                
            </div>
        </div>
    </div>
</form>
<script src="js/jquery.form-validator.min.js" type="text/javascript"></script>
<script>
	$.validate({
	});
</script>
@endsection
@section('scripts-extra')

@endsection