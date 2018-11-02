$(function(){
	$('.toggle-sidebar').click(function(){
		if($('.sidebar').attr('data-status') == 'open'){
			data = 'close';
		}else{
			data = 'open'
		}
		$(".sidebar").attr("data-status",data);
	});
});