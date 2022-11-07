<?php if(count($errors) > 0): ?>
  <div class="alert alert-danger">
      <ul>
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($error=="The password format is invalid."): ?>
          	<li>The password format:
          	<?php echo session("pwd_error"); ?>

          </li>
          <?php else: ?>
           <li><?php echo e($error); ?></li>
          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
  </div>
<?php endif; ?><?php /**PATH C:\xampp64\htdocs\laravel\resources\views/shared/_errors.blade.php ENDPATH**/ ?>