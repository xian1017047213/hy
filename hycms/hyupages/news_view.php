<?php 
use hybase\Controller\ArchiveController;

require_once __DIR__ . "/../src/controller/archive/ArchiveController.php";

$archiveController=new ArchiveController();
?>
<!DOCTYPE html>
<html>
<head>
<?php include 'commons/commons.php';?>
<link href="../css/about.css" rel="stylesheet" type="text/css">
<title>网站建设|山东网站建设|潍坊网站建设|华禹科技|昌乐华禹电子商务有限公司</title>
</head>
<body>
<?php include 'commons/header.php';?>
<div class="content">
		<div class="conup">
			<div class="conintro">
				<a class="c-c" href="<?php echo $staticurl?>">首页 </a> <i> &gt;</i> <span class="c-n">关于我们</span>
				<div class="conname">
				<h2>公司简介</h2></div>
				<div class="pagelogo-l1">
				<img style="opacity: 1;width: 271px;"alt="" src="<?php echo $staticurl?>images/conheader/solution_header.png">
				</div>
			</div>
		</div>
		<div class="condown">
			<div class="conleft">
			<ul class="conlist">
			<li>
			<h3>新闻中心</h3>
			</li>
			<li ><a href="<?php echo $basicurl;?>hyupages/news.php">站内新闻</a></li>
			<li class="on" style="border-color: rgb(242, 172, 40);" ><a href="<?php echo $basicurl;?>hyupages/news_view.php">行业快讯</a></li>
			</ul>
			</div>
			<div class="conright">
				<div class="new-content">
				<?php
				$ifContentValid = true;
				if (isset ( $_GET ['pageType'] ) && ($_GET ['pageType'] == 'archiveDetail')) {
					if (isset ( $_GET ['archiveId'] ) && (! empty ( $_GET ['archiveId'] ))) {
						$archiveId = $_GET ['archiveId'];
						$archiveHead = $archiveController->getArchiveHead ( $archiveId, $archiveController::$publishedArchive );
						$archiveContent = $archiveController->getArchiveContent ( $archiveId );
						if ((sizeof ( $archiveHead ) > 0) && (sizeof ( $archiveContent ) > 0)) {
							echo '<h3 style="text-align: center;">' . $archiveHead->getTitle () . '<br><br><span style="font-size: 12px; color: rgb(127, 127, 127);font-weight: normal;">发布时间：' . $archiveHead->getVersion ()->format ( 'Y年m月d日' ) . '</span></h3>';
							include_once $archiveContent->getStaticUrl ();
						} else {
							$ifContentValid = false;
						}
					} else {
						$ifContentValid = false;
					}
					if (!$ifContentValid) {
					header ( 'location:' . $basicurl . 'hyupages/news_view.php' );
					exit ();
					}
				} else {
					$archiveRows = $archiveController->getArchiveList ( null, null, null, $archiveController::$publishedArchive );
					if (sizeof ( $archiveRows ) > 0) {
						$archiveList = '<div class="new-list"><ul>';
						foreach ( $archiveRows as $archiveRow ) {
							$archiveList = $archiveList . '<li><a><img alt="" src="' . $archiveRow->getLitPic () . '"> </a>';
							$archiveList = $archiveList . '<p class="new-list-title"><a href="' . $_SERVER ["REQUEST_URI"] . '?pageType=archiveDetail&archiveId=' . $archiveRow->getId () . '" style="color: #28A7E1;">' . $archiveRow->getTitle () . '</a></p>';
							$archiveList = $archiveList . '<p class="new-list-description">' . $archiveRow->getDescription () . '</p>';
							$archiveList = $archiveList . '<p class="new-list-description"><span>' . $archiveRow->getVersion ()->format ( 'Y年d月m日 h:m:s' ) . '</span></p></li>';
						}
						$archiveList = $archiveList . '</ul></div>';
						echo $archiveList;
					} else {
						echo '<div class="new-list"> <h3>暂时没有行业资讯</h3> </div>';
					}
				}
				?>
				</div>
			</div>
		</div>
	</div>
<?php include 'commons/footer.php';?>
</body>
</html>
