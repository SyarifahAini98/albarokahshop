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
                                <li><a href="testimoni.php">Testimoni</a></li>
                            </ol>
                        </div>
<?php 
    require_once("../admin/koneksi.php");
    if (!isset($_SESSION)) {
        session_start();
    }
$id=$_SESSION['id'];
$connect = mysqli_connect("localhost", "root", "", "al_barokah_shop");  
$query = "SELECT * FROM transaksi WHERE status='Belum Upload' OR status='Terbayar' OR status='Terkirim' AND id_pelanggan=$id ORDER BY id_transaksi";
$result = mysqli_query($connect, $query);
?>
<center>

  <div id="tabel_pemesanan"> 
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="dataTables-example"> 
        <thead>
          <tr>
            <th><center>No.</center></th>
            <th><center>ID Pemesanan</center></th>
            <th><center>ID Pelanggan</center></th>
            <th><center>Sub Total</center></th>
            <th><center>Tarif Ongkir</center></th>
            <th><center>Total Bayar</center></th>
            <th><center>Tanggal Pemesanan</center></th>
            <th><center>Tanggal Transaksi</center></th>
            <th><center>Foto</center></th>
            <th><center>Status</center></th>
            <th><center>Alamat</center></th>
            <th><center>Perkiraan</center></th>
            <th><center>Rekening</center></th>
            <th><center>Kurir</center></th>
            <th><center>Berat</center></th>
            <th><center>Aksi</center></th>
          </tr>
        </thead>
        <?php
        $no=1;
        while($row = mysqli_fetch_array($result))
          {
        ?>
        <tr class="odd gradeX">
          <td><center><?php echo $no; ?>.</center></td>
          <td><center><?php echo $row["id_transaksi"]; ?></center></td>
          <td><center><?php echo $row["id_pelanggan"]; ?></center></td>
          <td><center><?php echo $row["sub_total"]; ?></center></td>
          <td><center><?php echo $row["tarif_ongkir"]; ?></center></td>
          <td><center><?php echo $row["total_bayar"]; ?></center></td>
          <td><center><?php echo $row["tgl_pemesanan"]; ?></center></td>
          <td><center><?php echo $row["tgl_transaksi"]; ?></center></td>
          <td><center>
            <?php
            if($row["foto"]==''){
              echo'-';
            }else{
              echo '<img src="../images/images_transaksi/'.$row["foto"].'" height="75px" width="75px">';
            }
            ?>
            </center></td>
          <td><center><?php echo $row["status"]; ?></center></td>
          <td><center><?php echo $row["alamat"]; ?></center></td>
          <td><center><?php echo $row["perkiraan"]; ?></center></td>
          <td><center><?php echo $row["rekening"]; ?></center></td>
          <td><center><?php echo $row["kurir"]; ?></center></td>
          <td><center><?php echo $row["berat"]; ?></center></td>
          <td><center>
            <?php
            if($row["status"]=='Belum Upload'){
              ?>
              <a href="konfirmasi_upload_bukti.php?id=<?php echo $row['id_transaksi'];?>" class="btn btn-success btn-xs">Upload Bukti</a>
              <?php
            }
            ?>
            <a href="select_data_transaksi.php?id=<?php echo $row['id_transaksi'];?>" class="btn btn-info btn-xs">Lihat</a>
            </td>  
        </tr>
        <?php
        $no++;
        }
        ?>
      </table>
    </div>
  </div>
</center>

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

<div id="dataModal" class="modal fade">  
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Data Pemesanan</h4>
      </div>
      <div class="modal-body" id="pemesanan"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<div id="add_data_Modal" class="modal fade">  
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Data Pemesanan</h4>  
      </div>
      <div class="modal-body">
        <form method="post" id="insert_form" enctype="multipart/form-data" name="insert">
          <label>ID Pelanggan<font color="red">*</font></label>
          <select name="id_pelanggan" id="id_pelanggan" class="form-control">
          <?php
            $no=1;
            while($row = mysqli_fetch_array($result_id_pelanggan))
            {
          ?>
            <option value="'.<?php echo $row["id_transaksi"]; ?>.'"><?php echo $row["id_pelanggan"]; ?></option>
          <?php
          $no++;
          }
          ?>
          </select>
          <label>ID Produk<font color="red">*</font></label>
          <select name="id_produk" id="id_produk" class="form-control">
          <?php
            $no=1;
            while($row = mysqli_fetch_array($result_id_produk))
            {
          ?>
            <option value="'.<?php echo $row["id_produk"]; ?>.'"><?php echo $row["id_produk"]; ?></option>
          <?php
          $no++;
          }
          ?>
          </select>
          <label>Tanggal Pemesanan</label>
          <input type="text" name="tgl_pemesanan" id="tgl_pemesanan" class="form-control" value="2019-09-10" />
          <label>Total<font color="red">*</font></label>
          <input type="text" name="total" id="total" class="form-control" value="250000" />
          <br />
          <input type="hidden" name="id_transaksi" id="id_transaksi" />
          <input type="submit" name="insert" id="insert" value="Tambah" class="btn btn-success" />
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>  
      </div>  
    </div>  
  </div>
</div>
<script>
$(function(){
  //ini yang akan menampilkan window untuk memilih file ketika kotak upload diklik
  $("#kotakUpload").click(function(){
    $("#insert").click();
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
  xhr.open('POST', 'upload_data_pemesanan.php', true);  
  xhr.onreadystatechange = function () {
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
  xhr.send(data);
}
}
}

$(document).ready(function(){
  $('#add').click(function(){

    $('#insert').val("Tambah"); 
    $('#insert_form')[0].reset();
  });
  $(document).on('click', '.edit_data', function(){
    var id_transaksi = $(this).attr("id");
    $.ajax({
      url:"fetch_data_pemesanan.php",
      method:"POST",
      data:{id_transaksi:id_transaksi},
      dataType:"json",
      success:function(data){
        $('#id_detail_trs').val(data.id_detail_trs);
        $('#id_transaksi').val(data.id_transaksi);
        $('#id_pelanggan').val(data.id_pelanggan);
        $('#tgl_pemesanan').val(data.tgl_pemesanan);
        $('#total').val(data.total);
        $('#file').val(data.file);
        $('#insert').val("Update");
        $('#add_data_Modal').modal('show');
      }
    });
  });
  $('#insert_form').on("submit", function(event){
    event.preventDefault();
    if($('#tgl_pemesanan').val() == "")
    {
      alert("Isi Tanggal Pemesanan!");
    }
    else if($('#total').val() == "")
    {
      alert("Isi Total!");
    }
    else 
    {
      $.ajax({
        url:"insert_data_pemesanan.php",
        method:"POST",
        data:$('#insert_form').serialize(),
        beforeSend:function(){
          $('#insert').val("Menambah");
        },
        success:function(data){
          $('#insert_form')[0].reset();
          $('#add_data_Modal').modal('hide');  
          $('#tabel_pemesanan').html(data); 
        }  
      });
    } 
  });
  $(document).on('click', '.view_data', function(){
    var id_transaksi = $(this).attr("id"); 
    if(id_transaksi != '')
    {  
      $.ajax({ 
        url:"select_data_pemesanan.php", 
        method:"POST",
        data:{id_transaksi:id_transaksi},
        success:function(data){
          $('#pemesanan').html(data);
          $('#dataModal').modal('show');
        } 
      });  
    }
  });
});
</script>

<?php
}else{
    echo'<script>window.location="../masuk.php"</script>';
}
?>