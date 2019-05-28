@extends('layouts.app')

@section('htmlheader_title')
    Charge Allowance
@endsection

@section('contentheader_title')
    Charge Allowance
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
			<div class="box-header with-border">
                    <a href="{{ url('charge_allowance') }}" class="btn btn-primary btn-block btn-flat">Add a new Record</a></br>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>						
							<tr>
								<th>Employee Code</th>
								<th>Name</th>
								<th>Amount</th>
								<th>Status</th>
								<th>Update</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
							@foreach ($employees as $employee)
								<tr>
									<td>{{ $employee->emp_id }}</td>
									<?php
										$emp = DB::table('employees')->where('emp_id', $employee->emp_id)->first();													
									?>
									<td>{{ $emp->emp_f_name }} {{ $emp->emp_m_name }} {{ $emp->emp_l_name }}</td>
									<td>{{ $employee->amount }}</td>
									@if($employee->status==1)
									<td>Active</td>
									@else
									<td>Inctive</td>
									@endif
									<td><a href="charge_update/{{ $employee->charge_allo_id }}"><span class="label label-primary">Update</a></span></td>
									<td><a href="charge_edit/{{ $employee->charge_allo_id }}"><span class="label label-primary">Edit</a></span></td>
									<td><a href="charge_delete/{{ $employee->charge_allo_id }}"><span class="label label-primary" onclick="return confirm('Are you sure you want Delete this record ??');">Delete</a></span></td>
								</tr>	
							@endforeach
                        </tbody>
                    </table>
					<form action="charg_excel" method="post">
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