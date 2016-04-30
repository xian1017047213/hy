<?php
use hybase\Controller\PropertyController;

require_once __DIR__ . "/../../../src/controller/operate/PropertyController.php";
include_once __DIR__ . '/../member/loginveri.php';
include_once __DIR__ . '/../commons/commonparam.php';
$propertyController = new PropertyController ();
header ( "Content-Type: text/html; charset=UTF-8" );
if (isset ( $_POST ['operProperty'] )) {
	$postDataType = $_POST ["operProperty"];
	if ($postDataType == 'newproperty') {
		$saveResult = $propertyController->saveNewProperty ( $_POST ['propertyCode'], $_POST ['propertyName'], $_POST ['propertyEditType'], $_POST ['propertyValueType'], $_POST ['propertyRequired'] );
		if ($saveResult === true) {
			$url = $pagebase . "hyu/operate/";
			echo json_encode ( array (
					'status' => 'success',
					'url' => $url,
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
if ($postDataType == 'updateproperty') {
		$saveResult = $propertyController->updatePropertyType ( $_POST ['propertyId'],$_POST ['propertyCode'], $_POST ['propertyName'], $_POST ['propertyEditType'], $_POST ['propertyValueType'], $_POST ['propertyRequired'] );
		if ($saveResult === true) {
			$url = $pagebase . "hyu/operate/";
			echo json_encode ( array (
					'status' => 'success',
					'url' => $url,
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

