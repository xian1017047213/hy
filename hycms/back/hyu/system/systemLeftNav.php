<?php include_once __DIR__.'/../commons/commonparam.php';?>
<div class="conleft">
	<div class="left-nav">
		<ul>
			<li class="l-n-i <?php echo (($oneGrade=='authmanager')?'s-o':'');?>"><a href="javascript:void(0);">权限管理<i>&nbsp;&gt;</i></a>
				<ul class="nextnav" <?php echo (($oneGrade=='authmanager')?'style="display:block;"':'style="display:none;"');?>>
					<li><a class="<?php echo (($secondGrade=='usermanager')?'s-o-l':'');?>" href="<?php echo $pagebase;?>hyu/system">用户管理</a></li>
					<li><a class="<?php echo (($secondGrade=='rolemanager')?'s-o-l':'');?>" href="javascript:void(0);">角色管理</a></li>
					<li><a class="<?php echo (($secondGrade=='itemmanager')?'s-o-l':'');?>" href="javascript:void(0);">菜单管理</a></li>
					<li><a class="<?php echo (($secondGrade=='authmanager')?'s-o-l':'');?>" href="javascript:void(0);">权限管理</a></li>
				</ul></li>
			<li class="l-n-i <?php echo (($oneGrade=='impoparameter')?'s-o':'');?>"><a href="javascript:void(0);">关键参数管理<i>&nbsp;&gt;</i></a>
			<ul class="nextnav" <?php echo (($oneGrade=='impoparameter')?'style="display:block;"':'style="display:none;"');?>>
					<li><a class="<?php echo (($secondGrade=='industorymanager')?'s-o-l':'');?>" href="javascript:void(0);">行业管理</a></li>
				</ul>
			</li>
		</ul>
	</div>
</div>
