<?php $__env->startSection('content'); ?>
<div class="content">
	<div class="row">
		<div class="col-lg-6">
			<div class="card card-default">
				<div class="card-header card-header-border-bottom">
					<h2>Order Shipment #<?php echo e($shipment->order->code); ?></h2>
				</div>
				<div class="card-body">
                    <form action="<?php echo e(url('admin/shipments', $shipment->id)); ?>" method="post">
                        <?php echo csrf_field(); ?> 
                        <?php echo method_field('put'); ?>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name"  value="<?php echo e($shipment->first_name); ?>" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name"  value="<?php echo e($shipment->last_name); ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address1">Address 1</label>
                            <input type="text" name="address1"  value="<?php echo e($shipment->address1); ?>" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="address2">Address 2</label>
                            <input type="text" name="address2" value="<?php echo e($shipment->address2); ?>" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                        <label>Province<span class="required">*</span></label>
                            <select name="province_id" class="form-control" disabled>
                                    <option value="">- Please Select -</option>
                                <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province => $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e($shipment->province_id == $province ? 'selected' : null); ?> value="<?php echo e($province); ?>"><?php echo e($pro); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select> 
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label>City<span class="required">*</span></label>
                                <select name="city_id" class="form-control" disabled>
                                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city => $ty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo e($shipment->city_id == $city ? 'selected' : null); ?> value="<?php echo e($city); ?>"><?php echo e($ty); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select> 
                            </div>
                            <div class="col-md-6">
                                <label for="postcode">Postcode</label>
                                <input type="text" name="postcode" value="<?php echo e($shipment->postcode); ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" value="<?php echo e($shipment->phone); ?>" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="email">Email</label>
                                <input type="email" name="email" value="<?php echo e($shipment->email); ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="qty">Total Qty</label>
                                <input type="number" name="qty" value="<?php echo e($shipment->total_qty); ?>" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="total_weight">Total Weight</label>
                                <input type="text" name="total_weight" value="<?php echo e($shipment->total_weight); ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="track_number">Track Number</label>
                            <input type="text" name="track_number" value="<?php echo e($shipment->track_number); ?>" class="form-control" >
                        </div>
                        <div class="form-footer pt-5 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Save</button>
                            <a href="<?php echo e(url('admin/orders/'. $shipment->order->id)); ?>" class="btn btn-secondary btn-default">Back</a>
                        </div>
                    </form>
				</div>
			</div>  
		</div>
		<div class="col-lg-6">
			<div class="card card-default">
				<div class="card-header card-header-border-bottom">
					<h2>Detail Order</h2>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-xl-6 col-lg-6">
							<p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Billing Address</p>
							<address>
								<?php echo e($shipment->order->customer_company); ?> <?php echo e($shipment->order->customer_last_name); ?>

								<br> <?php echo e($shipment->order->customer_address1); ?>

								<br> <?php echo e($shipment->order->customer_address2); ?>

								<br> Email: <?php echo e($shipment->order->customer_email); ?>

								<br> Phone: <?php echo e($shipment->order->customer_phone); ?>

								<br> Postcode: <?php echo e($shipment->order->customer_postcode); ?>

							</address>
						</div>
						<div class="col-xl-6 col-lg-6">
							<p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Details</p>
							<address>
								ID: <span class="text-dark">#<?php echo e($shipment->order->code); ?></span>
								<br> <?php echo e($shipment->order->order_date); ?>

								<br> Status: <?php echo e($shipment->order->status); ?>

								<br> Payment Status: <?php echo e($shipment->order->payment_status); ?>

								<br> Shipped by: <?php echo e($shipment->order->shipping_service_name); ?>

							</address>
						</div>
					</div>
					<table class="table mt-3 table-striped table-responsive table-responsive-large" style="width:100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Item</th>
								<th>Qty</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
							<?php $__empty_1 = true; $__currentLoopData = $shipment->order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
								<tr>
									<td><?php echo e($item->sku); ?></td>
									<td><?php echo e($item->name); ?></td>
									<td><?php echo e($item->qty); ?></td>
									<td><?php echo e($item->sub_total); ?></td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
								<tr>
									<td colspan="6">Order item not found!</td>
								</tr>
							<?php endif; ?>
						</tbody>
					</table>
					<div class="row  justify-content-center">
						<div class="col-lg-8 col-xl-8 col-xl-8">
							<ul class="list-unstyled mt-4">
								<li class="mid pb-3 text-dark">Subtotal
									<span class="d-inline-block float-right text-default"><?php echo e($shipment->order->base_total_price); ?></span>
								</li>
								<li class="mid pb-3 text-dark">Tax(10%)
									<span class="d-inline-block float-right text-default"><?php echo e($shipment->order->tax_amount); ?></span>
								</li>
								<li class="mid pb-3 text-dark">Shipping Cost
									<span class="d-inline-block float-right text-default"><?php echo e($shipment->order->shipping_cost); ?></span>
								</li>
								<li class="pb-3 text-dark">Total
									<span class="d-inline-block float-right"><?php echo e($shipment->order->grand_total); ?></span>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Storage/Document/project/joki/laravel-ecommerce/resources/views/admin/shipments/edit.blade.php ENDPATH**/ ?>