


<?php $__env->startSection('htmlheader_title'); ?>
    Facility Info 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
    <div class="col-lg-4 col-lg-offset-4 text-center">
      <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Total Revenue Of Each Facility</strong></h3>
    </div>
    <div class="col-lg-4">
      <a href="<?php echo e(url('facility_aggregated_revenue_graph')); ?>" class="btn btn-info btn-sm pull-right" style="margin-right:15px;border-radius:5px;"><i class="material-icons">details</i>Aggregated Group Report</a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<style>	
	.content-header
	{
		padding: 2px 0px 1px 20px;
		margin-bottom: -18px;
	}	
</style>
    <!--<div class="row">
		<form action="inquiery_reports" method="post" enctype="multipart/form-data">
			<?php echo csrf_field(); ?>

			<div class="col-md-4">
				<div class="form-group has-feedback">
					<label class="sm-heading">From Date</label>
					<input type="text" class="form-control" placeholder="From Date" name="from" id="from" onkeyup="getdateofretirement();" autocomplete="off"/>
					<script type="text/javascript"> $('#from').datepicker({format: 'yyyy/mm/dd'});</script> 
				</div>			
			</div>
			<div class="col-md-4">
				<div class="form-group has-feedback">
					<label class="sm-heading">To Date</label>
					<input type="text" class="form-control" placeholder="To Date" name="to" id="to" onkeyup="getdateofretirement();" autocomplete="off" />
					<script type="text/javascript"> $('#to').datepicker({format: 'yyyy/mm/dd'});</script> 
				</div>			
			</div>			
			<div class="col-md-4">
				<div class="form-group has-feedback">
					<button type="submit" class="btn btn-primary btn-block btn-flat padding-top-bottom-4" style="width:90% !important; margin-top:24px">
						<i class="material-icons"> search </i> Search
					</button>
				</div>			
			</div>
		</form>
	</div>
	<script type="text/javascript">
		$(".myselect").select2();
	</script>-->
	<div class="row">
	<br/>
        <div class="col-md-12">	
            <div class="box box-primary border">				
                <div class="box-header with-border col-sm-2 pull-right">                   
                </div>
				
                <div class="box-body border padding-top-0 padding-left-right-0">
                    <table class="table">
                        <tbody>
							<tr>
								<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Facility"); ?></th>
								<th class="th-position text-uppercase font-500 font-12">Address</th>
								<th class="th-position text-uppercase font-500 font-12">Phone no</th>
								<th class="th-position text-uppercase font-500 font-12">Email</th>
								<th class="th-position text-uppercase font-500 font-12">View details</th>
							</tr>
							<?php $__currentLoopData = $facilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facility): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
							<tr>
								<td><?php echo e($facility->facility_name); ?></a></td>
								<td><?php echo e($facility->address); ?></td>
								<td><?php echo e($facility->phone); ?></td>
								<td><?php echo e($facility->facility_email); ?></td>
								<td class="padding-left-45"><a href="facility_graph_reports/<?php echo e($facility->id); ?>">
									<i class="material-icons material-icons md-22 gray"> visibility </i></a>
								</td>		
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