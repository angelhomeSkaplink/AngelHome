@extends('layouts.app')

@section('htmlheader_title')
    Leave Master
@endsection

@section('contentheader_title')
    Leave Master
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <a href="{{ url('leave_type') }}" class="btn btn-primary btn-block btn-flat">Add a new Record</a></br>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
							<tr>
								<th>Leave Type</th>
								<th>No of Days</th>
								<th>Status</th>
								<th>Edit</th>
								<th>Update</th>
								<th>Delete</th>
							</tr>
							@foreach ($leaves as $leave)
							<tr>
								<td>{{ $leave->leave_type }}</td>
								<td>{{ $leave->no_of_days }}</td>	
								@if($leave->status==1)
								<td><a href="leave_active/{{ $leave->leave_type_id }}"><span class="label label-primary">Active</a></span></td>
								@else
								<td><a href="leave_inactive/{{ $leave->leave_type_id }}"><span class="label label-primary">Inactive</a></span></td>
								@endif
								<td><a href="leave_edit/{{ $leave->leave_type_id }}"><span class="label label-primary">Edit</a></span></td>
								<td><a href="leave_type_update/{{ $leave->leave_type_id }}"><span class="label label-primary">Update</a></span></td>
								<td><a href="leave_delete/{{ $leave->leave_type_id }}"><span class="label label-primary" onclick="return confirm('Are you sure you want Delete this record ??');">Delete</a></span></td>
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