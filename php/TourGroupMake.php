<?php
/* 處理群組創建
		資料庫位置: 140.130.35.62
		資料庫名稱: 40343142
		資料表名稱: groups
		接收方式: POST
		接收資料: groupName   群組名稱
				  groupOpen   群組權限
		傳送型態: text  回應訊息*/  
	include("connDB.php");
	header("Content-type: text/html; charset=utf8");
	
	$sql = "SELECT `name` FROM `groups` WHERE `name`='".$_POST['groupName']."'";
	$result=mysqli_query($conn, $sql);
	$row_result = mysqli_fetch_assoc($result);
	//判斷是否有重複的群組 有的話不執行加入動作
	if(isset($row_result)){
		echo "群組名稱重複";
		exit();
	}

	$data_groupOpen = $_POST['groupOpen'];



	if($data_groupOpen == "on"){
		$data_groupOpen = 0;
	}
	else{
		$data_groupOpen = 1;
	}

	if($_POST['groupPass'] != "NULL"){
		//密碼透過Bcrypt hashing加密
		$password = $_POST['groupPass'];
		$hashPass = password_hash($password, PASSWORD_DEFAULT);
		//加密後驗證是否加密成功
		if(!password_verify($password, $hashPass)){
			echo "建立失敗!";
			exit();
		}
	}else{
		$hashPass = "NULL";
	}

	$sql = "INSERT INTO `groups` (`name`, `priority`, `password`) VALUES ('".$_POST['groupName']."', '$data_groupOpen','".$hashPass."')";
	$result = mysqli_query($conn, $sql);
	if(mysqli_affected_rows($conn)){
		echo "建立成功!";
	}
	else{
		echo "建立失敗!";
	}
	exit();
?>