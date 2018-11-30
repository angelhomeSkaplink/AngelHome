@extends('layouts.app')
@section('htmlheader_title')
    Add Leave
@endsection
@section('contentheader_title')
    Add Leave
@endsection
@section('main-content')

<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>

<body class="hold-transition register-page">
	<div class="register-box">
		<div class="register-box-body">
			<p class="login-box-msg">Add Leave</p>
			<form action="add_leave_type" method="post">
                {!! csrf_field() !!}				
				<div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Leave Type" name="leave_type" required pattern="[A-Za-z]+" Title="Alphabate Character Only" />
                </div>
				<div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="No of Days" name="no_of_days" required pattern="[0-9]+" Title="Numeric Value Only" />
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
