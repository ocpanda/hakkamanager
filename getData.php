<!DOCTYPE html>
<html>
<head>
	<title>sss</title>
	<script src="web_api/jquery/jquery-2.2.4.min.js"></script>
</head>
<body>
	<script type="text/javascript">
		var data={kind: "你好", open: 0};
		$.ajax({
			url:"http://140.130.35.62/csie40343142/Tour_System_server/php/test.php",
			type:"POST",
			data: data,
			success: function(result){

			},
			error: function(result){

			}
		});
	</script>
</body>
</html>