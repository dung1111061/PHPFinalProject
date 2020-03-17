			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> 0362687355 </a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> dung1111061@gmail.com </a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> 11/8/28 Nguyễn Văn Quá, P ĐHT, Q12 </a> </li>
					</ul>
					<ul class="header-links pull-right">
						<li>
							<!-- account partion is move to MAIN HEADER -->
						</li>
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-1">
							<div class="header-logo">
								<a href="#" class="logo">
									<img src="./img/LOGO2.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->
						
						<!-- SEARCH BAR -->
						<div class="col-md-6 ">
							<div class="header-search ">
								<form action="index.php" method="GET">
									<input id="searching-field" class="input" placeholder="Nhập tên sản phẩm, từ khóa cần tìm kiếm" name="searching" value="<?=$keyword?>">
									<button class="search-btn">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-5 clearfix">
							<div class="header-ctn">
								<div>
									<?php require_once LAYOUT_PATH.'account.php'; ?>
								</div>
								<!-- Wishlist -->
								<div>
									<a href="#">
										<i class="fa fa-heart-o"></i>
										<span>Yêu Thích</span>
										<div class="qty">2</div>
									</a>
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Giỏ Hàng</span>
										<div class="qty">3</div>
									</a>
									<div class="cart-dropdown">
										<?php require_once LAYOUT_PATH.'cart.php'; ?>
									</div>
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->