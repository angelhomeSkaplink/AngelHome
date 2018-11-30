
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
				@if(Session::has('msg'))
					<div class="alert alert-success alert-block">
						<button type="button" class="close" data-dismiss="alert">×</button>
						<strong>{{ Session::get('msg') }}</strong>
					</div>
				@endif
                <div class="box-header with-border col-sm-2 pull-right">
                   
					
                </div>
                <div class="box-body border padding-top-0 padding-left-right-0">
                    <table class="table">
                        <tbody>
							<tr>
								<th class="th-position text-uppercase font-500 font-12">Prospective</th>
								<th class="th-position text-uppercase font-500 font-12">Phone No</th>
								<th class="th-position text-uppercase font-500 font-12">Email</th>
								<th class="th-position text-uppercase font-500 font-12">View Record</th>
								<th class="th-position text-uppercase font-500 font-12">Sales Stage</th>
								<th class="th-position text-uppercase font-500 font-12">Update Records</th>
							</tr>
							@foreach ($crms as $crm)
							<tr>
								<td>{{ $crm->pros_name }}</td>
								<?php $basic = DB::table('change_pross_record')->where([['pros_id', $crm->id], ['status', 1]])->first();{ ?>
								<td>{{ $basic->phone_p }}</td>
								<td>{{ $basic->email_p }}</td>
								<?php } ?>
								<td class="padding-left-35"><a href="view_records/{{ $crm->id }}">
								<i class="material-icons gray md-22"> visibility </i></td>
								
								<td class="padding-left-45"><a href="add_records/{{ $crm->id }}">
								<i class="material-icons material-icons md-22 gray"> update </i></a>
								</td>
								
								<td class="padding-left-45"><a href="change_pro_records/{{ $crm->id }}">
								<i class="material-icons material-icons gray md-22"> edit </i>
								</a></td>
								
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