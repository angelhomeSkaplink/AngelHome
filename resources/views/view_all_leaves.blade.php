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
								<th>View Leave Balance</th>
							</tr>
							@foreach($leavetransactions as $leavetransaction)
							<tr>								
								<td>
									<?php
										$employee = DB::table('employees')->where('emp_id', $leavetransaction->emp_id)->first();
											echo $employee->emp_f_name?>&nbsp;<?php echo $employee->emp_m_name?>&nbsp;<?php echo $employee->emp_l_name
									?>
								</td>
								<td>
									<?php
										$leavetype = DB::table('leavetypes')->where('leave_type_id', $leavetransaction->leave_type_id)->first();
											echo $leavetype->leave_type
									?>
								</td>
								<td>{{ $leavetransaction->from_date }}</td>
								<td>{{ $leavetransaction->to_date }}</td>
								<td>{{ $leavetransaction->no_of_day }}</td>
								<td><a href="show_leave/{{ $leavetransaction->leave_transaction_id }}"><span class="label label-primary">View</a></span></td>
								<td><a href="show_balance_leave/{{ $leavetransaction->emp_id }}/{{ $leavetransaction->leave_type_id }}"><span class="label label-primary">View</a></span></td>
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
{{--<script>--}}
    {{--$('.btn-danger').on('click', function() {--}}
        {{--swal(--}}
                {{--'Good job!',--}}
                {{--'You clicked the button!',--}}
                {{--'success'--}}
        {{--)--}}
    {{--});--}}
{{--</script>--}}
@endsection