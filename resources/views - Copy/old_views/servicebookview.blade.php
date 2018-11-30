@extends('layouts.app')

@section('htmlheader_title')
    Pay Fixation
@endsection

@section('contentheader_title')
    Pay Fixation
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <a href="{{ url('servicebook') }}" class="btn btn-primary btn-block btn-flat">Add a new Record</a></br>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th style="width: 10px">Name</th>
							<th style="width: 10px">Post</th>
							<th style="width: 10px">Department</th>                            
                            <th width="1">View Details</th>
                        </tr>
                        @foreach ($employees as $employee)
                            <tr>
								<td>{{ $employee->emp_f_name}} {{ $employee->emp_m_name}} {{ $employee->emp_l_name}}</td>
								<td>
									<?php
										$post = DB::table('posts')->where('fld_PostID', $employee->post_id)->first();							
										echo $post->fld_PostName											
									?>
								</td>
								<td>
									<?php
										$department = DB::table('departments')->where('fld_DeptID', $employee->fld_DeptID)->first();							
										echo $department->fld_Department											
									?>
								</td>
                                <td>
                                    <a href="servicedetails/{{ $employee-> emp_id }}" class="btn btn-xs btn-simple text-green">View</a>
                                </td>
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