<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Al - Barokah Shop</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!-- Fontawesome core CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!--GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!--Slide Show Css -->
    <link href="assets/ItemSlider/css/main-style.css" rel="stylesheet" />
    <!-- custom CSS here -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" href="admin/css/style.css" media="screen" type="text/css" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <link rel="shortcut icon" href="images/icon.ico">
</head>
<body>
    <?php
    $connect = mysqli_connect("localhost", "root", "", "al_barokah_shop"); 
    ?>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <?php
            include 'header.php'; ?>
            </div>
        </div>
        <!-- /.container-fluid -->
    </nav>
    <div class="container" style='width:100%; float: left; margin-left:0px; margin-right:0px;'>
        <div class="row">
            <div class="col-md-9" style="width:100%;">
                <div class="row">
                	<table border="0" style="width: 100%;">
                		<tr><td>
                			<img src="images/indexadmin.png">
                		</td>
                			<td>
                			<span href="#" class="button" id="toggle-login"><img src="images/masuk.png"></span>
                			<div id="login">
                				<div id="triangle"></div>
                				<h1>Masuk Pelanggan</h1>
                				<form method="post" name="login" action="prosesmasuk.php">
                                    <center>
                					<table border=0 align="center" cellpadding="5">
                						<tr></tr>
                						<tr><td>Username</td><td>&nbsp;:&nbsp;</td><td><input type="text" name="username"></td></tr>
                                        <tr><td colspan="3">&nbsp;</td></tr>
                						<tr><td>Password</td><td>&nbsp;:&nbsp;</td><td><input type="password" name="password" style="width: 100%; height: 50%;background:#fff;padding: 0%;"></td></tr>
                                        <tr><td colspan="2">&nbsp;</td></tr>
                						<tr><td colspan="2"></td><td><input type="submit" name="submit" value="MASUK"></td></tr>
                					</table>
                                    </center>
                				</form>
                			</div>
                			<!-- /.row -->
                			</td>
                		</tr>
                	</table>
                </div>
                <!-- /.container -->
            </div>
        </div>
    </div>
<?php include'footer.php';?>
</body>
</html>