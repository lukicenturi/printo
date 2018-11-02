$(function(){
	var didScroll = false;

	window.onscroll = doThisStuffOnScroll;

	function doThisStuffOnScroll() {
	    didScroll = true;
	}

	setInterval(function() {
	    if(didScroll) {
	        didScroll = false;
	        scroll();
	    }
	}, 100);
	scroll = function(){
		var e = $(this).scrollTop();
	   	if(e>10){
	   		$('.navbar').removeClass('top')
	   	}else{
	   		$('.navbar').addClass('top');
	   	}
	}

	$("[scroll-target]").on('click',function(){
		var nav = $('nav').height();
		var top = $($(this).attr('scroll-target')).position().top;
		var scrollTop = $(window).scrollTop();
		var speed = (top-nav-scrollTop)*2;
		// alert(speed);
		$('html, body').animate({scrollTop : top-nav},speed);
	});
});