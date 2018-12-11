<?php $__env->startSection('htmlheader_title'); ?>
    Check Ups
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentheader_title'); ?>
    <p><b> <span class="text-danger" style="text-align:center;"> 
        <?php if($name->service_image == NULL): ?>
		<img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40">
		<?php else: ?>
		<img src="../hsfiles/public/img/<?php echo e($name->service_image); ?>" class="img-circle" width="40" height="40">
	<?php endif; ?>
    
    <?php echo e($name->pros_name); ?></span> </b>
    <h4><p style="text-align:center;"><strong>Check Ups</strong></p></h4>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<?php if(count($errors)): ?>
<div class="form-group">
    <div class="alert alert-danger">
      <ul>
          <li><b>At least one field is required</b></li>
      </ul>
    </div>
</div>
<?php endif; ?>

<div class="card">
    <div class="card-body px-lg-5 pt-0">
        <div class="col-md-2"></div>
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-body" style="height:500px; padding-top:0">
                    <form action="<?php echo e(action('DoctorController@storeCheckup')); ?>" method="post">
                        <input name="_method" type="hidden" value="POST">
                        <?php echo csrf_field(); ?>

                        <div class="form-group has-feedback">
                            <input type="hidden" class="form-control" value="<?php echo e($id); ?>" name="res_id" required readonly />
                        </div>					
                        <div class="form-group has-feedback">
                            <label>Weight</label>
                            <input type="text" class="form-control" name="weight"/>
                        </div>
                        <div class="form-group has-feedback">
                        <label>Blood Sugar</label>
                            <input type="text" class="form-control" name="sugar"/>
                        </div>
                        <div class="form-group has-feedback">
                        <label>Blood Pressure</label>
                            <input type="text" class="form-control" name="pressure"/>
                        </div>
                        <div class="form-group has-feedback">
                            <label>Temperature</label>
                            <input type="text" class="form-control" name="temperature"/>
                        </div>
                        <div class="form-group has-feedback">
                            <label>O2 Stats</label>
                            <input type="text" class="form-control" name="o2_stat"/>
                        </div>
                        <div class="form-group has-feedback">
                            <button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm"><?php echo app('translator')->get("msg.Submit"); ?></button>
                        </div>
                        <div class="form-group has-feedback">
                            <a href="<?php echo e(url('all_res_checkup')); ?>" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right:15px"><?php echo app('translator')->get("msg.Cancel"); ?></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-body" style="height:500px; padding-top:0">
                    <h4><strong>Previous Checkups</strong></h4>
                    <?php 
                        if($checkups->isEmpty()){
                            echo "No previous Record!";
                        }
                     ?>
                    <?php $__currentLoopData = $checkups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $check): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <div class="panel-heading">
                    <li><a href="#modal" data-toggle="modal" data-target="#modalRegister<?php echo e($check->id); ?>"> <?php echo e($check->date); ?>  <?php echo e($check->time); ?></a></li>
                    </div>
                    <div id="modalRegister<?php echo e($check->id); ?>" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title" style="text-align-last: center"><?php echo e($check->date); ?></h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="panel-body">
                                            <div class="row">
                                                  <p> <strong> Weight:</strong> <?php echo e($check->weight); ?> </p>
                                                  <p> <strong> Blood Sugar:</strong> <?php echo e($check->sugar); ?> </p>
                                                  <p> <strong> Blood Pressure:</strong> <?php echo e($check->pressure); ?> </p>
                                                  <p> <strong> Temperature:</strong> <?php echo e($check->temperature); ?> </p>
                                                  <p> <strong> O2 Stats:</strong> <?php echo e($check->o2_stat); ?> </p>
                                                </div>
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

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>