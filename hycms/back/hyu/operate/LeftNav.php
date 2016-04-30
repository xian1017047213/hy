<?php include_once __DIR__.'/../commons/commonparam.php';?>
<div class="conleft">
<div class="left-nav">
<ul>
	<li class="l-n-i <?php echo (($oneGrade=='propertymanager')?'s-o':'');?>"><a href="javascript:void(0);">属性管理<i>&nbsp;&gt;</i></a>
	<ul class="nextnav" <?php echo (($oneGrade=='propertymanager')?'style="display:block;"':'style="display:none;"');?>>
		<li><a class="<?php echo (($secondGrade=='propertylist')?'s-o-l':'');?>" href="<?php echo $pagebase;?>hyu/operate">属性列表</a></li>
		<li><a class="<?php echo (($secondGrade=='propertyedit')?'s-o-l':'');?>" href="<?php echo $pagebase;?>hyu/operate/?pageType=propertyedit">添加属性</a></li>
	</ul>
	</li>
	
</ul>
</div>
</div>