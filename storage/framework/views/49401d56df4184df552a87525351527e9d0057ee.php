<?php $__env->startSection('title', 'Cart'); ?>
<?php $__env->startSection('content'); ?>
	<!-- shopping-cart-area start -->
	<div class="cart-main-area pt-95 pb-100">
		<div class="container">
			<div class="row">

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php if(session()->has('message')): ?>
                        <div class="alert alert-<?php echo e(session()->get('alert-type')); ?> alert-dismissible fade show" role="alert" id="alert-message">
                            <?php echo e(session()->get('message')); ?>

                            <button type="button" style="cursor: pointer;" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

					<h1 class="cart-heading text-center">Cart Page</h1>
						<div class="table-content table-responsive">
							<table>
								<thead>
									<tr>
										<th>remove</th>
										<th>images</th>
										<th>Product</th>
										<th>Price</th>
										<th>Quantity</th>
										<th>Total</th>
									</tr>
								</thead>
								<tbody>
									<?php $__empty_1 = true; $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
										<?php
											$product = $cart->associatedModel;
											$image = !empty($product->firstMedia) ? asset('storage/images/products/'. $product->firstMedia->file_name) : asset('frontend/assets/img/cart/3.jpg')
										?>
										<form id="delete-cart" action="<?php echo e(route('cart.destroy', $cart->id)); ?>" method="POST" class="d-none">
											<?php echo csrf_field(); ?>
											<?php echo method_field('delete'); ?>
										</form>
										<form action="<?php echo e(route('cart.update', $cart->id)); ?>" method="post">
										<?php echo csrf_field(); ?>
										<?php echo method_field('put'); ?>
										<tr>
											<td class="product-remove">
												<a href="" onclick="event.preventDefault();document.getElementById('delete-cart').submit();" class="delete"><i class="pe-7s-close"></i></a>
											</td>
											<td class="product-thumbnail">
												<a href="<?php echo e(route('product.show', $product->slug)); ?>"><img src="<?php echo e($image); ?>" alt="<?php echo e($product->name); ?>" style="width:100px"></a>
											</td>
											<td class="product-name"><a href="<?php echo e(route('product.show', $product->slug)); ?>"><?php echo e($cart->name); ?></a></td>
											<td class="product-price-cart"><span class="amount"><?php echo e(number_format($cart->price)); ?></span></td>
											<td class="product-quantity">
												<input type="number" name="items[<?php echo e($cart->id); ?>][quantity]" min="1" required value="<?php echo e($cart->quantity); ?>">
											</td>
											<td class="product-subtotal"><?php echo e(number_format($cart->price * $cart->quantity)); ?></td>
										</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
										<tr>
											<td colspan="6">The cart is empty!</td>
										</tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="coupon-all">
									<div class="coupon2">
                                        <input class="button" name="update_cart" value="Update cart" type="submit">
									</div>
								</div>
							</div>
						</div>
						</form>
						<div class="row">
							<div class="col-md-5 ml-auto">
								<div class="cart-page-total">
									<h2>Cart totals</h2>
									<ul>
										<li>Total<span><?php echo e(number_format(\Cart::getTotal())); ?></span></li>
									</ul>
									<a href="<?php echo e(route('checkout.process')); ?>">Proceed to checkout</a>
								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
	<!-- shopping-cart-area end -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Storage/Document/project/joki/laravel-ecommerce/resources/views/frontend/cart/index.blade.php ENDPATH**/ ?>