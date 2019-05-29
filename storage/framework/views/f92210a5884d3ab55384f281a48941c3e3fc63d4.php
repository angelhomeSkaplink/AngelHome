<?php if(count($errors)): ?>
<div class="form-group">
  <div class="alert alert-danger">
    <ul>
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
      <li class="text-center"><?php echo e($error); ?></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </ul>
  </div>
</div>
<?php endif; ?>
