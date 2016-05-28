
<!DOCTYPE html>
<html>
<head>
<?php 
include_once __DIR__.'/../commons/commonspages.php';
include_once __DIR__.'/../commons/commonparam.php';
//ini_set('session.gc_maxlifetime', 3600);
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>华禹数据管理系统</title>
<link href="<?php echo $staticbase;?>css/login.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="content">
		<div class="c-t">
			<p class="c-t-t">华禹数据管理系统</p>
			<p>ChinaYu Database Management Information System</p>
		</div>
		<div class="c-t-b">
			<div class="c-t-b-r">
				<div class="l-d">
					<label>用户名：</label> <input class="p-f" type="text" maxlength="50"
						id="username" name="username" value="">
				</div>
				<div class="l-p">
					<label>密码：</label> <input class="p-f" type="password"
						maxlength="50" id="userpwd" name="userpwd">
				</div>
				<div class="l-p">
					<label>验证码：</label>
					 <input class="p-f-v" type="text"
						maxlength="10" id="userverify" name="userverify">
					<a href="javascript:void(0);" id="verifylink">
					<img alt="" class="verifyimg" src="<?php echo $pagebase.'hyu/commons/verifyImg.php';?>" >
					</a>
				</div>
				<div class="l-p">
					<label class="resultMessage"></label>
				</div>
				<button class="c-t-b-r-s" id="loginsub" type="submit">立即登录</button>
			</div>
		</div>
		<input class="pageType" type="text" id="pageType" name="pageType" value="loginpage" style="display: none;">
	</div>
	<script type="text/javascript"
		src="<?php echo $staticbase?>scripts/commons.js"></script>
</body>
</html>