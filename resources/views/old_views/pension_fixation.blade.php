@extends('layouts.app')

@section('htmlheader_title')
    Reteired Employees
@endsection

@section('contentheader_title')
    Reteired Employees
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body">
					<p class="login-box-msg"></p>
                    <table class="table table-bordered">
                        <tbody>						
							<tr>
								<th>Code</th>
								<th>Name</th>
								<th>Bank Name</th>
								<th>Account No</th>
								<th>IFSC Code</th>
								<th>Fixation</th>
							</tr>
							@foreach ($employees as $employee)
                            <tr>
                                <td>{{ $employee->emp_id }}</td>
								<td>{{ $employee->emp_f_name }} {{ $employee->emp_m_name }} {{ $employee->emp_l_name }}</td>
								<?php $user = DB::table('employee_pension_details')->where('emp_id', $employee->emp_id)->first(); ?>								
								<td>{{ $user->bank_details }}</td>
								<td>{{ $user->account_no }}</td>
								<td>{{ $user->ifsc_code }}</td>
                                <td><a href="fixation/{{ $employee->emp_id }}"><span class="label label-primary">Fixation</a></span></td>							
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