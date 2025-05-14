<!DOCTYPE html>
<html>
  	<head>
		<meta charset="utf-8">
		<title>Revenue Reprot</title>
		<style type="text/css">
			table {
				width: 100%;
			}

			table tr td,
			table tr th {
				font-size: 10pt;
				text-align: left;
			}

			table tr:nth-child(even) {
				background-color: #f2f2f2;
			}

			table th, td {
  				border-bottom: 1px solid #ddd;
			}

			table th {
				border-top: 1px solid #ddd;
				height: 40px;
			}

			table td {
				height: 25px;
			}
		</style>
	</head>
  	<body>
		<h2>Revenue Report</h2>
		<hr>
		<p>Period : <?php echo e($startDate); ?> - <?php echo e($endDate); ?></p>
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
						<td><?php echo e($revenue->date); ?></td>
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
					<td><strong><?php echo e($totalOrders); ?></strong></td>
					<td><strong><?php echo e($totalGrossRevenue); ?></strong></td>
					<td><strong><?php echo e($totalTaxesAmount); ?></strong></td>
					<td><strong><?php echo e($totalShippingAmount); ?></strong></td>
					<td><strong><?php echo e($totalNetRevenue); ?></strong></td>
				</tr>
			</tbody>
		</table>
 	</body>
</html><?php /**PATH /Volumes/Storage/Document/project/joki/laravel-ecommerce/resources/views/admin/reports/exports/revenue-pdf.blade.php ENDPATH**/ ?>