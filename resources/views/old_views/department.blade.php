@extends('layouts.app')

@section('htmlheader_title')
    Department
@endsection

@section('contentheader_title')
    Department Master
@endsection

@section('main-content')

<body class="hold-transition register-page">
    <div class="register-box"> 
        <div class="register-box-body">
            <p class="login-box-msg">Department</p>			
            <form action="department_store" method="post">

                {!! csrf_field() !!}
                
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Department Name" name="fld_Department" required pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>
                </div>
				<div class="form-group has-feedback">
                    <input type="hidden" class="form-control" placeholder="Department Name" name="fld_Status" value="1"/>
                </div>				
                <div class="row">                    
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @include('layouts.partials.scripts_auth')
</body>
@endsection
