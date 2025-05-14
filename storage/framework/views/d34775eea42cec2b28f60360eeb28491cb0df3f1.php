<table>
	<thead>
		<tr>
			<th>Date</th>
			<th>Orders</th>
			<th>Gross Revenue</th>
			<th>Taxes</th>
			<th>Shipping</th>
			<th>Net Revenue</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$totalOrders = 0;
			$totalGrossRevenue = 0;
			$totalTaxesAmount = 0;
			$totalShippingAmount = 0;
			$totalNetRevenue = 0;
		?>
		<?php $__currentLoopData = $revenues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $revenue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>    
				<td><?php echo e($revenue->date, 'd M Y'); ?></td>
				<td><?php echo e($revenue->num_of_orders); ?></td>
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
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<tr>
			<td>Total</td>
			<td><?php echo e($totalOrders); ?></td>
			<td><?php echo e($totalGrossRevenue); ?></td>
			<td><?php echo e($totalTaxesAmount); ?></td>
			<td><?php echo e($totalShippingAmount); ?></td>
			<td><?php echo e($totalNetRevenue); ?></td>
		</tr>
	</tbody>
</table><?php /**PATH /Volumes/Storage/Document/project/joki/laravel-ecommerce/resources/views/admin/reports/exports/revenue-excel.blade.php ENDPATH**/ ?>