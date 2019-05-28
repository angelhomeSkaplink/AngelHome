@extends('layouts.app')

@section('htmlheader_title')
    Employee Policies
@endsection

@section('contentheader_title')
    Employee Policies
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">   
				<div class="box-header with-border">
                    <a href="{{ url('employee_lic') }}" class="btn btn-primary btn-block btn-flat">Add a new Record</a></br>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
							<tr>
								<th>Employee Name</th>
								<th>Policy No</th>
								<th>Amount</th>
							</tr>
							@foreach ($employee_policys as $employee_policy)
							<tr>
								<td>
									<?php
										$employee = DB::table('employees')->where('emp_id', $employee_policy->emp_id)->get();
										foreach($employee as $emp)
										echo $emp->emp_f_name ?>&nbsp;<?php echo $emp->emp_m_name ?>&nbsp;<?php echo $emp->emp_l_name														
									?>
								</td>
								<td>{{ $employee_policy->policy_no }}</td>
								<td>{{ $employee_policy->ammount }}</td>
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