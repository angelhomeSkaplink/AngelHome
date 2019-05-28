@extends('layouts.app')

@section('htmlheader_title')
    @lang("msg.Resident Add")
@endsection

@section('contentheader_title')
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Future Resident Details</strong></h3>
	</div>
	<div class="col-lg-4">
		<a href="../sales_stage_pipeline" class="btn btn-success btn-block btn-flat btn-width btn-sm pull-right" style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back</a>
	</div>
</div>   
@endsection

@section('main-content')

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
				@php
					$n=explode(",",$row->pros_name);
					$m=explode(",",$details->contact_person);
				@endphp
				<div class="form-inline border-top">
					
						<div style="margin-top:10px"></div>
						
						<label class="text-capitalize font-500 font-14">@lang("msg.Future Resident Name") : </label>
						<span class="font-14">{{ $n[0] }} {{ $n[1] }} {{ $n[2] }}</span>
					
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
			</div>
			
		</div>
	</div>
	<div class="col-md-4">
		<div class="box box-primary border-light-blue">
			<div class="box-body padding-top-5">
				<h4 class="font-500 text-uppercase font-15">@lang("msg.Contact Details")</h4>
				<form class="form-inline border-top">
				<div style="margin-top:10px"></div>
					
						<label class="text-capitalize font-500 font-14">@lang("msg.Contact Person") : </label>
						<span class="font-14">{{ $m[0] }} {{ $m[1] }} {{ $m[2] }}</span>
					
					
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
		<li class=""><a href="#4" data-toggle="tab" aria-expanded="false" style="height:77px !important;"><span class="nmbr"></span><span class="text">@lang("msg.Screening")/<br>@lang("Assessment")</span></a></li>
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
			<div class="box-body padding-top-5" style="height:240px">	
				<?php $tour = DB::table('stage_pipeline')->where([['pipeline_id', $row->id], ['sales_stage', 'Tour']])->orderBy('stage_pipeline_id', 'DESC')->first(); ?>
				@if($tour == NULL)
					<h4 class="font-500 text-uppercase font-15">@lang("msg.Tour") <a href="../add_prospect_record/Tour/{{ $row->id }}"><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="position:relative; top:-5px">@lang("msg.Add Record")</span></a></h4>
				    <div class="form-inline border-top">
					<div class='text-danger' style="padding-top:10px; padding-bottom:7px">@lang("msg.No Records Found")</div> 
				    </div>
				@endif
				@if($tour != NULL)
						<?php $appointment = DB::table('appointment')->where([['pros_id', $tour->pipeline_id], ['status', 1]])->first(); ?>
				        <h4 class="font-500 text-uppercase font-15">Tour @if($tour->status == 1)<span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="position:relative; top:-5px">@lang("msg.Active State")</span> @endif </h4>
				
					<div class="form-inline border-top">
					
					<div style="margin-top:10px"></div>
					
					<label class="text-capitalize font-500 font-14">@lang("msg.Date")</label> : <span class="font-14">{{ $tour->date }}</span>					
					<div style="clear:both; margin-top:7px"></div>
					
					<?php $lead = DB::table('leads')->where('lead_id', $tour->lead_id)->first(); ?>
					<label class="text-capitalize font-500 font-14">Tour Date</label> : <span class="font-14">{{ $appointment->appointment_date }}</span>
					<div style="clear:both; margin-top:7px"></div>
					<label class="text-capitalize font-500 font-14">Tour Time</label> : <span class="font-14">{{ $appointment->appointment_time }}</span>
					<div style="clear:both; margin-top:7px"></div>
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
			<div class="box-body padding-top-5" style="height:240px">	
				<?php $retour = DB::table('stage_pipeline')->where([['pipeline_id', $row->id], ['sales_stage', 'Re-Tour']])->orderBy('stage_pipeline_id', 'DESC')->first(); ?>
				@if($retour == NULL)
				<?php $appointment = DB::table('appointment')->where([['pros_id', $row->id], ['status', 1]])->first(); ?>
					@if($appointment)
						<h4 class="font-500 text-uppercase font-15">@lang("msg.Re-Tour") <a href="../add_prospect_record/Re-Tour/{{ $row->id }}"><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="position:relative; top:-5px">@lang("msg.Add Record")</span></a></h4>
						<div class="form-inline border-top">
						<div class='text-danger' style="padding-top:10px; padding-bottom:7px">@lang("msg.No Records Found") </div> 
						</div>
					@else
					<h4 class="font-500 text-uppercase font-15">@lang("msg.Re-Tour")
					</h4>
					<div class="form-inline border-top">
					<div class='text-danger' style="padding-top:10px; padding-bottom:7px">First Take a Tour! </div> 
					</div>
					@endif
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
				@php 
                $screening = DB::table('screening')->where('pros_id',$row->id)->first();
		        @endphp
        		@if($screening)
        			@if($screening->all_scr==1)
                        @php
                            $sl_no = DB::table('assessment_entry')->where('sl no',0)->first();
                            $assessment = DB::table('resident_assessment')->where([['pros_id',$row->id],['assessment_id',$sl_no->assessment_id]])->first();
                        @endphp
                        @if($assessment)
        					<h4 class="font-500 text-uppercase font-15">@lang("msg.Screening/Assessment")
        						<!--<a href="../add_prospect_record/MoveIn/{{ $row->id }}"><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="position:relative; top:-5px">@lang("msg.Add Record")</span></a>-->
        					</h4>
                            <div class="form-inline border-top">
                                <div class='text' style="padding-top:10px; padding-bottom:7px">All Required Screening and Main Assessment is done.</div> 
                            </div>			
        				@else 
        					<h4 class="font-500 text-uppercase font-15">@lang("msg.Screening/Assessment")
        					</h4>
							<div class="form-inline border-top">
								<div class='text-danger' style="padding-top:10px; padding-bottom:7px">All Required Screening is DONE! Kindly Complete Main Assessment! </div> 
								<a href="../select_assessments/Initial/{{ $row->id }}"><span class="button label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400" style="">Main Assessment</a>
								<a href="../screening_view/{{ $row->id }}"><span class="button label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400" style="">View Screening</a>
							</div>
                        @endif
                    @else
                        @php
                            $sl_no = DB::table('assessment_entry')->where('sl no',0)->first();
                            $assessment = DB::table('resident_assessment')->where([['pros_id',$row->id],['assessment_id',$sl_no->assessment_id]])->first();
                        @endphp
                        @if($assessment)
            				<h4 class="font-500 text-uppercase font-15">@lang("msg.Screening/Assessment")
            				</h4>
                            <div class="form-inline border-top">
								<div class='text-danger' style="padding-top:10px; padding-bottom:7px">Kindly Complete All Screening!</div>
								<a href="../resposible_personal/{{ $row->id }}"><span class="button label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400" style="">Screening</span></a>
            				</div>
        				@else
            				<h4 class="font-500 text-uppercase font-15">@lang("msg.Screening/Assessment")</h4>
            				<div class="form-inline border-top">
            					<div class='text-danger' style="padding-top:10px; padding-bottom:7px">Kindly Complete All Screening and Assessment</div>
            					<a href="../select_assessments/Initial/{{ $row->id }}"><span class="button label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400" style="">Main Assessment</a>
		        				<a href="../resposible_personal/{{ $row->id }}"><span class="button label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400" style="">Screening</span></a>
            				</div>
            			@endif
        			@endif
        	    @else
        			<h4 class="font-500 text-uppercase font-15">@lang("msg.Screening/Assessment")
        			</h4>
                    <div class="form-inline border-top">
        				<div class='text-danger' style="padding-top:10px; padding-bottom:7px">Kindly Complete Screening and Main Assessment First!</div>
        				<a href="../select_assessments/Initial/{{ $row->id }}"><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 " style="">Main Assessment</a>
        				<a href="../resposible_personal/{{ $row->id }}"><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 " style="">Screening</span></a>
                    </div>
                @endif			
			</div>
		</div>
    </div>
	<div id="5" class="tab-pane fade">
        <div class="box box-primary arrow_box border-light-blue">
			<div class="box-body padding-top-5" style="height:320px">	
				<?php $signing = DB::table('stage_pipeline')->where([['pipeline_id', $row->id], ['sales_stage', "Lease-Signing"]])->orderBy('stage_pipeline_id', 'DESC')->first(); ?>
				@if($signing == NULL)
				<h4 class="font-500 text-uppercase font-15">@lang("msg.Lease Signing")</h4>
				<div class="form-inline border-top">
					<form action="{{ action('ProspectiveController@new_records_pros_add') }}" method="post" enctype="multipart/form-data">
						<input type="hidden" name="_method" value="PATCH">
						{{ csrf_field() }}
						<input type="hidden" class="form-control" value="Lease-Signing" name="sales_stage" id="sales_stage" readonly />
						<input type="hidden" class="form-control" value="{{ $row->id }}" name="pipeline_id" id="pipeline_id" readonly />
						<div class="col-md-12">
							<div class="box box-primary">				
								<div class="box-body padding-bottom-15">
									<div class="row">
										<div class="col-md-6">
											<input type="hidden" class="form-control" name="pros_id" value="{{ $row->id }}" />
											<input type="hidden" name ="lead_id" value="Lease-Signing"/>
											@php
												$documents = DB::table('documents')
												->where([['doc_type',"lease_signing"],['facility_id',Auth::user()->facility_id],['status',1]])->get();
											@endphp
											<div class="form-group has-feedback">
												<label>Document Name</label>
												<select class="form-control" name="doc_name" id="">
													@foreach ($documents as $item)
														<option class="form-control" value="{{ $item->doc_name }}">{{ $item->doc_name }}</option>
													@endforeach
												</select>
											</div>
											<div class="form-group has-feedback">
												<label>Upload the document here</label>
												<input id="file" type="file" class="form-control" name="doc_file" accept="image/*,.doc, .docx,.pdf,.odf,.odt" size="5MB" required/>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group has-feedback">
												<p style=""><strong>Supported file types:<span style="color:#bfbfbf"> .jpeg, .jpg, .png, .gif, .tiff, .bmp, .doc, .docx, .pdf, .odf, .odt </span></strong></p>
												<p style=""><strong>Max-Size:<span style="color:#bfbfbf"> 5MB </span></strong></p>
											</div>
											<div class="form-group has-feedback">
												<a href="{{  url('sales_stage_pipeline') }}" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right:15px">@lang("msg.Cancel")</a>
											</div>
											<div class="form-group has-feedback">
												<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">@lang("msg.Submit")</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
				@endif
				@if($signing != NULL)
					
				<h4 class="font-500 text-uppercase font-15">Lease Signing @if($signing->status == 1)<span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="position:relative; top:-5px">@lang("msg.Active State")</span> @endif </h4>
				<div class="form-inline border-top">
					<div class='font-500 text-uppercase font-15' style="padding-top:10px; padding-bottom:7px">Lease Document Uploaded!</div>
				</div>		
				@endif
					
				</div>
			
			</div>
		</div>
	<div id="6" class="tab-pane fade">
        <div class="box box-primary arrow_box border-light-blue">
			<div class="box-body padding-top-5" style="height:190px">
				@php
                $stage = DB::table('sales_pipeline')->where([['id', $row->id], ['stage', 'MoveIn']])->first();
                @endphp
        @if($stage == NULL)
        @php 
			$screening = DB::table('screening')->where('pros_id',$row->id)->first();
			$sl_no = DB::table('assessment_entry')->where('sl no',0)->first();
			$assessment = DB::table('resident_assessment')->where([['pros_id',$row->id],['assessment_id',$sl_no->assessment_id]])->first();
		@endphp				
		@if($screening)
			@if($screening->all_scr==1)
				@php
					$check_room = DB::table('resident_room')->where([['pros_id', $row->id],['status',1]])->first();
                @endphp
				@if($assessment)
					@if($check_room==null)
						<h4 class="font-500 text-uppercase font-15">@lang("msg.Move In")	
							<a href="../add_prospect_record/MoveIn/{{ $row->id }}"><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="position:relative; top:-5px">@lang("msg.Add Record")</span></a>
							<a href="../change_own_room/{{ $row->id }}"><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="position:relative; top:-5px">Book Room</span></a>
						</h4>
						<div class="form-inline border-top">
							<div class='text-danger' style="padding-top:10px; padding-bottom:7px">Book A Room!</div> 
						</div>
					@else
						<h4 class="font-500 text-uppercase font-15">@lang("msg.Move In")
							<a href="../add_prospect_record/MoveIn/{{ $row->id }}"><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="position:relative; top:-5px">@lang("msg.Add Record")</span></a>
							<a class="btn btn-primary" href="{{ url('bundle_print/'.$row->id) }}" style="margin-left:50px;">Bundle Print Preview</a>
						</h4>
						<div class="form-inline border-top">
							<label for="">Move In Date</label>
							<input type="date" name="moveinDate" class="form-control">
							{{-- <div class='text-danger' style="padding-top:10px; padding-bottom:7px">Add Details by Clicking on Add Record</div>  --}}
						</div>
					@endif
								
				@else 
					<h4 class="font-500 text-uppercase font-15">@lang("msg.Move In")
						<a href="../preadmin_select_assessments/{{ $row->id }}"><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="position:relative; top:-5px">Main Assessment</span></a>
					</h4>
                        <div class="form-inline border-top">
							<div class='text-danger' style="padding-top:10px; padding-bottom:7px">Kindly Complete Main Assessment Now!</div> 
                        </div>
                @endif
            @else 
				@if($assessment)
					<h4 class="font-500 text-uppercase font-15">@lang("msg.Move In")
						<a href="../resposible_personal/{{ $row->id }}"><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="position:relative; top:-5px">Screening</span></a>
					</h4>
					<div class="form-inline border-top">
						<div class='text-danger' style="padding-top:10px; padding-bottom:7px">Kindly Complete All Screening!</div>
					</div>
				@else
					<h4 class="font-500 text-uppercase font-15">@lang("msg.Move In")
						<a href="../preadmin_select_assessments/{{ $row->id }}"><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 " style="margin-left: 5px; position:relative; top:-5px">Main Assessment</a>
						<a href="../resposible_personal/{{ $row->id }}"><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 " style="position:relative; top:-5px">Screening</span></a>
					</h4>
					<div class="form-inline border-top">
						<div class='text-danger' style="padding-top:10px; padding-bottom:7px">Kindly Complete All Screening and Main Assessment!</div>
					</div>
				@endif
			@endif
	    @else
			<h4 class="font-500 text-uppercase font-15">@lang("msg.Move In")
				<a href="../preadmin_select_assessments/{{ $row->id }}"><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400" style="margin-left: 5px; position:relative; top:-5px">Main Assessment</a>
				<a href="../resposible_personal/{{ $row->id }}"><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400" style="position:relative; top:-5px">Screening</span></a>
			</h4>
            <div class="form-inline border-top">
				<div class='text-danger' style="padding-top:10px; padding-bottom:7px">Kindly Complete Screening and Main Assessment First!</div>
            </div>
        @endif

		@else
		@php $movein = DB::table('stage_pipeline')->where([['pipeline_id', $row->id], ['sales_stage', 'MoveIn']])->orderBy('stage_pipeline_id', 'DESC')->first(); @endphp
					
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