<!--  -->
<?php
// $review_number = 2;
// $customner_number = 6;
// $order_number = 5;
// $earning_money = 32000;
?>

<!-- PAGE CONTENT BEGINS -->

<h3 class="header smaller lighter blue"> Thống Kê</h3>
<div class="row">
	<div class="space-6"></div>

	<div class="col-sm-6 infobox-container">


<div class="infobox infobox-green">
	<div class="infobox-icon">
		<i class="ace-icon fa fa-comments"></i>
	</div>

	<div class="infobox-data">
		<span class="infobox-data-number"><?php echo $review_number ?></span>
		<div class="infobox-content"> Bài review
		</div>
	</div>

	<!-- <div class="stat stat-success">5%</div> -->
</div>

<div class="infobox infobox-blue">
	<div class="infobox-icon">
		<i class="ace-icon fa fa-user"></i>
	</div>

	<div class="infobox-data">
		<span class="infobox-data-number"><?php echo $customner_number ?></span>
		<div class="infobox-content">Khách hàng</div>
	</div>

	<!-- <div class="badge badge-success">
		+32%
		<i class="ace-icon fa fa-arrow-up"></i>
	</div> -->
</div>

<div class="infobox infobox-pink">
	<div class="infobox-icon">
		<i class="ace-icon fa fa-shopping-cart"></i>
	</div>

	<div class="infobox-data">
		<span class="infobox-data-number"><?php echo $order_number ?></span>
		<div class="infobox-content">Đơn hàng</div>
	</div>
	<!-- <div class="stat stat-important">4%</div> -->
</div>

<!-- <div class="infobox infobox-orange2">
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
</div> -->

<div class="infobox infobox-grey">
	<div class="infobox-icon">
		<i class="ace-icon fa fa-twitter"></i>
	</div>

	<div class="infobox-data">
		<span class="infobox-data-number"><?= $subscriber_number ?></span>
		<div class="infobox-content">Người theo dõi</div>
	</div>

	<!-- <div class="badge badge-success">
		+32%
		<i class="ace-icon fa fa-arrow-up"></i>
	</div> -->
</div>

<div class="infobox infobox-blue infobox infobox-dark ">
	<div class="infobox-chart">
		<span class="sparkline" data-values="3,4,2,3,4,4,2,2">
		<canvas width="39" height="19" style="display: inline-block; width: 39px; height: 19px; vertical-align: top;">		
		</canvas>
	</span>
	</div>

	<div class="infobox-data">
		<div class="infobox-content">Số tiền kiếm được</div>
		<div class="infobox-content">$<?= $earning_money ?></div>
	</div>
</div>

	</div>

	<div class="vspace-12-sm"></div>

	<div class="col-sm-5">

		<div class="widget-box">
			<div class="widget-header widget-header-flat widget-header-small">
				<h5 class="widget-title">
					<i class="ace-icon fa fa-signal"></i>
					Cơ cấu doanh số bán hàng
				</h5>

			</div>

			<div class="widget-body">
				<div class="widget-main">
					<div id="piechart-placeholder"></div>

				</div><!-- /.widget-main -->
			</div><!-- /.widget-body -->
		</div><!-- /.widget-box -->
	</div><!-- /.col -->
</div><!-- /.row -->


<!-- PAGE CONTENT ENDS -->
