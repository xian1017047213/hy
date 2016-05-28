<?php 
use hybase\Controller\UserController;
use hybase\Tools\SystemParameter;
use hybase\Tools\PageCalculate;

require_once __DIR__."/../../../../src/controller/system/UserController.php";
require_once __DIR__ . "/../../../../src/manager/tools/PageCalculate.php";
require_once __DIR__ . '/../../../../src/manager/tools/SystemParameter.php';
include_once __DIR__.'/../../user/loginveri.php';
static $oneGrade='authmanager';
static $secondGrade='usermanager';
$recordNum=null;
$pageNum=null;
$userController=new UserController();
$recordNum=sizeof($userController->getUserList())>0 ? sizeof($userController->getUserList()):0;
$pageNum=ceil($recordNum / SystemParameter::$recordOfEveryPage) ;
$startNum=1;
if (isset ( $_GET ['operPage'] )) {
	$pageCalculate= new PageCalculate();
	$startNum=$pageCalculate->calPageNum($_GET['operPage'], $_GET['pageNum'], $_GET['maxPageNum']);
}
?>
<!DOCTYPE html>
<html>
<head>	
<?php include_once __DIR__.'/../../commons/commonspages.php';?>
</head>
<body>
<?php include_once __DIR__.'/../../commons/header.php';?>
<div class="content">
<?php include_once __DIR__.'/../systemLeftNav.php';?>
<div class="conright">
<div class="conheader">
<span>用户管理</span>
<a style="float: right;text-decoration: none;margin-top: 5px;" href=" <?php echo $pagebase.'hyu/system/?pageType=userdetail';?>" >
<label class="listButton" >新建用户</label>
</a>
</div>
<div class="c-r-c">
<div class="ui-block-content ui-block-content-lb">
<form action="<?php echo $pagebase ?>hyu/system/" method="get" id="usersearch">
<input id="searchuser" name="searchuser" style="display: none;" value="searchuser">
<table>
	<tbody>
		<tr>
			<td><label>用户名</label></td>
			<td><span id="searchkeytext"> <input type="text" value="<?php echo @$_GET['username'];?>" id="username" name="username" placeholder="用户名" class="ui-table-default ui-corner-all"> </span>
			</td>
			<td><label>真实姓名</label></td>
			<td><span id="searchkeytext"><input type="text" value="<?php echo @$_GET['tname'];?>" id="tname" name="tname" placeholder="真实姓名" class="ui-table-default ui-corner-all" > </span>
			</td>
			<td><label>状态</label></td>
			<td><span id="searchkeytext"> 
			<select id="lifecycle" name="userstatus" class="ui-table-default ui-corner-all">
			<?php echo '--'.@$_GET['userstatus'].'--';?>
				<option value="" <?php echo  (((@$_GET['userstatus']) == null) ? 'selected="selected"' : ''); ?>>不限</option>
				<option value="1" <?php echo  (((@$_GET['userstatus']) == 1) ? 'selected="selected"' : ''); ?>>有效</option>
				<option value="2" <?php echo  (((@$_GET['userstatus']) ==2) ? 'selected="selected"' : ''); ?>>无效</option>
			</select></span></td>

		</tr>
		<tr>
			<td><label>手机号</label></td>
			<td><input type="text" id="phonenum" value="<?php echo @$_GET['phonenum'];?>" name="phonenum" placeholder="手机号" class="ui-table-default ui-corner-all hasDatepicker"></td>
			<td align="center"><label>邮箱</label></td>
			<td><input type="text" name="useremail" value="<?php echo @$_GET['useremail'];?>" id="useremail" placeholder="邮箱" class="ui-table-default ui-corner-all hasDatepicker" ></td>		
			<td><label>用户类型</label></td>
			<td><select name="type" class="ui-table-default ui-corner-all">
				<option value="" <?php echo  (((@$_GET['type']) == null) ? 'selected="selected"' : '');?>>不限</option>
				<option value="1" <?php echo  (((@$_GET['type']) == 1) ? 'selected="selected"' : ''); ?>>系统用户</option>
				<option value="2" <?php echo  (((@$_GET['type']) == 2) ? 'selected="selected"' : ''); ?>>普通用户</option>
			</select></td>
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
<span class="ui-table-title">用户列表</span>
<div class="ui-table-nav">
<div class="nav-pager">
	<a id="firstPage" href="<?php echo '?pageNum=1&operPage=firstPage&maxPageNum='.$pageNum;?>" class="firstPage" title="首页"> 首页 </a>
	<a id="prevPage" href="<?php if ($startNum==1) {echo 'javascript:void(0);';}else{echo '?pageNum='.$startNum.'&operPage=prevPage&maxPageNum='.$pageNum;}?>" class="prevPage" title="上一页">上一页</a>
	<a id="nextPage" href="<?php if ($startNum==$pageNum) {echo 'javascript:void(0);';}else{echo '?pageNum='.$startNum.'&operPage=nextPage&maxPageNum='.$pageNum;}?>" class="nextPage" title="下一页">下一页</a>
	<a id="lastPage" href="<?php echo '?pageNum='.$pageNum.'&operPage=lastPage&maxPageNum='.$pageNum;?>" class="lastPage" title="尾页"> 尾页 </a>
	<input type="text" class="pagenum" name="pageNum" value="1">
	<input type="hidden" class="operPage" name="operPage" value="">
	<input type="hidden" class="maxPageNum" name="maxPageNum" value="<?php echo $pageNum ?>">
	<button type="submit" class="pagego">GO</button>
	<span id="pagenum" class="pagenum" title="总页数">第<?php echo $pageNum ?>页</span>
	<span id="recnum" class="recnum" title="总记录数">共<?php echo $recordNum ?>条</span>
	</div>
