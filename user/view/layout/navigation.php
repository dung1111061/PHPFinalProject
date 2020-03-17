<nav id="navigation">
<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li ><a href="index.php">Trang chủ</a></li>
						
						<?php
							foreach ($category_table as $record) {
								$id = $record[db_category_id];
								$name = $record[db_category_name];
								?>
								<li ><a href="index.php?controller=store&category=<?=$id?>"> 
								<?=$name?>
								</a></li>
							<?php } ?>
						<li><a href="index.php?controller=store&hot_deal=1"> 
						Khuyến Mãi</a></li>
						<li ><a href="index.php?controller=store">Tất cả sản phẩm</a></li>
						
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
</nav>