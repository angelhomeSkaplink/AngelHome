<?php $__env->startSection('htmlheader_title'); ?>
    Prospective Add
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
  <?php $name = DB::table('sales_pipeline')->where('id', $id)->first(); ?>
    <p class="text-danger"><b>Medical Equipment details for <?php echo e($name->pros_name); ?></b></p>
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
               <li class="nav-item active">
                 <a class="nav-link" href="../equipment_view/<?php echo e($id); ?>">MEDICAL EQUIPMENT</a>
               </li>
               <li class="nav-item">
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
        <?php 
        $data = DB::table('medical_equip_supp_resident_need')->where([['pros_id',$id],['status',1]])->first();
     ?>
    <div class="col-md-12">
        <?php if($data): ?>
        <div class="box box-primary border-light-blue">
          <div class="box-body padding-top-5" style="padding-bottom:10px">
            <h4 class="font-500 text-uppercase font-15" >Medical Equipment Information</h4>
            <div class="form-inline border-top" style="padding-top:10px">
              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                <label class="text-capitalize font-500 font-14">Inconsistancy Supplies/Type : </label>
                <span class="font-14"><?php echo e($data->inconsistency_supplies_type); ?> </span>
              </div>	
    
              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                <label class="text-capitalize font-500 font-14">PressureRelief Device Type : </label>
                <span class="font-14"><?php echo e($data->pressure_relief_dev_type); ?> </span>
              </div>
            </div>
          </div>
          <div class="box-body padding-top-5" style="padding-bottom:10px">
            <h4 class="font-500 text-uppercase font-15" >Medical Equipments Need</h4>
            <div class="form-inline border-top" style="padding-top:10px">
              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                <label class="text-capitalize font-500 font-14">Bed Pan: </label>
                <span class="font-14">
                  <?php if($data->bed_pan_medical == "on"): ?>
                    <i class="material-icons">done</i>
                    <?php else: ?>
                    <i class="material-icons">highlight_off</i>
                  <?php endif; ?>
                </span>
              </div>
              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                <label class="text-capitalize font-500 font-14">Protective Pads: </label>
                <span class="font-14">
                  <?php if($data->protective_pads_medical == "on"): ?>
                    <i class="material-icons">done</i>
                    <?php else: ?>
                    <i class="material-icons">highlight_off</i>
                  <?php endif; ?>
                </span>
              </div>
              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                  <label class="text-capitalize font-500 font-14">Comode: </label>
                  <span class="font-14">
                    <?php if($data->comode_medical == "on"): ?>
                      <i class="material-icons">done</i>
                      <?php else: ?>
                      <i class="material-icons">highlight_off</i>
                    <?php endif; ?>
                  </span>
                </div>
                <div class="col-md-4" style="padding-left: 0; padding-right:0">
                    <label class="text-capitalize font-500 font-14">Urinal: </label>
                    <span class="font-14">
                      <?php if($data->urinal_medical == "on"): ?>
                        <i class="material-icons">done</i>
                        <?php else: ?>
                        <i class="material-icons">highlight_off</i>
                      <?php endif; ?>
                    </span>
                  </div>
                  <div class="col-md-4" style="padding-left: 0; padding-right:0">
                      <label class="text-capitalize font-500 font-14">Crutches: </label>
                      <span class="font-14">
                        <?php if($data->crutches_medical == "on"): ?>
                          <i class="material-icons">done</i>
                          <?php else: ?>
                          <i class="material-icons">highlight_off</i>
                        <?php endif; ?>
                      </span>
                    </div>
                    <div class="col-md-4" style="padding-left: 0; padding-right:0">
                        <label class="text-capitalize font-500 font-14">Walker: </label>
                        <span class="font-14">
                          <?php if($data->walker_medical == "on"): ?>
                            <i class="material-icons">done</i>
                            <?php else: ?>
                            <i class="material-icons">highlight_off</i>
                          <?php endif; ?>
                        </span>
                      </div>
                      <div class="col-md-4" style="padding-left: 0; padding-right:0">
                          <label class="text-capitalize font-500 font-14">Wheel Chair: </label>
                          <span class="font-14">
                            <?php if($data->wheelchair_medical == "on"): ?>
                              <i class="material-icons">done</i>
                              <?php else: ?>
                              <i class="material-icons">highlight_off</i>
                            <?php endif; ?>
                          </span>
                        </div>
                        <div class="col-md-4" style="padding-left: 0; padding-right:0">
                            <label class="text-capitalize font-500 font-14">Cane: </label>
                            <span class="font-14">
                              <?php if($data->cane_medical == "on"): ?>
                                <i class="material-icons">done</i>
                                <?php else: ?>
                                <i class="material-icons">highlight_off</i>
                              <?php endif; ?>
                            </span>
                          </div>
                          <div class="col-md-4" style="padding-left: 0; padding-right:0">
                              <label class="text-capitalize font-500 font-14">Hospital Bed: </label>
                              <span class="font-14">
                                <?php if($data->hospital_beds_medical == "on"): ?>
                                  <i class="material-icons">done</i>
                                  <?php else: ?>
                                  <i class="material-icons">highlight_off</i>
                                <?php endif; ?>
                              </span>
                            </div>
                            <div class="col-md-4" style="padding-left: 0; padding-right:0">
                                <label class="text-capitalize font-500 font-14">Trapeze: </label>
                                <span class="font-14">
                                  <?php if($data->trapeze_medical == "on"): ?>
                                    <i class="material-icons">done</i>
                                    <?php else: ?>
                                    <i class="material-icons">highlight_off</i>
                                  <?php endif; ?>
                                </span>
                              </div>
                              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                                <label class="text-capitalize font-500 font-14">Oxygen: </label>
                                <span class="font-14">
                                  <?php if($data->oxygen_medical == "on"): ?>
                                    <i class="material-icons">done</i>
                                    <?php else: ?>
                                    <i class="material-icons">highlight_off</i>
                                  <?php endif; ?>
                                </span>
                              </div>
                              <div class="col-md-4" style="padding-left: 0; padding-right:0">
                                <label class="text-capitalize font-500 font-14">Others: </label>
                                <span class="font-14">
                                  <?php echo e($data->other_medical); ?>

                                </span>
                              </div>

            </div>	
          </div>				
            <div style="clear:both; margin-top:5px;"></div>
            </div>
          </div>
        </div>
        <?php else: ?>
        <h4 class="text-danger"><b>NO SCREENING RECORD FOUND</b></h4>
        <?php endif; ?>
      </div>
    </div>
</div>
<?php echo $__env->make('layouts.partials.scripts_auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>