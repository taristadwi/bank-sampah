<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    <?php echo e($tag->name); ?>

                </h6>
                <div class="ml-auto">
                    <a href="<?php echo e(route('admin.tags.index')); ?>" class="btn btn-primary">
                        <span class="text">Back to tags</span>
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Product Count</th>
                        <th>Created at</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?php echo e($tag->name); ?></td>
                        <td><?php echo e($tag->slug); ?></td>
                        <td><?php echo e($tag->product ?? ''); ?></td>
                        <td><?php echo e($tag->created_at); ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Storage/Document/project/joki/laravel-ecommerce/resources/views/admin/tags/show.blade.php ENDPATH**/ ?>