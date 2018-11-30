@extends('layouts.app')

@section('htmlheader_title')
    Scale View
@endsection

@section('contentheader_title')
    Scale View
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
			<div class="box-header with-border">
                    <a href="{{ url('new_scale') }}" class="btn btn-primary btn-block btn-flat">Add a new Record</a></br>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>						
							<tr>
								<th>Scale Range</th>
								<th>Grade Pay</th>
								<th>Grade</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
							@foreach ($employees as $employee)
								<tr>
									<td>{{ $employee->payScale_lower_limit }} - {{ $employee->payScale_uper_limit }}</td>	
									<td>{{ $employee->grade_pay }}</td>
									<td>{{ $employee->grade }}</td>
									<td><a href="scale_edit/{{ $employee->scale_id }}"><span class="label label-primary">Edit</a></span></td>
									<td><a href="scale_delete/{{ $employee->scale_id }}"><span class="label label-primary" onclick="return confirm('Are you sure you want Delete this record ??');">Delete</a></span></td>
								</tr>	
							@endforeach
                        </tbody>
                    </table>
					<form action="scale_excel" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="data" value="{{ json_encode($employees) }}">
						<button class="btn btn-info" type="submit">Export Data to Excel <i class="fa fa-file-excel-o" aria-hidden="true"></i></button>
					</form>
                </div>               
            </div>
        </div>
    </div>
@endsection
@section('scripts-extra')
@endsection