<html>
<head><title>Al - Barokah Shop</title>
<?php include"../css/css.css"; ?>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
    <!-- Bootstrap Styles-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="../assets/css/custom-styles.css" rel="stylesheet" />
</head>
<body>
	<div class="header"></div>
	<div class="main">
		<div class="col-lg-6"><font size="6"><b>AL-BAROKAH</b></font><br><br><br>
			<img src="../images/indexadmin.png">
		</div>
		<div class="col-lg-6">
			<span href="#" class="button" id="toggle-login"><img src="../images/masuk.png"></span>
			<div id="login">
				<div id="triangle"></div>
				<h1>Masuk Administrator</h1>
				<form action="cek_login.php" method="POST">
					<input type="username" placeholder="Username" name="username" required="" />
					<input type="password" placeholder="Password" name="password" required="" />
    				<input type="submit" value="MASUK" name="masuk"/>
  				</form>
			</div>
		</div>
	</div>
	<?php include'footer.php';?>
</body>
</html>