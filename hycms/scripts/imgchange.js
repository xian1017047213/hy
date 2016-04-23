var imgIndex = 1;
var autochangeimg;
$(function() {
	kvbuttonclick(imgIndex);
	homebannerhover();
});
function imgchange() {
	picchange(imgIndex);
	homebannerhover();
	if (imgIndex == ($('.leftscroll ul li').size() - 1)) {
		imgIndex = 0;
	} else {
		imgIndex++;
	}
}
function kvbuttonclick(imgIndex) {
	$('.kvbutton ul li').click(function() {
		clearInterval(autochangeimg);
		imgIndex = $(this).index();
		picchange(imgIndex);
		autochangeimg = setInterval('imgchange()', 5000);
	});
}
function picchange(imgIndex) {
	$('.leftscroll ul li a img').stop(true, false).animate({
		opacity : "0"
	}, 'slow', 'swing');
	$('.leftscroll ul li a img').css('display', 'none');
	$('.leftscroll ul li a img').eq(imgIndex).css('display', 'block');
	$('.leftscroll ul li a img').eq(imgIndex).stop(true, false).animate({
		opacity : "1"
	}, 'slow', 'swing');
	$('.b-c-o').toggleClass('b-c-o b-c-c');
	$('.kvbutton li').eq(imgIndex).toggleClass('b-c-o b-c-c');
	/*
	 * if(!($(this).index()==$('.kvbutton li').index('.b-c-o'))){ $('.kvbutton
	 * li').toggleClass('b-c-o b-c-c'); }
	 */
}
function homebannerhover() {
	$('.c-m-d').hover(function() {
		$(this).children('.c-m-down').stop(true, false).animate({
			margin : '-300px 0 0 0'
		}, 500);
	}, function() {
		$(this).children('.c-m-down').stop(true, false).animate({
			margin : '0 0 0 0'
		}, 500);
	});
}
autochangeimg = setInterval('imgchange()', 5000);