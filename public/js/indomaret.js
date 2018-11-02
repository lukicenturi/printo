$(function(){
	$('#transfer').click(function(e){
		e.preventDefault();
		code = $('#code').val();
		amount = $('#amount').val();
		token = $("meta[name='_token']").attr('content');
		redirect = $('#redirect').val();

		$.ajax({
			type:'get',
			url:redirect+"?code="+code,
			success:function(response){
				if(response.status == '0'){
					alert("Code Not Found");
				}else{
					var a = confirm("Description: \nFor: PRINTO COIN \nCoin: "+response.coin+" \nAmount: "+response.pay);
					if(a == true){
						indomaretpay = $("#indomaretpay").val();
						location.href = indomaretpay+"?code="+code;
					}
				}
			}
		})
	})
})