</div>
<table class="table hoverback table-list" cellpadding="0">
	<thead>
		<tr>
			<th class="col-0" width="3%">
			<div><input type="checkbox"></div>
			</th>
			<th class="col-1" width="5%">
			<div>用户名<span></span></div>
			</th>
			<th class="col-2" width="10%">
			<div>真实姓名<span></span></div>
			</th>
			<th class="col-3" width="5%">
			<div>手机号<span></span></div>
			</th>
			<th class="col-4" width="10%">
			<div>邮箱</div>
			</th>
			<th class="col-5" width="5%">
			<div>用户类型</div>
			</th>
			<th class="col-6" width="4%">
			<div>状态</div>
			</th>
			<th class="col-7 sort-desc" width="10%">
			<div>创建时间<span></span></div>
			</th>
			<th class="col-13" width="5%">
			<div>操作</div>
			</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	if (isset($_GET['searchuser'])) {
		$userRows=$userController->getUserList((($startNum-1)*(SystemParameter::$recordOfEveryPage)),SystemParameter::$recordOfEveryPage,$_GET['username'],$_GET['tname'],$_GET['userstatus'],$_GET['phonenum'],$_GET['useremail'],$_GET['type']);
	}else {
		$userRows=$userController->getUserList((($startNum-1)*(SystemParameter::$recordOfEveryPage)),SystemParameter::$recordOfEveryPage);
	}
	if (isset($userRows)) {
		$userTable='';
		$i=1;
		if (!empty($userRows)) {
			foreach ($userRows as $userRow){
				if (isset($userRow)) {
					$userType=$userController->userTypeToString($userRow->getType());
					$userStatus=$userController->userStatusToString($userRow->getStatus());
					$operaUserStatus=$userController->userOperStatusToString($userRow->getStatus());
					$operaStatus=$userController->userOperStatus($userRow->getStatus());
					$versionTime=$userRow->getVersion ()->format('Y-d-m h:m:s');
					$userTable = $userTable . '<tr class="">';
					$userTable = $userTable . '<td class="col-0 "><input type="checkbox" name="chid" class="checkId" value="' . $userRow->getId () . '"></td>';
					$userTable = $userTable . '<td class="col-1 "><span title="' . $userRow->getUserName () . '">' . $userRow->getUserName () . '</span></td>';
					$userTable = $userTable . '<td class="col-2 "><span title="' . $userRow->getTname () . '">' . $userRow->getTname () . '</span></td>';
					$userTable = $userTable . '<td class="col-3 "><span title="' . $userRow->getPhoneNum () . '">' . $userRow->getPhoneNum () . '</span></td>';
					$userTable = $userTable . '<td class="col-4 "><span title="' . $userRow->getUserEmail () . '">' . $userRow->getUserEmail () . '</span></td>';
					$userTable = $userTable . '<td class="col-5 "><span title="' . $userType . '">' . $userType . '</span></td>';
					$userTable = $userTable . '<td class="col-6 "><span title="' . $userStatus . '">' . $userStatus . '</span></td>';
					$userTable = $userTable . '<td class="col-7 "><span title="' .$versionTime. '">' .$versionTime. '</span></td>';
					$userTable = $userTable . '<td class="col-8 ">
					<div class="ui-poplist">
					<div class="current">修改</div>
						<ul style="z-index: 16;">
							<li><a href="'.$pagebase.'hyu/system/?pageType=userdetail&userId='. $userRow->getId ().'">修改</a></li>
							<li><a href="'.$pagebase.'hyu/system/?pageType=userpwd&userId='. $userRow->getId ().'">重置密码</a></li>
							<li><a href="'.$pagebase.'hyu/system/?pageType=userstatus&operstatus='.$operaStatus.'&userId='. $userRow->getId ().'">'.$operaUserStatus.'</a></li>
						</ul>
					</div></td>';
					$userTable = $userTable . '</tr>';
				}
			}
		}else {
			$userTable='<tr><td colspan="10"><span class="notextremind">暂无用户信息</span></td><tr>';

		}
		
		
		
		echo $userTable;
	}
	?>
		<!-- 
		<tr class="odd">
			<td class="col-0 "><input type="checkbox" name="chid" class="checkId"
				value="4509"></td>
			<td class="col-1 "><span title="admin">admin</span></td>
			<td class="col-2 "><span title="adminname">adminname</span></td>
			<td class="col-3 "><span title="13333333333">13333333333</span></td>
			<td class="col-4 "><span title="test@qq.com">test@qq.com</span></td>
			<td class="col-5 "><span title="系统">系统</td>
			<td class="col-6 "><span class="ui-pyesno ui-pyesno-wait" title="有效">有效</span></td>
			<td class="col-7 "><span title="2016-2-22 10:50:52">2016-2-22
			10:50:52</span></td>
			<td class="col-13 ">
			<div class="ui-poplist">
			<div class="current">操作</div>
			<ul style="z-index: 16;">
				<li><a href="/item/updateItem.htm?itemId=4509">修改</a></li>
				<li><a href="/i18n/itemImage/toAddItemImage.htm?itemId=4509">密码重置</a></li>
				<li><a href="/item/updateItemStore.htm?itemId=4509">禁用</a></li>
			</ul>
			</div>
			</td>
		</tr> -->

	</tbody>
