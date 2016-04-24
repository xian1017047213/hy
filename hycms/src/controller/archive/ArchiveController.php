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
	public function getArchiveHead($archiveId,$archiveStatus=null){
		try {
			$archiveManager = new ArchiveManager();
			$restult=$archiveManager->findArchiveHead($archiveId,$archiveStatus);
			return $restult;
		} catch (Exception $e) {
			return false;
		}
	}
	public function getArchiveContent($archiveId){
		try {
			$archiveManager = new ArchiveManager();
			$restult=$archiveManager->findArchiveContent($archiveId);
			return $restult;
		} catch (Exception $e) {
			return false;
		}
	}
	/*
	 * 添加文章
	 */
	public function saveArchiveDetail($archiveId=null,$code, $title,$litpic,$description, $archivebody, $source, $writer) {
		$archiveManager = new ArchiveManager();
		if (empty($code)) {
			return '文章编码不能为空！';
		}
		if (empty($title)) {
			return '文章标题不能为空！';
		}
		if (empty($archivebody)) {
			return '文章内容不能为空！';
		}
		if (strlen($description)>500) {
			return '短描述不能超过500字符！';;
		}
		return $archiveManager->saveArchiveDetail($archiveId,$code, $title,$litpic, $description, $archivebody, $source, $writer);
	}
	public function getArchiveList($archiveId = NULL, $code = NULL, $title = NULL, $status=NULL , $createStart=NULL,$createEnd=NULL,$archivebody = NULL, $source = NULL, $writer = NULL){
		$archiveManager = new ArchiveManager();
		return $archiveManager->findArchiveList($archiveId, $code, $title, $status , $createStart,$createEnd,$archivebody, $source, $writer);
	}
	/**
	 * 发布文件生成html静态文件
	 * @param $archiveId 通过id检索文件内容并生成文件
	 */
	public function publishArchive($archiveId){
		$archiveManager = new ArchiveManager();
		$directoryAndFileOper=new DirectoryAndFileOper();
		$headResult= $archiveManager->findArchiveHead($archiveId);
		if (sizeof($headResult)>0){
			$contentResult=$archiveManager->findArchiveContent($archiveId);
			$timePath='/upload/html/'.date('Ymd').'/';
			$htmlPathCreate=$_SERVER['DOCUMENT_ROOT'].$timePath;
			$dateHtmlName=time();
			$archiveContent=$contentResult->getContent();
			$directoryAndFileOper->createFileDirectory($htmlPathCreate);
			$directoryAndFileOper->createFile($htmlPathCreate, $dateHtmlName, $archiveContent, self::$fileType);
			$archiveStaticUrl=$timePath.$dateHtmlName.'.'.self::$fileType;
			$archiveManager->updateArchiveContentStaticUrl($archiveId, $archiveStaticUrl);
			$archiveManager->updateArchiveStatus($archiveId, self::$publishedArchive,$dateHtmlName);
			return true;
		}
		return FALSE;
	}
	/**
	 * 取消发布文件
	 * @param  $archiveId 通过id检索文件，并删除数据库中文件名称，文件不删除
	 * @return boolean
	 */
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
	/**
	 * 状态删除
	 * @param $archiveId
	 * @return boolean
	 */
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
	/**
	 * 生成缩略图并将系统中生成的路径返回至页面
	 * @param unknown $imgfile
	 * @param unknown $fileType
	 * @param unknown $archiveId
	 * @param unknown $imgWidth
	 */
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