<?php

namespace hybase\Controller;

use hybase\Manager\ProductManager;
use hybase\Tools\SystemParameter;
use hybase\Manager\PropertyManager;

require_once __DIR__ . '/../../manager/product/ProductManager.php';
require_once __DIR__ . '/../../manager/operate/PropertyManager.php';
require_once __DIR__ . '/../../manager/tools/SystemParameter.php';
class ProductController {
	public function __construct() {
		// print "In BaseClass constructor\n";
	}
	public function productTypeToString($productType) {
		if ($productType == SystemParameter::$productTypeSale) {
			return $productType = '卖品';
		}
		if ($productType == SystemParameter::$productTypeUnSale) {
			return $productType = '非卖品';
		}
		return '非定义商品';
	}
	public function productStatusToString($productStatus) {
		if ($productStatus == SystemParameter::$productStatusIni) {
			return $productStatus = '未上架';
		}
		if ($productStatus == SystemParameter::$productStatusList) {
			return $productStatus = '已上架';
		}
		if ($productStatus == SystemParameter::$productStatusOut) {
			return $productStatus = '已下架';
		}
		return '非定义状态';
	}
	public function operProductStatus($productStatus) {
		if ($productStatus == SystemParameter::$productStatusIni || $productStatus == SystemParameter::$productStatusOut) {
			return $productStatus = SystemParameter::$productStatusList;
		}
		if ($productStatus == SystemParameter::$productStatusList) {
			return $productStatus =  SystemParameter::$productStatusOut;
		}
		return '非定义状态';
	}
	public function getValidProductNum(){
		$productManager = new ProductManager ();
		$result=$productManager->findNumberOfValidProduct();
		return $result;
	}
	
	public function operProductStatusToString($productStatus) {
		if ($productStatus == SystemParameter::$productStatusIni || $productStatus == SystemParameter::$productStatusOut) {
			return $productStatus = '上架';
		}
		if ($productStatus == SystemParameter::$productStatusList) {
			return $productStatus = '下架';
		}
		return '非定义状态';
	}
	public function saveNewProduct($productCode, $productTitle, $productSubTitle, $productPropertiesArray, $productSketch, $productDescription,$productType) {
		$productManager = new ProductManager ();
		if (empty($productCode)) {
			return '产品编码不能为空！';
		}
		if (empty($productTitle)) {
			return '产品标题不能为空';
		}
		$result = $productManager->saveProduct ( $productCode, $productTitle, $productSubTitle, $productPropertiesArray, $productSketch, $productDescription,$productType );
		return $result;
	}
	public function updateProduct($productId, $productCode, $productTitle, $productSubTitle, $productPropertiesArray, $productSketch, $productDescription, $productType){
		$productManager = new ProductManager ();
		if (empty($productCode)) {
			return '产品编码不能为空！';
		}
		if (empty($productTitle)) {
			return '产品标题不能为空';
		}
		$result = $productManager->updateProduct($productId, $productCode, $productTitle, $productSubTitle, $productPropertiesArray, $productSketch, $productDescription, $productType);
		return $result;
	}
	public function changeProductStatus($productId, $productStatus){
		if (empty($productId)) {
			return '数据异常';
		}
		$productManager = new ProductManager ();
		$result=$productManager->updateProductStatus($productId, $productStatus);
		return $result;
	}
	
