


<?php $__env->startSection('htmlheader_title'); ?>
    Assessment View
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
    <div class="col-lg-4 col-lg-offset-4 text-center">
        <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Assessment View</strong></h3>
    </div>
    <div class="col-lg-4">
        <a href="<?php echo e(url('assessment_preview')); ?>" class="btn btn-success btn-block btn-flat btn-width btn-sm " style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back</a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<style>
  .sv_complete_btn{
      display: none;
    }
</style>
<script>
 var assessment = <?php echo $assessment; ?> 
</script>
   <div class="row">
       <div class="col-md-12">
          <div class="box box-primary border">
                <div class="box-body border padding-top-0 padding-left-right-0">
                    <div class="" style="min-height: 624px;">
						<div id="surveyElement"></div>
						
				<!-- Survey Content end -->
					</div>				
                </div>                
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-extra'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>