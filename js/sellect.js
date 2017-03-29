function permit(account){
	var data = {ask: "permit", account: account};
	$.ajax({
		url: "php/registerConfirm.php",
		type: "POST",
		data: data,
		dataType: "text",
		success: function(result){
			if(result === "done"){
				alert("認證完成!");
				location.replace(location);
			}else{
				alert("更新認證失敗! 請聯繫技術人員");
			}
			
		},
		error: function(){
			alert("認證失敗! 請聯繫技術人員!");
		}
	});
}

function reject(account){
	var data = {ask: "reject", account: account};
	$.ajax({
		url: "php/registerConfirm.php",
		type: "POST",
		data: data,
		dataType: "text",
		success: function(result){
			if(result === "done"){
				alert("註冊取消完成!");
				location.replace(location);
			}else{
				alert("更新註冊取消失敗! 請聯繫技術人員");
			}
		},
		error: function(){
			alert("註冊取消失敗! 請聯繫技術人員!");
		}
	});
}