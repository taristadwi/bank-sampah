<?php $__env->startSection('content'); ?>
	<div class="container">
        <div class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2>Revenue Report</h2>
                        </div>
                        <div class="card-body">
                            <form action="" class="mb-5">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group mb-2">
                                            <input type="text" class="form-control datepicker" readonly="" value="<?php echo e(!empty(request()->input('start')) ? request()->input('start') : ''); ?>" name="start" placeholder="from">
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group mx-sm-3 mb-2">
                                            <input type="text" class="form-control datepicker" readonly="" value="<?php echo e(!empty(request()->input('end')) ? request()->input('end') : ''); ?>" name="end" placeholder="to">
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group mx-sm-3 mb-2">
                                            <select name="export" class="form-control">
                                                <option value="xlsx">excel</option>
                                                <option value="pdf">pdf</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group mx-sm-3 mb-2">
                                            <button type="submit" class="btn btn-primary btn-default">Go</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                           <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                    <thead>
                                        <th>Date</th>
                                        <th>Orders</th>
                                        <th>Gross Revenue</th>
                                        <th>Taxes</th>
                                        <th>Shipping</th>
                                        <th>Net Revenue</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $totalOrders = 0;
                                            $totalGrossRevenue = 0;
                                            $totalTaxesAmount = 0;
                                            $totalShippingAmount = 0;
                                            $totalNetRevenue = 0;
                                        ?>
                                        <?php $__empty_1 = true; $__currentLoopData = $revenues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $revenue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>    
                                                <td><?php echo e($revenue->date); ?></td>
                                                <td>
                                                    <a href="<?php echo e(url('admin/orders?start='. $revenue->date .'&end='. $revenue->date . '&status=completed')); ?>"><?php echo e($revenue->num_of_orders); ?></a>
                                                </td>
                                                <td><?php echo e($revenue->gross_revenue); ?></td>
                                                <td><?php echo e($revenue->taxes_amount); ?></td>
                                                <td><?php echo e($revenue->shipping_amount); ?></td>
                                                <td><?php echo e($revenue->net_revenue); ?></td>
                                            </tr>

                                            <?php
                                                $totalOrders += $revenue->num_of_orders;
                                                $totalGrossRevenue += $revenue->gross_revenue;
                                                $totalTaxesAmount += $revenue->taxes_amount;
                                                $totalShippingAmount += $revenue->shipping_amount;
                                                $totalNetRevenue += $revenue->net_revenue;
                                            ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr>
                                                <td colspan="6">No records found</td>
                                            </tr>
                                        <?php endif; ?>
                                        
                                        <?php if($revenues): ?>
                                            <tr>
                                                <td>Total</td>
                                                <td><strong><?php echo e($totalOrders); ?></strong></td>
                                                <td><strong><?php echo e($totalGrossRevenue); ?></strong></td>
                                                <td><strong><?php echo e($totalTaxesAmount); ?></strong></td>
                                                <td><strong><?php echo e($totalShippingAmount); ?></strong></td>
                                                <td><strong><?php echo e($totalNetRevenue); ?></strong></td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-alt'); ?>
<script src="<?php echo e(asset('backend/plugins/bootstrap-datepicker.min.js')); ?>"></script>
    <script>
        $('.datepicker').datepicker({
			format: 'yyyy-mm-dd'
		});
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Storage/Document/project/joki/laravel-ecommerce/resources/views/admin/reports/revenue.blade.php ENDPATH**/ ?>