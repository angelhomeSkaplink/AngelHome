
@extends('layouts.app')

@section('htmlheader_title')
    Prospective Info 
@endsection

@section('contentheader_title')
    Prospective Info
@endsection

@section('main-content')
<script>
	//$(document).ready(function(){
    //  $("#pointModal").on("show.bs.modal", function(e) {
    //    var id = $(e.relatedTarget).data('target-id');			
    //        $.get( 'view_plan_details/' + id, function( data ) { 
	//			var totalpointcount = JSON.parse(data);
	//			var $template = '';
	//			totalpointcount[0].forEach(function(user){
	//				$template += `
	//					<div class="user_info"> 
	//
	//						<p>${user.assessment_id}</p>
	//					</div>
	//				`;
	//			})
	//			
    //            $(".modal-body").html($template);
    //        });
    //    });
    //});
</script>

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">			
            <div class="box-body border padding-top-0 padding-left-right-0">
                <table class="table">
                    <tbody>
						<tr>
							<th class="th-position text-uppercase font-500 font-12">Prospective</th>
							<th class="th-position text-uppercase font-500 font-12">Phone No</th>
							<th class="th-position text-uppercase font-500 font-12">Email</th>
							<th class="th-position text-uppercase font-500 font-12">Contact Person</th>
							<th class="th-position text-uppercase font-500 font-12">View Plan details</th>
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
							<td style="padding-left:55px !important">
								<a  href="view_plan_details/{{ $crm->id }}">
									<i class="material-icons gray md-22"> visibility </i>
								</a>
							</td>
							<!--<td style="padding-left:22px !important"><a href="view_plan_details/{{ $crm->id }}">
							<i class="material-icons material-icons gray md-22"> pageview </i> </a></td>-->
						</tr>
						@endforeach
                    </tbody>
                </table>					
            </div>                
        </div>
    </div>
</div>
<!--<div class="modal fade" id="pointModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="myModalLabel">Resident Service plan details</h4>
			</div>
			<div class="modal-body">					
			</div>
		</div>
	</div>
</div>-->
@endsection
@section('scripts-extra')

@endsection