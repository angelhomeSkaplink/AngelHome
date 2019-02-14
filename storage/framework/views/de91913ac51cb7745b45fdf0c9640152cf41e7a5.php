<!-- Nilutpal Boruah Jr. -->



<?php $__env->startSection('htmlheader_title'); ?>
    Mar Report
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Mar Reports</strong></h3>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<style>
	.content-header
	{
		padding: 2px 0px 1px 20px;
		margin-bottom: -10px;
	}
	.content {
		margin-top: 15px;
	}
	.placeholder {
    color: red;
    opacity: 1; /* Firefox */
}
</style>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">
			<div id="DivIdToPrint">
				<div class="box-body border padding-top-0 padding-left-right-0">
					<table class="table">
						<tbody>
							<tr>
								<th class="th-position text-uppercase font-500 font-12">#</th>
								<th class="th-position text-uppercase font-500 font-12">Resident</th>
								<th class="th-position text-uppercase font-500 font-12">View Report</th>
							</tr>
			  <?php $__currentLoopData = $join; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			<?php 
				$n = explode(",",$r->pros_name);
			 ?>
			<tr>
                <?php if($r->service_image == NULL): ?>
								<td><img src="hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>
								<?php else: ?>
								<td><img src="hsfiles/public/img/<?php echo e($r->service_image); ?>" class="img-circle" width="40" height="40"></td>
								<?php endif; ?>
							<td><?php echo e($n[0]); ?> <?php echo e($n[1]); ?> <?php echo e($n[2]); ?></td>
                <td>
                    <a href="resident_mar_rep/<?php echo e($r->id); ?>">
                        <i class="material-icons gray md-22"> remove_red_eye </i>
                    </a></td>
							</tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
						</tbody>
					</table>
				</div>
			</div>
			<!--<div class="form-group has-feedback" style="float:right;margin-right:5px;">
				<input type='button' id='btn' value='Print' onclick='printDiv();'>
			</div>-->
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-extra'); ?>
<script>
	function printDiv() {
		var divToPrint = document.getElementById('DivIdToPrint');
		var newWin = window.open('', 'Print-Window');
		newWin.document.open();
		newWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
		newWin.document.close();
		setTimeout(function() {
		newWin.close();
		}, 10);
	}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>