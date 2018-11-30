
@extends('layouts.app')

@section('htmlheader_title')
    Prospective Add
@endsection

@section('contentheader_title')
    
@endsection

@section('main-content')

<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="js/bootstrap-datepicker.js"></script>
<!-- <div style="margin-bottom:-30px"></div> -->
<div class="row">		
	<div class="col-md-4">
		<div class="box box-primary border-light-blue">
			@if(Session::has('msg'))
				<div class="alert alert-danger">
					<strong>{{ Session::get('msg') }}</strong>
				</div>
			@endif
			<div class="box-body padding-top-5">
				<h4 class="font-500 text-uppercase font-15">Prospect Details</h4>
				
				<form class="form-inline border-top">
					
						<div style="margin-top:10px"></div>
						
						<label class="text-capitalize font-500 font-14">Prospect Name : </label>
						<span class="font-14">{{ $row->pros_name }} </span>
					
					<div style="clear:both; margin-top:7px"></div>
						<label class="text-capitalize font-500 font-14">Phone No : </label>
						<span class="font-14">{{ $details->phone_p }} </span>
					
					<div style="clear:both; margin-top:7px"></div>
						<label class="text-capitalize font-500 font-14">Email : </label>
						<span class="font-14">{{ $details->email_p }} </span>
					
					<div style="clear:both; margin-top:7px"></div>
						<label class="text-capitalize font-500 font-14">Address : </label>
						<span class="font-14">{{ $details->address_p }} </span>
					
					<div style="clear:both; margin-top:7px"></div>
						<label class="text-capitalize font-500 font-14">City : </label>
						<span class="font-14">{{ $details->city_p }} </span>
					
					<div style="clear:both; margin-top:7px"></div>
						<label class="text-capitalize font-500 font-14">State : </label>
						<span class="font-14"> Assam </span>					
					
					<div style="clear:both; margin-top:7px"></div>
						<label class="text-capitalize font-500 font-14">Zip : </label>
						<span class="font-14"> {{ $details->zip_p }} </span>
				<div style="clear:both; margin-top:7px"></div>
				</div>
			</form>
			
		</div>
	</div>
	<div class="col-md-4">
		<div class="box box-primary border-light-blue">
			<div class="box-body padding-top-5">
				<h4 class="font-500 text-uppercase font-15">Contact Details</h4>
				<form class="form-inline border-top">
				<div style="margin-top:10px"></div>
					
						<label class="text-capitalize font-500 font-14">Contact Person : </label>
						<span class="font-14">{{ $details->contact_person }}  </span>
					
					
					<div style="clear:both; margin-top:7px"></div>
						<label class="text-capitalize font-500 font-14">Phone : </label>
						<span class="font-14">{{ $details->phone_c }} </span>
					
					
					<div style="clear:both; margin-top:7px"></div>
						<label class="text-capitalize font-500 font-14">Email : </label>
						<span class="font-14">{{ $details->email_c }} </span>
					
					
					<div style="clear:both; margin-top:7px"></div>
					
						<label class="text-capitalize font-500 font-14">Address : </label>
						<span class="font-14">{{ $details->address_p }} </span>
					
					<div style="clear:both; margin-top:7px"></div>
					
						<label class="text-capitalize font-500 font-14">City : </label>
						<span class="font-14">{{ $details->city_c }} </span>
					
					
					<div style="clear:both; margin-top:7px"></div>
				
						<label class="text-capitalize font-500 font-14">State : </label>
						<span class="font-14">Assam	</span>	 				
					
					
					<div style="clear:both; margin-top:7px"></div>
					
						<label class="text-capitalize font-500 font-14">Zip : </label>
						<span class="font-14">{{ $details->zip_c }} </span>
					
					
				</form>	
			
			</div>
		</div>
		
	</div>
	<div class="col-md-4">
		<div class="box box-primary border-light-blue">
			<div class="box-body padding-top-5" style="height:269px">
				<h4 class="font-500 text-uppercase font-15">Source and Relation</h4>
				
				<form class="form-inline border-top">
				<div style="margin-top:10px"></div>
					
						<label class="text-capitalize font-500 font-14">Relation : </label>
						 <span class="font-14">{{ $details->relation }} </span> 
					
					<div style="clear:both; margin-top:7px"></div>
					
						<label class="text-capitalize font-500 font-14">Source : </label>
						<span class="font-14">{{ $details->source }} </span>
					
					<div style="clear:both; margin-top:7px"></div>
				
						<?php $user = DB::table('users')->where('user_id', $row->user_id)->first(); ?>
						<label class="text-capitalize font-500 font-14">Receptionist : </label>
						<span class="font-14">{{ $user->firstname }} {{ $user->middlename }} {{ $user->lastname}} </span>
					
					<div style="clear:both; margin-top:7px"></div>
					
						<?php $marketing = DB::table('users')->where('user_id', $row->marketing_id)->first(); ?>
						<label class="text-capitalize font-500 font-14">Marketing : </label>
						@if($marketing != NULL)
						<span class="font-14">{{ $marketing->firstname }} {{ $marketing->middlename }} {{ $marketing->lastname}} </span>
						@endif
						@if($marketing == NULL)
							<span class="font-14">No Record Found </span>
						@endif
					
				
				</form>
	
			</div>
			
		</div>
	</div>	
