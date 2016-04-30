<?php
namespace hybase\Controller;

use hybase\Manager\ProductManager;

require_once  __DIR__ .'/../../manager/product/ProductManager.php';

class ProductController{
	/*
	 * 卖品
	 */
	public static $productTypeSale = 1;
	/*
	 * 非卖品
	 */
	public static $productTypeUnSale = 2;
	
	/*
	 * 未上架商品
	 */
	public static $productStatusIni = 1;
	/*
	 * 已上架商品
	 */
	public static $productStatusList = 2;
	/*
	 * 已下架商品
	 */
	public static $productStatusOut = 3;
	
	/*
	 * 多选按钮
	 */
	public static $editTypeWithCheckbox=1;
	/*
	 * 单选按钮
	 */
	public static $editTypeWithRadio=2;
	/*
	 * 下拉框
	 */
	public static $editTypeWithSelect=3;
	/*
	 * 输入文本框
	 */
	public static $editTypeWithInputtext=4;
	
	public function __construct() {
		//print "In BaseClass constructor\n";
	}
	public function productTypeToString($productType) {
		if ($productType == self::$productTypeSale) {
			return $productType='卖品';
		}
		if ($productType == self::$productTypeUnSale) {
			return $productType='非卖品';
		}
		return '非定义商品';
	}
	public function productStatusToString($productStatus) {
		if ($productStatus == self::$productStatusIni) {
			return $productStatus='未上架';
		}
		if ($productStatus == self::$productStatusList) {
			return $productStatus='已上架';
		}
		if ($productStatus == self::$productStatusOut) {
			return $productStatus='已下架';
		}
		return '非定义状态';
	}
	public function saveNewProduct($productCode,$productTitle,$prodiuctSubTitle,$productPropertiesArray,$productSketch,$propuctDescription){
		$productManager= new ProductManager();
		if ($productCode) {
			return '产品编码不能为空！';
		}
		if (condition) {
			return '产品标题不能为空' ;
		}
		$result=$productManager->saveProduct($productCode,$productTitle,$prodiuctSubTitle,$productPropertiesArray,$productSketch,$propuctDescription);
		return $productList;
		
	}
	public function getAllPorductList(){
		$productManager= new ProductManager();
		$productList=$productManager->findAllProductList();
		return $productList;
	}
	public function getAllProductListWithDetail(){
		$productManager= new ProductManager();
		$productListWithDetail=$productManager->findAllProductListWithDetail();
		return $productListWithDetail;
	}
	public function getAllProductListWithDetailByCondition($code, $title, $status, $createStart, $createEnd, $type, $listStart, $listEnd){
		$productManager= new ProductManager();
		$productListWithDetail=$productManager->findAllProductListWithDetailByCondition($code, $title, $status, $createStart, $createEnd, $type, $listStart, $listEnd);
		return $productListWithDetail;
	}
	public function operProductStatusToString($productStatus){
		if ($productStatus == self::$productStatusIni||$productStatus == self::$productStatusOut) {
			return $productStatus='上架';
		}
		if ($productStatus == self::$productStatusList) {
			return $productStatus='下架';
		}
		return '非定义状态';
	}
	public function getPropertyWithValue($productId = NULL) {
		$productManager = new ProductManager ();
		$propertiesLists = $productManager->findPropertyListWithValue ();
		$productPropertiesToArrays = self::getProductPropertiesDetail ( $productId );
		$propertyValueToHtml = array ();
		foreach ( $propertiesLists as $propertiesList ) {
			if ($propertiesList ['editType'] == self::$editTypeWithCheckbox) {
				if (! isset ( $propertyValueToHtml [$propertiesList ['id']] ) || empty ( $propertyValueToHtml [$propertiesList ['id']] )) {
					$propertyValueToHtml [$propertiesList ['id']]['title'] = '<label><span>' . $propertiesList ['name'] . '</span></label>';
				}else{
					if (empty($propertyValueToHtml [$propertiesList ['id']]['body'])||!isset($propertyValueToHtml [$propertiesList ['id']]['body'])) {
						$propertyValueToHtml [$propertiesList ['id']]['body'] = ( '<div class="ele-block"><input class="np" type="checkbox" ' . (empty ( $productPropertiesToArrays [$propertiesList ['id']] [$propertiesList ['propertyValueId']] ) ? 'checked="checked"' : '') . 'name="' . $propertiesList ['groupCode'] . '" id="flagsp" value="' . $propertiesList ['propertyValueId'] . '">');
						$propertyValueToHtml [$propertiesList ['id']]['body'] = ($propertyValueToHtml [$propertiesList ['id']]['body']. '<span style="display: inline-block;position:relative;">' . $propertiesList ['value'] . '</span></div>');
					}else {
				$propertyValueToHtml [$propertiesList ['id']]['body'] = ($propertyValueToHtml [$propertiesList ['id']]['body'] . '<div class="ele-block"><input class="np" type="checkbox" ' . (empty ( $productPropertiesToArrays [$propertiesList ['id']] [$propertiesList ['propertyValueId']] ) ? 'checked="checked"' : '') . 'name="' . $propertiesList ['groupCode'] . '" id="flagsp" value="' . $propertiesList ['propertyValueId'] . '">');
				$propertyValueToHtml [$propertiesList ['id']]['body'] = ($propertyValueToHtml [$propertiesList ['id']]['body']. '<span style="display: inline-block;position:relative;">' . $propertiesList ['value'] . '</span></div>');
				//$propertyValueToHtml [$propertiesList ['id']] = ($propertyValueToHtml [$propertiesList ['id']] . '</td>');
					}
				}
			}
			if ($propertiesList ['editType'] == self::$editTypeWithRadio) {
				if (! isset ( $propertyValueToHtml [$propertiesList ['id']] ) || empty ( $propertyValueToHtml [$propertiesList ['id']] )) {
					$propertyValueToHtml [$propertiesList ['id']]['title'] = '<label><span>' . $propertiesList ['name'] . '</span></label>';
				}
				if (empty($propertyValueToHtml [$propertiesList ['id']]['body'])||!isset($propertyValueToHtml [$propertiesList ['id']]['body'])) {
					$propertyValueToHtml [$propertiesList ['id']]['body'] = ('<div class="ele-block"><input class="np" type="radio" ' . (empty ( $productPropertiesToArrays [$propertiesList ['id']] [$propertiesList ['propertyValueId']] ) ? 'checked="checked"' : '') . 'name="' . $propertiesList ['groupCode'] . '" id="flagsp" value="' . $propertiesList ['propertyValueId'] . '">');
					$propertyValueToHtml [$propertiesList ['id']]['body'] = ($propertyValueToHtml [$propertiesList ['id']]['body'] . '<span style="display: inline-block;position:relative;">' . $propertiesList ['value'] . '</span></div>');
				}else{
				$propertyValueToHtml [$propertiesList ['id']]['body'] = ($propertyValueToHtml [$propertiesList ['id']]['body'] . '<div class="ele-block"><input class="np" type="radio" ' . (empty ( $productPropertiesToArrays [$propertiesList ['id']] [$propertiesList ['propertyValueId']] ) ? 'checked="checked"' : '') . 'name="' . $propertiesList ['groupCode'] . '" id="flagsp" value="' . $propertiesList ['propertyValueId'] . '">');
				$propertyValueToHtml [$propertiesList ['id']]['body'] = ($propertyValueToHtml [$propertiesList ['id']]['body'] . '<span style="display: inline-block;position:relative;">' . $propertiesList ['value'] . '</span></div>');
				//$propertyValueToHtml [$propertiesList ['id']] = ($propertyValueToHtml [$propertiesList ['id']] . '</td>');
				}
			}
			if ($propertiesList ['editType'] == self::$editTypeWithSelect) {
				;
			}
			if ($propertiesList ['editType'] == self::$editTypeWithInputtext) {
				if (! isset ( $propertyValueToHtml [$propertiesList ['id']] ) || empty ( $propertyValueToHtml [$propertiesList ['id']] )) {
					$propertyValueToHtml [$propertiesList ['id']]['title'] = '<label><span>' . $propertiesList ['name'] . '</span></label>';
				}
				if (empty($propertyValueToHtml [$propertiesList ['id']]['body'])||!isset($propertyValueToHtml [$propertiesList ['id']]['body'])) {
					$propertyValueToHtml [$propertiesList ['id']]['body'] = ('<div class="ele-block"><input class="table-input" type="text" colspan="5" name="' . $propertiesList ['groupCode'] . '" id="flagsp" value="' . (empty($productPropertiesToArrays [$propertiesList ['id']]) ? '':$productPropertiesToArrays [$propertiesList ['id']]) . '">');
				}else {
				$propertyValueToHtml [$propertiesList ['id']]['body'] = ($propertyValueToHtml [$propertiesList ['id']]['body'] . '<input class="table-input" type="text" colspan="5" name="' . $propertiesList ['groupCode'] . '" id="flagsp" value="' . (empty($productPropertiesToArrays [$propertiesList ['id']]) ? '':$productPropertiesToArrays [$propertiesList ['id']]) . '"></div>');
				//$propertyValueToHtml [$propertiesList ['id']] = ($propertyValueToHtml [$propertiesList ['id']] . '</td>');
				}
			}
		}
		// return $propertiesLists;
		return $propertyValueToHtml;
	}
	public function getProductPropertiesDetail($productId=NULL){
		$productManager=new ProductManager();
		$results=$productManager->findProductProperties($productId);
		$resultToArrays=array();
		if (!empty($results)) {
			foreach ($results as $result){
				if (empty($result['propertyId'])) {
					return ;
				}
				if (empty($result['id'])) {
					return ;
				}
				if (!empty($result['propertyValueId'])) {
					$resultToArrays[$result['propertyId']][$result['propertyValueId']]=$result['productId'];
				}else {
					$resultToArrays[$result['propertyId']]=$result['propertyValue'];
				}
			}
		}
		
		return $resultToArrays;
	}
	public function getPropertyTypeList(){
		$productManager=new ProductManager();
		$results=$productManager->findAllProductTypeList();
		return $results;
	}
}