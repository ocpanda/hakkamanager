<?php
	/*
		code by C.H Chiang
    	function: 資料庫連線
	*/
	/*實作 Cross-Origin Resource Sharing (CORS) 解決 Ajax 發送跨網域存取 Request*/
	header('Access-Control-Allow-Origin: http://localhost:8000');
	header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
	header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Accept');


	//設定database位置 登入帳號
	$servername = "localhost";
	$username = "hakka";
	$password = "y vmp454ej/ ";
	$dbname = "hakka_tour";

	$conn = new mysqli($servername, $username, $password, $dbname);
	mysqli_set_charset($conn, "utf8");
?>