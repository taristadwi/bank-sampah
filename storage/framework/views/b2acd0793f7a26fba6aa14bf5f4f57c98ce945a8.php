<?php $__env->startSection('content'); ?>
   <div class="container">
    <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    <?php echo e(__('Shipments')); ?>

                </h6>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Order ID</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Total Qty</th>
                        <th>Total Weight (gram)</th>
                        <th class="text-center" style="width: 30px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $shipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td>
                                <?php echo e($shipment->order->code); ?><br>
                                <span class="badge badge-info" style="font-size: 12px; font-weight: normal"> <?php echo e($shipment->order->order_date); ?></span>
                            </td>
                            <td><?php echo e($shipment->order->customer_full_name); ?></td>
                            <td>
                                <?php echo e($shipment->status); ?>

                                <br>
                                <span class="badge badge-info" style="font-size: 12px; font-weight: normal"> <?php echo e($shipment->shipped_at); ?></span>
                            </td>
                            <td><?php echo e($shipment->total_qty); ?></td>
                            <td><?php echo e($shipment->total_weight); ?></td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="<?php echo e(route('admin.orders.show', $shipment->order->id)); ?>" class="btn btn-sm btn-primary">
                                        <i class="fa fa-eye"></i>
                                    </a>

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
                                    <?php echo $shipments->appends(request()->all())->links(); ?>

                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
   </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Storage/Document/project/joki/laravel-ecommerce/resources/views/admin/shipments/index.blade.php ENDPATH**/ ?>