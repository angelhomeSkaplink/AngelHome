<?php $__env->startSection('htmlheader_title'); ?>
Facility Sales Reports 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Facility Sales Reports</strong></h3>
	</div>
	<div class="col-lg-4">
	<a href="<?php echo e(url('facility_sales_reports')); ?>" class="btn btn-success btn-sm pull-right" style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back</a>
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
<div class="row margin-left-right-15">
	<form action="../inquiery_reports" method="post" enctype="multipart/form-data">

		<?php echo csrf_field(); ?>

		<div class="col-md-2">
			<div class="form-group has-feedback">
				<label class="sm-heading">From Date</label>
				<input type="text" class="form-control" placeholder="From Date" name="from" id="from" onkeyup="getdateofretirement();" autocomplete="off"/>
				<script type="text/javascript"> $('#from').datepicker({format: 'yyyy/mm/dd'});</script> 
			</div>			
		</div>
		<div class="col-md-2">
			<div class="form-group has-feedback">
				<label class="sm-heading">To Date</label>
				<input type="text" class="form-control" placeholder="To Date" name="to" id="to" onkeyup="getdateofretirement();" autocomplete="off" />
				<script type="text/javascript"> $('#to').datepicker({format: 'yyyy/mm/dd'});</script> 
			</div>			
		</div>
		<div class="col-md-3">
			<div class="form-group has-feedback">
				<label>Prospectives</label><br/>
				<select name="id" id="id" class="form-control">
					<option value="">Select Prospective</option>
					<?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prospect): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
					<option value="<?php echo e($prospect->id); ?>"><?php echo e($prospect->pros_name); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
				</select>
			</div>			
		</div>
		<div class="col-md-3">
			<div class="form-group has-feedback">
				<label class="sm-heading">Sales Stage </label>
				<select name="sales_stage" id="sales_stage" class="form-control" >
					<option value="">Select Sales Stage</option>
					<option value="Discovery">Discovery</option>
					<option value="Tour">Tour</option>
					<option value="Re-Tour">Re-Tour</option>
					<option value="Signing">Signing</option>
					<option value="Move In">Move In</option>
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
							<th class="th-position text-uppercase font-500 font-12">###</th>
							<th class="th-position text-uppercase font-500 font-12">Residents</th>
							<th class="th-position text-uppercase font-500 font-12">Phone No</th>
							<th class="th-position text-uppercase font-500 font-12">Email</th>
							<th class="th-position text-uppercase font-500 font-12">Address</th>
							<th class="th-position text-uppercase font-500 font-12">Contact Person</th>
							<th class="th-position text-uppercase font-500 font-12">Phone No</th>
							<th class="th-position text-uppercase font-500 font-12">Email</th>
							<th class="th-position text-uppercase font-500 font-12">Address</th>
							<th class="th-position text-uppercase font-500 font-12">Work done by</th>
						</tr>
						<?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
						<?php 
							$n = explode(",",$report->pros_name);
							$m = explode(",",$report->contact_person)
						 ?>
						<tr>
							<?php if($report->service_image == NULL): ?>
							<td><img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>	
							<?php else: ?>
							<td><img src="../hsfiles/public/img/<?php echo e($report->service_image); ?>" class="img-circle" width="40" height="40"></td>
							<?php endif; ?>
							<td><?php echo e($n[0]); ?> <?php echo e($n[1]); ?> <?php echo e($n[2]); ?></td>
							<?php 
								$basic = DB::table('change_pross_record')->where([['pros_id', $report->id], ['status', 1]])->first();{
							?>
							<td><?php echo e($basic->phone_p); ?></td>
							<td><?php echo e($basic->email_p); ?></td>
							<td><?php echo e($basic->address_p); ?></td>
							<td><?php echo e($m[0]); ?> <?php echo e($m[1]); ?> <?php echo e($m[2]); ?></td>
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