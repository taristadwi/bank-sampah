<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="content">
        <div class="invoice-wrapper rounded border bg-white py-5 px-3 px-md-4 px-lg-5">
            <div class="d-flex justify-content-between">
                <h2 class="text-dark font-weight-medium">Order ID #<?php echo e($order->code); ?></h2>
                <div class="btn-group">
                    <a href="<?php echo e(route('admin.orders.index')); ?>" class="btn btn-sm btn-warning">
                     Go Back</a>
                </div>
            </div>
            <div class="row pt-5">
                <div class="col-xl-4 col-lg-4">
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
                <div class="col-xl-4 col-lg-4">
                    <p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Shipment Address</p>
                    <address>
                        <?php echo e($order->shipment->first_name); ?> <?php echo e($order->shipment->last_name); ?>

                        <br> <?php echo e($order->shipment->address1); ?>

                        <br> <?php echo e($order->shipment->address2); ?>

                        <br> Email: <?php echo e($order->shipment->email); ?>

                        <br> Phone: <?php echo e($order->shipment->phone); ?>

                        <br> Postcode: <?php echo e($order->shipment->postcode); ?>

                    </address>
                </div>
                <div class="col-xl-4 col-lg-4">
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

                    </address>
                </div>
            </div>

            <!-- Bank Account Details -->
            <div class="row pt-5">
                <div class="col-xl-6 col-lg-6">
                    <p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Bank Account Details</p>
                    <address>
                        Bank Name: <?php echo e($order->bankAccount->bank_name ?? 'N/A'); ?>

                        <br> Account Number: <?php echo e($order->bankAccount->account_number ?? 'N/A'); ?>

                        <br> Account Holder: <?php echo e($order->bankAccount->account_holder ?? 'N/A'); ?>

                    </address>
                    <p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Bukti Pembayaran</p>
                    <?php if($order->payment_proof): ?>
                        <a href="<?php echo e(asset('storage/payment_proofs/' . $order->payment_proof)); ?>" target="_blank" class="text-primary">
                            View Bukti Pembayaran
                        </a>
                    <?php else: ?>
                        <p>No Bukti Pembayaran uploaded.</p>
                    <?php endif; ?>
                </div> 
            </div>

            <table class="table mt-3 table-striped table-responsive table-responsive-large" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Unit Cost</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($item->name); ?></td>
                            <td><?php echo e($item->qty); ?></td>
                            <td>Rp.<?php echo e(number_format($item->base_price)); ?></td>
                            <td>Rp.<?php echo e(number_format($item->sub_total)); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6">Order item not found!</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <div class="row justify-content-end">
                <div class="col-lg-5 col-xl-4 col-xl-3 ml-sm-auto">
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
                    <?php if($order->isPaid() && $order->isConfirmed()): ?>
                        <a href="<?php echo e(route('admin.shipments.edit', $order->shipment->id)); ?>" class="btn btn-block mt-2 btn-lg btn-primary btn-pill"> Procced to Shipment</a>
                    <?php endif; ?>

                    <?php if(in_array($order->status, [\App\Models\Order::CREATED, \App\Models\Order::CONFIRMED])): ?>
                        <a href="<?php echo e(route('admin.orders.cancel', $order->id)); ?>" class="btn btn-block mt-2 btn-lg btn-warning btn-pill"> Cancel</a>
                    <?php endif; ?>
                    <?php if($order->isDelivered()): ?>
                        
                        <form action="<?php echo e(route('admin.orders.complete', $order->id)); ?>" method="post" >
                            <?php echo csrf_field(); ?>
                            <button class="btn btn-block mt-2 btn-lg btn-success btn-pill"> Mark as Completed</button>
                        </form>
                    <?php endif; ?>

                    <?php if(!in_array($order->status, [\App\Models\Order::DELIVERED, \App\Models\Order::COMPLETED])): ?>
                        <a href="" class="btn btn-block mt-2 btn-lg btn-secondary btn-pill delete" onclick="event.preventDefault();document.getElementById('delete-form-<?php echo e($order->id); ?>').submit();"> Remove</a>
                        
                        <form action="<?php echo e(route('admin.orders.destroy', $order)); ?> }}" method="post" id="delete-form-<?php echo e($order->id); ?>" class="d-none">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                        </form>
                    <?php endif; ?>

                    <?php if(!$order->isConfirmed() && !$order->isPaid()): ?>
                        <form action="<?php echo e(route('admin.orders.approve', $order->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <button class="btn btn-block mt-2 btn-lg btn-success btn-pill">Approve Order</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Storage/Document/project/joki/laravel-ecommerce/resources/views/admin/orders/show.blade.php ENDPATH**/ ?>