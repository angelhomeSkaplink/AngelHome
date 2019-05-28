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
								<th>Deputation Date</th>					
							</tr>
							@foreach ($employees as $employee)
								<tr>
									<?php $emp = DB::table('employees')->where('emp_id', $employee->emp_id)->first(); ?>									
									<td>{{ $emp->emp_f_name }} {{ $emp->emp_m_name }} {{ $emp->emp_l_name }}</td>									
									<td>{{ $employee->date }}</td>
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