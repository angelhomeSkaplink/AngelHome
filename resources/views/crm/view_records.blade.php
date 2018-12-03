
@extends('layouts.app')

@section('htmlheader_title')
    @lang("msg.Resident Add")
@endsection

@section('contentheader_title')
    
@endsection

@section('main-content')
<style>	
	.content-header
	{
		display:none;
	}	
</style>

<div class="row">
	<div class="col-md-4">
		<div class="box box-primary border-light-blue">
			@if(Session::has('msg'))
				<div class="alert alert-danger">
					<strong>{{ Session::get('msg') }}</strong>
				</div>
			@endif
			<div class="box-body padding-top-5">
				<h4 class="font-500 text-uppercase font-15">@lang("msg.Future Resident Details")</h4>
				
				<form class="form-inline border-top">
					
						<div style="margin-top:10px"></div>
						
						<label class="text-capitalize font-500 font-14">@lang("msg.Future Resident Name") : </label>
						<span class="font-14">{{ $row->pros_name }} </span>
					
					<div style="clear:both; margin-top:7px"></div>
						<label class="text-capitalize font-500 font-14">@lang("msg.Phone No") : </label>
						<span class="font-14">{{ $details->phone_p }} </span>
					
					<div style="clear:both; margin-top:7px"></div>
						<label class="text-capitalize font-500 font-14">@lang("msg.Email") : </label>
						<span class="font-14">{{ $details->email_p }} </span>
					
					<div style="clear:both; margin-top:7px"></div>
						<label class="text-capitalize font-500 font-14">@lang("msg.Address") : </label>
						<span class="font-14">{{ $details->address_p }} </span>
					
					<div style="clear:both; margin-top:7px"></div>
						<label class="text-capitalize font-500 font-14">@lang("msg.City") : </label>
						<span class="font-14">{{ $details->city_p }} </span>
					
					<div style="clear:both; margin-top:7px"></div>
						<label class="text-capitalize font-500 font-14">@lang("msg.State") : </label>
						<span class="font-14"> Assam </span>					
					
					<div style="clear:both; margin-top:7px"></div>
						<label class="text-capitalize font-500 font-14">@lang("msg.Zip") : </label>
						<span class="font-14"> {{ $details->zip_p }} </span>
				<div style="clear:both; margin-top:7px"></div>
				</div>
			</form>
			
		</div>
	</div>
	<div class="col-md-4">
		<div class="box box-primary border-light-blue">
			<div class="box-body padding-top-5">
				<h4 class="font-500 text-uppercase font-15">@lang("msg.Contact Details")</h4>
				<form class="form-inline border-top">
				<div style="margin-top:10px"></div>
					
						<label class="text-capitalize font-500 font-14">@lang("msg.Contact Person") : </label>
						<span class="font-14">{{ $details->contact_person }}  </span>
					
					
					<div style="clear:both; margin-top:7px"></div>
						<label class="text-capitalize font-500 font-14">@lang("msg.Phone") : </label>
						<span class="font-14">{{ $details->phone_c }} </span>
					
					
					<div style="clear:both; margin-top:7px"></div>
						<label class="text-capitalize font-500 font-14">@lang("msg.Email") : </label>
						<span class="font-14">{{ $details->email_c }} </span>
					
					
					<div style="clear:both; margin-top:7px"></div>
					
						<label class="text-capitalize font-500 font-14">@lang("msg.Address") : </label>
						<span class="font-14">{{ $details->address_p }} </span>
					
					<div style="clear:both; margin-top:7px"></div>
					
						<label class="text-capitalize font-500 font-14">@lang("msg.City") : </label>
						<span class="font-14">{{ $details->city_c }} </span>
					
					
					<div style="clear:both; margin-top:7px"></div>
				
						<label class="text-capitalize font-500 font-14">@lang("msg.State") : </label>
						<span class="font-14">Assam	</span>	 				
					
					
					<div style="clear:both; margin-top:7px"></div>
					
						<label class="text-capitalize font-500 font-14">@lang("msg.Zip") : </label>
						<span class="font-14">{{ $details->zip_c }} </span>				
					
				</form>	
			
			</div>
		</div>
		
	</div>
	<div class="col-md-4">
		<div class="box box-primary border-light-blue">
			<div class="box-body padding-top-5" style="height:269px">
				<h4 class="font-500 text-uppercase font-15">@lang("msg.Source And Relation")</h4>
				
				<form class="form-inline border-top">
				<div style="margin-top:10px"></div>
					
						<label class="text-capitalize font-500 font-14">@lang("msg.Relation") : </label>
						 <span class="font-14">{{ $details->relation }} </span> 
					
					<div style="clear:both; margin-top:7px"></div>
					
						<label class="text-capitalize font-500 font-14">@lang("msg.Source") : </label>
						<span class="font-14">{{ $details->source }} </span>
					
					<div style="clear:both; margin-top:7px"></div>
				
						<?php $user = DB::table('users')->where('user_id', $row->user_id)->first(); ?>
						<label class="text-capitalize font-500 font-14">@lang("msg.Receptionist") : </label>
						<span class="font-14">{{ $user->firstname }} {{ $user->middlename }} {{ $user->lastname}} </span>
					
					<div style="clear:both; margin-top:7px"></div>
					
						<?php $marketing = DB::table('users')->where('user_id', $row->marketing_id)->first(); ?>
						<label class="text-capitalize font-500 font-14">@lang("msg.Marketing") : </label>
						@if($marketing != NULL)
						<span class="font-14">{{ $marketing->firstname }} {{ $marketing->middlename }} {{ $marketing->lastname}} </span>
						@endif
						@if($marketing == NULL)
							<span class="font-14">@lang("msg.No Record Found") </span>
						@endif
					
				
				</form>
	
			</div>
			
		</div>
	</div>	