</div>



<div class="row">
<div class="col-md-4">
<div class="box box-primary arrow_box border-light-blue">
			<div class="box-body padding-top-5">			
				<?php $stage = DB::table('stage_pipeline')->where([['pipeline_id', $row->id], ['sales_stage', 'Discovery']])->orderBy('stage_pipeline_id', 'DESC')->first(); ?>
				@if($stage == NULL)
					<h4 class="font-500 text-uppercase font-15">Discovery</h4>
					<div class='text-danger'>No Records found.</div> 
				@endif
				@if($stage != NULL)
				<h4 class="font-500 text-uppercase font-15">Discovery @if($stage->status == 1)<span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="position:relative; top:-5px">Active State</span> @endif </h4> 
			<div class="form-inline border-top">
			<div style="margin-top:10px"></div>
				
					<label class="text-capitalize font-500 font-14">Date</label> : <span class="font-14">{{ $stage->date }}</span>					
				<div style="clear:both; margin-top:7px"></div>
				
				
					<?php $lead = DB::table('leads')->where('lead_id', $stage->lead_id)->first(); ?>
					<label class="text-capitalize font-500 font-14">Lead Statue</label> : <span class="font-14">{{ $lead->lead_type }}</span>
				
					<div style="clear:both; margin-top:7px"></div>
				
					<label class="text-capitalize font-500 font-14">Note</label> : <span class="font-14">{{ $stage->notes }}</span>
					<div style="clear:both; margin-top:7px"></div>
				
					<label class="text-capitalize font-500 font-14">Communication Method</label> : <span class="font-14">{{ $stage->moc }}</span>
				<br/><br/>
				@endif
				</div>
			</div>
		</div>
</div>

<div class="col-md-4">
<div class="box box-primary arrow_box border-light-blue">
			<div class="box-body padding-top-5" style="height:190px">	
				<?php $tour = DB::table('stage_pipeline')->where([['pipeline_id', $row->id], ['sales_stage', 'Tour']])->orderBy('stage_pipeline_id', 'DESC')->first(); ?>
				@if($tour == NULL)
					<h4 class="font-500 text-uppercase font-15">Tour</h4>
				<div class="form-inline border-top">
					<div class='text-danger' style="padding-top:10px; padding-bottom:7px">No Records found.</div> 
				@endif
				@if($tour != NULL)
					
				<h4 class="font-500 text-uppercase font-15">Tour @if($tour->status == 1)<span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="position:relative; top:-5px">Active State</span> @endif </h4>
				
				<div class="form-inline border-top">
				
				<div style="margin-top:10px"></div>
				
					<label class="text-capitalize font-500 font-14">Date</label> : <span class="font-14">{{ $tour->date }}</span>					
				<div style="clear:both; margin-top:7px"></div>
				
					<?php $lead = DB::table('leads')->where('lead_id', $tour->lead_id)->first(); ?>
					<label class="text-capitalize font-500 font-14">Lead Statue</label> : <span class="font-14">{{ $lead->lead_type }}</span>
					<div style="clear:both; margin-top:7px"></div>
				
					<label class="text-capitalize font-500 font-14">Note</label> : <span class="font-14">{{ $tour->notes }}</span>
				
					<div style="clear:both; margin-top:7px"></div>
					<label class="text-capitalize font-500 font-14">Communication Method</label> : <span class="font-14">{{ $tour->moc }}</span>
				
				@endif
			</div>
			</div>
			
		</div>
