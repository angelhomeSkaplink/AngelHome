@extends('layouts.app')

@section('htmlheader_title')
    Salary Search(By Month)
@endsection

@section('contentheader_title')
   Salary Search(By Month)
@endsection

@section('main-content')
<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="js/bootstrap-datepicker.js"></script>
<script type="text/javascript" language="javascript" src="js/zebra_datepicker.js"></script>
<link href="css/default.css" rel="stylesheet" type="text/css" />
<body class="hold-transition register-page">
    <div class="register-box"> 
        <div class="register-box-body">
            <p class="login-box-msg"></p>
			@if(Session::has('msg'))
				<div class="alert alert-danger">
					<strong>{{ Session::get('msg') }}</strong>
				</div>
			@endif
            <form action="search_salary_by_month" method="post">
                {!! csrf_field() !!}
				<div class="required">
					<div class="form-group has-feedback">
						<b>Month</b>
						<select required x-moz-errormessage="Please Select an item from the list" name="month" id="month" class="form-control">
							<option value="">Select Month</option>
							<option value="January">January</option>
							<option value="February">February</option>
							<option value="March">March</option>
							<option value="April">April</option>
							<option value="May">May</option>
							<option value="June">June</option>
							<option value="July">July</option>
							<option value="August">August</option>
							<option value="September">September</option>
							<option value="October">October</option>
							<option value="November">November</option>
							<option value="December">December</option>
						</select>
					</div>
				</div>				
                <div class="row">                    
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
	<script src="js/jquery.form-validator.min.js" type="text/javascript"></script>
	<script>
        $.validate({
        });
    </script>
    @include('layouts.partials.scripts_auth')
</body>

@endsection
