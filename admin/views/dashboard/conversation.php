<?php

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