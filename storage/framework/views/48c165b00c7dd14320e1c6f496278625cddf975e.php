<?php $__env->startSection('content'); ?>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <?php echo $__env->make('layouts.pages.Errors.ValidationError', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <form class="forms-sample" method="post" name="addusers"  action="<?php echo e(@url('AddRole')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <label for="exampleInputName1">Users</label>
                          <select name="role" class="form-control">
                              <option value=""></option>
                              <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputCity1">Roles</label>
                        <select name="user" class="form-control">

                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>

                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\LiberaryManagement\resources\views/layouts/pages/Dashboard/Roles/AddRole.blade.php ENDPATH**/ ?>