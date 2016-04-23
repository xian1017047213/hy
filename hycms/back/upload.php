<!DOCTYPE html>
<html>
<?php
include_once __DIR__.'/hyu/commons/commonspages.php';
include_once __DIR__.'/hyu/commons/commonparam.php';?>
<head></head>
<body>

<?php
if (isset($_GET['act'])) {
$action = $_GET['act'];
}
if($action=='delimg'){
	$filename = $_POST['imagename'];
	if(!empty($filename)){
		unlink('files/'.$filename);
		echo '1';
	}else{
		echo '删除失败.';
	}
}else{
	$picname = $_FILES['mypic']['name'];
	$picsize = $_FILES['mypic']['size'];
	if ($picname != "") {
		if ($picsize > 1024000) {
			echo '图片大小不能超过1M';
			exit;
		}
		$type = strstr($picname, '.');
		if ($type != ".gif" && $type != ".jpg") {
			echo '图片格式不对！';
			exit;
		}
		$rand = rand(100, 999);
		$pics = date("YmdHis") . $rand . $type;
		//上传路径
		$pic_path = "d:/testfiles/". $pics;
		move_uploaded_file($_FILES['mypic']['tmp_name'], $pic_path);
	}
	$size = round($picsize/1024,2);
	$arr = array(
		'name'=>$picname,
		'pic'=>$pics,
		'size'=>$size
	);
	echo json_encode($arr);
}
?>
	<input type="file" name="mypic" id="fileupload">
	
	
<script type="text/javascript">
$(function () {
	var bar = $('.bar');
	var percent = $('.percent');
	var showimg = $('#showimg');
	var progress = $(".progress");
	var files = $(".files");
	var btn = $(".btn span");
	$("#fileupload").wrap("<form id='myupload' action='?act=test' method='post' enctype='multipart/form-data'></form>");
	$("#fileupload").change(function(){
		$("#myupload").ajaxSubmit({
			dataType:  'json',
			beforeSend: function() {
				showimg.empty();
				progress.show();
				var percentVal = '0%';
				bar.width(percentVal);
				percent.html(percentVal);
				btn.html("上传中...");
			},
			uploadProgress: function(event, position, total, percentComplete) {
				var percentVal = percentComplete + '%';
				bar.width(percentVal);
				percent.html(percentVal);
			},
			success: function(data) {
// 				files.html("<b>"+data.name+"("+data.size+"k)</b> <span class='delimg' rel='"+data.pic+"'>删除</span>");
// 				var img = "http://demo.helloweba.com/upload/files/"+data.pic;
// 				showimg.html("<img src='"+img+"'>");
// 				btn.html("添加附件");
			},
			error:function(xhr){
// 				btn.html("上传失败");
// 				bar.width('0')
// 				files.html(xhr.responseText);
			}
		});
	});

		$(".delimg").live('click',function(){
			var pic = $(this).attr("rel");
			$.post("action.php?act=delimg",{imagename:pic},function(msg){
				if(msg==1){
					files.html("删除成功.");
					showimg.empty();
					progress.hide();
				}else{
					alert(msg);
				}
			});
		});
});
	</script>
</body>
</html>