@extends('layouts.app')

@section('htmlheader_title')
    Department View
@endsection

@section('contentheader_title')
    Department View
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <a href="{{ url('department') }}" class="btn btn-primary btn-block btn-flat">Add a new Record</a></br>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
							<tr>
								<th>Department Name</th>
								<th>Status</th>
								<th>Update</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
							@foreach ($departments as $department)
							<tr>
								<td>{{ $department->fld_Department }}</td>
								<?php if($department->fld_Status == 1) { ?>
								<td><a href="department_active/{{ $department-> fld_DeptID }}"><span class="label label-primary">Active</a></span></td>
								<?php } else { ?>
								<td><a href="department_inactive/{{ $department-> fld_DeptID }}"><span class="label label-primary">Inactive</a></span></td>
								<?php } ?>
								<td><a href="dept_update/{{ $department-> fld_DeptID }}"><span class="label label-primary">Update</a></span></td>
								<td><a href="department_edit/{{ $department-> fld_DeptID }}"><span class="label label-primary">Edit</a></span></td>
								<td><a href="department_delete/{{ $department->fld_DeptID }}"><span class="label label-primary" onclick="return confirm('Are you sure you want Delete this record ??');">Delete</a></span></td>
							</tr>
							@endforeach
                        </tbody>
                    </table>
					<form action="dept_excel" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="data" value="{{ json_encode($departments) }}">
						<button class="btn btn-info" type="submit">Export Data to Excel <i class="fa fa-file-excel-o" aria-hidden="true"></i></button>
					</form>
                </div>                
            </div>
        </div>
    </div>
@endsection
@section('scripts-extra')

@endsection