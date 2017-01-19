
@extends('layouts.app')

@section('htmlheader_title')
    Employee
@endsection

@section('contentheader_title')
    Employee
@endsection

@section('main-content')
<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="js/bootstrap-datepicker.js"></script>
<script>
	$(document).ready(function() {
		$('#address').click(function () {
			if (this.checked){
				var emp_present_house_no = document.getElementById('emp_present_house_no').value;
				var emp_present_locality = document.getElementById('emp_present_locality').value;
				var emp_present_city = document.getElementById('emp_present_city').value;
				var emp_present_district = document.getElementById('emp_present_district').value;
				
				document.getElementById('emp_permanent_house_no').value = emp_present_house_no;
				document.getElementById('emp_permanent_locality').value = emp_present_locality;
				document.getElementById('emp_permanent_city').value = emp_present_city;
				document.getElementById('emp_permanent_district').value = emp_present_district;
            }
			else{
				document.getElementById('emp_permanent_house_no').value = '';
				document.getElementById('emp_permanent_locality').value = '';
				document.getElementById('emp_permanent_city').value = '';
				document.getElementById('emp_permanent_district').value = '';
			}
        });		
	});
	
	function getdateofretirement(){
		var tt = document.getElementById('emp_dob').value;

		var date = new Date(tt);
		var newdate = new Date(date);

		newdate.setDate(newdate.getDate() + 21900);
		
		var dd = newdate.getDate();
		var mm = newdate.getMonth() + 1;
		var y = newdate.getFullYear();

		var someFormattedDate = y + '/' + mm + '/' + dd;
		document.getElementById('emp_date_of_retirement').value = someFormattedDate;
	}
	
</script>
<div class="row">
	<form action="empstore" method="post">
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-header with-border">
				   <h3 class="box-title">Employee Details</h3>
				</div>
				<div class="box-body">
					<!--<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Qualification" name="emp_qualification_id" value=""/>
					</div>-->
					<div class="form-group has-feedback">
						<select name="emp_qualification_id" id="emp_qualification_id" class="form-control" data-validation="required" data-validation-error-msg="This Field is Required">
							<option value="">Select Qualification</option>
							<?php
								$users = DB::table('qualifications')->get();							
								foreach ($users as $user)
								{ 
									?>
										<option value="{{ $user->qualification_id}}">{{ $user->qualification }}</option>
									<?php
								}														
							?>												
						</select>
					</div>
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="First Name" name="emp_f_name" data-validation="required" data-validation-error-msg="This Field is Required"/>
					</div> 
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Middle Name" name="emp_m_name" value=""/>
					</div>
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Last Name" name="emp_l_name" data-validation="required" data-validation-error-msg="This Field is Required"/>
					</div>
					<div class="form-group has-feedback">
						<select name="post_id" id="post_id" class="form-control" data-validation="required" data-validation-error-msg="This Field is Required">
							<option value="">Select Post</option>
							<?php
								$users = DB::table('posts')->get();							
								foreach ($users as $user)
								{ 
									?>
										<option value="{{ $user->fld_PostID}}">{{ $user->fld_PostName }}</option>
									<?php
								}														
							?>												
						</select>
					</div>
					<div class="form-group has-feedback">
						<select name="fld_DeptID" id="fld_DeptID" class="form-control" data-validation="required" data-validation-error-msg="This Field is Required">
							<option value="">Select Department</option>
							<?php
								$users = DB::table('departments')->get();							
								foreach ($users as $user) { ?>
									<option value="{{ $user->fld_DeptID }}">{{ $user->fld_Department }}</option>
							<?php }	?>												
						</select>
					</div>
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Date of Birth" name="emp_dob" id="emp_dob" onkeyup="getdateofretirement();" data-validation="required" data-validation-error-msg="This Field is Required"/>
						<script type="text/javascript"> $('#emp_dob').datepicker({format: 'yyyy/mm/dd'});</script> 
					</div>
					<div class="form-group has-feedback">
						<select name="emp_gender" id="emp_gender" class="form-control">
						<option value="0">Select Employee Gender</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>	
						</select>
					</div> 
					<div class="form-group has-feedback">
						<select name="emp_type" id="emp_type" class="form-control" data-validation="required" data-validation-error-msg="Enter Password">
							<option value="">Select Employee Type</option>
							<option value="Permanent">Permanent</option>
							<option value="Casual">Casual</option>					
						</select>
					</div>
					<div class="form-group has-feedback">
						<select name="emp_blood_group" id="emp_blood_group" class="form-control">
							<option value="0">Select Blood Group</option>
							<option value="A+">A+</option>
							<option value="A-">A-</option>
							<option value="B+">B+</option>
							<option value="B-">B-</option>
							<option value="O+">O+</option>
							<option value="O-">O-</option>
							<option value="AB+">AB+</option>
							<option value="AB-">AB-</option>						
						</select>
					</div>				
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Phone No" name="emp_contact_no" id="emp_contact_no" onkeyup="getdateofretirement();" data-validation="number" data-validation-error-msg="Input Should be Numeric Value"/>
					</div> 				
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Alternet Phone No" name="emp_alt_contact_no" value=""/>
					</div>
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Bank Account No" name="bank_account_number" id="bank_account_number" data-validation="required" data-validation-error-msg="This Field is Required"/>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="box box-primary"> 
				<div class="box-header with-border">
				   <h3 class="box-title">Present Address</h3>
				</div>
				<div class="box-body">
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Present House No" name="emp_present_house_no" id="emp_present_house_no" value=""/>
					</div>
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Present Locality" name="emp_present_locality" id="emp_present_locality" value=""/>
					</div>
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Present City" name="emp_present_city" id="emp_present_city" value=""/>
					</div>
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Present District" name="emp_present_district" id="emp_present_district" value=""/>
					</div> 
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="box box-primary"> 
				<div class="box-header with-border">
				   <h3 class="box-title">Permanent Address</h3>
				</div>			
				<div class="box-body">
					<div class="form-group has-feedback">
						<div class="col-md-12"><input id="address" name="address" type="checkbox" value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Same as Present Address</b></div></br>
					</div>
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Permanent House No" name="emp_permanent_house_no" id="emp_permanent_house_no" value=""/>
					</div>
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Permanent Locality" name="emp_permanent_locality" id="emp_permanent_locality" value=""/>
					</div>
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Permanent City" name="emp_permanent_city" id="emp_permanent_city" value=""/>
					</div>
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Permanent District" name="emp_permanent_district" id="emp_permanent_district" value=""/>
					</div>
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Cast" name="emp_cast" value=""/>
					</div>
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Region" name="emp_religion" value=""/>
					</div>
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Date of Retirement" name="emp_date_of_retirement" id="emp_date_of_retirement" onkeyup="getdateofretirement();" value=""/>
						<script type="text/javascript"> $('#emp_date_of_retirement').datepicker({format: 'yyyy/mm/dd'});</script> 
					</div>
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" placeholder="" name="submission_date" value="<?php echo date('Y/m/d'); ?>"/>
					</div>
				</div>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="row">                    
					<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
					</div>
				</div>            
			</div>
		</div>
	</form>
</div>
<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script src="js/jquery.form-validator.min.js" type="text/javascript"></script>
	<script>
        $.validate({
        });
    </script>
    @include('layouts.partials.scripts_auth')

@endsection
