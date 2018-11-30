@extends('layouts.app')

@section('htmlheader_title')
    Suspension 
@endsection

@section('contentheader_title')
    Suspension
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <a href="{{ url('suspension') }}" class="btn btn-primary btn-block btn-flat">Add a new Record</a></br>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>						
							<tr>
								<th>Employee Code</th>
								<th>Name</th>
								<th>Suspension Date</th>
								<th>Rejoin Date</th>
								<th>Rejoin</th>
							</tr>
							@foreach ($employees as $employee)
                            <tr>
								<td>{{ $employee->emp_id }}</td>								
								<?php
									$empl = DB::table('employees')->where('emp_id', $employee->emp_id)->first();		
								?>
								<td>
								{{ $empl->emp_f_name }} {{ $empl->emp_m_name }} {{ $empl->emp_l_name }}
								</td>
                                <td>{{ $employee->sus_date }}</td>
								<td>{{ $employee->rejoin_date }}</td>
								<td>
                                    <a href="rejoin/{{ $employee->sus_id }}"><span class="label label-primary">Rejoin</a></span>
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