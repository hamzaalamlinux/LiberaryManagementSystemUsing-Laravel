<?php $__env->startSection('content'); ?>
   <div class="row my-5">
       <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <div class="col-md-4">
                <div class="card" style="width:400px">
                    <img class="card-img-top" src="<?php echo e(@$item->url); ?>" alt="Card image" style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo e(@$item->name); ?></h4>
                        <p class="card-text"><?php echo e(@$item->descriptions); ?></p>
                        <button type="button" class="btn btn-success" id="<?php echo e(@$item->id); ?>" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add Request
                        </button>
                    </div>
                </div>
           </div>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   </div>


<!-- Add Request Modal -->
   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Add Request</h5>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                   <form>
                       <div class="form-group">
                           <label class="col-form-label">Select Submit Date</label>
                           <input type="date" id="date" class="form-control" >
                       </div>
                       <div class="form-group ">
                           <label class="col-form-label">Message</label>
                           <textarea class="form-controls col-12" cols="4" rows="4" resize="none" autofocus>

                           </textarea>
                       </div>
                   </form>
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                   <button type="button" class="btn btn-primary">Save changes</button>
               </div>
           </div>
       </div>
   </div>
    <!-- End Modal-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\LiberaryManagement\resources\views/layouts/pages/Dashboard/Books/BooksList.blade.php ENDPATH**/ ?>