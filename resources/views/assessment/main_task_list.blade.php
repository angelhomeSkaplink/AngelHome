@extends('layouts.app')

@section('htmlheader_title')
     @lang("msg.Assessments")
@endsection

@section('contentheader_title')
    <p class="text-danger"><b>@lang("msg.task list")</b></p>
@endsection

@section('main-content')
<style>
	.wickedpicker{
		z-index:999 !important;
	}
	.content-header
	{
		//display:none;
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
                <table class="table">
                    <tbody>
						<tr>
							<th class="th-position text-uppercase font-500 font-12">@lang("msg.task")</th>
							<th class="th-position text-uppercase font-500 font-12">@lang("msg.View")</th>
						</tr>
						<tr>
							<td>EATING</td>
							<td><a href="task_assignee/EATING"><i class="material-icons material-icons gray md-22"> details </i></a></td>
						</tr>
						<tr>
							<td>CONTINENCE</td>
							<td><a href="task_assignee/CONTINENCE"><i class="material-icons material-icons gray md-22"> details </i></a></td>
						</tr>
						<tr>
							<td>TRANSFER</td>
							<td><a href="task_assignee/TRANSFER"><i class="material-icons material-icons gray md-22"> details </i></a></td>
						</tr>
						<tr>
							<td>AMBULATION</td>
							<td><a href="task_assignee/AMBULATION"><i class="material-icons material-icons gray md-22"> details </i></a></td>
						</tr>
						<tr>
							<td>DRESSING</td>
							<td><a href="task_assignee/DRESSING"><i class="material-icons material-icons gray md-22"> details </i></a></td>
						</tr>
						<tr>
							<td>BATHING</td>
							<td><a href="task_assignee/BATHING"><i class="material-icons material-icons gray md-22"> details </i></a></td>
						</tr>
						<tr>
							<td>MED-MANAGEMENT</td>
							<td><a href="task_assignee/MED.-MANAGEMENT"><i class="material-icons material-icons gray md-22"> details </i></a></td>
						</tr>
						<tr>
							<td>COMMUNICATION</td>
							<td><a href="task_assignee/COMMUNICATION"><i class="material-icons material-icons gray md-22"> details </i></a></td>
						</tr>
                    </tbody>
                </table>					
            </div>                
        </div>
    </div>
</div>
@endsection
@section('scripts-extra')

@endsection