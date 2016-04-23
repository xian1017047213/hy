<?php
use hybase\Controller\ProductController;

require_once __DIR__ . "/../../../src/controller/product/ProductController.php";
include_once __DIR__ . '/../member/loginveri.php';
if (isset ( $_GET ['pageType'] )) {
	if ($_GET ['pageType'] == 'productdetail') {
		include_once 'productdetail.php';
	}
	if ($_GET ['pageType'] == 'productlist') {
		header('location:'.$pagebase.'hyu/product/');
		exit ();
	}
	if ($_GET ['pageType'] == 'productdelete') {
		header('location:'.$pagebase.'hyu/product/');
		exit ();
	}
}
?>