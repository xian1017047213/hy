$(function(){
	$('.l-n-i').click(function(){
		$('.l-n-i').removeClass('s-o');
		$('.l-n-i').children('.nextnav').css('display','none');
		if ($(this).hasClass('s-o')) {
			$(this).children('.nextnav').css('display','none');
		}else {
			$(this).children('.nextnav').css('display','block');
		}
		$(this).toggleClass('s-o');
	});
});