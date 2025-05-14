<div>
    <div class="shop-product-wrapper res-xl res-xl-btn">
        <div class="shop-bar-area">
            <div class="shop-bar pb-60">
                <div class="shop-found-selector">
                    <div class="shop-found">
                        <p class="small">
                            Showing <?php echo e($products->firstItem()); ?> - <?php echo e($products->lastItem()); ?> of <?php echo e($products->total()); ?> results
                        </p>
                    </div>
                    <div wire:ignore class="shop-selector">
                        <label>Sort By :</label>
                        <select wire:model="sortingBy" name="sortingBy">
                            <option value="default">Default sorting</option>
                            <option value="popularity">Popularity</option>
                            <option value="low-high">Price: Low to High</option>
                            <option value="high-low">Price: High to Low</option>
                        </select>

                    </div>
                </div>
                <div class="shop-filter-tab">
                    <div class="shop-tab nav" role=tablist>
                        <a class="active" href="#grid-sidebar1" data-toggle="tab" role="tab" aria-selected="false">
                            <i class="ti-layout-grid4-alt"></i>
                        </a>
                        <a href="#grid-sidebar2" data-toggle="tab" role="tab" aria-selected="true">
                            <i class="ti-menu"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="shop-product-content tab-content">
                <div id="grid-sidebar1" class="tab-pane fade active show">
                <div class="row">
                    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-md-6 col-xl-4">
                        <div class="product-wrapper mb-30">
                            <div class="product-img">
                                <a href="<?php echo e(route('product.show', $product->slug)); ?>">
                                    <?php if($product->firstMedia): ?>
                                        <img src="<?php echo e(asset('storage/images/products/' . $product->firstMedia->file_name )); ?>"
                                                alt="<?php echo e($product->name); ?>" width="150">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('frontend/assets/img/product/book/1.jpg' )); ?>" alt="<?php echo e($product->name); ?>" style="width: 100%;">
                                    <?php endif; ?>
                                </a>
                                <span>hot</span>
                                <div class="product-action">
                                    <a class="animate-left add-to-fav" title="Favorite"  product-slug="<?php echo e($product->slug); ?>" href="">
                                        <i class="pe-7s-like"></i>
                                    </a>
                                    <a class="animate-top add-to-card" title="Add To Cart" href="" product-id="<?php echo e($product->id); ?>" product-type="<?php echo e($product->slug); ?>" product-slug="<?php echo e($product->slug); ?>">
                                        <i class="pe-7s-cart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4><a href="<?php echo e(route('product.show', $product->slug)); ?>"><?php echo e($product->name); ?></a></h4>
                                <span>Rp.<?php echo e(number_format($product->price)); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        No product found!
                    <?php endif; ?>
                </div>
                </div>
                <div id="grid-sidebar2" class="tab-pane fade">
                <div class="row">
                    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-lg-12">
                        <div class="product-wrapper mb-30 single-product-list product-list-right-pr mb-60">
                            <div class="product-img list-img-width">
                                <a href="<?php echo e(route('product.show', $product->slug)); ?>">
                                    <?php if($product->firstMedia): ?>
                                        <img src="<?php echo e(asset('storage/images/products/' . $product->firstMedia->file_name )); ?>"
                                                alt="<?php echo e($product->name); ?>" width="150">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('frontend/assets/img/product/book/1.jpg' )); ?>" alt="<?php echo e($product->name); ?>" style="width: 100%;">
                                    <?php endif; ?>
                                </a>
                                <span>hot</span>
                            </div>
                            <div class="product-content-list">
                                <div class="product-list-info">
                                    <h4><a href="<?php echo e(route('product.show', $product->slug)); ?>"><?php echo e($product->name); ?></a></h4>
                                    <span>Rp.<?php echo e(number_format($product->price)); ?></span>
                                    <p><?php echo $product->description; ?></p>
                                </div>
                                <div class="product-list-cart-wishlist">
                                    <div class="product-list-cart">
                                        <a class="btn-hover list-btn-style add-to-card"  product-id="<?php echo e($product->id); ?>" product-type="<?php echo e($product->slug); ?>" product-slug="<?php echo e($product->slug); ?>">add to cart</a>
                                    </div>
                                    <div class="product-list-wishlist">
                                        <a class="btn-hover list-btn-wishlist add-to-fav" title="Favorite"  product-slug="<?php echo e($product->slug); ?>" href="">
                                            <i class="pe-7s-like"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        No product found!
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <?php echo $products->appends(request()->all())->onEachSide(1)->links(); ?>

    </div>
</div>
<?php /**PATH /Volumes/Storage/Document/project/joki/laravel-ecommerce/resources/views/livewire/shop/product-component.blade.php ENDPATH**/ ?>