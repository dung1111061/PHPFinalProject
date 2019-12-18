<?php include_once "config.php" ?>

		<ul class="breadcrumb">
			<i class="ace-icon fa fa-home home-icon"></i>
<?php
	$page_path_tree = explode("/",$page_path);
	foreach ($page_path_tree as $node) {
?>
<?php		if ($node === $page_path_tree[count($page_path_tree)-1]) { ?>
				<li class="active">
					<a href="<?=page_array[$node]?>"><?= $node ?></a>	
				</li>
<?php		} else { ?>
				<li>
					<a href="<?=page_array[$node]?>"><?= $node ?></a>
				</li>
<?php      } ?>
		<?php
		}
		?>
						</ul><!-- /.breadcrumb -->


						
