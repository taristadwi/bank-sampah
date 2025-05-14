<?php $__env->startSection('content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo e(__('create user')); ?></h1>
        <a href="<?php echo e(route('admin.users.index')); ?>" class="btn btn-primary btn-sm shadow-sm"><?php echo e(__('Go Back')); ?></a>
    </div>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

<!-- Content Row -->
        <div class="card shadow">
            <div class="card-body">
                <form action="<?php echo e(route('admin.users.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="name"><?php echo e(__('Name')); ?></label>
                        <input type="text" class="form-control" id="name" placeholder="<?php echo e(__('Name')); ?>" name="name" value="<?php echo e(old('name')); ?>" />
                    </div>
                    <div class="form-group">
                        <label for="username"><?php echo e(__('Username')); ?></label>
                        <input type="text" class="form-control" id="username" placeholder="<?php echo e(__('Username')); ?>" name="username" value="<?php echo e(old('username')); ?>" />
                    </div>
                    <div class="form-group">
                        <label for="email"><?php echo e(__('Email')); ?></label>
                        <input type="email" class="form-control" id="email" placeholder="<?php echo e(__('Email')); ?>" name="email" value="<?php echo e(old('email')); ?>" />
                    </div>
                    <div class="form-group">
                        <label for="password"><?php echo e(__('Password')); ?></label>
                        <input type="text" class="form-control" id="password" placeholder="<?php echo e(__('Password')); ?>" name="password" value="<?php echo e(old('password')); ?>" required />
                    </div>
                    <div class="form-group">
                        <label for="roles"><?php echo e(__('Role')); ?></label>
                        <select name="roles[]" id="roles" class="form-control select2" multiple="multiple" required>
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $roles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($id); ?>" <?php echo e((in_array($id, old('roles', [])) || isset($role) && $role->roles->contains($id)) ? 'selected' : ''); ?>><?php echo e($roles); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block"><?php echo e(__('Save')); ?></button>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Storage/Document/project/joki/laravel-ecommerce/resources/views/admin/users/create.blade.php ENDPATH**/ ?>