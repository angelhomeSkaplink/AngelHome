@extends('layouts.app')

@section('htmlheader_title')
    Leave Status
@endsection

@section('contentheader_title')
    Leave Status
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
								<th>Name</th>
								<th>Leave Type</th>
								<th>From</th>
								<th>To</th>
								<th>No of Days</th>
								<th>Section Head forward Date</th>
								<th>Leave Status</th>
							</tr>
							@foreach ($view_leave_status as $view_status)
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
								<td>{{ $view_status->sh_forwarded_on}}</td>
								<?php if($view_status->status == 1) { ?>
								<td><span class="label label-primary">Applied. On to Section Head</span></td>
								<?php } elseif ($view_status->status == 2) { ?>
								<td><span class="label label-primary">Processing on Secretary</span></td>
								<?php } elseif ($view_status->status == 3) { ?>
								<td><span class="label label-primary">Processing on Secretary</span></td>
								<?php } elseif ($view_status->status == 4) { ?>
								<td><span class="label label-primary">Leave Approved</span></td>
								<?php } elseif ($view_status->status == 5) { ?>
								<td><span class="label label-primary">Leave Rjected</span></td>
								<?php } ?>	
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