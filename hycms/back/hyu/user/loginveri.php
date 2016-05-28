<?php include_once  __DIR__.'/../commons/commonparam.php';?>
<?php
$locationurl="location:".$pagebase.'hyu/user';
session_start();
if (!isset($_SESSION['loginstatus'])) {
	header($locationurl);
	exit;
}elseif (!($_SESSION['loginstatus']==1)){
	header($locationurl);
	exit;
}

?>