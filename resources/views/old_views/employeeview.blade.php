@extends('layouts.app')

@section('htmlheader_title')
    Employees
@endsection

@section('contentheader_title')
    Employees
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <a href="{{ url('employee') }}" class="btn btn-primary btn-block btn-flat">Add a new Record</a></br>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>						
							<tr>
								<th>Code</th>
								<th>Name</th>
								<th>Qualification</th>
								<th>Date of Birth</th>
								<th>Gender</th>
								<th>Details</th>
								<?php if(Auth::user()->role == '1'){ ?>
								<th>Status</th>
								<th>Edit</th>
								<th>Delete</th>
								<?php }?>
							</tr>
							@foreach ($employees as $employee)
                            <tr>
                                <td>{{ $employee->emp_id }}</td>
								<td>{{ $employee->emp_f_name }} {{ $employee->emp_m_name }} {{ $employee->emp_l_name }}</td>
								<td>
									<?php
										$qualification = DB::table('qualifications')->where('qualification_id', $employee->emp_qualification_id)->first();							
										echo $qualification->qualification														
									?>
								</td>
								<td>{{ $employee->emp_dob }}</td>
								<td>{{ $employee->emp_gender}}</td>
                                <td>
                                    <a href="emp_show/{{ $employee->emp_id }}"><span class="label label-primary">View</a></span>
                                </td>
								<?php if(Auth::user()->role == '1'){ ?>
								<?php if($employee->status==1) { ?>
								<td>
                                    <a href="active/{{ $employee->emp_id }}"><span class="label label-primary">Active</a></span>
                                </td>															
								<?php } else { ?>
								<td>
                                    <a href="deactive/{{ $employee->emp_id }}"><span class="label label-primary">Deactive</a></span>
                                </td>
								<?php } ?>
								<td>
                                    <a href="emp_edit/{{ $employee->emp_id }}"><span class="label label-primary">Edit</a></span>
                                </td>
								<td>
                                    <a href="emp_delete/{{ $employee->emp_id }}"><span class="label label-primary" onclick="return confirm('Are you sure you want Delete this record ??');">Delete</a></span>
                                </td>
								<?php }?>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
					<form action="employee_excel" method="post">
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