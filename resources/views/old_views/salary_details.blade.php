@extends('layouts.app')
@section('htmlheader_title')
    Salary Deduction
@endsection
@section('contentheader_title')
    Salary Deduction
@endsection
@section('main-content')

<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script>
	$(document).ready(function() {
		$('select[name="emp_id"]').on('change', function() {
			var emp_id = $(this).val();
			console.log(emp_id);
			if(emp_id) {
				$.ajax({
					url: 'employee_name/'+emp_id,
					type: "GET",						
					dataType: "json",
					success:function(data) {						
					}
				});
			}					
		});
	});	
</script>

<div class="row">
	<form action="" method="post">
		<div class="col-md-4">
			<div class="box box-primary">				
				<div class="box-body">
					<div class="form-group has-feedback">
						Employee ID
						<select name="emp_id" id="emp_id" class="form-control">
							<option value="0">Select Employee ID</option>
							<?php
								$users = DB::table('employees')->get();							
								foreach ($users as $user)
								{ 
									?>
										<option value="{{ $user->emp_id}}">{{ $user->emp_id }}</option>
									<?php
								}														
							?>												
						</select>
					</div>			
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-body">
					
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-body">
					
					<input type="hidden" name="_token" value="{{ csrf_token() }}">						
				</div>
			</div>
		</div>
		
	</form>
</div>


    @include('layouts.partials.scripts_auth')
@endsection
