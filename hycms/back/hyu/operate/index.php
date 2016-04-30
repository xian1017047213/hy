<?php
if (isset($_GET['pageType'])) {
	if ($_GET['pageType']=='propertyedit') {
	include_once 'propertyDetail.php';
	}
}
if (isset($_POST['pageType'])) {
	if ($_POST['pageType']=='propertyservice') {
		include_once 'propertyService.php';
	}
}
if (!isset($_POST['pageType'])&&!isset($_GET['pageType'])) {
	include_once 'propertyListPage.php';
}