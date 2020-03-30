<!-- 
HTML sturture

Parameter:
	price_min,price_max: save filtered before
	filter_info: save filtered before
	record_number: number of product in store
	
	table: product table is formated
	m_table: manufacturer table formated(add column "check" save filtered before and "number" of record)
 -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					
<!-- Cell contain filter tool for user  -->
	<div class="col-md-3">
	<!-- 
		Filter form via get method
	Parameters:
		category: save filter category from get method
		price_min, price_max: price filter 
		manufacturer[]: check list of manufacturer filter
	 -->
	<form id="filter-form" action="index.php" method="GET" > 

		<!-- aside Widget -->
		<div class="aside ">
			<h3 class="aside-title">Giá Tiền ( .000 VNĐ)</h3>
			<!--  -->
			<div class="price-filter">
				<div id="price-slider"></div>
				<div class="input-number price-min">
					<input id="price-min" name="price_min" value="<?=$price_min?>">
					<span class="qty-up">+</span>
					<span class="qty-down">-</span> 
				</div>
				<span>-</span>
				<div class="input-number price-max">
					<input id="price-max"  name="price_max" value="<?=$price_max?>">
					<span class="qty-up">+</span>
					<span class="qty-down">-</span>
				</div>
			</div>
		</div>
		<!-- /aside Widget -->

		<!-- aside Widget -->
		<div class="aside ">
			
			<h3 class="aside-title">Thương Hiệu</h3>
			
			<!-- check list for filter manufacturer 
			List all manufacturers and map with a check box to filter 
			-->
			<div id= "manufacturer-filter" class="checkbox-filter">
				<?php 
				foreach ($m_table as $manufacturer) {
				?>
				<div class="input-checkbox">
					<input type="checkbox" id="brand-<?= $manufacturer[db_manufacturer_id] ?>" name=manufacturer[] value="<?= $manufacturer[db_manufacturer_id] ?>" <?= $manufacturer["checked"] ?> >
					<label for="brand-<?= $manufacturer[db_manufacturer_id] ?>">
						<span></span>
						<?= $manufacturer[db_manufacturer_name] ?>
						<small>(<?= $manufacturer["number"] ?>)</small>
					</label>
				</div>
				<?php } ?>
			</div>
			
			
		</div>
		<!-- /aside Widget -->

		<!-- technique parameter filter -->
		<div class="aside ">
			<h3 class="aside-title">THÔNG SỐ KỸ THUẬT </h3>
			
			<div id= "ThongSo-filter" class="checkbox-filter">
				
			</div>
		</div>
		<!-- technique parameter filter -->

	</form>
	<!-- End Filter Form -->

	<!-- Control filter tool -->
	<div class="filter-box wrapper">
		<button class="sticky fixed-filter-apply" onclick="submitFilter()">
		 	Ap Dung
		</button>
	</div>
	<!-- End Control Filter Tool -->
</div>
<!-- End Cell -->
					

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="filter-infomation row ">
	
								Bo Loc: <?= $filter_info ?> ( <?= $record_number ?> Ket Qua)	
								<button >
									Xoa Bo Loc
								</button>
							</div>	

							<div class="row">
								
								<div class="store-sort ">
									<label>
										Sort By:
										<select class="input-select">
											<option value="0">Popular</option>
											<option value="1">Position</option>
										</select>
									</label>

									<label>
										Show:
										<select class="input-select">
											<option value="0">20</option>
											<option value="1">50</option>
										</select>
									</label>
								</div>
								<ul class="store-grid ">
									<li class="active"><i class="fa fa-th"></i></li>
									<li><a href="#"><i class="fa fa-th-list"></i></a></li>
								</ul>							</div>
							
						</div>
						<!-- /store top filter -->

						<!-- store products -->
						
						<div class="row"><!-- product -->
<?php
	foreach ($table as $record) {
		$productData = [
			"id"    => $record[db_product_id], 
			"name"  => $record[db_product_name],
			"price" => $record[db_product_price],		
			"old_price" => $record["old_price"],
			"img"   => $record[db_product_image], 
			"discount"   => $record[db_product_discount],
			"rank" => $record[db_product_rank],
			"new" => $record[db_product_new]
		];
?>
							<div class="col-md-4 col-xs-6">
<?php
	$productTemplate = new Template("module/product", $productData );
	$productTemplate->render();
 ?>
							</div>
							<!-- /product -->
<?php } ?>
						</div>
						<!-- /store products -->

						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<span class="store-qty">Showing 20-100 products</span>
							<ul class="store-pagination">
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION