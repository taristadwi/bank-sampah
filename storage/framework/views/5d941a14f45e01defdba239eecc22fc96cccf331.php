<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Add Bank Account</h1>
    <form action="<?php echo e(route('admin.bank_accounts.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="bank_name">Bank Name</label>
            <input type="text" name="bank_name" id="bank_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="account_number">Account Number</label>
            <input type="text" name="account_number" id="account_number" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="account_holder">Account Holder</label>
            <input type="text" name="account_holder" id="account_holder" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Storage/Document/project/joki/laravel-ecommerce/resources/views/admin/bank_accounts/create.blade.php ENDPATH**/ ?>