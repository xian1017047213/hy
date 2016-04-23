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
});