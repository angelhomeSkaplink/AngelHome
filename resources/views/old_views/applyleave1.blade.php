@extends('layouts.app')

@section('htmlheader_title')
    Apply Leave
@endsection

@section('contentheader_title')
     Apply Leave
@endsection

@section('main-content')
<script type="text/javascript" language="javascript" src="/js/jquery.min.js"></script>
<body class="hold-transition register-page">
    <div class="register-box"> 
        <div class="register-box-body">
            <p class="login-box-msg"> Apply Leave</p>
            <form action="leaveapply" method="post">

                {!! csrf_field() !!}																
				
				<div class="form-group has-feedback">
                    <input type="hidden" class="form-control" placeholder="" name="emp_id" value="{{ $row->emp_id }}" readonly />
                </div>
				<div class="form-group has-feedback">
                    <input type="hidden" class="form-control" placeholder="" name="fld_DeptID" value="{{ $row->fld_DeptID }}" readonly />
                </div>
				<div class="form-group has-feedback">
					<select name="leave_type_id" id="leave_type_id" class="form-control">
						<option value="0">Select Leave Type</option>
						<?php
							$users = DB::table('leavetypes')->get();							
							foreach ($users as $user){ ?>
								<option value="{{ $user->leave_type_id}}">{{ $user->leave_type }}</option>
						<?php }	?>												
					</select>
				</div>				
				<div class="form-group has-feedback">
					From Date
                    <input type="date" class="form-control" placeholder="From Date" name="from_date" id="from_date"/>
				</div>
                <div class="form-group has-feedback">
					To Date
                    <input type="date" class="form-control" placeholder="To Date" name="to_date" id="to_date"/>
				</div>
				<div class="form-group has-feedback">
					No of Days
                    <input type="text" class="form-control" placeholder="No of Days" name="no_of_day" id="no_of_day" onkeyup="setGrades();" value=""/>
                </div>
				<div class="form-group has-feedback">
					Reason
                    <input type="text" class="form-control" placeholder="Reason" name="reason" value=""/>
                </div>
				<div class="form-group has-feedback">
					Applied On
                    <input type="date" class="form-control" placeholder="Applied On" name="applied_on" value=""/>
                </div>
				<div class="form-group has-feedback">
					Applied By
                    <input type="text" class="form-control" placeholder="Applied By" name="applied_by" value=""/>
                </div>
				<div class="form-group has-feedback">
					Applied For
                    <input type="text" class="form-control" placeholder="Applied For" name="applied_for" value=""/>
                </div>
				<div class="form-group has-feedback">
                    <input type="hidden" class="form-control" placeholder="Applied For" name="status" value="1"/>
                </div>
                <div class="row">                    
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                    </div><!-- /.col -->
                </div>
            </form>
        </div>
    </div>
    @include('layouts.partials.scripts_auth')
</body>

@endsection
