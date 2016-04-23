<?php
use hybase\Controller\UserController;

require_once __DIR__ . "/../../../src/controller/member/UserController.php";
include_once __DIR__ . '/../member/loginveri.php';
static $oneGrade='authmanager';
static $secondGrade='usermanager';
?>
<!DOCTYPE html>
<html>
<head>	
<?php include_once __DIR__.'/../commons/commonspages.php';?>
</head>
<body>
<?php include_once __DIR__.'/../commons/header.php';?>
<div class="content">
<?php include_once __DIR__.'/systemLeftNav.php';?>
<div class="conright">
<?php
$userController = new UserController ();
header ( "Content-Type: text/html; charset=UTF-8" );
if (isset ( $_GET ["userId"] ) || isset ( $_GET ["pageType"] )) {
	$userId = (isset($_GET ["userId"])?$_GET ["userId"]:'');
	$operteType = $_GET ["pageType"];
	$userDetail = $userController->getUserDetailById ( $userId );
	if (isset ( $userDetail )) {
		if ($operteType == 'userdetail') {
			if (!empty($userId)) {
				echo '<form action="javascript:void(0);" method="get">
<table class="u-f-t-i table">
<tr>
<td><span>用户名：</span> </td>
<td><input type="text" id="username" name="username" class="" value="' . $userDetail->getUserName () . '" disabled="disabled"></td>
</tr>
<tr>
<td><span>真实姓名：</span> </td>
<td><input type="text" id="tname" name="tname" class="" value="' . $userDetail->getTname () . '" maxlength="50"></td>
</tr>
<tr>
<td><span>手机号：</span> </td>
<td><input type="text" id="phonenum" name="phonenum" class="" value="' . $userDetail->getPhoneNum () . '" maxlength="50"></td>
</tr>
<tr>
<td><span>邮箱：</span> </td>
<td><input type="text" id="useremail" name="useremail" class="" value="' . $userDetail->getUserEmail () . '" maxlength="50"></td>
</tr>
<tr>
<td><span>用户类型：</span> </td>
<td><span>
<select class="u-t-s" name="usertype">
<option value="1"' . ((($userDetail->getType ()) == 1) ? 'selected="selected"' : '') . '>系统用户</option>
<option value="2"' . ((($userDetail->getType ()) == 2) ? 'selected="selected"' : '') . '>普通用户</option>
<option value="2"' . (((($userDetail->getType ()) == 0) || (($userDetail->getType ()) > 3)) ? 'selected="selected"' : '') . '>其他用户</option>
</span>
</select></td>
</tr>
<tr>
<td><span>状态：</span> </td>
<td><span>
<select class="u-t-s" name="userstatus">
<option value="1"' . ((($userDetail->getStatus ()) == 1) ? 'selected="selected"' : '') . '>有效</option>
<option value="0"' . ((($userDetail->getStatus ()) == 2) ? 'selected="selected"' : '') . '>无效</option>
</span> </td>
</tr>
<tr class="">
<input value="userDetailSave" name="saveType" style="display:none;">
<input value="'.$userDetail->getId().'" name="userId" style="display:none;">
<td><button type="submit" id="userDetailSave" class="buttonsave">保存</button></td>
<td><a href="' . $pagebase . 'hyu/system/"><button type="button" class="buttonback">返回</button></a></td>
</tr>
</table>
<span class="resultMessage"></span>
</form>';
			}else {
				echo '<form action="javascript:void(0);" method="post">
<table class="u-f-t-i table">
<tr>
<td><span>用户名：</span> </td>
<td><input type="text" id="username" name="username" class="" value=""></td>
</tr>
<tr>
<td><span>密码：</span> </td>
<td><input type="password" id="userpwd" name="userpwd" class="" value=""></td>
</tr>
<tr>
<td><span>真实姓名：</span> </td>
<td><input type="text" id="tname" name="tname" class="" value="" maxlength="50"></td>
</tr>
<tr>
<td><span>手机号：</span> </td>
<td><input type="text" id="phonenum" name="phonenum" class="" value="" maxlength="50"></td>
</tr>
<tr>
<td><span>邮箱：</span> </td>
<td><input type="text" id="useremail" name="useremail" class="" value="" maxlength="50"></td>
</tr>
<tr>
<td><span>用户类型：</span> </td>
<td><span>
<select class="u-t-s" name="usertype">
<option value="1">系统用户</option>
<option value="2">普通用户</option>
<option value="2">其他用户</option>
</span>
</select></td>
</tr>
<tr>
<td><span>状态：</span> </td>
<td><span>
<select class="u-t-s" name="userstatus">
<option value="1">有效</option>
<option value="0">无效</option>
</span> </td>
</tr>
<tr class="">
<input value="userDetailSave" name="saveType" style="display:none;">
<input value="" name="userId" style="display:none;">
<td><button type="submit" id="userDetailSave" class="buttonsave">保存</button></td>
<td><button type="button" class="buttonback"><a href="' . $pagebase . 'hyu/system/">返回</a></button></td>
</tr>
</table>
<span class="resultMessage"></span>
</form>';
			}
			
		} elseif ($operteType == 'userpwd') {
			echo '<form action="javascript:void(0);" method="post">
<table class="u-f-t-i">
<tr>
<td><span>原密码：</span></td>
<td><input type="password" name="oldpwd" class="" value=""></td>
</tr>
<tr>
<td><span>新密码：</span></td>
<td><input type="password" name="newpwd" class="" value=""></td>
</tr>
<tr>
<td><span>确认新密码：</span></td>
<td><input type="password" name="confirmpwd" class="" value=""></td>
</tr>
<tr class="">
<input value="passwordSave" name="saveType"  style="display:none;">
<input value="'.$userDetail->getId().'" name="userId" style="display:none;">
<td><button type="submit" id="userDetailSave" class="buttonsave">保存</button></td>
</tr>
</table>
</form>';
		} elseif ($operteType == 'userstatus') {
			$result=$userController->changeUserStatus($userId, $_GET['operstatus']);
			header('location:'.$pagebase.'hyu/system/');
			exit ();
		} else{
			header('location:'.$pagebase.'hyu/system/');
			exit ();
		}
	}
}
?>
</div>
	</div>
</body>
<script type="text/javascript" src="../../scripts/commons.js"></script>

</html>