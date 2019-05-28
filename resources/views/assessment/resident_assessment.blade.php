
@extends('layouts.app')

@section('htmlheader_title')
    Resident Assessment
@endsection

@section('contentheader_title')
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
	<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>{{$flag}} Assessment</strong></h3>
	</div>
</div> 
@endsection

@section('main-content')
<style>
	.wickedpicker{
		z-index:999 !important;
	}
	.content-header
	{
		//display:none;
		padding: 2px 0px 1px 20px;
		margin-bottom: -10px;
	}
	.content {
		margin-top: 15px;
	}
</style>
<link href="{{ asset('/css/type_ahead.css') }}" rel="stylesheet" type="text/css"/>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">				
            <div class="box-body border padding-top-0 padding-left-right-0">
				<div class="table-responsive">
					<table class="table table-striped">
						<tbody>
							<tr style="background-color:rgb(49, 68, 84) !important;">								
								<th class="th-position text-uppercase font-500 font-12"><h5 style="color:aliceblue !important;"><strong></strong></h5></th>
								<th class="th-position text-uppercase font-500 font-12">
									<div class="autocomplete" style="width:200px;">
										<input id="myInput" type="text" placeHolder="@lang('msg.Resident')">
									</div>
								</th>
								<th class="th-position text-uppercase font-500 font-12"><h5 style="color:aliceblue !important;"><strong>@lang("msg.Phone No")</strong></h5></th>
								<th class="th-position text-uppercase font-500 font-12"><h5 style="color:aliceblue !important;"><strong>@lang("msg.Next Assessment Date")</strong></h5></th>
								<th class="th-position text-uppercase font-500 font-12"><h5 style="color:aliceblue !important;"><strong>@lang("msg.Assessment History")</strong></h5></th>
								<th class="th-position text-uppercase font-500 font-12"><h5 class="pull-right" style="color:aliceblue !important;"><strong>Action</strong></h5></th>								
							</tr>
							@foreach ($crms as $crm)
							@php
							$n = explode(",",$crm->pros_name);
							@endphp
							<tr>
								<input type="hidden" class="form-control" value="{{ $crm->id }}" name="id"/>
								@if($crm->service_image == NULL)
								<td><img src="hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>	
								@else
								<td><img src="hsfiles/public/img/{{ $crm->service_image }}" class="img-circle" width="40" height="40"></td>
								@endif
								<td><strong>{{ $n[0] }} {{ $n[1] }} {{ $n[2] }}</strong></td>
								<?php 
									$basic = DB::table('change_pross_record')->where([['pros_id', $crm->id], ['status', 1]])->first();{
								?>
								<td>{{ $basic->phone_p }}</td>
								<?php } ?>							
								<?php
									$status = DB::table('resident_assessment')->where([['pros_id', $crm->id], ['resident_assessment.assessment_status', 1]])->first();
									if(!$status){
								?>
								<td class="text-danger text-center"><b>@lang("msg.No Assessment Done")</b></td>
								<?php } else{
									$today = date("Y-m-d");
									$next_date = DB::table('next_assessment')->where([['pros_id', $crm->id], ['next_assessment.assessment_status', 1]])->first();
									if(!$next_date){
								?>
								<td class="text-center">
									<form action="{{ url('storeNextAssessmentDate')}}" method="post">
										<input name="_method" type="hidden" value="POST">
										{!! csrf_field() !!}
										<input type="hidden" name="pros_id" value="{{$crm->id}}">
										<input type="date" min="{{date('Y-m-d')}}" name="next_date" value="" class="form-control">
										<button type="submit">&#x1f4be;</button>
									</form>
								</td>
								<?php } else{ ?>
								<td class="text-center form-inline">
									<form action="{{ url('storeNextAssessmentDate')}}" method="post">
										<input name="_method" type="hidden" value="POST">
										{!! csrf_field() !!}
										<input type="hidden" name="pros_id" value="{{$crm->id}}">
										<input type="date" min="2019-04-28" name="next_date" value="{{$next_date->next_assessment_date}}" class="form-control">
										<button type="submit">&#x1f4be;</button>
									</form>
								</td>
								<?php } }
								?>
								
								<td class="padding-left-45">
								    @php
								    $datas = DB::table('care_plan')->where('pros_id', $crm->id)->get();
								    @endphp
								    @if(count($datas)<=0)
    									<a href="javascript:ShowWarning()" class="material-icons material-icons gray md-22" style="background:transparent; border:none">history </button>
                                    @else
									    <a href="assessment_period/{{$flag}}/{{ $crm->id}}" class="material-icons material-icons gray md-22" style="background:transparent; border:none">history </button>
									@endif
								</td>
								<td class="padding-left-15">										
									<span class="pull-right"><a class="btn btn-default" href="select_period/{{$flag}}/{{ $crm->id}}"><i class="material-icons material-icons gray md-22"> add_circle_outline </i> Add</a></span>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="text-center">{{ $crms->links() }}</div>
            </div>                
        </div>
    </div>
</div>
@endsection
@section('scripts-extra')
<script type="text/javascript" language="javascript" src="{{ asset('/js/rec/res_assessment.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
<script teype="text/javascript">
	function ShowWarning(){
		toastr.optionsOverride = 'positionclass = "toast-bottom-right"';
        toastr.options.positionClass = 'toast-bottom-right';
        toastr.error('No assessments are done', 'Empty', 'positionclass = "toast-bottom-right"');
	}
</script>
@endsection