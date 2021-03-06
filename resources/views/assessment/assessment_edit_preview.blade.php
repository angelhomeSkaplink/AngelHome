
@extends('layouts.app')

@section('htmlheader_title')
    @lang("msg.Assessments")
@endsection

@section('contentheader_title')
    @lang("msg.Assessments") 
@endsection

@section('main-content')
<br/>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary border">
                <div class="box-body border padding-top-0 padding-left-right-0">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
    							<tr>
    								<th class="th-position text-uppercase font-500 font-12">@lang("msg.Assessment ID")</th>
    								<th class="th-position text-uppercase font-500 font-12">@lang("msg.Assessments")</th>
    								<th class="th-position text-uppercase font-500 font-12">@lang("msg.View Assessment")</th>
    							</tr>
    							@foreach ($assessments as $assessment)
    							<tr>
    								<td>{{ $assessment->assessment_id }}</td>
    								<td><label>{{ $assessment->assessment_form_name }}</label></td>
    								<td><a href="assessment_edit/{{ $assessment->assessment_id }}"><i class="material-icons material-icons gray md-22"> details </i></a></td>
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