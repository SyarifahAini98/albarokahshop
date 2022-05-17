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
</style><script>
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
    $("#kotakUpload").html(event.target.value+" File Telah Terupload...");
    
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
            xhr.open('POST', 'upload.php', true);  
            xhr.send(data);
            xhr.onload = function () {
                //mendapatkan respon dan menunjukkan status upload
                var response = JSON.parse(xhr.responseText);
                if(xhr.status === 200 && response.status == 'ok'){
                    $("#kotakUpload").html("File telah berhasil diupload.");
                }else if(response.status == 'type_err'){
                    $("#kotakUpload").html("Silakan pilih file gambar. Klik untuk mengupload file lainnya.");
                }else{
                    $("#kotakUpload").html("Ada sedikit masalah, silakan coba lagi.");
                }
            };
        }
    }
}
</script>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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
<?php 
    require_once("../admin/koneksi.php");
    if (!isset($_SESSION)) {
        session_start();
    }
    if(isset($_GET["id"]))  
{
  $id=$_GET['id'];
  $_SESSION['id_trs']=$id;
?>
<a href="javascript: history.go(-1)"><button type="button" class="btn btn-default">Kembali</button></a>
<center>
    <form>      
        <div id="kotakUpload">
            <p>Upload Bukti Transaksi</p>
        </div>
        <input type="file" name="inputFile" id="inputFile" />
    </form>
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