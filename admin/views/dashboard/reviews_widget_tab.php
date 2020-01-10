<div class="comments">
	<div class="itemdiv commentdiv">
		<div class="user">
			<img alt="Bob Doe's Avatar" src=<?=$avatar_url?> />
		</div>

		<div class="body">
			<div class="name">
				<a href="#"><?=$username?></a>
			</div>

			<div class="time">
				<i class="ace-icon fa fa-clock-o"></i>
				<span class="green">$time</span>
			</div>

			<div class="text">
				<i class="ace-icon fa fa-quote-left"></i>
				<?= $text ?>
			</div>
		</div>

		<div class="tools">
			<div class="inline position-relative">
				<button class="btn btn-minier bigger btn-yellow dropdown-toggle" data-toggle="dropdown">
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

	<div class="itemdiv commentdiv">
		<div class="user">
			<img alt="Jennifer's Avatar" src="<?=AVATAR_IMAGE_PATH."default.png"?>" />
		</div>

		<div class="body">
			<div class="name">
				<a href="#">Jennifer</a>
			</div>

			<div class="time">
				<i class="ace-icon fa fa-clock-o"></i>
				<span class="blue">15 min</span>
			</div>

			<div class="text">
				<i class="ace-icon fa fa-quote-left"></i>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo massa sed ipsum porttitor facilisis &hellip;
			</div>
		</div>

		<div class="tools">
			<div class="action-buttons bigger-125">
				<a href="#">
					<i class="ace-icon fa fa-pencil blue"></i>
				</a>

				<a href="#">
					<i class="ace-icon fa fa-trash-o red"></i>
				</a>
			</div>
		</div>
	</div>

	<div class="itemdiv commentdiv">
		<div class="user">
			<img alt="Joe's Avatar" src="<?=AVATAR_IMAGE_PATH."default.png"?>" />
		</div>

		<div class="body">
			<div class="name">
				<a href="#">Joe</a>
			</div>

			<div class="time">
				<i class="ace-icon fa fa-clock-o"></i>
				<span class="orange">22 min</span>
			</div>

			<div class="text">
				<i class="ace-icon fa fa-quote-left"></i>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo massa sed ipsum porttitor facilisis &hellip;
			</div>
		</div>

		<div class="tools">
			<div class="action-buttons bigger-125">
				<a href="#">
					<i class="ace-icon fa fa-pencil blue"></i>
				</a>

				<a href="#">
					<i class="ace-icon fa fa-trash-o red"></i>
				</a>
			</div>
		</div>
	</div>

	<div class="itemdiv commentdiv">
		<div class="user">
			<img alt="Rita's Avatar" src="<?=AVATAR_IMAGE_PATH."default.png"?>" />
		</div>

		<div class="body">
			<div class="name">
				<a href="#">Rita</a>
			</div>

			<div class="time">
				<i class="ace-icon fa fa-clock-o"></i>
				<span class="red">50 min</span>
			</div>

			<div class="text">
				<i class="ace-icon fa fa-quote-left"></i>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo massa sed ipsum porttitor facilisis &hellip;
			</div>
		</div>

		<div class="tools">
			<div class="action-buttons bigger-125">
				<a href="#">
					<i class="ace-icon fa fa-pencil blue"></i>
				</a>

				<a href="#">
					<i class="ace-icon fa fa-trash-o red"></i>
				</a>
			</div>
		</div>
	</div>
</div>

<div class="hr hr8"></div>

<div class="center">
	<i class="ace-icon fa fa-comments-o fa-2x green middle"></i>

	&nbsp;
	<a href="#" class="btn btn-sm btn-white btn-info">
		See all comments &nbsp;
		<i class="ace-icon fa fa-arrow-right"></i>
	</a>
</div>

<div class="hr hr-double hr8"></div>
