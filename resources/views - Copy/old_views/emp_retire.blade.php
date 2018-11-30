@extends('layouts.app')

@section('htmlheader_title')
@endsection

@section('contentheader_title')
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">                
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
							<tr>
								<th>Sl. No</th>
								<th>Code</th>
								<th>Name</th>
								<th>Date of Joining</th>
								<th>Date of Retirement</th>
							</tr>
							<?php $i=1 ?>
							@foreach ($rows as $row)
							<tr>
								<td>{{ $i++ }}</td>
								<td>{{ $row->emp_id }}</td>
								<td>{{ $row->emp_f_name }} {{ $row->emp_m_name }} {{ $row->emp_l_name }}</td>
								<td>{{ $row->emp_date_of_joining }}</td>
								<td>{{ $row->emp_date_of_retirement }}</td>			
							</tr>
							@endforeach
                        </tbody>
                    </table>
					<form action="retire_excel" method="post">
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