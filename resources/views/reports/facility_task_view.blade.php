
@extends('layouts.app')

@section('htmlheader_title')
    Task Sheet Report 
@endsection

@section('contentheader_title')
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Facility Task Sheet Report</strong></h3>
	</div>
</div>
@endsection

@section('main-content')
<style>
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
	<br/>
        <div class="col-md-12">	
            <div class="box box-primary border">				
                <div class="box-header with-border col-sm-2 pull-right">                   
                </div>
				
                <div class="box-body border padding-top-0 padding-left-right-0">
                    <table class="table">
                        <tbody>
							<tr>
								<th class="th-position text-uppercase font-500 font-12">@lang("msg.Facility")</th>
								<th class="th-position text-uppercase font-500 font-12">Address</th>
								<th class="th-position text-uppercase font-500 font-12">Phone no</th>
								<th class="th-position text-uppercase font-500 font-12">Email</th>
								<th class="th-position text-uppercase font-500 font-12">View details</th>
							</tr>
							@foreach ($facilities as $facility)
							<tr>
								<td>{{ $facility->facility_name }}</a></td>
								<td>{{ $facility->address }}</td>
								<td>{{ $facility->phone }}</td>
								<td>{{ $facility->facility_email }}</td>
								<td class="padding-left-45"><a href="facility_task_graph_reports/{{ $facility->id }}">
									<i class="material-icons material-icons md-22 gray"> visibility </i></a>
								</td>		
							</tr>
							@endforeach
                        </tbody>
                    </table>
                </div>                
            </div>
        </div>
    </div>
@endsection
@section('scripts-extra')

@endsection