@extends('layouts.app')

@section('htmlheader_title')
    Leave Balance
@endsection

@section('contentheader_title')
    Leave Balance
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">                
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th>Employee Id</th>
                            <th>Leave Type</th>
							<th>Total Leave</th>
							<th>Balance Leave</th>
                        </tr>
                        @foreach ($row as $r)
                            <tr>
								<td>
									<?php
									$employee = DB::table('employees')->where('emp_id', $r->emp_id)->first();
										echo $employee->emp_f_name?>&nbsp;<?php echo $employee->emp_m_name?>&nbsp;<?php echo $employee->emp_l_name
									 ?>
								</td>
								<td>
									<?php
									$leave_type = DB::table('leavetypes')->where('leave_type_id', $r->leave_type_id)->first();
										echo $leave_type->leave_type
									 ?>
								</td>
                                <td>{{ $r->no_of_days }}</td>
								<td>{{ $r->balance }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                {{--<div class="box-footer clearfix">--}}
                    {{--<ul class="pagination pagination-sm no-margin pull-right">--}}
                        {{--<li><a href="#">«</a></li>--}}
                        {{--<li><a href="#">1</a></li>--}}
                        {{--<li><a href="#">2</a></li>--}}
                        {{--<li><a href="#">3</a></li>--}}
                        {{--<li><a href="#">»</a></li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
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