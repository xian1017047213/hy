<?php

namespace hybase\Manager;

use hybase\Repository;
use hybase\Repository\UserRespository;

require_once __DIR__ . '/../datamanager/database.php';
require_once __DIR__ .'/../repository/UserRespository.php';
class UserManager {
	function __construct() {
		// print "In BaseClass constructor\n";
	}
	public function testfindUsernameById() {
		global $entityManager;
		$tuser = $entityManager->find ( 'TUsers', 1 );
		$entityManager->getRepository('product')->getProductDetailById();
		//echo "result";
		echo $tuser->getUsername ();
		$dqlstr = "SELECT u.userName FROM HBackUser u";
		$query = $entityManager->createQuery ( $dqlstr );
		$bugs = $query->getResult ();
		foreach ( $bugs as $bug ) {
			echo $bug ['userName'];
		}
		$hbackuser = $entityManager->find ( 'HBackUser', 1 );
		echo '<br/> ---';
		echo $hbackuser->getUserName ();
		echo '<br/> ---';
		echo md5 ( '123456' );
	}
	public function changeUserStatus($userId, $userstatus) {
		try {
			global $entityManager;
			$user = $entityManager->find ( 'HBackUser', $userId );
			if (! empty ( $user )) {
				$user->setStatus($userstatus);
				$entityManager->flush ();
				return true;
			}
			return false;
		} catch ( Exception $e ) {
			return "服务器处理异常！";
		}
	}
	public function findNumberOfValidProduct(){
		global $entityManager;
		$query = $entityManager->createQuery('SELECT count(hbu) FROM HBackUser hbu');
		$productNum = $query->getResult() ;
		return $productNum;
	}
	public function findPwdByUsername($username, $password) {
		try {
		global $entityManager;
		$results = $entityManager->getRepository ( 'HBackUser' )->findBy ( array (
				'userName' => $username 
		) );
		if (isset ( $results ) &&!(empty($results))&&(($results [0]->getStatus ()) == 1)) {
			if (count ( $results ) == 1) {
				if (($results [0]->getUserPwd ()) == md5 ( $password )) {
					return true;
				}
			} else {
				return false;
			}
		}
		} catch (Exception $e) {
			return false;
		}
	}
	
	public function findUserList($username = null, $tname = null, $status = null, $phonenum = null, $useremail = null, $type = null) {
		global $entityManager;
		if ((empty ( $username ))&&(empty ( $tname ))&&(empty ( $status ))&&(empty ( $phonenum ))&&(empty ( $useremail ))&&(empty ( $type ))) {
			$results = $entityManager->getRepository ( 'HBackUser' )->findAll ();
			return $results;
		}
		$queryBuilder = $entityManager->createQueryBuilder ();
		$username='%'.$username.'%';
		$tname='%'.$tname.'%';
		$status='%'.$status.'%';
		$phonenum='%'.$phonenum.'%';
		$useremail='%'.$useremail.'%';
		$type='%'.$type.'%';
		$queryBuilder->select ( array ('hbu') )
		->from ( 'HBackUser', 'hbu' )
		->where ( $queryBuilder->expr ()->andX(
				$queryBuilder->expr ()->like ( 'hbu.userName', '?1'),
				$queryBuilder->expr ()->like ( 'hbu.tname', '?2'),
				$queryBuilder->expr ()->like( 'hbu.status', '?3'),
				$queryBuilder->expr ()->like ( 'hbu.phoneNum', '?4'),
				$queryBuilder->expr ()->like ( 'hbu.userEmail', '?5'),
				$queryBuilder->expr ()->like( 'hbu.type', '?6')
				))
				->orderBy ( 'hbu.id', 'desc' )
				->setParameter ( 1, $username )
				->setParameter ( 2, $tname )
				->setParameter ( 3, $status )
				->setParameter ( 4, $phonenum )
				->setParameter ( 5, $useremail )
				->setParameter ( 6, $type );
		$query = $queryBuilder->getQuery ();
		$results = $query->getResult ();
		return $results;
	}
	
	public function finUserDetailById($id) {
		global $entityManager;
		$results = $entityManager->getRepository ( 'HBackUser' )->findOneBy ( array (
				'id' => $id 
		) );
		if (isset ( $results)) {
			return $results;
		}
	}
	public function saveUserDetail($userId,  $tname,$phoneNum, $userEmail, $type, $status, $userpassword,$username) {
		global $entityManager;
		$entityManager->beginTransaction ();
		try {
			if (empty ( $userId )) {
				$results = $entityManager->getRepository ( 'HBackUser' )->findBy ( array (
						'userName' => $username 
				) );
				if (sizeof ( $results ) > 0) {
					return '用户名不能重复';
				}
				$newUser = new \HBackUser ();
				$newUser->setUserName ( $username );
				$newUser->setUserPwd ( md5 ( $userpassword ) );
				$newUser->setTname ( $tname );
				$newUser->setPhoneNum ( $phoneNum );
				$newUser->setUserEmail ( $userEmail );
				$newUser->setType ( $type );
				$newUser->setStatus ( $status );
				$entityManager->persist ( $newUser );
				$entityManager->flush ();
				$entityManager->commit();
				return true;
			}
			$user = $entityManager->find ( 'HBackUser', $userId );
			$user->setTname ( $tname );
			$user->setPhoneNum ( $phoneNum );
			$user->setUserEmail ( $userEmail );
			$user->setType ( $type );
			$user->setStatus ( $status );
			$entityManager->flush ();
			$entityManager->commit();
			return true;
		} catch ( Exception $e ) {
			$entityManager->rollback ();
			$entityManager->close();
			return "服务器处理异常！";
		}
	}
	public function saveUserLoginTime($username,$logintime,$loginip){
		try {
			global $entityManager;
			$queryBuilder = $entityManager->createQuery("update HBackUser hbu set hbu.lastLoginTime=:loginTime,hbu.loginIp=:loginIp where hbu.userName=:username");
			$queryBuilder->setParameters(array(
					'loginTime'=>$logintime,
					'username'=>$username,
					'loginIp'=>$loginip
			));
			$queryBuilder->execute();
			return true;
		} catch ( Exception $e ) {
			return false;
		}
	}
	public function saveNewPassword($userId, $oldPassword, $newPassword) {
		try {
			global $entityManager;
			$results = $entityManager->getRepository ( 'HBackUser' )->findBy ( array (
					'id' => $userId 
			) );
			if (isset ( $results )) {
				if (count ( $results ) == 1) {
					if (($results [0]->getUserPwd ()) == md5 ( $oldPassword )) {
					$user = $entityManager->find ( 'HBackUser', $userId);
					$user->setUserPwd ( md5($newPassword) );
					$entityManager->flush ();
					return true;
					}else {
						return false;
					}
				} else {
					return false;
				}
			}
			return false;
		} catch ( Exception $e ) {
			return "服务器处理异常！";
		}
	}
}


//$um=new UserManager();
//$um->findUserList("admin","123456");
//$time=date('y-m-d h:i:s',time());
//$um->saveUserLoginTime('baron',(new \DateTime("now")));