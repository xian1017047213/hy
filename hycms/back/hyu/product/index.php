<?php 

if (isset($_GET['pageType'])) {
	if ($_GET['pageType']=='productdetail') {
	include_once 'productDetailPage.php';
	}
}
if (!isset($_POST['pageType'])&&!isset($_GET['pageType'])) {
	include_once 'productListPage.php';
}
?>