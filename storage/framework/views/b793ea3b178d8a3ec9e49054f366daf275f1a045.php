<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo app('translator')->get("msg.Resident Add"); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<style>	
	.content-header
	{
		display:none;
	}	
</style>

<div class="row">
	<div class="col-md-4">
		<div class="box box-primary border-light-blue">
			<?php if(Session::has('msg')): ?>
				<div class="alert alert-danger">
					<strong><?php echo e(Session::get('msg')); ?></strong>
				</div>
			<?php endif; ?>
			<div class="box-body padding-top-5">
				<h4 class="font-500 text-uppercase font-15"><?php echo app('translator')->get("msg.Future Resident Details"); ?></h4>
				
				<form class="form-inline border-top">
					
						<div style="margin-top:10px"></div>
						
						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Future Resident Name"); ?> : </label>
						<span class="font-14"><?php echo e($row->pros_name); ?> </span>
					
					<div style="clear:both; margin-top:7px"></div>
						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Phone No"); ?> : </label>
						<span class="font-14"><?php echo e($details->phone_p); ?> </span>
					
					<div style="clear:both; margin-top:7px"></div>
						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Email"); ?> : </label>
						<span class="font-14"><?php echo e($details->email_p); ?> </span>
					
					<div style="clear:both; margin-top:7px"></div>
						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Address"); ?> : </label>
						<span class="font-14"><?php echo e($details->address_p); ?> </span>
					
					<div style="clear:both; margin-top:7px"></div>
						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.City"); ?> : </label>
						<span class="font-14"><?php echo e($details->city_p); ?> </span>
					
					<div style="clear:both; margin-top:7px"></div>
						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.State"); ?> : </label>
						<span class="font-14"> Assam </span>					
					
					<div style="clear:both; margin-top:7px"></div>
						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Zip"); ?> : </label>
						<span class="font-14"> <?php echo e($details->zip_p); ?> </span>
				<div style="clear:both; margin-top:7px"></div>
				</div>
			</form>
			
		</div>
	</div>
	<div class="col-md-4">
		<div class="box box-primary border-light-blue">
			<div class="box-body padding-top-5">
				<h4 class="font-500 text-uppercase font-15"><?php echo app('translator')->get("msg.Contact Details"); ?></h4>
				<form class="form-inline border-top">
				<div style="margin-top:10px"></div>
					
						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Contact Person"); ?> : </label>
						<span class="font-14"><?php echo e($details->contact_person); ?>  </span>
					
					
					<div style="clear:both; margin-top:7px"></div>
						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Phone"); ?> : </label>
						<span class="font-14"><?php echo e($details->phone_c); ?> </span>
					
					
					<div style="clear:both; margin-top:7px"></div>
						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Email"); ?> : </label>
						<span class="font-14"><?php echo e($details->email_c); ?> </span>
					
					
					<div style="clear:both; margin-top:7px"></div>
					
						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Address"); ?> : </label>
						<span class="font-14"><?php echo e($details->address_p); ?> </span>
					
					<div style="clear:both; margin-top:7px"></div>
					
						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.City"); ?> : </label>
						<span class="font-14"><?php echo e($details->city_c); ?> </span>
					
					
					<div style="clear:both; margin-top:7px"></div>
				
						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.State"); ?> : </label>
						<span class="font-14">Assam	</span>	 				
					
					
					<div style="clear:both; margin-top:7px"></div>
					
						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Zip"); ?> : </label>
						<span class="font-14"><?php echo e($details->zip_c); ?> </span>				
					
				</form>	
			
			</div>
		</div>
		
	</div>
	<div class="col-md-4">
		<div class="box box-primary border-light-blue">
			<div class="box-body padding-top-5" style="height:269px">
				<h4 class="font-500 text-uppercase font-15"><?php echo app('translator')->get("msg.Source And Relation"); ?></h4>
				
				<form class="form-inline border-top">
				<div style="margin-top:10px"></div>
					
						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Relation"); ?> : </label>
						 <span class="font-14"><?php echo e($details->relation); ?> </span> 
					
					<div style="clear:both; margin-top:7px"></div>
					
						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Source"); ?> : </label>
						<span class="font-14"><?php echo e($details->source); ?> </span>
					
					<div style="clear:both; margin-top:7px"></div>
				
						<?php $user = DB::table('users')->where('user_id', $row->user_id)->first(); ?>
						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Receptionist"); ?> : </label>
						<span class="font-14"><?php echo e($user->firstname); ?> <?php echo e($user->middlename); ?> <?php echo e($user->lastname); ?> </span>
					
					<div style="clear:both; margin-top:7px"></div>
					
						<?php $marketing = DB::table('users')->where('user_id', $row->marketing_id)->first(); ?>
						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Marketing"); ?> : </label>
						<?php if($marketing != NULL): ?>
						<span class="font-14"><?php echo e($marketing->firstname); ?> <?php echo e($marketing->middlename); ?> <?php echo e($marketing->lastname); ?> </span>
						<?php endif; ?>
						<?php if($marketing == NULL): ?>
							<span class="font-14"><?php echo app('translator')->get("msg.No Record Found"); ?> </span>
						<?php endif; ?>
					
				
				</form>
	
			</div>
			
		</div>
	</div>	
