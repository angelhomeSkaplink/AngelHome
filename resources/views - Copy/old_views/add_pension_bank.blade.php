@extends('layouts.app')

@section('htmlheader_title')
    Employee Pension Bank Details
@endsection

@section('contentheader_title')
    Employee Pension Bank Details
@endsection

@section('header-extra')

@endsection

@section('main-content')
<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="js/bootstrap-datepicker.js"></script>
<div class="row">
	<div class="col-md-4"></div>
	<form action="../pension_bank_detail" method="post">      
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-body"> 
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="emp_id" value="{{ $emp_id }}" />
					</div>
					<div class="form-group has-feedback">
						Bank Name
						<input type="text" class="form-control" name="bank_details" required pattern="[A-Za-z\s]+" Title="Alphabate Character Only" />
					</div>
					<div class="form-group has-feedback">
						Bank Account No
						<input type="text" class="form-control" name="account_no" required />
					</div>
					<div class="form-group has-feedback">
						IFSC Code
						<input type="text" class="form-control" name="ifsc_code" required />
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