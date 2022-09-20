<?php $__env->startSection('content'); ?>
<form action="<?php echo e(route('login')); ?>" method="post" name="login">
    <?php echo e(csrf_field()); ?>

    <?php echo $__env->make('layouts.pages.Errors.ValidationError', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Email address</label>
                              <input type="email" name="email" autocomplete="off"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Password</label>
                              <input type="password" name="password" autocomplete="off" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
                           </div>
                           <!-- <div class="form-group">
                              <p class="text-center">By signing up you accept our <a href="#">Terms Of Use</a></p>
                           </div> -->
                           <div class="col-md-12 text-center ">
                              <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Login</button>
                           </div>
                           <div class="col-md-12 ">
                              <div class="login-or">
                                 <hr class="hr-or">
                                 <span class="span-or">or</span>
                              </div>
                           </div>
                           <!-- <div class="col-md-12 mb-3">
                              <p class="text-center">
                                 <a href="javascript:void();" class="google btn mybtn"><i class="fa fa-google-plus">
                                 </i> Signup using Google
                                 </a>
                              </p>
                           </div> -->
                           <div class="form-group">
                              <p class="text-center">Don't have account? <a href="#" id="signup">Sign up here</a></p>
                           </div>
                        </form>

				</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.login_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\LiberaryManagement\resources\views/layouts/index.blade.php ENDPATH**/ ?>