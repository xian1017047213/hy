<?php
require_once __DIR__ . '/../../../src/controller/system/UserController.php';
include_once __DIR__ . '/../commons/commonparam.php';
use hybase\Controller\UserController;
$GLOBALS ['projectroot'] = 'test';
header ( "Content-Type: text/html; charset=UTF-8" );
$msgdesc = '';
$userController = new UserController ();
if (! isset ( $_POST ['username'] ) || ! isset ( $_POST ['userpwd'] ) || ! isset ( $_POST ['userverify'] )) {
	$msgdesc = '数据异常！';
	echo json_encode ( array (
			'status' => 'false',
			'url' => null,
			'description' => $msgdesc,
			'result' => false 
	) );
	return;
}
session_start ();
$username = $_POST ['username'];
$pwd = $_POST ['userpwd'];
$vcode = $_POST ['userverify'];
if (! isset ( $_SESSION ["vcode"] ) || $vcode != strtolower ( $_SESSION ["vcode"] )) {
	$msgdesc = '验证码错误！';
	echo json_encode ( array (
			'status' => 'false',
			'url' => null,
			'description' => $msgdesc,
			'result' => false 
	) );
	return;
}
if ($userController->loginVerify ( $username, $pwd, get_real_ip () )) {
	setcookie ( 'SESSIONID', session_id () );
	$_SESSION ['loginstatus'] = 1;
	$_SESSION ['loginname'] = $username;
	if (isset ( $pagebase )) {
		$url = $pagebase;
		echo json_encode ( array (
				'status' => 'success',
				'url' => $url,
				'description' => '' 
		) );
	}
} else {
	$msgdesc = '用户名或密码错误！';
	echo json_encode ( array (
			'status' => 'false',
			'url' => null,
			'description' => $msgdesc,
			'result' => false 
	) );
}
function get_real_ip() {
	$ip = false;
	if (! empty ( $_SERVER ["HTTP_CLIENT_IP"] )) {
		$ip = $_SERVER ["HTTP_CLIENT_IP"];
	}
	if (! empty ( $_SERVER ['HTTP_X_FORWARDED_FOR'] )) {
		$ips = explode ( ", ", $_SERVER ['HTTP_X_FORWARDED_FOR'] );
		if ($ip) {
			array_unshift ( $ips, $ip );
			$ip = FALSE;
		}
		for($i = 0; $i < count ( $ips ); $i ++) {
			if (! eregi ( "^(10|172\.16|192\.168)\.", $ips [$i] )) {
				$ip = $ips [$i];
				break;
			}
		}
	}
	return ($ip ? $ip : $_SERVER ['REMOTE_ADDR']);
}
?>