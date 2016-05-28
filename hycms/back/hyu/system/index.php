<?php
if (isset ( $_GET ['pageType'] )) {
	if (($_GET ['pageType'] == 'userdetail') || ($_GET ['pageType'] == 'userpwd') || ($_GET ['pageType'] == 'userstatus')) {
		include_once 'user/userDetailPage.php';
	}
}else {
	if (isset ( $_POST ["saveType"] )) {
		include_once 'systemService.php';
	} else {
		include_once 'user/userListPage.php';
	}
	
}
if (! isset ( $_POST ['pageType'] ) && ! isset ( $_GET ['pageType'] )) {
	include_once 'user/userListPage.php';
}
?>