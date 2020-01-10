	<div class="itemdiv dialogdiv">
	<div class="user">
		<img alt="<?=$user?>'s Avatar" src="<?=$avatar_url?>" />
	</div>

	<div class="body">
		<div class="time">
			<i class="ace-icon fa fa-clock-o"></i>
			<span class="green"><?=$diff_time?></span>
		</div>

		<div class="name">
			<a href="#"><?=$user?></a>
		<?php
			if($privilege >= privilege::administrator){
		?>
			<span class="label label-info arrowed arrowed-in-right">admin</span>
		<?php 
			} 
		?>
		</div>
		<div class="text"><?=$bodymsg?></div>

		<div class="tools">
			<a href="#" class="btn btn-minier btn-info">
				<i class="icon-only ace-icon fa fa-share"></i>
			</a>
		</div>
	</div>
	</div>