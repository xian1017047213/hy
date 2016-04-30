<?php
namespace hybase\Controller;

use hybase\Manager\PropertyManager;
use hybase\Tools\SystemParameter;

require_once  __DIR__ .'/../../manager/operate/PropertyManager.php';
require_once __DIR__ .'/../../manager/tools/SystemParameter.php';

class PropertyController{
	
	public function __construct() {
		//print "In BaseClass constructor\n";
	}
	public function propertyStatusToString($productType) {
		if ($productType == SystemParameter::$enableStatus) {
			return $productType='启用';
		}
		if ($productType == SystemParameter::$disableStatus) {
			return $productType='禁用';
		}
		return '未定义';
	}
	
	public function operPropertyStatusToString($productType) {
		if ($productType == SystemParameter::$enableStatus) {
			return '禁用';
		}
		if ($productType == SystemParameter::$disableStatus) {
			return  '启用';
		}
		return '未定义';
	}
	
	public function operPropertyStatus($productType) {
		if ($productType == SystemParameter::$enableStatus) {
			return SystemParameter::$disableStatus;
		}
		if ($productType == SystemParameter::$disableStatus) {
			return  SystemParameter::$enableStatus;
		}
		return '未定义';
	}
	public function saveNewProperty($propertyGroupCode,$propertyName,$propertyEditType,$propertyValueType,$propertyRequired){
		$propretyManager= new PropertyManager();
		if (empty($propertyGroupCode)) {
			return '属性编码不能为空';
		}
		if (empty($propertyName)) {
			return '属性名称不能为空';
		}
		$results=$propretyManager->saveProperty($propertyGroupCode, $propertyName, $propertyEditType, $propertyValueType, $propertyRequired);
		return $results;
	}
	public function updatePropertyType($propertyId, $propertyGroupCode, $propertyName, $propertyEditType, $propertyValueType, $propertyRequired) {
		$propretyManager = new PropertyManager ();
		if (empty ( $propertyGroupCode )) {
			return '属性编码不能为空';
		}
		if (empty ( $propertyName )) {
			return '属性名称不能为空';
		}
		$results = $propretyManager->updateProperty ( $propertyId, $propertyGroupCode, $propertyName, $propertyEditType, $propertyValueType, $propertyRequired);
		return $results;
		
	}
	public function getPropertyDetail($propertyId=NULL){
		$propretyManager= new PropertyManager();
		$results=$propretyManager->findPrpertyDetailById($propertyId);
		return $results;
	}
	public function getPropertyTypeList($propertyId=null, $propertyGroupCode=null, $propertyName=null, $propertyStatus=null){
		$propretyManager= new PropertyManager();
		$propretyList=$propretyManager->findAllPrpertyTypeList($propertyId, $propertyGroupCode, $propertyName, $propertyStatus);
		return $propretyList;
	}
}