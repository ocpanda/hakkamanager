<?php 
	/**
	 * 處理加入群組
	 * 資料庫位置: 140.130.35.62
	 * 資料庫名稱: 40343142
	 * 資料表名稱： app_userGroup
	 * 接收方式: POST
	 * 接收資料:joinGroup  使用者想加入的群組
	 *          joinName   使用者名稱
	 *          joinPass   群組密碼
	 * 回傳型態:text 回應訊息
	 */
	include("connDB.php");
	header("Content-type: text/html; charset=utf8");

	$userUUID = $_POST['userUUID'];
	$userJoinGroup = $_POST['joinGroup'];
	$userJoinName = $_POST['joinName'];
	$userJoinPass = $_POST['joinPass'];
	
	$sql = "SELECT * FROM `groups` WHERE `name`='$userJoinGroup'";
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_array($result)){
		if($userJoinPass != "NULL"){
			if(!password_verify($userJoinPass, $row['password'])){
				echo "密碼輸入不正確";
				mysqli_close($conn);
				exit();
			}
		}
		$userJoinGroup = $row['id'];
	}

	$sql = "SELECT `userID` FROM `app_userGroup` WHERE `userID`='$userUUID' AND `groupID`='$userJoinGroup'";
	$result = mysqli_query($conn, $sql);
	$row_result = mysqli_fetch_assoc($result);
	if(isset($row_result)){
		echo "已加入此群組";
		mysqli_close($conn);
		exit();
	}
	
	$sql = "INSERT INTO `app_userGroup` (`userID`, `groupID`, `userName`) VALUES ('".$userUUID."', '".$userJoinGroup."','".$userJoinName."')";
	mysqli_query($conn, $sql);
	if(mysqli_affected_rows($conn)){
		echo "建立成功!";
		mysqli_close($conn);
	}
	else{
		echo "建立失敗!";
		mysqli_close($conn);
	}
	exit();
?>