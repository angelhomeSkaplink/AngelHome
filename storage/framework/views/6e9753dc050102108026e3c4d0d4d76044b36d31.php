

<?php $__env->startSection('htmlheader_title'); ?>
    Page not found
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
    404 Error Page
<?php $__env->stopSection(); ?>

<?php $__env->startSection('$contentheader_description'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="error-page">
    <h2 class="headline text-yellow"> 404</h2>
    <div class="error-content">
        <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>
        <p>
            We could not find the page you were looking for.
            Meanwhile, you may <a href='<?php echo e(url('/')); ?>'>return to dashboard</a> or try using the search form.
        </p>
    </div><!-- /.error-content -->
</div><!-- /.error-page -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>