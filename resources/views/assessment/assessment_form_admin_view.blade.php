
@extends('layouts.app')

@section('htmlheader_title')
    assessments
@endsection

@section('contentheader_title')
    assessments
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