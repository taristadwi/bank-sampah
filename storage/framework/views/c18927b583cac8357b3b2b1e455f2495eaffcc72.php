<div class="shop-sidebar mr-50">
    <div class="sidebar-widget mb-40">
        <h3 class="sidebar-title">CATEGORIES</h3>
            <?php $__currentLoopData = $categories_menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category_menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="py-2 px-4 bg-dark text-white mb-3">
                <strong class="small text-uppercase font-weight-bold">
                    <a class="text-decoration-none text-white" href="<?php echo e(route('shop.index', $category_menu->slug)); ?>">
                        <?php echo e($category_menu->name); ?>

                    </a>
                </strong>
            </div>
            <ul class="list-unstyled small text-muted pl-lg-4 font-weight-normal">
                    <?php $__currentLoopData = $category_menu->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="mb-2">
                        <a class="reset-anchor text-decoration-none px-3" style="color: #000;" href="<?php echo e(route('shop.index', $child->slug)); ?>">
                            <?php echo e($child->name); ?>

                        </a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
    </div>
    <div class="sidebar-widget mb-40">
        <h3 class="sidebar-title">TAGS</h3>
        <hr style="margin-top: 0; margin-bottom: 10px; border: solid 1px;">
        <div class="price_filter">
          
            <div class="price_slider_amount">
                <div class="sidebar-categories">
                    <ul>
                        <?php $__currentLoopData = $tags_menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag_menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span style="background: #ebebeb none repeat scroll 0 0; color: #333;
                            display: inline-block; font-size: 12px; line-height: 20px; margin:
                            5px 5px 0 0; padding: 5px 15px; text-transform: capitalize;">
                                <a href="<?php echo e(route('shop.tag', $tag_menu->slug)); ?>" class="text-decoration-none" style="color: #000;">
                                    <?php echo e($tag_menu->name); ?>

                                    (<?php echo e($tag_menu->products_count); ?>)
                                </a>
                            </span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar-widget mb-40">
        <h3 class="sidebar-title">RECENT REVIEWS</h3>
        <hr style="margin-top: 0; margin-bottom: 10px; border: solid 1px;">
        <ul>
            <?php $__currentLoopData = $recent_reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent_review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <div class="post-wrapper d-flex">
                        <div class="mb-2">
                            <img src="https://ui-avatars.com/api/?name=<?php echo e($recent_review->user->name); ?>&background=0d8abc&color=fff" alt="<?php echo e($recent_review->name); ?>">
                        </div>
                        <div class="ml-3 p-0">
                            <?php if(isset($recent_review->product->slug)): ?>
                                <p>
                                    <span class=""><?php echo e($recent_review->user->name); ?></span>
                                    <small class="text-success"> review on :
                                        <?php echo e($recent_review->product->name); ?>

                                    </small>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>
<?php /**PATH /Volumes/Storage/Document/project/joki/laravel-ecommerce/resources/views/frontend/shop/sidebar.blade.php ENDPATH**/ ?>