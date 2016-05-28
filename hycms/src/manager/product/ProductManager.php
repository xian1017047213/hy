<?php

namespace hybase\Manager;

use hybase\Tools\SystemParameter;
use Doctrine\ORM\Tools\Pagination\Paginator;

require_once __DIR__ . '/../datamanager/database.php';
require_once __DIR__ . '/../tools/SystemParameter.php';
class ProductManager {
	function __construct() {
		// print "In BaseClass constructor\n";
	}
	public function testfindUsernameById() {
		try {
			global $entityManager;
			// $results = $entityManager->find ( 'HShopProduct', 4 );
			// $results = $entityManager->find ( 'HShopProductDetail', 1 );
			$results = $productBase = $entityManager->find ( 'HShopProductProperties', 1 );
			return $results;
		} catch ( Exception $e ) {
			return false;
		}
	}
	public function saveProduct($productCode, $productTitle, $productSubTitle, $productPropertiesArray, $productSketch, $productDescription, $productType) {
		global $entityManager;
		$entityManager->beginTransaction ();
		try {
			$product = new \HShopProduct ();
			$product->setCode ( $productCode );
			$product->setStatus ( SystemParameter::$productStatusIni );
			$product->setCreateTime ( new \DateTime ( 'now' ) );
			$product->setType ( $productType );
			$product->setVersion ( new \DateTime ( 'now' ) );
			$entityManager->persist ( $product );
			$entityManager->flush ();
			$productDetail = new \HShopProductDetail ();
			$productDetail->setProductId ( $product->getId () );
			$productDetail->setTitle ( $productTitle );
			$productDetail->setSubTitle ( $productSubTitle );
			$productDetail->setCreateTime ( new \DateTime ( 'now' ) );
			$productDetail->setSketch ( $productSketch );
			$productDetail->setDescription ( $productDescription );
			$productDetail->setVersion ( new \DateTime ( 'now' ) );
			$entityManager->persist ( $productDetail );
			$entityManager->flush ();
			if (! empty ( $productPropertiesArray )) {
				if (! self::saveProductProperties ( $product->getId (), $productPropertiesArray )) {
					return false;
				}
			}
			$entityManager->commit ();
			return true;
		} catch ( Exception $e ) {
			$entityManager->rollback ();
		}
		$entityManager->close ();
	}
	public function updateProduct($productId, $productCode, $productTitle, $productSubTitle, $productPropertiesArray, $productSketch, $productDescription, $productType) {
		global $entityManager;
		$entityManager->beginTransaction ();
		try {
			$product = $entityManager->find ( 'HShopProduct', $productId );
			$product->setCode ( $productCode );
			$product->setModifyTime ( new \DateTime ( 'now' ) );
			$product->setType ( $productType );
			$entityManager->flush ();
			$productDetailresult = self::findProductDetailByProductId ( $productId );
			$productDetail = $entityManager->find ( 'HShopProductDetail', $productDetailresult->getId () );
			$productDetail->setProductId ( $product->getId () );
			$productDetail->setTitle ( $productTitle );
			$productDetail->setSubTitle ( $productSubTitle );
			$productDetail->setModifyTime ( new \DateTime ( 'now' ) );
			$productDetail->setSketch ( $productSketch );
			$productDetail->setDescription ( $productDescription );
			$entityManager->flush ();
			$oldProductPropertiesArray = self::findProductPropertiesDetailToArray ( $productId );
			$updateProProductPropertiesArray = array ();
			$newProProductPropertiesArray = array ();
			$deleteProProductPropertiesArray = array ();
			foreach ( $productPropertiesArray as $productProperty ) {
				if (isset ( $oldProductPropertiesArray [$productProperty ['propertyId']] )) {
					if (isset ( $productProperty ['propertyValueId'] )) {
						if (isset ( $oldProductPropertiesArray [$productProperty ['propertyId']] [$productProperty ['propertyValueId']] )) {
							array_push ( $updateProProductPropertiesArray, array (
									'id' => $oldProductPropertiesArray [$productProperty ['propertyId']] [$productProperty ['propertyValueId']],
									'productId' => $productId,
									'propertyId' => $productProperty ['propertyId'],
									'propertyValueId' => $productProperty ['propertyValueId'] 
							) );
							unset ( $oldProductPropertiesArray [$productProperty ['propertyId']] [$productProperty ['propertyValueId']] );
						} else {
							array_push ( $newProProductPropertiesArray, array (
									'productId' => $productId,
									'propertyId' => $productProperty ['propertyId'],
									'propertyValueId' => $productProperty ['propertyValueId'] 
							) );
						}
					} else {
						array_push ( $updateProProductPropertiesArray, array (
								'id' => $oldProductPropertiesArray [$productProperty ['propertyId']] ['productPropertiesId'],
								'productId' => $productId,
								'propertyId' => $productProperty ['propertyId'],
								'propertyValue' => $productProperty ['propertyValue'] 
						) );
						unset ( $oldProductPropertiesArray [$productProperty ['propertyId']] );
					}
				} else {
					if (isset ( $productProperty ['propertyValue'] )) {
						array_push ( $newProProductPropertiesArray, array (
								'productId' => $productId,
								'propertyId' => $productProperty ['propertyId'],
								'propertyValue' => $productProperty ['propertyValue'] 
						) );
					}
					if (isset ( $productProperty ['propertyValueId'] )) {
						array_push ( $newProProductPropertiesArray, array (
								'productId' => $productId,
								'propertyId' => $productProperty ['propertyId'],
								'propertyValueId' => $productProperty ['propertyValueId'] 
						) );
					}
				}
			}
			
			foreach ( $oldProductPropertiesArray as $oldProductProperties ) {
				if (isset ( $oldProductProperties ['propertyValue'] )) {
					array_push ( $deleteProProductPropertiesArray, array (
							'propertiesId' => $oldProductProperties ['productPropertiesId'] 
					) );
				} else {
					if (is_array ( $oldProductProperties )) {
						foreach ( $oldProductProperties as $oldProductPropertiesLast ) {
							array_push ( $deleteProProductPropertiesArray, array (
									'propertiesId' => $oldProductPropertiesLast 
							) );
						}
					}
				}
			}
			// return $updateProProductPropertiesArray;
			if (! self::updateProductProperties ( $updateProProductPropertiesArray )) {
				return false;
			}
			if (! self::deleteProductProperties ( $deleteProProductPropertiesArray )) {
				return false;
			}
			if (! self::saveProductProperties ( $productId, $newProProductPropertiesArray )) {
				return false;
			}
			$entityManager->commit ();
			return true;
		} catch ( Exception $e ) {
			$entityManager->rollback ();
		}
		$entityManager->close ();
	}
	public function saveProductProperties($productId, $propuctPropertiesArray, $type = NULL) {
		global $entityManager;
		try {
			foreach ( $propuctPropertiesArray as $productProperty ) {
				$productProperties = new \HShopProductProperties ();
				$productProperties->setProductId ( $productId );
				$productProperties->setCreateTime ( new \DateTime ( 'now' ) );
				$productProperties->setPropertyId ( $productProperty ['propertyId'] );
				if (isset ( $productProperty ['propertyValue'] )) {
					$productProperties->setPropertyValue ( $productProperty ['propertyValue'] );
				}
				if (isset ( $productProperty ['propertyValueId'] )) {
					$productProperties->setPropertyValueId ( $productProperty ['propertyValueId'] );
				}
				$productProperties->setVersion ( new \DateTime ( 'now' ) );
				$entityManager->persist ( $productProperties );
				$entityManager->flush ();
			}
			return true;
		} catch ( Exception $e ) {
			return false;
		}
	}
	public function updateProductProperties($propuctPropertiesArray) {
		global $entityManager;
		try {
			foreach ( $propuctPropertiesArray as $productProperty ) {
				$productProperties = $entityManager->find ( 'HShopProductProperties', $productProperty ['id'] );
				$productProperties->setProductId ( $productProperty ['productId'] );
				$productProperties->setModifyTime ( new \DateTime ( 'now' ) );
				$productProperties->setPropertyId ( $productProperty ['propertyId'] );
				if (isset ( $productProperty ['propertyValue'] )) {
					$productProperties->setPropertyValue ( $productProperty ['propertyValue'] );
				}
				if (isset ( $productProperty ['propertyValueId'] )) {
					$productProperties->setPropertyValueId ( $productProperty ['propertyValueId'] );
				}
				$entityManager->flush ();
			}
			return true;
		} catch ( Exception $e ) {
			return false;
		}
	}
	public function deleteProductProperties($propuctPropertiesArray) {
		global $entityManager;
		try {
			foreach ( $propuctPropertiesArray as $productProperty ) {
				$productProperties = $entityManager->find ( 'HShopProductProperties', $productProperty ['propertiesId'] );
				if (! empty ( $productProperties )) {
					$entityManager->remove ( $productProperties );
					$entityManager->flush ();
				}
			}
			return true;
		} catch ( Exception $e ) {
			return false;
		}
	}
	public function updateProductStatus($productId,$productStatus){
		global $entityManager;
		try {
			$product=$entityManager->find('HShopProduct', $productId);
			$product->setStatus($productStatus);
			if ($productStatus==SystemParameter::$productStatusList) {
				$product->setListTime(new \DateTime('now'));;
			}
			$product->setModifyTime(new \DateTime('now'));
			$entityManager->flush();
			return true;
		} catch (Exception $e) {
			return false;
		}
	}
	public function findAllProductList() {
		global $entityManager;
		$productBaseList = $entityManager->getRepository ( 'HShopProduct' )->findAll ();
		return $productBaseList;
	}
	public function findNumberOfValidProduct(){
		global $entityManager;
		$query = $entityManager->createQuery('SELECT count(hsp) FROM HShopProduct hsp where hsp.status !=:delestatus');
		$query-> setParameter('delestatus', SystemParameter::$productStatusdelete);
		$productNum = $query->getResult() ;
		return $productNum;
	}
	public function findAllProductListWithDetail($startResult=NULL,$resultNum=NULL) {
		global $entityManager;
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
				LEFT JOIN HShopProductDetail hspd Where hsp.id=hspd.productId and hsp.status !=:delestatus
				LEFT JOIN HShopIndustry hsi Where hsi.id=hsp.industryId and hsp.status !=:delestatus
				where  hsp.status !=:delestatus ";
		$query= $entityManager->createQuery ( $dql );
		$query->setFirstResult(empty($startResult)? 1:$startResult);
		$query->setMaxResults(empty($resultNum)? (SystemParameter::$recordOfEveryPage):$resultNum);
		$paginator =new Paginator($query,true);
		$query->setParameter('delestatus', SystemParameter::$productStatusdelete);
		$productBaseList = $query->getArrayResult ();
		return $productBaseList;
	}
	public function findAllProductListWithDetailByCondition($code, $title, $status, $createStart, $createEnd, $type, $listStart, $listEnd,$startResult=NULL,$resultNum=NULL) {
		global $entityManager;
		$queryBuilder = $entityManager->createQueryBuilder ();
		$code = '%' . $code . '%';
		$title = '%' . $title . '%';
		$status = '%' . $status . '%';
		$createStart = \DateTime::createFromFormat ( 'Y-m-d H:i:s', $createStart );
		if (empty ( $createEnd )) {
			$createEnd = new \DateTime ( "now" );
		} else {
			$createEnd = \DateTime::createFromFormat ( 'Y-m-d H:i:s', $createEnd );
		}
		$type = '%' . $type . '%';
		if (empty($listStart)&&empty($listEnd)) {
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
				LEFT JOIN HShopProductDetail hspd Where hsp.id=hspd.productId and hsp.status !=:delestatus
				LEFT JOIN HShopIndustry hsi Where hsi.id=hsp.industryId and hsp.status !=:delestatus
				where  hsp.status !=:delestatus
				and hsp.code like :code
				and hspd.title like :title
				and hsp.status like :status
				and hsp.createTime between :createStart and :createEnd
				and hsp.type like :type";
			$query= $entityManager->createQuery ( $dql );
			$query->setParameter('delestatus', SystemParameter::$productStatusdelete);
			$query->setParameter('code', $code);
			$query->setParameter('title', '%' . $title . '%');
			$query->setParameter('status', $status);
			$query->setParameter('createStart', $createStart);
			$query->setParameter('createEnd', $createEnd);
			$query->setParameter('type', $type);
			$query->setFirstResult(empty($startResult)? 1:$startResult);
			$query->setMaxResults(empty($resultNum)? (SystemParameter::$recordOfEveryPage):$resultNum);
			$paginator =new Paginator($query,true);
			$productBaseList = $query->getArrayResult ();
		}else {
			$listStart = \DateTime::createFromFormat ( 'Y-m-d H:i:s', $listStart );
			if (empty ( $listEnd )) {
				$listEnd = new \DateTime ( "now" );
			} else {
				$listEnd = \DateTime::createFromFormat ( 'Y-m-d H:i:s', $listEnd );
			}
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
				LEFT JOIN HShopProductDetail hspd Where hsp.id=hspd.productId and hsp.status !=:delestatus
				LEFT JOIN HShopIndustry hsi Where hsi.id=hsp.industryId and hsp.status !=:delestatus
				where  hsp.status !=:delestatus
				and hsp.code like :code
				and hspd.title like :title
				and hsp.status like :status
				and hsp.createTime between :createStart and :createEnd
				and hsp.type like :type
				and hsp.listTime between :listStart and :listEnd";
			$query= $entityManager->createQuery ( $dql );
			$query->setParameter('delestatus', SystemParameter::$productStatusdelete);
			$query->setParameter('code', $code);
			$query->setParameter('title', $title);
			$query->setParameter('status', $status);
			$query->setParameter('createStart', $createStart);
			$query->setParameter('createEnd', $createEnd);
			$query->setParameter('type', $type);
			$query->setParameter('listStart', $listStart);
			$query->setParameter('listEnd', $listEnd);
			$query->setFirstResult(empty($startResult)? 1:$startResult);
			$query->setMaxResults(empty($resultNum)? (SystemParameter::$recordOfEveryPage):$resultNum);
			$paginator =new Paginator($query,true);
			$productBaseList = $query->getArrayResult ();
		}
		return $productBaseList;
	}
	public function findProductById($productId) {
		global $entityManager;
		$productBase = $entityManager->find ( 'HShopProduct', $productId );
		return $productBase;
	}
	public function findProductDetailByProductId($productId) {
		global $entityManager;
		$productDetail = $entityManager->getRepository ( 'HShopProductDetail' )->findOneBy ( array (
				'productId' => $productId 
		) );
		return $productDetail;
	}
	
