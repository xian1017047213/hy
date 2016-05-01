<?php

namespace hybase\Manager;

use hybase\Tools\SystemParameter;

require_once __DIR__ . '/../datamanager/database.php';
require_once __DIR__ . '/../tools/SystemParameter.php';
class PropertyManager {
	function __construct() {
		// print "In BaseClass constructor\n";
	}
	public function saveProperty($propertyGroupCode, $propertyName, $propertyEditType, $propertyValueType, $propertyRequired) {
		global $entityManager;
		$entityManager->beginTransaction ();
		try {
			$property = new \HShopProperty ();
			$property->setGroupCode ( $propertyGroupCode );
			$property->setName ( $propertyName );
			$property->setStatus ( SystemParameter::$enableStatus );
			$property->setCreateTime ( new \DateTime ( 'now' ) );
			$property->setEditType ( $propertyEditType );
			$property->setValueType ( $propertyValueType );
			$property->setRequired ( $propertyRequired );
			$property->setVersion ( new \DateTime ( 'now' ) );
			$entityManager->persist ( $property );
			$entityManager->flush ();
			$entityManager->commit ();
			return true;
		} catch ( Exception $e ) {
			return false;
			$entityManager->rollback ();
		}
		$entityManager->close ();
	}
	public function savePropertyValue($propertyId, $propertyValueList) {
		global $entityManager;
		$entityManager->beginTransaction ();
		$oldPropertyValueList = self::findPrpertyValue ( $propertyId );
		$oldPropertyValueArray = array ();
		foreach ( $oldPropertyValueList as $oldPropertyValue ) {
			$oldPropertyValueArray [$oldPropertyValue->getId ()] = $oldPropertyValue->getPropertyId ();
		}
		try {
			foreach ( $propertyValueList as $valueLine ) {
				if ($valueLine ['id'] == 'newvalue') {
					$propertyValue = new \HShopPropertyValue ();
					$propertyValue->setCreateTime ( new \DateTime ( 'now' ) );
					$propertyValue->setPropertyId ( $propertyId );
					$propertyValue->setSequence ( $valueLine ['sequence'] );
					$propertyValue->setValue ( $valueLine ['value'] );
					$propertyValue->setVersion ( new \DateTime ( 'now' ) );
					$entityManager->persist ( $propertyValue );
					$entityManager->flush ();
				}
				if (isset ( $oldPropertyValueArray [$valueLine ['id']] ) && $oldPropertyValueArray [$valueLine ['id']] == $propertyId) {
					$propertyValue = $entityManager->find ( 'HShopPropertyValue', $valueLine ['id'] );
					$propertyValue->setModifyTime ( new \DateTime ( 'now' ) );
					$propertyValue->setSequence ( $valueLine ['sequence'] );
					$propertyValue->setValue ( $valueLine ['value'] );
					$entityManager->flush ();
					unset($oldPropertyValueArray [$valueLine ['id']] );
				}
			}
			if (!empty($oldPropertyValueArray)) {
				$deleteresult=true;
				//return  array_keys($oldPropertyValueArray);
				foreach (array_keys($oldPropertyValueArray) as $valueKey){
					if ($deleteresult===true) {
						$deleteresult=self::deletePropertyValue($valueKey);
					}
				}
				if ($deleteresult!=true) {
					return $deleteresult;
				}
			}
			$entityManager->commit ();
			return true;
		} catch ( Exception $e ) {
			return false;
			$entityManager->rollback ();
		}
		$entityManager->close ();
	}
	public function deletePropertyValue($propertyValueId) {
		global $entityManager;
		try {
			$propertyValue = $entityManager->find ( 'HShopPropertyValue', $propertyValueId );
			if (! empty ( $propertyValue )) {
				$entityManager->remove ( $propertyValue );
				$entityManager->flush ();
				return true;
			}
			return false;
		} catch ( Exception $e ) {
			return false;
		}
		$entityManager->close ();
	}
	
	
	public function updatePropertyStatus($propertyId, $propertyStatus) {
		global $entityManager;
		$entityManager->beginTransaction ();
		try {
			$property = $entityManager->find ( 'HShopProperty', $propertyId );
			if (! empty ( $property )) {
				$property->setModifyTime ( new \DateTime ( 'now' ) );
				$property->setStatus($propertyStatus);
				$entityManager->flush ();
				$entityManager->commit ();
				return TRUE;
			}
			return false;
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
			return false;
		} catch ( Exception $e ) {
			return false;
			$entityManager->rollback ();
		}
		$entityManager->close ();
	}
	public function findAllPrpertyList($propertyId, $propertyGroupCode, $propertyName, $propertyStatus) {
		global $entityManager;
		$queryBuilder = $entityManager->createQueryBuilder ();
		if ((empty ( $propertyId )) && (empty ( $propertyGroupCode )) && (empty ( $propertyName )) && (empty ( $propertyStatus ))) {
			$propertyTypeList = $entityManager->getRepository ( 'HShopProperty' )->findAll ();
			return $propertyTypeList;
		}
		$queryBuilder = $entityManager->createQueryBuilder ();
		$groupCode = '%' . $propertyGroupCode . '%';
		$name = '%' . $propertyName . '%';
		$status = '%' . $propertyStatus . '%';
		$queryBuilder->select ( array (
				'hsp' 
		) )->from ( 'HShopProperty', 'hsp' )->where ( $queryBuilder->expr ()->andX ( $queryBuilder->expr ()->like ( 'hah.code', '?1' ), $queryBuilder->expr ()->like ( 'hah.title', '?2' ), $queryBuilder->expr ()->like ( 'hah.status', '?3' ), $queryBuilder->expr () ) )->orderBy ( 'hah.id', 'desc' )->setParameter ( 1, $groupCode )->setParameter ( 2, $name )->setParameter ( 3, $status )->getMaxResults ( 15 );
		$query = $queryBuilder->getQuery ();
		$propertyTypeList = $query->getResult ();
		return $propertyTypeList;
	}
	public function findPrpertyById($propertyId) {
		global $entityManager;
		$propertyDetail = $entityManager->find ( 'HShopProperty', $propertyId );
		return $propertyDetail;
	}
	public function findPrpertyValue($propertyId) {
		global $entityManager;
		$queryBuilder = $entityManager->createQueryBuilder ();
		$queryBuilder->select ( array (
				'hspv' 
		) )->from ( 'HShopPropertyValue', 'hspv' )->where ( $queryBuilder->expr ()->eq ( 'hspv.propertyId', '?1' ) )->orderBy ( 'hspv.sequence', 'ASC' )->setParameter ( 1, $propertyId );
		$propertyValueDetail = $queryBuilder->getQuery ()->getResult ();
		return $propertyValueDetail;
	}
	
