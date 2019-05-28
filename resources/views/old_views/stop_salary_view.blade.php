@extends('layouts.app')

@section('htmlheader_title')
    
@endsection

@section('contentheader_title')
   
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <a href="{{ url('stop_salary') }}" class="btn btn-primary btn-block btn-flat">Add a new Record</a></br>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>						
							<tr>
								<th>Employee Code</th>
								<th>Name</th>
								<th>Salary Stop Date</th>
								<th>Active Salary</th>
							</tr>
							@foreach ($employees as $employee)
                            <tr>
								<td>{{ $employee->emp_id }}</td>
								<?php
									$empl = DB::table('employees')->where('emp_id', $employee->emp_id)->first();		
								?>
								<td>{{ $empl->emp_f_name }} {{ $empl->emp_m_name }} {{ $empl->emp_l_name }}</td>
								<td>{{ $employee->s_s_date }}</td>
								<td>
                                    <a href="active_salary/{{ $employee->emp_id }}"><span class="label label-primary">Active Salary</a></span>
                                </td>
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