<?php $__env->startSection('title', 'Order - ' . $order->code); ?>
<?php $__env->startSection('content'); ?>
	<div class="breadcrumb-area pt-205 breadcrumb-padding pb-210" style="background-image: url(<?php echo e(asset('frontend/assets/img/bg/breadcrumb.jpg')); ?>)">
		<div class="container-fluid">
			<div class="breadcrumb-content text-center">
				<h2>My Favorites</h2>
				<ul>
					<li><a href="<?php echo e(url('/')); ?>">home</a></li>
					<li>my favorites</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="shop-page-wrapper shop-page-padding ptb-100">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3">
                <h3 class="sidebar-title">User Menu</h3>
                    <div class="sidebar-categories">
                        <ul>
                            <li><a href="<?php echo e(url('profile')); ?>">Profile</a></li>
                            <li><a href="<?php echo e(url('orders')); ?>">Orders</a></li>
                            <li><a href="<?php echo e(url('favorites')); ?>">Favorites</a></li>
                        </ul>
                    </div>
				</div>
				<div class="col-lg-9">
					<div class="d-flex justify-content-between">
						<h2 class="text-dark font-weight-medium">Order ID #<?php echo e($order->code); ?></h2>
					</div>
					<div class="row pt-5">
						<div class="col-xl-3 col-lg-3">
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
						<div class="col-xl-3 col-lg-3">
							<p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Payment Details</p>
							<address>
								<ul>
									<li><strong>Bank Name:</strong> <?php echo e($order->bankAccount->bank_name ?? 'N/A'); ?></li>
									<li><strong>Account Number:</strong> <?php echo e($order->bankAccount->account_number ?? 'N/A'); ?></li>
									<li><strong>Account Holder:</strong> <?php echo e($order->bankAccount->account_holder ?? 'N/A'); ?></li>
								</ul>
							</address>
							<?php if($order->payment_proof): ?>
								<a href="<?php echo e(asset('storage/payment_proofs/' . $order->payment_proof)); ?>" target="_blank">
									Lihat Bukti Pembayaran
								</a>
							<?php else: ?>
								<p>No payment proof uploaded.</p>
							<?php endif; ?>
						</div>
						<?php if($order->shipment): ?>
							<div class="col-xl-3 col-lg-3">
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
						<?php endif; ?>
						<div class="col-xl-3 col-lg-3">
							<p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Details</p>
							<address>
								ID: <span class="text-dark">#<?php echo e($order->code); ?></span>
								<br> <?php echo e($order->order_date); ?>

								<br> Status: <?php echo e($order->status); ?> <?php echo e($order->isCancelled() ? '('. $order->cancelled_at .')' : null); ?>

								<?php if($order->isCancelled()): ?>
									<br> Cancellation Note : <?php echo e($order->cancellation_note); ?>

								<?php endif; ?>
								<br> Payment Status: <?php echo e($order->payment_status); ?>

								<br> Shipped by: <?php echo e($order->shipping_service_name); ?>

							</address>
						</div>
					</div>
					<div class="table-content table-responsive">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Item</th>
									<th>Description</th>
									<th>Quantity</th>
									<th>Unit Cost</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>
								<?php $__empty_1 = true; $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
									<tr>
										<td><?php echo e($item->sku); ?></td>
										<td><?php echo e($item->name); ?></td>
										<td><?php echo e($item->weight); ?> (gram)</td>
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
					</div>
					<h6></h6>
       
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Storage/Document/project/joki/laravel-ecommerce/resources/views/frontend/orders/show.blade.php ENDPATH**/ ?>