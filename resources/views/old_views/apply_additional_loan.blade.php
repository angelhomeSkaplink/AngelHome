@extends('layouts.app')
@section('htmlheader_title')
    Apply Loan
@endsection
@section('contentheader_title')
     Apply Loan
@endsection
@section('main-content')

<script type="text/javascript" language="javascript" src="/js/jquery.min.js"></script>

<body class="hold-transition register-page">
	<div class="register-box">
		<div class="register-box-body">
			<p class="login-box-msg"> Apply Loan</p>
			<form action="additional_loan_insert" method="post">
                {!! csrf_field() !!}
				<div class="form-group has-feedback">
                    <input type="hidden" class="form-control" placeholder="" name="emp_id" value="{{ $row->emp_id}}" readonly />
                </div>				
				<div class="form-group has-feedback">
					<select name="loan_type_id" id="loan_type_id" class="form-control">
						<option value="0">Select Loan Type</option>
						<?php
							$users = DB::table('loan_type')->get();							
							foreach ($users as $user)
							{ 
								?>
									<option value="{{ $user->loan_type_id}}">{{ $user->loan_type }}</option>
								<?php 
							} ?>											
					</select>
				</div>
							
				<div class="form-group has-feedback">							
					Loan Amount 
                    <input type="text" class="form-control" placeholder="Loan Amount" name="loan_ammount" id='loan_ammount' value='' onkeyup='setGrades();' required pattern="[0-9]+" Title="Numeric Value Only"/>
                </div>				
                
				<div class="form-group has-feedback">
					Applied On
                    <input type="text" class="form-control" placeholder="" name="applied_on" value="<?php echo date("y/m/d") ?>" readonly />
                </div>
				<div class="form-group has-feedback">
					Applied For
                    <input type="text" class="form-control" placeholder="Applied For" name="applied_for" required pattern="[A-Za-z]+" Title="Alphabate character Only"/>
                </div>				
				<div class="form-group has-feedback">
                    <input type="hidden" class="form-control" placeholder="" name="fld_DeptID" value="{{ $row->fld_DeptID}}" readonly />
                </div>
				<div class="form-group has-feedback">
                    <input type="hidden" class="form-control" placeholder="Status" name="status" value="1" readonly />
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
