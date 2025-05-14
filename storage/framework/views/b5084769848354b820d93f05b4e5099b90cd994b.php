<?php $__env->startSection('title', 'Favorite Items'); ?>
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
                            <li><a href="<?php echo e(route('profile.index')); ?>">Profile</a></li>
                            <li><a href="<?php echo e(route('orders.index')); ?>">Orders</a></li>
                            <li><a href="<?php echo e(route('favorite.index')); ?>">Favorites</a></li>
                        </ul>
                    </div>
				</div>
				<div class="col-lg-9">
					<div class="shop-product-wrapper res-xl">
						<div class="table-content table-responsive">
                        <table>
								<thead>
									<tr>
										<th>remove</th>
										<th>Image</th>
										<th>Product</th>
										<th>Price</th>
									</tr>
								</thead>
								<tbody>
									<?php $__empty_1 = true; $__currentLoopData = $favorites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $favorite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
										<?php
											$product = $favorite->product;
										?>
										<tr>
											<td class="product-remove">
                                                <form id="delete-fav" action="<?php echo e(route('favorite.destroy', $favorite->id)); ?>" method="POST" class="d-none">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('delete'); ?>
                                            </form>
                                                <a href="" onclick="event.preventDefault();document.getElementById('delete-fav').submit();" class="delete"><i class="pe-7s-close"></i></a>
											</td>
											<td class="product-thumbnail">
												<a href="<?php echo e(route('product.show', $product->slug)); ?>">
                                                    <?php if($product->firstMedia): ?>
                                                    <img src="<?php echo e(asset('storage/images/products/' . $product->firstMedia->file_name)); ?>"
                                                        width="60" height="60" alt="<?php echo e($product->name); ?>">
                                                    <?php else: ?>
                                                        <span class="badge badge-danger">no image</span>
                                                    <?php endif; ?>
                                                </a>
											</td>
											<td class="product-name"><a href="<?php echo e(route('product.show', $product->slug)); ?>"><?php echo e($product->name); ?></a></td>
											<td class="product-price-cart"><span class="amount"><?php echo e(number_format($product->price)); ?></span></td>
										</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
										<tr>
											<td colspan="4">You have no favorite product</td>
										</tr>
									<?php endif; ?>
                                </tbody>
							</table>
							<?php echo e($favorites->links()); ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Storage/Document/project/joki/laravel-ecommerce/resources/views/frontend/favorites/index.blade.php ENDPATH**/ ?>