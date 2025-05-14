<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Edit Bank Account</h1>
    <form action="<?php echo e(route('bank_accounts.update', $bankAccount)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="form-group">
            <label for="bank_name">Bank Name</label>
            <input type="text" name="bank_name" id="bank_name" class="form-control" value="<?php echo e($bankAccount->bank_name); ?>" required>
        </div>
        <div class="form-group">
            <label for="account_number">Account Number</label>
            <input type="text" name="account_number" id="account_number" class="form-control" value="<?php echo e($bankAccount->account_number); ?>" required>
        </div>
        <div class="form-group">
            <label for="account_holder">Account Holder</label>
            <input type="text" name="account_holder" id="account_holder" class="form-control" value="<?php echo e($bankAccount->account_holder); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Storage/Document/project/joki/laravel-ecommerce/resources/views/admin/bank_accounts/edit.blade.php ENDPATH**/ ?>