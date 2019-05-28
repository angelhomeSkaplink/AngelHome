@extends('layouts.app')

@section('htmlheader_title')
    Employees List
@endsection

@section('contentheader_title')
    Employees List
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>						
							<tr>
								<th>Code</th>
								<th>Name</th>
								<th>Designation</th>
								<th>Department</th>
								<th>Qualification</th>
								<th>Date of Birth</th>
								<th>Gender</th>
								<th>Date of Joining</th>
								<th>Date of retirement</th>
								<th>Blood Group</th>
								<th>Phone No</th>
								<th>Bank A/C No</th>
								<th>Bank Name</th>
								<th>Present House No</th>
								<th>Present Locality</th>
								<th>Present City</th>
								<th>Present District</th>
								<th>Permanent House No</th>
								<th>Permanent Locality</th>
								<th>Permanent city</th>
								<th>Permanent District</th>
								<th>Cast</th>
								<th>Religion</th>								
							</tr>
							@foreach ($employees as $employee)
                            <tr>
                                <td>{{ $employee->emp_id }}</td>
								<td>{{ $employee->emp_f_name }} {{ $employee->emp_m_name }} {{ $employee->emp_l_name }}</td>
								<?php $designation = DB::table('posts')->where('fld_PostID', $employee->post_id)->first(); ?>
								<td>{{ $designation->fld_PostName }} </td>
								<?php $department = DB::table('departments')->where([['fld_DeptID', $employee->fld_DeptID], ['fld_Status', 1]])->first(); ?>
								<td>{{ $department->fld_Department }}</td>
								<?php $qualification = DB::table('qualifications')->where('qualification_id', $employee->emp_qualification_id)->first();?>
								<td>{{ $qualification->qualification }}</td>
								<td>{{ $employee->emp_dob }}</td>
								<td>{{ $employee->emp_gender}}</td>
                                <td>{{ $employee->emp_date_of_joining }}</td>
								<td>{{ $employee->emp_date_of_retirement }}</td>
								<td>{{ $employee->emp_blood_group }}</td>
								<td>{{ $employee->emp_contact_no }}</td>
								<td>{{ $employee->bank_account_number }}</td>
								<td>{{ $employee->bank_name }}</td>
								<td>{{ $employee->emp_present_house_no }}</td>
								<td>{{ $employee->emp_present_locality }}</td>
								<td>{{ $employee->emp_present_city }}</td>
								<td>{{ $employee->emp_present_district }}</td>
								<td>{{ $employee->emp_permanent_house_no }}</td>
								<td>{{ $employee->emp_permanent_locality }}</td>
								<td>{{ $employee->emp_permanent_city }}</td>
								<td>{{ $employee->emp_permanent_district }}</td>
								<td>{{ $employee->emp_cast }}</td>
								<td>{{ $employee->emp_religion }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
					<form action="emp_list_excel" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="data" value="{{ json_encode($employees) }}">
						<button class="btn btn-info" type="submit">Export Data to Excel <i class="fa fa-file-excel-o" aria-hidden="true"></i></button>
					</form>
				</div>               
            </div>
        </div>
    </div>
@endsection
@section('scripts-extra')
@endsection