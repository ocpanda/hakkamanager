<?php
	/* 用於接收使用者端傳送來的beacon數值
		資料庫位置: 140.130.35.62
		資料庫名稱: 40343142
		資料表名稱: Tour_System_User
		傳送方式: POST
		接收資料: beacon name
				  beacon rssi
		作用: beacon name 用於辨識使用者接收到的beacon裝置*/  
	/*include("connDB.php");
	header('Content-type: text/html; charset=utf8');
	$data = $_POST;
	$data_beaconName = $_POST['beacon_Name'];
	$sql = "INSERT INTO `Tour_System_User` (`beacon_Name`,`beacon_rssi`) VALUES ('$data_beaconName', '$data_beaconRSSI')";
	$result = mysqli_query($conn, $sql);

	//echo json_encode($data);
	if(mysqli_affected_rows()){
		//新增成功
		//回傳成功資訊
		echo json_encode($data);
		return;
	}
	else{
		//新增失敗
		//回傳失敗資訊
		echo json_encode($data);
		return;
	}*/
?>