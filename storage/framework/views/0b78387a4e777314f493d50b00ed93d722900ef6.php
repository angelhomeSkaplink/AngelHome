<?php $__env->startSection('htmlheader_title'); ?>
    Dashboard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
    Dashboard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<style>	
	.content-header
	{
		display:none;
	}	
</style>
<div style="padding-top:65px"></div>

<div>
    <div class="box-header with-border text-center">
		<?php $facility_name = DB::table('facility')->where('id', Auth::user()->facility_id)->first(); ?>
        <h3 class="box-title heading"> <?php echo app('translator')->get("msg.Welcome To"); ?> <?php echo e($facility_name->facility_name); ?></h3>
    </div>
	
    <div class="box-body no-box-shadow text-center; desc-dashbord">
		<?php echo app('translator')->get('msg.Hi'); ?> <?php echo Auth::user()->firstname." ".Auth::user()->lastname ?> ! <?php echo app('translator')->get('msg.This Is Your Dashboard'); ?>. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
    </div>
	<?php if(Auth::user()->role == '1'): ?>
	<!-- Survey Content start -->
		<!--<div class="sv_main sv_frame sv_default_css">
		
		<input type="hidden" class="form-control" id="assessment_id" value="<?php echo e($uniq_code); ?>" />
		<input type="hidden" id="csrf" name="_token" value="<?php echo e(csrf_token()); ?>">
		<div class="sv_custom_header"></div>
			<div class="sv_container">
				<div class="sv_header">
					<h5>Create Assessment</h5>
					<div>
						<a href="<?php echo e(url('assessment_edit_preview')); ?>" >Preview</a>
					</div>
				</div> 
				<div class="sv_body">
					
					<div id="editor"></div>
				</div>
			</div>
		</div>-->
	<!-- Survey Content end -->
	<?php endif; ?>
		
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>