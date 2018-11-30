
@extends('layouts.app')

@section('htmlheader_title')
    Assessment history
@endsection

@section('contentheader_title')
    @if($reports->isEmpty())
						<h4>&nbsp;&nbsp;NO ASSESSMENT RECORDS FOUND</h4>
					@endif
					@if(!$reports->isEmpty())
					
					<h4>ASSESSMENT RECORDS  OF <span class="text-uppercase">{{ $resident->pros_name }}</span></h4>
@endsection

@section('main-content')
	
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary border">
				
                <div class="box-body border padding-top-0 padding-left-right-0">
					
                    <table class="table">
                        <tbody>
							<tr>
								<th class="th-position text-uppercase font-500 font-12">Assessment Done</th>
								<th class="th-position text-uppercase font-500 font-12">Date of assessment</th>
								<th class="th-position text-uppercase font-500 font-12">Assessment point</th>
								<th class="th-position text-uppercase font-500 font-12">next assessment date</th>
							</tr>
							@foreach ($reports as $report)							
							<tr>
								<td>{{ $report->assessment_form_name }}</td>								
								<td>{{ $report->assessment_date }}</td>
								<td>{{ $report->score }}</td>
								<td></td>
							</tr>
							@endforeach
                        </tbody>
                    </table>
					@endif
                </div>                
            </div>
        </div>
    </div>
@endsection
@section('scripts-extra')

@endsection