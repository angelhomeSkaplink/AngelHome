<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo app('translator')->get("msg.Resident Info"); ?> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
    <div class="col-lg-4 col-lg-offset-4 text-center">
      <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Aggregated Sales Report</strong></h3>
    </div>
    <div class="col-lg-4">
      <a href="<?php echo e(url('facility_sales_reports')); ?>" class="btn btn-success btn-sm pull-right" style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back</a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<style>	
	.wickedpicker{
		z-index:999 !important;
	}
	.content-header
	{
		padding: 2px 0px 1px 20px;
		margin-bottom: -10px;
	}
	.content {
		margin-top: 15px;
	}
</style>
<script>
$(document).ready(function() {
		$('select[name="pros_id"]').on('change', function() {
			var pros_id = $(this).val();
			console.log(pros_id);
			if(pros_id) {
				$.ajax({
					url: '../../reports_pros/'+pros_id,
					type: "GET",
					success:function(data) {
						window.location.replace('reports_pros/'+pros_id);
					}
				});
			}
		});
	});
</script>
<br/>
<div class="row">
    <div class="col-md-12">		
        <div class="box box-primary border">				
            <div class="box-header with-border col-sm-2 pull-right">                   
            </div>
            <div class="box-body border padding-top-0 padding-left-right-0">
                <table class="table">
                    <tbody>
						<tr>
							<th class="th-position text-uppercase font-500 font-12">###</th>
							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Residents"); ?></th>
							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Phone No"); ?></th>
							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Email"); ?></th>
							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Address"); ?></th>
							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Contact Person"); ?></th>
							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Phone No"); ?></th>
							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Email"); ?></th>
							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Address"); ?></th>
							<!--<th class="th-position text-uppercase font-500 font-12">Sales stage</th>-->
						</tr>
						<?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
						<?php 
							$n = explode(",",$report->pros_name);
						 ?>
						<tr>
							<?php if($report->service_image == NULL): ?>
							<td><img src="hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>	
							<?php else: ?>
							<td><img src="hsfiles/public/img/<?php echo e($report->service_image); ?>" class="img-circle" width="40" height="40"></td>
							<?php endif; ?>
							<td><?php echo e($n[0]); ?> <?php echo e($n[1]); ?> <?php echo e($n[2]); ?></td>
							<?php 
								$basic = DB::table('change_pross_record')->where([['pros_id', $report->id], ['status', 1]])->first();{
								$m = explode(",",$basic->contact_person);
							?>
							<td><?php echo e($basic->phone_p); ?></td>
							<td><?php echo e($basic->email_p); ?></td>
							<td><?php echo e($basic->address_p); ?></td>
							<td><?php echo e($m[0]); ?> <?php echo e($m[1]); ?> <?php echo e($m[2]); ?></td>
							<td><?php echo e($basic->phone_c); ?></td>
							<td><?php echo e($basic->email_c); ?></td>
							<td><?php echo e($basic->address_c); ?></td>
							<?php } ?>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </tbody>
                </table>
            </div>                
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-extra'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>