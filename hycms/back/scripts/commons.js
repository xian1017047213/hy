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
	
	$('.nav-pager a').click(function(){
		$(this).siblings('.operPage').attr("value",$(this).attr("id"));
		var params=$(this).siblings('input').serialize();
		var url = "/back/hyu/product/";
		ajaxSend("get", url, "json", params);
	});
	$("#productSave").click(function() {
		var description = UE.getEditor('description');
		var sketch = UE.getEditor('sketch');
		$("#productDesc").attr("value",description.getContent());
		$("#productSketch").attr("value",sketch.getContent());
		var params = $("input").serialize();
		var url = "/back/hyu/product/";
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
	$('#propertyValueSave').click(function(){
		var params = $("form").serialize();
		var url = "/back/hyu/operate/";
		ajaxSend("post", url, "json", params);
	});
	
	$('.ui-poplist').hover(function() {
		$(this).children("ul").css("display", "block");
	}, function() {
		$(this).children("ul").css("display", "none");
	});
	$('#addPropertyValueLine').click(function(){
		$('.t-body').append('<tr> <td width="52"><input type="checkbox" style="margin-top: 10px;"><input type="hidden" name="propertyValueId[]" value="newvalue"><input type="hidden" name="propertyValueSequence[]" value="'+($('.t-body tr').length+1)+'"></td> <td width="408"> <input name="properyValue[]" type="text" id="properyValue" value="" style="width: 350px;height: 32px;"></td></tr>');
	});
	$('#removePropertyValueLine').click(function(){
		$("input:checkbox:checked").parents('tr').remove();
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