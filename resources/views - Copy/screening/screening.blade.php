
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
				
                <div class="box-header with-border col-sm-2 pull-right">
                    
                </div>
                <div class="box-body border padding-top-0 padding-left-right-0">
                    <table class="table">
                        <tbody>
							<tr>
								<th class="th-position text-uppercase font-500 font-12">Prospective</th>
								<th class="th-position text-uppercase font-500 font-12">Phone No</th>
								<th class="th-position text-uppercase font-500 font-12">Email</th>
								<th class="th-position text-uppercase font-500 font-12">Contact Person</th>
								<th class="th-position text-uppercase font-500 font-12">Add Screening Records</th>
								<th class="th-position text-uppercase font-500 font-12">View Screening Records</th>
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
								<td style="padding-left:70px"><a data-toggle="tooltip" data-placement="bottom" data-original-title="Add Screening Records" href="screening_details/{{ $crm->id }}"><i class="material-icons gray md-22"> add_circle</i></a></td>
								<td style="padding-left:70px"><a data-toggle="tooltip" data-placement="bottom" data-original-title="View Screening Records" href="screening_view/{{ $crm->id }}"><i class="material-icons gray md-22"> visibility </i></a></td>
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