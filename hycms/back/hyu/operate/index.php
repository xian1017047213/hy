<?php
if (isset($_GET['pageType'])) {
	if ($_GET['pageType']=='propertyedit') {
	include_once 'property/propertyDetail.php';
	}
	if ($_GET['pageType']=='propertyvalue') {
		include_once 'property/propertyValueDetail.php';
	}
	if ($_GET['pageType']=='propertyservice') {
		include_once 'operateService.php';
	}
}
if (isset($_POST['pageType'])) {
	if ($_POST['pageType']=='propertyservice') {
		include_once 'operateService.php';
	}
}
if (!isset($_POST['pageType'])&&!isset($_GET['pageType'])) {
	include_once 'property/propertyListPage.php';
}