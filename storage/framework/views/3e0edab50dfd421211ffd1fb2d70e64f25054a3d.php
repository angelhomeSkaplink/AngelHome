<?php $__env->startSection('htmlheader_title'); ?>
    Prospective Info 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
    <p class="text-danger"><b><?php echo app('translator')->get("msg.Sales Reports"); ?></b></p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<style>	
	.content
	{
		margin-top: -20px;
	}	
</style>
<script>
$(document).ready(function() {
		$('select[name="pros_id"]').on('change', function() {
			var pros_id = $(this).val();
			console.log(pros_id);
			if(pros_id) {
				$.ajax({
					url: 'reports_pros/'+pros_id,
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
<div class="row margin-left-right-15">
	<form action="../inquiery_reports" method="post" enctype="multipart/form-data">

		<?php echo csrf_field(); ?>

		<div class="col-md-2">
			<div class="form-group has-feedback">
				<label class="sm-heading"><?php echo app('translator')->get("msg.From Date"); ?></label>
				<input type="text" class="form-control" placeholder="From Date" name="from" id="from" onkeyup="getdateofretirement();" autocomplete="off"/>
				<script type="text/javascript"> $('#from').datepicker({format: 'yyyy/mm/dd'});</script> 
			</div>			
		</div>
		<div class="col-md-2">
			<div class="form-group has-feedback">
				<label class="sm-heading"><?php echo app('translator')->get("msg.To Date"); ?></label>
				<input type="text" class="form-control" placeholder="To Date" name="to" id="to" onkeyup="getdateofretirement();" autocomplete="off" />
				<script type="text/javascript"> $('#to').datepicker({format: 'yyyy/mm/dd'});</script> 
			</div>			
		</div>
		<div class="col-md-3">
			<div class="form-group has-feedback">
				<label><?php echo app('translator')->get("msg.Resident"); ?></label><br/>
				<select name="id" id="id" class="form-control">
					<option value=""><?php echo app('translator')->get("msg.Select Resident"); ?></option>
					<?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prospect): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
					<option value="<?php echo e($prospect->id); ?>"><?php echo e($prospect->pros_name); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
				</select>
			</div>			
		</div>
		<div class="col-md-3">
			<div class="form-group has-feedback">
				<label class="sm-heading"><?php echo app('translator')->get("msg.Sales Stage"); ?> </label>
				<select name="sales_stage" id="sales_stage" class="form-control" >
					<option value=""><?php echo app('translator')->get("msg.Select Sales Stage"); ?></option>
					<option value="Discovery"><?php echo app('translator')->get("msg.Discovery"); ?></option>
					<option value="Tour"><?php echo app('translator')->get("msg.Tour"); ?></option>
					<option value="Re-Tour"><?php echo app('translator')->get("msg.Re-Tour"); ?></option>
					<option value="Signing"><?php echo app('translator')->get("msg.Signing"); ?></option>
					<option value="Move In"><?php echo app('translator')->get("msg.Move In"); ?></option>
				</select>
			</div>			
		</div>
		<div class="col-md-2">
			<div class="form-group has-feedback">
				<button type="submit" class="btn btn-primary btn-block btn-flat padding-top-bottom-4" style="width:90% !important; margin-top:24px">
					<i class="material-icons"> search </i> Search
				</button>
			</div>			
		</div>
	</form>
</div>

<div class="row">
    <div class="col-md-12">		
        <div class="box box-primary border">				
            <div class="box-header with-border col-sm-2 pull-right">                   
            </div>
            <div class="box-body border padding-top-0 padding-left-right-0">
                <table class="table">
                    <tbody>
						<tr>
							<th class="th-position text-uppercase font-500 font-12">#</th>
							<th class="th-position text-uppercase font-500 font-13">
								<select name="pros_id" id="id" class="form-control">
									<option value=""><?php echo app('translator')->get("msg.Resident"); ?></option>
									<?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prospect): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
									<option value="<?php echo e($prospect->id); ?>"><?php echo e($prospect->pros_name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
								</select>
							</th>
							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Phone No"); ?></th>
							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Email"); ?></th>
							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Address"); ?></th>
							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Contact Person"); ?></th>
							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Phone No"); ?></th>
							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Email"); ?></th>
							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Address"); ?></th>
							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Work Done By"); ?></th>
						</tr>
						<?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
						<tr>
							<?php if($report->service_image == NULL): ?>
							<td><img src="hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>	
							<?php else: ?>
							<td><img src="hsfiles/public/img/<?php echo e($report->service_image); ?>" class="img-circle" width="40" height="40"></td>
							<?php endif; ?>
							<td><?php echo e($report->pros_name); ?></td>
							<?php 
								$basic = DB::table('change_pross_record')->where([['pros_id', $report->id], ['status', 1]])->first();{
							?>
							<td><?php echo e($basic->phone_p); ?></td>
							<td><?php echo e($basic->email_p); ?></td>
							<td><?php echo e($basic->address_p); ?></td>
							<td><?php echo e($basic->contact_person); ?></td>
							<td><?php echo e($basic->phone_c); ?></td>
							<td><?php echo e($basic->email_c); ?></td>
							<td><?php echo e($basic->address_c); ?></td>
							<?php } ?>	
							<?php 
								$user = DB::table('users')->where([['user_id', $report->marketing_id]])->first();{
							?>
							<td><?php echo e($user->firstname); ?> <?php echo e($user->lastname); ?></td>
							<?php } ?>	
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </tbody>
                </table>	
				<div class="text-center"><?php echo e($reports->links()); ?></div>
            </div>                
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-extra'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>