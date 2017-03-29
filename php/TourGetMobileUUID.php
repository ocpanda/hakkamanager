<?php  
/**
 * 檢查使用者是否使用過此App 並記錄下使用者手機UUID
	 
		資料庫位置: 140.130.35.62
		資料庫名稱: 40343142
		資料表名稱: user
		接收方式: post
		接收資料: deviceID
		作用: 裝置UUID
 */
	include("connDB.php");
	header("Content-type: text/html; charset=utf8");

	$sql = "SELECT `uuid` FROM `app_user` WHERE `uuid`='".$_POST['deviceID']."'";
	$result = mysqli_query($conn, $sql);
	$row_result = mysqli_fetch_assoc($result);
	if(isset($row_result)){
		echo "使用者已完成登記過!";
		exit();
	}

	$sql = "INSERT INTO `app_user` (`uuid`) VALUES ('".$_POST['deviceID']."')";
	mysqli_query($conn, $sql);
	if(mysqli_affected_rows($conn)){
		echo "使用者加入成功!";
	}
	else{
		echo "使用者加入失敗!";
	}
	exit();
?>