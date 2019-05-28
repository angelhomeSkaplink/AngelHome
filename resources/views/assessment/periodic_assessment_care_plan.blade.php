
@extends('layouts.app')

@section('htmlheader_title')
    @lang("msg.Assessment History")
@endsection

@section('contentheader_title')
    
	@if($reports->isEmpty())
		<p class="text-danger"><b>@lang("msg.No Assessment Record Found")</b><a href="../../select_period/{{ $period }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:90px !important; margin-right: 15px;"><i class="material-icons md-14 font-weight-600"> keyboard_arrow_left </i> @lang("msg.Back")</a></p>
	@endif
	@if(!$reports->isEmpty())
		<p class="text-success"><b>{{ $id }}</b>
			<a href="../../select_period/{{ $period }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:90px !important; margin-right: 15px;"><i class="material-icons md-14 font-weight-600"> keyboard_arrow_left </i> @lang("msg.Back")</a><a class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:135px !important; margin-right: 15px; margin-top: -2px !important;"><b>@lang("msg.Date"): {{ $periodic_date }}</b></a>	
		</p>
	@endif
@endsection

@section('main-content')
<style>
	.wickedpicker{
		z-index:999 !important;
	}
	.content-header{
		padding: 2px 0px 1px 20px;
		margin-bottom: -10px;
	}
	.content {
		margin-top: 15px;
	}
</style>	
@if(!$reports->isEmpty())
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">				
            <div class="box-body border padding-top-0 padding-left-right-0">
				<div class="table-responsive">
					<table class="table">
						<tbody>						
							<tr>
								<th class="th-position text-uppercase font-400 font-13"><b>@lang("msg.Assessment Done")</b></th>
								<th class="th-position text-uppercase font-400 font-13"><b>@lang("msg.Assessment Score")</b></th>
							</tr>
							@foreach ($reports as $report)							
							<tr>
								<input type="hidden" class="form-control" name="assessment_id" value="{{ $report->pros_id }}" required />
								<td><label>{{ $report->assessment_form_name }}</label></td>	
								<td><label>{{ $report->score }}</label></td>
							</tr>
							@endforeach
							<tr>
								<td><label>Assessment Total score</label></td>
								<td>{{ $total_score }}</td>								
							</tr>											
						</tbody>
					</table>
				</div>
				<div>				
					<div class="form-group has-feedback">
						<a href="../../select_period/{{ $period }}" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right: 15px;">@lang("msg.Cancel")</a>
					</div>
				</div><br/><br/>
			</div>                
		</div>
	</div>
</div>
@endif
@endsection
@section('scripts-extra')

@endsection