	/*
	 * -----------------------------------------------------------------------------------------------
	 */
	
	
	public function findProductProperties1($productId) {
		global $entityManager;
		$dql = "SELECT
				hsp
				FROM HShopProperty hsp
				LEFT JOIN HShopPropertyValue hspv with  WHERE hsp.id=hspv.propertyId
				LEFT JOIN ( SELECT hspp FROM HShopProductProperties hspp  WHERE hspp.product_id=null) hspp WHERE hspp.productValueId=hspv.id";
		$productBaseList = $entityManager->createQuery ( $dql )->getArrayResult ();
		// $productBaseList=$entityManager->getRepository ( 'HShopProduct' )->findAll ();
		return $productBaseList;
	}
	public function findPropertyListWithValue() {
		global $entityManager;
		$queryBuilder = $entityManager->createQueryBuilder ();
		$queryBuilder->select ( array (
				'
				hsp.id,
				hsp.name,
				hsp.groupCode,
				hsp.editType,
				hspv.id as propertyValueId,
				hspv.value' 
		) )->from ( 'HShopProperty', 'hsp' )->leftJoin ( 'HShopPropertyValue', 'hspv' )->where ( $queryBuilder->expr ()->eq ( 'hsp.id', 'hspv.propertyId' ) )->orderBy ( 'hsp.id', 'desc' );
		$query = $queryBuilder->getQuery ();
		$result = $query->getArrayResult ();
		return $result;
		// return $query;
	}
	public function findProductProperties($productId = null) {
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
		) )->from ( 'HShopProductProperties', 'hspp' )->leftJoin ( 'HShopProperty', 'hsp', 'WITH', 'hsp.id=hspp.propertyId' )->andWhere ( $queryBuilder->expr ()->eq ( 'hspp.productId', '?1' ) )->orderBy ( 'hsp.id', 'desc' )->setParameter ( 1, $productId );
		$query = $queryBuilder->getQuery ();
		$result = $query->getArrayResult ();
		return $result;
	}
}