</div>

<div class="col-md-4">
<div class="box box-primary border-light-blue">
			<div class="box-body padding-top-5" style="height:190px">
				<?php $retour = DB::table('stage_pipeline')->where([['pipeline_id', $row->id], ['sales_stage', 'Re-Tour']])->orderBy('stage_pipeline_id', 'DESC')->first(); ?>
				@if($retour == NULL)
					<h4 class="font-500 text-uppercase font-15">Re-Tour</h4></b>
				<div class="form-inline border-top">
					<div class='text-danger' style="padding-top:10px; padding-bottom:7px">No Records found.</div> 
				@endif
				@if($retour != NULL)
				<h4 class="font-500 text-uppercase font-15">Re-Tour @if($retour->status == 1)<span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="position:relative; top:-5px">Active State</span> @endif </h4>
			
			<div class="form-inline border-top">
				
				<div style="margin-top:10px"></div>
				
				<label class="text-capitalize font-500 font-14">Date</label> : <span class="font-14">{{ $retour->date }}</span>					
				<div style="clear:both; margin-top:7px"></div>
				
					<?php $lead = DB::table('leads')->where('lead_id', $retour->lead_id)->first(); ?>
					<label class="text-capitalize font-500 font-14">Lead Statue</label> : <span class="font-14">{{ $lead->lead_type }}</span>
					
				<div style="clear:both; margin-top:7px"></div>
				
					<label class="text-capitalize font-500 font-14">Note</label> : <span class="font-14">{{ $retour->notes }}</span>
				<div style="clear:both; margin-top:7px"></div>
				
				<label class="text-capitalize font-500 font-14">Communication Method</label> : <span class="font-14">{{ $retour->moc }}</span>
				
				@endif
			</div>
			</div>
			</div>
		</div>
	</div>
	
	<!--<div class="row">
	<div class="col-md-4">
		<div class="box box-primary">
			<div class="box-body padding-top-5">
				<?php $lease = DB::table('stage_pipeline')->where([['pipeline_id', $row->id], ['sales_stage', 'Lease']])->orderBy('stage_pipeline_id', 'DESC')->first(); ?>
				@if($lease == NULL)
					<h4 class="font-500 text-uppercase font-15">Lease Signing</h4>
				<div class="form-inline border-top">
					<div class='text-danger' style="padding-top:20px">No Records found.</div> 
				@endif
				@if($lease != NULL)
				<h4>Lease Signing @if($lease->status == 1)<span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="position:relative; top:-5px">Active State</span> @endif </h4>
				<label class="text-capitalize font-500 font-14">Date</label> : <td>{{ $lease->date }}</span>					
				<div style="clear:both; margin-top:12px"></div>
				
					<?php $lead = DB::table('leads')->where('lead_id', $lease->lead_id)->first(); ?>
					<label class="text-capitalize font-500 font-14">Lead Statue</label> : <span class="font-14">{{ $lease->lead_type }}</span>
				<div style="clear:both; margin-top:12px"></div>
					<label class="text-capitalize font-500 font-14">Note</label> : <span class="font-14">{{ $lease->notes }}</span>
				<div style="clear:both; margin-top:12px"></div>
					<label class="text-capitalize font-500 font-14">Communication Method</label> : <span class="font-14">{{ $lease->moc }}</span>
				
				@endif
			</div>
			</div>
		</div>
	</div>
</div> -->

<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script src="js/jquery.form-validator.min.js" type="text/javascript"></script>
	<script>
        $.validate({
        });
    </script>
    @include('layouts.partials.scripts_auth')

@endsection
