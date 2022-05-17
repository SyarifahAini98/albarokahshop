<?php
session_start();
if(isset($_SESSION['user'])){
?>
    <?php
    include'sumber_header.php';
    ?>

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

    <script src="../bower_components/jquery/jquery.min.js"></script>
        <div class="container" style='width:50%; float: left; width: 50%; margin-left:0px; margin-right:0px; margin-top: 65px;"'>
            <div class="row">
                <div class="col-md-9" style="width:100%;">
                <!-- /.row -->
                    <div class="row">
                        <div>
                            <ol class="breadcrumb">
                                <li><a href="index.php">Beranda</a></li>
                                <li class="active">Profil</li>
                                <li><a href="keranjang.php">Keranjang</a></li>
                                <li><a href="transaksi.php">Transaksi</a></li>
                                <li><a href="pemberitahuan.php">Pemberitahuan</a></li>
                            </ol>
                        </div>
                            <center>
                                <form action="ubah_proses_profil.php?username=<?php echo $_SESSION['user'];?>" method="POST">
                            <table border="0" width="100%" style="padding: 5px;border-spacing:5px;border-collapse: separate;">
                                <tr><td width="35%" rowspan="10"><!-- 
                                    <div class="thumbnail product-box"> -->
                                        <center>
                                        <img src="../images/images_pelanggan/<?php echo $_SESSION["foto"]; ?>" style="height:175px; width:175px;"></center>
                                        <input type="hidden" name="fotoawal" value="<?php echo $_SESSION['foto'];?>" />
                                        <input type="file" name="foto">
                                        <!-- 
                                    </div> -->
                                    </td>
                                    <td colspan="3"><h4><b><input type="text" name="nama" value='<?php echo $_SESSION["nama"]; ?>'></b></h4></td></tr>
                                <tr><td colspan="3"></td></tr>
                                <tr><td width="15%">Username</td><td width="2%">:</td><td><input type="text" name="user" value='<?php echo $_SESSION["user"]; ?>'></td></tr>
                                <tr><td>Password</td><td>:</td><td><input type="text" name="pass" value='<?php echo $_SESSION["pass"]; ?>'></td></tr>
                                <tr><td>Email</td><td>:</td><td><input type="text" name="email" value='<?php echo $_SESSION["email"]; ?>'></td></tr>
                                <tr><td>Jkel</td><td>:</td><td>
                                <input name="jkel" type="radio" value="L" required="" <?php if($_SESSION['jkel']=='L'){echo'checked';}?>>Laki-Laki
                                <input name="jkel" type="radio" value="P" required="" <?php if($_SESSION['jkel']=='P'){echo'checked';}?>>Perempuan</td></tr>
                                <tr><td>No. Telp</td><td>:</td><td><input type="text" name="no_telp" value='<?php echo $_SESSION["no_telp"]; ?>'></td></tr>
                                <tr><td>Alamat</td><td>:</td><td><input type="text" name="alamat" value='<?php echo $_SESSION["alamat"]; ?>'></td></tr>
                                <tr><td colspan="3">&nbsp;</td></tr>
                                <tr><td colspan="3"><input class="btn btn-primary btn-sm" type="submit" name="ubah" value="Ubah"></td>
                                </tr>
                            </table>
                            </form>
                            </center>
                    </div>
                </div>
            </div>
        </div>
<?php include'sidebar_kanan.php';?>
<?php include'footer.php';?>
</body>
</html>
<?php
}else{
    echo'<script>window.location="../masuk.php"</script>';
}
?>