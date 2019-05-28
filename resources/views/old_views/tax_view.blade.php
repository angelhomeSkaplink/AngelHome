@extends('layouts.app')

@section('htmlheader_title')
    Income Tax
@endsection

@section('contentheader_title')
    Income Tax
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <a href="{{ url('employee_income_tax') }}" class="btn btn-primary btn-block btn-flat">Add a new Record</a></br>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
							<tr>
								<th>Employee Code</th>
								<th>Employee Name</th>
								<th>Amount</th>
								<th>Status</th>
								<th>Update</th>
							</tr>
							@foreach ($taxs as $tax)
							<tr>
								<td>{{ $tax->emp_id }}</td>
								<?php $employee = DB::table('employees')->where('emp_id', $tax->emp_id)->first(); ?>
								<td>{{ $employee->emp_f_name }} {{ $employee->emp_m_name }} {{ $employee->emp_l_name }}</td>
								<td>{{ $tax->tax_amount }}</td>	
								@if($tax->status==1)
								<td>Active</td>
								@else
								<td>Inactive</td>
								@endif
								<td><a href="tax_update/{{ $tax->emp_id }}"><span class="label label-primary">Update</a></span></td>
							</tr>
							@endforeach							
                        </tbody>							
                    </table>
					<form action="tax_excel" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="data" value="{{ json_encode($taxs) }}">
						<button class="btn btn-info" type="submit">Export Data to Excel <i class="fa fa-file-excel-o" aria-hidden="true"></i></button>
					</form>
                </div>                
            </div>
        </div>
    </div>
@endsection
@section('scripts-extra')

@endsection