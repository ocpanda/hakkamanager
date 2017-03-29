<?php include("view/layoutmaster/header.template.php"); ?>
<?php include("view/layout/index.header.php"); ?>
<style>

</style>
</head>
<body>
	<div id="container">
			<div class="row">
				<?php
					echo "<center><span class='welcome'><loginname>中埔客家協會</loginname>管理平台</span></center>";
				?>
			</div>
			<br><br><br><br>
			<form action="php/logining.php" method="post">
				<div class="row">
					<div id="usernameInput" class="input-group col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-6 col-xs-offset-3">
						<span class="input-group-addon" id="basic-addon1">帳號</span>
						<input type="text" class="form-control" placeholder="Username" name="nameIn" aria-describedby="basic-addon1">
					</div>
				</div>
				<br>
				<div class="row">
					<div id="passwordInput" class="input-group col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-6 col-xs-offset-3">
						<span class="input-group-addon" id="basic-addon1">密碼</span>
						<input type="password" class="form-control" placeholder="Password" name="passIn" aria-describedby="basic-addon1">
					</div>
				</div>
				<br>
				<div class="row">
					<input type="submit" value="登入" class="btn btn-default col-md-2 col-md-offset-5 col-sm-2 col-sm-offset-5 col-xs-2 col-xs-offset-5">
				</div>
			</form>
	</div>
	<?php include("view/layout/index.footer.php"); ?>
<?php include("view/layout/footer.template.php"); ?>