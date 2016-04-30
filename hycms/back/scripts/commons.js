var basicUrl = "";
$(function() {
	$("#thumbimg").wrap("<form id='thumbform' action='?pageType=archiveservice&operArchive=thumbupload' method='post' enctype='multipart/form-data'></form>");
	$("#thumbimg").change(function(){
		imgageSubmit();
	});
	
	$("#loginsub").click(
			function() {
				if ($("#username").attr("value").length < 1
						|| $("#userpwd").attr("value").length < 1) {
					clearinfor();
					$('.resultMessage').append("用户名或密码不能为空");
					setMessage = setInterval('clearinfor()', 5000);
					return;
				}
				if ($("#userverify").attr("value").length < 1) {
					clearinfor();
					$('.resultMessage').append("验证码不能为空");
					setMessage = setInterval('clearinfor()', 5000);
					return;
				}
				var params = $("input").serialize();
				var url = "";
				ajaxSend("post", url, "json", params);
			});
	
	$("#archivesave").click(function() {
		var ue = UE.getEditor('container');
		$("#description").val($("#arvhivedesc").val());
		$("#archivebody").attr("value", ue.getContent());
		var params = $("input").serialize();
		var url = "/back/hyu/content/";
		ajaxSend("post", url, "json", params);
	});
	
	
	$("#verifylink").click(function() {
		$url = $(".verifyimg").attr("src");
		$(".verifyimg").attr("src", $url);
	});
	
	$(".c-t-b-r").keypress(function() {
		if (event.keyCode == 13) {
			$("#loginsub").click();
		}
	});
	
	$("#userDetailSave").click(function() {
		var params = $("form").serialize();
		var url = "/back/hyu/system/";
		ajaxSend("post", url, "json", params);
	});
	
	$("#propertySave").click(function() {
		var params = $("form").serialize();
		var url = "/back/hyu/operate/";
		ajaxSend("post", url, "json", params);
	});
	
	$('.ui-poplist').hover(function() {
		$(this).children("ul").css("display", "block");
	}, function() {
		$(this).children("ul").css("display", "none");
	});

});
function imgageSubmit() {
	$("#thumbform").ajaxSubmit({
		dataType : 'json',
		beforeSend : function() {

		},
		uploadProgress : function(event, position, total, percentComplete) {

		},
		success : function(data) {
			$("#picname").val(data.imgUrl);
		},
		error : function(xhr) {
		}
	});
}

function ajaxSend(type, url, datatype, data) {
	$.ajax({
		type : type,
		url : url,
		dataType : datatype,
		data : data,
		success : function(msg) {
			if (msg!=null) {				
				if (msg.url == null) {
					clearinfor();
					$('.resultMessage').append(msg.description);
					setMessage = setInterval('clearinfor()', 5000);
				} else {
					window.location = msg.url;
				}
			}
		},
		error : function(msg) {
			clearinfor();
			$('.resultMessage').append(msg.description);
			setMessage = setInterval('clearinfor()', 5000);
		}
	});
}
function clearinfor() {
	$('.resultMessage').empty();
	clearInterval(setMessage);
}
var setMessage;