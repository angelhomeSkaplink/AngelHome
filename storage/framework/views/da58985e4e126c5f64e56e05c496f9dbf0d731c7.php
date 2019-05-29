<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <title> <?php echo $__env->yieldContent('htmlheader_title', 'Your title here'); ?> </title>
    <!--===============================================================================================-->	
	    <link rel="icon" type="image/png" href="<?php echo e(asset('/public/login/images/icons/favicon.ico')); ?>"/>
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/public/login/vendor/bootstrap/css/bootstrap.min.css')); ?>">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/public/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')); ?>">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/public/login/vendor/animate/animate.css')); ?>">
    <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/public/login/vendor/css-hamburgers/hamburgers.min.css')); ?>">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/public/login/vendor/select2/select2.min.css')); ?>">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/public/login/css/util.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/public/login/css/main.css')); ?>">
    <!--===============================================================================================-->
</head>

<?php echo $__env->yieldContent('content'); ?>

</html>