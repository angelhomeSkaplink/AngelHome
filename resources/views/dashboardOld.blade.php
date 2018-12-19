@extends('layouts.app')

@section('htmlheader_title')
    Dashboard
@endsection

@section('contentheader_title')
    Dashboard
@endsection

@section('main-content')
<style>	
	.content-header
	{
		display:none;
	}	
</style>
<div style="padding-top:65px"></div>

<div>
    <div class="box-header with-border text-center">
		<?php $facility_name = DB::table('facility')->where('id', Auth::user()->facility_id)->first(); ?>
        <h3 class="box-title heading"> @lang("msg.Welcome To") {{ $facility_name->facility_name }}</h3>
    </div>
	
    <div class="box-body no-box-shadow text-center; desc-dashbord">
		@lang('msg.Hi') <?php echo Auth::user()->firstname." ".Auth::user()->lastname ?> ! @lang('msg.This Is Your Dashboard'). Lorem ipsum dolor sit amet, consectetur adipiscing elit.
    </div>
	@if(Auth::user()->role == '1')
	<!-- Survey Content start -->
		<!--<div class="sv_main sv_frame sv_default_css">
		
		<input type="hidden" class="form-control" id="assessment_id" value="{{ $uniq_code }}" />
		<input type="hidden" id="csrf" name="_token" value="{{ csrf_token() }}">
		<div class="sv_custom_header"></div>
			<div class="sv_container">
				<div class="sv_header">
					<h5>Create Assessment</h5>
					<div>
						<a href="{{ url('assessment_edit_preview') }}" >Preview</a>
					</div>
				</div> 
				<div class="sv_body">
					
					<div id="editor"></div>
				</div>
			</div>
		</div>-->
	<!-- Survey Content end -->
	@endif
		
</div>

@endsection
