<?php $__env->startSection('content'); ?>
   <div class="container">
    <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    <?php echo e(__('Categories')); ?>

                </h6>
                <div class="ml-auto">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category_create')): ?>
                    <a href="<?php echo e(route('admin.categories.create')); ?>" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text"><?php echo e(__('New category')); ?></span>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Product count</th>
                        <th>Parent</th>
                        <th class="text-center" style="width: 30px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td>
                                <?php if($category->cover): ?>
                                    <img src="<?php echo e(Storage::url('images/categories/' . $category->cover)); ?>"
                                        width="60" height="60" alt="<?php echo e($category->name); ?>">
                                <?php else: ?>
                                    <span class="badge badge-primary">No image</span>
                                <?php endif; ?>
                            </td>
                            <td><a href="<?php echo e(route('admin.categories.show', $category->id)); ?>">
                                    <?php echo e($category->name); ?>

                                </a>
                            </td>
                            <td><?php echo e($category->products_count); ?></td>
                            <td><?php echo e($category->parent->name ?? ''); ?></td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="<?php echo e(route('admin.categories.edit', $category)); ?>" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form onclick="return confirm('are you sure !')" action="<?php echo e(route('admin.categories.destroy', $category)); ?>"
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
                            <td class="text-center" colspan="6">No categories found.</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6">
                                <div class="float-right">
                                    <?php echo $categories->appends(request()->all())->links(); ?>

                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
   </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Storage/Document/project/joki/laravel-ecommerce/resources/views/admin/categories/index.blade.php ENDPATH**/ ?>