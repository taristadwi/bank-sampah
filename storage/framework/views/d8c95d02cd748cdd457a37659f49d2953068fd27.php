<?php $__env->startSection('title', 'Homepage'); ?>
<?php $__env->startSection('content'); ?>
     <!-- slides -->
     <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">       
            <div class="carousel-inner">
                <?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="carousel-item <?php echo e($key == 0 ? 'active' : ''); ?>">
                        <img src="<?php echo e(Storage::url('images/slides/'. $slide->cover)); ?>" class="d-block w-100" alt="<?php echo e($slide->title); ?>">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 class="text-white"><?php echo e($slide->title); ?></h5>
                            <p><?php echo $slide->body; ?></p>
                            <a class="furniture-slider-btn btn-hover animated text-white" style="border: 1px solid #fff;" href="<?php echo e($slide->url); ?>">Go</a>
                        </div>
                    </div>    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!-- end slides -->

        <!-- categories -->
        <div class="container mt-5">
                <div class="section-title-furits text-center">
                    <h2>BROWSE OUR CATEGORIES</h2>
                </div>
                <br>
            <div class="row mt-5">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 mb-5">
                        <div class="card category-card">
                            <a href="<?php echo e(route('shop.index', $category->slug)); ?>">
                                <img class="img-cover" src="<?php echo e(Storage::url('images/categories/'. $category->cover)); ?>" alt="">
                                <span 
                                class="position-absolute category-name" 
                                style=" position: absolute;left: 50%;top: 50%;transform: translate(-50%,-50%);background-color: white;padding: .8rem 1rem;border: 3px solid #f0f0f0;">
                                    <?php echo e($category->name); ?>

                                </span>
                            </a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <!-- end categories -->

        <!-- services -->
        <!-- <div class="services-area wrapper-padding-4 gray-bg pt-120 pb-80">
            <div class="container-fluid">
                <div class="section-title-furits text-center">
                    <h2>Why Choose Us</h2>
                </div>
                <br>
                <div class="services-wrapper mt-40">
                    <div class="single-services mb-40">
                        <div class="services-img">
                            <img src="<?php echo e(asset('frontend/assets/img/icon-img/26.png')); ?>" alt="">
                        </div>
                        <div class="services-content">
                            <h4>Free Shippig</h4>
                            <p>Contrary to popular belief, Lorem Ipsum is random text. </p>
                        </div>
                    </div>
                    <div class="single-services mb-40">
                        <div class="services-img">
                            <img src="<?php echo e(asset('frontend/assets/img/icon-img/27.png')); ?>" alt="">
                        </div>
                        <div class="services-content">
                            <h4>24/7 Support</h4>
                            <p>Contrary to popular belief, Lorem Ipsum is random text. </p>
                        </div>
                    </div>
                    <div class="single-services mb-40">
                        <div class="services-img">
                            <img src="<?php echo e(asset('frontend/assets/img/icon-img/28.png')); ?>" alt="">
                        </div>
                        <div class="services-content">
                            <h4>Secure Payments</h4>
                            <p>Contrary to popular belief, Lorem Ipsum is random text. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- end services -->

        <!-- products -->
        <div class="popular-product-area wrapper-padding-3 pt-115 pb-115">
            <div class="container-fluid">
                <br>
                <div class="section-title-furits section-title-6 text-center mb-50">
                    <h2>Popular Product</h2>
                </div>
                <br>
                <div class="product-style">
                    <div class="popular-product-active owl-carousel">
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
        <!-- end products -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Storage/Document/project/joki/laravel-ecommerce/resources/views/frontend/homepage.blade.php ENDPATH**/ ?>