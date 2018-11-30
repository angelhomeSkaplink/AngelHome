
@extends('layouts.app')

@section('htmlheader_title')
    Employee Service Book
@endsection

@section('contentheader_title')
    Employee Service Book
@endsection

@section('main-content')

<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="js/bootstrap-datepicker.js"></script>

<div class="row">
	<form action="" method="post">
		<div class="col-md-4">
			<div class="box box-primary">				
				<div class="box-body">
					<div class="form-group has-feedback">
						<a href="../emp_transfer/{{ $emp_id }}">Transfer</a>
					</div><hr/>
					<div class="form-group has-feedback">
						<a href="../emp_inc/{{ $emp_id }}">Increament</a>
					</div><hr/> 
					<div class="form-group has-feedback">
						<a href="../emp_promo/{{ $emp_id }}">Promotion</a>
					</div><hr/>					
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="box box-primary"> 				
				<div class="box-body">					
					<div class="form-group has-feedback">
						<a href="../servicedetails/{{ $emp_id }}">Fixation</a>
					</div><hr/>
					<div class="form-group has-feedback">
						<a href="../emp_sus/{{ $emp_id }}">Suspension</a>
					</div><hr/>	
					<div class="form-group has-feedback">
						<a href="../emp_scale_change/{{ $emp_id }}">Scale Change</a>
					</div><hr/>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="box box-primary"> 						
				<div class="box-body">
					<div class="form-group has-feedback">
						<a href="../emp_depu/{{ $emp_id }}">Deputation</a>
					</div><hr/>
					<div class="form-group has-feedback">
						<a href="../emp_lie/{{ $emp_id }}">Lien</a>
					</div><hr/>
					<div class="form-group has-feedback">
						<a href="../emp_leave_servicebook/{{ $emp_id }}">Leave</a>
					</div><hr/>
				</div>           
			</div>
		</div>
	</form>
</div>
@include('layouts.partials.scripts_auth')
@endsection
