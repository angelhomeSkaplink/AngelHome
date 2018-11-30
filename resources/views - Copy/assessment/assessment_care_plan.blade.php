
@extends('layouts.app')

@section('htmlheader_title')
    Assessment history
@endsection

@section('contentheader_title')
    
	@if($reports->isEmpty())
						<div class="alert alert-info"><b>&nbsp;&nbsp;NO ASSESSMENT RECORDS FOUND</b></div>
					@endif
					@if(!$reports->isEmpty())
						ASSESSMENT RECORDS  OF {{ $resident->pros_name }}
					@endif
@endsection

@section('main-content')
	
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary border">
				
                <div class="box-body border padding-top-0 padding-left-right-0">
					
				
                    <table class="table">
                        <tbody>
							<form action="{{url('save_care_plan')}}" method="post">
								<tr>
									<th class="th-position text-uppercase font-400 font-13"><b>Assessment Done</b></th>
									<th class="th-position text-uppercase font-400 font-13"><b>Assessment score</b></th>
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
								<tr>
									<td><label>Care plan score</label></td>
									<td><input type="number" class="form-control" name="total_point" value="{{ $total_score }}" required /></td>								
								</tr>
								<tr>
									<td><label>Note</label></td>
									<td><textarea class="form-control" name="care_plan_detail" type="text" placeHolder="Reason for editing the score" rows="3" required ></textarea></td>								
								</tr>
								<tr>
									
									<input type="hidden" id="csrf" name="_token" value="{{ csrf_token() }}">
									<td><button type="submit" class="btn btn-primary btn-block btn-flat btn-width">Submit</button></td>								
								</tr>
							</form>
                        </tbody>
                    </table>
					
                </div>                
            </div>
        </div>
    </div>
@endsection
@section('scripts-extra')

@endsection