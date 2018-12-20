<?php $__env->startSection('htmlheader_title'); ?>
    Facility Room Report 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
    <p class="text-danger"><b>Facility room report</b>
	<a href="<?php echo e(url('facility_room_graph/' . $id)); ?>" class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:150px !important; height:26px !important; margin-right: 15px; !important;"><i class="material-icons md-14 font-weight-600"> keyboard_arrow_left </i> Back to graph</a>
    </p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<style>	
	.content-header{
		padding: 2px 0px 1px 20px;
		margin-bottom: -18px;
	}
	#printButton {
		position: fixed;
		bottom: 30px;
		right: 25px; 
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
            <div class="box-header with-border col-sm-2 pull-right">                   
            </div>
            <div class="box-body border padding-top-0 padding-left-right-0">
                <div id="printableDiv">
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
									?>
									<?php if($doc->stage === "MoveIn"): ?>
								   		<td class="text-success"><b>Occupied</b></td>
									<?php else: ?>
										<td class="text-success"><b>Booked</b></td>
									<?php endif; ?>
									<td><?php echo e($report->price); ?></td>
									<td><?php echo e($doc->price); ?></td>
									<td><?php echo e($doc->pros_name); ?></td>
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
                <button class="btn btn-info pull-right" id="printButton" type="submit" onclick="printDiv('printableDiv')">Print<i class="material-icons md-22" aria-hidden="true"> description </i></button>
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
	}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>