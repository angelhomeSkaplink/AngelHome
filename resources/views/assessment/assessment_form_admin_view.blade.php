
@extends('layouts.app')

@section('htmlheader_title')
    @lang("msg.Assessment View")
@endsection

@section('contentheader_title')
<div class="row">
    <div class="col-lg-4 col-lg-offset-4 text-center">
        <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>@lang("msg.Assessment View")</strong></h3>
    </div>
    <div class="col-lg-4">
        <a href="{{ url('assessment_preview') }}" class="btn btn-success btn-block btn-flat btn-width btn-sm " style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>@lang("msg.Back")</a>
    </div>
</div>
@endsection

@section('main-content')
<style>
  .sv_complete_btn{
      display: none;
    }
</style>
<script>
 var assessment = {!! $assessment !!} 
</script>
   <div class="row">
       <div class="col-md-12">
          <div class="box box-primary border">
                <div class="box-body border padding-top-0 padding-left-right-0">
                    <div class="" style="min-height: 624px;">
						<div id="surveyElement"></div>
						
				<!-- Survey Content end -->
					</div>				
                </div>                
            </div>
        </div>
    </div>
@endsection
@section('scripts-extra')

@endsection