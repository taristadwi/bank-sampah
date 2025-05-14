<?php $__env->startSection('title', 'Shop products'); ?>
<?php $__env->startSection('content'); ?>
    <div class="shop-page-wrapper shop-page-padding ptb-100">
        <div class="container-fluid m-auto">
            <div class="row">
                <div class="col-lg-3">
                    <?php echo $__env->make('frontend.shop.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="col-lg-9">
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('shop.product-component', ['slug' => $slug])->html();
} elseif ($_instance->childHasBeenRendered('LhvK1vZ')) {
    $componentId = $_instance->getRenderedChildComponentId('LhvK1vZ');
    $componentTag = $_instance->getRenderedChildComponentTagName('LhvK1vZ');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('LhvK1vZ');
} else {
    $response = \Livewire\Livewire::mount('shop.product-component', ['slug' => $slug]);
    $html = $response->html();
    $_instance->logRenderedChild('LhvK1vZ', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Storage/Document/project/joki/laravel-ecommerce/resources/views/frontend/shop/index.blade.php ENDPATH**/ ?>