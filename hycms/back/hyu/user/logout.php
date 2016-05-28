<?php
include_once '../commons/commonparam.php';

$locationurl="location:".$pagebase;
session_start();
$_SESSION ['loginstatus']=0;
$_SESSION ['loginname']=null;
header($locationurl);
exit;
?>