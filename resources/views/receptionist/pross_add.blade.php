
@extends('layouts.app')

@section('htmlheader_title')
    Future Resident Add
@endsection

@section('contentheader_title')
    Future Resident Add
@endsection

@section('main-content')

<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="js/bootstrap-datepicker.js"></script>

<div class="row">
	<form action="pross_stor" method="post" enctype="multipart/form-data">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<div class="box box-primary">
				@if(Session::has('msg'))
					<div class="alert alert-danger">
						<strong>{{ Session::get('msg') }}</strong>
					</div>
				@endif
				<div class="box-body">					
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Future Resident Name" name="prospective_name" required pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>
					</div> 
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Phone No" name="phone_no" pattern="[0-9]{10}" Title="Numeric Value. 10 Digit"/>
					</div>
					<div class="form-group has-feedback">
						<input type="email" class="form-control" placeholder="Email" name="email" />
					</div>
					
					<div class="form-group has-feedback">
						<select name="self_or_other" id="self_or_other" class="form-control" required >
						<option value="">For Self or Others</option>
							<option value="Self">Self</option>
							<option value="Others">Others</option>	
						</select>
					</div>
					
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Benifactor Name" name="person_name" id="person_name" pattern="[A-Za-z\s]+" Title="Alphabate Character Only" />
					</div>
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Relation" name="relation" id="relation" pattern="[A-Za-z\s]+" Title="Alphabate Character Only" />
					</div>
					
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" placeholder="" name="date" value="<?php echo date('Y/m/d'); ?>"/>
					</div>
					<div class="form-group has-feedback">
						<select name="moc" id="moc" class="form-control" required >
						<option value="">Method of Communication</option>
							<option value="Phone">Phone</option>
							<option value="Email">Email</option>
						</select>
					</div>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group has-feedback">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
					</div>
				</div>
			</div>
		</div>
		
	</form>
</div>
<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script src="js/jquery.form-validator.min.js" type="text/javascript"></script>
	<script>
        $.validate({
        });
    </script>
    @include('layouts.partials.scripts_auth')

@endsection
