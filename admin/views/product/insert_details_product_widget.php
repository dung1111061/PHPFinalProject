
 <!--  -->
<div class="row">
	<div class="col-xs-8"> 
		<div class="breadcrumbs" id="breadcrumbs" style="background-color: #FFFFFF; border-bottom: none"> 
			<ul class="breadcrumb" style="margin-left: 0px">
				<i class="ace-icon fa fa-home home-icon"></i>
					<li> <a href="index.php">Trang chủ</a> </li>
					<li> <a href="product.php">Sản phẩm</a> </li>
			</ul><!-- /.breadcrumb -->
		</div>
	</div>
		
</div>


<div class="row">	
	<div class="col-sm-10 ">
		<?php
			include_once "details_product_widget.php";
		?>
		<script type="text/javascript">
			document.getElementById("form_product").setAttribute("action","product.php?action=insert");
		</script>
	</div>
	<!--  -->

	<div class="col-xs-2" style="text-align: right">
		<button id="save-button" class="btn btn-app btn-grey btn-xs radius-4 " data-toggle="tooltip" 
		title="Save Change" onclick="$( '#form_product' ).submit();">
			<i class="ace-icon fa fa-floppy-o bigger-160"></i>
			Save
		</button>	
	</div>
</div>


