<?php
use hybase\Controller\PropertyController;

require_once __DIR__."/../../../src/controller/operate/PropertyController.php";
include_once __DIR__.'/../user/loginveri.php';
static $oneGrade='propertymanager';
static $secondGrade = 'propertyedit';
?>
<!DOCTYPE html>
<html>
<head>	
<?php include_once __DIR__.'/../commons/commonspages.php';?>
</head>
<body>
<?php include_once __DIR__.'/../commons/header.php';?>
<div class="content">
<?php include_once __DIR__.'/LeftNav.php';?>
<div class="conright">
<?php 
$propertyController=new PropertyController();
if (isset($_GET['propertyId'])&&(!empty($_GET['propertyId']))) {
	$propertyId=$_GET['propertyId'];
	$propertyDetail=$propertyController->getPropertyDetail($propertyId);
}else {
	$propertyId=null;
}
?>
<form id="propertyDetail" action="<?php echo $pagebase;?>hyu/operate" class="u-f-t-i-t">
			<div class="ui-block-nofloat">
				<span>基础信息</span>
				<table class="table ">
					<tbody>
						<tr>
							<td height="24" colspan="5" class="bline">
								<table width="800" border="0" cellspacing="0" cellpadding="0">
									<tbody>
										<tr>
											<td width="52">属性名称：</td>
											<td width="408">
											<input name="propertyName" type="text" id="propertyName" value="<?php echo (empty($propertyDetail)? '':$propertyDetail->getName());?>" style="width: 350px;height: 32px;"></td>
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
											<td width="52">属性编码：</td>
											<td width="408">
											<input name="propertyCode" type="text" id="propertyCode" value="<?php echo (empty($propertyDetail)? '':$propertyDetail->getGroupCode());?>" style="width: 350px;height: 32px;"></td>
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
											<td width="90">属性类型：</td>
											<td><span id="typeidct"> 
											<select  name="propertyEditType" id="propertyEditType" style="width: 372px;height: 36px;">
														<option value="1" <?php echo ( isset($propertyDetail)&&$propertyDetail->getEditType()==1)? 'selected="selected"':'' ;?>>单选</option>
														<option value="2" <?php echo ( isset($propertyDetail)&&$propertyDetail->getEditType()==2)? 'selected="selected"':'' ;?>>多选</option>
														<option value="3" <?php echo ( isset($propertyDetail)&&$propertyDetail->getEditType()==3)? 'selected="selected"':'' ;?>>输入型多选</option>
														<option value="4" <?php echo ( isset($propertyDetail)&&$propertyDetail->getEditType()==4)? 'selected="selected"':'' ;?>>单行输入</option>
												</select></span></td>
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
											<td width="90">值类型：</td>
											<td><span id="typeidct"> 
											<select name="propertyValueType" id="propertyValueType" style="width: 372px;height: 36px;">
														<option value="1" <?php echo ( isset($propertyDetail)&&$propertyDetail->getValueType()==1)? 'selected="selected"':'' ;?>>文本</option>
														<option value="2" <?php echo ( isset($propertyDetail)&&$propertyDetail->getValueType()==2)? 'selected="selected"':'' ;?>>数字</option>
														<option value="3" <?php echo ( isset($propertyDetail)&&$propertyDetail->getValueType()==3)? 'selected="selected"':'' ;?>>日期时间</option>
												</select></span></td>
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
											<td width="90">是否必输：</td>
											<td><span id="typeidct"> 
											<select name="propertyRequired" id="propertyRequired" style="width: 372px;height: 36px;">
														<option value="1" <?php echo ( isset($propertyDetail)&&$propertyDetail->getRequired()==1)? 'selected="selected"':'' ;?>>是</option>
														<option value="0" <?php echo ( isset($propertyDetail)&&$propertyDetail->getRequired()==0)? 'selected="selected"':'' ;?>>否</option>
												</select></span></td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						</tbody>
				</table>
			</div>
			<input class="pageType" id="pageType" name="pageType" value="propertyservice" style="display: none;">
			<input class="operProperty" id="operProperty" name="operProperty" value="<?php echo (empty($propertyId)? 'newproperty':'updateproperty');?>" style="display: none;">
			<input class="saveType" id="saveType" name="saveType" value="propertysave" style="display: none;">
			<input class="propertyId" id="propertyId" name="propertyId" value="<?php echo (empty($propertyDetail)? '':$propertyDetail->getId());?>" style="display: none;">
			<button id="propertySave" name="propertySave" type="button" class="u-f-t-i-t-b" value="" style="margin-top: 10px;">保存</button>
			<div><span class="resultMessage"></span></div>

</form>
</div>

</div>

</body>
<script type="text/javascript" src="<?php echo $pagebase; ?>scripts/commons.js"></script>

</html>