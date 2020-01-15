<?php 
include_once "../../config.php";
include_once "../config.php";

?>

		<ul class="breadcrumb" style="margin-left: 0px">
			<i class="ace-icon fa fa-home home-icon"></i>
	<?php
	$page_path_tree = explode("/",$page_path);
	foreach ($page_path_tree as $name) {
		// Style last node is active
		$class_name = "";
		if ($name === $page_path_tree[count($page_path_tree)-1]) { 
			$class_name = "active";
		} 
	?>
				<li class="<?= $class_name ?>">
					<a href="<?=page_link[$name]?>"><?= $name ?></a>	
				</li>
	<?php

	}
	?>
						</ul><!-- /.breadcrumb -->


						
