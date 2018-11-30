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
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th>Employee Name</th>
                            <th>From Date</th>
							<th>To Date</th>
							<th>Reason</th>
							<th>Status</th>
                        </tr>
                        @foreach ($rows as $row)
                            <tr>                                
								<?php $r = DB::table('employees')->where('emp_id', $row->emp_id)->first();{ ?>
									<td>{{ $r->emp_f_name }} {{ $r->emp_m_name }} {{ $r->emp_l_name }}</td>
								<?php } ?>
								<td>{{ $row->from_date }}</td>
								<td>{{ $row->to_date }}</td>
                                <td>{{ $row->reason }}</td>								
								<?php if($row->status == 4) { ?>
								<td>Leave Approved</td>
								<?php } elseif($row->status == 5) {?>
								<td>Leave Rejected</td>
								<?php } else { ?>
								<td>Processing</td>
								<?php } ?>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>                
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection