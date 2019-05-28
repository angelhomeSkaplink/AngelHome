@extends('layouts.app')

@section('htmlheader_title')
     @lang("msg.Assessments")
@endsection

@section('contentheader_title')
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>@lang("msg.Daily Task")</strong></h3>
	</div>
</div>
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
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">
            <div class="box-body border padding-top-0 padding-left-right-0">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
    						<tr>
    							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Task")</th>
    							<th class="th-position text-uppercase font-500 font-12">@lang("msg.View")</th>
    						</tr>
    						<tr>
    							<td>@lang("msg.Eating")</td>
    							<td><a href="task_assignee/EATING"><i class="material-icons material-icons gray md-22"> details </i></a></td>
    						</tr>
    						<tr>
    							<td>@lang("msg.Continence")</td>
    							<td><a href="task_assignee/CONTINENCE"><i class="material-icons material-icons gray md-22"> details </i></a></td>
    						</tr>
    						<tr>
    							<td>@lang("msg.Transfer")</td>
    							<td><a href="task_assignee/TRANSFER"><i class="material-icons material-icons gray md-22"> details </i></a></td>
    						</tr>
    						<tr>
    							<td>@lang("msg.Ambulance")</td>
    							<td><a href="task_assignee/AMBULATION"><i class="material-icons material-icons gray md-22"> details </i></a></td>
    						</tr>
    						<tr>
    							<td>@lang("msg.Dressing")</td>
    							<td><a href="task_assignee/DRESSING"><i class="material-icons material-icons gray md-22"> details </i></a></td>
    						</tr>
    						<tr>
    							<td>@lang("msg.Bathing")</td>
    							<td><a href="task_assignee/BATHING"><i class="material-icons material-icons gray md-22"> details </i></a></td>
    						</tr>
    						<tr>
    							<td>@lang("msg.Med.-Management")</td>
    							<td><a href="task_assignee/MED.-MANAGEMENT"><i class="material-icons material-icons gray md-22"> details </i></a></td>
    						</tr>
    						<tr>
    							<td>@lang("msg.Communication")</td>
    							<td><a href="task_assignee/COMMUNICATION"><i class="material-icons material-icons gray md-22"> details </i></a></td>
    						</tr>
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