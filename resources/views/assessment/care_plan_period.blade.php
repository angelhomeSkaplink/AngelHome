
@extends('layouts.app')

@section('htmlheader_title')
    @lang("msg.Assessment Period")
@endsection

@section('contentheader_title')
    <p class="text-danger"><b>@lang("msg.Assessment Period")</b>
	<a href="{{ url('select_assessments/'.$id.'/'.$period) }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:105px !important; margin-right: 15px;"><i class="material-icons md-14 font-weight-600"> keyboard_arrow_left </i> @lang("msg.Back")</a>
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
<div class="row">
	<div class="col-md-12">
        <div class="box box-primary border">				
            <div class="box-body border padding-top-0 padding-left-right-0">
				<div class="table-responsive">
					<table class="table">
						<tbody>
							<tr>
								<th class="th-position text-uppercase font-500 font-12"><b><a href="../../care_plan_periodic/Initial/{{ $period }}">@lang("msg.Initial")</a></b></th>
								
								<th class="th-position text-uppercase font-500 font-12"><b><a href="../../care_plan_periodic/Monthly/{{ $period }}">@lang("msg.Monthly")</a></b></th>
							
								<th class="th-position text-uppercase font-500 font-12"><b><a href="../../care_plan_periodic/Quarterly/{{ $period }}">@lang("msg.Quarterly")</a></b></th>
							
								<th class="th-position text-uppercase font-500 font-12"><b><a href="../../care_plan_periodic/HalfYearly/{{ $period }}">@lang("msg.Half-Yearly")</a></b></th>
							
								<th class="th-position text-uppercase font-500 font-12"><b><a href="../../care_plan_periodic/Annual/{{ $period }}">@lang("msg.Annual")</a></b></th>
							
								<th class="th-position text-uppercase font-500 font-12"><b><a href="../../care_plan_periodic/Adhoc/{{ $period }}">@lang("msg.Change Of Condition")</a></b></th>
								
								<th class="th-position text-uppercase font-500 font-12"><b><a href="../../care_plan/{{ $period }}">@lang("msg.Total Score")</a></b></th>
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