@extends('layouts.app')

@section('htmlheader_title')
    Employees Promotion
@endsection

@section('contentheader_title')
    Employees Promotion
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <a href="{{ url('promotion') }}" class="btn btn-primary btn-block btn-flat">Add a new Record</a></br>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>						
							<tr>
								<th>Employee Code</th>
								<th>Employee Name</th>
								<th>Old Designation</th>
								<th>New Designation</th>
								<th>Fixation Amount</th>
								<th>Promotion Date</th>
								<th>Submission Date</th>
							</tr>
							@foreach ($promotions as $promotion)
                            <tr>                                								
								<td>{{ $promotion->emp_id }}</td>
								<?php $employee = DB::table('employees')->where('emp_id', $promotion->emp_id)->first();	{ ?>
								<td>{{ $employee->emp_f_name }} {{ $employee->emp_m_name }} {{ $employee->emp_l_name }}</td>
								<?php } ?>
								<?php $post = DB::table('posts')->where('fld_PostID', $promotion->current_post_id)->first(); { ?>
								<td>{{ $post->fld_PostName }}</td>
								<?php } ?>
								<?php $post = DB::table('posts')->where('fld_PostID', $promotion->new_post_id)->first(); { ?>
								<td>{{ $post->fld_PostName }}</td>
								<?php } ?>
								<td>{{ $promotion->amount }}</td>
								<td>{{ $promotion->promotion_date }}</td>
								<td>{{ $promotion->submission_date }}</td>                            
                            </tr>
							@endforeach
                        </tbody>
                    </table>
					<form action="promotion_excel" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="data" value="{{ json_encode($promotions) }}">
						<button class="btn btn-info" type="submit">Export Data to Excel <i class="fa fa-file-excel-o" aria-hidden="true"></i></button>
					</form>
                </div>                
            </div>
        </div>
    </div>
@endsection
@section('scripts-extra')
@endsection