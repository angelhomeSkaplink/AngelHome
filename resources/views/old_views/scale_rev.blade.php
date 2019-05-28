@extends('layouts.app')

@section('htmlheader_title')
    Scale Revision
@endsection

@section('contentheader_title')
    Scale Revision
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>						
							<tr>
								<th>Scale Range</th>
								<th>Grade Pay</th>
								<th>Grade</th>
								<th>Status</th>
								<th>Revision</th>
							</tr>
							@foreach ($employees as $employee)
							<tr>
								<td>{{ $employee->payScale_lower_limit }} - {{ $employee->payScale_uper_limit }}</td>	
								<td>{{ $employee->grade_pay }}</td>
								<td>{{ $employee->grade }}</td>
								@if($employee->status==1)
								<td>Active</td>
								@else
								<td>Inactive</td>
								@endif
								@if($employee->status==1)
								<td><a href="revision/{{ $employee->scale_id }}"><span class="label label-primary">Revision</a></span></td>
								@endif
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