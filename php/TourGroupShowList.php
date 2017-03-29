<?php
	 /* 傳送目前所有群組
		資料庫位置: 140.130.35.62
		資料庫名稱: hakka
		資料表名稱: groups
		傳送方式: POST
		傳送型態: json*/
		include("connDB.php");
		header("Content-type: text/html; charset=utf8");
		$sql = "SELECT DISTINCT `name`,`priority` FROM `groups`";
		$resultArray = array('name' => array(), 
							 'priority' => array());
		$result = mysqli_query($conn, $sql);
		while ($row = mysqli_fetch_array($result)) {
			array_push($resultArray['name'], $row['name']);
			array_push($resultArray['priority'], $row['priority']);
		}
		echo json_encode($resultArray);
		exit();
?>