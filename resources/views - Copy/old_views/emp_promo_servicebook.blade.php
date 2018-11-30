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
								<th>Name</th>
								<th>Old Designation</th>								
								<th>New Designation</th>
								<th>Promotion Type</th>
								<th>Promotion Date</th>							
							</tr>
							@foreach ($employees as $employee)
								<tr>
									<?php $emp = DB::table('employees')->where('emp_id', $employee->emp_id)->first(); ?>									
									<td>{{ $emp->emp_f_name }} {{ $emp->emp_m_name }} {{ $emp->emp_l_name }}</td>
									<?php $c_post = DB::table('posts')->where('fld_PostID', $employee->current_post_id)->first(); ?>
									<td>{{ $c_post->fld_PostName }}</td>
									<?php $n_post = DB::table('posts')->where('fld_PostID', $employee->new_post_id)->first(); ?>
									<td>{{ $n_post->fld_PostName }}</td>
									@if($employee->current_post_id != $employee->new_post_id)
									<td>Normal Promotion</td>
									@else
									<td>Time Scale Promotion</td>
									@endif
									<td>{{ $employee->promotion_date }}</td>
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