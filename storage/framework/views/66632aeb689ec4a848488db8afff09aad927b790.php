<?php $__env->startSection('title', $product->name); ?>
<?php $__env->startSection('content'); ?>
    <div class="product-details ptb-100 pb-90">

    <?php if(session()->has('message')): ?>
        <div class="alert alert-<?php echo e(session()->get('alert-type')); ?> alert-dismissible fade show" role="alert" id="alert-message">
            <?php echo e(session()->get('message')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-7 col-12">
                    <div class="product-details-img-content">
                        <div class="product-details-tab mr-70">
                            <?php if($product->media_count): ?>
                                <div class="product-details-large tab-content">
                                    <?php $__currentLoopData = $product->media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="tab-pane <?php echo e($loop->index == 0 ? 'active' : ''); ?> show fade"
                                             id="pro-details<?php echo e($loop->index); ?>" role="tabpanel">
                                            <div class="easyzoom easyzoom--overlay">
                                                <?php if($product->media): ?>
                                                    <a href="<?php echo e(asset('storage/images/products/' . $media->file_name )); ?>">
                                                        <img src="<?php echo e(asset('storage/images/products/' . $media->file_name )); ?>"
                                                             alt="<?php echo e($product->name); ?>">
                                                    </a>
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset('img/no-img.png' )); ?>"
                                                         alt="<?php echo e($product->name); ?>">
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="product-details-small nav mt-12" role=tablist>
                                    <?php $__currentLoopData = $product->media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a class="<?php echo e($loop->index == 0 ? 'active' : ''); ?> mr-12"
                                           href="#pro-details<?php echo e($loop->index); ?>" data-toggle="tab" role="tab"
                                           aria-selected="true">
                                            <img style="width: 90px;" src="<?php echo e(asset('storage/images/products/' . $media->file_name )); ?>"
                                                 alt="<?php echo e($product->name); ?>">
                                        </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php else: ?>
                                <img src="<?php echo e(asset('img/no-img.png' )); ?>" alt="<?php echo e($product->name); ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-5 col-12">
                    <div class="product-details-content">
                        <h3><?php echo e($product->name); ?></h3>
                        <div class="rating-number">
                            <div class="quick-view-number">
                                <span class="score">
                                    <div class="score-wrap">
                                        <?php if($product->approved_reviews_avg_rating): ?>
                                            <?php for($i = 0; $i < 5; $i++): ?>
                                                <span class="stars-active">
                                                    <i class="<?php echo e(round($product->approved_reviews_avg_rating) <= $i ? 'far' : 'fas'); ?> fa-star"></i>
                                                </span>
                                            <?php endfor; ?>
                                        <?php else: ?>
                                            <?php for($i = 0; $i < 5; $i++): ?>
                                                <i class="far fa-star"></i>
                                            <?php endfor; ?>
                                        <?php endif; ?>
                                    </div>
                                </span>
                                <span><?php echo e($product->approved_reviews_count); ?> Ratting (S)</span>
                            </div>
                        </div>
                        <div class="details-price">
                            <span>Rp.<?php echo e(number_format($product->price)); ?></span>
                        </div>
                        <p><?php echo $product->description; ?></p>
                            <form action="<?php echo e(route('cart.store')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">

                                <div class="quickview-plus-minus">
                                    <div class="cart-plus-minus">
                                        <input type="number" name="qty" min="1" value="1" class="cart-plus-minus-box" placeholder="qty">
                                    </div>
                                    <div class="quickview-btn-cart">
                                        <button type="submit" class="submit contact-btn btn-hover">add to cart</button>
                                    </div>
                                    <div class="quickview-btn-wishlist">
                                        <a class="btn-hover" href="#"><i class="pe-7s-like"></i></a>
                                    </div>
                                </div>
							</form>
                        <div class="product-details-cati-tag mt-35">
                            <ul>
                                <li class="categories-title">Categories :</li>
                                <li><a class="badge badge-warning text-white" href="<?php echo e(route('shop.index', $product->category->slug)); ?>"><?php echo e($product->category->name); ?></a></li>
                            </ul>
                        </div>
                        <div class="product-details-cati-tag mtb-10">
                            <ul>
                                <li class="categories-title">Tags :</li>
                                <li>
                                    <?php if($product->tags->count() > 0): ?>
                                        <?php $__currentLoopData = $product->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="<?php echo e(route('shop.tag', $tag->slug)); ?>">
                                            <span class="badge badge-info"><?php echo e($tag->name); ?></span>
                                        </a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </li>
                            </ul>
                        </div>
                        <div class="product-share">
                            <ul>
                                <li class="categories-title">Share :</li>
                                <li>
                                <iframe
                                        src="https://www.facebook.com/plugins/share_button.php?href=<?php echo e(URL::current()); ?>&layout=button&size=small&appId=1079454672514017&width=75&height=20"
                                        width="75" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true"
                                        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>

                                    <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a>
                                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-description-review-area pb-90">
        <div class="container">
            <div class="product-description-review text-center">
                <div class="description-review-title nav" role=tablist>
                    <a class="active" href="#pro-review" data-toggle="tab" role="tab" aria-selected="false">
                        Reviews (<?php echo e($product->approved_reviews_count); ?>)
                    </a>
                    <a href="#pro-dec" data-toggle="tab" role="tab" aria-selected="true">
                        Description
                    </a>
                </div>
                <div class="description-review-text tab-content">
                    <div class="tab-pane fade" id="pro-dec" role="tabpanel">
                        <p><?php echo $product->details; ?></p>
                    </div>
                    <div class="tab-pane active show fade" id="pro-review" role="tabpanel">
                        <div class="page-blog-details section-padding--lg bg--white pt-0">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-9 col-12">
                                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('shop.single-product-review-component', ['product' => $product])->html();
} elseif ($_instance->childHasBeenRendered('OMrCF29')) {
    $componentId = $_instance->getRenderedChildComponentId('OMrCF29');
    $componentTag = $_instance->getRenderedChildComponentTagName('OMrCF29');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('OMrCF29');
} else {
    $response = \Livewire\Livewire::mount('shop.single-product-review-component', ['product' => $product]);
    $html = $response->html();
    $_instance->logRenderedChild('OMrCF29', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="popular-product-area wrapper-padding-3 pt-115 pb-115">
            <div class="container-fluid">
                <br>
                <div class="section-title-furits section-title-6 text-center mb-50">
                    <h2>Relate Product</h2>
                </div>
                <br>
                <div class="product-style">
                    <div class="popular-product-active owl-carousel">
                        <?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="<?php echo e(route('product.show', $product->slug)); ?>">
                                        <?php if($product->firstMedia): ?>
                                        <img src="<?php echo e(asset('storage/images/products/' . $product->firstMedia->file_name)); ?>"
                                         alt="<?php echo e($product->name); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo e(asset('frontend/assets/img/product/fashion-colorful/1.jpg')); ?>" alt="<?php echo e($product->name); ?>">
                                        <?php endif; ?>
                                    </a>
                                    <div class="product-action">
                                        <a class="animate-left add-to-fav" title="Wishlist"  product-slug="<?php echo e($product->slug); ?>" href="">
                                            <i class="pe-7s-like"></i>
                                        </a>
                                        <a class="animate-top add-to-card" title="Add To Cart" href="" product-id="<?php echo e($product->id); ?>" product-slug="<?php echo e($product->slug); ?>">
                                            <i class="pe-7s-cart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="funiture-product-content text-center">
                                    <h4><a href="<?php echo e(route('product.show', $product->slug)); ?>"><?php echo e($product->name); ?></a></h4>
                                    <span>Rp.<?php echo e(number_format($product->price)); ?></span>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Storage/Document/project/joki/laravel-ecommerce/resources/views/frontend/product/show.blade.php ENDPATH**/ ?>