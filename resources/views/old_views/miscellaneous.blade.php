@extends('layouts.app')
@section('htmlheader_title')
    Miscellaneous Arrear Calculation
@endsection
@section('contentheader_title')
    
@endsection
@section('main-content')

<script type="text/javascript" language="javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="../js/bootstrap-datepicker.js"></script>
<div class="row">
	<form action="calculate_arrears_miscellaneous"  method="post">	
		{!! csrf_field() !!}
		<div class="col-md-4"></div>
		<div class="col-md-4">		
            <div class="box box-primary">
				<div class="box-header with-border">
				   <h3 class="box-title"><b>Miscellaneous Arrear Calculation</b></h3>
				</div>
				<div class="box-body">
					<div class="required">
						<div class="form-group has-feedback">
							<select required x-moz-errormessage="Please Select an item from the list" name="emp_id" id="emp_id" class="form-control">
								<option value="">Select Employee ID</option>
								<?php
									$users = DB::table('employees')->where('status', 1)->get();							
									foreach ($users as $user)
									{ 
										?>
											<option value="{{ $user->emp_id }}">{{ $user->emp_id }}</option>
										<?php 
									}														
								?>												
							</select>
						</div>	
					</div>
					<div class="form-group has-feedback">
						<b>Amount</b>
						<input type="text" class="form-control" placeholder="Amount" name="value" id="value" data-validation="number" data-validation-error-msg="Required Field. Numeric Value Only"/>
					</div>					
					<div class="form-group has-feedback">
						<b>Remark</b>
						<input type="text" class="form-control" placeholder="Remark" name="remarks" id="remarks" />
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
