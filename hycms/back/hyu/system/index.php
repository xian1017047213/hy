<?php
if (isset ( $_GET ['pageType'] )) {
	if (($_GET ['pageType'] == 'userdetail') || ($_GET ['pageType'] == 'userpwd') || ($_GET ['pageType'] == 'userstatus')) {
		include_once 'userDetailPage.php';
	}
}else {
	if (isset ( $_POST ["saveType"] )) {
		include_once 'userService.php';
	} else {
		include_once 'userListPage.php';
	}
	
}
?>