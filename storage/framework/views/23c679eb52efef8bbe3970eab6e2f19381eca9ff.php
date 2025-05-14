<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    Edit review on product : (<?php echo e($review->product->name); ?>)
                </h6>
                <div class="ml-auto">
                    <a href="<?php echo e(route('admin.reviews.index')); ?>" class="btn btn-primary">
                        <span class="icon text-white-50">
                        </span>
                        <span class="text">Back to reviews</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('admin.reviews.update', $review)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" <?php echo e(old('status', $review->status) == "Active" ? 'selected' : null); ?>>Active</option>
                                    <option value="0" <?php echo e(old('status', $review->status) == "Inactive" ? 'selected' : null); ?>>Inactive</option>
                                </select>
                                <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group pt-4">
                        <button class="btn btn-primary" type="submit" name="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Storage/Document/project/joki/laravel-ecommerce/resources/views/admin/reviews/edit.blade.php ENDPATH**/ ?>