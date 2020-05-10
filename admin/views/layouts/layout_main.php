<!DOCTYPE html>
<html lang="en">
	<!-- head element of layout -->
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-158847756-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-158847756-1');
</script>

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Trang quản trị</title>

		<meta name="description" content="Dành cho người điều hành ứng dụng cửa hàng điện tử, cung cấp giải pháp quản lí sản phẩm, các nhà cung cấp, khách hàng và các đơn hàng." />
		<meta name="viewport" content="width=device-width, 
		initial-scale=1.0, maximum-scale=1.0" />
		<meta name="keywords" content="admin" />
		<meta http-equiv="content-language" content="vi" />
		<meta name="author" content="Dũng">
		<meta name="revisit-after" content="1 days" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="views/assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="views/assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="views/assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="views/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="views/assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="views/assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="views/assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="views/assets/css/chosen.min.css" />
		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="views/assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->


		<!-- ace settings handler -->
		<script src="views/assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="views/assets/js/html5shiv.min.js"></script>
		<script src="views/assets/js/respond.min.js"></script>
		<![endif]-->
		
		<!-- Customize font-style for vietnamese -->
		<style>
			body{
				font-family: sans-serif;
			}
			h1,h2,h3,h4,h5,h6{
				font-family: sans-serif;
			}
		</style>
		<!-- user defined decoration -->
		<?= @$css ?>
	</head>

	<!-- body of layout -->
	<body class="no-skin">

		<!-- nagigation bar on top page -->
		<div id="navbar" class="navbar navbar-default          ace-save-state"> 

			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="trang-chu.html" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							Quản lí
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">


						<li class="purple dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-bell icon-animated-bell"></i>
								<span class="badge badge-important">8</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-exclamation-triangle"></i>
									8 Thông báo mới
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar navbar-pink">
										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
														Bài đánh giá mới
													</span>
													<span class="pull-right badge badge-info">+12</span>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<i class="btn btn-xs btn-primary fa fa-user"></i>
												Bob đã đăng nhập với vai trò người quản lí
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-success fa fa-shopping-cart"></i>
														Đơn hàng mới
													</span>
													<span class="pull-right badge badge-success">+8</span>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-info fa fa-twitter"></i>
														Người theo dõi mới
													</span>
													<span class="pull-right badge badge-info">+11</span>
												</div>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="#">
										Thấy tất cả thông báo
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?=$avatar?>" />
								<span class="user-info">
									<small>Chào,</small>
									<?=$name?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

								<li>
									<a href="#">
										<i class="ace-icon fa fa-user"></i>
										Tài khoản
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="index.php?action=logout">
										<i class="ace-icon fa fa-power-off"></i>
										Thoát
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		
		</div>
		
		<div class="main-container ace-save-state" id="main-container">

			<!--  -->
			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">


				<div class="sidebar-shortcuts" id="sidebar-shortcuts">

<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
	<!-- logo instead icon -->
	<button class="btn btn-success">
		<i class="ace-icon fa fa-signal"></i>
	</button>

	<button class="btn btn-info">
		<i class="ace-icon fa fa-pencil"></i>
	</button>

	<button class="btn btn-warning">
		<i class="ace-icon fa fa-users"></i>
	</button>

	<button class="btn btn-danger">
		<i class="ace-icon fa fa-cogs"></i>
	</button>
</div>

<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
	<span class="btn btn-success"></span>

	<span class="btn btn-info"></span>

	<span class="btn btn-warning"></span>

	<span class="btn btn-danger"></span>
</div>

				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list"> 	
					<li class="">
						<a href="trang-chu.html">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Trang chủ </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> Sản phẩm </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="san-pham.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Kho sản phẩm
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="nha-san-xuat.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Nhà sản xuất
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="category.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Loại sản phẩm
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="review.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Bài đánh giá
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a id="quanlitintuc" href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> Tin tức </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>
						<!-- <script type="text/javascript">
							document.getElementById('quanlitintuc').addEventListener('click',function(event){
								alert(' Tính năng quản lí tin tức chưa hoàn thiện');
								event.preventDefault();
							});
							
						</script> -->
						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="new.php?action=editor">
									<i class="menu-icon fa fa-caret-right"></i>
									Soạn tin mới
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="new.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Danh sách tin tức 
								</a>

								<b class="arrow"></b>
							</li>

						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> Khách hàng </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="customer.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Danh sách
								</a>

								<b class="arrow"></b>
							</li>

						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> Đơn hàng </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="don-hang-moi.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Đơn hàng mới
								</a>
								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="don-hang-da-hoan-thanh.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Đơn hàng đã hoàn thành
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					
				
				</ul>	

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="main-content-inner">

					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<?= @$content ?>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<!-- footer of layout -->
			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Bản quyền thuộc về cá nhân</span>
							 &copy; 2019-2020 <span class="small"> tham khảo mẫu thiết kế </span>
							 của <a href="http://ace.jeka.by/" target="_blank">ACE</a>
						</span>
						<span> 
						
					</div>
				</div>
			</div>
			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
			
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="views/assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
		<script src="views/assets/js/jquery-1.11.3.min.js"></script>
		<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="views/assets/js/bootstrap.min.js"></script>

		<!-- ace scripts -->
		<script src="views/assets/js/ace-elements.min.js"></script>
		<script src="views/assets/js/ace.min.js"></script>
		
		<script>
			// Tooltip: Show summary text box
			$(document).ready(function(){
			  $('[data-toggle="tooltip"]').tooltip();   
			});
		</script>
		<!-- user defined script -->
		<!-- page specific plugin scripts  -->
			<?= @$script ?>


	</body>
</html>
