<?php $__env->startSection('content'); ?>
   <div class="container">
    <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    <?php echo e(__('Slides')); ?>

                </h6>
                <div class="ml-auto">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('slide_create')): ?>
                    <a href="<?php echo e(route('admin.slides.create')); ?>" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text"><?php echo e(__('New slide')); ?></span>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Position</th>
                        <th>Set Position</th>
                        <th class="text-center" style="width: 30px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td>
                                <a href="<?php echo e(route('admin.slides.show', $slide)); ?>">
                                    <?php echo e($slide->title); ?>

                                </a>
                            </td>
                            <td>
                                <img width="60" src="<?php echo e(Storage::url('images/slides/'. $slide->cover)); ?>" alt="">
                            </td>
                            <td><?php echo e($slide->position); ?></td>
                            <td>
                                <?php if($slide->prevSlide()): ?>
                                    <a href="<?php echo e(url('admin/slides/'. $slide->id .'/up')); ?>">up</a>
                                <?php else: ?>
                                    up
                                <?php endif; ?>
                                    | 
                                <?php if($slide->nextSlide()): ?>
                                    <a href="<?php echo e(url('admin/slides/'. $slide->id .'/down')); ?>">down</a>
                                <?php else: ?>
                                    down
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="<?php echo e(route('admin.slides.edit', $slide)); ?>" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form onclick="return confirm('are you sure !')" action="<?php echo e(route('admin.slides.destroy', $slide)); ?>"
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
                            <td class="text-center" colspan="6">No tags found.</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6">
                                <div class="float-right">
                                    <?php echo $slides->appends(request()->all())->links(); ?>

                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
   </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Storage/Document/project/joki/laravel-ecommerce/resources/views/admin/slides/index.blade.php ENDPATH**/ ?>