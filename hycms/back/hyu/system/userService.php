<?php
use hybase\Controller\UserController;

require_once __DIR__ . "/../../../src/controller/system/UserController.php";
include_once __DIR__ . '/../user/loginveri.php';
include_once __DIR__ . '/../commons/commonparam.php';
static $oneGrade = 'authmanager';
static $secondGrade = 'usermanager';
$userController = new UserController ();
header ( "Content-Type: text/html; charset=UTF-8" );
if (isset ( $_POST ["saveType"] )) {
	$postDataType = $_POST ["saveType"];
	if ($postDataType == 'userDetailSave') {
		if (empty($_POST ['userId'])) {
			$saveResult='用户异常';
			$saveResult = $userController->saveUserDetail ( $_POST ['userId'], $_POST ['tname'], $_POST ['phonenum'], $_POST ['useremail'], $_POST ['usertype'], $_POST ['userstatus'],$_POST ['userpwd'],$_POST ['username']);
		}else {			
			$saveResult = $userController->saveUserDetail ( $_POST ['userId'], $_POST ['tname'], $_POST ['phonenum'], $_POST ['useremail'], $_POST ['usertype'], $_POST ['userstatus'] );
		}
		if ($saveResult === true) {
			$url = $pagebase . "hyu/system/";
			echo json_encode ( array (
					'status' => 'success',
					'url' => $url,
					'description' => $saveResult 
			) );
		} else {
			echo json_encode ( array (
					'status' => 'fail',
					'url' => null,
					'description' => $saveResult 
			) );
		}
	}
	if ($postDataType == 'passwordSave') {
		// echo preg_match('/^[s]{0,}$|^[ws]{7,}$/', $_POST['newpwd']);
		if (preg_match ( '#(?=^.*?[a-z])(?=^.*?[A-Z])(?=^.*?\d)^(.{8,})$#', $_POST ['newpwd'] ) && (($_POST ['newpwd']) == ($_POST ['confirmpwd']))) {
			$saveResult = $userController->modifyPwd ( $_POST ['userId'], $_POST ['oldpwd'], $_POST ['newpwd'] );
			if ($saveResult == 1) {
				$url = $pagebase . "hyu/system/";
				echo json_encode ( array (
						'status' => 'success',
						'url' => $url,
						'description' => '' 
				) );
			} else {
				echo json_encode ( array (
						'status' => 'fail',
						'url' => null,
						'description' => $saveResult 
				) );
			}
		}
	}
	
	exit ();
}
