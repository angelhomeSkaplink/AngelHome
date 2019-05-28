@extends('layouts.app')

@section('htmlheader_title')
    Rejoin
@endsection

@section('contentheader_title')
    Rejoin
@endsection

@section('header-extra')

@endsection

@section('main-content')
<script type="text/javascript" language="javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="../js/bootstrap-datepicker.js"></script>
<div class="row">  
	<form action="../update_rejoin" method="post">      
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Rejoin</h3>
				</div>
				<div class="box-body">
					{{ csrf_field() }}						
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="sus_id" value="{{ $row->sus_id }}" readonly />
					</div>
					<div class="form-group has-feedback">
						Employee Code
						<input type="text" class="form-control" name="emp_id" value="{{ $row->emp_id }}" readonly />
					</div>					
					<div class="form-group has-feedback">
						Rejoin Date
						<input type="text" class="form-control" placeholder="Rejoin Date" name="rejoin_date" id="rejoin_date" onkeyup="getdateofretirement();" data-validation="required" data-validation-error-msg="This Field is Required"/>
						<script type="text/javascript"> $('#rejoin_date').datepicker({format: 'yyyy/mm/dd'});</script> 
					</div>						
					<div class="row">                    
						<div class="col-xs-4">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Update</button>
						</div>
					</div>				
				</div>
			</div>
		</div>
	</form>
</div>
<script type="text/javascript" language="javascript" src="../js/jquery.min.js"></script>
<script src="../js/jquery.form-validator.min.js" type="text/javascript"></script>
	<script>
        $.validate({
        });
    </script>
@endsection
@section('scripts-extra')

@endsection