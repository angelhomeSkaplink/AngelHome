<?php $__env->startSection('htmlheader_title'); ?>
    Payment History
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Payment History</strong></h3>
	</div>
	<div class="col-lg-4">
		<a href="<?php echo e(url('payment_report')); ?>" class="btn btn-success btn-block btn-flat btn-width btn-sm " style="margin-right:15px;border-radius:5px;" onclick="history.back();"><i class="material-icons">keyboard_arrow_left</i>Back</a>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<style>
	.content-header
	{
		/* //display:none; */
		padding: 2px 0px 1px 20px;
		margin-bottom: -10px;
	}
		
	.content {
		margin-top: 15px;
	}
	.form-control{
		//text-transform: uppercase;
	}
</style>
<?php 
$person = DB::table('sales_pipeline')->where('id',$id)
			->join('resident_details','sales_pipeline.id','=','resident_details.pros_id')
			->first();
$room = DB::table('resident_room')
		->join('facility_room','resident_room.room_id','=','facility_room.room_id')
		->where([['resident_room.pros_id',$id],['resident_room.status',1]])->first();
if($room){
	$room_no = $room->room_no;
}
else{
	$room_no = "No Room Booked";
}
if($person){
	$age = (date('Y') - date('Y',strtotime($person->dob)))." years";
}
else{
	$person = DB::table('sales_pipeline')->where('id',$id)->first();
	$age = "Not specified";
}
$name =  explode(",",$person->pros_name);
 ?>
<div class="row" >
	<div class="col-lg-12 table-responsive">
		<table class="table">
			<tr style="background-color:rgb(49, 68, 84) !important;margin:0.5px;">
				<td>
						<h4><?php if($person->service_image == null): ?>
								<img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40">
							<?php else: ?>
								<img src="../hsfiles/public/img/<?php echo e($person->service_image); ?>" class="img-circle" width="40" height="40">
							<?php endif; ?>
							<span class="text-success" style="color:aliceblue;"><strong><?php echo e($name[0]); ?> <?php echo e($name[1]); ?> <?php echo e($name[2]); ?></strong>
						</h4>
				</td>				
				<td>
						<h4 class="text-center" style="margin-top:20px;">	<span class="text-center" style="color:aliceblue;"><strong>Room No: <?php echo e($room_no); ?> </strong></span></h4>
				</td>
				<td>
						<h4><span class="pull-right" style="color:aliceblue;margin-top:10px;"><strong>Age: <?php echo e($age); ?> </strong></span></h4>
				</td>
			</tr>
		</table>
	</div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">
            <div class="box-body border padding-top-0 padding-left-right-0">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
							<tr>
								<th class="th-position text-uppercase font-500 font-12">Payable amount</th>
								<th class="th-position text-uppercase font-500 font-12">Amount paid</th>
								<th class="th-position text-uppercase font-500 font-12">Outstanding Amount</th>
								<th class="th-position text-uppercase font-500 font-12">Amount to be paid</th>
								<th class="th-position text-uppercase font-500 font-12">month</th>
								<th class="th-position text-uppercase font-500 font-12">year</th>
								<th class="th-position text-uppercase font-500 font-12">Payment date</th>
								<th class="th-position text-uppercase font-500 font-12">Status</th>	
								<!--<th class="th-position text-uppercase font-500 font-12">work done by</th>-->	
							</tr>
							<?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
							<tr>
								<td><?php echo e($report->ammount_pay); ?></td>								
								<td><?php echo e($report->ammount_paid); ?></td>
								<td><?php echo e($report->balance); ?></td>
								<td><?php echo e($report->due_ammount); ?></td>
								<td><?php echo e($report->month); ?></td>
								<td><?php echo e($report->year); ?></td>
								<td class=""><?php echo e($report->payment_date); ?></td>
								<?php if($report->due_ammount == 0): ?>
								<td class="text-success"><b>Fully Paid</b></td>
								<?php endif; ?>
								<?php if($report->due_ammount != 0): ?>
								<td class="text-danger"><b>Partially Paid</b></td>
								<?php endif; ?>
								<!--<td>Nandan Choudhury</td>-->
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </tbody>
                    </table>
                </div>
				<div class="text-center"><?php echo e($reports->links()); ?></div>					
            </div>                
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-extra'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>