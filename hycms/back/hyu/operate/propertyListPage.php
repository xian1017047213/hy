<?php 
use hybase\Controller\PropertyController;

require_once __DIR__."/../../../src/controller/operate/PropertyController.php";
include_once __DIR__.'/../member/loginveri.php';
static $oneGrade='propertymanager';
static $secondGrade='propertylist';
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
<?php include_once __DIR__.'/LeftNav.php';?>
<div class="conright">
<div class="conheader"><span>属性管理</span> </div>
<div class="c-r-c">
<div class="ui-block-content ui-block-content-lb">
<form action="<?php echo $pagebase ?>hyu/operate" method="get" id="propertysearch">
<input id="operProperty" name="operProperty" style="display: none;" value="searchproperty">
<table>
	<tbody>
		<tr>
			<td><label>属性编码</label></td>
			<td><span id="searchkeytext"> <input type="text" id="propertyCode" name="propertyCode" placeholder="文章编码" class="ui-table-default ui-corner-all" value="<?php echo @$_GET['propertyCode'];?>"> </span>
			</td>
			<td><label>属性名称</label></td>
			<td><span id="searchkeytext"><input type="text" id="propertyName" name="propertyName" placeholder="文章名称" class="ui-table-default ui-corner-all" value="<?php echo @$_GET['propertyName'];?>"> </span>
			</td>
			<td><label>状态</label></td>
			<td><span id="searchkeytext"> 
			<select id="propertyStatus" name="propertyStatus" class="ui-table-default ui-corner-all">
				<option value="" <?php echo  (((@$_GET['propertyStatus']) == null) ? 'selected="selected"' : ''); ?>>不限</option>
				<option value="1" <?php echo  (((@$_GET['propertyStatus']) == 1) ? 'selected="selected"' : ''); ?>>启用</option>
				<option value="2" <?php echo  (((@$_GET['propertyStatus']) == 2) ? 'selected="selected"' : ''); ?>>禁用</option>
			</select></span></td>

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
<span class="ui-table-title">属性列表</span>
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
			<div>属性编码<span></span></div>
			</th>
			<th class="col-2" width="5%">
			<div>属性名称<span></span></div>
			</th>
			<th class="col-3" width="5%">
			<div>创建时间<span></span></div>
			</th>
			<th class="col-4" width="5%">
			<div>状态</div>
			</th>
			<th class="col-5" width="10%">
			<div>操作</div>
			</th>
			
		</tr>
	</thead>
	<tbody>
	<?php 
		$propertyController=new PropertyController();
		if (isset($_GET['operProperty'])&&$_GET['operProperty']=='searchproperty') {
			$propertyRows=$propertyController->getPropertyTypeList(null, $_GET['propertyCode'], $_GET['propertyName'], $_GET['propertyStatus']);
		}else {
			$propertyRows=$propertyController->getPropertyTypeList();
		} 
		if (isset($propertyRows)||!empty($propertyRows)) {
			$propertyTable='';
			foreach ($propertyRows as $propertyRow){
				if (isset($propertyRow)) {
					$propertyStatus=$propertyController->propertyStatusToString($propertyRow->getStatus());
					$operPropertyStatus=$propertyController->operPropertyStatusToString($propertyRow->getStatus());
					$operProperty=$propertyController->operPropertyStatus($propertyRow->getStatus());
				}
				$versionTime=$propertyRow->getVersion ()->format('Y-m-d h:m:s');
				$propertyTable =$propertyTable.'<tr class="odd">';
				$propertyTable =$propertyTable.'<td class="col-0 "><input type="checkbox" name="chid" class="checkId" value="'.$propertyRow->getId().'"></td>';
				$propertyTable =$propertyTable.'<td class="col-1 "><span title="'.$propertyRow->getGroupCode().'">'.$propertyRow->getGroupCode().'</span></td>';
				$propertyTable =$propertyTable.'<td class="col-2 "><span title="'.$propertyRow->getName().'">'.$propertyRow->getName().'</span></td>';
				$propertyTable =$propertyTable.'<td class="col-3 ">'.$versionTime.'</td>';
				$propertyTable =$propertyTable.'<td class="col-2 "><span title="'.$propertyRow->getStatus().'">'.$propertyStatus.'</span></td>';
				if ($propertyRow->getEditType()==4) {
					$propertyTable =$propertyTable.'<td class="col-5 ">
								<div class="ui-poplist">
									<div class="current">修改</div>
									<ul style="z-index: 16;">
										<li><a href="'.$pagebase.'hyu/operate/?pageType=propertyedit&propertyId='.$propertyRow->getId().'" idx="0">修改</a></li>
										<li><a href="'.$pagebase.'hyu/operate/?pageType=propertyservice&operProperty=operPropertyStatus&operStatus='.$operProperty.'&propertyId='.$propertyRow->getId().'" idx="0">'.$operPropertyStatus.'</a></li>
									</ul>
									</div>
								</div>
							</td>';
				}
				if ($propertyRow->getEditType()==1||$propertyRow->getEditType()==2||$propertyRow->getEditType()==3) {
					$propertyTable =$propertyTable.'<td class="col-5 ">
								<div class="ui-poplist">
									<div class="current">修改</div>
									<ul style="z-index: 16;">
										<li><a href="'.$pagebase.'hyu/operate/?pageType=propertyedit&propertyId='.$propertyRow->getId().'" idx="0">修改</a></li>
										<li><a href="'.$pagebase.'hyu/operate/?pageType=propertyservice&operProperty=operPropertyStatus&operStatus='.$operProperty.'&propertyId='.$propertyRow->getId().'" idx="0">'.$operPropertyStatus.'</a></li>
										<li><a href="'.$pagebase.'hyu/operate/?pageType=propertyvalue&operProperty=editpropertyvalue&propertyId='.$propertyRow->getId().'" idx="0">添加属性值</a></li>
									</ul>
									</div>
								</div>
							</td>';
				}
				
				$propertyTable=$propertyTable.'</tr>';
			}
		}else{
			$propertyTable='<tr class="odd"> <td colspan="14">暂无商品信息</td></tr>';
		}
		echo $propertyTable;
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