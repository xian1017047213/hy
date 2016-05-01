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
		$saveResult = $propertyController->updateProperty ( $_POST ['propertyId'], $_POST ['propertyCode'], $_POST ['propertyName'], $_POST ['propertyEditType'], $_POST ['propertyValueType'], $_POST ['propertyRequired'] );
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
	if ($postDataType == 'upadtepropertyvalue') {
		$propertyValueIdLIst = $_POST ['propertyValueId'];
		$propertyValueSeqLIst = $_POST ['propertyValueSequence'];
		$propertyValueLIst = $_POST ['properyValue'];
		$i = 0;
		$propertyValueArray = array ();
		for($i = 0; $i < sizeof ( $propertyValueIdLIst ); $i ++) {
			if (empty ( $propertyValueLIst [$i] )) {
				$saveResult = '属性值不能为空';
			}
			$propertyArray = array (
					'id' => $propertyValueIdLIst [$i],
					'sequence' => $propertyValueSeqLIst [$i],
					'value' => $propertyValueLIst [$i] 
			);
			array_push ( $propertyValueArray, $propertyArray );
		}
		if (!isset ( $saveResult )||empty($saveResult) ) {
			$saveResult = $propertyController->savePropertyValue ( $_POST ['propertyId'], $propertyValueArray );
		}
		if ($saveResult===true) {
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
if (isset ( $_GET ['operProperty'] )) {
	$postDataType = $_GET ["operProperty"];
	if ($postDataType == 'operPropertyStatus') {
		$saveResult = $propertyController->updatePropertyStatus($_GET ['propertyId'], $_GET ['operStatus']);
		if ($saveResult === true) {
			header('location:'.$pagebase.'hyu/operate/');
			exit ();
		} else {
			
		}
	}
}