	public function findProductProperties($productId = null) {
		global $entityManager;
		$queryBuilder = $entityManager->createQueryBuilder ();
		$queryBuilder->select ( array ('
				hspp.id,
				hspp.productId,
				hspp.propertyId,
				hspp.propertyValueId,
				hspp.propertyValue,
				hsp.editType' 
		) )
		->from ( 'HShopProductProperties', 'hspp' )
		->leftJoin ( 'HShopProperty', 'hsp', 'WITH', 'hsp.id=hspp.propertyId' )
		->andWhere ( $queryBuilder->expr ()->eq ( 'hspp.productId', '?1' ) )
		->orderBy ( 'hsp.id', 'desc' )->setParameter ( 1, $productId );
		$query = $queryBuilder->getQuery ();
		$result = $query->getArrayResult ();
		return $result;
	}
	public function findProductPropertiesDetailToArray($productId) {
		$results = self::findProductProperties ( $productId );
		$resultToArrays = array ();
		if (! empty ( $results )) {
			foreach ( $results as $result ) {
				if (empty ( $result ['propertyId'] )) {
					return;
				}
				if (empty ( $result ['id'] )) {
					return;
				}
				if (! empty ( $result ['propertyValueId'] )) {
					$resultToArrays [$result ['propertyId']] [$result ['propertyValueId']] = $result ['id'];
				} else {
					$resultToArrays [$result ['propertyId']] = array (
							'propertyValue' => $result ['propertyValue'],
							'productPropertiesId' => $result ['id'] 
					);
				}
			}
		}
		
		return $resultToArrays;
	}
}