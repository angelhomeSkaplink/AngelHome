<!-- Nilutpal Boruah Jr. -->



<?php $__env->startSection('htmlheader_title'); ?>
    Medicine Stocks List
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<?php
    $count_alert = 0;
    foreach ($stocks as $stock)
    {
        if ($stock->stock_alert == 1) {
            $count_alert += 1;
        }
    }
?>
<div class="row">
	<div class="col-sm-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Medicine Stock List</strong></h3>
    </div>
    <div class="col-sm-4">
       <span class="pull-right"> <a href="<?php echo e(url('add_stocks')); ?>" class="btn btn-success btn-sm " style="margin-right:15px;border-radius:5px;" ><i class="material-icons">add</i>Add New</a>
        <a href="<?php echo e(url('renew_list')); ?>" class="btn btn-warning btn-sm " style="margin-right:15px;border-radius:5px;" ><i class="material-icons">warning</i>Renew (<?php echo e($count_alert); ?>)</a>
       </span>
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
            <div class="box-body border padding-top-0 padding-left-right-0">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th class="th-position text-uppercase font-500 font-12">Medicine</th>
                                <th class="th-position text-uppercase font-500 font-12">Pharmacy</th>
                                <th class="th-position text-uppercase font-500 font-12">Order Date</th>
                                <th class="th-position text-uppercase font-500 font-12">Course Upto</th>
                                <th class="th-position text-uppercase font-500 font-12">###</th>
                                <th class="th-position text-uppercase font-500 font-12">Resident</th>
                                <th class="th-position text-uppercase font-500 font-12">Order Status</th>
                                <th class="th-position text-uppercase font-500 font-12">Received?</th>
                                <th class="th-position text-uppercase font-500 font-12">Stock Upto</th>
                            </tr>
    
                            <?php if(count($stocks) != 0): ?>
                            <?php $__currentLoopData = $stocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <?php 
                                $n = explode(",",$stock->pros_name);
                             ?>
                            <tr>
                                <td class="th-position font-12">
                                    <!-- <a href="view_stock_details/<?php echo e($stock->medicine_name); ?>"><?php echo e($stock->medicine_name); ?></a> -->
                                    <?php echo e($stock->medicine_name); ?>

                                </td>
                                <td class="th-position font-12"><?php echo e($stock->pharmacy_id); ?></td>
                                <td class="th-position font-12"><?php echo e($stock->stock_order_date); ?></td>
                                <td class="th-position font-12"><?php echo e($stock->course_end_date); ?></td>
                                <?php if($stock->service_image == NULL): ?>
    								<td><img src="hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="30" height="30"></td>
    								<?php else: ?>
    								<td><img src="hsfiles/public/img/<?php echo e($stock->service_image); ?>" class="img-circle" width="30" height="30"></td>
    								<?php endif; ?>
                                <td class="th-position font-12"><?php echo e($n[0]); ?> <?php echo e($n[1]); ?> <?php echo e($n[2]); ?></td>
    
                                <?php if($stock->order_status == 0): ?>
                                <td class="th-position font-12">Request Sent</td>
                                <?php elseif($stock->order_status == 1): ?>
                                <td class="th-position font-12">Approved</td>
                                <?php elseif($stock->order_status == 2): ?>
                                <td class="th-position font-12">Delivered</td>
                                <?php elseif($stock->order_status == 3): ?>
                                <td class="th-position font-12">Cancelled</td>
                                <?php endif; ?>
    
                                <td class="th-position font-12">
                                    <?php if($stock->order_status == 0): ?>
                                        ------
                                    <?php elseif($stock->order_status == 1): ?>
                                    <a href="add_recv_date/<?php echo e($stock->medi_stock_id); ?>" data-toggle="tooltip" data-placement="bottom">
                                        <i class="material-icons gray md-22"> check_box</i>
                                    </a>
                                    <?php elseif($stock->order_status == 2): ?>
                                        Order Complete
                                    <?php elseif($stock->order_status == 3): ?>
                                        N/A
                                    <?php endif; ?>
                                </td>
    
                                <td class="th-position font-12">
                                    <?php if($stock->order_status == 0): ?>
                                        ------
                                    <?php elseif($stock->order_status == 1): ?>
                                        ------
                                    <?php elseif($stock->order_status == 2): ?>
                                        <?php echo e($stock->stock_upto); ?>

                                    <?php elseif($stock->order_status == 3): ?>
                                        N/A
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            <?php else: ?>
                            <tr>
                                <td class="th-position font-12">No Records Found</td>
                            </tr>
                            <?php endif; ?>
    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-extra'); ?>

<?php if($count_alert > 0): ?>
<script type="text/javascript">
    alert("You have <?php echo $count_alert; ?> pending stock renewal!");
</script>
<?php endif; ?>

<script type="text/javascript">
    function confirm_click()
    {
        return confirm("Are you sure the stock is Delivered?");
    }
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>