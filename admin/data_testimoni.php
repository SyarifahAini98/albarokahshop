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
    <style>
    #kotakUpload{
        border: 1px dashed #38908a;
        border-radius: 5px;
        background: #deface;
        cursor: pointer;
    }
    #kotakUpload{
        min-height: 150px;
        padding: 54px 54px;
        box-sizing: border-box;
    }
    #kotakUpload p{
        text-align: center;
        margin: 2em 0;
        font-size: 16px;
    }
    #inputFile{
        display: none;
    }     
</style>
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
                    <li><a href="#" class="active-menu"><i class="fa fa-comment"></i>Data Testimoni</a></li>
                </ul>
            </div>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">Data Testimoni<!--<small>Responsive tables</small>--></h1>
                    </div>
                </div> 
                <!-- /. ROW  -->
                <br>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">Tabel Data Testimoni</div>
                        <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th><center>No.</center></th>
                                        <th><center>ID Transaksi</center></th>
                                        <th><center>Nama Pelanggan</center></th>
                                        <th><center>Nama Produk</center></th>
                                        <th><center>Testimoni</center></th>
                                        <th><center>Aksi</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include('koneksi.php');
                                    $query=mysqli_query($koneksi,"SELECT * FROM pelanggan,transaksi,detail_transaksi,produk WHERE pelanggan.id_pelanggan=transaksi.id_pelanggan AND transaksi.id_transaksi=detail_transaksi.id_transaksi AND produk.id_produk=detail_transaksi.id_produk AND detail_transaksi.testimoni!='' ORDER BY transaksi.id_transaksi")or die('perintah sql salah');
                                    $no=1;
                                    while($data=mysqli_fetch_assoc($query)){
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><center><?php echo $no;?></center></td>
                                        <td class="center"><center><?php echo $data['id_transaksi'];?></center></td>
                                        <td class="center"><center><?php echo $data['nama_lengkap'];?></center></td>
                                        <td class="center"><center><?php echo $data['nama_produk'];?></center></td>
                                        <td class="center"><center><?php echo $data['testimoni'];?></center></td>
                                        <td class="center"><center>
                                            <!-- <a href="#" data-target="#ubah_data_transaksi"  class="btn btn-primary btn-sm" data-toggle="modal"  <?php echo "id='".$data['id_transaksi']."'";?> <?php echo "data-id='".$data['id_transaksi']."'";?>><i class="fa fa-edit " ></i> &nbsp;Ubah</a> -->
                                            <a href="hapus_data_testimoni.php?id=<?php echo $data['id_detail_trs'];?>"onclick="return confirm(\'Yakin ingin menghapus id '<?php echo $data ['id_transaksi'];?>'?\')" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i> Hapus</a></center>
                                        </td>
                                    </tr>
                                    <?php
                                    $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
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
    <!-- DATA TABLE SCRIPTS -->
    <script src="../assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="../assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
    </script>
</body>
</html>
<?php
}else{
    echo'<script>window.location="index.php"</script>';
}
?>