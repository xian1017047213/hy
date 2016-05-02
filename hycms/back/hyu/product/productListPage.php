<?php 
use hybase\Controller\ProductController;
use hybase\Tools\SystemParameter;

require_once __DIR__."/../../../src/controller/product/ProductController.php";
include_once __DIR__.'/../member/loginveri.php';
static $oneGrade='productmanager';
static $secondGrade='productmanager';
?>
<!DOCTYPE html>
<html>
<head>	
<?php include_once __DIR__.'/../commons/commonspages.php';?>
<script type="text/javascript">
    $(function () {
        $(".timemaker").datetimepicker({
            showSecond: true,
            timeFormat: 'hh:mm:ss',
            stepHour: 1,
            stepMinute: 1,
            stepSecond: 1
        })
    })
    </script>
</head>
<body>
<?php include_once __DIR__.'/../commons/header.php';?>
<div class="content">
<?php include_once __DIR__.'/productLeftNav.php';?>
<div class="conright">
<div class="conheader"><span>商品管理</span> </div>
<div class="c-r-c">
<div class="ui-block-content ui-block-content-lb">
<form action="<?php echo $pagebase ?>hyu/product/product.php" method="get" id="productSearch">
<input id="searchProduct" name="searchProduct" style="display: none;" value="searchProduct">
<table>
	<tbody>
		<tr>
			<td><label>商品编码</label></td>
			<td><span id="searchkeytext"> <input type="text" id="code" name="productcode" placeholder="商品编码" class="ui-table-default ui-corner-all" value="<?php echo @$_GET['productcode'];?>"> </span>
			</td>
			<td><label>商品名称</label></td>
			<td><span id="searchkeytext"><input type="text" id="title" name="producttitle" placeholder="商品名称" class="ui-table-default ui-corner-all" value="<?php echo @$_GET['producttitle'];?>"> </span>
			</td>
			<td><label>状态</label></td>
			<td><span id="searchkeytext"> 
			<select id="status" name="productstatus" class="ui-table-default ui-corner-all">
				<option value="" <?php echo  (((@$_GET['productstatus']) == null) ? 'selected="selected"' : ''); ?>>不限</option>
				<option value="1" <?php echo  (((@$_GET['productstatus']) == 1) ? 'selected="selected"' : ''); ?>>未上架</option>
				<option value="2" <?php echo  (((@$_GET['productstatus']) == 2) ? 'selected="selected"' : ''); ?>>已上架</option>
				<option value="3" <?php echo  (((@$_GET['productstatus']) == 3) ? 'selected="selected"' : ''); ?>>已下架</option>
			</select></span></td>

		</tr>
		<tr>
			<td><label>商品创建时间</label></td>
			<td><input type="text" id="createStartDate" name="product_ct_start" class="ui-table-default ui-corner-all timemaker" value="<?php echo @$_GET['product_ct_start'];?>"></td>
			<td align="center"><label>——</label></td>
			<td><input type="text" name="product_ct_end" id="createEndDate" class="ui-table-default ui-corner-all timemaker" value="<?php echo @$_GET['product_ct_end'];?>"></td>
			<td><label>商品类型</label></td>
			<td><select name="producttype" class="ui-table-default ui-corner-all">
				<option value="" <?php echo  (((@$_GET['producttype']) == null) ? 'selected="selected"' : ''); ?>>不限</option>
				<option value="1" <?php echo  (((@$_GET['producttype']) == 1) ? 'selected="selected"' : ''); ?>>卖品</option>
				<option value="2" <?php echo  (((@$_GET['producttype']) == 2) ? 'selected="selected"' : ''); ?>>非卖品</option>
			</select></td>
		</tr>
		<tr>

			<td><label>商品上架时间</label></td>
			<td><input type="text" id="listStartDate" name="product_list_start" class="ui-table-default ui-corner-all timemaker" value="<?php echo @$_GET['product_list_start'];?>"></td>
			<td align="center"><label>——</label></td>
			<td><input type="text" name="product_list_end" id="listEndDate" class="ui-table-default ui-corner-all timemaker" value="<?php echo @$_GET['product_list_end'];?>"></td>

		</tr>

	</tbody>
</table>
<div class="button-line">
<button  type="submit" class="btn btn-default ng-binding">搜索</button>
</div>
</form>
</div>
</div>
<div class="ui-block">
<div id="table" class="border-grey ui-table-simple-table">
<span class="ui-table-title">商品列表</span>
<div class="ui-table-nav">
<div class="nav-pager">
<a href="javascript:void(0);" class="home disabled" title="首页"> 首页 </a>
	<a href="javascript:void(0);" class="prev disabled" title="上一页">上一页</a>
	<a href="javascript:void(0);" class="next" title="下一页">下一页</a>
	<a href="javascript:void(0);" class="end" title="尾页"> 尾页 </a>
	<input type="text" class="pagenum" value="1">
	<button type="submit" class="pagego">GO</button>
	<span class="pagenum" title="总页数">35</span>
	<span class="recnum" title="总记录数">522</span>
	</div>
