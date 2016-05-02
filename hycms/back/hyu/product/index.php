<?php
if (isset ( $_GET ['pageType'] )) {
	if ($_GET ['pageType'] == 'productdetail') {
		include_once 'productDetailPage.php';
	}
	if ($_GET ['pageType'] == 'productService') {
		include_once 'productService.php';
	}
}
if (! isset ( $_POST ['pageType'] ) && ! isset ( $_GET ['pageType'] )) {
	include_once 'productListPage.php';
}
if (isset ( $_POST ['pageType'] )) {
	if ($_POST ['pageType'] == 'productService') {
		include_once 'productService.php';
	}
}
?>