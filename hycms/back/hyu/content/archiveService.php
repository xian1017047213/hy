<?php
use hybase\Controller\ArchiveController;

require_once __DIR__ . "/../../../src/controller/archive/ArchiveController.php";
include_once __DIR__ . '/../member/loginveri.php';
include_once __DIR__ . '/../commons/commonparam.php';
$archiveController = new ArchiveController();
header ( "Content-Type: text/html; charset=UTF-8" );
if (isset ( $_POST ["operArchive"] )) {
	$postDataType = $_POST ["operArchive"];
	if ($postDataType == 'newarchivesave') {
		if (empty($_POST ['archiveId'])) {
			$saveResult='数据异常';
			$saveResult = $archiveController->saveArchiveDetail( $_POST ['archiveId'], $_POST ['code'],$_POST ['title'], $_POST ['articlebody'], $_POST ['source'], $_POST ['writer']);
		}else {			
			$saveResult = $archiveController->saveArchiveDetail ( $_POST ['archiveId'], $_POST ['code'],$_POST ['title'], $_POST ['articlebody'], $_POST ['source'], $_POST ['writer']);
		}
		if ($saveResult === true) {
			$url = $pagebase . "hyu/content/";
			echo json_encode ( array (
					'status' => 'success',
					'url' => null,
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
	exit ();
}
if (isset ( $_GET ["operArchive"] )) {
	$postDataType = $_GET ["operArchive"];
	if ($postDataType == 'republish'||$postDataType == 'publish') {
		$result=$archiveController->publishArchive($_GET['archiveId']);
		header('location:'.$pagebase.'hyu/content/');
		exit ();
	}
	if ($postDataType == 'cancelpublish') {
		$result=$archiveController->cancelArchive($_GET['archiveId']);
		header('location:'.$pagebase.'hyu/content/');
		exit ();
	}
	if ($postDataType == 'delete') {
		$result=$archiveController->deleteArchive($_GET['archiveId']);
		header('location:'.$pagebase.'hyu/content/');
		exit ();
	}
	if ($postDataType=='thumbupload') {
		$result=$archiveController->uploadThumbImage($_FILES['thumbimg']['tmp_name'], strstr($_FILES['thumbimg']['name'], '.'), 1);
		echo json_encode ( array (
				'status' => 'success',
				'url' => null,
				'imgUrl'=>str_replace($_SERVER['DOCUMENT_ROOT'], '', $result),
				'description' => 'thumbtest'
		) );
		exit ();
	}
	exit ();
}
