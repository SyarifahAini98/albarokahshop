<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Al - Barokah Shop</title>
    <!-- Bootstrap core CSS -->
    <link rel="shortcut icon" href="images/icon.ico">
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
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="admin/css/style.css" media="screen" type="text/css" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <style>
    #kotakUpload{
        border: 1px dashed #38908a;
        border-radius: 5px;
        background: #deface;
        cursor: pointer;
    }
    #kotakUpload{
        min-height: 100px;
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
                				<h1>Daftar Pelanggan</h1>
                				<div align='center'>
                					<form action="prosesdaftar.php" method="post">
                						<table>
                							<tbody>
                								<tr><td>Username</td><td> : <input type="username1" name="username" style="background:#fff;"></td></tr>
												<tr><td colspan="2">&nbsp;</td></tr>
												<tr><td>Password</td><td> : <input type="password" name="password" style="width: 71%; height: 50%;background:#fff;padding: 0%"></td></tr>
												<tr><td colspan="2">&nbsp;</td></tr>
												<tr><td>Email</td><td> : <input type="text" name="email"></td></tr>
												<tr><td colspan="2">&nbsp;</td></tr>
												<tr><td>Nama Lengkap</td><td> : <input type="text" name="nama_lengkap"></td></tr>
												<tr><td colspan="2">&nbsp;</td></tr>
												<tr><td>Jenis Kelamin</td><td> : <input type="radio" name="jkel" value="P">  P  <input type="radio" name="jkel" value="L">  L  </td></tr>
												<tr><td colspan="2">&nbsp;</td></tr>
												<tr><td>No Telepon</td><td> : <input type="text" name="no_telp"></td></tr>
												<tr><td colspan="2">&nbsp;</td></tr>
												<tr><td>Alamat</td><td> : <input type="text" name="alamat"></td></tr>
												<tr><td colspan="2">&nbsp;</td></tr>
												<tr><td>Foto</td><td> :
                                                <input type="file" name="inputFile" id="inputFile" style="display: block;"></td></tr>
                                                <tr><td colspan="2">&nbsp;</td></tr>
                                                <tr><td colspan="2"><input type="submit" name="submit" value="DAFTAR"></td></tr>
											</tbody>
										</table>
									</form>
									<!-- /.row -->
								</td>
                            </div>
                		</tr>
                	</table>
                </div>
                <!-- /.container -->
            </div>
        </div>
    </div>


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
            xhr.open('POST', 'upload_data_pelanggan.php', true);  
            xhr.send(data);
            xhr.onload = function () {
                //mendapatkan respon dan menunjukkan status upload
                var response = JSON.parse(xhr.responseText);
                if(xhr.status === 200 && response.status == 'ok'){
                    $("#kotakUpload").html("File telah berhasil diupload. Klik untuk mengupload file lainnya.");
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
<?php include'footer.php';?>
</body>
</html>