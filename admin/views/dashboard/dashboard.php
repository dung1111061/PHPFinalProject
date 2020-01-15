
<!-- PAGE CONTENT BEGINS -->
<div class="page-header">
	<h1>
		Dashboard

	</h1>
</div><!-- /.page-header -->
<h3 class="header smaller lighter blue"> Statistics</h3>
<div class="row">
	<div class="space-6"></div>

	<div class="col-sm-7 infobox-container">
		<?= @$statistical_info ?>
	</div>

	<div class="vspace-12-sm"></div>

	<div class="col-sm-5">

		<div class="widget-box">
			<div class="widget-header widget-header-flat widget-header-small">
				<h5 class="widget-title">
					<i class="ace-icon fa fa-signal"></i>
					Sale
				</h5>

				<div class="widget-toolbar no-border">
					<div class="inline dropdown-hover">
						<button class="btn btn-minier btn-primary">
							This Week
							<i class="ace-icon fa fa-angle-down icon-on-right bigger-110"></i>
						</button>

						<ul class="dropdown-menu dropdown-menu-right dropdown-125 dropdown-lighter dropdown-close dropdown-caret">
							<li class="active">
								<a href="#" class="blue">
									<i class="ace-icon fa fa-caret-right bigger-110">&nbsp;</i>
									This Week
								</a>
							</li>

							<li>
								<a href="#">
									<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
									Last Week
								</a>
							</li>

							<li>
								<a href="#">
									<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
									This Month
								</a>
							</li>

							<li>
								<a href="#">
									<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
									Last Month
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<div id="piechart-placeholder"></div>

					<div class="hr hr8 hr-double"></div>

					<div class="clearfix">
						<div class="grid3">
							<span class="grey">
								<i class="ace-icon fa fa-facebook-square fa-2x blue"></i>
								&nbsp; likes
							</span>
							<h4 class="bigger pull-right">1,255</h4>
						</div>

						<div class="grid3">
							<span class="grey">
								<i class="ace-icon fa fa-twitter-square fa-2x purple"></i>
								&nbsp; tweets
							</span>
							<h4 class="bigger pull-right">941</h4>
						</div>

						<div class="grid3">
							<span class="grey">
								<i class="ace-icon fa fa-pinterest-square fa-2x red"></i>
								&nbsp; pins
							</span>
							<h4 class="bigger pull-right">1,050</h4>
						</div>
					</div>
				</div><!-- /.widget-main -->
			</div><!-- /.widget-body -->
		</div><!-- /.widget-box -->
	</div><!-- /.col -->
</div><!-- /.row -->

<div class="hr hr32 hr-dotted"></div>
	
<div class="row"> 
	<div class="col-sm-6"> 
		
		<h3 class="header smaller lighter blue"> Lastest Orders</h3>

		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>

		<!-- div.table-responsive -->

		<!-- div.dataTables_borderWrap -->
		<div>
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="center">
							<label class="pos-rel">
								<input type="checkbox" class="ace" />
								<span class="lbl"></span>
							</label>
						</th>
						<th>Image</th>
						<th>Product Name</th>
						<th>Price </th>
						<th class="hidden-480">Model</th>

						<th>
							<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
							Update
						</th>
						<th class="hidden-480">Quantity</th>

						<th> Actions</th>
					</tr>
				</thead>

				<tbody>

				</tbody>
			</table>
		</div>
	
	</div>
	<div class="col-sm-6">

		<div class="widget-box transparent">
			<div class="widget-header widget-header-flat">
				<h4 class="widget-title lighter">
					<i class="ace-icon fa fa-signal"></i>
					Sale Stats
				</h4>

				<div class="widget-toolbar">
					<a href="#" data-action="collapse">
						<i class="ace-icon fa fa-chevron-up"></i>
					</a>
				</div>
			</div>

			<div class="widget-body">
				<div class="widget-main padding-4">
					<div id="sales-charts"></div>
				</div><!-- /.widget-main -->
			</div><!-- /.widget-body -->
		</div><!-- /.widget-box -->
	
	</div>
</div>
<div class="hr hr32 hr-dotted">
	
</div>

<div class="row">
	<div class="col-sm-6">
		<div class="widget-box transparent" id="recent-box">
			<div class="widget-header">
				<h4 class="widget-title lighter smaller">
					<i class="ace-icon fa fa-rss orange"></i> MANAGERS
				</h4>

				<div class="widget-toolbar no-border">
					<ul class="nav nav-tabs" id="recent-tab">
						<li class="active">
							<a data-toggle="tab" href="#task-tab">Tasks</a>
						</li>

						<li>
							<a data-toggle="tab" href="#member-tab">Members</a>
						</li>

						<li>
							<a data-toggle="tab" href="#comment-tab">Reviews</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="widget-body">
				<div class="widget-main padding-4">
					<div class="tab-content padding-8">

						<div id="task-tab" class="tab-pane active">
							<?= @$tasks ?>
						</div>

						<div id="member-tab" class="tab-pane">
							<?= @$members ?>
						</div><!-- /.#member-tab -->

						<div id="comment-tab" class="tab-pane">
							<?= @$reviews ?>
						</div>
					</div>
				</div><!-- /.widget-main -->
			</div><!-- /.widget-body -->
		</div><!-- /.widget-box -->
	</div><!-- /.col -->

	<div class="col-sm-6">
		<div class="widget-box">
			<div class="widget-header">
				<h4 class="widget-title lighter smaller">
					<i class="ace-icon fa fa-comment blue"></i>
					Conversation
				</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main no-padding">
					<div class="dialogs">
					<div class="itemdiv dialogdiv" style="display:none"> pseudo element </div>	<!-- pseudo element to  adding new comment ajax function work for case empty comment before-->
					<?php
					foreach ($conversations as $key => $value) {
						$privilege = $value[db_admin_privilege];
						$user = $value[db_admin_realname];
						$bodymsg = $value[db_conversation_bodymsg];
						// $avatar_url = AVATAR_IMAGE_PATH."/".$value["avatar"];
						$avatar_url = $value[db_admin_avatar] ? AVATAR_IMAGE_PATH.$value[db_admin_avatar] 			: AVATAR_IMAGE_PATH."default.png";
															
						$diff_time = difference_time($value[db_conversation_time]);

					?>
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
					<?php } ?>
					</div>

					<form id="sendmsg_form" >
						<div class="form-actions">
							<div class="input-group">
								<input id="chat-field" placeholder="Type your message here ..." type="text" class="form-control message" />
								<span class="input-group-btn">
									<button class="btn btn-sm btn-info no-radius" type="button" onclick="sendmsg()">
										<i class="ace-icon fa fa-share"></i>
										Send
									</button>
								</span>
							</div>
						</div>
					</form>

				</div><!-- /.widget-main -->
			</div><!-- /.widget-body -->
		</div><!-- /.widget-box -->
	</div><!-- /.col -->
</div><!-- /.row -->

<!-- PAGE CONTENT ENDS -->
