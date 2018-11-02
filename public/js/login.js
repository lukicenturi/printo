$(function(){
	$('form input').focus(function(){
		// alert('ads');
		$(this).next('label').addClass("focus");
	});

	$('form input').blur(function(){
		var val = $(this).val();
		if(val==""){
			$(this).next('label').removeClass('focus');
		}
	});
	$('form input').blur();
})