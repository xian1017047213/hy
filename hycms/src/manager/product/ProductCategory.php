<?php
namespace hybase\Manager;

use hybase\Tools\SystemParameter;

require_once __DIR__ . '/../datamanager/database.php';
require_once __DIR__ .'/../tools/SystemParameter.php';
class productCategory {
	function __construct() {
		// print "In BaseClass constructor\n";
	}
	public function testfindUsernameById() {
		try {
			global $entityManager;
			$results = $productBase=$entityManager->find ( 'HShopProductCategory.php', 1 );
			return $results;
		} catch ( Exception $e ) {
			return false;
		}
	}
	public function saveProductCategory($parentId, $categoryCode, $categoryName) {
		global $entityManager;
		$entityManager->beginTransaction ();
		try {
			$productCategory = new \HShopCategory();
			$productCategory->setCode($categoryCode);
			$productCategory->setCreateTime(new \DateTime('now'));
			$productCategory->setName($categoryName);
			$productCategory->getSequence(1);
			$productCategory->setParentId($parentId);
			$productCategory->setStatus(SystemParameter::$enableStatus);
			$productCategory->setVersion(new \DateTime('now'));
			$entityManager->flush ();
			$entityManager->persist ( $productCategory );
			$entityManager->commit();
		} catch ( Exception $e ) {
			$entityManager->rollback ();
			$entityManager->close ();
		}
		$entityManager->close ();
	}
	public function saveProductProperties($propuctPropertiesArray, $type = NULL) {
		global $entityManager;
		$entityManager->beginTransaction ();
		try {
			foreach ($propuctPropertiesArray as $productProperty){				
			$productProperties = new \HShopProductProperties ();
			$productProperties->setProductId ( $productId );
			$productProperties->setCreateTime ( new \DateTime ( 'now' ) );
			$productProperties->setPropertyId ( $propertyId );
			if (! empty ( $type )) {
				$productProperties->setPropertyValue( $propertyValueId );
			} else {
				$productProperties->setPropertyValueId ( $propertyValueId );
			}
			$productProperties->setVersion ( new \DateTime ( 'now' ) );
			$entityManager->persist ( $productProperties );
			$entityManager->flush ();
			}
			$entityManager->commit();
		} catch ( Exception $e ) {
			$entityManager->rollback ();
		}
		$entityManager->close ();
	}
	public function findAllProductList(){
		global $entityManager;
		$productBaseList=$entityManager->getRepository ( 'HShopProduct' )->findAll ();
		return $productBaseList;
	}
	public function findAllProductTypeList(){
		global $entityManager;
		$propertyTypeList=$entityManager->getRepository ( 'HShopProperty' )->findAll ();
		return $propertyTypeList;
	}
	public function findAllProductListWithDetail(){
		global $entityManager;
		/* $dql = "select 
				hsp.id,
				hsp.code,
				hspd.title,
				hsp.createTime,
				hsp.modifyTime,
				hsp.industryId,
				hsp.status,
				hsp.listTime,
				hsp.type,
				hspd.activeBeginTime 
				FROM HShopProduct hsp JOIN HShopProductDetail hspd Where hsp.id=hspd.productId"; */
		$dql = "select
				hsp.id,
				hsp.code,
				hspd.title,
				hsp.createTime,
				hsp.modifyTime,
				hsp.industryId,
				hsp.status,
				hsp.listTime,
				hsp.type,
				hspd.activeBeginTime,
				hsi.name as industryName
				FROM HShopProduct hsp 
				LEFT JOIN HShopProductDetail hspd Where hsp.id=hspd.productId
				LEFT JOIN HShopIndustry hsi Where hsi.id=hsp.industryId";
		$productBaseList = $entityManager->createQuery($dql)->getArrayResult();
		//$productBaseList=$entityManager->getRepository ( 'HShopProduct' )->findAll ();
		return $productBaseList;
	}
	
