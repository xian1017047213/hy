<?php
namespace hybase\Manager;


use hybase\Tools\PHPTree;

require_once __DIR__ . '/../datamanager/database.php';
require_once __DIR__ .'/../Tools/PHPTree.php';
class BackMenu {
	function __construct() {
		// print "In BaseClass constructor\n";
	}
	public function makeSysMenu(){
		global $entityManager;
		$results = $entityManager->getRepository ( 'HBackMenu' )->findAll ();
		$treeSourceData=array();
		$i=0;
		foreach ($results as $result){
			$treeSourceData[$i]=array(
					'id'=>$result->getId(),
					'name'=>$result->getName(),
					'parent_id'=>$result->getParentId()
			);
			$i++;
		}
		$treeMenu=PHPTree::makeTreeForHtml($treeSourceData);
		return $treeMenu;
		//return $treeSourceData;
	}
}