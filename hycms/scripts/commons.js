$(function(){
	$(".on").css("border-color","#F2AC28");
	var countA=$('a').size();
	//alert(countA);
	for (var i = 0; i < countA; i++) {
		var str=$('a').eq(i).attr('href');
		if(str!=null){
			///alert(str);
			if (str.indexOf('tongji.baidu')>=0) {
				$('a').eq(i).css('display','none');
			}			
		}
	}
	if (document.body.clientHeight<document.body.scrollHeight) {
		$(".blank-block").css("height",(document.body.scrollHeight-document.body.clientHeight));
	}
});

$(function(){
	$(".suspend").mouseover(function() {
        $(this).stop();
        $(this).animate({width: 160}, 400);
    });
    $(".suspend").mouseout(function() {
        $(this).stop();
        $(this).animate({width: 40}, 400);
    });
});