<?php

namespace hybase\Controller;

use hybase\Manager\UserManager;

require_once __DIR__ . '/../../manager/member/UserManager.php';
class MemberController {
	function __construct() {
		// print "In BaseClass constructor\n";
	}
	public function loginVerify($username, $password) {
		try {
			$userManager = new UserManager ();
			if (($userManager->findPwdByUsername ( $username, $password )) && ($userManager->saveUserLoginTime ( $username, (new \DateTime ( "now" )) ))) {
				return true;
			}
		} catch ( Exception $e ) {
			return false;
		}
	}
	public function getUserList() {
		$userManager = new UserManager ();
		$userRows = $userManager->findUserList ();
		if (isset ( $userRows )) {
			foreach ( $userRows as $userRow ) {
				echo $userRow->getUserName ();
			}
		}
	}
}