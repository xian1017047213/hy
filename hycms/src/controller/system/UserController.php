<?php
namespace hybase\Controller;

use hybase\Manager\UserManager;
use hybase\Tools\SystemParameter;

require_once  __DIR__ .'/../../manager/system/UserManager.php';
require_once __DIR__ . '/../../manager/tools/SystemParameter.php';

class UserController{
	/*
	 * 系统用户类型
	 */
	public static $sysUserType = 1;
	/*
	 * 普通用户类型
	 */
	public static $genUserType = 2;
	/*
	 * 有效用户
	 */
	public static $effectUserStatus = 1;
	/*
	 * 无效用户
	 */
	public static $invalidUserStatus=2;
	/*
	 * 操作用户状态为有效
	 */
	public static $operValidStatus='valid';
	/*
	 * 操作用户状态为无效
	 */
	public static $operInvalidStatus='invalid';
	
	public function __construct() {
		//print "In BaseClass constructor\n";
	}
	/*
	 * 转变用户类型为文字
	 */
	public function userTypeToString($userType){
		if ($userType==(SystemParameter::$sysUserType)) {
			return $userType='系统用户';
		}elseif ($userType==(SystemParameter::$genUserType)){
			return $userType='普通用户';
		}else {
			return $userType='其他用户';
		}
		
	}
	/*
	 * 转变用户状态为文字
	 */
	public function userStatusToString($userStatus) {
		if ($userStatus == (SystemParameter::$invalidUserStatus)) {
			return $userStatus = '无效';
		} elseif ($userStatus == (SystemParameter::$effectUserStatus)) {
			return $userStatus = '有效';
		} else {
			return $userStatus = '';
		}
	}
	/*
	 * 转变用户可操作状态为文字
	 */
	public function userOperStatusToString($userStatus) {
		if ($userStatus== (SystemParameter::$invalidUserStatus)) {
			return $operaUserStatus = '启用';
		} elseif ($userStatus== (SystemParameter::$effectUserStatus)) {
			return $operaUserStatus = '禁用';
		} else {
			return $operaUserStatus = '';
		}
	}
	public function userOperStatus($userStatus){
		if ($userStatus== (SystemParameter::$invalidUserStatus)) {
			return $operaUserStatus = SystemParameter::$operValidStatus;
		} elseif ($userStatus== (SystemParameter::$effectUserStatus)) {
			return $operaUserStatus = SystemParameter::$operInvalidStatus;
		} else {
			return $operaUserStatus = '';
		}
	}
	/**
	 * 用户验证以及保存登录IP地址
	 * @param 用户名 $username
	 * @param 密码 $password
	 * @param 登录IP地址 $loginip
	 * @return boolean
	 */
	public  function loginVerify($username,$password,$loginip=null){
	try {
			$userManager = new UserManager ();
			if (($userManager->findPwdByUsername ( $username, $password )) && ($userManager->saveUserLoginTime ( $username, (new \DateTime ( "now" )) ,$loginip))) {
				return true;
			}
			return false;
		} catch ( Exception $e ) {
			return false;
		}
	}
	public function changeUserStatus($userId,$operstatus){
		try {
			if ($operstatus==SystemParameter::$operValidStatus) {
				$userstatus=SystemParameter::$effectUserStatus;
			}
		if ($operstatus==SystemParameter::$operInvalidStatus) {
				$userstatus=SystemParameter::$invalidUserStatus;
			}
			$userManager = new UserManager ();
			$userManager->changeUserStatus($userId, $userstatus);
		} catch (Exception $e) {
			return false;
		}
	}
	/**
	 * 模糊查询，获取用户列表
	 * @param 用户名 $username
	 * @param 真是姓名 $tname
	 * @param 状态 $status
	 * @param 电话 $phonenum
	 * @param 邮箱 $useremail
	 * @param 状态 $type
	 */
	public function getUserList($startResult=NULL,$resultNum=NULL,$username=null,$tname=null,$status=null,$phonenum=null,$useremail=null,$type=null){
		$userManager=new UserManager();
		$userRows=$userManager->findUserList($startResult=NULL,$resultNum=NULL,$username,$tname,$status,$phonenum,$useremail,$type);
		return $userRows;
	}
	/**
	 * 获得用户信息详情
	 * @param 用户在系统中的ID $id
	 */
	public function getUserDetailById($id){
		$userManager=new UserManager();
		$userRows=$userManager->finUserDetailById($id);
		if (isset($userRows)) {
			return $userRows;
		}
		return false;
	}
	/**
	 * 
	 * @param unknown $userId
	 * @param unknown $tname
	 * @param unknown $phoneNum
	 * @param unknown $userEmail
	 * @param unknown $type
	 * @param unknown $status
	 */
	public function saveUserDetail($userId, $tname, $phoneNum, $userEmail, $type, $status,$userpassword=null,$username=null) {
		$userManager=new UserManager();
		//校验参数不能为空
		if (! isset ( $userId )||empty($userId)) {
			if (! isset ( $username )||empty($username)) {
				return '处理异常，请刷新页面再试！';
			}
			if (! isset ( $userpassword )||empty($userpassword)) {
				return '密码不能为空！';
			}
		}
		if (! isset ( $tname )||empty($tname)) {
			return '真实姓名不能为空！';
		}
		if (! isset ( $phoneNum )||empty($phoneNum)) {
			return '电话号码不能为空！';
		}
		if (! isset ( $userEmail )||empty($userEmail)) {
			return '邮箱不能为空！';
		}
		if (! isset ( $type )||empty($type)) {
			return '处理异常请刷新页面！';
		}
		if (! isset ( $status )||empty($status)) {
			return '处理异常请刷新页面！';
		}
		if (!preg_match('/^(1)\d{10}$/', $phoneNum)) {
			return '电话不符合规范!';
		}
		$saveResult=$userManager->saveUserDetail($userId,$tname, $phoneNum, $userEmail, $type, $status,$userpassword,$username);
		if ($saveResult===true) {
			return true;
		}else {
			return $saveResult;
		}
	}
	public function modifyPwd($userId,$oldPwd,$newPwd){
		$userManager=new UserManager();
		$saveResult=$userManager->saveNewPassword($userId, $oldPwd, $newPwd);
		if ($saveResult) {
			return $saveResult;
		}else {
			return '密码错误！';
		}
		return '密码保存失败！';
	}
}