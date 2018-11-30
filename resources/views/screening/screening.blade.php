
@extends('layouts.app')

@section('htmlheader_title')
    Prospective Info 
@endsection

@section('contentheader_title')
    Prospective Info
@endsection

@section('main-content')
<script>
	$(document).ready(function() {
		$('select[name="id"]').on('change', function() {
			var pros_id = $(this).val();
			console.log(pros_id);
			if(pros_id) {
				$.ajax({
					url: 'screening_pros/'+pros_id,
					type: "GET",
					success:function(data) {
					window.location.replace('screening_pros/'+pros_id);
					}
				});
			}
		});
	});
</script>
<style>	
	.content-header{
		display:none;
	}	
</style>
<link href="{{ asset('/css/type_ahead.css') }}" rel="stylesheet" type="text/css"/>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">
				
            <div class="box-header with-border col-sm-2 pull-right">
                    
            </div>
            <div class="box-body border padding-top-0 padding-left-right-0">
                <table class="table">
                    <tbody>
						<tr>
							<th class="th-position text-uppercase font-500 font-12">#</th>
							<th class="th-position text-uppercase font-500 font-13">
								<div class="autocomplete" style="width:200px;">
									<input id="myInput" type="text" placeHolder="FUTURE RESIDENT">
								</div>
								<!--<select name="id" id="id" class="form-control">
									<option value="">Select Future resident</option>
									@foreach ($crms_all as $prospect)
									<option value="{{ $prospect->id}}">{{ $prospect->pros_name }}</option>
									@endforeach
								</select>-->
							</th>
							<th class="th-position text-uppercase font-500 font-12">Phone No</th>
							<th class="th-position text-uppercase font-500 font-12">
								<div class="emailautocomplete" style="width:200px;">
									<input id="emailInput" type="text" placeHolder="EMAIL">
								</div>
							</th>
							<th class="th-position text-uppercase font-500 font-12">
								<div class="contactautocomplete" style="width:200px;">
									<input id="contactInput" type="text" placeHolder="CONTACT PERSON">
								</div>
							</th>
							<th class="th-position text-uppercase font-500 font-12">Add Screening Records</th>
							<th class="th-position text-uppercase font-500 font-12">View Screening Records</th>
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
							<td style="padding-left:70px"><a data-toggle="tooltip" data-placement="bottom" data-original-title="Add Screening Records" href="resposible_personal/{{ $crm->id }}"><i class="material-icons gray md-22"> add_circle</i></a></td>
							<td style="padding-left:70px"><a data-toggle="tooltip" data-placement="bottom" data-original-title="View Screening Records" href="screening_view/{{ $crm->id }}"><i class="material-icons gray md-22"> visibility </i></a></td>
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
<script type="text/javascript" language="javascript" src="{{ asset('/js/rec/screening.js') }}"></script>
@endsection