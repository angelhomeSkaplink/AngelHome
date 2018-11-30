
@extends('layouts.app')

@section('htmlheader_title')
    assessments
@endsection

@section('contentheader_title')
    assessments
@endsection

@section('main-content')
<br/>
    <div class="row">
        <div class="col-md-12">
            <div class="sv_main sv_frame sv_default_css">
		
				<input type="hidden" class="form-control" id="assessment_id" value="{{ $row->assessment_id }}" />
				<input type="hidden" id="csrf" name="_token" value="{{ csrf_token() }}">
				<div class="sv_custom_header"></div>
				<div class="sv_container">
					<div class="sv_header">
						<h5>Create Assessment</h5>
					</div> 
					<div class="sv_body">
						<div id="editor"></div>
					</div>
				</div>
			</div>
        </div>
    </div>
	
@endsection
@section('scripts-extra')
<script>
	var _assessment = {!! $row->assessment_json !!};
	var assessmentId = "{!! $row->assessment_id !!}";
	//editor.loadSurvey(assessmentId);
	editor.text = JSON.stringify(_assessment);
	
</script>
@endsection