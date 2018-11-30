@extends('layouts.app')

@section('htmlheader_title')
    Employees Transfer
@endsection

@section('contentheader_title')
    Employees Transfer
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <a href="{{ url('transfer') }}" class="btn btn-primary btn-block btn-flat">Add a new Record</a></br>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>						
							<tr>
								<th>Employee Name</th>
								<th>Old Department</th>
								<th>New Department</th>
								<th>Date</th>
							</tr>
							@foreach ($promotions as $promotion)
                            <tr>                                								
								<?php
									$employee = DB::table('employees')->where('emp_id', $promotion->emp_id)->first();						
								{	?>
								<td>{{ $employee->emp_f_name }} {{ $employee->emp_m_name }} {{ $employee->emp_l_name }}</td>
								<?php } ?>
								<?php
									$post = DB::table('departments')->where('fld_DeptID', $promotion->current_dept_id)->first();						
								{	?>
								<td>{{ $post->fld_Department }}</td>
								<?php } ?>
								<?php
									$post = DB::table('departments')->where('fld_DeptID', $promotion->new_dept_id)->first();						
								{	?>
								<td>{{ $post->fld_Department }}</td>
								<?php } ?>
								<td>{{ $promotion->submission_date }}</td>                            
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