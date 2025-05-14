<?php $__env->startSection('title', 'Order Items'); ?>
<?php $__env->startSection('content'); ?>
	<div class="breadcrumb-area pt-205 breadcrumb-padding pb-210" style="background-image: url(<?php echo e(asset('frontend/assets/img/bg/breadcrumb.jpg')); ?>)">
		<div class="container-fluid">
			<div class="breadcrumb-content text-center">
				<h2>My Order</h2>
				<ul>
					<li><a href="<?php echo e(url('/')); ?>">home</a></li>
					<li>my orders</li>
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
							<li><a href="<?php echo e(route('profile.index')); ?>">Profile</a></li>
                            <li><a href="<?php echo e(route('orders.index')); ?>">Orders</a></li>
                            <li><a href="<?php echo e(route('favorite.index')); ?>">Favorites</a></li>
                        </ul>
                    </div>
				</div>
				<div class="col-lg-9">
					<div class="shop-product-wrapper res-xl">
						<div class="table-content table-responsive">
							<table class="table table-bordered table-striped">
								<thead>
									<th>Order ID</th>
									<th>Grand Total</th>
									<th>Status</th>
									<th>Payment</th>
									<th>Action</th>
								</thead>
								<tbody>
									<?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
										<tr>    
											<td>
												<?php echo e($order->code); ?><br>
												<span style="font-size: 12px; font-weight: normal"> <?php echo e($order->order_date); ?></span>
											</td>
											<td><?php echo e(number_format($order->grand_total)); ?></td>
											<td><?php echo e($order->status); ?></td>
											<td><?php echo e($order->payment_status); ?></td>
											<td>
												<a href="<?php echo e(route('orders.show', $order->id)); ?>" class="btn btn-info btn-sm">details</a>
											</td>
										</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
										<tr>
											<td colspan="5">No records found</td>
										</tr>
									<?php endif; ?>
								</tbody>
							</table>
							<?php echo e($orders->links()); ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Storage/Document/project/joki/laravel-ecommerce/resources/views/frontend/orders/index.blade.php ENDPATH**/ ?>