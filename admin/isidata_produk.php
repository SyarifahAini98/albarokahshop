<?php
    if (!isset($_SESSION)) {
        session_start();
    }
$connect = mysqli_connect("localhost", "root", "", "al_barokah_shop");  
$query = "SELECT * FROM produk ORDER BY id_produk";  
$result = mysqli_query($connect, $query);  
?>  
<!DOCTYPE html>  
<html> 
<head>
  <title></title>
</head>
<body> 
  <div id="tabel_produk"> 
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="dataTables-example"> 
        <thead>
          <tr>
            <th><center>No.</center></th>
            <th><center>ID Produk</center></th>
            <th><center>Nama</center></th>
            <th><center>Merek</center></th>
            <th><center>Ukuran</center></th>
            <th><center>Harga</center></th>
            <th><center>Berat</center></th>
            <th><center>Stok</center></th>
            <th><center>Kategori</center></th>
            <th><center>Foto</center></th>
            <th><center>Terjual</center></th>
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
          <td><center><?php echo $row["id_produk"]; ?></center></td>
          <td><?php echo $row["nama_produk"]; ?></td>
          <td><?php echo $row["merek"]; ?></td>
          <td><?php echo $row["ukuran"]; ?></td>
          <td><center><?php echo $row["harga_produk"]; ?></center></td>
          <td><center><?php echo $row["berat"]; ?></center></td>
          <td><center><?php echo $row["stok_produk"]; ?></center></td>
          <td><center><?php echo $row["kategori"]; ?></center></td>
          <td><center><img src="../images/images_produk/<?php echo $row["foto"]; ?>" height="75px" width="75px"></center></td>
          <td><center><?php echo $row["terjual"]; ?></center></td>  
          <td><center>
            <input type="button" name="view" value="Lihat" id="<?php echo $row["id_produk"]; ?>" class="btn btn-info btn-xs view_data" />
            <?php $_SESSION['foto']=$row['foto'];?>
            <input type="button" name="edit" value="Ubah" id="<?php echo $row["id_produk"]; ?>" class="btn btn-primary btn-xs edit_data" />
            <a href="hapus_data_produk.php?id=<?php echo $row['id_produk'];?>"onclick="return confirm(\'Yakin ingin menghapus id '<?php echo $row['id_produk'];?>'?\')" class="btn btn-danger btn-xs">Hapus</a></center></td>  
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
        <h4 class="modal-title">Detail Data Produk</h4>
      </div>
      <div class="modal-body" id="produk"></div>
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
        <h4 class="modal-title">Data Produk</h4>  
      </div>
      <div class="modal-body">
        <form method="post" id="insert_form" enctype="multipart/form-data" name="insert">
          <label>Nama Produk<font color="red">*</font></label>
          <input type="text" name="nama_produk" id="nama_produk" class="form-control" value="" />
          <label>Merek</label>
          <input type="text" name="merek" id="merek" class="form-control" value="" />
          <label>Ukuran</label>
          <input type="text" name="ukuran" id="ukuran" class="form-control" value="" />
          <label>Harga (Rp)<font color="red">*</font></label>
          <input type="text" name="harga_produk" id="harga_produk" class="form-control" value="" />
          <label>Berat</label>
          <input type="text" name="berat" id="berat" class="form-control" value="" />
          <label>Stok<font color="red">*</font></label>
          <input type="text" name="stok_produk" id="stok_produk" class="form-control" value="10" />
          <label>Kategori<font color="red">*</font></label>
          <select name="kategori" id="kategori" class="form-control">
            <option value="Alat Musik">Alat Musik</option>
            <option value="Alat Pancing">Alat Pancing</option>
            <option value="Alat Olahraga">Alat Olahraga</option>
          </select>
          <label for="inputFile">Foto<font color="red">*</font></label>
          <input type="file" name="inputFile" id="inputFile" style="display: block;">
          <br />
          <label>Terjual<font color="red">*</font></label>
          <input type="text" name="terjual" id="terjual" class="form-control" value="0" /><br>
          <input type="hidden" name="id_produk" id="id_produk" />
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
  xhr.open('POST', 'upload.php', true);  
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
    var id_produk = $(this).attr("id");
    $.ajax({
      url:"fetch.php",
      method:"POST",
      data:{id_produk:id_produk},
      dataType:"json",
      success:function(data){
        $('#id_produk').val(data.id_produk);
        $('#nama_produk').val(data.nama_produk);
        $('#merek').val(data.merek);
        $('#ukuran').val(data.ukuran);
        $('#harga_produk').val(data.harga_produk);
        $('#berat').val(data.berat);
        $('#stok_produk').val(data.stok_produk);
        $('#kategori').val(data.kategori);
        $('#terjual').val(data.terjual);
        $('#file').val(data.file);
        $('#insert').val("Update");
        $('#add_data_Modal').modal('show');
      }
    });
  });
  $('#insert_form').on("submit", function(event){
    event.preventDefault();
    if($('#nama_produk').val() == "")
    {
      alert("Isi Nama Produk!");
    }
    else if($('#harga_produk').val() == "")
    {
      alert("Isi Harga Produk!");
    }
    else if($('#stok_produk').val() == "")
    {
      alert("Isi Stok Produk!");
    }
    else if($('#terjual').val() == "")
    {
      alert("Isi Jumlah Terjual!");
    }
    else 
    {
      $.ajax({
        url:"insert.php",
        method:"POST",
        data:$('#insert_form').serialize(),
        beforeSend:function(){
          $('#insert').val("Menambah");
        },
        success:function(data){
          $('#insert_form')[0].reset();
          $('#add_data_Modal').modal('hide');  
          $('#tabel_produk').html(data); 
        }  
      });
    } 
  });
  $(document).on('click', '.view_data', function(){
    var id_produk = $(this).attr("id"); 
    if(id_produk != '')
    {  
      $.ajax({ 
        url:"select.php", 
        method:"POST",
        data:{id_produk:id_produk},
        success:function(data){
          $('#produk').html(data);
          $('#dataModal').modal('show');
        } 
      });  
    }
  });
});
</script>