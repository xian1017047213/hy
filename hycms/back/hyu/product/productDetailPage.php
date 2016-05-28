<?php 
use hybase\Controller\ProductController;
use hybase\Tools\SystemParameter;

require_once __DIR__.'/../../../src/controller/product/ProductController.php';
require_once __DIR__.'/../../../src/manager/tools/SystemParameter.php';
include_once __DIR__.'/../user/loginveri.php';
static $oneGrade='productmanager';
static $secondGrade='productDetail';
?>
<!DOCTYPE html>
<html>
<head>
<?php include_once __DIR__.'/../commons/commonspages.php';?>
</head>
<body>
<?php include_once __DIR__.'/../commons/header.php';?>
<div class="content">
<?php include_once __DIR__.'/productLeftNav.php';?>
<?php

$productController = new ProductController ();
if (isset ( $_GET ['productId'] )) {
	$propertiesResults = $productController->getPropertyWithValue ( $_GET ['productId'] );
	$product=$productController->getProductById($_GET ['productId'] );
	$productDetail=$productController->getProductDetailByProductId($_GET ['productId'] );
} else {
	$propertiesResults = $productController->getPropertyWithValue ();
}
?>
<div class="conright">
			<div class="ui-block">
				<span class="title" style="font-weight: bold;">产品基本信息</span>
				<div class="ui-block-table">
				<div class="ui-block-line">
				<div class="ui-block-line-title">
				<label>
					<em style="display: inline;">*</em> 
					<span style="display: inline;">产品类型</span>
					</label></div>
					<div class="ui-block-line-body">
					<input type="radio" <?php echo (!empty($product)&&$product->getType()==SystemParameter::$productTypeSale)? 'checked="checked"':'' ;?> name="productType" value="<?php echo SystemParameter::$productTypeSale;?>" /><span>卖品</span> 
					<input type="radio" <?php echo (!empty($product)&&$product->getType()==SystemParameter::$productTypeUnSale)? 'checked="checked"':'' ;?> name="productType" value="<?php echo SystemParameter::$productTypeUnSale;?>" /> <span>非卖品</span>
					</div>
				</div>
				<div class="ui-block-line">
				<div class="ui-block-line-title">
				<label>
					<em style="display: inline;">*<em></em></em> 
					<span style="display: inline;">产品编码</span>
					</label></div>
					<div class="ui-block-line-body">
					<input class="table-input" type="text" name="productCode" value="<?php echo empty($product)? '':$product->getCode();?>" id="productCode"/>
					</div>
				</div>
				<div class="ui-block-line">
				<div class="ui-block-line-title">
				<label>
				<em style="display: inline;">*</em> 
				<span style="display: inline;">产品标题</span>
				</label></div>
					<div class="ui-block-line-body">
				<input class="table-input" type="text"  name="productTitle" id="productTitle" value="<?php echo empty($productDetail)? '':$productDetail->getTitle();?>" />
				</div>
				</div>
				<div class="ui-block-line">
				<div class="ui-block-line-title">
				<label>
				<em style="display: inline;">*</em> 
				<span style="display: inline;">产品副标题</span>
				</label></div>
					<div class="ui-block-line-body">
				<input class="table-input" type="text" name="productSubTitle" id="productSubTitle" value="<?php echo empty($productDetail)? '':$productDetail->getSubTitle();?>" />
				</div>
				</div>
				</div>
			</div>
			
			<div class="ui-block">
				<span class="title" style="font-weight: bold;">产品属性</span>
				<div class="ui-block-table">
				<?php
				//echo json_encode($propertiesResults);
				foreach ($propertiesResults as $propertiesResult){
					echo '<div class="ui-block-line"><div class="ui-block-line-title">'.$propertiesResult['title'].'</div><div class="ui-block-line-body">'.(empty($propertiesResult['body'])?'':$propertiesResult['body']).'</div></div>';
				}
				?>
				</div>

			</div>
			<div class="ui-block">
				<span class="title" style="font-weight: bold;">商品描述</span>
				<div class="ui-block-table">
				<div class="ui-block-line">
				<label>
				<span>商品简述</span>
				</label>
				<script id="sketch" name="sketch" type="text/plain"><?php echo empty($productDetail)? '':$productDetail->getSketch();?></script>
				</div>
				
				<div class="ui-block-line">
				<label>
				<span>商品描述</span>
				</label>
				<script id="description" name="description" type="text/plain"><?php echo empty($productDetail)? '':$productDetail->getDescription();?></script>
				</div>
				</div>
			</div>
			<div>
			<input class="productDesc" id="productDesc" name="productDesc" value="" style="display: none;">
			<input class="productSketch" id="productSketch" name="productSketch" value="" style="display: none;">
			<input class="pageType" id="pageType" name="pageType" value="productService" style="display: none;">
			<input class="operType" id="operType" name="operType" value="<?php echo empty($product)? 'newproduct':'updateproduct';?>" style="display: none;">
			<input class="productId" id="productId" name="productId" value="<?php echo empty($product)? '':$product->getId();?>" style="display: none;">
			<button id="productSave" name="productSave" type="button" class="u-f-t-i-t-b" value="" style="margin-top: 10px;">保存</button>
			<div><span class="resultMessage"></span></div>
			</div>
			
			<!-- 配置文件 -->
			<script type="text/javascript" src="../../ueditor/ueditor.config.js"></script>
			<!-- 编辑器源码文件 -->
			<script type="text/javascript" src="../../ueditor/ueditor.all.js"></script>
			<!-- 实例化编辑器 -->
			<script type="text/javascript">
			var uesketch = UE.getEditor('sketch',{
				initialFrameWidth:1000
				});	
			var ue = UE.getEditor('description',{
				initialFrameWidth:1000
			});
			</script>
		</div>

	</div>

</body>
<script type="text/javascript" src="<?php echo $staticbase?>scripts/commons.js"></script>
</html>