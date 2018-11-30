
@extends('layouts.app')

@section('htmlheader_title')
    Income Tax
@endsection

@section('contentheader_title')
@endsection

@section('main-content')

    <body class="hold-transition register-page">
    <div class="register-box">       
        
        <div class="register-box-body">
            <p class="login-box-msg">Income Tax</p>
			@if(Session::has('msg'))
				<div class="alert alert-danger">
					<strong>{{ Session::get('msg') }}</strong>
				</div>
			@endif
            <form action="../income_tax_insert" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}				
				<div class="form-group has-feedback">
					<input type="file" name="import_file" data-validation="required" data-validation-error-msg="Please Upload Excel File"/></br>
				</div>
                <div class="form-group has-feedback">
                    <b>Month</b>
					<select name="month" id="month" class="form-control" data-validation="required" data-validation-error-msg="Select Month">
						<option value="">Select month</option>
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
				<div class="form-group has-feedback">
                    <b>Year</b>
					<select name="year" id="year" class="form-control" data-validation="required" data-validation-error-msg="Select Year">
						<option value="">Select Year</option>
						<option value="2016">2016</option>
						<option value="2017">2017</option>
						<option value="2018">2018</option>
						<option value="2019">2019</option>
						<option value="2020">2020</option>
						<option value="2021">2021</option>
						<option value="2022">2022</option>
						<option value="2023">2023</option>
						<option value="2024">2024</option>
						<option value="2025">2025</option>
						<option value="2026">2026</option>
						<option value="2027">2027</option>
						<option value="2028">2028</option>
					</select>
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
