<?php
$review_number = 2;
$customner_number = 6;
$order_number = 5;
$pageviews = 6251;
$completion_task_percent = 61;
$earning_money = 32000;
?>

<div class="infobox infobox-green">
	<div class="infobox-icon">
		<i class="ace-icon fa fa-comments"></i>
	</div>

	<div class="infobox-data">
		<span class="infobox-data-number"><?php echo $review_number ?></span>
		<div class="infobox-content"> reviews
		</div>
	</div>

	<div class="stat stat-success">5%</div>
</div>

<div class="infobox infobox-blue">
	<div class="infobox-icon">
		<i class="ace-icon fa fa-user"></i>
	</div>

	<div class="infobox-data">
		<span class="infobox-data-number"><?php echo $customner_number ?></span>
		<div class="infobox-content">Customers</div>
	</div>

	<div class="badge badge-success">
		+32%
		<i class="ace-icon fa fa-arrow-up"></i>
	</div>
</div>

<div class="infobox infobox-pink">
	<div class="infobox-icon">
		<i class="ace-icon fa fa-shopping-cart"></i>
	</div>

	<div class="infobox-data">
		<span class="infobox-data-number"><?php echo $order_number ?></span>
		<div class="infobox-content">new orders</div>
	</div>
	<div class="stat stat-important">4%</div>
</div>

<div class="infobox infobox-orange2">
	<div class="infobox-chart">
		<span class="sparkline" data-values="196,128,202,177,154,94,100,170,224"></span>
	</div>

	<div class="infobox-data">
		<span class="infobox-data-number"><?= $pageviews ?></span>
		<div class="infobox-content">pageviews</div>
	</div>

	<div class="badge badge-success">
		7.2%
		<i class="ace-icon fa fa-arrow-up"></i>
	</div>
</div>

<div class="infobox infobox-green infobox infobox-dark">
	<div class="infobox-progress">
		<div class="easy-pie-chart percentage" data-percent="61" data-size="39">
			<span class="percent"><?= $completion_task_percent ?></span>%
		</div>
	</div>

	<div class="infobox-data">
		<div class="infobox-content">Task</div>
		<div class="infobox-content">Completion</div>
	</div>
</div>

<div class="infobox infobox-blue infobox infobox-dark">
	<div class="infobox-chart">
		<span class="sparkline" data-values="3,4,2,3,4,4,2,2"></span>
	</div>

	<div class="infobox-data">
		<div class="infobox-content">Earnings</div>
		<div class="infobox-content">$<?= $earning_money ?></div>
	</div>
</div>
