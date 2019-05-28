@extends('layouts.app')

@section('htmlheader_title')
    Salary Process
@endsection

@section('contentheader_title')
   Salary Process
@endsection

@section('main-content')
<script type="text/javascript" language="javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="../js/bootstrap-datepicker.js"></script>

<form action="employee_salary_type"  method="post">
{!! csrf_field() !!}	
    <div class="row">
		<div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="box box-primary">							
                <div class="box-body">                   
					<div class="form-group has-feedback">
						<select name="emp_type" id="emp_type" class="form-control" data-validation="required" data-validation-error-msg="Please Select Employee Type">
							<option value="">Select Employee Type</option>
							<option value="Permanent">Permanent</option>
							<option value="Casual">Casual</option>
							<option value="Fixed Pay">Fixed Pay</option>
							<option value="Temporary">Temporary</option>
						</select>
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
<script src="../js/jquery.form-validator.min.js" type="text/javascript"></script>
<script>
	$.validate({
	});
</script>
@endsection
@section('scripts-extra')

@endsection