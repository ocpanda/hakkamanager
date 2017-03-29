<?php include("view/layoutmaster/header.template.php"); ?>
<?php include("view/layout/select.header.php"); ?>
	<div id="container">
			<?php
				include("php/connDB");
				session_start();
				echo "<center><span class='welcome'><loginname>歡迎&nbsp&nbsp".$_SESSION['user']['name']."&nbsp&nbsp進入</loginname>中埔客家協會管理平台</span></center>";
				$sql = "SELECT `email`,`name`,`account`,`priority` FROM `server_login` WHERE `priority` = 9";
				$result = mysqli_query($conn, $sql);
				$numRow = mysqli_num_rows($result);
				$resultArray = array("email" 	=> array(),
								"name" 		=> array(),
								"account" 	=> array(),
								"priority" 	=> array());
				if($numRow > 0){
					while($row = mysqli_fetch_array($result)){
						array_push($resultArray["email"], $row["email"]);
						array_push($resultArray["name"], $row["name"]);
						array_push($resultArray["account"], $row["account"]);
						array_push($resultArray["priority"], $row["priority"]);
					}
				}
			?>
		<div class="row" style="padding-left: 250px; padding-right: 250px; margin-top:30px; margin-bottom: -50px;" id="accessAccountDiv">
			<script>
				var numRow = <?php echo $numRow; ?>;
				var result = <?php echo json_encode($resultArray); ?>;
				if(numRow > 0){
					$("#accessAccountDiv").append("<div class='panel panel-default'><div class='panel-heading'>等待註冊帳號</div><table class='table'><thead><tr><th>#</th><th>信箱</th><th>姓名</th><th>帳號</th><th>通過</th></tr></thead><tbody id='registerTab'></tbody></table></div>");
					for(var i=0; i<numRow; i++){
						var email = result['email'][i];
						var name = result['name'][i];
						var account = result['account'][i];
						$("#registerTab").append("<tr><th>"+i+"</th>"+
						"<th id=email"+i+">"+result['email'][i]+"</th>"+
						"<th id=name"+i+">"+result['name'][i]+"</th>"+
						"<th id=account"+i+">"+result['account'][i]+"</th>"+
						"<th><button id=permitBtn_"+i+">確定</button>&nbsp&nbsp<button id=rejectBtn_"+i+">否決</button></th></tr>");
						$("#permitBtn_"+i).on("click", function(){
							var id = $(this).attr("id");	//將按下按鈕的id編號取出
							var idNum = id.split("_");
							permit($("#account"+idNum[1]).html());
						});
						$("#rejectBtn_"+i).on("click", function(){
							var id = $(this).attr("id");
							var idNum = id.split("_");
							reject($("#account"+idNum[1]).html());
						});
					}
				}
			</script>
		</div>
		<br>
		<br>
		<br>
		<br>
		<br>
		<div class="row">
			<input type="button" value="beacon資料" class="btn btn-default btn0 col-md-2 col-md-offset-5 col-sm-2 col-sm-offset-5 col-xs-2 col-xs-offset-5" onclick="location.href='beacon.php';">
		</div>
		<div class="row">
			<input type="button" value="展物資料" class="btn btn-default btn1 col-md-2 col-md-offset-5 col-sm-2 col-sm-offset-5 col-xs-2 col-xs-offset-5" onclick="location.href='tour.php?page=map';">
		</div>
		<div class="row">
			<input type="button" value="登出" class="btn btn-default btn1 col-md-2 col-md-offset-5 col-sm-2 col-sm-offset-5 col-xs-2 col-xs-offset-5" onclick="location.href='php/logout.php';">
		</div>
	</div>
	<?php include("view/layout/select.footer.php"); ?>
<?php include("view/layoutmaster/footer.template.php"); ?>