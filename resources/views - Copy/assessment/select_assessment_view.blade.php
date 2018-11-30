
@extends('layouts.app')

@section('htmlheader_title')
    SELECT ASSESSMENT
@endsection

@section('contentheader_title')
    select assessments
	<!--<form action="{{url('care_plan')}}" method="post">
		<input type="hidden" class="form-control" value="{{ $id }}" name="id"/>
		<input type="hidden" id="csrf" name="_token" value="{{ csrf_token() }}">
		<a href="care_plan" type="submit" class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:150px !important"><i class="material-icons md-14 font-weight-600"> add </i> ADD CARE PLAN</button>			
	</form>-->
	
	<a href="../care_plan/{{ $id }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:150px !important"><i class="material-icons md-14 font-weight-600"> add </i> ADD CARE PLAN</a>
	
@endsection

@section('main-content')
<br/>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary border">
				<div class="box-header with-border col-sm-2 pull-right">
					
				</div>
                <div class="box-body border padding-top-0 padding-left-right-0">
                    <table class="table">
                        <tbody>
							<tr>
								<th class="th-position text-uppercase font-500 font-12">assessments</th>
								<th class="th-position text-uppercase font-500 font-12">Select assessment</th>
								<th class="th-position text-uppercase font-500 font-12">status</th>
							</tr>
							@foreach ($assessments as $assessment)
							<tr>
								<td>{{ $assessment->assessment_form_name }}</td>
								<!--<td><a href="../assessment_choose/{{ $assessment->assessment_id }}/{{ $id }}"><i class="material-icons material-icons gray md-22"> edit </i></a></td>-->
								<td class="padding-left-45">
									<a href="../assessment_choose/{{ $assessment->assessment_id }}/{{ $id }}"><i class="material-icons material-icons gray md-22"> check_circle </i></a>
								</td>
								<?php
									$status = DB::table('resident_assessment')->where([['assessment_id', $assessment->assessment_id], ['pros_id', $id]])->first();
									if($status){
								?>
								<td class="text-success"><b>DONE</b></td>
								<?php }else{ ?>
								<td class="text-danger"><b>NOT DONE</b></td>
								<?php } ?>
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