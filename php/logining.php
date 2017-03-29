<!-- /*
	登入
*/ -->

<?php
	include("connDB.php");
	$nameIn = $_POST['nameIn'];
	$passIn = $_POST['passIn'];
	$passwordSHA = sha1($passIn);

	$sql = "SELECT * FROM `server_login` WHERE `account` = '$nameIn' AND `password` = '$passwordSHA'";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) > 0){
		//登入成功
		session_start();
		$_SESSION['user'] = mysqli_fetch_array($result);
		if($_SESSION['user']['priority'] == 9){
?>
			<script type="text/javascript">
				alert("帳號尚未開通請聯絡超級管理員!");
			</script>
<?php
			session_destroy();
			header("Location: ../index.php");
		}
		header("Location: ../sellect.php");
	}
	else{
		//登入失敗
		// echo $passwordSHA;
		header("Location: ../");
	}
?>
