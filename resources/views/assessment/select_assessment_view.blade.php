
@extends('layouts.app')

@section('htmlheader_title')
    SELECT ASSESSMENT
@endsection

@section('contentheader_title')
    <p class="text-danger"><b>assessments</b>	
		<a href="../care_plan/{{ $id }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:105px !important; margin-right: 15px;"> @lang("msg.Care Plan")</a>
		<a href="../next_assessment_date/{{ $id }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:150px !important; margin-top: -2px; margin-right: 15px;"> @lang("msg.Next Assessment")</a>
	</p>
@endsection

@section('main-content')
<style>
	.wickedpicker{
		z-index:999 !important;
	}
	.content-header
	{
		padding: 2px 0px 1px 20px;
		margin-bottom: -10px;
	}
	.content {
		margin-top: 15px;
	}
</style>

@if(!empty(Session::get('error_code')) && Session::get('error_code') == 5)
    <script type="text/javascript">
        $(document).ready(function() {
			console.log('HI');
			//alert('You must done the assessment first.');
            $('#popupmodal').modal();
        });
    </script>
    <div id="popupmodal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>Notification: Please read</h3>
        </div>
        <div class="modal-body">
            <p>
                {{ Session::get('error_code') }}
            </p>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">@lang("msg.Close")</button>
        </div>
    </div>
@endif
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">
			<div class="box-header with-border col-sm-2 pull-right"></div>
            <div class="box-body border padding-top-0 padding-left-right-0">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
    						<tr>
    							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Assessments")</th>
    							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Add Assessment")</th>
    							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Status")</th>
    						</tr>
    						@foreach ($assessments as $assessment)
    						<tr>
    							<td>{{ $assessment->assessment_form_name }}</td>
    							<!--<td><a href="../assessment_choose/{{ $assessment->assessment_id }}/{{ $id }}"><i class="material-icons material-icons gray md-22"> edit </i></a></td>-->
    							<td>
    								<a href="../assessment_choose/{{ $assessment->assessment_id }}/{{ $id }}"><i class="material-icons material-icons gray md-22"> add_circle_outline </i></a>
    							</td>								
    							<?php
    								$status = DB::table('resident_assessment')->where([['assessment_id', $assessment->assessment_id], ['pros_id', $id], ['assessment_status', 1]])->first();
    								if($status){
    							?>
    							<td class="text-success"><b>@lang("msg.Done")</b></td>
    							<?php }else{ ?>
    							<td class="text-danger"><b>@lang("msg.Not Done")</b></td>
    							<?php } ?>
    						</tr>
    						@endforeach
                        </tbody>
                    </table>
                </div>
            </div>                
        </div>
    </div>
</div>
@endsection
@section('scripts-extra')

@endsection