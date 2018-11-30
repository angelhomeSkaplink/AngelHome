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
								<th>Code</th>
								<th>Name</th>
								<th>Details</th>
								<th>View Services Book</th>
							</tr>
							@foreach ($employees as $employee)
								<tr>
									<td>{{ $employee->emp_id }}</td>
									<?php $emp = DB::table('employees')->where('emp_id', $employee->emp_id)->first(); ?>
									<td>{{ $emp->emp_f_name }} {{ $emp->emp_m_name }} {{ $emp->emp_l_name }}</td>
									<td><a href="emp_show/{{ $employee->emp_id }}"><span class="label label-primary">Detail</a></span></td>
									<td><a href="emp_service_record/{{ $employee->emp_id }}"><span class="label label-primary">View Service Book</a></span></td>
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