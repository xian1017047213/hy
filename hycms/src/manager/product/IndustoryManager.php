<?php
namespace hybase\Manager;

require_once __DIR__ . '/../datamanager/database.php';
class IndustoryManager {
	function __construct() {
		// print "In BaseClass constructor\n";
	}
	public function testfindUsernameById() {
		try {
			global $entityManager;
			//$results = $entityManager->find ( 'HShopProduct', 4 );
			//$results = $entityManager->find ( 'HShopProductDetail', 1 );
			$results = $productBase=$entityManager->find ( 'HShopProductProperties', 1 );
			return $results;
		} catch ( Exception $e ) {
			return false;
		}
	}
	public function findAllIndustoryList($productId){
		global $entityManager;
		$productBase=$entityManager->$results = $entityManager->getRepository ( 'HShopProduct' )->findAll ();
		/* if ((empty ( $username ))&&(empty ( $tname ))&&(empty ( $status ))&&(empty ( $phonenum ))&&(empty ( $useremail ))&&(empty ( $type ))) {
			$results = $entityManager->getRepository ( 'HBackUser' )->findAll ();
			return $results;
		} */
		return $productBase;
	}
	
}