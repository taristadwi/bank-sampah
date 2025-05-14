<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    <?php echo e($product->name); ?>

                </h6>
                <div class="ml-auto">
                    <a href="<?php echo e(route('admin.products.index')); ?>" class="btn btn-primary">
                        <span class="text">Back to products</span>
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <th>Product Name</th>
                        <td><?php echo e($product->name); ?></td>
                        <th>Price</th>
                        <td><?php echo e($product->price); ?></td>
                    </tr>
                    <tr>
                        <th>Quantity</th>
                        <td><?php echo e($product->quantity); ?></td>
                        <th>Status</th>
                        <td><?php echo e($product->status); ?></td>
                    </tr>
                    <tr>
                        <td>Slug</td>
                        <td><?php echo e($product->slug); ?></td>
                        <td>Category</td>
                        <td><?php echo e($product->category->name); ?></td>
                    </tr>
                    <tr>
                        <td>Created At</td>
                        <td><?php echo e($product->created_at ? $product->created_at->format('Y-m-d') : "Undefined"); ?></td>
                        <td>Updated At</td>
                        <td><?php echo e($product->updated_at ? $product->updated_at->format('Y-m-d') : "Undefined"); ?></td>
                    </tr>

                    <tr>
                        <th>Description</th>
                        <td colspan="3"><?php echo e($product->description); ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Storage/Document/project/joki/laravel-ecommerce/resources/views/admin/products/show.blade.php ENDPATH**/ ?>