	public function findAllProductListWithDetailByCondition($code,$title,$status,$createStart,$createEnd,$type,$listStart,$listEnd){
		global $entityManager;
		$queryBuilder = $entityManager->createQueryBuilder ();
		$code='%'.$code.'%';
		$title='%'.$title.'%';
		$status='%'.$status.'%';
		$createStart=\DateTime::createFromFormat('Y-m-d H:i:s', $createStart);
		if (empty($createEnd)) {
			$createEnd= new \DateTime("now");
		}else {			
			$createEnd=\DateTime::createFromFormat('Y-m-d H:i:s', $createEnd);
		}
		$type='%'.$type.'%';
		$listStart=\DateTime::createFromFormat('Y-m-d H:i:s', $listStart);
		if (empty($listEnd)) {
			$listEnd= new \DateTime("now");
		}else {
			$listEnd=\DateTime::createFromFormat('Y-m-d H:i:s', $createEnd);
		}
		$queryBuilder->select ( array ('
				hsp.id,
				hsp.code,
				hspd.title,
				hsp.createTime,
				hsp.modifyTime,
				hsp.industryId,
				hsp.status,
				hsp.listTime,
				hsp.type,
				hspd.activeBeginTime') )
		->from('HShopProduct', 'hsp')
		->join('HShopProductDetail', 'hspd')
		->where($queryBuilder->expr ()->andX(
				$queryBuilder->expr ()->eq('hsp.id', 'hspd.productId'),
				$queryBuilder->expr ()->like ( 'hsp.code', '?1'),
				$queryBuilder->expr ()->like ( 'hspd.title', '?2'),
				$queryBuilder->expr ()->like ( 'hsp.status', '?3'),
				$queryBuilder->expr ()->between('hsp.createTime', '?4', '?5'),
				$queryBuilder->expr ()->like ( 'hsp.type', '?6'),
				$queryBuilder->expr ()->between('hsp.listTime', '?7', '?8')
				))
		->orderBy ( 'hsp.id', 'desc' )
		->setParameter ( 1, $code )
		->setParameter ( 2, $title )
		->setParameter ( 3, $status )
		->setParameter ( 4, $createStart )
		->setParameter ( 5, $createEnd )
		->setParameter ( 6, $type )
		->setParameter ( 7, $listStart )
		->setParameter ( 8, $listEnd );
		$query=$queryBuilder->getQuery();
		$productBaseList = $query->getArrayResult();
		//$productBaseList=$entityManager->getRepository ( 'HShopProduct' )->findAll ();
		return $productBaseList;
	}
	public function findProductById($productId){
		global $entityManager;
		$productBase=$entityManager->find ( 'HShopProduct', $productId );
		return $productBase;
	}
	public function findProductDetail($productId){
		global $entityManager;
		$productDetail=$entityManager->getRepository ( 'HShopProductDetail' )->findBy ( array (
				'productId' => $productId
		) );
		return $productDetail;
	}
	public function findProductProperties1($productId) {
		global $entityManager;
		// $productProperties=$entityManager->getRepository ( 'HShopProductProperties' )->findBy ( array (
		// 'productId' => $productId
		// ) );
		// return $productProperties;
		$dql = "SELECT
hsp
FROM HShopProperty hsp
LEFT JOIN HShopPropertyValue hspv with  WHERE hsp.id=hspv.propertyId
LEFT JOIN ( SELECT hspp FROM HShopProductProperties hspp  WHERE hspp.product_id=null) hspp WHERE hspp.productValueId=hspv.id";
		$productBaseList = $entityManager->createQuery ( $dql )->getArrayResult ();
		// $productBaseList=$entityManager->getRepository ( 'HShopProduct' )->findAll ();
		return $productBaseList;
	}
	public function findPropertyListWithValue(){
		global $entityManager;
		$queryBuilder=$entityManager->createQueryBuilder();
		$queryBuilder->select(array('
				hsp.id,
				hsp.name,
				hsp.groupCode,
				hsp.editType,
				hspv.id as propertyValueId,
				hspv.value'))
			->from('HShopProperty', 'hsp')
			->leftJoin('HShopPropertyValue', 'hspv')
			->where($queryBuilder->expr()->eq('hsp.id', 'hspv.propertyId'))
			->orderBy('hsp.id','desc');
					$query=$queryBuilder->getQuery();
					$result=$query->getArrayResult();
					return $result;
					//return $query;
	
	}
	public function findProductProperties($productId=null) {
		global $entityManager;
		$queryBuilder = $entityManager->createQueryBuilder ();
		$queryBuilder->select ( array (
				'
				hspp.id,
				hspp.productId,
				hspp.propertyId,
				hspp.propertyValueId,
				hspp.propertyValue,
				hsp.editType' 
		) )
		->from ( 'HShopProductProperties', 'hspp' )
		->leftJoin ( 'HShopProperty', 'hsp','WITH','hsp.id=hspp.propertyId' )
		->andWhere($queryBuilder->expr ()->eq ( 'hspp.productId', '?1' ))
		->orderBy ( 'hsp.id', 'desc' )
		->setParameter(1, $productId);
		$query = $queryBuilder->getQuery ();
		$result = $query->getArrayResult ();
		return $result;
	}
}