	public function getAllPorductList() {
		$productManager = new ProductManager ();
		$productList = $productManager->findAllProductList ();
		return $productList;
	}
	public function getAllProductListWithDetail($startResult=NULL,$resultNum=NULL) {
		$productManager = new ProductManager ();
		$productListWithDetail = $productManager->findAllProductListWithDetail ($startResult,$resultNum);
		return $productListWithDetail;
	}
	public function getProductById($productId){
		$productManager = new ProductManager ();
		$product = $productManager->findProductById($productId);
		return $product;
	}
	public function getProductDetailByProductId($productId){
		$productManager = new ProductManager ();
		$productDetail = $productManager->findProductDetailByProductId($productId);
		return $productDetail;
	}
	public function getAllProductListWithDetailByCondition($code, $title, $status, $createStart, $createEnd, $type, $listStart, $listEnd,$startResult=NULL,$resultNum=NULL) {
		$productManager = new ProductManager ();
		$productListWithDetail = $productManager->findAllProductListWithDetailByCondition ( $code, $title, $status, $createStart, $createEnd, $type, $listStart, $listEnd,$startResult,$resultNum );
		return $productListWithDetail;
	}
	
	public function getPropertyWithValue($productId = NULL) {
		$productManager = new ProductManager ();
		$propertyManager = new PropertyManager();
		$propertiesLists = $propertyManager->findPropertyListWithValue ();
		$productPropertiesToArrays = $productManager->findProductPropertiesDetailToArray( $productId );
		$propertyValueToHtml =null;
		$i=1;
		foreach ( $propertiesLists as $propertiesList ) {
			if ($propertiesList ['editType'] == SystemParameter::$editTypeWithCheckbox&&$propertiesList['status']==SystemParameter::$enableStatus) {
				if (! isset ( $propertyValueToHtml [$propertiesList ['id']] ['title'] ) || empty ( $propertyValueToHtml [$propertiesList ['id']] ['title'] )) {
					$propertyValueToHtml [$propertiesList ['id']] ['title'] = '<label><span>' . $propertiesList ['name'] . '</span></label>';
				}
				if (empty ( $propertyValueToHtml [$propertiesList ['id']] ['body'] ) ||! isset ( $propertyValueToHtml [$propertiesList ['id']] ['body'] )) {
					$propertyValueToHtml [$propertiesList ['id']] ['body'] = ('<div class="ele-block"><input class="np" type="checkbox" ' . (! empty ( $productPropertiesToArrays [$propertiesList ['id']] [$propertiesList ['propertyValueId']] ) ? 'checked="checked"' : '') . 'name="property[' . $propertiesList ['id'] . ']['.$propertiesList ['propertyValueId'].']" id="flagsp" value="' . $propertiesList ['propertyValueId'] . '">');
					$propertyValueToHtml [$propertiesList ['id']] ['body'] = ($propertyValueToHtml [$propertiesList ['id']] ['body'] . '<span style="display: inline-block;position:relative;">' . $propertiesList ['value'] . '</span></div>');
				} else {
					$propertyValueToHtml [$propertiesList ['id']] ['body'] = ($propertyValueToHtml [$propertiesList ['id']] ['body'] . '<div class="ele-block"><input class="np" type="checkbox" ' . (! empty ( $productPropertiesToArrays [$propertiesList ['id']] [$propertiesList ['propertyValueId']] ) ? 'checked="checked"' : '') . 'name="property[' . $propertiesList ['id'] . ']['.$propertiesList ['propertyValueId'].']" id="flagsp" value="' . $propertiesList ['propertyValueId'] . '">');
					$propertyValueToHtml [$propertiesList ['id']] ['body'] = ($propertyValueToHtml [$propertiesList ['id']] ['body'] . '<span style="display: inline-block;position:relative;">' . $propertiesList ['value'] . '</span></div>');
				}
			}
			if ($propertiesList ['editType'] == SystemParameter::$editTypeWithRadio&&$propertiesList['status']==SystemParameter::$enableStatus) {
				if (! isset ( $propertyValueToHtml [$propertiesList ['id']] ['title'] ) || empty ( $propertyValueToHtml [$propertiesList ['id']]  ['title'])) {
					$propertyValueToHtml [$propertiesList ['id']] ['title'] = '<label><span>' . $propertiesList ['name'] . '</span></label>';
				}
				if (empty ( $propertyValueToHtml [$propertiesList ['id']] ['body'] ) || ! isset ( $propertyValueToHtml [$propertiesList ['id']] ['body'] )) {
					$propertyValueToHtml [$propertiesList ['id']] ['body'] = ('<div class="ele-block"><input class="np" type="radio" ' . (!empty ( $productPropertiesToArrays [$propertiesList ['id']] [$propertiesList ['propertyValueId']] ) ? 'checked="checked"' : '') . 'name="property[' . $propertiesList ['id'] . ']['.$propertiesList ['propertyValueId'].']" id="flagsp" value="' . $propertiesList ['propertyValueId'] . '">');
					$propertyValueToHtml [$propertiesList ['id']] ['body'] = ($propertyValueToHtml [$propertiesList ['id']] ['body'] . '<span style="display: inline-block;position:relative;">' . $propertiesList ['value'] . '</span></div>');
				} else {
					$propertyValueToHtml [$propertiesList ['id']] ['body'] = ($propertyValueToHtml [$propertiesList ['id']] ['body'] .'<div class="ele-block"><input class="np" type="radio" ' . (!empty ( $productPropertiesToArrays [$propertiesList ['id']] [$propertiesList ['propertyValueId']] ) ? 'checked="checked"' : '') . 'name="property[' . $propertiesList ['id'] . ']['.$propertiesList ['propertyValueId'].']" id="flagsp" value="' . $propertiesList ['propertyValueId'] . '">');
					$propertyValueToHtml [$propertiesList ['id']] ['body'] = ($propertyValueToHtml [$propertiesList ['id']] ['body'] . '<span style="display: inline-block;position:relative;">' . $propertiesList ['value'] . '</span></div>');
					// $propertyValueToHtml [$propertiesList ['id']] = ($propertyValueToHtml [$propertiesList ['id']] . '</td>');
				}
			}
			if ($propertiesList ['editType'] == SystemParameter::$editTypeWithSelect&&$propertiesList['status']==SystemParameter::$enableStatus) {
				;
			}
			if ($propertiesList ['editType'] == SystemParameter::$editTypeWithInputtext&&$propertiesList['status']==SystemParameter::$enableStatus) {
				if (! isset ( $propertyValueToHtml [$propertiesList ['id']] ) || empty ( $propertyValueToHtml [$propertiesList ['id']] )) {
					$propertyValueToHtml [$propertiesList ['id']] ['title'] = '<label><span>' . $propertiesList ['name'] . '</span></label>';
				}
				if (empty ( $propertyValueToHtml [$propertiesList ['id']] ['body'] ) || ! isset ( $propertyValueToHtml [$propertiesList ['id']] ['body'] )) {
					$propertyValueToHtml [$propertiesList ['id']] ['body'] = ('<div class="ele-block"><input class="table-input" type="text" colspan="5" name="property[' . $propertiesList ['id'] . ']" id="flagsp" value="' . (empty ( $productPropertiesToArrays [$propertiesList ['id']]['propertyValue'] ) ? '' : $productPropertiesToArrays [$propertiesList ['id']]['propertyValue']) . '">');
				} else {
					$propertyValueToHtml [$propertiesList ['id']] ['body'] = ($propertyValueToHtml [$propertiesList ['id']] ['body'] . '<input class="table-input" type="text" colspan="5" name="' . $propertiesList ['groupCode'] . '" id="flagsp" value="' . (empty ( $productPropertiesToArrays [$propertiesList ['id']]['propertyValue'] ) ? '' : $productPropertiesToArrays [$propertiesList ['id']]['propertyValue']) . '"></div>');
					// $propertyValueToHtml [$propertiesList ['id']] = ($propertyValueToHtml [$propertiesList ['id']] . '</td>');
				}
			}
		}
		//return $propertiesLists;
		return $propertyValueToHtml;
	}
	public function getPropertyTypeList() {
		$propertyManager = new PropertyManager();
		$results = $propertyManager->findAllEnableProperty();
		return $results;
	}
}