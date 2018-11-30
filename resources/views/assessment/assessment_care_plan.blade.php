
@extends('layouts.app')

@section('htmlheader_title')
    @lang("msg.Assessment History")
@endsection

@section('contentheader_title')
    
	@if($reports->isEmpty())
		<p class="text-danger"><b>&nbsp;&nbsp;@lang("msg.No Assessment Record Found")</b></p>
	@endif
	@if(!$reports->isEmpty())
		<p class="text-success"><b>@lang("msg.Assessment Record Of") {{ $resident->pros_name }}</b></p>
	@endif
@endsection

@section('main-content')	
@if(!$reports->isEmpty())
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">				
            <div class="box-body border padding-top-0 padding-left-right-0">
				<form action="{{url('save_care_plan')}}" method="post">
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
								<td><label>@lang("msg.Assessment Total Score")</label></td>
								<td>{{ $total_score }}</td>								
							</tr>
							<tr>
								<td><label>@lang("msg.Care Plan Score")</label></td>
								<td><input type="number" class="form-control" name="total_point" value="{{ $total_score }}" required /></td>								
							</tr>
							<tr>
								<td><label>@lang("msg.Note")</label></td>
								<td><textarea class="form-control" name="care_plan_detail" type="text" placeHolder="Reason for editing the score" rows="3" required ></textarea></td>								
							</tr>						
						</tbody>
					</table>
					<div>
						<div class="form-group has-feedback">
							<input type="hidden" id="csrf" name="_token" value="{{ csrf_token() }}">
							<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm" id="submit-button" style="margin-right: 5px;">@lang("msg.Submit")</button>
						</div>

						<div class="form-group has-feedback">
							<a href="../select_assessments/{{ $report->pros_id }}" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right: 15px;">@lang("msg.Cancel")</a>
						</div>
					</div><br/><br/>
				</form>				
			</div>                
		</div>
	</div>
</div>
@endif
@endsection
@section('scripts-extra')

@endsection