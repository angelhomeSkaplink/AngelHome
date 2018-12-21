<?php $__env->startSection('htmlheader_title'); ?>
    Prospective Add
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
  <?php $name = DB::table('sales_pipeline')->where('id', $id)->first(); ?>
    <p class="text-danger"><b>Legal Doc details for <?php echo e($name->pros_name); ?></b></p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
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
</style>
<div class="panel-body">
    <div class="row">
        <div class="col-lg-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist" sstyle="margin-left:-14px; margin-right:-14px; margin-top:1px">
                <li class="nav-item">
                 <a class="nav-link" href="../screening_view/<?php echo e($id); ?>">RESPOSIBLE PERSONAL</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="../significant_view/<?php echo e($id); ?>">SIGNIFICANT PERSONAL</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="../details_view/<?php echo e($id); ?>">RESIDENT DETAILS</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="../physician_view/<?php echo e($id); ?>">PHYSICIAN & DENTIST</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="../hospital_view/<?php echo e($id); ?>">HOSPITAL & PHARMACY</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="../equipment_view/<?php echo e($id); ?>">MEDICAL EQUIPMENT</a>
               </li>
               <li class="nav-item active">
                 <a class="nav-link" href="../doc_view/<?php echo e($id); ?>">LEGAL DOCUMENT</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="../insurance_view/<?php echo e($id); ?>">INSURANCE</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="../funeral_view/<?php echo e($id); ?>">FUNERAL HOME</a>
               </li>
             </ul>
        </div>
    </div>
    <div class="row" style="padding-top:5px; ">
    <div class="col-md-12">
        <?php if($data): ?>
        <div class="box box-primary border-light-blue">
          <div class="box-body padding-top-5" style="padding-bottom:10px">
            <h4 class="font-500 text-uppercase font-15" >Legal Doc Information</h4>
              <div class="form-inline border-top" style="padding-top:10px">
                  <div class="" style="padding:10px;margin-top:-20px;">
                    <div class="panel-group" id="accordion">
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                      <div class="panel panel-primary">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo e($d->doc_id); ?>">
                                <h4><strong><span style="color:#fff;"><?php echo e($d->doc_name); ?></span></strong></h4>
                              </a>
                            </h4>
                          </div>
                          <div id="<?php echo e($d->doc_id); ?>" class="panel-collapse collapse">
                            <div class="panel-body">
                              <div class="form-inline border-top" style="padding-top:10px">
                                <div class="col-md-4" style="padding-left: 0; padding-right:0">
                                  <label class="text-capitalize font-500 font-14">Upload Date : </label>
                                  <span class="font-14"><?php echo e($d->upload_date); ?> </span>
                                </div>
                                <div class="col-md-4" style="padding-left: 0; padding-right:0">
                                  <?php 
							                      if($d->file_type == "jpeg" || $d->file_type == ".jpg" || $d->file_type==".png" || $d->file_type==".gif" || $d->file_type=="tiff" || $d->file_type==".bmp"){?>
							                      <span class="text-capitalize font-500 font-14">File Preview : <span class="pull-right"> <a href="../hsfiles/public/legal_doc/<?php echo e($d->doc_file); ?>" target=_blank><i class="material-icons">insert_drive_file</i> Download File</a></span></span>
							                      <img class="img-responsive" src="../hsfiles/public/legal_doc/<?php echo e($d->doc_file); ?>" />
                                    <?php
                                      }else if($d->file_type==".pdf"){
                                    ?>
                                    <span class="text-capitalize font-500 font-14">File Preview : <span class="pull-right"> <a href="../hsfiles/public/legal_doc/<?php echo e($d->doc_file); ?>" target=_blank><i class="material-icons">insert_drive_file</i> Download File</a></span></span>
                                    <object data="../hsfiles/public/legal_doc/<?php echo e($d->doc_file); ?>" type="application/pdf" width="600" height="200">
                                        <embed src="../hsfiles/public/legal_doc/<?php echo e($d->doc_file); ?>" width="400px" height="200px" />
                          
                                    <?php
                                      }else{
                                    ?>
                                        <span class="text-capitalize font-500 font-14">File Preview :</span>
                                          <p style="color:#b3b3b3;padding-top:10px;padding-left:20px;">Preview not available <br/><br/>
                                          <span > <a href="../hsfiles/public/legal_doc/<?php echo e($d->doc_file); ?>" target=_blank><i class="material-icons">insert_drive_file</i> Download File</a></span></p>
                                      <?php }?>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </div>
                  </div>
              </div>
          </div>
        </div>
        <?php else: ?>
        <h4 class="text-danger"><b>NO SCREENING RECORD FOUND</b></h4>
        <?php endif; ?>
      </div>
      <div class="text-center"><?php echo e($data->links()); ?></div>
    </div>
</div>
<?php echo $__env->make('layouts.partials.scripts_auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>