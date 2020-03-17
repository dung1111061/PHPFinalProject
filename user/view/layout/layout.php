<!DOCTYPE html>
<html lang="en">

<head>
		<?php include LAYOUT_PATH."head.php"; ?>
	</head>
	<body>
		<!-- HEADER -->
		<header>
			<?php include LAYOUT_PATH."header.php"; ?>
		</header>
		<!-- /HEADER -->

		<!-- Menu -->	
			<?php include LAYOUT_PATH."navigation.php"; ?>
		<!-- Menu -->

		<?= $content ?>

		<!-- NEWSLETTER -->
			<?php include LAYOUT_PATH."news-letter.php"; ?>
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
		<footer id="footer">
			<?php include LAYOUT_PATH."footer.php" ; ?>
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


	</body>
</html>