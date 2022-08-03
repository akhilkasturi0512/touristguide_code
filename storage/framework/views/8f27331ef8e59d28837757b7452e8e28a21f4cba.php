<?php $__env->startSection('title'); ?>
    <title>MeraRooms | Login</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section>         
    <div class="container-fluid p-0">
      <div class="row">
        <div class="col-12">
          <div class="login-card">
              
            <form method="POST" action="<?php echo e(route('admin.post.login')); ?>" class="theme-form login-form">
                <?php echo csrf_field(); ?>
              <h4>Login</h4>
              <h6>Welcome back! Log in to your account.</h6>
              <div class="form-group">
                <label>Email Address</label>
                <div class="input-group"><span class="input-group-text"><i class="icon-email"></i></span>
                  <input class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="email" id="email" name="email" required="required" placeholder="admin@gmail.com">
                </div>
              </div>
             
              <div class="form-group">
                <label>Password</label>
                <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                  <input class="form-control  <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="password" name="password" required="required" placeholder="*********">
                  <!--<div class="show-hide"><span class="show"> </span></div>-->
                </div>
              </div>

              <div class="form-group">
                <div class="checkbox">

                </div><a class="link" href="<?php echo e(route('password.request')); ?>">Forgot password?</a>
              </div>
              <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Sign in</button>
              </div>
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/merarum/public_html/app/resources/views/auth/login.blade.php ENDPATH**/ ?>