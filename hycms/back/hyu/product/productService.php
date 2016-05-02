<?php
use hybase\Controller\ProductController;
use hybase\Tools\SystemParameter;

require_once __DIR__ . "/../../../src/controller/product/ProductController.php";
include_once __DIR__.'/../commons/commonspages.php';
include_once __DIR__ . '/../member/loginveri.php';

$productController = new ProductController ();
if (isset ( $_POST ['operType'] )) {
	if ($_POST ['operType'] == 'newproduct') {
		$productCode = ((! isset ( $_POST ['productCode'] ) || empty ( $_POST ['productCode'] )) ? null : $_POST ['productCode']);
		$productTitle = ((! isset ( $_POST ['productTitle'] ) || empty ( $_POST ['productTitle'] )) ? null : $_POST ['productTitle']);
		$productSubTitle = ((! isset ( $_POST ['productSubTitle'] ) || empty ( $_POST ['productSubTitle'] )) ? null : $_POST ['productSubTitle']);
		$productPropertiesFromrequest= ((! isset ( $_POST ['property'] ) || empty ( $_POST ['property'] )) ? null : $_POST ['property']);
		$productType = ((! isset ( $_POST ['productType'] ) || empty ( $_POST ['productType'] )) ? null : $_POST ['productType']);
		$productSketch = ((! isset ( $_POST ['productSketch'] ) || empty ( $_POST ['productSketch'] )) ? null : $_POST ['productSketch']);
		$productDescription = ((! isset ( $_POST ['productDesc'] ) || empty ( $_POST ['productDesc'] )) ? null : $_POST ['productDesc']);
		$propertyTypeList = $productController->getPropertyTypeList ();
		$productPropertiesArray =array();
		if (! empty ( $propertyTypeList )) {
			foreach ( $propertyTypeList as $property ) {
				$productProperties = array ();
				$id = $property->getId ();
				if (isset ( $productPropertiesFromrequest [$id] )) {
					if (is_array ( $productPropertiesFromrequest [$id] )) {
						foreach ( $productPropertiesFromrequest [$id] as $productPropertyValue ) {
							if ($property->getEditType () == 4) {
								$productProperties = array (
										'propertyId' => $id,
										'propertyValue' => $productPropertyValue 
								);
							} else {
								$productProperties = array (
										'propertyId' => $id,
										'propertyValueId' => $productPropertyValue 
								);
							}
							array_push ( $productPropertiesArray, $productProperties );
						}
					} else {
						
						if ($property->getEditType () == 4) {
							$productProperties = array (
									'propertyId' => $id,
									'propertyValue' => $productPropertiesFromrequest [$id] 
							);
						} else {
							$productProperties = array (
									'propertyId' => $id,
									'propertyValueId' => $productPropertiesFromrequest [$id] 
							);
						}
						array_push ( $productPropertiesArray, $productProperties );
					}
				}
			}
		}
		$saveResult=$productController->saveNewProduct($productCode, $productTitle, $productSubTitle, $productPropertiesArray, $productSketch, $productDescription,$productType);
		if ($saveResult===true) {
			echo json_encode ( array (
					'status' => 'success',
					'url' => null,
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
	if ($_POST ['operType'] == 'updateproduct') {
		$productId= ((! isset ( $_POST ['productId'] ) || empty ( $_POST ['productId'] )) ? null : $_POST ['productId']);
		$productCode = ((! isset ( $_POST ['productCode'] ) || empty ( $_POST ['productCode'] )) ? null : $_POST ['productCode']);
		$productTitle = ((! isset ( $_POST ['productTitle'] ) || empty ( $_POST ['productTitle'] )) ? null : $_POST ['productTitle']);
		$productSubTitle = ((! isset ( $_POST ['productSubTitle'] ) || empty ( $_POST ['productSubTitle'] )) ? null : $_POST ['productSubTitle']);
		$productPropertiesFromrequest= ((! isset ( $_POST ['property'] ) || empty ( $_POST ['property'] )) ? null : $_POST ['property']);
		$productType = ((! isset ( $_POST ['productType'] ) || empty ( $_POST ['productType'] )) ? null : $_POST ['productType']);
		$productSketch = ((! isset ( $_POST ['productSketch'] ) || empty ( $_POST ['productSketch'] )) ? null : $_POST ['productSketch']);
		$productDescription = ((! isset ( $_POST ['productDesc'] ) || empty ( $_POST ['productDesc'] )) ? null : $_POST ['productDesc']);
		$propertyTypeList = $productController->getPropertyTypeList ();
		$productPropertiesArray =array();
		if (! empty ( $propertyTypeList )) {
			foreach ( $propertyTypeList as $property ) {
				$productProperties = array ();
				$id = $property->getId ();
				if (isset ( $productPropertiesFromrequest [$id] )) {
					if (is_array ( $productPropertiesFromrequest [$id] )) {
						foreach ( $productPropertiesFromrequest [$id] as $productPropertyValue ) {
							if ($property->getEditType () == 4) {
								$productProperties = array (
										'propertyId' => $id,
										'propertyValue' => $productPropertyValue
								);
							} else {
								$productProperties = array (
										'propertyId' => $id,
										'propertyValueId' => $productPropertyValue
								);
							}
							array_push ( $productPropertiesArray, $productProperties );
						}
					} else {
	
						if ($property->getEditType () == 4) {
							$productProperties = array (
									'propertyId' => $id,
									'propertyValue' => $productPropertiesFromrequest [$id]
							);
						} else {
							$productProperties = array (
									'propertyId' => $id,
									'propertyValueId' => $productPropertiesFromrequest [$id]
							);
						}
						array_push ( $productPropertiesArray, $productProperties );
					}
				}
			}
		}
		$saveResult=$productController->updateProduct($productId,$productCode, $productTitle, $productSubTitle, $productPropertiesArray, $productSketch, $productDescription,$productType);
		if ($saveResult===true) {
			echo json_encode ( array (
					'status' => 'success',
					'url' => null,
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
	
}
if (isset ( $_GET ['operType'] )) {
	if ($_GET ['operType'] == SystemParameter::$productStatusList || $_GET ['operType'] == SystemParameter::$productStatusOut || $_GET ['operType'] == SystemParameter::$productStatusdelete) {
		$saveResult = $productController->changeProductStatus ( $_GET ['productId'], $_GET ['operType'] );
	}
	if ($saveResult===true) {
		header('location:'.$pagebase.'hyu/product/');
	} else {
		
	}
		exit();
}
?>