<?php $__env->startSection('htmlheader_title'); ?>
    Prospective Info 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Sales Pipeline</strong></h3>
	</div>
</div>   
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<link href="<?php echo e(asset('/css/type_ahead.css')); ?>" rel="stylesheet" type="text/css"/>
<script>
$(document).ready(function() {
		$('select[name="id"]').on('change', function() {
			var pros_id = $(this).val();
			console.log(pros_id);
			if(pros_id) {
				$.ajax({
					url: 'select_stage_pros/'+pros_id,
					type: "GET",
					success:function(data) {
						window.location.replace('select_stage_pros/'+pros_id);
					}
				});
			}					
		});
	});
</script>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">
			<div class="box-header with-border col-sm-2 pull-right"></div>
            <div class="box-body border padding-top-0 padding-left-right-0">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
    						<tr>
    							<th class="th-position text-uppercase font-500 font-12">#</th>
    							<th class="th-position text-uppercase font-400 font-12">
    								<div class="autocomplete" style="width:200px;">
    									<input id="myInput" type="text" name="room_type" autocomplete="off" placeHolder="&#61442; FUTURE RESIDENT" style="font-family: FontAwesome, Arial; font-style: normal">
									</div>
								</th>
    							<th class="th-position text-uppercase font-500 font-12">Phone No</th>
    							<th class="th-position text-uppercase font-500 font-12">
    								<div class="autocomplete" style="width:200px;">
    									<input id="emailInput" type="text" name="room_type" autocomplete="off" placeHolder="&#61442; EMAIL" style="font-family: FontAwesome, Arial; font-style: normal">
    								</div>
    							</th>
    							<th class="th-position text-uppercase font-500 font-12">View Record</th>
    							<th class="th-position text-uppercase font-500 font-12">Sales Stage</th>
    							<th class="th-position text-uppercase font-500 font-12">Update Records</th>
    						</tr>
							<?php $__currentLoopData = $crms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crm): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
							<?php 
								$n=explode(",",$crm->pros_name);
							 ?>
    						<tr>
    							<?php if($crm->service_image == NULL): ?>
    							<td><img src="hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>	
    							<?php else: ?>
    							<td><img src="hsfiles/public/img/<?php echo e($crm->service_image); ?>" class="img-circle" width="40" height="40"></td>
    							<?php endif; ?>
    							<td><?php echo e($n[0]); ?> <?php echo e($n[1]); ?> <?php echo e($n[2]); ?></td>
    							<?php $basic = DB::table('change_pross_record')->where([['pros_id', $crm->id], ['status', 1]])->first();{ ?>
    							<td><?php echo e($basic->phone_p); ?></td>
    							<td><?php echo e($basic->email_p); ?></td>
    							<?php } ?>
    							<td class="padding-left-35"><a href="view_records/<?php echo e($crm->id); ?>">
    								<i class="material-icons gray md-22"> visibility </i>
    							</td>							
    							<!--<td class="padding-left-45"><a href="add_records/<?php echo e($crm->id); ?>">-->
    							<!--	<i class="material-icons material-icons md-22 gray"> update </i></a>-->
    							<td class="padding-left-45">
								<?php echo e($crm->stage); ?>

    							</td>								
    							<td class="padding-left-45"><a href="change_pro_records/<?php echo e($crm->id); ?>">
    								<i class="material-icons material-icons gray md-22"> edit </i>
    								</a>
    							</td>
    								
    						</tr>
    						<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </tbody>
                    </table>
                </div>
			    <div class="text-center"><?php echo e($crms->links()); ?></div>
			</div>               
		</div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-extra'); ?>
<script type="text/javascript" language="javascript" src="<?php echo e(asset('/js/rec/mar_crm.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>