</div>


<div class="tabbable">
	<ul class="nav nav-tabs wizard">
		<li class="active"><a href="#1" data-toggle="tab" aria-expanded="false"><span class="nmbr"></span><span class="text"><?php echo app('translator')->get("msg.Discovery"); ?></span></a></li>
		<li class=""><a href="#2" data-toggle="tab" aria-expanded="false"><span class="nmbr"></span><span class="text"><?php echo app('translator')->get("msg.Tour"); ?></span></a></li>
		<li class=""><a href="#3" data-toggle="tab" aria-expanded="false"><span class="nmbr"></span><span class="text"><?php echo app('translator')->get("msg.Re-Tour"); ?></span></a></li>
		<li class=""><a href="#4" data-toggle="tab" aria-expanded="false"><span class="nmbr"></span><span class="text"><?php echo app('translator')->get("msg.Screening/Assessment"); ?></span></a></li>
		<li class=""><a href="#5" data-toggle="tab" aria-expanded="true"><span class="nmbr"></span><span class="text"><?php echo app('translator')->get("msg.Lease Signing"); ?></span></a></li>
		<li class=""><a href="#6" data-toggle="tab" aria-expanded="true"><span class="nmbr"></span><span class="text"><?php echo app('translator')->get("msg.Move In"); ?></span></a></li>
	 </ul>
 </div> 
 

  <div class="tab-content">
  
    <div id="1" class="tab-pane fade in active">
      <div class="box box-primary">
			<div class="box-body padding-top-5" style="height:190px">			
				<?php $stage = DB::table('stage_pipeline')->where([['pipeline_id', $row->id], ['sales_stage', 'Discovery']])->orderBy('stage_pipeline_id', 'DESC')->first(); ?>
				<?php if($stage == NULL): ?>
					<h4 class="font-500 text-uppercase font-15"><?php echo app('translator')->get("msg.Discovery"); ?> <a href="../add_prospect_record/Discovery/<?php echo e($row->id); ?>"><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="position:relative; top:-5px">ADD RECORD</span></a></h4>
					<div class='text-danger'><?php echo app('translator')->get("msg.No Records Found"); ?></div> 
				<?php endif; ?>
				<?php if($stage != NULL): ?>
				<h4 class="font-500 text-uppercase font-15">Discovery <?php if($stage->status == 1): ?><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="position:relative; top:-5px">Active State</span> <?php endif; ?> </h4> 
				<div class="form-inline border-top">
				<div style="margin-top:10px"></div>
				
					<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Date"); ?></label> : <span class="font-14"><?php echo e($stage->date); ?></span>					
				<div style="clear:both; margin-top:7px"></div>
				
				
					<?php $lead = DB::table('leads')->where('lead_id', $stage->lead_id)->first(); ?>
					<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Lead Status"); ?></label> : <span class="font-14"><?php echo e($lead->lead_type); ?></span>
				
					<div style="clear:both; margin-top:7px"></div>
				
					<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Note"); ?></label> : <span class="font-14"><?php echo e($stage->notes); ?></span>
					<div style="clear:both; margin-top:7px"></div>
				
					<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Communication Method"); ?></label> : <span class="font-14"><?php echo e($stage->moc); ?></span>
				<br/><br/>
				</div>
				<?php endif; ?>				
			</div>
		</div>
    </div>
	
    <div id="2" class="tab-pane fade">
        <div class="box box-primary arrow_box border-light-blue">
			<div class="box-body padding-top-5" style="height:240px">	
				<?php $tour = DB::table('stage_pipeline')->where([['pipeline_id', $row->id], ['sales_stage', 'Tour']])->orderBy('stage_pipeline_id', 'DESC')->first(); ?>
				<?php if($tour == NULL): ?>
					<h4 class="font-500 text-uppercase font-15"><?php echo app('translator')->get("msg.Tour"); ?> <a href="../add_prospect_record/Tour/<?php echo e($row->id); ?>"><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="position:relative; top:-5px"><?php echo app('translator')->get("msg.Add Record"); ?></span></a></h4>
				    <div class="form-inline border-top">
					<div class='text-danger' style="padding-top:10px; padding-bottom:7px"><?php echo app('translator')->get("msg.No Records Found"); ?></div> 
				    </div>
				<?php endif; ?>
				<?php if($tour != NULL): ?>
						<?php $appointment = DB::table('appointment')->where([['pros_id', $tour->pipeline_id], ['status', 1]])->first(); ?>
				        <h4 class="font-500 text-uppercase font-15">Tour <?php if($tour->status == 1): ?><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="position:relative; top:-5px"><?php echo app('translator')->get("msg.Active State"); ?></span> <?php endif; ?> </h4>
				
					<div class="form-inline border-top">
					
					<div style="margin-top:10px"></div>
					
					<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Date"); ?></label> : <span class="font-14"><?php echo e($tour->date); ?></span>					
					<div style="clear:both; margin-top:7px"></div>
					
					<?php $lead = DB::table('leads')->where('lead_id', $tour->lead_id)->first(); ?>
					<label class="text-capitalize font-500 font-14">Tour Date</label> : <span class="font-14"><?php echo e($appointment->appointment_date); ?></span>
					<div style="clear:both; margin-top:7px"></div>
					<label class="text-capitalize font-500 font-14">Tour Time</label> : <span class="font-14"><?php echo e($appointment->appointment_time); ?></span>
					<div style="clear:both; margin-top:7px"></div>
					<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Lead Status"); ?></label> : <span class="font-14"><?php echo e($lead->lead_type); ?></span>
					<div style="clear:both; margin-top:7px"></div>
					<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Note"); ?></label> : <span class="font-14"><?php echo e($tour->notes); ?></span>
					<div style="clear:both; margin-top:7px"></div>
					<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Communication Method"); ?></label> : <span class="font-14"><?php echo e($tour->moc); ?></span>
					</div>						
					<?php endif; ?>
					
				</div>
			
			</div>
		</div>
  
	
    <div id="3" class="tab-pane fade">
        <div class="box box-primary arrow_box border-light-blue">
			<div class="box-body padding-top-5" style="height:240px">	
				<?php $retour = DB::table('stage_pipeline')->where([['pipeline_id', $row->id], ['sales_stage', 'Re-Tour']])->orderBy('stage_pipeline_id', 'DESC')->first(); ?>
				<?php if($retour == NULL): ?>
				<?php $appointment = DB::table('appointment')->where([['pros_id', $row->id], ['status', 1]])->first(); ?>
					<?php if($appointment): ?>
						<h4 class="font-500 text-uppercase font-15"><?php echo app('translator')->get("msg.Re-Tour"); ?> <a href="../add_prospect_record/Re-Tour/<?php echo e($row->id); ?>"><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="position:relative; top:-5px"><?php echo app('translator')->get("msg.Add Record"); ?></span></a></h4>
						<div class="form-inline border-top">
						<div class='text-danger' style="padding-top:10px; padding-bottom:7px"><?php echo app('translator')->get("msg.No Records Found"); ?> </div> 
						</div>
					<?php else: ?>
					<h4 class="font-500 text-uppercase font-15"><?php echo app('translator')->get("msg.Re-Tour"); ?>
					</h4>
					<div class="form-inline border-top">
					<div class='text-danger' style="padding-top:10px; padding-bottom:7px">First Take a Tour! </div> 
					</div>
					<?php endif; ?>
				<?php endif; ?>
				<?php if($retour != NULL): ?>
					
					<h4 class="font-500 text-uppercase font-15">Re-Tour <?php if($retour->status == 1): ?>
					<span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="position:relative; top:-5px"><?php echo app('translator')->get("msg.Active State"); ?></span> <?php endif; ?> </h4>
				
					<div class="form-inline border-top">
					
					<div style="margin-top:10px"></div>
					
					<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Date"); ?></label> : <span class="font-14"><?php echo e($retour->date); ?></span>					
					<div style="clear:both; margin-top:7px"></div>
					
					<?php $lead = DB::table('leads')->where('lead_id', $retour->lead_id)->first(); ?>
						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Lead Status"); ?></label> : <span class="font-14"><?php echo e($lead->lead_type); ?></span>
						<div style="clear:both; margin-top:7px"></div>
					
						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Note"); ?></label> : <span class="font-14"><?php echo e($retour->notes); ?></span>
					
						<div style="clear:both; margin-top:7px"></div>
						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Communication Method"); ?></label> : <span class="font-14"><?php echo e($retour->moc); ?></span>	
					</div>						
					<?php endif; ?>
					
				</div>
			
			</div>
	</div>
    
	<div id="4" class="tab-pane fade">
        <div class="box box-primary">
			<div class="box-body padding-top-5" style="height:190px">			
				<?php  
                $screening = DB::table('screening')->where('pros_id',$row->id)->first();
		         ?>
        		<?php if($screening): ?>
        			<?php if($screening->all_scr==1): ?>
                        <?php 
                            $sl_no = DB::table('assessment_entry')->where('sl no',0)->first();
                            $assessment = DB::table('resident_assessment')->where([['pros_id',$row->id],['assessment_id',$sl_no->assessment_id]])->first();
                         ?>
                        <?php if($assessment): ?>
        					<h4 class="font-500 text-uppercase font-15"><?php echo app('translator')->get("msg.Screening/Assessment"); ?>
        						<!--<a href="../add_prospect_record/MoveIn/<?php echo e($row->id); ?>"><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="position:relative; top:-5px"><?php echo app('translator')->get("msg.Add Record"); ?></span></a>-->
        					</h4>
                            <div class="form-inline border-top">
                                <div class='text' style="padding-top:10px; padding-bottom:7px">All Required Screening and Main Assessment is done.</div> 
                            </div>			
        				<?php else: ?> 
        					<h4 class="font-500 text-uppercase font-15"><?php echo app('translator')->get("msg.Screening/Assessment"); ?>
        						<!--<a href="../preadmin_select_assessments/<?php echo e($row->id); ?>"><span class="button label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400" style="">Preadmission Assessment</span></a>-->
        					</h4>
                                <div class="form-inline border-top">
        							<div class='text-danger' style="padding-top:10px; padding-bottom:7px">Kindly Complete Main Assessment! </div> 
			        				<a href="../preadmin_select_assessments/<?php echo e($row->id); ?>"><span class="button label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400" style="">Main Assessment</a>
                                </div>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php 
                            $sl_no = DB::table('assessment_entry')->where('sl no',0)->first();
                            $assessment = DB::table('resident_assessment')->where([['pros_id',$row->id],['assessment_id',$sl_no->assessment_id]])->first();
                         ?>
                        <?php if($assessment): ?>
            				<h4 class="font-500 text-uppercase font-15"><?php echo app('translator')->get("msg.Screening/Assessment"); ?>
            					<!--<a href="../resposible_personal/<?php echo e($row->id); ?>"><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="position:relative; top:-5px">Screening</span></a>-->
            				</h4>
                            <div class="form-inline border-top">
            					<div class='text-danger' style="padding-top:10px; padding-bottom:7px">Kindly Complete All Screening!</div>
			        				<a href="../resposible_personal/<?php echo e($row->id); ?>"><span class="button label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400" style="">Screening</span></a>
            				</div>
        				<?php else: ?>
            				<h4 class="font-500 text-uppercase font-15"><?php echo app('translator')->get("msg.Screening/Assessment"); ?></h4>
            				<div class="form-inline border-top">
            					<div class='text-danger' style="padding-top:10px; padding-bottom:7px">Kindly Complete All Screening and Assessment</div>
            					<a href="../preadmin_select_assessments/<?php echo e($row->id); ?>"><span class="button label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400" style="">Main Assessment</a>
		        				<a href="../resposible_personal/<?php echo e($row->id); ?>"><span class="button label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400" style="">Screening</span></a>
            				</div>
            			<?php endif; ?>
        			<?php endif; ?>
        	    <?php else: ?>
        			<h4 class="font-500 text-uppercase font-15"><?php echo app('translator')->get("msg.Screening/Assessment"); ?>
        			</h4>
                    <div class="form-inline border-top">
        				<div class='text-danger' style="padding-top:10px; padding-bottom:7px">Kindly Complete Screening and Main Assessment First!</div>
        				<a href="../preadmin_select_assessments/<?php echo e($row->id); ?>"><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 " style="">Main Assessment</a>
        				<a href="../resposible_personal/<?php echo e($row->id); ?>"><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 " style="">Screening</span></a>
                    </div>
                <?php endif; ?>			
			</div>
		</div>
    </div>
	<div id="5" class="tab-pane fade">
        <div class="box box-primary arrow_box border-light-blue">
			<div class="box-body padding-top-5" style="height:320px">	
				<?php $signing = DB::table('stage_pipeline')->where([['pipeline_id', $row->id], ['sales_stage', "Lease-Signing"]])->orderBy('stage_pipeline_id', 'DESC')->first(); ?>
				<?php if($signing == NULL): ?>
				<h4 class="font-500 text-uppercase font-15"><?php echo app('translator')->get("msg.Lease Signing"); ?></h4>
				<div class="form-inline border-top">
					<div class="row">
						<form action="<?php echo e(action('ProspectiveController@new_records_pros_add')); ?>" method="post" enctype="multipart/form-data">
							<input type="hidden" name="_method" value="PATCH">
							<?php echo e(csrf_field()); ?>

							<input type="hidden" class="form-control" value="Lease-Signing" name="sales_stage" id="sales_stage" readonly />
							<input type="hidden" class="form-control" value="<?php echo e($row->id); ?>" name="pipeline_id" id="pipeline_id" readonly />
							<div class="col-md-8 col-md-offset-2">
								<div class="box box-primary">				
									<div class="box-body padding-bottom-15">
										<div class="row">
												<div class="col-lg-6">
												<input type="hidden" class="form-control" name="pros_id" value="<?php echo e($row->id); ?>" />
												<div class="form-group has-feedback">
														<label>Lead Type </label>
														<select name="lead_id" id="lead_id" class="form-control" required >							
															<option value="">Select Lead Type</option>
															<?php $__currentLoopData = $leads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lead): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
																<option value="<?php echo e($lead->lead_id); ?>"><?php echo e($lead->lead_type); ?></option>
															<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>							
														</select>
													</div>
												<div class="form-group has-feedback">
													<input type="text" class="form-control" name="doc_name" maxlength="100" placeholder="Document name" required/>
												</div>
												<div class="form-group has-feedback">
												<?php echo app('translator')->get("msg.Upload the document here"); ?>
												<input id="file" type="file" class="form-control" name="doc_file" accept="image/*,.doc, .docx,.pdf,.odf,.odt" size="2MB" required/>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group has-feedback">
													<p style=""><strong>Supported file types:<span style="color:#bfbfbf"> .jpeg, .jpg, .png, .gif, .tiff, .bmp, .doc, .docx, .pdf, .odf, .odt </span></strong></p>
													<p style=""><strong>Max-Size:<span style="color:#bfbfbf"> 5MB </span></strong></p>
												</div>
												<div class="form-group has-feedback">
													<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm"><?php echo app('translator')->get("msg.Submit"); ?></button>
												</div>
												<div class="form-group has-feedback">
													<a href="<?php echo e(url('screening')); ?>" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right:15px"><?php echo app('translator')->get("msg.Cancel"); ?></a>
												</div>
											</div>
										</div>
										   
												
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<?php endif; ?>
				<?php if($signing != NULL): ?>
					
				<h4 class="font-500 text-uppercase font-15">Lease Signing <?php if($signing->status == 1): ?><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="position:relative; top:-5px"><?php echo app('translator')->get("msg.Active State"); ?></span> <?php endif; ?> </h4>
				<div class="form-inline border-top">
					<div class='font-500 text-uppercase font-15' style="padding-top:10px; padding-bottom:7px">Lease Document Uploaded!</div>
				</div>		
				<?php endif; ?>
					
				</div>
			
			</div>
		</div>
	<div id="6" class="tab-pane fade">
        <div class="box box-primary arrow_box border-light-blue">
			<div class="box-body padding-top-5" style="height:190px">
				<?php 
                $stage = DB::table('sales_pipeline')->where([['id', $row->id], ['stage', 'MoveIn']])->first();
                 ?>
        <?php if($stage == NULL): ?>
        <?php  
            $screening = DB::table('screening')->where('pros_id',$row->id)->first();
		 ?>				
		<?php if($screening): ?>
			<?php if($screening->all_scr==1): ?>
                <?php 
                    $sl_no = DB::table('assessment_entry')->where('sl no',0)->first();
                    $assessment = DB::table('resident_assessment')->where([['pros_id',$row->id],['assessment_id',$sl_no->assessment_id]])->first();
                 ?>
                <?php if($assessment): ?>
					<h4 class="font-500 text-uppercase font-15"><?php echo app('translator')->get("msg.Move In"); ?>
						<a href="../add_prospect_record/MoveIn/<?php echo e($row->id); ?>"><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="position:relative; top:-5px"><?php echo app('translator')->get("msg.Add Record"); ?></span></a>
					</h4>
                    <div class="form-inline border-top">
                        <div class='text-danger' style="padding-top:10px; padding-bottom:7px">Add Details by Clicking on Add Record</div> 
                    </div>			
				<?php else: ?> 
					<h4 class="font-500 text-uppercase font-15"><?php echo app('translator')->get("msg.Move In"); ?>
						<a href="../preadmin_select_assessments/<?php echo e($row->id); ?>"><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="position:relative; top:-5px">Main Assessment</span></a>
					</h4>
                        <div class="form-inline border-top">
							<div class='text-danger' style="padding-top:10px; padding-bottom:7px">Kindly Complete Main Assessment Now!</div> 
                        </div>
                <?php endif; ?>
            <?php else: ?> 
                <?php 
                    $sl_no = DB::table('assessment_entry')->where('sl no',0)->first();
                    $assessment = DB::table('resident_assessment')->where([['pros_id',$row->id],['assessment_id',$sl_no->assessment_id]])->first();
                 ?>
                <?php if($assessment): ?>
    				<h4 class="font-500 text-uppercase font-15"><?php echo app('translator')->get("msg.Move In"); ?>
    					<a href="../resposible_personal/<?php echo e($row->id); ?>"><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="position:relative; top:-5px">Screening</span></a>
    				</h4>
                    <div class="form-inline border-top">
    					<div class='text-danger' style="padding-top:10px; padding-bottom:7px">Kindly Complete All Screening!</div>
    				</div>
				<?php else: ?>
    				<h4 class="font-500 text-uppercase font-15"><?php echo app('translator')->get("msg.Move In"); ?>
				        <a href="../preadmin_select_assessments/<?php echo e($row->id); ?>"><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="margin-left: 5px; position:relative; top:-5px">Main Assessment</a>
				        <a href="../resposible_personal/<?php echo e($row->id); ?>"><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="position:relative; top:-5px">Screening</span></a>
			        </h4>
                    <div class="form-inline border-top">
    					<div class='text-danger' style="padding-top:10px; padding-bottom:7px">Kindly Complete All Screening and Main Assessment!</div>
    				</div>
    			<?php endif; ?>
			<?php endif; ?>
	    <?php else: ?>
			<h4 class="font-500 text-uppercase font-15"><?php echo app('translator')->get("msg.Move In"); ?>
				<a href="../preadmin_select_assessments/<?php echo e($row->id); ?>"><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="margin-left: 5px; position:relative; top:-5px">Main Assessment</a>
				<a href="../resposible_personal/<?php echo e($row->id); ?>"><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="position:relative; top:-5px">Screening</span></a>
			</h4>
            <div class="form-inline border-top">
				<div class='text-danger' style="padding-top:10px; padding-bottom:7px">Kindly Complete Screening and Main Assessment First!</div>
            </div>
        <?php endif; ?>

		<?php else: ?>
		<?php  $movein = DB::table('stage_pipeline')->where([['pipeline_id', $row->id], ['sales_stage', 'MoveIn']])->orderBy('stage_pipeline_id', 'DESC')->first();  ?>
					
				<h4 class="font-500 text-uppercase font-15">Move In <?php if($movein->status == 1): ?><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400 pull-right" style="position:relative; top:-5px"><?php echo app('translator')->get("msg.Active State"); ?></span> <?php endif; ?> </h4>
				
					<div class="form-inline border-top">
					
					<div style="margin-top:10px"></div>
					
					<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Date"); ?></label> : <span class="font-14"><?php echo e($movein->date); ?></span>					
					<div style="clear:both; margin-top:7px"></div>
					
					<?php $lead = DB::table('leads')->where('lead_id', $movein->lead_id)->first(); ?>
						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Lead Status"); ?></label> : <span class="font-14"><?php echo e($lead->lead_type); ?></span>
						<div style="clear:both; margin-top:7px"></div>
					
						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Note"); ?></label> : <span class="font-14"><?php echo e($movein->notes); ?></span>
					
						<div style="clear:both; margin-top:7px"></div>
						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Communication Method"); ?></label> : <span class="font-14"><?php echo e($movein->moc); ?></span>
					</div>						
					<?php endif; ?>
					
				</div>
			
			</div>
		</div>
	
  </div>

    <?php echo $__env->make('layouts.partials.scripts_auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>