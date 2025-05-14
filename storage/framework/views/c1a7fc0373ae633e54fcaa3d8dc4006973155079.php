<!doctype html>
<html class="no-js" lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo e(config('app.name', 'Laravel')); ?> |  <?php echo $__env->yieldContent('title'); ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('frontend/assets/img/favicon.png')); ?>">
		
		<!-- all css here -->
        <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/bootstrap.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/magnific-popup.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/animate.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/owl.carousel.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/themify-icons.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/pe-icon-7-stroke.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/icofont.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/meanmenu.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/easyzoom.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/bundle.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/style.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/responsive.css')); ?>">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="<?php echo e(asset('frontend/assets/js/vendor/modernizr-2.8.3.min.js')); ?>"></script>
        
        <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/custom.css')); ?>">

        <!-- CSRF Token -->
		<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <?php echo \Livewire\Livewire::styles(); ?>

    </head>
    <body>

        <!-- header start -->
            <header>
                <div class="header-top-furniture wrapper-padding-2 res-header-sm">
                    <div class="container-fluid">
                        <div class="header-bottom-wrapper">
                            <div class="logo-2 furniture-logo ptb-30">
                                <a href="/">
                                    <h3 class="logo-furniture">Daurin</h3>
                                </a> 
                            </div>
                            <div class="menu-style-2 furniture-menu menu-hover">
                                <nav>
                                    <ul>
                                        <li>
                                            <a href="/">home</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(route('shop.index')); ?>">shop</a>
                                        </li>
                                        <li><a href="#">Categories</a>
                                            <ul class="single-dropdown">
                                                <?php $__currentLoopData = $categories_menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category_menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><a href="<?php echo e(route('shop.index', $category_menu->slug)); ?>"><?php echo e($category_menu->name); ?></a></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">contact</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="header-cart">
                                <a class="icon-cart-furniture" href="<?php echo e(route('cart.index')); ?>">
                                    <i class="ti-shopping-cart"></i>
                                    <span class="shop-count-furniture green"><?php echo e(\Cart::getTotalQuantity()); ?></span>
                                </a>
                                <?php if(!\Cart::isEmpty()): ?>
                                    <ul class="cart-dropdown">
                                    <?php $__currentLoopData = \Cart::getContent(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $product = $item->associatedModel;
											$image = !empty($product->firstMedia) ? asset('storage/images/products/'. $product->firstMedia->file_name) : asset('frontend/assets/img/cart/3.jpg')
                                        ?>
                                        <li class="single-product-cart">
                                            <div class="cart-img">
                                                <a href="<?php echo e(route('product.show', $product->slug)); ?>"><img src="<?php echo e($image); ?>" alt="<?php echo e($product->name); ?>" style="width:100px"></a>
                                            </div>
                                            <div class="cart-title">
                                                <h5><a href="<?php echo e(route('product.show', $product->slug)); ?>"><?php echo e($item->name); ?></a></h5>
                                                <span><?php echo e(number_format($item->price)); ?> x <?php echo e($item->quantity); ?></span>
                                            </div>
                                            <div class="cart-delete">
                                                <form id="deleteCart" action="<?php echo e(route('cart.destroy', $item->id)); ?>" method="POST" class="d-none">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('delete'); ?>
                                                </form>
                                                <a href="" onclick="event.preventDefault();document.getElementById('deleteCart').submit();" class="delete"><i class="ti-trash"></i></a>
                                            </div>
                                        </li>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <li class="cart-space">
                                            <div class="cart-sub">
                                                <h4>Subtotal</h4>
                                            </div>
                                            <div class="cart-price">
                                                <h4><?php echo e(number_format(\Cart::getSubTotal())); ?></h4>
                                            </div>
                                        </li>
                                        <li class="cart-btn-wrapper">
                                            <a class="cart-btn btn-hover" href="<?php echo e(route('cart.index')); ?>">view cart</a>
                                            <a class="cart-btn btn-hover" href="<?php echo e(route('checkout.process')); ?>">checkout</a>
                                        </li>
                                    </ul>
                                 <?php endif; ?>   
                            </div>
                        </div>
                        <div class="row">
                            <div class="mobile-menu-area d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none">
                                <div class="mobile-menu">
                                    <nav id="mobile-menu-active">
                                        <ul class="menu-overflow">
                                            <li>
                                                <a href="#">HOME</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo e(route('shop.index')); ?>">shop</a>
                                            </li>
                                            <li><a href="#">categories</a>
                                                <ul>
                                                <?php $__currentLoopData = $categories_menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category_menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><a href="<?php echo e(route('shop.index', $category_menu->slug)); ?>"><?php echo e($category_menu->name); ?></a></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </li>
                                            <li><a href="#"> Contact  </a></li>
                                        </ul>
                                    </nav>							
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom-furniture wrapper-padding-2 border-top-3" style="border-bottom: 1px solid #e0e0e0;">
                    <div class="container-fluid">
                        <div class="furniture-bottom-wrapper">
                            <div class="furniture-login">
                                <ul>
                                    <?php if(auth()->guard()->guest()): ?>
                                        <li>Get Access: <a href="<?php echo e(route('login')); ?>">Login</a></li>
                                        <li><a href="<?php echo e(route('register')); ?>">Register</a></li>
                                    <?php else: ?>
                                        <li>Hello: <a href="<?php echo e(route('profile.index')); ?>"><?php echo e(auth()->user()->username); ?></a></li>
                                        <a href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            <?php echo e(__('Logout')); ?>

                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo csrf_field(); ?>
                                        </form>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <div class="furniture-search">
                                <form>
                                    <input placeholder="I am Searching for . . ." type="text" name="q" autocomplete="off" id="search">
                                    <button disabled>
                                        <i class="ti-search"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="furniture-wishlist">
                                <ul>
                                    <li>
                                        <a href="<?php echo e(route('favorite.index')); ?>"><i class="ti-heart"></i> Favorites</a>
                                    </li>
                                    <?php if(auth()->guard()->check()): ?>
                                    <li>
                                        <a href="<?php echo e(route('orders.index')); ?>"><i class="ti-money"></i> Orders</a>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        <!-- header end -->

        <?php echo $__env->yieldContent('content'); ?>

        <!-- footer -->
        <footer class="footer-area">
            <div class="footer-top-area pt-70 pb-35 wrapper-padding-5">
                <div class="container-fluid">
                    <div class="widget-wrapper">
                        <div class="footer-widget mb-30">
                            <h3 class="footer-widget-title-5">Daurin</h3>
                            <div class="footer-about-2">
                                <p>There are many variations of passages of Lorem Ipsum <br>the majority have suffered alteration in some form, by <br> injected humour</p>
                            </div>
                        </div>
                        <div class="footer-widget mb-30">
                            <h3 class="footer-widget-title-5">Contact Info</h3>
                            <div class="footer-info-wrapper-3">
                                <div class="footer-address-furniture">
                                    <div class="footer-info-icon3">
                                        <span>Address: </span>
                                    </div>
                                    <div class="footer-info-content3">
                                        <p>66 Sipu road Rampura Banasree <br>USA- 10800</p>
                                    </div>
                                </div>
                                <div class="footer-address-furniture">
                                    <div class="footer-info-icon3">
                                        <span>Phone: </span>
                                    </div>
                                    <div class="footer-info-content3">
                                        <p>+8801 (33) 515609735 <br>+8801 (66) 223352333</p>
                                    </div>
                                </div>
                                <div class="footer-address-furniture">
                                    <div class="footer-info-icon3">
                                        <span>E-mail: </span>
                                    </div>
                                    <div class="footer-info-content3">
                                        <p><a href="#"> email@domain.com</a> <br><a href="#"> domain@mail.info</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="footer-widget mb-30">
                            <h3 class="footer-widget-title-5">Newsletter</h3>
                            <div class="footer-newsletter-2">
                                <p>Send us your mail or next updates</p>
                                <div id="mc_embed_signup" class="subscribe-form-5">
                                    <form action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                                        <div id="mc_embed_signup_scroll" class="mc-form">
                                            <input type="email" value="" name="EMAIL" class="email" placeholder="Enter mail address" required>
                                            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                            <div class="mc-news" aria-hidden="true"><input type="text" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value=""></div>
                                            <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom ptb-20 gray-bg-8">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="copyright-furniture">
                                <p>Copyright © <a href="https://hastech.company/">HasTech</a> 2018 . All Right Reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>


     
       
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
        <?php echo \Livewire\Livewire::scripts(); ?>

		<!-- all js here -->
        <script src="<?php echo e(asset('frontend/assets/js/vendor/jquery-1.12.0.min.js')); ?>"></script>
        <script src="<?php echo e(asset('frontend/assets/js/popper.js')); ?>"></script>
        <script src="<?php echo e(asset('frontend/assets/js/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('frontend/assets/js/jquery.magnific-popup.min.js')); ?>"></script>
        <script src="<?php echo e(asset('frontend/assets/js/isotope.pkgd.min.js')); ?>"></script>
        <script src="<?php echo e(asset('frontend/assets/js/imagesloaded.pkgd.min.js')); ?>"></script>
        <script src="<?php echo e(asset('frontend/assets/js/jquery.counterup.min.js')); ?>"></script>
        <script src="<?php echo e(asset('frontend/assets/js/waypoints.min.js')); ?>"></script>
        <script src="<?php echo e(asset('frontend/assets/js/ajax-mail.js')); ?>"></script>
        <script src="<?php echo e(asset('frontend/assets/js/owl.carousel.min.js')); ?>"></script>
        <script src="<?php echo e(asset('frontend/assets/js/plugins.js')); ?>"></script>
        <script src="<?php echo e(asset('frontend/assets/js/main.js')); ?>"></script>
        <script src="<?php echo e(asset('frontend/assets/js/app.js')); ?>"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
        <script>
            $(document).ready(function() {
                let bloodhound = new Bloodhound({
                    datumTokenizer: Bloodhound.tokenizers.whitespace,
                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                    remote: {
                        url: '<?php echo e(url("search")); ?>?productName=%QUERY%', //'/user/find?q=%QUERY%',
                        wildcard: '%QUERY%'
                    },
                });

                $('#search').typeahead({
                    hint: true,
                    highlight: true,
                    minLength: 1
                }, {
                    name: 'products',
                    source: bloodhound,
                    limit: 10,
                    display: function(data) {
                        return data.name  //Input value to be set when you select a suggestion.
                    },
                    templates: {
                        empty: [
                            '<div class="list-group-item">There are no matching search results</div>'
                        ],
                        header: [
                            '<div class="list-group search-results-dropdown">'
                        ],
                        suggestion: function(data) {
                            return '<div style="font-weight:normal; width:100%" class="list-group-item"><a href="<?php echo e(url('product')); ?>/'+data.slug+'">' + data.name + '</a></div></div>'
                        }
                    }
                });
            });
        </script>
    </body>
</html>
<?php /**PATH /Volumes/Storage/Document/project/joki/laravel-ecommerce/resources/views/layouts/frontend.blade.php ENDPATH**/ ?>