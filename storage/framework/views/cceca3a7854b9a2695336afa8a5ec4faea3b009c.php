<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    <?php echo e($category->name); ?>

                </h6>
                <div class="ml-auto">
                    <a href="<?php echo e(route('admin.categories.index')); ?>" class="btn btn-primary">
                        <span class="text">Back to categories</span>
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Parent</th>
                        <th>Created at</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?php echo e($category->name); ?></td>
                        <td><?php echo e($category->parent->name ?? ''); ?></td>
                        <td><?php echo e($category->created_at); ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Storage/Document/project/joki/laravel-ecommerce/resources/views/admin/categories/show.blade.php ENDPATH**/ ?>