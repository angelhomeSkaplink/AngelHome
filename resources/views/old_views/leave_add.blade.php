@extends('layouts.app')
@section('htmlheader_title')
    Add Leave
@endsection
@section('contentheader_title')
    Add Leave
@endsection
@section('main-content')

<script type="text/javascript" language="javascript" src="/js/jquery.min.js"></script>
<script>	
	$(document).ready(function() {  
		$(document).ready(function() {
			$('select[name="emp_id"]').on('change', function() {
				var emp_id = $(this).val();
				if(emp_id) {
					$.ajax({
						url: '/employee_name/'+emp_id,
						type: "GET",						
						dataType: "json",
						success:function(data) {
							console.log(data);
							$.each(data, function() {
								document.getElementById('firstname').value = data.emp_f_name;
								document.getElementById('middlename').value = data.emp_m_name;
								document.getElementById('lastname').value = data.emp_l_name;
							});
						}
					});
				}					
			});
		});
	});
</script>
<body class="hold-transition register-page">
	<div class="register-box">
		<div class="register-box-body">
			<p class="login-box-msg">Add Leave</p>
			<form action="add_leave" method="post">
			
                {!! csrf_field() !!}
				
				<div class="form-group has-feedback">
					<select name="emp_id" id="emp_id" class="form-control">
						<option value="0">Select Employee</option>
						<?php
							$users = DB::table('employees')->get();							
							foreach ($users as $user)
							{ 
								?>
									<option value="{{ $user->emp_id }}">{{ $user->emp_id }}</option>
								<?php 
							} 
						?>											
					</select>
				</div>
				<div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="First Name" name="firstname" id="firstname" value="" readonly />
                </div>
				<div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Middle Name" name="middlename" id="middlename" value="" readonly />
                </div>
				<div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Last Name" name="lastname" id="lastname" value="" readonly />
                </div>				
				<div class="form-group has-feedback">
					<select name="leave_type_id" id="leave_type_id" class="form-control">
						<option value="0">Select Leave Type</option>
						<?php
							$users = DB::table('leavetypes')->get();							
							foreach ($users as $user)
							{ 
								?>
									<option value="{{ $user->leave_type_id}}">{{ $user->leave_type }}</option>
								<?php 
							} 
						?>											
					</select>
				</div>
				<div class="form-group has-feedback">
					Total No of Days
                    <input type="text" class="form-control" placeholder="Total No of Days" name="no_of_days" value=""/>
                </div>
				<div class="form-group has-feedback">
					Balance
                    <input type="text" class="form-control" placeholder="Balance" name="balance" value=""/>
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
