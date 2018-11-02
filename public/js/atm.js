$(function(){
	$('#transfer').click(function(e){
		e.preventDefault();
		to = $('#to').val();
		amount = $('#amount').val();
		token = $("meta[name='_token']").attr('content');
		redirect = $('#redirect').val();

		$.ajax({
			type:'get',
			url:redirect+"?to="+to,
			success:function(response){
				if(response.status == '0'){
					alert("Account Number Not Found");
				}else{
					var a = confirm("Are you sure to transfer to \nBank: "+response.bank+"\nAccount Number: "+to+"\nIn the name of: "+response.atasnama+"\nAmount:"+amount);
					if(a == true){
						atmpay = $("#atmpay").val();
						location.href = atmpay+"?to="+to+"&amount="+amount;
					}
				}
			}
		})
	})
})