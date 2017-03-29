<?php
	/*
		code by C.H Chiang
    	function: 創建管理員帳號
	*/
	include("connDB.php");
	$emailIn = $_POST['emailIn'];
	$unameIn = $_POST['unameIn'];
	$nameIn = $_POST['nameIn'];
	$passIn = $_POST['passIn'];

	$sql = "SELECT * FROM `server_login` WHERE `account` = '$nameIn' AND `name` = '$unameIn'";
	$result = mysqli_query($conn, $sql);
	if(!$result){
		echo("user data check Error description: " . mysqli_error($conn));
	}
	$row_result = mysqli_fetch_assoc($result);
	if(isset($row_result)){
		echo "帳號重複";
		exit();
	}

	$passwordSHA = sha1($passIn);
	$sql = "INSERT INTO `server_login` (`email`, `name`, `account`, `password`, `priority`) VALUES ('$emailIn','$unameIn','$nameIn','$passwordSHA', 9)";
	$result = mysqli_query($conn, $sql);
	if(!$result){
		echo("add user Error description: " . mysqli_error($conn));
	}
	if(mysqli_affected_rows($conn)){
		echo "<script>alert('可以建立帳號 請聯絡超級管理員開通帳號!');location.href='../index.php'</script>";
	}
	else{
		echo "<script>alert('建立失敗!');location.href='../register.php'</script>";
	}
	exit();
?>