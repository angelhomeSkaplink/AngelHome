
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
                
                <div class="box-body border padding-top-0 padding-left-right-0">
                    <table class="table">
                        <tbody>
							<tr>
								<th class="th-position text-uppercase font-400 font-13">Prospective</th>
								<th class="th-position text-uppercase font-400 font-13">Phone No</th>
								<th class="th-position text-uppercase font-400 font-13">Email</th>
								<th class="th-position text-uppercase font-400 font-13">Contact Person</th>
								<th class="th-position text-uppercase font-400 font-13">Make payment</th>
							</tr>
							@foreach ($crms as $crm)
							<tr>
								<td>{{ $crm->pros_name }}</td>
								<?php 
									$basic = DB::table('change_pross_record')->where([['pros_id', $crm->id], ['status', 1]])->first();{
								?>
								<td>{{ $basic->phone_p }}</td>
								<td>{{ $basic->email_p }}</td>
								<td>{{ $basic->contact_person }}</td>
								<?php } ?>
								<td><a href="resident_make_payment/{{ $crm->id }}"><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400">MAKE PAYMENT</a></span></td>
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