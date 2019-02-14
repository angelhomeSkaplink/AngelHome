<!-- Nilutpal Boruah Jr. -->



<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo app('translator')->get("msg.Medical Information"); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
    <div class="col-lg-4 col-lg-offset-4 text-center">
        <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Medical Information</strong></h3>
    </div>
    <div class="col-lg-4"> 
        <span class="pull-right">
        <a href="<?php echo e(url('patients_list')); ?>" class="btn btn-success btn-sm " style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back</a>
        <a href="<?php echo e(url('add_patient_details/'.$id)); ?>" class="btn btn-primary btn-sm " style="margin-right:15px;border-radius:5px;"><i class="material-icons">add</i>Add New</a>
        </span>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>

<?php if(count($qry_data) != 0): ?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">
            <div class="box-body border padding-top-0 padding-left-right-0">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Medicine Name"); ?></th>
                                <th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Quantity"); ?></th>
    							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Frequency"); ?></th>
                                <th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Time To Take Medicine"); ?></th>
    							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Continue Till"); ?></th>
                                <th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Apply Medicine On"); ?></th>
    							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Action"); ?></th>
                            </tr>
                            <?php $__currentLoopData = $qry_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qry_data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <td><?php echo e($qry_data->medicine_name); ?></td>
    							<td><?php echo e($qry_data->quantity_of_med); ?></td>
    							<td><?php echo e($qry_data->frequency_in_a_day); ?></td>
                                <td><?php echo e($qry_data->time_to_take_med); ?></td>
    							<td><?php echo e($qry_data->course_date); ?></td>
    
                                <td class="th-position font-12">
                                <?php if($qry_data->on_monday == 1 && $qry_data->on_tuesday == 1 && $qry_data->on_wednesday == 1 && $qry_data->on_thursday == 1 && $qry_data->on_friday == 1 && $qry_data->on_saturday == 1 && $qry_data->on_sunday == 1): ?>
                                    <span><?php echo app('translator')->get("msg.All Days"); ?></span>
                                <?php else: ?>
                                    <?php if($qry_data->on_monday == 1): ?>
                                        <span><?php echo app('translator')->get("msg.Monday"); ?> </span>
                                    <?php endif; ?>
                                    <?php if($qry_data->on_tuesday == 1): ?>
                                        <span><?php echo app('translator')->get("msg.Tuesday"); ?> </span>
                                    <?php endif; ?>
                                    <?php if($qry_data->on_wednesday == 1): ?>
                                        <span><?php echo app('translator')->get("msg.Wednesday"); ?> </span>
                                    <?php endif; ?>
                                    <?php if($qry_data->on_thursday == 1): ?>
                                        <span><?php echo app('translator')->get("msg.Thursday"); ?> </span>
                                    <?php endif; ?>
                                    <?php if($qry_data->on_friday == 1): ?>
                                        <span><?php echo app('translator')->get("msg.Friday"); ?> </span>
                                    <?php endif; ?>
                                    <?php if($qry_data->on_saturday == 1): ?>
                                        <span><?php echo app('translator')->get("msg.Saturday"); ?> </span>
                                    <?php endif; ?>
                                    <?php if($qry_data->on_sunday == 1): ?>
                                        <span><?php echo app('translator')->get("msg.Sunday"); ?> </span>
                                    <?php endif; ?>
                                <?php endif; ?>
                                </td>
    
                                <td class="padding-left-22">
                                    <a data-toggle="tooltip" data-placement="bottom" data-original-title="Delete" href="<?php echo e(url('delete_records/' . $qry_data->pat_medi_id . '/' . $qry_data->pros_id)); ?>" onclick="return confirm('Are you sure you want to delete this record?');" ><i class="material-icons gray md-22"> delete</i></a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php elseif(count($qry_data) == 0): ?>
<div class="box box-primary" style="padding:15px;margin-top:22px;">
    <div class="container">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">

                <div style="clear:both; margin-top:7px"></div>
                    <span class="font-14"><?php echo app('translator')->get("msg.No Record Found For This Patient"); ?></span>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<script type="text/javascript">
    function confirmDelete()
    {
        var del = false;
        if(confirm("Delete this record?") == true)
        {
            del = true;
        }
        else
        {
            del = false;
        }
        return del;
    }
</script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-extra'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>