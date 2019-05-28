
@extends('layouts.app')

@section('htmlheader_title')
    Future Resident Info 
@endsection

@section('contentheader_title')
    <p class="text-danger"></b>
    <a href="/personal_details" class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:100px !important; height:26px !important; margin-right: 15px;"><i class="material-icons md-14 font-weight-600"> keyboard_backspace </i>Back</a>
    </p>
@endsection

@section('main-content')
<style>	
	.content-header{
		padding: 2px 2px 1px 20px;
		margin-bottom: 32px;
	}	
</style>
<script>
$(document).ready(function() {
		$('select[name="id"]').on('change', function() {
			var pros_id = $(this).val();
			console.log(pros_id);
			if(pros_id) {
				$.ajax({
					url: '../select_personal_detail/'+pros_id,
					type: "GET",
					success:function(data) {
						window.location.replace('../select_personal_detail/'+pros_id);
					}
				});
			}					
		});
	});
</script>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">				
            <div class="box-header with-border col-sm-2 pull-right"></div>
            <div class="box-body border padding-top-0 padding-left-right-0">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
    						<tr>
    							<th class="th-position text-uppercase font-500 font-12">#</th>
    							<th class="th-position text-uppercase font-500 font-12">future resodent
    								<!--<select name="id" id="id" class="form-control" >
    									<option value=""> @lang("msg.FUTURE RESIDENT")</option>
    									@foreach ($prospectives as $prospective)
    										<option value="{{ $prospective->id }}"> {{ $prospective->pros_name }} </option>	
    									@endforeach
    								</select>-->
    							</th>
    							<th class="th-position text-uppercase font-500 font-12">Phone No</th>
    							<th class="th-position text-uppercase font-500 font-12">Email</th>
    							<th class="th-position text-uppercase font-500 font-12">Contact Person</th>
    							<!--<th class="th-position text-uppercase font-500 font-12">Add Records</th>-->
    							<th class="th-position text-uppercase font-500 font-12">View Records</th>
    						</tr>
    						@foreach ($crms as $crm)
    						<tr>
    							@if($crm->service_image == NULL)
    								<td><img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>	
    								@else
    								<td><img src="../hsfiles/public/img/{{ $crm->service_image }}" class="img-circle" width="40" height="40"></td>
    								@endif
    							<td>{{ $crm->pros_name }}</td>
    							<?php 
    								$basic = DB::table('change_pross_record')->where([['pros_id', $crm->id], ['status', 1]])->first();{
    							?>
    							<td>{{ $basic->phone_p }}</td>
    							<td>{{ $basic->email_p }}</td>
    							<td>{{ $basic->contact_person }}</td>
    							<?php } ?>
    							<!--<td class="padding-left-35"><a href="details/{{ $crm->id }}" data-toggle="tooltip" data-placement="bottom" data-original-title="Add Records"><i class="material-icons gray md-22"> add_circle</i></a></td>-->
    							<td class="padding-left-35"><a href="../details_view/{{ $crm->id }}" data-toggle="tooltip" data-placement="bottom" data-original-title="view Records"><i class="material-icons gray md-22"> visibility </i></a></td>
    						</tr>
    						@endforeach
                        </tbody>
                    </table>
                </div>
            </div>                
        </div>
    </div>
</div>
@endsection
@section('scripts-extra')

@endsection