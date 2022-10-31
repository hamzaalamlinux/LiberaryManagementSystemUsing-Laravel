<?php $__env->startSection('content'); ?>

    <div class="table-responsive my-5">

        <table class="table my-3">
            <h2>Panelty</h2>
            <thead>
            <tr>
                <th scope="col">Sno</th>
                <th scope="col">Paneltie</th>
                <th scope="col">Update</th>
            </tr>
            </thead>
            <tbody id="Paneltiesdetails">
            <?php
                $count = 1;
            ?>
            <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td ><?php echo e($count++); ?></td>
                    <td contenteditable="true"  onKeyPress="return isNumber(event)"><?php echo e($item->amount); ?></td>
                    <td><a href="javascript:void(0)" onclick="EditPanelties()" class="nav-link text-white"><i class="fa fa-edit"></i></a></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\LiberaryManagement\resources\views/layouts/pages/Dashboard/Panelty/GetPanelties.blade.php ENDPATH**/ ?>