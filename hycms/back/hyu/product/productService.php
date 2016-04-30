<?php
use hybase\Controller\ProductController;

require_once __DIR__ . "/../../../src/controller/product/ProductController.php";
include_once __DIR__ . '/../member/loginveri.php';

$productController = new ProductController ();
if (isset ( $_POST ['operType'] )) {
	if ($_POST ['operType'] == 'newproduct') {
		$productCode = ((! isset ( $_POST ['productCode'] ) || empty ( $_POST ['productCode'] )) ? null : $_POST ['productCode']);
		$productTitle = ((! isset ( $_POST ['productTitle'] ) || empty ( $_POST ['productTitle'] )) ? null : $_POST ['productTitle']);
		$productSubTitle = ((! isset ( $_POST ['productSubTitle'] ) || empty ( $_POST ['productSubTitle'] )) ? null : $_POST ['productSubTitle']);
		$propertyTypeList = $productController->getPropertyTypeList ();
		$productPropertiesArray = [ ];
		foreach ( $propertyTypeList as $propertyType ) {
			$_POST [$propertyType->getGroupCode ()];
			if (isset ( $_POST [$propertyType->getGroupCode ()] )&&!empty( $_POST [$propertyType->getGroupCode ()])) {
				$productPropertiesArray [$propertyType->getId ()]=$_POST [$propertyType->getGroupCode ()];
			}
		}
		$productSketch = '';
		$productDescription = '';
		$productController->saveNewProduct();
	}
}
?>