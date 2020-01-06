<!DOCTYPE html>
<html lang="en">
	<!-- head element of layout -->
	<?php include_once "head.php" ?>

	<!-- body of layout -->
	<body class="no-skin">

		<!-- nagigation bar on top page -->
		<div id="navbar" class="navbar navbar-default          ace-save-state"> 
			<?php include_once "navigation_bar.php" ?> 
		</div>
		
		<div class="main-container ace-save-state" id="main-container">
			<!--  -->
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>
			<!--  -->
			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
				 <?php include_once "slidebar_shortcut.php" ?> 
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list"> 	
				<?php include_once "navigation_list.php" ?> <!-- /.nav-list -->
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
			<?php include_once "footer.php" ?> 
			
		</div><!-- /.main-container -->
			<?= @$script ?>

	</body>
</html>
