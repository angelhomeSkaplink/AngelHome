@extends('layouts.app')

@section('htmlheader_title')
    Admin Panel
@endsection

@section('contentheader_title')
    Qualifications
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <a href="{{ url('qualification') }}" class="btn btn-primary btn-block btn-flat">Add a new Record</a></br>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th>Qualification</th>
							<th>status</th>
							<th>Edit</th>
							<th>Delete</th>
                            <th width="1"></th>
                        </tr>
                        @foreach ($qualifications as $qualification)
                            <tr>
                                <td>{{ $qualification->qualification }}</td>
								@if($qualification->status==1)
								<td><a href="qualification_active/{{ $qualification->qualification_id }}"><span class="label label-primary">Active</a></span></td>
								@else
								<td><a href="qualification_inactive/{{ $qualification->qualification_id }}"><span class="label label-primary">Inactive</a></span></td>
								@endif
								<td><a href="edit/{{ $qualification->qualification_id }}"><span class="label label-primary">Edit</a></span></td>
								<td><a href="delete/{{ $qualification->qualification_id }}"><span class="label label-primary" onclick="return confirm('Are you sure you want Delete this record ??');">Delete</a></span></td>
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