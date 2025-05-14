<?php $__env->startSection('content'); ?>
   <div class="container">
    <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    <?php echo e(__('Orders')); ?>

                </h6>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Order ID</th>
                        <th>Grand Total</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Payment</th>
                        <th class="text-center" style="width: 30px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td>
                            <?php echo e($order->code); ?> <br/>
                            <?php echo e($order->order_date); ?>                                                    
                            </td>
                            <td><?php echo e($order->grand_total); ?></td>
                            <td>
                                <?php echo e($order->customer_first_name); ?> <?php echo e($order->customer_last_name); ?> <br/>
                                <?php echo e($order->customer_email); ?>

                            </td>
                            <td><?php echo e($order->status); ?></td>
                            <td><?php echo e($order->payment_status); ?></td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="<?php echo e(route('admin.orders.show', $order)); ?>" class="btn btn-sm btn-primary">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <form onclick="return confirm('are you sure !')" action="<?php echo e(route('admin.orders.destroy', $order)); ?>"
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
                                    <?php echo $orders->appends(request()->all())->links(); ?>

                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
   </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Storage/Document/project/joki/laravel-ecommerce/resources/views/admin/orders/index.blade.php ENDPATH**/ ?>