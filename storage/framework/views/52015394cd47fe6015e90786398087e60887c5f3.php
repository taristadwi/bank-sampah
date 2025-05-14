<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="row">
        <div class="col-lg-6">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Cancel Order #<?php echo e($order->code); ?></h2>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('admin.orders.cancelUpdate', $order->id)); ?>" method="post">
                        <?php echo csrf_field(); ?> 
                        <?php echo method_field('put'); ?>
                    <div class="form-group">
                        <label for="cancellation note">Cancellation Note</label>
                        <textarea name="cancellation_note" class="form-control" cols="30" rows="10"></textarea>
                        <?php $__errorArgs = ['cancellation_note'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-footer pt-5 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Cancel the Order</button>
                        <a href="<?php echo e(route('admin.orders.index')); ?>" class="btn btn-secondary btn-default">Back</a>
                    </div>
                    </form>
                </div>
            </div>  
        </div>
        <div class="col-lg-6">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Detail Order</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            <p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Billing Address</p>
                            <address>
                                <?php echo e($order->customer_first_name); ?> <?php echo e($order->customer_last_name); ?>

                                <br> <?php echo e($order->customer_address1); ?>

                                <br> <?php echo e($order->customer_address2); ?>

                                <br> Email: <?php echo e($order->customer_email); ?>

                                <br> Phone: <?php echo e($order->customer_phone); ?>

                                <br> Postcode: <?php echo e($order->customer_postcode); ?>

                            </address>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Details</p>
                            <address>
                                    ID: <span class="text-dark">#<?php echo e($order->code); ?></span>
                                <br> DATE: <span><?php echo e($order->order_date); ?></span>
                                <br>
                                NOTE: <span><?php echo e($order->note); ?></span>
                                <br> Status: <?php echo e($order->status); ?> <?php echo e($order->cancelled_at); ?>

                                    <br> Cancellation Note : <?php echo e($order->cancellation_note); ?>

                                <br> Payment Status: <?php echo e($order->payment_status); ?>

                                <br> Shipped by: <?php echo e($order->shipping_service_name); ?>

                        </div>
                    </div>
                    <table class="table mt-3 table-striped table-responsive table-responsive-large" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Item</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($item->sku); ?></td>
                                    <td><?php echo e($item->name); ?></td>
                                    <td><?php echo e($item->qty); ?></td>
                                    <td><?php echo e($item->sub_total); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="6">Order item not found!</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <div class="row justify-content-end">
                        <div class="col-lg-5 col-xl-6 col-xl-3 ml-sm-auto">
                            <ul class="list-unstyled mt-4">
                                <li class="mid pb-3 text-dark">Subtotal
                                    <span class="d-inline-block float-right text-default"><?php echo e($order->base_total_price); ?></span>
                                </li>
                                <li class="mid pb-3 text-dark">Tax(10%)
                                    <span class="d-inline-block float-right text-default"><?php echo e($order->tax_amount); ?></span>
                                </li>
                                <li class="mid pb-3 text-dark">Shipping Cost
                                    <span class="d-inline-block float-right text-default"><?php echo e($order->shipping_cost); ?></span>
                                </li>
                                <li class="pb-3 text-dark">Total
                                    <span class="d-inline-block float-right"><?php echo e($order->grand_total); ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Storage/Document/project/joki/laravel-ecommerce/resources/views/admin/orders/cancel.blade.php ENDPATH**/ ?>