</div>
<table class="table hoverback table-list" cellpadding="0">
	<thead>
		<tr>
			<th class="col-0" width="3%">
			<div><input type="checkbox"></div>
			</th>
			<th class="col-1" width="5%">
			<div>商品编码<span></span></div>
			</th>
			<th class="col-2" width="10%">
			<div>商品名称<span></span></div>
			</th>
			<th class="col-3" width="10%">
			<div>所属行业<span></span></div>
			</th>
			<th class="col-4" width="10%">
			<div>状态</div>
			</th>
			<th class="col-5 sort-desc" width="10%">
			<div>创建时间<span></span></div>
			</th>
			<th class="col-6" width="10%">
			<div>修改时间<span></span></div>
			</th>
			<th class="col-7" width="10%">
			<div>最近上架时间<span></span></div>
			</th>
			<th class="col-8" width="10%">
			<div>定时上架时间<span></span></div>
			</th>
			<th class="col-9" width="10%">
			<div>商品类型<span></span></div>
			</th>
			
			<th class="col-10" width="5%">
			<div>操作</div>
			</th>
		</tr>
	</thead>
	<tbody>
	<?php 
		$productController=new ProductController();
		 if (isset($_GET['searchProduct'])) {
			$productRows=$productController->getAllProductListWithDetailByCondition($_GET['productcode'],$_GET['producttitle'], $_GET['productstatus'], $_GET['product_ct_start'], $_GET['product_ct_end'], $_GET['producttype'], $_GET['product_list_start'], $_GET['product_list_end']);
		}else {
			$productRows=$productController->getAllProductListWithDetail();
		} 
		//$productRows=$productController->getAllProductListWithDetail();
		if (isset($productRows)||!empty($productRows)) {
			$userTable='';
			foreach ($productRows as $productRow){
				if (isset($productRow)) {
					$productType=$productController->productTypeToString($productRow['type']);
					$operProductStatusString=$productController->operProductStatusToString($productRow['status']);
					$operProductStatus=$productController->operProductStatus($productRow['status']);
					$productStatus=$productController->productStatusToString($productRow['status']);
					if (!empty($productRow['modifyTime'])) {
						$modifyTime=$productRow['modifyTime']->format('Y-d-m h:m:s');
					}else {
						$modifyTime=null;
					}
				}
				$userTable =$userTable.'<tr class="odd">';
				$userTable =$userTable.'<td class="col-0 "><input type="checkbox" name="chid" class="checkId" value="'.$productRow['id'].'"></td>';
				$userTable =$userTable.'<td class="col-1 "><span title="'.$productRow['code'].'">'.$productRow['code'].'</span></td>';
				$userTable =$userTable.'<td class="col-2 "><span title="'.$productRow['title'].'">'.$productRow['title'].'</span></td>';
				$userTable =$userTable.'<td class="col-5 ">'.$productRow['industryName'].'</td>';
				$userTable =$userTable.'<td class="col-6 "><span class="ui-pyesno ui-pyesno-wait" title="'.$productStatus.'">'.$productStatus.'</span></td>';
				$userTable =$userTable.'<td class="col-7 "><span title="'.(empty($productRow['createTime'])?'':$productRow['createTime']->format('Y-d-m h:m:s')).'">'.(empty($productRow['createTime'])?'':$productRow['createTime']->format('Y-d-m h:m:s')).'</td>';
				$userTable =$userTable.'<td class="col-8 "><span title="'.(empty($productRow['modifyTime'])?'':$productRow['modifyTime']->format('Y-d-m h:m:s')).'">'.(empty($productRow['modifyTime'])?'':$productRow['modifyTime']->format('Y-d-m h:m:s')).'</span></td>';
				$userTable =$userTable.'<td class="col-9 "><span title="'.(empty($productRow['listTime'])?'':$productRow['listTime']->format('Y-d-m h:m:s')).'">'.(empty($productRow['listTime'])?'':$productRow['listTime']->format('Y-d-m h:m:s')).'</span></td>';
				$userTable =$userTable.'<td class="col-10 "><span title="'.(empty($productRow['activeBeginTime'])?'':$productRow['activeBeginTime']->format('Y-d-m h:m:s')).'">'.(empty($productRow['activeBeginTime'])?'':$productRow['activeBeginTime']->format('Y-d-m h:m:s')).'</span></td>';
				$userTable =$userTable.'<td class="col-11 ">'.$productType.'</td>';
				$userTable =$userTable.'<td class="col-13 ">
								<div class="ui-poplist">
									<div class="current">修改</div>
									<ul style="z-index: 16;">
										<li><a href="'.$pagebase.'hyu/product/?pageType=productdetail&productId='.$productRow['id'].'">修改</a></li>
										<li><a href="'.$pagebase.'hyu/product/?pageType=productService&productId='.$productRow['id'].'&operType='.$operProductStatus.'">'.$operProductStatusString.'</a></li>
										<li><a href="'.$pagebase.'hyu/product/?pageType=productService&productId='.$productRow['id'].'&operType='.SystemParameter::$productStatusdelete.'" idx="0">删除</a></li>
									</ul>
								</div>
							</td>';
				$userTable=$userTable.'</tr>';
			}
		}else{
			$userTable='<tr class="odd"> <td colspan="14">暂无商品信息</td></tr>';
		}
		echo $userTable;
	?>

	</tbody>
</table>
<div class="ui-table-nav">
<div class="nav-pager">
<a href="javascript:void(0);" class="home disabled" title="首页"> 首页 </a>
	<a href="javascript:void(0);" class="prev disabled" title="上一页">上一页</a>
	<a href="javascript:void(0);" class="next" title="下一页">下一页</a>
	<a href="javascript:void(0);" class="end" title="尾页"> 尾页 </a>
	<input type="text" class="pagenum" value="1">
	<button type="submit" class="pagego">GO</button>
	<span class="pagenum" title="总页数">35</span>
	<span class="recnum" title="总记录数">522</span></div>
</div>
</div>
</div>
</div>
</div>
</body>
<script type="text/javascript" src="../../scripts/commons.js"></script>
</html>