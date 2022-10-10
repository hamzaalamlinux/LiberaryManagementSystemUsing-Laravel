<?php $__env->startSection('content'); ?>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <?php echo $__env->make('layouts.pages.Errors.ValidationError', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <form class="forms-sample" method="post" name="addusers" action="<?php echo e(route('AddUsers')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text"  name="name" required class="form-control" id="exampleInputName1" placeholder="Name">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputCity1">Date</label>
                        <input type="password" name="password" required class="form-control" id="exampleInputCity1" placeholder="Enter Password">
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Submit</button>

                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\LiberaryManagement\resources\views/layouts/pages/Dashboard/Users/AddUser.blade.php ENDPATH**/ ?>