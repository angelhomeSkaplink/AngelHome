@extends('layouts.app')

@section('htmlheader_title')
    Employee ServicesBook
@endsection

@section('contentheader_title')
    Employee ServicesBook
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>						
							<tr>								
								<th>Name</th>
								<th>Old Department</th>								
								<th>New Department</th>
								<th>Transfer Date</th>								
							</tr>
							@foreach ($employees as $employee)
								<tr>
									<?php $emp = DB::table('employees')->where('emp_id', $employee->emp_id)->first(); ?>									
									<td>{{ $emp->emp_f_name }} {{ $emp->emp_m_name }} {{ $emp->emp_l_name }}</td>									
									<?php $c_dept = DB::table('departments')->where([['fld_DeptID', $employee->current_dept_id], ['fld_Status', 1]])->first(); ?>
									<td>{{ $c_dept->fld_Department }}</td>
									<?php $o_dept = DB::table('departments')->where([['fld_DeptID', $employee->new_dept_id], ['fld_Status', 1]])->first(); ?>
									<td>{{ $o_dept->fld_Department }}</td>
									<td>{{ $employee->submission_date }}</td>
								</tr>
							@endforeach
                        </tbody>
                    </table>
                </div>               
            </div>
        </div>
    </div>
@endsection
@section('scripts-extra')
@endsection