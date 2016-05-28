<?php

namespace hybase\Controller;

use hybase\Manager\ArchiveManager;
use hybase\Tools\DirectoryAndFileOper;
use hybase\Tools\SystemParameter;

require_once __DIR__ . '/../../manager/archive/ArchiveManager.php';
require_once __DIR__ . '/../../manager/tools/DirectoryAndFileOper.php';
require_once __DIR__ . '/../../manager/tools/SystemParameter.php';
class ArchiveController {
	
	public function __construct() {
		// print "In BaseClass constructor\n";
	}
	public function archiveStatusToString($archiveStatus){
		if ($archiveStatus==SystemParameter::$newArchive) {
			return '未发布';
		}
		if ($archiveStatus==SystemParameter::$publishedArchive) {
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
	public function getArchiveList($archiveId = NULL, $code = NULL, $title = NULL, $status=NULL , $createStart=NULL,$createEnd=NULL,$archivebody = NULL, $source = NULL, $writer = NULL,$startResult=NULL,$resultNum=NULL){
		$archiveManager = new ArchiveManager();
		return $archiveManager->findArchiveList($archiveId, $code, $title, $status , $createStart,$createEnd,$archivebody, $source, $writer,$startResult,$resultNum);
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
			$directoryAndFileOper->createFile($htmlPathCreate, $dateHtmlName, $archiveContent, SystemParameter::$fileType);
			$archiveStaticUrl=$htmlPathCreate.$dateHtmlName.'.'.SystemParameter::$fileType;
			$archiveManager->updateArchiveContentStaticUrl($archiveId, $archiveStaticUrl);
			$archiveManager->updateArchiveStatus($archiveId, SystemParameter::$publishedArchive,$dateHtmlName);
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
			$archiveManager->updateArchiveStatus($archiveId, SystemParameter::$newArchive,$dateHtmlName);
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
			$archiveManager->updateArchiveStatus($archiveId, SystemParameter::$deletedArchive,$dateHtmlName);
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
	public function getValidArchiveNum(){
		$archiveManager = new ArchiveManager();
		$result=$archiveManager->findNumberOfValidArchive();
		return $result;
	}
}
?>