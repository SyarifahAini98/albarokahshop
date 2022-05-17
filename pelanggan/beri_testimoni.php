<?php
session_start();
if(isset($_SESSION['user'])){
?>
<html>
<head><title></title>
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
    <script src="../admin/jquery-2.2.4.min.js"></script>
    <script src="../admin/process.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
</head>
<body>

    <?php
    include'sumber_header.php';
    ?>

    <nav class="navbar navbar-default" role="navigation" style="overflow:hidden; position: fixed; top:0; width: 100%;z-index: 3;">
        <div class="container-fluid">
            <?php include 'header.php';?>
        </div>
        <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <?php
    include'sidebar_kiri.php';?>
        <div class="container" style='width:50%; float: left; width: 50%; margin-left:0px; margin-right:0px; margin-top: 65px;"'>
            <div class="row">
                <div class="col-md-9" style="width:100%;">
                <!-- /.row -->
                    <div class="row">
                        <div>
                            <ol class="breadcrumb">
                                <li><a href="index.php">Beranda</a></li>
                                <li><a href="profil_pelanggan.php">Profil</a></li>
                                <li><a href="keranjang.php">Keranjang</a></li>
                                <li><a href="transaksi.php">Transaksi</a></li>
                                <li class="active">Testimoni</li>
                            </ol>
                        </div>
<?php 
    require_once("../admin/koneksi.php");
    if (!isset($_SESSION)) {
        session_start();
    }
    $id=$_GET['id'];
?>
<center>

  <div id="tabel_pemesanan"> 
    <div class="table-responsive">
      <table> 
            <form action="" method="POST">
            <tr><td><center><input type="text" name="testimoni" style="height:200px;width:300px;"></center></td></tr>
            <tr><td>&nbsp;</tr>
            <tr><td><center><input type="submit" name="kirim" value="Kirim"></center></tr>
          </tr>
            </form>
      </table>
    </div>
  </div>
</center>
<?php
if(isset($_POST['kirim'])){
  $testimoni=$_POST['testimoni'];
  $update=mysqli_query($koneksi,"UPDATE detail_transaksi SET testimoni='$testimoni' WHERE id_detail_trs='$id'")or die(mysqli_error());
  if($update){
    echo'<script>window.location="testimoni.php"</script>';
}
}
?>

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </div>
        </div></div>
<?php include'sidebar_kanan.php';?>
<?php include'footer.php';?>
</body>
</html>
<?php
}else{
    echo'<script>window.location="../masuk.php"</script>';
}
?>