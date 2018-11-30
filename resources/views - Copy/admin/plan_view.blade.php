
@extends('layouts.app')

@section('htmlheader_title')
    Service plan
@endsection

@section('contentheader_title')
    Service plan
@endsection

@section('main-content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary border"><br/>
				@if(Auth::user()->role == '1')
				<div class="box-header with-border col-sm-2 pull-right">
					<a href="{{ url('new_plan_add_form') }}"><span class="label label-primary font-size-85pc padding-7 custom-lebel"> <i class="material-icons md-15" style="vertical-align:sub !important"> add </i> Add New Record</a>					
                </div>
				@endif
                <div class="box-body border padding-top-0 padding-left-right-0">
                    <table class="table">
                        <tbody>
							<tr>
								<th class="th-position text-uppercase font-500 font-12">Name</th>
								<th class="th-position text-uppercase font-500 font-12">Point Range(From)</th>
								<th class="th-position text-uppercase font-500 font-12">Point Range(to)</th>
								<th class="th-position text-uppercase font-500 font-12">price</th>							
							</tr>
							@foreach ($serviceplans as $serviceplan)
							<tr>
								<td>{{ $serviceplan->service_plan_name }}</td>								
								<td>{{ $serviceplan->from_range }}</td>
								<td>{{ $serviceplan->to_range }}</td>
								<td>{{ $serviceplan->price }}</td>
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