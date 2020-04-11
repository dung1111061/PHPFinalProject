<!-- 
	parameters:
		order details
 -->

<div class="widget-body">
	<div class="widget-main">
		<div id="order-wizard-container">
			<div>
				<ul class="steps" data-active-step="<?= $status ?>">
					<li data-step="1" class="active">
						<span class="step">1</span>
						<span class="title">Đang xử lí</span>
					</li>

					<li data-step="2">
						<span class="step">2</span>
						<span class="title">Giao hàng</span>
					</li>

					<li data-step="3">
						<span class="step">3</span>
						<span class="title">Hoàn thành</span>
					</li>
				</ul>
			</div>

			<hr />

			<div class="step-content pos-rel">
				<div class="step-pane active" data-step="1" >
					
				</div>

				<div class="step-pane" data-step="2">
					<div>
						<div class="alert alert-info">
							<button type="button" class="close" data-dismiss="alert">
								<i class="ace-icon fa fa-times"></i>
							</button>
							Đơn hàng đang được giao
							<br />
						</div>
						<div class="center">
							<img  src="assets/images/gallery/shipper.jpg">	
						</div>
					</div>
				</div>

				<div class="step-pane" data-step="3">
					<div class="center">
						<h3 class="blue lighter">Đơn hàng đã được hoàn thành</h3>
					</div>
				</div>
			</div>
		</div>

		<hr />
		<div class="wizard-actions" id=<?=$id?>>

			<button class="btn btn-danger">
				<i class="ace-icon fa fa-trash"></i>
				Hủy đơn hàng
			</button>

			<button class="btn btn-warning">
				<i class="ace-icon fa fa-pause"></i>
				Tạm hoãn đơn hàng
			</button>

			<button class="btn btn-success btn-next" data-last="Hoàn Thành">
				Chuyển
				<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
			</button>

		</div>
	</div><!-- /.widget-main -->
</div><!-- /.widget-body -->