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
	$propertyValueDetails=$propertyController->getPropertyValueDetail($propertyId);
}else {
	$propertyId=null;
}
?>
<form id="propertyDetail" action="<?php echo $pagebase;?>hyu/operate" class="u-f-t-i-t">
			<div class="ui-block-nofloat">
				<span>属性值列表</span>
				<table class="table ">
					<tbody class='t-body'>
						<?php 
						$propertyValueTable='';
						$i=1;
						if (!empty($propertyValueDetails)) {
							foreach ($propertyValueDetails as $propertyValueDetail){
							$propertyValueTable=$propertyValueTable.'<tr>
											<td width="52"><input type="checkbox" style="margin-top: 10px;"><input type="hidden" name="propertyValueId[]" value="'.$propertyValueDetail->getId().'"><input type="hidden" name="propertyValueSequence[]" value="'.$i++.'"></td>
											<td width="408">
											<input name="properyValue[]" type="text" id="propertyValue" value="'.$propertyValueDetail->getValue().'" style="width: 350px;height: 32px;"></td>
										</tr>';
							}
						}else {
							$propertyValueTable=$propertyValueTable.'<tr>
											<td width="52"><input type="checkbox" style="margin-top: 10px;"><input type="hidden" name="propertyValueId[]" value="newvalue"><input type="hidden" name="propertyValueSequence[]" value="1"></td>
											<td width="408">
											<input name="properyValue[]" type="text" id="properyValue" value="" style="width: 350px;height: 32px;"></td>
										</tr>';
						}
						echo $propertyValueTable;
						?>
						</tbody>
				</table>
			</div>
			<input class="pageType" id="pageType" name="pageType" value="propertyservice" style="display: none;">
			<input class="operProperty" id="operProperty" name="operProperty" value="upadtepropertyvalue" style="display: none;">
			<input class="saveType" id="saveType" name="saveType" value="propertysave" style="display: none;">
			<input class="propertyId" id="propertyId" name="propertyId" value="<?php echo (empty($propertyId)? '':$propertyId);?>" style="display: none;">
			<div >
			<a href="javascript:void(0);" style="text-decoration : none;"> <span id="addPropertyValueLine" style="font-size: 14px;color: #fff;background-color: #0E87D1;padding: 0 6px 0 6px;">添加</span></a> 
			<a href="javascript:void(0);" style="text-decoration : none;"> <span id="removePropertyValueLine" style="font-size: 14px;color: #fff;background-color: #0E87D1;padding: 0 6px 0 6px;">删除</span></a> 
			</div>
			<button id="propertyValueSave" name="propertyValueSave" type="button" class="u-f-t-i-t-b" value="" style="margin-top: 10px;">保存</button>
			<div><span class="resultMessage"></span></div>

</form>
</div>

</div>

</body>
<script type="text/javascript" src="../../scripts/commons.js"></script>

</html>