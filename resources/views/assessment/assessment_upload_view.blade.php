
@extends('layouts.app')

@section('htmlheader_title')
    @lang("msg.Assessments")
@endsection

@section('contentheader_title')
    <p class="text-danger"><b>@lang("msg.Upload Assessments")</b></p>
@endsection

@section('main-content')
<style>
	.content-header{
		padding: 0px 0px 0px 20px;
		margin-bottom: 12px;
	}
	.content{
		margin-top: 15px;
	}
</style>
<div class="row">
	<form action="{{action('ProspectiveController@file_upload')}}" method="post" enctype="multipart/form-data">
		<input type="hidden" name="_method" value="PATCH">
		{{ csrf_field() }}
		<div class="col-md-6 col-md-offset-3">
			<div class="box box-primary">				
				<div class="box-body padding-bottom-15">						
						<input type="hidden" class="form-control" name="pros_id" value="{{ $id }}" />
						<div class="form-group has-feedback">
							@lang("msg.Upload Here")
							<input type="file" class="form-control" name="audio" />
						</div>
						<div class="form-group has-feedback">
            			<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">@lang("msg.Submit")</button>
            		</div>

					<div class="form-group has-feedback">
                        <a href="{{  url('assessment') }}" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right:15px">@lang("msg.Cancel")</a>
            		</div>	
				</div>
			</div>
		</div>
	</form>
</div>
@endsection
@section('scripts-extra')

@endsection