<?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <?php if(session()->has($msg)): ?>
    <div class="flash-message">
      <p class="alert alert-<?php echo e($msg); ?>">
        <?php echo e(__(session()->pull($msg))); ?>

      </p>
    </div>
  <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp64\htdocs\laravel\resources\views/shared/_messages.blade.php ENDPATH**/ ?>