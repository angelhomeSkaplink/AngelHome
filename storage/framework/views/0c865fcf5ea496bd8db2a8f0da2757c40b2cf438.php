<?php $__env->startSection('htmlheader_title'); ?>
    TSP
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<div class="row" style="padding:0px;margin:0px;">
    <div class="col-lg-12 text-center">
        <h3 style="padding:0px;margin:0px;"><strong>TSP</strong></h3>
    </div>
</div>
<div class="row" style="margin-top:20px;">
	<div class="col-lg-4">
		<h3 style="margin:0px;padding:0px;"><?php if($residents->service_image == NULL): ?>
		<img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40">
		<?php else: ?>
		<img src="../hsfiles/public/img/<?php echo e($residents->service_image); ?>" class="img-circle" width="40" height="40">
	<?php endif; ?><b><span class="text-danger"><?php echo e($residents->pros_name); ?> </span></b></h3>
	</div>
	
	<div class="col-lg-4 text-center">
		<form action="<?php echo e(action('ReportController@mar_monthly_report')); ?>" method="post">
			<input name="_method" type="hidden" value="POST">
			<?php echo csrf_field(); ?>

			<input type="hidden" name="user_id" value="<?php echo e($residents->id); ?>">
			<div class="row">
			    
				<div class="col-lg-8 col-lg-offset-2">
					<div class="row">
						<div class="col-lg-6" style="padding-right:0px;">
							<select type="text" name="tsp_type" id="tsp_type" class="form-control" placeholder="">
								<option>Choose Any</option>
								<option value="1">Fall</option>
                                <option value="2">Decline in Appetite or Activities of Daily Living</option>
                                <option value="3">Increase in Pain</option>
                                <option value="4">New Medication</option>
                                <option value="5">Skin Problem of Any Type</option>
                                <option value="6">Problem (State)</option>
                                <option value="7">Respiratory Problem</option>
                                <option value="8">Cast Or Splint</option>
                                <option value="9">Eye Problem</option>
                                <option value="10">Gastrointestinal Problem</option>
                                <option value="11">Urinary Tract Infection</option>
							</select>
						</div>
						<div class="col-lg-4" style="padding-left:0px;">
							<button class="btn btn-default form-control" type="button" name="submit"><i class="material-icons md-36" style="color:#000;"> add_circle </i></button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<?php $__env->stopSection(); ?>
    
<?php $__env->startSection('main-content'); ?>
    <div class="container">
        <div class="tab-content" id="myTabContent">
            
        </div>
    </div>
<script type="text/javascript">
        $(document).ready(function(){
            $("#tsp_type").change(function () {
                var tsp_type = $("#tsp_type").val();
                $('#myTabContent').append($('<div class="box box-primary">').load('/'+tsp_type));
            });
        });       
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-extra'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>