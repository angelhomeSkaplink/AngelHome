
@extends('layouts.app')

@section('htmlheader_title')
    @lang("msg.Assessment History")
@endsection

@section('contentheader_title')
    @if($reports->isEmpty())
		<p class="text-danger">&nbsp;&nbsp;<b>@lang("msg.No Assessment Record Found")</b></p>
	@endif
	@if(!$reports->isEmpty())	
		<p class="text-danger"><b>@lang("msg.Assessment Record Of") <span class="text-uppercase">{{ $resident->pros_name }}</span></b></p>
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
	.content{
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
								<th class="th-position text-uppercase font-500 font-12">@lang("msg.Assessment Done")</th>
								<th class="th-position text-uppercase font-500 font-12">@lang("msg.Date Of Assessment")</th>
								<th class="th-position text-uppercase font-500 font-12">@lang("msg.Assessment Point")</th>
							</tr>
							@foreach ($reports as $report)							
							<tr>
								<td>{{ $report->assessment_form_name }}</td>								
								<td>{{ $report->assessment_date }}</td>
								<td>{{ $report->score }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="text-center">{{ $reports->links() }}</div>
            </div>                
        </div>
    </div>
</div>
@endif
@endsection
@section('scripts-extra')

@endsection