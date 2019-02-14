<?php $__env->startSection('htmlheader_title'); ?>
    Facility Room Report 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
    <div class="col-lg-4 col-lg-offset-4 text-center">
      <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Facility Room Report</strong></h3>
    </div>
    <div class="col-lg-4">
      <span class="pull-right" style="padding-right:30px;">
	  <a href="<?php echo e(url('facility_room_graph/'.$id)); ?>" class="btn btn-success btn-sm" style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back To Graph</a>
	  <button class="btn btn-primary" onclick="printDiv('printableDiv')" id="printButton"><i class="material-icons md-22"> print </i> Print</button>
	</span>
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
<style  type = "text/css" media = "screen">
	.print-header{ display:none; }
	thead{ display:none;}
	tfoot{ display:none; }
</style>
<div class="row">
    <div class="col-md-12">	
        <div class="box box-primary border">
			<div class="box-body border padding-top-0 padding-left-right-0">
                <div class="table-responsive" id="printableDiv">
   					<table class="table">
						<thead>
							<?php 
								$facility_info = DB::table('facility')->where('id', Auth::user()->facility_id)->first();
							?>	
							<tr>								
								<td><div style="width: 80px">
									<?php if($facility_info->facility_logo == NULL): ?>
   										<img src="http://seniorsafetech.com/angel_home_s_admin/hsfiles/public/facility_logo/images.png"/>
   									<?php else: ?>
   										<img src="http://seniorsafetech.com/angel_home_s_admin/hsfiles/public/facility_logo/<?php echo e($facility_info->facility_logo); ?>" />
   									<?php endif; ?>
								</div></td>							
								<td colspan="7">
									<p><b></b><br/>
									<b><?php echo e($facility_info->facility_name); ?>, <?php echo e($facility_info->address); ?>, <?php echo e($facility_info->address_two); ?></b><br/>
									<b><?php echo e($facility_info->phone); ?></b><br/>
									<b><?php echo e($facility_info->facility_email); ?></b></p>
									
								</td>								
							</tr>								
						</thead>					
                        <tbody>
   							<tr>
   								<th class="th-position text-uppercase font-500 font-12">Room no</th>
   								<th class="th-position text-uppercase font-500 font-12">Room Type</th>
   								<th class="th-position text-uppercase font-500 font-12">Unit Status</th>
   								<th class="th-position text-uppercase font-500 font-12">Original Rate</th>
   								<th class="th-position text-uppercase font-500 font-12">Our Room Rate</th>
   								<th class="th-position text-uppercase font-500 font-12">By</th>
   							</tr>
							<?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
   							<tr>
   								<td><?php echo e($report->room_no); ?></a></td>
   								<td><?php echo e($report->room_type); ?></td>
   								<?php if($report->room_status==0): ?>
   								<td class="text-danger"><b>Vacant<b/></td>
   								<td><?php echo e($report->price); ?></td>
   								<td>0</td>
   								<td></td>
   								<?php endif; ?>
								   <?php if($report->room_status==1): ?>
								   <?php 
										$doc = DB::table('resident_room')
											->Join('sales_pipeline', 'resident_room.pros_id', '=', 'sales_pipeline.id')
											->where([['room_id',$report->room_id]])->first();
											$n = explode(",",$doc->pros_name);
									?>
									<?php if($doc->stage === "MoveIn"): ?>
								   		<td class="text-success"><b>Occupied</b></td>
									<?php else: ?>
										<td class="text-success"><b>Booked</b></td>
									<?php endif; ?>
									<td><?php echo e($report->price); ?></td>
									<td><?php echo e($doc->price); ?></td>
									<td><?php echo e($n[0]); ?> <?php echo e($n[1]); ?> <?php echo e($n[2]); ?></td>
   								<?php endif; ?>
   							</tr>
   							<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </tbody>
						<tfoot>
							<tr>
								<td colspan="8">Powered by Senior Safe Technology LCC</td>
							</tr>
						</tfoot>
                    </table>
                </div>
			</div>                
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-extra'); ?>
<script>
	function printDiv(printableDiv) {
		var printContents = document.getElementById(printableDiv).innerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;
		window.location.reload(true);
	}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>