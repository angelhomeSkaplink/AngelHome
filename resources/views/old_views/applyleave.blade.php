@extends('layouts.app')

@section('htmlheader_title')
    Apply Leave
@endsection

@section('contentheader_title')
     Apply Leave
@endsection

@section('main-content')
<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="js/bootstrap-datepicker.js"></script>
<script type="text/javascript" language="javascript" src="js/zebra_datepicker.js"></script>
<link href="css/default.css" rel="stylesheet" type="text/css" />
<body class="hold-transition register-page">
    <div class="register-box"> 
        <div class="register-box-body">
            <p class="login-box-msg">Apply Leave</p>
			@if(Session::has('msg'))
				<div class="alert alert-danger">
					<strong>{{ Session::get('msg') }}</strong>
				</div>
			@endif
            <form action="leaveapply" method="post">

                {!! csrf_field() !!}																
				
				<div class="form-group has-feedback">
                    <input type="hidden" class="form-control" placeholder="" name="emp_id" value="{{ $row->emp_id }}" readonly />
                </div>
				<div class="form-group has-feedback">
                    <input type="hidden" class="form-control" placeholder="" name="fld_DeptID" value="{{ $row->fld_DeptID }}" readonly />
                </div>
				<div class="form-group has-feedback">
					<select name="leave_type_id" id="leave_type_id" class="form-control" required Title="Required Field">
						<option value="">Select Leave Type</option>
						<?php
							$users = DB::table('leavetypes')->where('status', '1')->get();							
							foreach ($users as $user){ ?>
								<option value="{{ $user->leave_type_id}}">{{ $user->leave_type }}</option>
						<?php }	?>												
					</select>
				</div>				
				<div class="form-group has-feedback">
					From Date
                    <input type="text" class="form-control" placeholder="From Date" name="from_date" id="from_date" required Title="Required Field"/>
					<script type="text/javascript"> $('#from_date').datepicker({format: 'yyyy-mm-dd'});</script>  
				</div>
				<!--<<div class="form-group has-feedback">
					From Date
                    <input type="text" class="form-control" placeholder="From Date" name="from_date" id="from_date" data-validation="required" />
					<script type="text/javascript"> $('#from_date').Zebra_DatePicker();</script>  
				</div>-->
                <div class="form-group has-feedback">
					To Date
                    <input type="text" class="form-control" placeholder="To Date" name="to_date" id="to_date" required  Title="Required Field"/>
					<script type="text/javascript"> $('#to_date').datepicker({format: 'yyyy-mm-dd'});</script>  
				</div>
				<div class="form-group has-feedback">
					Reason
                    <input type="text" class="form-control" placeholder="Reason" name="reason" value=""/>
                </div>
				<div class="form-group has-feedback">
					Applied On
                    <input type="text" class="form-control" placeholder="Applied On" name="applied_on" value="<?php echo date("y/m/d") ?>" readonly />
                </div>				
				<div class="form-group has-feedback">
					Applied For
                    <input type="text" class="form-control" placeholder="Applied For" name="applied_for" pattern="[A-Za-z\s]+" Title="Character Only"/>
                </div>
				<div class="form-group has-feedback">
                    <input type="hidden" class="form-control" placeholder="Applied For" name="status" value="1"/>
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
