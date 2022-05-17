<?php
$connect = mysqli_connect("localhost", "root", "", "al_barokah_shop");  
$query = "SELECT * FROM transaksi WHERE status='Belum Upload' OR status='Terbayar' ORDER BY id_transaksi";
// $query = "SELECT * FROM transaksi,detail_transaksi,produk,pelanggan WHERE transaksi.id_transaksi=detail_transaksi.id_transaksi AND pelanggan.id_pelanggan=transaksi.id_pelanggan AND produk.id_produk=detail_transaksi.id_produk AND pelanggan.id_pelanggan=transaksi.id_pelanggan AND transaksi.status='Belum Upload' ORDER BY transaksi.id_transaksi";  
$result = mysqli_query($connect, $query);
// $query_id_pelanggan = "SELECT * from pelanggan";
// $result_id_pelanggan = mysqli_query($connect, $query_id_pelanggan); 
// $query_id_produk = "SELECT * from produk";
// $result_id_produk = mysqli_query($connect, $query_id_produk); 
?>  
<!DOCTYPE html>  
<html> 
<head>
  <title></title>
</head>
<body> 
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
          <td><center><a href="konfirmasi_data_pemesanan.php?id=<?php echo $row['id_transaksi'];?>" class="btn btn-success btn-xs">Konfirmasi</a>
            <input type="button" name="view" value="Lihat" id="<?php echo $row["id_transaksi"]; ?>" class="btn btn-info btn-xs view_data" />
          <!--   <input type="button" name="edit" value="Ubah" id="<?php echo $row["id_detail_trs"]; ?>" class="btn btn-primary btn-xs edit_data" /> -->
            <a href="hapus_data_pemesanan.php?id=<?php echo $row['id_transaksi'];?>"onclick="return confirm(\'Yakin ingin menghapus id '<?php echo $row['id_transaksi'];?>'?\')" class="btn btn-danger btn-xs">Hapus</a></center></td>  
        </tr>
        <?php
        $no++;
        }
        ?>
      </table>
    </div>
  </div>
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