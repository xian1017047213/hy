<?php
namespace hybase\Manager;

use hybase\Tools\SystemParameter;

require_once __DIR__ . '/../datamanager/database.php';
require_once __DIR__ .'/../tools/SystemParameter.php';
class PropertyManager {
	function __construct() {
		// print "In BaseClass constructor\n";
	}
	
	public function saveProperty($propertyGroupCode,$propertyName,$propertyEditType,$propertyValueType,$propertyRequired) {
		global $entityManager;
		$entityManager->beginTransaction ();
		try {
			$property = new \HShopProperty();
			$property->setGroupCode($propertyGroupCode);
			$property->setName($propertyName);
			$property->setStatus ( SystemParameter::$enableStatus );
			$property->setCreateTime ( new \DateTime ( 'now' ) );
			$property->setEditType( $propertyEditType );
			$property->setValueType($propertyValueType);
			$property->setRequired($propertyRequired);
			$property->setVersion ( new \DateTime ( 'now' ) );
			$entityManager->persist ( $property );
			$entityManager->flush ();
			$entityManager->commit();
			return true;
		} catch ( Exception $e ) {
			return false;
			$entityManager->rollback ();
		}
		$entityManager->close ();
	}
	public function updateProperty($propertyId, $propertyGroupCode, $propertyName, $propertyEditType, $propertyValueType, $propertyRequired) {
		global $entityManager;
		$entityManager->beginTransaction ();
		try {
			$property = $entityManager->find ( 'HShopProperty', $propertyId );
			if (! empty ( $property )) {
				$property->setGroupCode ( $propertyGroupCode );
				$property->setName ( $propertyName );
				$property->setModifyTime ( new \DateTime ( 'now' ) );
				$property->setEditType ( $propertyEditType );
				$property->setValueType ( $propertyValueType );
				$property->setRequired ( $propertyRequired );
				$entityManager->flush ();
				$entityManager->commit ();
				return TRUE;
			}
			return 'why';
		} catch ( Exception $e ) {
			return false;
			$entityManager->rollback ();
		}
		$entityManager->close ();
	}
	public function findAllPrpertyTypeList($propertyId,$propertyGroupCode,$propertyName,$propertyStatus) {
		global $entityManager;
		$queryBuilder = $entityManager->createQueryBuilder ();
		if ((empty ( $propertyId )) && (empty ( $propertyGroupCode )) && (empty ( $propertyName )) && (empty ( $propertyStatus )) ) {
			$propertyTypeList = $entityManager->getRepository ( 'HShopProperty' )->findAll ();
			return $propertyTypeList;
		}
		$queryBuilder = $entityManager->createQueryBuilder ();
		$groupCode = '%' . $propertyGroupCode . '%';
		$name = '%' . $propertyName . '%';
		$status = '%' . $propertyStatus . '%';
		$queryBuilder->select ( array (
				'hsp' 
		) )->from ( 'HShopProperty', 'hsp' )
		->where ( $queryBuilder->expr ()->andX ( 
				$queryBuilder->expr ()->like ( 'hah.code', '?1' ), 
				$queryBuilder->expr ()->like ( 'hah.title', '?2' ), 
				$queryBuilder->expr ()->like ( 'hah.status', '?3' ),
				$queryBuilder->expr () ) )
		->orderBy ( 'hah.id', 'desc' )
		->setParameter ( 1, $groupCode )
		->setParameter ( 2, $name )
		->setParameter ( 3, $status )
		->getMaxResults(15);
		$query = $queryBuilder->getQuery ();
		$propertyTypeList = $query->getResult ();
		return $propertyTypeList;
	}
	
	public function findPrpertyDetailById($propertyId){
		global $entityManager;
		$propertyDetail=$entityManager->find ( 'HShopProperty', $propertyId );
		return $propertyDetail;
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