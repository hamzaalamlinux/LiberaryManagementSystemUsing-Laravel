<?php $__env->startSection('content'); ?>

    <div class="table-responsive my-5">
        <div>

            <button class="btn btn-success mx-4" onclick="Approve()">Approve</button>
        </div>


        <table class="table my-3">
            <caption>List of users</caption>
            <thead>
            <tr>
                <th><input onclick="checkAll()" type="checkbox" ></th>
                <th scope="col">BookName</th>
                <th scope="col">Authorname</th>
                <th scope="col">Last Date</th>
                <th scope="col">Message</th>
                <th scope="col">Image</th>

            </tr>
            </thead>
            <tbody id="details">
            <?php
              $count = 1;
            ?>
            <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><input class="chx" id="<?php echo e($item->request_id); ?>" type="checkbox" ></td>
                    <td><?php echo e($item->name); ?></td>
                    <td><?php echo e($item->AuthorName); ?></td>
                    <td><?php echo e($item->endate); ?></td>
                    <td><?php echo e($item->message); ?></td>
                    <td><img  src="<?php echo e(@$item->url); ?>" alt="Card image" ></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\LiberaryManagement\resources\views/layouts/pages/Dashboard/Books/PendingBookRequest.blade.php ENDPATH**/ ?>