</table>
<div class="ui-table-nav">
<div class="nav-pager">
	<a id="firstPage" href="<?php echo '?pageNum=1&operPage=firstPage&maxPageNum='.$pageNum;?>" class="firstPage" title="首页"> 首页 </a>
	<a id="prevPage" href="<?php if ($startNum==1) {echo 'javascript:void(0);';}else{echo '?pageNum='.$startNum.'&operPage=prevPage&maxPageNum='.$pageNum;}?>" class="prevPage" title="上一页">上一页</a>
	<a id="nextPage" href="<?php if ($startNum==$pageNum) {echo 'javascript:void(0);';}else{echo '?pageNum='.$startNum.'&operPage=nextPage&maxPageNum='.$pageNum;}?>" class="nextPage" title="下一页">下一页</a>
	<a id="lastPage" href="<?php echo '?pageNum='.$pageNum.'&operPage=lastPage&maxPageNum='.$pageNum;?>" class="lastPage" title="尾页"> 尾页 </a>
	<input type="text" class="pagenum" name="pageNum" value="1">
	<input type="hidden" class="operPage" name="operPage" value="">
	<input type="hidden" class="maxPageNum" name="maxPageNum" value="<?php echo $pageNum ?>">
	<button type="submit" class="pagego">GO</button>
	<span id="pagenum" class="pagenum" title="总页数">第<?php echo $pageNum ?>页</span>
	<span id="recnum" class="recnum" title="总记录数">共<?php echo $recordNum ?>条</span>
	</div>
</div>
</div>
</div>
</div>
</div>
</body>
<script type="text/javascript" src="<?php echo $staticbase?>scripts/commons.js"></script>

</html>