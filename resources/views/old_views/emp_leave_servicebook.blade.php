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
								<th>Leave Type</th>
								<th>From Date</th>
								<th>To Date</th>
								<th>No of days Tacken</th>								
							</tr>
							@foreach ($employees as $employee)
								<tr>
									<?php $emp = DB::table('leavetypes')->where('leave_type_id', $employee->leave_type_id)->first(); ?>									
									<td>{{ $emp->leave_type }}</td>
									<td>{{ $employee->from_date }}</td>
									<td>{{ $employee->to_date }}</td>
									<td>{{ $employee->no_of_day }}</td>
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