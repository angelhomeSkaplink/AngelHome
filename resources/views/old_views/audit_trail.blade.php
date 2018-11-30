@extends('layouts.app')

@section('htmlheader_title')
    Audit Trail
@endsection

@section('contentheader_title')
    Audit Trail
@endsection

@section('main-content')
<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="js/bootstrap-datepicker.js"></script>
<script>	
	$(document).ready(function() {
		$('select[name="emp_id"]').on('change', function() {
			var emp_id = $(this).val();
			if(emp_id) {
				$.ajax({
					url: 'employee_name/'+emp_id,
					type: "GET",						
					dataType: "json",
					success:function(data) {
						console.log(data);
						$.each(data, function() {	
							document.getElementById('firstname').value = data.emp_f_name;
							document.getElementById('middlename').value = data.emp_m_name;
							document.getElementById('lastname').value = data.emp_l_name;
						});
					}
				});
			}					
		});
	});
</script>
<form action="audit"  method="post">
{!! csrf_field() !!}	
    <div class="row">
		<div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="box box-primary">                
                <div class="box-body">
                    <div class="form-group has-feedback">
						<b>From Date</b>
						<input type="text" class="form-control" placeholder="" name="effective_from" id="effective_from" data-validation="required" data-validation-error-msg="This Field is Required" />
						<script type="text/javascript"> $('#effective_from').datepicker({format: 'yyyy/mm/dd'});</script> 
					</div>
					<div class="form-group has-feedback">
						<b>To Date</b>
						<input type="text" class="form-control" placeholder="" name="effective_to" id="effective_to" data-validation="required" data-validation-error-msg="This Field is Required" />
						<script type="text/javascript"> $('#effective_to').datepicker({format: 'yyyy/mm/dd'});</script> 
					</div>
					<div class="form-group has-feedback">
					<b>Select Employee</b>
						<select name="emp_id" id="emp_id" class="form-control" data-validation="required" data-validation-error-msg="This Field is Required">
							<option value="">Select Employee ID</option>
							<?php
								$users = DB::table('employees')->get();							
								foreach ($users as $user)
								{ 
								?>
								<option value="{{ $user->emp_id }}">{{ $user->emp_id }}</option>
								<?php 
								}														
							?>												
						</select>
					</div>
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="First Name" name="firstname" id="firstname" data-validation="required" data-validation-error-msg="This Field is Required" readonly />
					</div>
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Middle Name" name="middlename" id="middlename" value="" readonly />
					</div>
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Last Name" name="lastname" id="lastname" value="" readonly />
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