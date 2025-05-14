<?php $__env->startSection('title', 'User Profile'); ?>
<?php $__env->startSection('content'); ?>
	<div class="breadcrumb-area pt-205 breadcrumb-padding pb-210" style="background-image: url(<?php echo e(asset('frontend/assets/img/bg/breadcrumb.jpg')); ?>)">
		<div class="container-fluid">
			<div class="breadcrumb-content text-center">
				<h2>Register</h2>
				<ul>
					<li><a href="#">home</a></li>
					<li>register</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="shop-page-wrapper shop-page-padding ptb-100">
		<div class="container-fluid">
			<?php if(session()->has('message')): ?>
				<div class="alert alert-success">
					<?php echo e(session()->get('message')); ?>

				</div>
			<?php endif; ?>
			<div class="row">
				<div class="col-lg-3">
                    <h3 class="sidebar-title">User Menu</h3>
                    <div class="sidebar-categories">
                        <ul>
                            <li><a href="<?php echo e(url('profile')); ?>">Profile</a></li>
                            <li><a href="<?php echo e(url('orders')); ?>">Orders</a></li>
                            <li><a href="<?php echo e(url('favorites')); ?>">Favorites</a></li>
                        </ul>
                    </div>
				</div>
				<div class="col-lg-9">
					<div class="login">
						<div class="login-form-container">
							<div class="login-form">
									<form action="<?php echo e(route('profile.update')); ?>" method="post">
									<?php echo csrf_field(); ?>
                                    <?php echo method_field('put'); ?>
									<div class="form-group row">
										<div class="col-md-12">
                                            <label for="username">Username</label>
                                            <input type="text" name="username" value="<?php echo e(auth()->user()->username); ?>">
                                            <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
												<div class="alert alert-danger"><?php echo e($message); ?></div>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-md-6">
                                            <label for="first_name">First Name</label>
                                            <input type="text" name="first_name" value="<?php echo e(auth()->user()->first_name); ?>">
                                            <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
												<div class="alert alert-danger"><?php echo e($message); ?></div>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
										</div>
										<div class="col-md-6">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" name="last_name" value="<?php echo e(auth()->user()->last_name); ?>">
                                            <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
												<div class="alert alert-danger"><?php echo e($message); ?></div>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
										</div>
									</div>

									<div class="form-group row">
										<div class="col-md-12">
                                            <label for="address1">Address1</label>
                                            <textarea name="address1" rows="5"><?php echo e(auth()->user()->address1); ?></textarea>
											<?php $__errorArgs = ['address1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
												<div class="alert alert-danger"><?php echo e($message); ?></div>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
										</div>
									</div>

									<div class="form-group row">
										<div class="col-md-12">
                                            <label for="address2">Address2</label>
                                            <textarea name="address2" rows="5"><?php echo e(auth()->user()->address2); ?></textarea>
											<?php $__errorArgs = ['address2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
												<div class="alert alert-danger"><?php echo e($message); ?></div>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
										</div>
									</div>

									<div class="form-group row">
										<div class="col-md-6">
                                            <label>Province<span class="required">*</span></label>
                                            <select name="province_id" id="province-id" value="<?php echo e(auth()->user()->province_id); ?>">
                                                    <option value="">- Please Select -</option>
                                                <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province => $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php echo e(auth()->user()->province_id == $province ? 'selected' : null); ?> value="<?php echo e($province); ?>"><?php echo e($pro); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select> 
											<?php $__errorArgs = ['province_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
												<div class="alert alert-danger"><?php echo e($message); ?></div>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
										</div>
										<div class="col-md-6">
                                            <label>City<span class="required">*</span></label>
                                            <select name="city_id" id="city-id"  value="<?php echo e(auth()->user()->city_id); ?>" >
                                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city => $ty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php echo e(auth()->user()->city_id == $city ? 'selected' : null); ?> value="<?php echo e($city); ?>"><?php echo e($ty); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select> 
											<?php $__errorArgs = ['city_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
												<div class="alert alert-danger"><?php echo e($message); ?></div>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
										</div>
									</div>

									<div class="form-group row">
										<div class="col-md-6">
                                        <label>Postcode / Zip <span class="required">*</span></label>						
									    <input type="number" name="postcode" placeholder="PostalCode..." value="<?php echo e(auth()->user()->postcode); ?>">
											<?php $__errorArgs = ['postcode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
												<div class="alert alert-danger"><?php echo e($message); ?></div>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
										</div>
										<div class="col-md-6">
                                            <label>Phone  <span class="required">*</span></label>		
									        <input type="number" name="phone" placeholder="Phone..." value="<?php echo e(auth()->user()->phone); ?>">
											<?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
												<div class="alert alert-danger"><?php echo e($message); ?></div>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
										</div>
									</div>

									<div class="form-group row">
										<div class="col-md-12">
                                            <label>Email Address </label>
									        <input type="text" name="email" placeholder="Email..." value="<?php echo e(auth()->user()->email); ?>">		
											<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
												<div class="alert alert-danger"><?php echo e($message); ?></div>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
										</div>
									</div>
									<div class="button-box">
										<button type="submit" class="default-btn floatright">Update Profile</button>
									</div>
                                </form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- register-area end -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Storage/Document/project/joki/laravel-ecommerce/resources/views/frontend/users/profile.blade.php ENDPATH**/ ?>