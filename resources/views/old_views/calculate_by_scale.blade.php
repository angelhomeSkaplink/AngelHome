@extends('layouts.app')
@section('htmlheader_title')
    Arrear Calculation(By Scale)
@endsection
@section('contentheader_title')
    
@endsection
@section('main-content')

<script type="text/javascript" language="javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="../js/bootstrap-datepicker.js"></script>
<div class="row">
	@if(Session::has('msg'))
		<div class="alert alert-success">
			<strong>{{ Session::get('msg') }}</strong>
		</div>
	@endif
	<form action="calculate_arrears_promo"  method="post" enctype="multipart/form-data">	
		{!! csrf_field() !!}
		<div class="col-md-4"></div>
		<div class="col-md-4">			
            <div class="box box-primary">
				<div class="box-header with-border">
				   <h3 class="box-title"><b>Arrear Calculation(By Scale/Promotion)</b></h3>
				</div>
				<div class="box-header with-border">
					<a href="{{ url('promo_arrear_view') }}" class="btn btn-primary btn-block btn-flat">View Record</a></br>
				</div>
					<div class="box-body">
						<div class="form-group has-feedback">
							<input type="file" name="import_file" data-validation="required" data-validation-error-msg="Please Upload Excel File" /></br>
						</div>
						<div class="form-group has-feedback">
							<b>Remark</b>
							<select name="remarks" id="remarks" class="form-control" data-validation="required" data-validation-error-msg="Select Month" >
								<option value="">Select Reason</option>
								<option value="Scale Change">Scale Change</option>
								<option value="Promotion">Promotion</option>
							</select>
						</div>
						<div class="row">                    
							<div class="col-xs-4">
								<button type="submit" class="btn btn-primary btn-block btn-flat">Upload</button>
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
