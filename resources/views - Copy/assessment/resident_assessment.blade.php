
@extends('layouts.app')

@section('htmlheader_title')
    Prospective Info 
@endsection

@section('contentheader_title')
    Prospective Info
@endsection

@section('main-content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary border">
				
                <div class="box-body border padding-top-0 padding-left-right-0">
                    <table class="table">
                        <tbody>
							<tr>
								<th class="th-position text-uppercase font-500 font-12">Resident</th>
								<th class="th-position text-uppercase font-500 font-12">Phone No</th>
								<th class="th-position text-uppercase font-500 font-12">Email</th>
								<th class="th-position text-uppercase font-500 font-12">Contact Person</th>
								<th class="th-position text-uppercase font-500 font-12">Select Resident</th>								
								<th class="th-position text-uppercase font-500 font-12">assessment history</th>
								<th class="th-position text-uppercase font-500 font-12">Next assessment</th>
							</tr>
							@foreach ($crms as $crm)
							<tr>
								<input type="hidden" class="form-control" value="{{ $crm->id }}" name="id"/>
								<td>{{ $crm->pros_name }}</td>
								<?php 
									$basic = DB::table('change_pross_record')->where([['pros_id', $crm->id], ['status', 1]])->first();{
								?>
								<td>{{ $basic->phone_p }}</td>
								<td>{{ $basic->email_p }}</td>
								<td>{{ $basic->contact_person }}</td>
								<?php } ?>								
								<input type="hidden" id="csrf" name="_token" value="{{ csrf_token() }}">
								<td class="padding-left-45">
									<a href="select_assessments/{{ $crm->id}}" class="material-icons material-icons gray md-22" style="background:transparent; border:none">check_circle </button>
								</td>
								<td class="padding-left-45">
									<a href="assessment_history/{{ $crm->id}}" class="material-icons material-icons gray md-22" style="background:transparent; border:none">history </button>
								</td>
								<?php
									$status = DB::table('resident_assessment')->where([['pros_id', $crm->id], ['assessment_status', 1]])->first();
									if(!$status){
								?>
								<td class="text-danger"><b>NO ASSESSMENT DONE</b></td>
								<?php }else{ 
									$today = date("Y-m-d");
									$assessment_date = $status->assessment_date;
									$next_date = date('Y-m-d', strtotime($assessment_date. ' + 90 days'));
									$diff = date_diff(date_create($next_date),date_create($today));
									$diff = $diff->days;
									if($diff>30){
								?>
								<td class="text-success"><b>{{ $status->assessment_date }}</b></td>
								<?php } elseif($diff<30 && $diff>0){?>
								<td class="text-warning"><b>{{ $status->assessment_date }}</b></td>
								<?php } elseif($diff==0){?>
								<td class="text-danger"><b>{{ $status->assessment_date }}</b></td>
								<?php } } ?>
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