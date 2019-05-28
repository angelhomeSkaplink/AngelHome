@extends('layouts.app')

@section('htmlheader_title')
    Employee GPF
@endsection

@section('contentheader_title')
    Employee GPF
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary"> 
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
							<tr>
								<th>Employee Code</th>
								<th>Employee Name</th>
								<th>GPF Amount</th>
								<th>Update</th>
							</tr>
							@foreach ($rows as $row)
							<tr>
								<td>{{ $row->emp_id }}</td>
								<?php $employee = DB::table('employees')->where('emp_id', $row->emp_id)->first(); ?>								
								<td>{{ $employee->emp_f_name }} {{ $employee->emp_m_name }} {{ $employee->emp_l_name }}</td>
								<td>{{ $row->gpf_persentage }}</td>
								<td><a href="gpf_update/{{ $row->service_id }}"><span class="label label-primary">Update</a></span></td>
							</tr>
							@endforeach
                        </tbody>
                    </table>
					<form action="gpf_excel" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="data" value="{{ json_encode($rows) }}">
						<button class="btn btn-info" type="submit">Export Data to Excel <i class="fa fa-file-excel-o" aria-hidden="true"></i></button>
					</form>
                </div>                
            </div>
        </div>
    </div>
@endsection
@section('scripts-extra')

@endsection