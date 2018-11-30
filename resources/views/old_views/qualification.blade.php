<!--@extends('layouts.auth')

@section('htmlheader_title')
    Register
@endsection

@section('content')-->
@extends('layouts.app')

@section('htmlheader_title')
    Dashboard
@endsection

@section('contentheader_title')
    Qualification Master
@endsection

@section('main-content')
<body class="hold-transition register-page">
    <div class="register-box">        
        
        <div class="register-box-body">
            <p class="login-box-msg">Qualification</p>
			
            <form action="store" method="post">

                {!! csrf_field() !!}

                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Qualification" name="qualification" required pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>
                </div>
                <div class="form-group has-feedback">
                    <input type="hidden" class="form-control" placeholder="Status" name="status" value="1"/>
                </div>
                <div class="row">                    
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/jquery.form-validator.min.js" type="text/javascript"></script>
	<script>
        $.validate({
        });
    </script>
    @include('layouts.partials.scripts_auth')

</body>

@endsection
