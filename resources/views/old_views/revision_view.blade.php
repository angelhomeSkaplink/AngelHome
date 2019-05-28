@extends('layouts.app')

@section('htmlheader_title')
    Scale Revision
@endsection

@section('contentheader_title')
    Scale Revision
@endsection

@section('header-extra')

@endsection

@section('main-content')
<script type="text/javascript" language="javascript" src="../js/jquery.min.js"></script>
<div class="row">  
	<form action="../new_scale_rev" method="post"> 		
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-body"> 
					{!! csrf_field() !!}
					<input type="hidden" class="form-control" name="scale_id" value="{{ $row->scale_id }}" readonly />
					<div class="form-group has-feedback">
						Current Scale
						<input type="text" class="form-control" value="{{ $row->payScale_lower_limit }}-{{ $row->payScale_uper_limit }}" readonly />
					</div>
					<div class="form-group has-feedback">
						Current Grade Pay
						<input type="text" class="form-control" value="{{ $row->grade_pay }}" readonly />
					</div>
					<div class="form-group has-feedback">
						New Scale Lower Limit
						<input type="text" class="form-control" placeholder="" name="payScale_lower_limit" id="payScale_lower_limit" data-validation="number" data-validation-error-msg="Required.Numeric Value Only" />
					</div>
					<div class="form-group has-feedback">
						New Scale Upper Limit
						<input type="text" class="form-control" placeholder="" name="payScale_uper_limit" id="payScale_uper_limit" data-validation="number" data-validation-error-msg="Required.Numeric Value Only" />
					</div>	
					<div class="form-group has-feedback">
						Grade Pay
						<input type="text" class="form-control" placeholder="" name="grade_pay" id="grade_pay" data-validation="number" data-validation-error-msg="Required.Numeric Value Only" />
					</div>
					<div class="form-group has-feedback">
						City Allowance
						<input type="text" class="form-control" placeholder="" name="city_allowance" id="city_allowance" data-validation="number" data-validation-error-msg="Required.Numeric Value Only" />
					</div>
					<div class="form-group has-feedback">
						<b>Grade</b>
						<select name="grade" id="grade" class="form-control" data-validation="required" data-validation-error-msg="Required Field">
							<option value="">Select Post Grade</option>
							<option value="1">I</option>
							<option value="2">II</option>
							<option value="3">III</option>
							<option value="4">IV</option>
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
	</form>
</div>
<script src="../js/jquery.form-validator.min.js" type="text/javascript"></script>
<script>
    $.validate({
    });
</script>
@endsection
@section('scripts-extra')

@endsection