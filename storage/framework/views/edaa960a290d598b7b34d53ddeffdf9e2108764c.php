<?php $__env->startSection('title', 'Order Detail'); ?>
<?php $__env->startSection('content'); ?>
	<!-- header end -->
	<div class="breadcrumb-area pt-205 breadcrumb-padding pb-210" style="background-image: url(<?php echo e(asset('frontend/assets/img/bg/breadcrumb.jpg')); ?>)">
		<div class="container">
			<div class="breadcrumb-content text-center">
				<h2>Order Received</h2>
				<ul>
					<li><a href="<?php echo e(url('/')); ?>">home</a></li>
					<li>Order Received</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- checkout-area start -->
	<div class="cart-main-area  ptb-100">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h1 class="cart-heading">Your Order:</h4>
					<div class="row">
						<div class="col-xl-3 col-lg-4">
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
						<div class="col-xl-3 col-lg-4">
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
						<div class="col-xl-3 col-lg-4">
							<p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Details</p>
							<address>
								Invoice ID:
								<span class="text-dark">#<?php echo e($order->code); ?></span>
								<br> <?php echo e(date('d M Y H:i:s', strtotime($order->order_date))); ?>

								<br> Status: <?php echo e($order->status); ?>

								<br> Payment Status: <?php echo e($order->payment_status); ?>

								<br> Shipped by: <?php echo e($order->shipping_service_name); ?>

							</address>
						</div>
					</div>
					<div class="table-content table-responsive">
						<table class="table mt-3 table-striped table-responsive table-responsive-large" style="width:100%">
							<thead>
								<tr>
									<th>#</th>
									<th>Code</th>
									<th>product name</th>
									<th>Quantity</th>
									<th>Unit Cost</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>
								<?php $__empty_1 = true; $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
									<tr>
                                        <td><?php echo e($loop->iteration); ?></td>
										<td><?php echo e($item->weight); ?> (gram)</td>
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
					</div>
					<div class="row">
						<div class="col-md-5 ml-auto">
							<div class="cart-page-total">
								<ul>
									<li> Subtotal
										<span>Rp.<?php echo e(number_format($order->base_total_price)); ?></span>
									</li>
									<li>Tax (10%)
										<span>Rp.<?php echo e(number_format($order->tax_amount)); ?></span>
									</li>
									<li>Shipping Cost
										<span>Rp.<?php echo e(number_format($order->shipping_cost)); ?></span>
									</li>
									<li>Total
										<span>Rp.<?php echo e(number_format($order->grand_total)); ?></span>
									</li>
								</ul>
								<?php if(!$order->isPaid()): ?>
									<a href="<?php echo e($order->payment_url); ?>">Proceed to payment</a>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Storage/Document/project/joki/laravel-ecommerce/resources/views/frontend/orders/received.blade.php ENDPATH**/ ?>