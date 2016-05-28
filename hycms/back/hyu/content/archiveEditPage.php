<?php
use hybase\Controller\ArchiveController;

include_once __DIR__ . '/../user/loginveri.php';
require_once __DIR__ . "/../../../src/controller/archive/ArchiveController.php";
static $oneGrade = 'contentmanager';
static $secondGrade = 'addcontent';
?>
<!DOCTYPE html>
<html>
<head>	
<?php include_once __DIR__.'/../commons/commonspages.php';?>
</head>
<body>
<?php include_once __DIR__.'/../commons/header.php';?>
<div class="content">
<?php include_once __DIR__.'/archiveLeftNav.php';?>
<div class="conright">
<?php 
$archiveController=new ArchiveController();
if (isset($_GET['archiveId'])&&(!empty($_GET['archiveId']))) {
	$archiveId=$_GET['archiveId'];
	$archiveHead=$archiveController->getArchiveHead($archiveId);
	$archiveContent=$archiveController->getArchiveContent($archiveId);
}
?>
<form id="archiveDetail" action="javasctipt:void(0);" class="u-f-t-i-t">
			<div class="ui-block-nofloat">
				<span>基础信息</span>
				<table class="table ">
					<tbody>
						<tr>
							<td height="24" colspan="5" class="bline">
								<table width="800" border="0" cellspacing="0" cellpadding="0">
									<tbody>
										<tr>
											<td width="90">文章标题：</td>
											<td width="408">
											<input name="title" type="text" id="title" value="<?php echo (empty($archiveHead)? '':$archiveHead->getTitle());?>" style="width: 350px;height: 32px;"></td>
											<td width="90">&nbsp;简略标题：</td>
											<td><input name="shorttitle" type="text" value="<?php echo (empty($archiveHead)? '':$archiveHead->getSubtitle());?>" id="shorttitle"style="width: 150px;height: 32px;"></td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td height="24" colspan="5" class="bline">
								<table width="800" border="0" cellspacing="0" cellpadding="0">
									<tbody>
										<tr>
											<td width="52">编码：</td>
											<td width="408">
											<input name="code" type="text" id="code" value="<?php echo (empty($archiveHead)? '':$archiveHead->getCode());?>" style="width: 350px;height: 32px;"></td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td height="24" colspan="5" class="bline">
								<table width="800" border="0" cellspacing="0" cellpadding="0">
									<tbody>
										<tr>
											<td width="90">自定义属性：</td>
											<td align="left">
												<input class="np" type="checkbox" name="flags[]" id="flagsh" value="h"><span style="display: inline-block;position:relative;">头条[h]</span>
												<input class="np" type="checkbox" name="flags[]" id="flagsc" value="c"><span style="display: inline-block;position:relative;">推荐[c]</span>
												<input class="np" type="checkbox" name="flags[]" id="flagsf" value="f"><span style="display: inline-block;position:relative;">幻灯[f]</span>
												<input class="np" type="checkbox" name="flags[]" id="flagsa" value="a"><span style="display: inline-block;position:relative;">特荐[a]</span>
												<input class="np" type="checkbox" name="flags[]" id="flagss" value="s"><span style="display: inline-block;position:relative;">滚动[s]</span>
												<input class="np" type="checkbox" name="flags[]" id="flagsb" value="b"><span style="display: inline-block;position:relative;">加粗[b]</span>
												<input class="np" type="checkbox" name="flags[]" id="flagsp" value="p"><span style="display: inline-block;position:relative;">图片[p]</span>
												<input class="np" type="checkbox" name="flags[]" id="flagsj" value="j"><span style="display: inline-block;position:relative;">跳转[j]</span></td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td height="24" colspan="5" class="bline" id="redirecturltr"
								style="display: none">
								<table width="800" border="0" cellspacing="0" cellpadding="0">
									<tbody>
										<tr>
											<td width="90">&nbsp;跳转网址：</td>
											<td><input name="redirecturl" type="text" id="redirecturl" style="width: 350px;height: 32px;" value=""></td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td width="400%" height="24" colspan="2" class="bline">
								<table width="900" border="0" cellspacing="0" cellpadding="0">
									<tbody>
										<tr>
											<td width="90">标签：</td>
											<td><input name="tags" type="text" id="tags" value="" style="width: 350px;height: 32px;" onchange="$Obj('keywords').value=this.value;">(','号分开，单个标签小于12字节)</td>
											<td width="47">权重：</td>
											<td><input name="weight" type="text" id="weight" style="width: 35px;height: 32px;" value="1">(越小越靠前)</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr id="pictable">
							<td height="24" colspan="5" class="bline">
								<table width="800" border="0" cellspacing="0" cellpadding="0">
									<tbody>
										<tr>
											<td width="90">缩略图：</td>
											<td width="560">
												<table width="" border="0" cellspacing="1"
													cellpadding="1">
													<tbody>
														<tr>
															<td height="30"><input name="picname" type="text" id="picname" value="<?php echo (empty($archiveHead)? '':$archiveHead->getLitpic());?>" style="width: 350px;height: 32px;float: left;">
															<div id="selwriter" class="u-f-t-i-t-b" style="width: 63px;display: inline-block;float: left;height: 18px;margin-left: 4px;">
															<label>上传文件</label>
															<input id="thumbimg" name="thumbimg" type="file" style="opacity: 0;position: relative;top: -22px;width: 76px;left: -18px;height: 35px;margin-top: 0;">
															</div>
															</td>
														</tr>
													</tbody>
												</table>
											</td>
											<td width="150" align="center">
												<div id="divpicview" class="divpre"></div>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td height="24" colspan="5" class="bline">
								<table>
									<tbody>
										<tr>
											<td width="90">文章来源：</td>
											<td width=""><input name="source" type="text" id="source" style="width: 349px;height: 32px;" value="" size="16"> 
											<button name="selsource" type="button" id="selsource" value="" class="u-f-t-i-t-b" style="width: 95px;">选择</button></td>
											<td width="70"><label style="padding-left: 5px;">作 者：</label></td>
											<td><input name="writer" type="text" id="writer" style="width: 104px;height: 32px;" value=""> 
											<button name="selwriter" type="button" id="selwriter" value="" class="u-f-t-i-t-b" style="width: 95px;"> 选择</button></td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td height="24" colspan="5" class="bline">
								<table width="800" border="0" cellspacing="0" cellpadding="0" >
									<tbody>
										<tr>
											<td width="90">&nbsp;文章主栏目：</td>
											<td><span id="typeidct"> 
											<select name="typeid" id="typeid" style="width: 372px;height: 36px;">
														<option value="0">请选择栏目...</option>
														<option value="1" class="option3">首页</option>
												</select></span></td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						
						<tr>
							<td height="24" colspan="5" class="bline">
								<table width="800" border="0" cellspacing="0" cellpadding="0">
									<tbody>
										<tr>
											<td width="90">&nbsp;关键字：</td>
											<td style="width: 475px;" ><input type="text" name="keywords" id="keywords" style="width: 350px;height: 32px;" value="">
											<button type="button" name="Submit" value="" style="width: 95px;" onclick=""  class="u-f-t-i-t-b">浏览...</button></td>
											<td><input name="autokey" type="checkbox" onclick="" class="np" id="autokey" value="1" checked="1"> 自动获取，手动填写用","分开<br></td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td height="24" colspan="5" class="bline">
								<table width="800" border="0" cellspacing="0" cellpadding="0">
									<tbody>
										<tr>
											<td width="90">&nbsp;内容摘要：</td>
											<?php //textarea禁止换行?>
											<td width="449"><textarea  name="arvhivedesc" rows="5" id="arvhivedesc" style="width: 372px; height: 50px; border: 1px solid #aaa;"><?php echo (empty($archiveHead)? '':$archiveHead->getDescription());?></textarea></td>
											<td width="261">&nbsp;</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>

					</tbody>
				</table>
			</div>
			<input class="description" id="description" name="description" value="" style="display: none;">
			<input class="archivebody" id="archivebody" name="archivebody" value="" style="display: none;">
			<input class="pageType" id="pageType" name="pageType" value="archiveservice" style="display: none;">
			<input class="operArchive" id="operArchive" name="operArchive" value="<?php echo (empty($archiveHead)? 'newarchivesave':'update');?>" style="display: none;">
			<input class="saveType" id="saveType" name="saveType" value="archivesave" style="display: none;">
			<input class="archiveId" id="archiveId" name="archiveId" value="<?php echo (empty($archiveHead)? '':$archiveHead->getId());?>" style="display: none;">
			
			<!-- 加载编辑器的容器 -->
			<script id="container" name="content" type="text/plain"><?php echo (empty($archiveContent)? '':$archiveContent->getContent());?></script>
			<button id="archivesave" name="archivesave" type="button" class="u-f-t-i-t-b" value="" style="margin-top: 10px;">保存</button>
			<div><span class="resultMessage"></span></div>

</form>
</div>
			<!-- 配置文件 -->
			<script type="text/javascript" src="../../ueditor/ueditor.config.js"></script>
			<!-- 编辑器源码文件 -->
			<script type="text/javascript" src="../../ueditor/ueditor.all.js"></script>
			<!-- 实例化编辑器 -->
			<script type="text/javascript">
        var ue = UE.getEditor('container');
        $(window).keypress(function(){

            });
		function getContent(){

		//alert(ue.getContent());
            	}
        $(function(){
            });
    </script>

		</div>

</body>
<script type="text/javascript" src="<?php echo $pagebase; ?>scripts/commons.js"></script>

</html>