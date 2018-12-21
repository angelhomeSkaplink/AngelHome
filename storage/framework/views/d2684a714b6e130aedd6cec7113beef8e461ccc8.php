<?php $__env->startSection('htmlheader_title'); ?>
    Resdident Info 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
    Resident Info
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<style>	
	.content-header{
		display:none;
	}	
</style>
<script>
$(document).ready(function() {
		$('select[name="id"]').on('change', function() {
			var pros_id = $(this).val();
			console.log(pros_id);
			if(pros_id) {
				$.ajax({
					url: 'select_personal_detail/'+pros_id,
					type: "GET",
					success:function(data) {
						window.location.replace('select_personal_detail/'+pros_id);
					}
				});
			}					
		});
	});
</script>
<link href="<?php echo e(asset('/css/type_ahead.css')); ?>" rel="stylesheet" type="text/css"/>
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
    							<th class="th-position text-uppercase font-500 font-12">
    								<div class="autocomplete" style="width:200px;">
    									<input id="myInput" type="text" placeHolder="RESIDENT">
    								</div>
    								<!--<select name="id" id="id" class="form-control" >
    									<option value=""> <?php echo app('translator')->get("msg.FUTURE RESIDENT"); ?></option>
    									<?php $__currentLoopData = $prospectives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prospective): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    										<option value="<?php echo e($prospective->id); ?>"> <?php echo e($prospective->pros_name); ?> </option>	
    									<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    								</select>-->
    							</th>
    							<th class="th-position text-uppercase font-500 font-12">Phone No</th>
    							<th class="th-position text-uppercase font-500 font-12">
    								<div class="emailautocomplete" style="width:200px;">
    									<input id="emailInput" type="text" placeHolder="EMAIL">
    								</div>
    							</th>
    							<th class="th-position text-uppercase font-500 font-12">
    								<div class="contactautocomplete" style="width:200px;">
    									<input id="contactInput" type="text" placeHolder="CONTACT PERSON">
    								</div>
    							</th>
    							<!--<th class="th-position text-uppercase font-500 font-12">Add Records</th>-->
    							<th class="th-position text-uppercase font-500 font-12">View Records</th>
    						</tr>
    						<?php $__currentLoopData = $crms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crm): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    						<tr>
    							<?php if($crm->service_image == NULL): ?>
    								<td><img src="hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>	
    								<?php else: ?>
    								<td><img src="hsfiles/public/img/<?php echo e($crm->service_image); ?>" class="img-circle" width="40" height="40"></td>
    								<?php endif; ?>
    							<td><?php echo e($crm->pros_name); ?></td>
    							<?php 
    								$basic = DB::table('change_pross_record')->where([['pros_id', $crm->id], ['status', 1]])->first();{
    							?>
    							<td><?php echo e($basic->phone_p); ?></td>
    							<td><?php echo e($basic->email_p); ?></td>
    							<td><?php echo e($basic->contact_person); ?></td>
    							<?php } ?>
    							<!--<td class="padding-left-35"><a href="details/<?php echo e($crm->id); ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Add Records"><i class="material-icons gray md-22"> add_circle</i></a></td>-->
    							<td class="padding-left-35"><a href="details_view/<?php echo e($crm->id); ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="view Records"><i class="material-icons gray md-22"> visibility </i></a></td>
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
<script type="text/javascript" language="javascript" src="<?php echo e(asset('/js/rec/personal_detail.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>