@extends('layouts.app')

@section('htmlheader_title')
    Attendance Master
@endsection

@section('contentheader_title')
    Attendance
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <a href={{ url('showattendanceform') }} class="btn btn-primary btn-block btn-flat">Add a new Record</a></br>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
							<tr>
								<th>Employee Name</th>
								<th>In Time</th>
								<th>Out Time</th>
								<th>Date</th>
								<th>Month</th>
								<th>Year</th>
								<th>Check Leave</th>
							</tr>
							@if(count($attendances)>0)
							@foreach ($attendances as $attendance)
                            <tr>                                
								<?php $row = DB::table('employees')->where('emp_id', $attendance->emp_id)->first();{ ?>
									<td>{{ $row->emp_f_name }} {{ $row->emp_m_name }} {{ $row->emp_l_name }}</td>
								<?php } ?>
								<td>{{ $attendance->in_time }}</td>
								<td>{{ $attendance->out_time }}</td>
                                <td>{{ $attendance->date }}</td>
								<td>{{ $attendance->month }}</td>
                                <td>{{ $attendance->year }}</td>
								<?php if($attendance->in_time && $attendance->out_time != '') { ?>
								<td></td>
								<?php } else {?>
								<td><a href="check_leave/{{ $attendance->emp_id }}">Check Leave</a></td>
								<?php } ?>
                            </tr>
							@endforeach
							@else
								<div class="alert alert-danger">
									<strong>No Data Found</strong>
								</div>
							@endif
                        </tbody>
                    </table>
                </div>
                <?php 
					//For display Pagination with Next/Privious Button
					//echo $attendances->render(); 
				?>
            </div>
            <!-- /.box -->
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