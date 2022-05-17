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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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
    <script>
    $(function(){
        //ini yang akan menampilkan window untuk memilih file ketika kotak upload diklik
        $("#kotakUpload").click(function(){
            $("#inputFile").click();
        });
        
        //mencegah browser dari membuka file ketika didrag and drop
        $(document).on('drop dragover', function (e) {
            e.preventDefault();
        });

        //memanggil fungsi untuk menangani file upload saat milih File
        $('input[type=file]').on('change', fileUpload);
    });

    function fileUpload(event){
        //memberitahu pengguna tentang status file upload
        $("#kotakUpload").html(event.target.value+" mengupload...");
        
        //mendapatkan file yang dipilih
        files = event.target.files;
        
        //memeriksa data form 
        var data = new FormData();                                   

        //file data is presented as an array
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            if(!file.type.match('image.*')) {              
                //memeriksa format file
                $("#kotakUpload").html("Silakan pilih file gambar.");
            }else if(file.size > 1048576){
                //memeriksa ukuran file (dalam bytes)
                $("#kotakUpload").html("Maaf, file Anda terlalu besar (melebihi 1 MB)");
            }else{
                //menambahkan file yang dapat diunggah ke objek FormData
                data.append('file', file, file.name);
                
                //membuat XMLHttpRequest baru
                var xhr = new XMLHttpRequest();     
                
                //data file post yang untuk diupload
                xhr.open('POST', 'upload_profil.php', true);  
                xhr.send(data);
                xhr.onload = function () {
                    console.log(xhr)
                    //mendapatkan respon dan menunjukkan status upload
                    var response = JSON.parse(xhr.responseText);
                    if(xhr.status === 200 && response.status == 'ok'){
                        $("#kotakUpload").html("File telah berhasil diupload. Klik untuk mengupload file lainnya.");
                        console.log('uploaded')
                    }else if(response.status == 'type_err'){
                        $("#kotakUpload").html("Silakan pilih file gambar. Klik untuk mengupload file lainnya.");
                    }else{
                        console.log('gagal upload')
                        console.log(xhr)
                        $("#kotakUpload").html("Ada sedikit masalah, silakan coba lagi.");
                    }
                };
            }
        }
    }
    </script>
</head>
<body>
    <div id="wrapper">
        <?php include'header.php';?>
        <nav class="navbar-default navbar-side" role="navigation">
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
                                    <form role="form" action="ubah_proses_profil.php?username=<?php echo $_SESSION['user'];?>" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <img src="../images/<?php echo $_SESSION['foto_admin'];?>" height="215px" width="225px"><br>
                                            <input type="hidden" name="fotoawal" value="<?php echo $_SESSION['foto_admin'];?>" />
                                            <input type="file" name="foto">
                                        </div>
                                </div>
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nama</label><br>
                                            <input type="text" name="nama" value="<?php echo $_SESSION['nama'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label><br>
                                            <input type="text" name="user" value="<?php echo $_SESSION['user'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label><br>
                                            <input type="text" name="pass" value="<?php echo $_SESSION['pass'];?>">
                                        </div>
                                        <div class="form-group">
                                            <input class="btn btn-primary btn-sm" type="submit" name="ubah" value="Ubah">
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