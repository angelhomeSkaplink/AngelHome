@extends('layouts.app')

@section('htmlheader_title')
    Department View
@endsection

@section('contentheader_title')
    Parameter View
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <a href="{{ url('parameter_value') }}" class="btn btn-primary btn-block btn-flat">Update</a></br>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
							<tr>
								<th>Parameter </th>
								<th>Value</th>
								<th>Effective From</th>
								<th>Status</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
							@foreach ($parameters as $parameter)
							<tr>
								<td>
									<?php
										$employee = DB::table('parameters')->where('parameter_id', $parameter->parameter_id)->get();
										foreach($employee as $emp)
										echo $emp->parameter_type;														
									?>
								</td>
								<td>{{ $parameter->value }}</td>
								<td>{{ $parameter->effective_from }}</td>
								@if($parameter->status==1)
								<td><a href="parameter_active/{{ $parameter->id }}"><span class="label label-primary">Active</a></span></td>
								@else
								<td><a href="parameter_inactive/{{ $parameter->id }}"><span class="label label-primary">Inactive</a></span></td>
								@endif
								<td><a href="parameter_edit/{{ $parameter->id }}"><span class="label label-primary">Edit</a></span></td>
								<td><a href="parameter_delete/{{ $parameter->id }}"><span class="label label-primary" onclick="return confirm('Are you sure you want Delete this record ??');">Delete</a></span></td>
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