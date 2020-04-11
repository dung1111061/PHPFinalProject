<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Cửa hàng đồ điện tử trực tuyến</title>
		<meta name="description" content="Cửa hàng chuyên cung cấp các sản phẩm công nghệ, phục vụ người dùng trên nền tảng internet. Ứng dụng của chúng tôi đủ mạnh, sẵn sàng đáp ứng nhu cầu khách hàng ở mọi nơi mọi lúc" />
		<meta name="”keywords”" content="laptop,smartphone,camera,hitech" />
		<meta http-equiv="content-language" content="vi" />
		<meta name="author" content="Dũng">
		<meta name="revisit-after" content="1 days" />

 		<!-- Google font -->
 		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

 		<!-- Bootstrap -->
 		<link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css"/>

 		<!-- Slick -->
 		<link type="text/css" rel="stylesheet" href="assets/css/slick.css"/>
 		<link type="text/css" rel="stylesheet" href="assets/css/slick-theme.css"/>

 		<!-- nouislider -->
 		<link type="text/css" rel="stylesheet" href="assets/css/nouislider.min.css"/>

 		<!-- Font Awesome Icon -->
 		<link rel="stylesheet" href="assets/css/font-awesome.min.css">

 		<!-- Custom stlylesheet -->
 		<link type="text/css" rel="stylesheet" href="assets/css/style.css?n=5"/>

 		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
 		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
 		<!--[if lt IE 9]>
 		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
 		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 		<![endif]-->
	</head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#about-us"><i class="fa fa-phone"></i> 0362687355 </a></li>
						<li><a href="#about-us"><i class="fa fa-envelope-o"></i> dung1111061@gmail.com </a></li>
						<li><a href="#about-us"><i class="fa fa-map-marker"></i> 11/8/28 Nguyễn Văn Quá, P ĐHT, Q12 </a> </li>
					</ul>
					<ul class="header-links pull-right">
						<li>
								<div>
<?php 
$welcomeMessage = "Bạn chưa đăng nhập";
if ( isset($_SESSION['customer']['name']) ){
	$welcomeMessage = "Xin chào, ";
	$welcomeMessage .= $_SESSION['customer']['name'] ? $_SESSION['customer']['name'] : "Ẩn danh";
}

$data = [
	"loginFlag" => isset($_SESSION['customer'])? true : false,
	"welcomeMessage" => $welcomeMessage 
];
$accountTemplate = new Template("module/account", $data );
$accountTemplate->render();
?>
								</div>
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
						<div class="col-md-2">
							<div class="header-logo">
								<a href="index.php" class="logo">
									<img src="assets/img/LOGO.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->
						
						<!-- SEARCH BAR -->
						<div class="col-md-5 ">
							<div class="header-search ">
								<form action="index.php" method="GET">
									<input id="searching-field" class="input" placeholder="Nhập tên sản phẩm" name="searching" value="<?=$keyword?>">
									<button class="search-btn">Tìm </button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-5 clearfix">
							<div class="header-ctn">

								<!-- Wishlist -->
								
								<?php require_once LAYOUT_PATH.'wishlist.php'; ?>
								<!-- /Wishlist -->

								<!-- Cart -->
								<?php require_once LAYOUT_PATH.'cart.php'; ?>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Danh mục</span>
									</a>
								</div>
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
		</header>
		<!-- /HEADER -->

		<!-- Menu -->	
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
		<!-- Menu -->

		<?= $content ?>

		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Đăng Kí Nhận <strong>Tin Hot</strong></p>
							<form>
								<input class="input" type="email" placeholder="Địa Chỉ Email Của Bạn">
								<button type="button" class="newsletter-btn"><i class="fa fa-envelope"></i> Đăng Kí</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="index.php?controller=new_controller"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="index.php?controller=new_controller"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="index.php?controller=new_controller"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="index.php?controller=new_controller"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
		<footer id="footer">

			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 id="about-us"class="footer-title">Về chúng tôi</h3>
								<ul class="footer-links">
						<li><a href="index.php?controller=new_controller&action=contactPage"><i class="fa fa-phone"></i> 0362687355 </a></li>
						<li><a href="index.php?controller=new_controller&action=contactPage"><i class="fa fa-envelope-o"></i> dung1111061@gmail.com </a></li>

								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Trang chủ</h3>
								<ul class="footer-links">
									<li><a href="index.php?controller=new_controller">Danh mục sản phẩm</a></li>
									<li><a href="index.php?controller=new_controller">Bán chạy</a></li>
									<li><a href="index.php?controller=new_controller">Khuyến mãi</a></li>
									<li><a href="index.php?controller=new_controller">Sản phẩm mới</a></li>
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Chính sách mua hàng và bảo hành</h3>
								<ul class="footer-links">
									<li><a href="index.php?controller=new_controller">Quy định chung</a></li>
									<li><a href="index.php?controller=new_controller">Chính sách bảo mật thông tin</a></li>
									<li><a href="index.php?controller=new_controller">Chính sách vận chuyển, giao nhận</a></li>
									<li><a href="index.php?controller=new_controller">Chính sách bảo hành</a></li>
									<li><a href="index.php?controller=new_controller">Chính sách đổi trả và hoàn tiền/a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Hỗ trợ khách hàng</h3>
								<ul class="footer-links">
									<li><a href="index.php?controller=new_controller">Hướng dẫn mua hàng trực tuyến</a></li>
									<li><a href="index.php?controller=new_controller">Hướng dẫn thanh toán</a></li>
									<li><a href="index.php?controller=new_controller">Hướng dẫn mua hàng trả góp</a></li>
									<li><a href="index.php?controller=new_controller">Gửi yêu cầu hỗ trợ</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="index.php?controller=new_controller"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="index.php?controller=new_controller"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="index.php?controller=new_controller"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="index.php?controller=new_controller"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="index.php?controller=new_controller"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="index.php?controller=new_controller"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								&copy;<script>document.write(new Date().getFullYear());</script> Bản quyền thuộc về cá nhân | sử dụng lại mẫu thiết kế bởi <i class="fa fa-heart-o" aria-hidden="true"></i> <a href="https://colorlib.com" target="_blank">Colorlib</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/slick.min.js"></script>
		<script src="assets/js/nouislider.min.js"></script>
		<script src="assets/js/wnumb-1.2.0/wNumb.min.js"></script>
		<script src="assets/js/jquery.zoom.min.js"></script>
		<script src="assets/js/main.js?n=1"></script>  
		<!-- Add query string may be help to clear caching browser  -->
		<!-- Should move to inline-page script  -->
		<?= $script ?>


		<?php include LAYOUT_PATH."layout.js"; ?>
		
	</body>
</html>