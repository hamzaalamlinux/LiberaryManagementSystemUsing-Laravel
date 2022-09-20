<?php $__env->startSection('content'); ?>
   <div class="row my-5">
       <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <div class="col-md-4">
                <div class="card" style="width:400px">
                    <img class="card-img-top" src="<?php echo e(@$item->url); ?>" alt="Card image" style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo e(@$item->name); ?></h4>
                        <p class="card-text"><?php echo e(@$item->descriptions); ?></p>
                        <a href="#" class="btn btn-primary">Add Request</a>
                    </div>
                </div>
           </div>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

   </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\LiberaryManagement\resources\views/layouts/pages/Dashboard/Books/BooksList.blade.php ENDPATH**/ ?>