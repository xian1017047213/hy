<?php

namespace hybase\Controller;

use hybase\Manager\ArchiveManager;
use hybase\Tools\DirectoryAndFileOper;

require_once __DIR__ . '/../../manager/archive/ArchiveManager.php';
require_once __DIR__ . '/../../manager/tools/DirectoryAndFileOper.php';
class ArchiveController {
	/*
	 * html默认文件路径
	 */
	//public static $htmlPath=$_SERVER['DOCUMENT_ROOT'].'/html/';
	/*
	 * 文件类型
	 */
	public static $fileType='html';
	/*
	 * 新建文章
	 */
	public static $newArchive=1;
	/*
	 * 已发布文章
	 */
	public static $publishedArchive=2;
	/*
	 * 删除文章
	 */
	public static $deletedArchive=3;
	
	public function __construct() {
		// print "In BaseClass constructor\n";
	}
	public function archiveStatusToString($archiveStatus){
		if ($archiveStatus==self::$newArchive) {
			return '未发布';
		}
		if ($archiveStatus==self::$publishedArchive) {
			return '已发布';
		}
	}
	/*
	 * 添加文章
	 */
	public function saveArchiveDetail($archiveId=null,$code, $title, $archivebody, $source, $writer) {
		$archiveManager = new ArchiveManager();
		if (empty($code)) {
			return '文章编码不能为空！';
		}
		return $archiveManager->saveArchiveDetail($archiveId,$code, $title, $archivebody, $source, $writer);
	}
	public function getArchiveList($archiveId = NULL, $code = NULL, $title = NULL, $status=NULL , $createStart=NULL,$createEnd=NULL,$archivebody = NULL, $source = NULL, $writer = NULL){
		$archiveManager = new ArchiveManager();
		return $archiveManager->findArchiveList($archiveId, $code, $title, $status , $createStart,$createEnd,$archivebody, $source, $writer);
	}
	public function publishArchive($archiveId){
		$archiveManager = new ArchiveManager();
		$directoryAndFileOper=new DirectoryAndFileOper();
		$headResult= $archiveManager->findArchiveHead($archiveId);
		if (sizeof($headResult)>0){
			$contentResult=$archiveManager->findArchiveContent($archiveId);
			$htmlPathCreate=$_SERVER['DOCUMENT_ROOT'].'/upload/html/'.date('Ymd').'/';
			$dateHtmlName=time();
			$archiveContent=$contentResult->getContent();
			$directoryAndFileOper->createFileDirectory($htmlPathCreate);
			$directoryAndFileOper->createFile($htmlPathCreate, $dateHtmlName, $archiveContent, self::$fileType);
			$archiveManager->updateArchiveStatus($archiveId, self::$publishedArchive,$dateHtmlName);
			return true;
		}
		return FALSE;
	}
	public function cancelArchive($archiveId){
		$archiveManager = new ArchiveManager();
		$directoryAndFileOper=new DirectoryAndFileOper();
		$headResult= $archiveManager->findArchiveHead($archiveId);
		if (sizeof($headResult)>0){
			$dateHtmlName='';
			$archiveManager->updateArchiveStatus($archiveId, self::$newArchive,$dateHtmlName);
			return true;
		}
		return FALSE;
	}
	public function deleteArchive($archiveId){
		$archiveManager = new ArchiveManager();
		$directoryAndFileOper=new DirectoryAndFileOper();
		$headResult= $archiveManager->findArchiveHead($archiveId);
		if (sizeof($headResult)>0){
			$dateHtmlName='';
			$archiveManager->updateArchiveStatus($archiveId, self::$deletedArchive,$dateHtmlName);
			return true;
		}
		return FALSE;
	}
	public function uploadThumbImage($imgfile,$fileType,$archiveId,$imgWidth=NULL){
		try {
		$directoryAndFileOper=new DirectoryAndFileOper();
		$htmlPathCreate=$_SERVER['DOCUMENT_ROOT'].'/upload/image/'.date('Ymd').'/';
		$directoryAndFileOper->createFileDirectory($htmlPathCreate);
		$uploadPath=$directoryAndFileOper->moveImages($imgfile, $htmlPathCreate, $fileType);
		return $uploadPath;
		} catch (Exception $e) {
			return false;
		}
		return true;
	}
	
}
?>