<?php
namespace hybase\Tools;

class DirectoryAndFileOper{
	function __construct() {
		// print "In BaseClass constructor\n";
	}
	public function createFileDirectory($directoryPath){
		if (!is_dir($directoryPath)||!file_exists($directoryPath)) {
			mkdir($directoryPath,0755,TRUE);
		}
		
	}
	public function createFile($filePath,$fileName,$fileContent,$fileType) {
		ob_start();
		if (!isset($filePath)||empty($filePath)) {
			return '文件路径异常';
		}
		if (!isset($fileName)||empty($fileName)) {
			return '文件异常';
		}
		if (!isset($fileContent)||empty($fileContent)) {
			return '文件内容异常';
		}
		if (!isset($fileType)||empty($fileType)) {
			return '文件类型异常';
		}
		$fileType='.'.$fileType;
		$filePath=$filePath.$fileName.$fileType;
		$fp=fopen($filePath,"w");
		echo $filePath;
		fwrite($fp,$fileContent);
		fclose($fp);
	}
	public function moveImages($imgfile,$filePath,$fileType,$imgWidth=NULL){
		$filePath=$filePath. date("YmdHis") . rand(100, 999) . $fileType;
		move_uploaded_file($imgfile, $filePath);
		return $filePath;
	}
}

//$dafo=new DirectoryAndFileOper();
//$dafo->createFileDirectory('D:/gitdata/hywithdoctrine/upload/test');
//echo $dafo->createFile('D:/gitdata/hywithdoctrine/upload/test/','test','hello','html');
?>