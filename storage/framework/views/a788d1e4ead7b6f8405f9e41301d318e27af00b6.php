<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo e($assessment); ?> Assessment Report
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
    <div class="col-lg-4 col-lg-offset-4 text-center">
      <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong><?php echo e($assessment); ?> Assessment</strong></h3>
    </div>
    <div class="col-lg-4 form-inline" style="padding-right:30px;">
        <a href="#" class="btn btn-primary btn-block btn-flat btn-width btn-sm pull-right" onclick="printDiv('printableDiv')" id="printButton" ><i class="material-icons md-22"> print </i> Print</a>
        <a href="../assessment_report_graph" class="btn btn-success btn-block btn-flat btn-width btn-sm pull-right" style="margin-right:15px;margin-top:-0px;border-radius:3px;"><i class="material-icons md-22"> keyboard_arrow_left </i>Back</a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<style>
	.content-header
	{
		padding: 2px 0px 1px 20px;
		margin-bottom: -18px;
	}
	.content {
		margin-top: 15px;
	}
</style>
<style  type = "text/css" media = "screen">
      .print-header{ display:none; }
      .print-footer{ display:none; }
</style>
<style  type = "text/css" media = "print">
      .print-header{ display:block; }
      .print-footer{ display:block; }
</style>
<link href="<?php echo e(asset('/css/type_ahead.css')); ?>" rel="stylesheet" type="text/css"/>
<div id="printableDiv">
    <div class="row" style="padding-top:20px;">
        <div class="print-header">
            <?php 
                $facility = DB::table('facility')->where('id',Auth::user()->facility_id)->first();
             ?>
            <div class="row">
                  <div class="col-lg-12 text-center">
                    <table>
                      <tr>
                        <td style="padding-left:20px;">
                          <?php if($facility->facility_logo == NULL): ?>
                          <img src="http://seniorsafetech.com/angel_home_s_admin/hsfiles/public/facility_logo/images.png"/>
                          <?php else: ?>
                          <img src="http://seniorsafetech.com/angel_home_s_admin/hsfiles/public/facility_logo/<?php echo e($facility->facility_logo); ?>" />
                          <?php endif; ?>
                        </td>
                        <td style="width:86%;" class="text-center">
                          <h3><strong><?php echo e($assessment); ?> Assessment Report</strong></h3>
                          <h4><strong>Facility :: <?php echo e($facility->facility_name); ?></strong></h4>
                          <p><strong><?php echo e($facility->address); ?> <?php echo e($facility->address_two); ?></strong></p>
                          <p><strong><i class="material-icons"> phone</i><?php echo e($facility->phone); ?>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="material-icons">email</i>
                            <?php echo e($facility->facility_email); ?>

                          </strong></p>
                          <hr style="height:5px;border:none;color:#333;background-color:#333;">
                        </td>
                        <td style="width:5%;"></td>
                      </tr>
                      <tr style="width:100%;border-bottom:5px solid #333;">
                      <td colspan="3" style="text-align:left;padding-left:20px;padding-bottom:10px;">
                          <span style="font-size:1.5em;font-weight:bold;">Resedents:</span>
                       </td>
                      </tr>
                    </table>
                  </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary border">
                <div class="box-body border padding-top-0 padding-left-right-0">
    				<div class="table-responsive">
    					<table class="table">
    						<tbody>
    							<tr>
    								<th class="th-position text-uppercase font-500 font-12">#</th>
    								<th class="th-position text-uppercase font-500 font-12">
    									<div class="autocomplete" style="width:200px;">
    										<input id="myInput" type="text" placeHolder="<?php echo app('translator')->get('msg.Resident'); ?>">
    									</div>
    								</th>
    								<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Phone No"); ?></th>
    								<th class="th-position text-uppercase font-500 font-12">
    									<div class="emailautocomplete" style="width:200px;">
    										<input id="emailInput" type="text" placeHolder="<?php echo app('translator')->get('msg.Email'); ?>">
    									</div>
    								</th>
    								<th class="th-position text-uppercase font-500 font-12">
    									<div class="contactautocomplete" style="width:200px;">
    										<input id="contactInput" type="text" placeHolder="<?php echo app('translator')->get('msg.Contact Person'); ?>">
    									</div>
    								</th>
    								<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.View"); ?></th>
    							</tr>
    							<?php if($residents->isempty()): ?>
    							<tr>
    							    <td colspan=6 class="text-center"><p>No resident has done this assessment.</p></td>
    							</tr>
    							<?php else: ?>
                                  <?php $__currentLoopData = $residents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crm): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                  <?php 
                                      $n = explode(",", $crm->pros_name);
                                      $m = explode(",", $crm->contact_person);
                                   ?>
                                  <tr>
                                    <?php if($crm->service_image == NULL): ?>
                                    <td><img src="hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>
                                    <?php else: ?>
                                    <td><img src="../hsfiles/public/img/<?php echo e($crm->service_image); ?>" class="img-circle" width="40" height="40"></td>
                                    <?php endif; ?>
                                    <td><?php echo e($n[0]); ?> <?php echo e($n[1]); ?> <?php echo e($n[2]); ?></td>
                                    <td><?php echo e($crm->phone_p); ?></td>
                                    <td><?php echo e($crm->email_p); ?></td>
                                    <td><?php echo e($m[0]); ?> <?php echo e($m[1]); ?> <?php echo e($m[2]); ?></td>
                                    <td style="padding-left:55px !important">
                                      <?php 
                                        $assessment = str_replace('/', '_', $assessment);
                                       ?>
                                      <a href="../individual_page_in_main_assessment/<?php echo e($crm->id); ?>/<?php echo e($assessment); ?>">
                                        <i class="material-icons gray md-22"> visibility </i>
                                      </a>
                                    </td>
                                  </tr>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                <?php endif; ?>
    						</tbody>
    					</table>
    				</div>
    
                </div>
            </div>
        </div>
    </div>
    <div class="print-footer text-center" style="border-top:5px solid #333;">
        Powered by Senior Safe Technology LLC
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-extra'); ?>
<script type="text/javascript" language="javascript" src="<?php echo e(asset('/js/rec/service.js')); ?>"></script>
<script>
    function printDiv(printableDiv) {      
		var printContents = document.getElementById(printableDiv).innerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;
		window.location.reload();
	}
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>