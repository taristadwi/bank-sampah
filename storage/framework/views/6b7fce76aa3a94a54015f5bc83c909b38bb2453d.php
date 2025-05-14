<?php $__env->startSection('content'); ?>
   <div class="container">
    <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    <?php echo e(__('Products')); ?>

                </h6>
                <div class="ml-auto">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product_create')): ?>
                    <a href="<?php echo e(route('admin.products.create')); ?>" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text"><?php echo e(__('New product')); ?></span>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Weight</th>
                        <th>Tags</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th class="text-center" style="width: 30px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td>
                                <?php if($product->firstMedia): ?>
                                <img src="<?php echo e(asset('storage/images/products/' . $product->firstMedia->file_name)); ?>"
                                    width="60" height="60" alt="<?php echo e($product->name); ?>">
                                <?php else: ?>
                                    <span class="badge badge-danger">no image</span>
                                <?php endif; ?>
                            </td>
                            <td><a href="<?php echo e(route('admin.products.show', $product->id)); ?>"><?php echo e($product->name); ?></a></td>
                            <td><?php echo e($product->quantity); ?></td>
                            <td>Rp.<?php echo e(number_format($product->price)); ?></td>
                            <td><?php echo e($product->weight); ?> (gram)</td>
                            <td>
                                <span class="badge badge-info"><?php echo e($product->tags->pluck('name')->join(', ')); ?></span>
                            </td>
                            <td><?php echo e($product->category ? $product->category->name : NULL); ?></td>
                            <td><?php echo e($product->status); ?></td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="<?php echo e(route('admin.products.edit', $product)); ?>" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form onclick="return confirm('are you sure !')" action="<?php echo e(route('admin.products.destroy', $product)); ?>"
                                    method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td class="text-center" colspan="12">No products found.</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="12">
                                <div class="float-right">
                                    <?php echo $products->appends(request()->all())->links(); ?>

                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
   </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Storage/Document/project/joki/laravel-ecommerce/resources/views/admin/products/index.blade.php ENDPATH**/ ?>