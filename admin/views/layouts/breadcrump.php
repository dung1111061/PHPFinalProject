<?php
// 2020/03/02 comment as request is boostraped 
// include_once "../../config.php";
// include_once "../config.php";

?>

		<ul class="breadcrumb" style="margin-left: 0px">
			<i class="ace-icon fa fa-home home-icon"></i>
	<?php
	$page_location_hierarchy = explode("/",$this->page_location);
	foreach ($page_location_hierarchy as $name) {
		// Style last node is active
		$class_name = "";
		if ($name === $page_location_hierarchy[count($page_location_hierarchy)-1]) { 
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


						
