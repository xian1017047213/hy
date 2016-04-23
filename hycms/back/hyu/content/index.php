<?php 
if (isset($_POST['pageType'])) {
	if ($_POST['pageType']=='archiveservice') {
		include_once 'archiveService.php';
	}
	echo $_POST['pageType'];
}
if (isset($_GET['pageType'])) {
	if ($_GET['pageType']=='archiveedit') {
	include_once 'archiveEditPage.php';
	}
	if ($_GET['pageType']=='archiveservice') {
		include_once 'archiveService.php';
	}
}
if (!isset($_POST['pageType'])&&!isset($_GET['pageType'])) {
	include_once 'archiveListPage.php';
}
?>