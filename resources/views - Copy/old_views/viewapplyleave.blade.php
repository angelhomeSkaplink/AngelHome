@extends('layouts.app')
@section('htmlheader_title')
    Leave
@endsection
@section('contentheader_title')
    Leave
@endsection
@section('main-content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border"></div> 
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>						
							<tr>
								<th>Employee Name</th>
								<th>Leave Type</th>
								<th>Leave From</th>
								<th>Leave to</th>
								<th>No of Days</th>
								<th>View Details</th>
							</tr>
							@foreach ($viewapplyleave as $view_status)
							<tr>
								<td>
									<?php
									$employee = DB::table('employees')->where('emp_id', $view_status->emp_id)->first();
										echo $employee->emp_f_name?>&nbsp;<?php echo $employee->emp_m_name?>&nbsp;<?php echo $employee->emp_l_name
									?>
								</td>
								<td>
									<?php
									$employee = DB::table('leavetypes')->where('leave_type_id', $view_status->leave_type_id)->first();
										echo $employee->leave_type
									?>
								</td>
								<td>{{ $view_status->from_date }}</td>
								<td>{{ $view_status->to_date }}</td>
								<td>{{ $view_status->no_of_day}}</td>
								<td><a href="show/{{ $view_status->leave_transaction_id }}"><span class="label label-primary">View</a></span></td>
								
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