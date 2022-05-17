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
</head>
<body>
    <div id="wrapper">
        <?php include'header.php';?>
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
            <div id='cssmenu'>
                <ul class="nav" id="main-menu">
                    <li><center><img src="../images/foto_admin.png" height="115px" width="125px"><br><font color="white">Nissa Syaban</font></center><br></li>
                    <li><a href="data_produk.php"><i class="fa fa-boxes"></i>Data Produk</a></li>
                    <li><a href="#" class="active-menu"><i class="fa fa-user"></i>&nbsp;Data Pelanggan</a></li>
                    <li><a href="data_pemesanan.php"><i class="fa fa-shopping-cart"></i>Data Pemesanan</a></li>
                    <li><a href="data_transaksi.php"><i class="fa fa-hand-holding-usd"></i>Data Transaksi</a></li>
                    <li><a href="data_testimoni.php"><i class="fa fa-comment"></i>Data Testimoni</a></li>
                </ul>
            </div>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">Data Produk<!--<small>Responsive tables</small>--></h1>
                    </div>
                </div> 
                <!-- /. ROW  -->
                <br>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">Tabel Data Pelanggan</div>
                        <div class="panel-body"><a href="#" class="btn btn-success btn-sm" data-target="#tambah_data_produk"  class="btn btn-primary btn-sm" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Data</a><br><br>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th><center>No.</center></th>
                                        <th><center>ID Pelanggan</center></th>
                                        <th><center>Username</center></th>
                                        <th><center>Email</center></th>
                                        <th><center>Nama</center></th>
                                        <th><center>Jkel</center></th>
                                        <th><center>Foto</center></th>
                                        <th><center>No Telp</center></th>
                                        <th><center>Alamat</center></th>
                                        <th><center>Aksi</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include('koneksi.php');
                                    $query=mysqli_query($koneksi,"SELECT * FROM pelanggan ORDER BY id_pelanggan")or die('perintah sql salah');
                                    $no=1;
                                    while($data=mysqli_fetch_assoc($query)){
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><center><?php echo $no;?></center></td>
                                        <td class="center"><center><?php echo $data['id_pelanggan'];?></center></td>
                                        <td class="center"><center><?php echo $data['username'];?></center></td>
                                        <td class="center"><center><?php echo $data['email'];?></center></td>
                                        <td class="center"><center><?php echo $data['nama_lengkap'];?></center></td>
                                        <td class="center"><center><?php echo $data['jkel'];?></center></td>
                                        <td class="center"><center><?php echo '<img src="../images/'.$data['foto'].'" height="50px" width="50px">';?></center></td>
                                        <td class="center"><center><?php echo $data['no_telp'];?></center></td>
                                        <td class="center"><center><?php echo $data['alamat'];?></center></td>
                                        <td class="center"><center>
                                            <a href="#" data-target="#ubah_data_produk"  class="btn btn-primary btn-sm" data-toggle="modal"  <?php echo "id='".$data['id_pelanggan']."'";?> <?php echo "data-id='".$data['id_pelanggan']."'";?>><i class="fa fa-edit " ></i> &nbsp;Ubah</a>
                                            <a href="hapus_data_produk.php?id=<?php echo $data['id_pelanggan'];?>"onclick="return confirm(\'Yakin ingin menghapus id '<?php echo $data ['id_pelanggan'];?>'?\')" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i> Hapus</a></center>
                                        </td>
                                    </tr>
                                    <?php
                                    $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
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

    <!-- Javascript untuk popup modal Edit--> 
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap Js -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
    <!-- DATA TABLE SCRIPTS -->
    <script src="../assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="../assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
    </script>
    <!--  <script type="text/javascript">
    $(document).ready(function () {
    $("#ubah_data_produk").click(function(e) {
    var m = $(this).attr("data-id");
    $.ajax({
    url: "popup_modal_edit_data.php",
    type: "GET",
    data : {id: m,},
    success: function (ajaxData){
    $("#ubah_data_produk").html(ajaxData);
    $("#ubah_data_produk_id").modal('show',{backdrop: 'true'});
    }
    });
    });
    });
    </script> -->
    <script type="text/javascript">
    $(document).ready(function(){
        $('#ubah_data_produk').click(function (e) {
            var rowid = $(e.relatedTarget).data('id');
            var m = $(this).attr("data-id");
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'popup_modal_edit_data.php',
                data :  'idx='+ m,
                success : function(data){
                $('.hasil-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
    </script>
    <!-- Custom Js -->
    <script src="../assets/js/custom-scripts.js"></script>
    <?php include'popup_modal_edit_data.php';?>
    <?php include'tambah_data_produk.php';?>

</body>
</html>