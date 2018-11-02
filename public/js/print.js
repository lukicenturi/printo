$(function(){
	current = null;
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN' : $("#meta").attr('content')
		}
	});

	var kode = $("#kodeprint").val();
	$('#deliver').change(function(){
		if($(this).is(':checked')){
			$(".address-setup").show();
		}else{
			$(".address-setup").hide();
		}
	});

	$("#deliver").change();

	$(".drop-inside").on("drag dragover dragleave dragenter dragend drop", function(e){
		e.stopPropagation();
		e.preventDefault();
	}).on('dragover dragenter',function(e){
		$(".drop").addClass('is-drag');
	}).on('drop dragleave dragend', function(e){
		$(".drop").removeClass("is-drag");
	}).on('drop', function(e){
		e = e.originalEvent.dataTransfer.files[0];
		setFile(e);
	});
	$("#file").on('change',function(e){
		e = e.originalEvent.target.files[0];
		setFile(e);
	});	
	function setFile(e){
		name = e.name;
		type = name.split('.')[1];
		allowed = ['pdf','doc','docx'];
		if(allowed.indexOf(type) == -1){
			return alert("Please only select pdf, doc, or docx file");
		}
		current = e;
		path = $("#resicon").val();
		kode = $("#kodeprint").val();
		printpath = $("#printpath").val();


		var formdata = new FormData();
		formdata.append('e',e);
		formdata.append('kode',kode);
		formdata.append('type',type);
		$.ajax({
			type:'post',
			processData:false,
			contentType:false,
			url:$("#form-print").attr('upload'),
			data:formdata,
			dataType:'json',
			async:false,
			success:function(response){
				console.log(response);
			}
		})

		$('.list-file').addClass('active');
		$('.list-file img').attr('src',path+"/"+type+'.png');
		$('.list-file .name').html(name);
	}

	$("#print").click(function(e){
		e.preventDefault();
		kode = $("#kodeprint").val();
		size = $("[name='size']").val();
		copies = $("[name='copies']").val();
		deliver = $("[name='deliver']").is(":checked");
		address = $("[name='address']").val();
		city = $("[name='city']").val();
		province = $("[name='province']").val();
		postal_code = $("[name='postal_code']").val();

		redirectpath = $("#redirectpath").val();
		name = current.name;
		type = name.split('.')[1];
		var formData = new FormData();

		formData.append("type",type);
		formData.append('e',current);
		formData.append('kode',kode);
		formData.append('size',size);
		formData.append('copies',copies);
		formData.append('deliver',deliver);
		formData.append('address',address);
		formData.append('city',city);
		formData.append('province',province);
		formData.append('postal_code',postal_code);

		console.log(formData);
		url = $('#form-print').attr('action');

		$.ajax({
			type:'post',
			url:url,
			data:formData,
			processData:false,
			async:false,
			contentType:false,
			dataType:'json',
			success:function(response){
				console.log(response);
				location.href=redirectpath+"/"+kode;
				console.log(redirectpath+"/"+kode);				
			},
			error:function(response){
				errorMessage = "";
				if(response.status == 422){
					error = response.responseJSON;
					$.each(error, function(k,v){
						errorMessage += v + '<BR>'
					})

				div= document.createElement('div');
				div.classList.add('alert');
				div.classList.add('alert-danger');
				$(div).append("<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>");
				$(div).append(errorMessage);
				$('.container-message').append(div);
				}
			}
		});
	})
})