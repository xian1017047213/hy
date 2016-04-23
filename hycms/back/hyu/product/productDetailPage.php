<?php 
use hybase\Controller\ProductController;

require_once __DIR__."/../../../src/controller/product/ProductController.php";
include_once __DIR__.'/../member/loginveri.php';
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
					<input type="radio" checked="checked" name="Sex" value="male" /><span>卖品</span> 
					<input type="radio" name="Sex" value="male" /> <span>非卖品</span>
					</div>
				</div>
				<div class="ui-block-line">
				<div class="ui-block-line-title">
				<label>
					<em style="display: inline;">*<em></em></em> 
					<span style="display: inline;">产品编码</span>
					</label></div>
					<div class="ui-block-line-body">
					<input class="table-input" type="text" name="productcode" value="" id="productcode"/>
					</div>
				</div>
				<div class="ui-block-line">
				<div class="ui-block-line-title">
				<label>
				<em style="display: inline;">*</em> 
				<span style="display: inline;">产品标题</span>
				</label></div>
					<div class="ui-block-line-body">
				<input class="table-input" type="text" name="producttitle" value="" />
				</div>
				</div>
				<div class="ui-block-line">
				<div class="ui-block-line-title">
				<label>
				<em style="display: inline;">*</em> 
				<span style="display: inline;">产品副标题</span>
				</label></div>
					<div class="ui-block-line-body">
				<input class="table-input" type="text" name="productsketch" value="" />
				</div>
				</div>
				</div>
			</div>
			<?php 
			$productController=new ProductController();
			$propertiesResults=$productController->getPropertyWithValue(1);
			$result=$productController->getProductPropertiesDetail(1);
			//echo $result;
			//echo  json_encode($result);
			//echo $propertiesResults[1];
			?>
			<div class="ui-block">
				<span class="title" style="font-weight: bold;">产品属性</span>
				<div class="ui-block-table">
				<?php
				foreach ($propertiesResults as $propertiesResult){
					//echo json_encode($propertiesResult);
					echo '<div class="ui-block-line"><div class="ui-block-line-title">'.$propertiesResult['title'].'</div><div class="ui-block-line-body">'.$propertiesResult['body'].'</div></div>';
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
				<script id="sketch" name="sketch" type="text/plain"></script>
				</div>
				
				<div class="ui-block-line">
				<label>
				<span>商品描述</span>
				</label>
				<script id="description" name="description" type="text/plain"></script>
				</div>
				</div>
			</div>
			<!-- 加载编辑器的容器 -->
			<script id="container" name="content" type="text/plain"></script>
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
<script type="text/javascript" src="../../scripts/commons.js"></script>
</html>