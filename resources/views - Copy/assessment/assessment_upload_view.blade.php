
@extends('layouts.app')

@section('htmlheader_title')
    assessments
@endsection

@section('contentheader_title')
    assessments
@endsection

@section('main-content')

    <div class="row">
		<div class="box box-primary border">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="sv_main sv_frame sv_default_css">
					<form action="{{action('AssessmentController@file_upload')}}" method="post" enctype="multipart/form-data">
						<input type="hidden" name="_method" value="PATCH">
						{{ csrf_field() }}
						<input type="text" class="form-control" name="pros_id" value="{{ $id }}" />
						<div class="form-group has-feedback">
							Upload Here
							<input type="file" class="form-control" name="audio" />
						</div>
						<input type="text" class="form-control" name="user_id" value="{{ Auth::user()->user_id }}" />
						<input type="text" class="form-control" name="facility_id" value="1" />
						<input type="text" class="form-control" name="upload_date" value="<?php echo date('Y/m/d'); ?>" />
						<div class="col-xs-4">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('scripts-extra')

@endsection