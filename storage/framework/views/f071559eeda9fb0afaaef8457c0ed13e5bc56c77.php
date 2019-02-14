<?php $__env->startSection('htmlheader_title'); ?>
    Stocks List
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
    <p class="text-danger"><b>Stocks List</b>
    <a href="<?php echo e(url('medicine_stocks_list')); ?>" class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:120px !important; margin-top: -2px; margin-bottom: 9px !important; margin-right: 10px;"><i class="material-icons md-14 font-weight-600"> keyboard_arrow_left </i>Go Back</a>
    </p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<style>	
	.content-header
	{
	padding: 2px 0px 1px 20px;
		margin-bottom: -18px;
	}
	.content {
		margin-top: 15px;
	}
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
                                <th class="th-position text-uppercase font-500 font-12">Pros Name</th>
                                <th class="th-position text-uppercase font-500 font-12">End Date</th>
                                <th class="th-position text-uppercase font-500 font-12">Pharmacy</th>
                                <th class="th-position text-uppercase font-500 font-12">Phone</th>
                                <th class="th-position text-uppercase font-500 font-12">Renew</th>
                            </tr>
    
                            <?php if(count($pending_stocks) != 0): ?>
                            <?php $__currentLoopData = $pending_stocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <td class="th-position font-12"><?php echo e($stock->medicine_name); ?></td>
                                <td class="th-position font-12"><?php echo e($stock->pros_name); ?></td>
                                <td class="th-position font-12"><?php echo e($stock->course_end_date); ?></td>
                                <td class="th-position font-12"><?php echo e($stock->pharmacy_name); ?></td>
                                <td class="th-position font-12"><?php echo e($stock->pharmacy_phone); ?></td>
                                <td class="th-position font-12">
                                    <a href="renewal_complete/<?php echo e($stock->medi_stock_id); ?>" data-toggle="tooltip" data-placement="bottom" onclick="return confirm_click();">
                                        <i class="material-icons">phone_in_talk</i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            <?php else: ?>
                            <tr>
                                <td class="th-position font-12">All Clear.<br>No Pending renewals.</td>
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

<script type="text/javascript">
    function confirm_click()
    {
        return confirm("Are you sure that this stock has been renewed?");
    }
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>