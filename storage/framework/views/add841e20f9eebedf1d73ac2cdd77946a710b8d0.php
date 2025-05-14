<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo e(url('/')); ?>">
                <div class="sidebar-brand-text mx-3"><?php echo e(__('Homepage')); ?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php echo e(request()->is('admin/dashboard') || request()->is('admin/dashboard') ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(route('admin.dashboard.index')); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span><?php echo e(__('Dashboard')); ?></span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <?php if(auth()->user()->hasRole('admin')): ?>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <span><?php echo e(__('User Management')); ?></span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?php echo e(request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : ''); ?>" href="<?php echo e(route('admin.permissions.index')); ?>"> <i class="fa fa-briefcase mr-2"></i> <?php echo e(__('Permissions')); ?></a>
                        <a class="collapse-item <?php echo e(request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : ''); ?>" href="<?php echo e(route('admin.roles.index')); ?>"><i class="fa fa-briefcase mr-2"></i> <?php echo e(__('Roles')); ?></a>
                        <a class="collapse-item <?php echo e(request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : ''); ?>" href="<?php echo e(route('admin.users.index')); ?>"> <i class="fa fa-user mr-2"></i> <?php echo e(__('Users')); ?></a>
                    </div>
                </div>
            </li>
            <?php endif; ?>

            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseProduct" aria-expanded="true" aria-controls="collapseTwo">
                    <span><?php echo e(__('Product Management')); ?></span>
                </a>
                <div id="collapseProduct" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <?php if(auth()->user()->hasRole('admin')): ?>
                        <a class="collapse-item <?php echo e(request()->is('admin/categories') || request()->is('admin/categories/*') ? 'active' : ''); ?>" href="<?php echo e(route('admin.categories.index')); ?>"> <i class="fa fa-briefcase mr-2"></i> <?php echo e(__('Categories')); ?></a>
                        <a class="collapse-item <?php echo e(request()->is('admin/tags') || request()->is('admin/tags/*') ? 'active' : ''); ?>" href="<?php echo e(route('admin.tags.index')); ?>"> <i class="fa fa-briefcase mr-2"></i> <?php echo e(__('Tags')); ?></a>
                        <a class="collapse-item <?php echo e(request()->is('admin/slides') || request()->is('admin/slides/*') ? 'active' : ''); ?>" href="<?php echo e(route('admin.slides.index')); ?>"> <i class="fa fa-briefcase mr-2"></i> <?php echo e(__('Slides')); ?></a>
                        <?php else: ?>
                        <a class="collapse-item <?php echo e(request()->is('admin/products') || request()->is('admin/products/*') ? 'active' : ''); ?>" href="<?php echo e(route('admin.products.index')); ?>"> <i class="fa fa-briefcase mr-2"></i> <?php echo e(__('Products')); ?></a>
                        <a class="collapse-item <?php echo e(request()->is('admin/reviews') || request()->is('admin/reviews/*') ? 'active' : ''); ?>" href="<?php echo e(route('admin.reviews.index')); ?>"> <i class="fa fa-briefcase mr-2"></i> <?php echo e(__('Reviews')); ?></a>
                        <a class="collapse-item <?php echo e(request()->is('admin/slides') || request()->is('admin/slides/*') ? 'active' : ''); ?>" href="<?php echo e(route('admin.bank_accounts.index')); ?>"> <i class="fa fa-briefcase mr-2"></i> <?php echo e(__('Bank Account')); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </li>
            <?php if(!auth()->user()->hasRole('admin')): ?>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseOrder" aria-expanded="true" aria-controls="collapseTwo">
                    <span><?php echo e(__('Order Management')); ?></span>
                </a>
                <div id="collapseOrder" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?php echo e(request()->is('admin/orders') || request()->is('admin/orders/*') ? 'active' : ''); ?>" href="<?php echo e(route('admin.orders.index')); ?>"> <i class="fa fa-briefcase mr-2"></i> <?php echo e(__('Orders')); ?></a>
                        <a class="collapse-item <?php echo e(request()->is('admin/shipments') || request()->is('admin/shipmentss/*') ? 'active' : ''); ?>" href="<?php echo e(route('admin.shipments.index')); ?>"> <i class="fa fa-briefcase mr-2"></i> <?php echo e(__('Shipments')); ?></a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseReports" aria-expanded="true" aria-controls="collapseTwo">
                    <span><?php echo e(__('Report Management')); ?></span>
                </a>
                <div id="collapseReports" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?php echo e(request()->is('admin/reports/revenue') ? 'active' : ''); ?>" href="<?php echo e(route('admin.reports.revenue')); ?>"> <i class="fa fa-briefcase mr-2"></i> <?php echo e(__('Revenues')); ?></a>
                    </div>
                </div>
            </li>
            <?php endif; ?>

        </ul><?php /**PATH /Volumes/Storage/Document/project/joki/laravel-ecommerce/resources/views/partials/sidebar.blade.php ENDPATH**/ ?>