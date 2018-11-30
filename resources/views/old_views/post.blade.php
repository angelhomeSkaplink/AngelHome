
@extends('layouts.app')

@section('htmlheader_title')
    Post Master
@endsection

@section('contentheader_title')
    Post Master
@endsection

@section('main-content')
<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="js/bootstrap-datepicker.js"></script>
<script>
	$(document).ready(function() {
		$('select[name="fld_PayScale_lower_limit"]').on('change', function() {
			var PayScale_lower_limit = $(this).val();
			console.log(PayScale_lower_limit);
			if(PayScale_lower_limit) {
				$.ajax({
					url: 'get_PayScale_upper_limit/'+PayScale_lower_limit,
					type: "GET",						
					dataType: "json",
					success:function(data) {
						console.log(data);
						$.each(data, function() {	
							document.getElementById('fld_PayScale_uper_limit').value = data.fld_PayScale_uper_limit;							
						});
					}
				});
				$.ajax({
					url: 'get_grade_pay/'+PayScale_lower_limit,
					type: "GET",						
					dataType: "json",
					success:function(data) {
						console.log(data);
						$.each(data, function() {	
							document.getElementById('fld_GradePay').value = data.grade_pay;
							//$('#fld_GradePay').append(''+data.grade_pay+'');
						});
					}
				});
			}			
		});
	});
</script>
<div class="row">
	<form action="poststore" method="post">
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-header with-border">
				   <h3 class="box-title">Post Master</h3>
				</div>
				@if(Session::has('msg'))
					<div class="alert alert-danger">
						<strong>{{ Session::get('msg') }}</strong>
					</div>
				@endif
				<div class="box-body">	
				    
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Post Name" name="fld_PostName" data-validation="required" data-validation-error-msg="This Field is Required"/>
					</div>
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Total Post" name="fld_TotalPost" data-validation="number" data-validation-error-msg="Numeric Value Only"/>
					</div>
					
				
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Sanction No" name="fld_SanctionNo" value=""/>
					</div> 
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Sanction Date" name="fld_SanctionDate" id="fld_SanctionDate" value=""/>
						<script type="text/javascript"> $('#fld_SanctionDate').datepicker({format: 'yyyy/mm/dd'});</script>
					</div>
					
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" placeholder="Date Of Increament" name="fld_Status" id="fld_Status" value="1"/>
					</div>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="col-xs-4">
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
