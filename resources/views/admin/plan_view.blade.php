
@extends('layouts.app')

@section('htmlheader_title')
    Service plan
@endsection

@section('contentheader_title')
    
	<p class="text-danger"><b>@lang("msg.Service plan Detail")</b>
	@if(Auth::user()->role == '1')
	<a href="{{ url('new_plan_add_form') }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:187px !important; margin-top: -2px; margin-right: 10px;"><i class="material-icons md-14 font-weight-600"> add </i>@lang("msg.Add new plan")</a>
	@endif
	</p>
@endsection

@section('main-content')
<style>
	.content-header
	{
		//display:none;
		padding: 2px 0px 1px 20px;
		margin-bottom: -18px;
	}	
	.content {
		margin-top: 15px;
	}
	.form-control{
		//text-transform: uppercase;
	}
</style>
<br/>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">
			<div class="box-body border padding-top-0 padding-left-right-0">
                <table class="table">
                    <tbody>
						<tr>
							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Servive Plan Name")</th>
							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Point Range(From)")</th>
							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Point Range(to)")</th>
							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Price")</th>
							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Edit")</th>
							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Delete")</th>
						</tr>
						@foreach ($serviceplans as $serviceplan)
						<tr>
							<td>{{ $serviceplan->service_plan_name }}</td>								
							<td>{{ $serviceplan->from_range }}</td>
							@if($serviceplan->to_range==200000)
							<td>MAX RANGE</td>
							@else
							<td>{{ $serviceplan->to_range }}</td>
							@endif								
							<td>{{ $serviceplan->price }}</td>
							<td><a href="plan_edit/{{$serviceplan->service_plan_id}}"><i class="material-icons material-icons gray md-22"> edit </i></a></td>
							<td style="padding-left:22px !important"><a href="plan_delete/{{$serviceplan->service_plan_id}}">
								<i class="material-icons material-icons gray md-22" onclick="return confirm('Are you sure you want Delete this record ??');"> delete </i> </a></td>	
						</tr>
						@endforeach
                    </tbody>
                </table>
				<div class="text-center">{{ $serviceplans->links() }}</div>
            </div>                
        </div>
    </div>
</div>
@endsection
@section('scripts-extra')

@endsection