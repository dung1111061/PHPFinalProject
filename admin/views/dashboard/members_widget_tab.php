<?php
foreach ($users as $key => $value) {
$name = $value[db_admin_realname];
$avatar_url = $value[db_admin_avatar] ? AVATAR_IMAGE_URL.$value[db_admin_avatar] : AVATAR_IMAGE_URL."default.png";
$active_time_before = "1 hour ago";
$status = "online";
?>
<div class="itemdiv memberdiv">
		<div class="user">
			<img alt="<?=$name?>'s avatar" src="<?=$avatar_url?>" />
		</div>

		<div class="body">
			<div class="name">
				<a href="#"><?=$name?></a>
			</div>

			<div class="time">
				<i class="ace-icon fa fa-clock-o"></i>
				<span class="green"><?=$active_time_before?></span>
			</div>

			<div>
				<span class="label label-warning label-sm"><?=$status?></span>

				<div class="inline position-relative">
					<button class="btn btn-minier btn-yellow btn-no-border dropdown-toggle" data-toggle="dropdown" data-position="auto">
						<i class="ace-icon fa fa-angle-down icon-only bigger-120"></i>
					</button>

					<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
						<li>
							<a href="#" class="tooltip-success" data-rel="tooltip" title="Approve">
								<span class="green">
									<i class="ace-icon fa fa-check bigger-110"></i>
								</span>
							</a>
						</li>

						<li>
							<a href="#" class="tooltip-warning" data-rel="tooltip" title="Reject">
								<span class="orange">
									<i class="ace-icon fa fa-times bigger-110"></i>
								</span>
							</a>
						</li>

						<li>
							<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
								<span class="red">
									<i class="ace-icon fa fa-trash-o bigger-110"></i>
								</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
<?php } ?>