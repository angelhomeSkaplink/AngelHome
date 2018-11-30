@extends('layouts.app')

@section('htmlheader_title')
    Pension Fixation
@endsection

@section('contentheader_title')
    Pension Fixation
@endsection

@section('header-extra')

@endsection

@section('main-content')
<script type="text/javascript" language="javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="../js/bootstrap-datepicker.js"></script>

</script>
<div class="row">
	<form action="../calculate_pension" method="post">
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-body"> 
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="employee_id" value="{{ $emp_id }}" />
					</div>
					<div class="form-group has-feedback">
						Pension Order No
						<input type="text" class="form-control" name="pension_order_number" required />
					</div>
					<div class="form-group has-feedback">
						Pension Order Date
						<input type="text" class="form-control" name="pension_order_date" id="pension_order_date" required />
						<script type="text/javascript"> $('#pension_order_date').datepicker({format: 'yyyy-mm-dd'});</script>
					</div>
					<div class="form-group has-feedback">
						Pension Type
						<select name="pension_type" id="pension_type" class="form-control" required >
							<option value="">Select Pension Type</option>
							<option value="Self Pension">Self Pension</option>
							<option value="Family Pension">Family Pension</option>
						</select>
					</div>
					<div class="form-group has-feedback">
						Basic Pay
						<input type="number" class="form-control" name="basic" id="basic" value="{{ $basic_pay }}" onkeyup="getPension();" required Title="Numeric Value Only" />
					</div>
					
				</div>
			</div>			
		</div>
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-body">	
					<div class="form-group has-feedback">
						DR
						<input type="number" class="form-control" name="dr" value="{{ $da }}" id="dr" onkeyup="getPension();" required Title="Numeric Value Only" />
					</div>
					<div class="form-group has-feedback">
						Medical
						<input type="number" class="form-control" name="medical" value="{{ $ma }}" id="medical" onkeyup="getPension();" required Title="Numeric Value Only" />
					</div>
					<div class="form-group has-feedback">
						Length of Service
						<input type="text" class="form-control" name="length" id="length" onkeyup="getPension();" required Title="Numeric Value Only" value="0" />
					</div>
					<div class="form-group has-feedback">
						Remarks
						<textarea class="form-control" name="remark"></textarea>
					</div>
				</div>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="row">                    
					<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
					</div>
				</div> 
			</div>			
		</div>
	</form>
</div>
@endsection
@section('scripts-extra')

@endsection