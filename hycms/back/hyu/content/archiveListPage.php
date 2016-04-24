<?php 
use hybase\Controller\ArchiveController;

require_once __DIR__."/../../../src/controller/archive/ArchiveController.php";
include_once __DIR__.'/../member/loginveri.php';
static $oneGrade='contentmanager';
static $secondGrade='contentlist';
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
<?php include_once __DIR__.'/archiveLeftNav.php';?>
<div class="conright">
<div class="conheader"><span>商品管理</span> </div>
<div class="c-r-c">
<div class="ui-block-content ui-block-content-lb">
<form action="<?php echo $pagebase ?>hyu/content" method="get" id="productSearch">
<input id="operArchive" name="operArchive" style="display: none;" value="searcharchive">
<table>
	<tbody>
		<tr>
			<td><label>文章编码</label></td>
			<td><span id="searchkeytext"> <input type="text" id="archiveCode" name="archiveCode" placeholder="文章编码" class="ui-table-default ui-corner-all" value="<?php echo @$_GET['archiveCode'];?>"> </span>
			</td>
			<td><label>文章名称</label></td>
			<td><span id="searchkeytext"><input type="text" id="archiveTitle" name="archiveTitle" placeholder="文章名称" class="ui-table-default ui-corner-all" value="<?php echo @$_GET['archiveTitle'];?>"> </span>
			</td>
			<td><label>状态</label></td>
			<td><span id="searchkeytext"> 
			<select id="archiveStatus" name="archiveStatus" class="ui-table-default ui-corner-all">
				<option value="" <?php echo  (((@$_GET['archiveStatus']) == null) ? 'selected="selected"' : ''); ?>>不限</option>
				<option value="1" <?php echo  (((@$_GET['archiveStatus']) == 1) ? 'selected="selected"' : ''); ?>>未发布</option>
				<option value="2" <?php echo  (((@$_GET['archiveStatus']) == 2) ? 'selected="selected"' : ''); ?>>已发布</option>
			</select></span></td>

		</tr>
		<tr>
			<td><label>商品创建时间</label></td>
			<td><input type="text" id="archiveStartDate" name="archiveStartDate" class="ui-table-default ui-corner-all timemaker" value="<?php echo @$_GET['archiveStartDate'];?>"></td>
			<td align="center"><label>——</label></td>
			<td><input type="text" name="archiveEndDate" id="archiveEndDate" class="ui-table-default ui-corner-all timemaker" value="<?php echo @$_GET['archiveEndDate'];?>"></td>
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
			<div>文章编码<span></span></div>
			</th>
			<th class="col-2" width="5%">
			<div>文章标题<span></span></div>
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
		$archiveController=new ArchiveController();
		if (isset($_GET['operArchive'])&&$_GET['operArchive']=='searcharchive') {
			$archiveRows=$archiveController->getArchiveList(null,$_GET['archiveCode'],$_GET['archiveTitle'], $_GET['archiveStatus'], $_GET['archiveStartDate'], $_GET['archiveEndDate']);
		}else {
			$archiveRows=$archiveController->getArchiveList();
		} 
		//$archiveRows=$archiveController->getArchiveList();
		if (isset($archiveRows)||!empty($archiveRows)) {
			$archiveTable='';
			foreach ($archiveRows as $archiveRow){
				if (isset($archiveRow)) {
					$archiveStatus=$archiveController->archiveStatusToString($archiveRow->getStatus());
				}
				$versionTime=$archiveRow->getVersion ()->format('Y-d-m h:m:s');
				$archiveTable =$archiveTable.'<tr class="odd">';
				$archiveTable =$archiveTable.'<td class="col-0 "><input type="checkbox" name="chid" class="checkId" value="'.$archiveRow->getId().'"></td>';
				$archiveTable =$archiveTable.'<td class="col-1 "><span title="'.$archiveRow->getCode().'">'.$archiveRow->getCode().'</span></td>';
				$archiveTable =$archiveTable.'<td class="col-2 "><span title="'.$archiveRow->getTitle().'">'.$archiveRow->getTitle().'</span></td>';
				$archiveTable =$archiveTable.'<td class="col-3 ">'.$versionTime.'</td>';
				$archiveTable =$archiveTable.'<td class="col-2 "><span title="'.$archiveRow->getStatus().'">'.$archiveStatus.'</span></td>';
				if ($archiveRow->getStatus()==1) {
					$archiveTable =$archiveTable.'<td class="col-5 ">
								<div class="ui-poplist-inline">
									<ul style="z-index: 16;">
										<li><a href="'.$pagebase.'hyu/content/?pageType=archiveservice&operArchive=publish&archiveId='.$archiveRow->getId().'">发布</a></li>
										<li><a href="'.$pagebase.'hyu/content/?pageType=archiveservice&operArchive=delete&archiveId='.$archiveRow->getId().'" idx="0">删除</a></li>
										<li><a href="'.$pagebase.'hyu/content/?pageType=archiveedit&operArchive=update&archiveId='.$archiveRow->getId().'" idx="0">修改</a></li>
									</ul>
								</div>
							</td>';
				}
				if ($archiveRow->getStatus()==2) {
					$archiveTable =$archiveTable.'<td class="col-5 ">
								<div class="ui-poplist-inline">
									<ul style="z-index: 16;">
										<li><a href="'.$pagebase.'hyu/content/?pageType=archiveservice&operArchive=republish&archiveId='.$archiveRow->getId().'">再次发布</a></li>
										<li><a href="'.$pagebase.'hyu/content/?pageType=archiveservice&operArchive=cancelpublish&archiveId='.$archiveRow->getId().'" jsfunc="fnEnabledItem" idx="0">取消发布</a></li>
										<li><a href="'.$pagebase.'hyu/content/?pageType=archiveservice&operArchive=delete&archiveId='.$archiveRow->getId().'" idx="0">删除</a></li>
										<li><a href="'.$pagebase.'hyu/content/?pageType=archiveedit&operArchive=update&archiveId='.$archiveRow->getId().'" idx="0">修改</a></li>
									</ul>
								</div>
							</td>';
				}
				
				$archiveTable=$archiveTable.'</tr>';
			}
		}else{
			$archiveTable='<tr class="odd"> <td colspan="14">暂无商品信息</td></tr>';
		}
		echo $archiveTable;
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