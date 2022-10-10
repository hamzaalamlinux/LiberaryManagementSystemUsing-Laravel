<?php $__env->startSection('content'); ?>

    <div class="table-responsive my-5">



        <table class="table my-3">
            <h2>List Orf Users</h2>
            <thead>
            <tr>
                <th scope="col">Sno</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Creation Date</th>
                <th scope="col">Action</th>

            </tr>
            </thead>
            <tbody id="details">
            <?php
                $count = 1;
            ?>
            <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                        <td><?php echo e($count++); ?></td>
                        <td><?php echo e($item->name); ?></td>
                        <td><?php echo e($item->email); ?></td>
                        <td><?php echo e($item->created_at); ?></td>
                        <td>Action</td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\LiberaryManagement\resources\views/layouts/pages/Dashboard/Users/Users.blade.php ENDPATH**/ ?>