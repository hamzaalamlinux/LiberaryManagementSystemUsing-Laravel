<?php if(count($errors) > 0 ): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close validation-error" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <ul class="p-0 m-0" style="list-style: none;">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>

<?php endif; ?>
<?php if(session('message')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close validation-error" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <ul class="p-0 m-0" style="list-style: none;">

                <li><?php echo e(session('message')); ?></li>

        </ul>
    </div>
<?php endif; ?>


<?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close validation-error" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <ul class="p-0 m-0" style="list-style: none;">

            <li><?php echo e(session('success')); ?></li>

        </ul>
    </div>
<?php endif; ?>
<?php /**PATH E:\LiberaryManagement\resources\views/layouts/pages/Errors/ValidationError.blade.php ENDPATH**/ ?>