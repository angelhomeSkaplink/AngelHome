
@extends('layouts.app')

@section('htmlheader_title')
    Perameter
@endsection

@section('contentheader_title')
    Perameter 
@endsection

@section('main-content')

<body class="hold-transition register-page">
    <div class="register-box"> 
        <div class="register-box-body">
            <p class="login-box-msg">Perameter</p>
            <form action="parameter_insert" method="post">

                {!! csrf_field() !!}
				
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Parameter Type" name="parameter_type" id="parameter_type" data-validation="required" data-validation-error-msg="This Field is Required" />
                </div>				
                <div class="row">                    
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
	<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
	<script src="js/jquery.form-validator.min.js" type="text/javascript"></script>
	<script>
        $.validate({
        });
    </script>
@include('layouts.partials.scripts_auth')
</body>
@endsection
