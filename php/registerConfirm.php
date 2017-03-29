<?php 
	/*
		code by C.H Chiang
    	function: 客家協會管理平台管理員註冊認證
	*/

	include("connDB.php");
	$ask = $_POST['ask'];
	$name = $_POST['name'];
	$account = $_POST['account'];
	if($ask === "permit"){
		$sql = "UPDATE `server_login` SET `priority`=1 WHERE `account`='$account'";
		$result = mysqli_query($conn, $sql);
		
		if(mysqli_affected_rows($conn)){
			echo "done";
			exit();
		}else{
			echo("register confirm Error description: " . mysqli_error($conn));
			exit();
		}
	}else if($ask === "reject"){
		$sql = "DELETE FROM `server_login` WHERE `account`='$account'";
		$result = mysqli_query($conn, $sql);	
		if(mysqli_affected_rows($conn)){
			echo "done";
			exit();
		}else{
			echo("register confirm Error description: " . mysqli_error($conn));
			exit();
		}
	}
?>
