<?php 
if (!isset($_POST['pageType'])&&!isset($_GET['pageType'])) {
	include_once 'loginPage.php';
}
if (isset($_POST['pageType'])) {
	include_once 'login.php';
}
?>