</div>


<div class="tabbable">
	<ul class="nav nav-tabs wizard">
		<li class="active"><a href="#1" data-toggle="tab" aria-expanded="false"><span class="nmbr"></span><span class="text">@lang("msg.Discovery")</span></a></li>
		<li class=""><a href="#2" data-toggle="tab" aria-expanded="false"><span class="nmbr"></span><span class="text">@lang("msg.Tour")</span></a></li>
		<li class=""><a href="#3" data-toggle="tab" aria-expanded="false"><span class="nmbr"></span><span class="text">@lang("msg.Re-Tour")</span></a></li>
		<li class=""><a href="#4" data-toggle="tab" aria-expanded="false"><span class="nmbr"></span><span class="text">@lang("msg.Appointment")</span></a></li>
		<li class=""><a href="#5" data-toggle="tab" aria-expanded="true"><span class="nmbr"></span><span class="text">@lang("msg.Lease Signing")</span></a></li>
		<li class=""><a href="#6" data-toggle="tab" aria-expanded="true"><span class="nmbr"></span><span class="text">@lang("msg.Move In")</span></a></li>
	 </ul>
 </div> 
 

  <div class="tab-content">
  
    <div id="1" class="tab-pane fade in active">
      <div class="box box-primary">
			<div class="box-body padding-top-5" style="height:190px">			
				<?php $stage = DB::table('stage_pipeline')->where([['pipeline_id', $row->id], ['sales_stage', 'Discovery']])->orderBy('stage_pipeline_id', 'DESC')->first(); ?>
				@if($stage == NULL)
					<h4 class="font-500 text-uppercase font-15">@lang("msg.Discovery") <a href="../add_prospect_record/Discovery/{{ $row->id }}"><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="position:relative; top:-5px">ADD RECORD</span></a></h4>
					<div class='text-danger'>@lang("msg.No Records Found")</div> 
				@endif
				@if($stage != NULL)
				<h4 class="font-500 text-uppercase font-15">Discovery @if($stage->status == 1)<span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="position:relative; top:-5px">Active State</span> @endif </h4> 
				<div class="form-inline border-top">
				<div style="margin-top:10px"></div>
				
					<label class="text-capitalize font-500 font-14">@lang("msg.Date")</label> : <span class="font-14">{{ $stage->date }}</span>					
				<div style="clear:both; margin-top:7px"></div>
				
				
					<?php $lead = DB::table('leads')->where('lead_id', $stage->lead_id)->first(); ?>
					<label class="text-capitalize font-500 font-14">@lang("msg.Lead Status")</label> : <span class="font-14">{{ $lead->lead_type }}</span>
				
					<div style="clear:both; margin-top:7px"></div>
				
					<label class="text-capitalize font-500 font-14">@lang("msg.Note")</label> : <span class="font-14">{{ $stage->notes }}</span>
					<div style="clear:both; margin-top:7px"></div>
				
					<label class="text-capitalize font-500 font-14">@lang("msg.Communication Method")</label> : <span class="font-14">{{ $stage->moc }}</span>
				<br/><br/>
				</div>
				@endif				
			</div>
		</div>
    </div>
	
    <div id="2" class="tab-pane fade">
        <div class="box box-primary arrow_box border-light-blue">
			<div class="box-body padding-top-5" style="height:190px">	
				<?php $tour = DB::table('stage_pipeline')->where([['pipeline_id', $row->id], ['sales_stage', 'Tour']])->orderBy('stage_pipeline_id', 'DESC')->first(); ?>
				@if($tour == NULL)
					<h4 class="font-500 text-uppercase font-15">@lang("msg.Tour") <a href="../add_prospect_record/Tour/{{ $row->id }}"><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="position:relative; top:-5px">@lang("msg.Add Record")</span></a></h4>
				<div class="form-inline border-top">
					<div class='text-danger' style="padding-top:10px; padding-bottom:7px">@lang("msg.No Records Found")</div> 
				</div>
				@endif
				@if($tour != NULL)
					
				<h4 class="font-500 text-uppercase font-15">Tour @if($tour->status == 1)<span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="position:relative; top:-5px">@lang("msg.Active State")</span> @endif </h4>
				
					<div class="form-inline border-top">
					
					<div style="margin-top:10px"></div>
					
					<label class="text-capitalize font-500 font-14">@lang("msg.Date")</label> : <span class="font-14">{{ $tour->date }}</span>					
					<div style="clear:both; margin-top:7px"></div>
					
					<?php $lead = DB::table('leads')->where('lead_id', $tour->lead_id)->first(); ?>
						<label class="text-capitalize font-500 font-14">@lang("msg.Lead Status")</label> : <span class="font-14">{{ $lead->lead_type }}</span>
						<div style="clear:both; margin-top:7px"></div>
					
						<label class="text-capitalize font-500 font-14">@lang("msg.Note")</label> : <span class="font-14">{{ $tour->notes }}</span>
					
						<div style="clear:both; margin-top:7px"></div>
						<label class="text-capitalize font-500 font-14">@lang("msg.Communication Method")</label> : <span class="font-14">{{ $tour->moc }}</span>
					</div>						
					@endif
					
				</div>
			
			</div>
		</div>
  
	
    <div id="3" class="tab-pane fade">
        <div class="box box-primary arrow_box border-light-blue">
			<div class="box-body padding-top-5" style="height:190px">	
				<?php $retour = DB::table('stage_pipeline')->where([['pipeline_id', $row->id], ['sales_stage', 'Re-Tour']])->orderBy('stage_pipeline_id', 'DESC')->first(); ?>
				@if($retour == NULL)
				<h4 class="font-500 text-uppercase font-15">@lang("msg.Re-Tour") <a href="../add_prospect_record/Re-Tour/{{ $row->id }}"><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="position:relative; top:-5px">@lang("msg.Add Record")</span></a></h4>
				<div class="form-inline border-top">
					<div class='text-danger' style="padding-top:10px; padding-bottom:7px">@lang("msg.No Records Found") </div> 
				</div>
				@endif
				@if($retour != NULL)
					
					<h4 class="font-500 text-uppercase font-15">Re-Tour @if($retour->status == 1)
					<span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="position:relative; top:-5px">@lang("msg.Active State")</span> @endif </h4>
				
					<div class="form-inline border-top">
					
					<div style="margin-top:10px"></div>
					
					<label class="text-capitalize font-500 font-14">@lang("msg.Date")</label> : <span class="font-14">{{ $retour->date }}</span>					
					<div style="clear:both; margin-top:7px"></div>
					
					<?php $lead = DB::table('leads')->where('lead_id', $retour->lead_id)->first(); ?>
						<label class="text-capitalize font-500 font-14">@lang("msg.Lead Status")</label> : <span class="font-14">{{ $lead->lead_type }}</span>
						<div style="clear:both; margin-top:7px"></div>
					
						<label class="text-capitalize font-500 font-14">@lang("msg.Note")</label> : <span class="font-14">{{ $retour->notes }}</span>
					
						<div style="clear:both; margin-top:7px"></div>
						<label class="text-capitalize font-500 font-14">@lang("msg.Communication Method")</label> : <span class="font-14">{{ $retour->moc }}</span>	
					</div>						
					@endif
					
				</div>
			
			</div>
	</div>
    
	<div id="4" class="tab-pane fade">
        <div class="box box-primary">
			<div class="box-body padding-top-5" style="height:190px">			
				<?php $appointment = DB::table('stage_pipeline')->where([['pipeline_id', $row->id], ['sales_stage', 'Appointment']])->orderBy('stage_pipeline_id', 'DESC')->first(); ?>
				@if($appointment == NULL)
					<h4 class="font-500 text-uppercase font-15">@lang("msg.Appointment") <a href="../add_prospect_record/Appointment/{{ $row->id }}"><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="position:relative; top:-5px">@lang("msg.Add Record")</span></a></h4>
					<div class='text-danger'>@lang("msg.No Records Found")</div> 
				@endif
				@if($appointment != NULL)
				<h4 class="font-500 text-uppercase font-15">Appointment @if($appointment->status == 1)<span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="position:relative; top:-5px">@lang("msg.Active State")</span> @endif </h4> 
				<div class="form-inline border-top">
				<div style="margin-top:10px"></div>
				<?php $appointment_date = DB::table('appointment')->where([['pros_id', $appointment->pipeline_id], ['status', 1]])->first(); ?>
				
					<label class="text-capitalize font-500 font-14">@lang("msg.Date")</label> : <span class="font-14">{{ $appointment_date->appointment_date }}</span>					
				<div style="clear:both; margin-top:7px"></div>
				
				
					<?php $lead = DB::table('leads')->where('lead_id', $appointment->lead_id)->first(); ?>
					<label class="text-capitalize font-500 font-14">@lang("msg.Lead Status")</label> : <span class="font-14">{{ $lead->lead_type }}</span>
				
					<div style="clear:both; margin-top:7px"></div>
				
					<label class="text-capitalize font-500 font-14">@lang("msg.Note")</label> : <span class="font-14">{{ $appointment->notes }}</span>
					<div style="clear:both; margin-top:7px"></div>
				
					<label class="text-capitalize font-500 font-14">@lang("msg.Communication Method")</label> : <span class="font-14">{{ $appointment->moc }}</span>
				<br/><br/>
				</div>
				@endif
				
			</div>
		</div>
    </div>
	<div id="5" class="tab-pane fade">
        <div class="box box-primary arrow_box border-light-blue">
			<div class="box-body padding-top-5" style="height:190px">	
				<?php $signing = DB::table('stage_pipeline')->where([['pipeline_id', $row->id], ['sales_stage', 'Signing']])->orderBy('stage_pipeline_id', 'DESC')->first(); ?>
				@if($signing == NULL)
					<h4 class="font-500 text-uppercase font-15">@lang("msg.Lease Signing") <a href="../add_prospect_record/Lease-Signing/{{ $row->id }}"><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="position:relative; top:-5px">ADD RECORD</span></a></h4>
				<div class="form-inline border-top">
					<div class='text-danger' style="padding-top:10px; padding-bottom:7px">@lang("msg.No Records Found")</div> 
				</div>
				@endif
				@if($signing != NULL)
					
				<h4 class="font-500 text-uppercase font-15">Lease Signing @if($signing->status == 1)<span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="position:relative; top:-5px">@lang("msg.Active State")</span> @endif </h4>
				
					<div class="form-inline border-top">
					
					<div style="margin-top:10px"></div>
					
					<label class="text-capitalize font-500 font-14">@lang("msg.Date")</label> : <span class="font-14">{{ $signing->date }}</span>					
					<div style="clear:both; margin-top:7px"></div>
					
					<?php $lead = DB::table('leads')->where('lead_id', $signing->lead_id)->first(); ?>
						<label class="text-capitalize font-500 font-14">@lang("msg.Lead Status")</label> : <span class="font-14">{{ $lead->lead_type }}</span>
						<div style="clear:both; margin-top:7px"></div>
					
						<label class="text-capitalize font-500 font-14">@lang("msg.Note")</label> : <span class="font-14">{{ $signing->notes }}</span>
					
						<div style="clear:both; margin-top:7px"></div>
						<label class="text-capitalize font-500 font-14">@lang("msg.Communication Method")</label> : <span class="font-14">{{ $tour->moc }}</span>
					</div>						
					@endif
					
				</div>
			
			</div>
		</div>
	<div id="6" class="tab-pane fade">
        <div class="box box-primary arrow_box border-light-blue">
			<div class="box-body padding-top-5" style="height:190px">	
				<?php $movein = DB::table('stage_pipeline')->where([['pipeline_id', $row->id], ['sales_stage', 'MoveIn']])->orderBy('stage_pipeline_id', 'DESC')->first(); ?>
				@if($movein == NULL)
					<h4 class="font-500 text-uppercase font-15">@lang("msg.Move In") <a href="../add_prospect_record/MoveIn/{{ $row->id }}"><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="position:relative; top:-5px">@lang("msg.Add Record")</span></a></h4>
				<div class="form-inline border-top">
					<div class='text-danger' style="padding-top:10px; padding-bottom:7px">@lang("msg.No Records Found")</div> 
				</div>
				@endif
				@if($movein != NULL)
					
				<h4 class="font-500 text-uppercase font-15">Move In @if($movein->status == 1)<span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="position:relative; top:-5px">@lang("msg.Active State")</span> @endif </h4>
				
					<div class="form-inline border-top">
					
					<div style="margin-top:10px"></div>
					
					<label class="text-capitalize font-500 font-14">@lang("msg.Date")</label> : <span class="font-14">{{ $movein->date }}</span>					
					<div style="clear:both; margin-top:7px"></div>
					
					<?php $lead = DB::table('leads')->where('lead_id', $movein->lead_id)->first(); ?>
						<label class="text-capitalize font-500 font-14">@lang("msg.Lead Status")</label> : <span class="font-14">{{ $lead->lead_type }}</span>
						<div style="clear:both; margin-top:7px"></div>
					
						<label class="text-capitalize font-500 font-14">@lang("msg.Note")</label> : <span class="font-14">{{ $movein->notes }}</span>
					
						<div style="clear:both; margin-top:7px"></div>
						<label class="text-capitalize font-500 font-14">@lang("msg.Communication Method")</label> : <span class="font-14">{{ $movein->moc }}</span>
					</div>						
					@endif
					
				</div>
			
			</div>
		</div>
	
  </div>

    @include('layouts.partials.scripts_auth')

@endsection