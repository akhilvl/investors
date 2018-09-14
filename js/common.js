function syncNewAjax(formId, task, reference, callBacKF, data = ''){
	$('.loading-image').show();
	if(formId == ''){
		var formData = data;
	}
	else{
		var formData = $('#'+formId).serialize();
	}
 	$.ajax({
		url: "ajax.php?task="+task+"&reference="+reference,
		type: "POST",
		data: formData,
		success: function(jsonReply){
			ajaxOutData = jsonReply;
			$('.loading-image').hide();
			if(callBacKF != ''){
				//eval(callBacKF + "()");
				window[callBacKF](); 
			}
		},
		complete: function(){
			$('.loading-image').hide();
		}
	});
}

function refresh(){
	var reply = $.parseJSON(ajaxOutData);
	if(reply.message != undefined){
		alert(reply.message);
	}
	if(reply.status == 'success'){
		location.reload();
	}
}
