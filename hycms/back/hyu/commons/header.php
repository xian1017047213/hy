<?php 
use hybase\Controller\UserController;
include_once 'commonparam.php';
require_once __DIR__."/../../../src/controller/system/UserController.php";
$userController=new UserController();
$userRows=$userController->getUserList($_SESSION['loginname']);
?>

<div class="header">
	<div class="logo">
	<img alt="" src="<?php echo $staticbase;?>images/logo.png">
	</div>
	<div class="nav">
	<ul>
	<li><a href="<?php echo $pagebase;?>hyu/product" id="product">商品管理</a></li>
	<li><a href="<?php echo $pagebase;?>hyu/content" id="content">内容管理</a></li>
	<li><a href="javascript:void(0);" id="member">会员管理</a></li>
	<li><a href="<?php echo $pagebase;?>hyu/operate" id="operate">运营管理</a></li>
	<li><a href="<?php echo $pagebase;?>hyu/system" id="system">系统管理</a></li>
	</ul>
	</div>
	<div class="u-d">
	<span>welcome,<?php echo $username=$_SESSION ['loginname'];?></span>
	<a href="<?php echo $staticbase;?>hyu/user/logout.php" id="loginout" >退出</a>
	<a href="<?php echo ($pagebase.'hyu/system/?pageType=userdetail&userId='. $userRows[0]->getId ());?>>" id="modifyuser" >修改用户信息</a>
	</div>
</div>