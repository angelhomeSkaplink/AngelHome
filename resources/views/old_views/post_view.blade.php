@extends('layouts.app')

@section('htmlheader_title')
    Post View
@endsection

@section('contentheader_title')
    Post View
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
				@if(Session::has('msg'))
					<div class="alert alert-danger">
						<strong>{{ Session::get('msg') }}</strong>
					</div>
				@endif
                <div class="box-header with-border">
                    <a href="{{ url('post') }}" class="btn btn-primary btn-block btn-flat">Add a new Record</a></br>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
							<tr>
								<th>Post Name</th>
								<th>Total Post</th>
								<th>Status</th>
								<th>Redesignation</th>
								<th>Update</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
							@foreach ($posts as $post)
							<tr>
								<td>{{ $post->fld_PostName }}</td>							
								<td>{{ $post->fld_TotalPost }}</td>
								<?php if($post->fld_Status == 1) { ?>
								<td><a href="post_active/{{ $post->fld_PostID }}"><span class="label label-primary">Active</a></span></td>
								<?php } else { ?>
								<td><a href="post_inactive/{{ $post->fld_PostID }}"><span class="label label-primary">Inactive</a></span></td>
								<?php } if($post->fld_Status == 1) {?>								
								<td><a href="post_redesignation/{{ $post-> fld_PostID }}"><span class="label label-primary">Redesignation</a></span></td>
								<td><a href="post_update/{{ $post-> fld_PostID }}"><span class="label label-primary">Update</a></span></td>
								<td><a href="post_edit/{{ $post->post_ID }}"><span class="label label-primary">Edit</a></span></td>
								<td><a href="post_delete/{{ $post->post_ID }}"><span class="label label-primary" onclick="return confirm('Are you sure you want Delete this record ??');">Delete</a></span></td>
								<?php } ?>
							</tr>
							@endforeach
                        </tbody>
                    </table>
					<form action="post_excel" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="data" value="{{ json_encode($posts) }}">
						<button class="btn btn-info" type="submit">Export Data to Excel <i class="fa fa-file-excel-o" aria-hidden="true"></i></button>
					</form>
                </div>                
            </div>
        </div>
    </div>
@endsection