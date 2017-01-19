@extends('layouts.app')

@section('htmlheader_title')
    Employee Edit
@endsection

@section('contentheader_title')
    Employee Edit
@endsection

@section('header-extra')

@endsection

@section('main-content')
<div class="row">  
	<form action="{{action('EmployeeController@update_employee')}}" method="post">      
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Employee Edit</h3>
				</div>
				<div class="box-body">                 
					<input type="hidden" name="_method" value="PATCH">

						{{ csrf_field() }}
						
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="emp_id"
							value="{{ $row->emp_id }}" />
					</div>	
					<div class="form-group has-feedback">
						Employee Qualification
						<select name="emp_qualification_id" id="emp_qualification_id" class="form-control">							
							<?php
								$qualification = DB::table('qualifications')->where('qualification_id', $row->emp_qualification_id)->first();
								{
								?>
									<option value="<?php echo $qualification->qualification_id ?>"><?php echo $qualification->qualification ?></option>
							<?php } ?>
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
						First Name
						<input type="text" class="form-control" name="emp_f_name"
							value="{{ $row->emp_f_name }}" />
					</div>
					<div class="form-group has-feedback">
						Middle Name
						<input type="text" class="form-control" name="emp_m_name"
							value="{{ $row->emp_m_name }}" />
					</div>
					<div class="form-group has-feedback">
						Last Name
						<input type="text" class="form-control" name="emp_l_name"
							value="{{ $row->emp_l_name }}" />
					</div>
					<div class="form-group has-feedback">
						Post
						<select name="post_id" id="post_id" class="form-control">							
							<?php
								$post = DB::table('posts')->where('fld_PostID', $row->post_id)->first();
								{
								?>
									<option value="<?php echo $post->fld_PostID ?>"><?php echo $post->fld_PostName ?></option>
							<?php } ?>
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
						Department
						<select name="fld_DeptID" id="fld_DeptID" class="form-control">							
							<?php
								$department = DB::table('departments')->where('fld_DeptID', $row->fld_DeptID)->first();
								{
								?>
									<option value="<?php echo $department->fld_DeptID ?>"><?php echo $department->fld_Department ?></option>
							<?php } ?>
							<?php
								$users = DB::table('departments')->get();							
								foreach ($users as $user)
								{ 
									?>
										<option value="{{ $user->fld_DeptID}}">{{ $user->fld_Department }}</option>
									<?php
								}														
							?>												
						</select>
					</div>
					<div class="form-group has-feedback">	
						Bate of Birth
						<input type="date" class="form-control" name="emp_dob"
							value="{{ $row->emp_dob }}"  />
					</div>
					<div class="form-group has-feedback">
						Gender
						<select name="emp_gender" id="emp_gender" class="form-control">
							<option value="{{ $row->emp_gender }}">{{ $row->emp_gender }}</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>					
						</select>
					</div>					
				</div>
			</div>
		</div> 
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-body">
					<div class="form-group has-feedback">
						Type
						<select name="emp_type" id="emp_type" class="form-control">
							<option value="{{ $row->emp_type }}">{{ $row->emp_type }}</option>
							<option value="Permanent">Permanent</option>
							<option value="Casual">Casual</option>					
						</select>
					</div>					
					<div class="form-group has-feedback">
						Blood Group<div class="form-group has-feedback">
						<select name="emp_blood_group" id="emp_blood_group" class="form-control">
							<option value="{{ $row->emp_blood_group }}">{{ $row->emp_blood_group }}</option>
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
					</div>
					<div class="form-group has-feedback">
						Phone No
						<input type="text" class="form-control" name="emp_contact_no"
							value="{{ $row->emp_contact_no }}"  />
					</div>
					<div class="form-group has-feedback">
						Alternate Phone No
						<input type="text" class="form-control" name="emp_alt_contact_no"
							value="{{ $row->emp_alt_contact_no }}"  />
					</div>
					<div class="form-group has-feedback">
						Present House No
						<input type="text" class="form-control" name="emp_present_house_no"
							value="{{ $row->emp_present_house_no }}"  />
					</div>
					<div class="form-group has-feedback">
						Present Locality
						<input type="text" class="form-control" name="emp_present_locality"
							value="{{ $row->emp_present_locality }}"  />
					</div>
					<div class="form-group has-feedback">
						Present City
						<input type="text" class="form-control" name="emp_present_city"
							value="{{ $row->emp_present_city }}"  />
					</div>
					<div class="form-group has-feedback">
						Present District
						<input type="text" class="form-control" name="emp_present_district"
							value="{{ $row->emp_present_district }}"  />
					</div>
				</div>
			</div>
		</div>	
		<div class="col-md-4">
			<div class="box box-primary">				
				<div class="box-body">
					<div class="form-group has-feedback">
						Permanent Housu No
						<input type="text" class="form-control" name="emp_permanent_house_no"
							value="{{ $row->emp_permanent_house_no }}"  />
					</div>
					<div class="form-group has-feedback">
						Permenent Locality
						<input type="text" class="form-control" name="emp_permanent_locality"
							value="{{ $row->emp_permanent_locality }}"  />
					</div>
					<div class="form-group has-feedback">
						Permanent City
						<input type="text" class="form-control" name="emp_permanent_city"
							value="{{ $row->emp_permanent_city }}"  />
					</div>
					<div class="form-group has-feedback">
						Permanent District
						<input type="text" class="form-control" name="emp_permanent_district"
							value="{{ $row->emp_permanent_district }}"  />
						</div>
					<div class="form-group has-feedback">
						Cast
						<input type="text" class="form-control" name="emp_cast"
							value="{{ $row->emp_cast }}"  />
					</div>
					<div class="form-group has-feedback">
						Religion
						<input type="text" class="form-control" name="emp_religion"
							value="{{ $row->emp_religion }}"  />
					</div>
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" placeholder="" name="submission_date" value="<?php echo date('Y/m/d'); ?>"/>
					</div>
					<div class="row">                    
						<div class="col-xs-4">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Update</button>
						</div><!-- /.col -->
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection
@section('scripts-extra')

@endsection