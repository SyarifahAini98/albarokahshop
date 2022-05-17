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
                                <li class="active">Transaksi</li>
                            </ol>
                        </div>
                            <a href="javascript: history.go(-1)"><button type="button" class="btn btn-default">Kembali</button></a>
<?php 
    require_once("../admin/koneksi.php");
    if (!isset($_SESSION)) {
        session_start();
    }
    if(isset($_GET["id"]))  
{
  $id=$_GET['id'];
  $query = "SELECT * FROM transaksi,detail_transaksi,produk,pelanggan WHERE transaksi.id_transaksi=detail_transaksi.id_transaksi AND pelanggan.id_pelanggan=transaksi.id_pelanggan AND produk.id_produk=detail_transaksi.id_produk AND pelanggan.id_pelanggan=transaksi.id_pelanggan AND transaksi.id_transaksi = '$id' AND transaksi.status='Terbayar' OR transaksi.status='Belum Upload' OR transaksi.status='Terkirim' GROUP BY transaksi.id_transaksi ORDER BY transaksi.id_transaksi";
  $result = mysqli_query($koneksi, $query);
$result = mysqli_query($koneksi, $query);
?>
<center>

  <div id="tabel_pemesanan"> 
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="dataTables-example"> 
        <thead>
          <tr>
            <th><center>No.</center></th>
            <th><center>ID Detail Pemesanan</center></th>
            <th><center>ID Transaksi</center></th>
            <th><center>Nama Produk</center></th>
            <th><center>Qty</center></th>
            <th><center>Total Harga</center></th>
          </tr>
        </thead>
        <?php
        $no=1;
        while($row = mysqli_fetch_array($result))
          {
        ?>
        <tr class="odd gradeX">
          <?php
          echo'
          <td><center>'.$no.'</center></td>
          <td><center>'.$row["id_detail_trs"].'</center></td>
          <td><center>'.$row["id_transaksi"].'</center></td>
          <td>'.$row["nama_produk"].'</td>
          <td><center>'.$row["qty"].'</center></td>
          <td><center>'.$row["total_harga"].'</center></td>';?>
        </tr>
        <?php
        $no++;
        }
        ?>
      </table>
    </div>
  </div>
</center>
<?php } ?>

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