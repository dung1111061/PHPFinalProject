
 <!--  -->
<div class="row">
	<div class="col-xs-8"> 
		<div class="breadcrumbs" id="breadcrumbs" style="background-color: #FFFFFF; border-bottom: none"> 
			<ul class="breadcrumb" style="margin-left: 0px">
				<i class="ace-icon fa fa-home home-icon"></i>
					<li> <a href="index.php">Home</a> </li> 
					<li> <a href="product.php">Sản phẩm</a> </li> 
			</ul><!-- /.breadcrumb -->
		</div>
		
	</div>
		
</div>

<div class="col-sm-10 ">
		<?php 
		include_once "details_product_widget.php";
		?>
		<script type="text/javascript">
			document.getElementById("form_product").setAttribute("action","product.php?action=edit&id=<?=$p_record[db_product_id]?>")
		</script>
</div>
<!--  -->

<div class="col-xs-2" style="text-align: right">
	<div id = "edit-button" class="btn btn-app btn-primary no-radius" data-toggle="tooltip" title="Sửa" onclick="$( '#form_product' ).submit();"> 
		<i class="ace-icon fa fa-pencil-square-o bigger-230"></i>
	</div>
</div>
