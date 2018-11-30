@extends('layouts.app')
@section('htmlheader_title')
    Miscllenious Expances
@endsection
@section('contentheader_title')
    
@endsection
@section('main-content')

<script type="text/javascript" language="javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="../js/bootstrap-datepicker.js"></script>
<div class="row">
	<form action="m_expanse"  method="post">	
		{!! csrf_field() !!}
		<div class="col-md-6">
			<div class="row">                    
				<div class="col-xs-4">
					<a href="../link/{{ $data }}" class="btn btn-primary btn-block btn-flat">For Single Employee</a>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="row">                    
				<div class="col-xs-4">
					<a href="../link1/{{ $data }}" class="btn btn-primary btn-block btn-flat">For All Employee</a>
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
