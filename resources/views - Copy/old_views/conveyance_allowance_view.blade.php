@extends('layouts.app')

@section('htmlheader_title')
    Conveyance Allowance
@endsection

@section('contentheader_title')
    Conveyance Allowance
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <a href="{{ url('conveyance_allowance_parameter') }}" class="btn btn-primary btn-block btn-flat">Add a new Record</a></br>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
							<tr>
								<th>Post</th>
								<th>Amount</th>
								<th>Active/Inactive</th>
								<th>Edit</th>
								<th>Update</th>
								<th>Delete</th>
							</tr>
							@foreach ($leaves as $leave)
							<tr>
								<?php $post = DB::table('posts')->where('fld_PostID', $leave->post_id)->first(); { ?>
								<td>{{ $post->fld_PostName }}</td>
								<?php } ?>
								<td>{{ $leave->amount }}</td>
								@if($leave->status==1)
								<td><a href="conveyance_active/{{ $leave->conveyance_allowance_parameter_id }}"><span class="label label-primary">Active</a></span></td>
								@else
								<td><a href="conveyance_inactive/{{ $leave->conveyance_allowance_parameter_id }}"><span class="label label-primary">Inactive</a></span></td>
								@endif
								<td><a href="conveyance_edit/{{ $leave->conveyance_allowance_parameter_id }}"><span class="label label-primary">Edit</a></span></td>
								<td><a href="conveyance_update/{{ $leave->conveyance_allowance_parameter_id }}"><span class="label label-primary">Update</a></span></td>
								<td><a href="conveyance_delete/{{ $leave->conveyance_allowance_parameter_id }}"><span class="label label-primary" onclick="return confirm('Are you sure you want Delete this record ??');">Delete</a></span></td>
							</tr>
							@endforeach
                        </tbody>
                    </table>
					<form action="conv_excel" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="data" value="{{ json_encode($leaves) }}">
						<button class="btn btn-info" type="submit">Export Data to Excel <i class="fa fa-file-excel-o" aria-hidden="true"></i></button>
					</form>
                </div>                
            </div>
        </div>
    </div>
@endsection
@section('scripts-extra')

@endsection