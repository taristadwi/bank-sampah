<?php $__env->startSection('content'); ?>
<div class="container-fluid">

    <?php if(session('success')): ?>
        <div class="alert alert-info">
            <?php echo e(session('success')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Bank Accounts</h1>
        <a href="<?php echo e(route('admin.bank_accounts.create')); ?>" class="btn btn-primary btn-sm shadow-sm">
            Add Bank Account <i class="fa fa-plus ml-1"></i>
        </a>
    </div>

    <!-- Content Row -->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Bank Name</th>
                            <th>Account Number</th>
                            <th>Account Holder</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $bankAccounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bankAccount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($bankAccount->bank_name); ?></td>
                                <td><?php echo e($bankAccount->account_number); ?></td>
                                <td><?php echo e($bankAccount->account_holder); ?></td>
                                <td>
                                    <a href="<?php echo e(route('admin.bank_accounts.edit', $bankAccount)); ?>" class="btn btn-info btn-sm">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form onclick="return confirm('Are you sure?')" class="d-inline" action="<?php echo e(route('admin.bank_accounts.destroy', $bankAccount)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="text-center">No bank accounts found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Optional pagination -->
        
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Storage/Document/project/joki/laravel-ecommerce/resources/views/admin/bank_accounts/index.blade.php ENDPATH**/ ?>