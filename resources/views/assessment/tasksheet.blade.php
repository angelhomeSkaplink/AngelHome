@extends('layouts.app')

@section('htmlheader_title')
    Resident
@endsection

@section('contentheader_title')
    <p class="text-danger"><b>Resident</b></p>
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
	.placeholder {
    color: red;
    opacity: 1; /* Firefox */
}
</style>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">
			<div class="box-body border padding-top-0 padding-left-right-0">
                <table class="table">
                    <tbody>
						<tr>
							<th class="th-position text-uppercase font-400 font-13">#</th>
							<th class="th-position text-uppercase font-400 font-13">Resident</th>
							<th class="th-position text-uppercase font-400 font-13">Phone No</th>
							<th class="th-position text-uppercase font-400 font-13">Email</th>
							<th class="th-position text-uppercase font-400 font-13">Contact Person</th>
							<th class="th-position text-uppercase font-400 font-13">Set task Sheet</th>
						</tr>
						@foreach ($crms as $crm)
						<tr>
							@if($crm->service_image == NULL)
							<td><img src="hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>	
							@else
							<td><img src="hsfiles/public/img/{{ $crm->service_image }}" class="img-circle" width="40" height="40"></td>
							@endif
							<td>{{ $crm->pros_name }}</td>
							<?php 
								$basic = DB::table('change_pross_record')->where([['pros_id', $crm->id], ['status', 1]])->first();{
							?>
							<td>{{ $basic->phone_p }}</td>
							<td>{{ $basic->email_p }}</td>
							<td>{{ $basic->contact_person }}</td>
							<?php } ?>
							<td><a href="set_task/{{ $crm->id }}"><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400">SET TASK SHEET</a></span></td>
						</tr>
						@endforeach
                    </tbody>
                </table>
				<div class="text-center">{{ $crms->links() }}</div>
            </div>                
        </div>
    </div>
</div>
@endsection
@section('scripts-extra')

@endsection