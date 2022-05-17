<?php
session_start();
if(isset($_SESSION['user'])){
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Al - Barokah Shop</title>
    <!-- Bootstrap Styles-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/fontawesome-free-5.5.0-web/css/all.css"/>
    <link rel="stylesheet" href="../assets/fontawesome-free-5.5.0-web/css/font-awesome/css/font-awesome.min.css"/>
    <link href="../assets/fontawesome-free-5.5.0-web/css/fontawesome.min.css" rel="stylesheet" />-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- Morris Chart Styles-->
    <!-- Custom Styles-->
    <link href="../assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- TABLE STYLES-->
    <link href="../assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/stylesmenu.css">
    <script src="jquery-2.2.4.min.js"></script>
    <script src="process.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
</head>
<body>
    <div id="wrapper">
        <?php include'header.php';?>
        <nav class="navbar-default navbar-side" role="navigation" style="background-color: #09192A;">
            <div class="sidebar-collapse">
            <div id='cssmenu'>
                <ul class="nav" id="main-menu"><br><br>
                    <li><center><img src="../images/<?php echo $_SESSION['foto_admin'];?>" height="115px" width="125px"><br><font color="white"><?php echo $_SESSION['nama'];?></font></center><br></li>
                    <li><a href="data_produk.php?username=<?php echo $_SESSION['user'];?>"><i class="fa fa-boxes"></i>Data Produk</a></li>
                    <li><a href="data_pelanggan.php?username=<?php echo $_SESSION['user'];?>"><i class="fa fa-user"></i>&nbsp;Data Pelanggan</a></li>
                    <li><a href="data_pemesanan.php?username=<?php echo $_SESSION['user'];?>"><i class="fa fa-shopping-cart"></i>Data Pemesanan</a></li>
                    <li><a href="data_transaksi.php?username=<?php echo $_SESSION['user'];?>"><i class="fa fa-hand-holding-usd "></i>Data Transaksi</a></li>
                    <li><a href="data_testimoni.php?username=<?php echo $_SESSION['user'];?>"><i class="fa fa-comment"></i>Data Testimoni</a></li>
                </ul>
            </div>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">Profil Admin<!--<small>Responsive tables</small>--></h1>
                    </div>
                </div> 
                <!-- /. ROW  -->
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">Profil Admin</div>
                        <div class="panel-body">
                            <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form">
                                        <div class="form-group">
                                            <img src="../images/<?php echo $_SESSION['foto_admin'];?>" height="215px" width="225px">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-6">
                                    <form role="form">
                                        <div class="form-group">
                                            <label>Nama</label><br>
                                            <?php echo $_SESSION['nama'];?>
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label><br>
                                            <?php echo $_SESSION['user'];?>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label><br>
                                            <?php echo $_SESSION['pass'];?>
                                        </div>
                                        <div class="form-group">
                                            <a href="ubah_profil.php?username=<?php echo $_SESSION['user'];?>" class="btn btn-primary btn-sm"><i class="fa fa-edit " ></i> &nbsp;Ubah</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
            <!-- /. ROW  -->
            </div>
            <footer><?php include'footer.php';?></footer>
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
</body>
</html>
<?php
}else{
    echo'<script>window.location="index.php"</script>';
}
?>