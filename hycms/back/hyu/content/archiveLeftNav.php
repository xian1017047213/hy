<?php include_once __DIR__.'/../commons/commonparam.php';?>
<div class="conleft">
<div class="left-nav">
<ul>
	<li class="l-n-i <?php echo (($oneGrade=='contentmanager')?'s-o':'');?>"><a href="javascript:void(0);">内容管理<i>&nbsp;&gt;</i></a>
	<ul class="nextnav" <?php echo (($oneGrade=='contentmanager')?'style="display:block;"':'style="display:none;"');?>>
		<li><a class="<?php echo (($secondGrade=='contentlist')?'s-o-l':'');?>" href="<?php echo $pagebase;?>hyu/content">文章列表</a></li>
		<li><a class="<?php echo (($secondGrade=='addcontent')?'s-o-l':'');?>" href="<?php echo $pagebase;?>hyu/content/?pageType=archiveedit">添加文章</a></li>
	</ul>
	</li>
	
</ul>
</div>
</div>