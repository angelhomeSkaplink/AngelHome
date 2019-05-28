@extends('layouts.app')

@section('htmlheader_title')
    Employee Details
@endsection

@section('contentheader_title')
    Employee Details
@endsection

@section('header-extra')

@endsection

@section('main-content')
<div class="row">        
    <div class="col-md-4">
        <div class="box box-primary">            
            <div class="box-body">                   
                <form action="" method="post">
					<input type="hidden" name="_method" value="PATCH">

                        {{ csrf_field() }}  
						
					<div class="form-group has-feedback">
						<img src="/employee_images/{{ $row->service_image }}" class="img-circle" alt="User Image" height="100" width="100"/>
					</div>
					<div class="form-group has-feedback">
						Name
                        <input type="text" class="form-control" name="firstname"
                                value="{{ $row->emp_f_name }} {{ $row->emp_m_name }} {{ $row->emp_l_name }}" readonly />
                    </div>						
					<div class="form-group has-feedback">
						Qualification
						<?php
							$qualification = DB::table('qualifications')->where('qualification_id', $row->emp_qualification_id)->first();							
						{ ?>
						<input type="text" class="form-control" name="firstname"
                            value="{{ $qualification->qualification }}" readonly />
						<?php } ?>
                    </div>
					<div class="form-group has-feedback">
						Post
						<?php
							$post = DB::table('posts')->where('fld_PostID', $row->post_id)->first();							
						{ ?>
						<input type="text" class="form-control" name="firstname"
                            value="{{ $post->fld_PostName }}" readonly />
						<?php } ?>
                    </div>
					<div class="form-group has-feedback">
						Department
						<?php
							$department = DB::table('departments')->where('fld_DeptID', $row->fld_DeptID)->first();							
						{ ?>
						<input type="text" class="form-control" name="firstname"
                            value="{{ $department->fld_Department }}" readonly />
						<?php } ?>
                    </div>
					<div class="form-group has-feedback">
						Date of Birth
                        <input type="date" class="form-control" name="firstname"
                            value="{{ $row->emp_dob }}" readonly />
					</div>
					<div class="form-group has-feedback">
						Date of Joining
                        <input type="date" class="form-control" name="emp_date_of_joining"
                            value="{{ $row->emp_date_of_joining }}" readonly />
					</div>
					<div class="form-group has-feedback">
						Date of Retirement
                        <input type="date" class="form-control" name="emp_date_of_retirement"
                            value="{{ $row->emp_date_of_retirement }}" readonly />
					</div>
					<div class="form-group has-feedback">
						Gender
                        <input type="text" class="form-control" name="firstname"
                            value="{{ $row->emp_gender }}" readonly />
                    </div>
					<div class="form-group has-feedback">
						Type
                        <input type="text" class="form-control" name="firstname"
                            value="{{ $row->emp_type }}" readonly />
                    </div>
                </form>
            </div>
        </div>
    </div> 
	<div class="col-md-4">
        <div class="box box-primary">            
			<div class="box-body">
				<div class="form-group has-feedback">
					Blood Group
                    <input type="text" class="form-control" name="firstname"
                        value="{{ $row->emp_blood_group }}" readonly />
                </div>
				<div class="form-group has-feedback">
					Phone No
                    <input type="text" class="form-control" name="firstname"
                        value="{{ $row->emp_contact_no }}" readonly />
                </div>
				<div class="form-group has-feedback">
					Alternate Contact No
                    <input type="text" class="form-control" name="firstname"
                        value="{{ $row->emp_alt_contact_no }}" readonly />
                </div>
				<div class="form-group has-feedback">
					Present House No
					<input type="text" class="form-control" name="firstname"
						value="{{ $row->emp_present_house_no }}" readonly />
				</div>
				<div class="form-group has-feedback">
					Present Locality
					<input type="text" class="form-control" name="firstname"
						value="{{ $row->emp_present_locality }}" readonly />
				</div>
				<div class="form-group has-feedback">
					Present City
					<input type="text" class="form-control" name="firstname"
						value="{{ $row->emp_present_city }}" readonly />
                </div>
				<div class="form-group has-feedback">
					Present District
                    <input type="text" class="form-control" name="firstname"
                        value="{{ $row->emp_present_district }}" readonly />
                </div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
        <div class="box box-primary">            
			<div class="box-body">
				<div class="form-group has-feedback">
					Permanent House No
					<input type="text" class="form-control" name="firstname"
						value="{{ $row->emp_permanent_house_no }}" readonly />
				</div>
				<div class="form-group has-feedback">
					Permanent Locality
					<input type="text" class="form-control" name="firstname"
						value="{{ $row->emp_permanent_locality }}" readonly />
				</div>
				<div class="form-group has-feedback">
					Permanent City
					<input type="text" class="form-control" name="firstname"
						value="{{ $row->emp_permanent_city }}" readonly />
				</div>
				<div class="form-group has-feedback">
					Permanent District
					<input type="text" class="form-control" name="firstname"
						value="{{ $row->emp_permanent_district }}" readonly />
                </div>
				<div class="form-group has-feedback">
					Cast
                    <input type="text" class="form-control" name="firstname"
                        value="{{ $row->emp_cast }}" readonly />
                </div>
				<div class="form-group has-feedback">
					Religion
                    <input type="text" class="form-control" name="firstname"
                        value="{{ $row->emp_religion }}" readonly />
                </div>
				<div class="form-group has-feedback">
					Employee Experience
                    <input type="text" class="form-control" value="{{ $row->emp_experience }}" readonly />
                </div>
				<div class="form-group has-feedback">
					Date of Regularization
					<?php if($row->emp_date_of_regularization==''){?>
                    <input type="text" class="form-control" value="On Probation" readonly />
					<?php } else {?>
					<input type="text" class="form-control" value="{{ $row->emp_date_of_regularization }}" readonly />
					<?php } ?>
                </div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts-extra')

@endsection