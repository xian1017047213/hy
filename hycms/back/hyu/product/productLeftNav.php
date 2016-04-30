<?php include_once __DIR__.'/../commons/commonparam.php';?>
<div class="conleft">
<div class="left-nav">
<ul>
	<li class="l-n-i <?php echo (($oneGrade=='productmanager')?'s-o':'');?>"><a href="javascript:void(0);">商品管理<i>&nbsp;&gt;</i></a>
	<ul class="nextnav" <?php echo (($oneGrade=='productmanager')?'style="display:block;"':'style="display:none;"');?>>
		<li><a class="<?php echo (($secondGrade=='productmanager')?'s-o-l':'');?>" href="<?php echo $pagebase;?>hyu/product/">商品管理</a></li>
		<li><a class="<?php echo (($secondGrade=='productDetail')?'s-o-l':'');?>" href="<?php echo $pagebase;?>hyu/product/?pageType=productdetail">新建商品</a></li>
	</ul>
	</li>
	
</ul>
</div>
</div>