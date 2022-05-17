<?php
    if (!isset($_SESSION)) {
        session_start();
    }
$connect = mysqli_connect("localhost", "root", "", "al_barokah_shop");  
$query = "SELECT * FROM pelanggan ORDER BY id_pelanggan";  
$result = mysqli_query($connect, $query);  
?>  
<!DOCTYPE html>  
<html> 
<head>
  <title></title>
</head>
<body> 
  <div id="tabel_pelanggan"> 
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
        <?php
        $no=1;
        while($row = mysqli_fetch_array($result))
          {
        ?>
        <tr class="odd gradeX">
          <td><center><?php echo $no; ?>.</center></td>
          <td><center><?php echo $row["id_pelanggan"]; ?></center></td>
          <td><?php echo $row["username"]; ?></td>
          <td><?php echo $row["email"]; ?></td>
          <td><?php echo $row["nama_lengkap"]; ?></td>
          <td><center><?php echo $row["jkel"]; ?></center></td>
          <td><center><img src="../images/images_pelanggan/<?php echo $row["foto"]; ?>" height="75px" width="75px"></center></td>  
          <td><center><?php echo $row["no_telp"]; ?></center></td>
          <td><center><?php echo $row["alamat"]; ?></center></td>
          <td><center>
            <?php $_SESSION['namafoto']=$row['foto'];?>
            <input type="button" name="view" value="Lihat" id="<?php echo $row["id_pelanggan"]; ?>" class="btn btn-info btn-xs view_data" />
            <input type="button" name="edit" value="Ubah" id="<?php echo $row["id_pelanggan"]; ?>" class="btn btn-primary btn-xs edit_data" />
            <a href="hapus_data_pelanggan.php?id=<?php echo $row['id_pelanggan'];?>"onclick="return confirm(\'Yakin ingin menghapus id '<?php echo $row['id_pelanggan'];?>'?\')" class="btn btn-danger btn-xs">Hapus</a></center></td>  
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
        <h4 class="modal-title">Detail Data Pelanggan</h4>
      </div>
      <div class="modal-body" id="pelanggan"></div>
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
        <h4 class="modal-title">Data Pelanggan</h4>  
      </div>
      <div class="modal-body">
        <form method="post" id="insert_form" enctype="multipart/form-data" name="insert">
          <label>Username<font color="red">*</font></label>
          <input type="text" name="username" id="username" class="form-control" value="" />
          <label>Password<font color="red">*</font></label>
          <input type="text" name="password" id="password" class="form-control" value="" />
          <label>Email</label>
          <input type="text" name="email" id="email" class="form-control" value="" />
          <label>Nama Lengkap<font color="red">*</font></label>
          <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="" />
          <label>Jenis Kelamin<font color="red">*</font></label>
          <input type="text" name="jkel" id="jkel" class="form-control" value="" />
          <label for="inputFile">Foto<font color="red">*</font></label>
          <input type="file" name="inputFile" id="inputFile" style="display: block;"><br>
          <label>No. Telp<font color="red">*</font></label>
          <input type="text" name="no_telp" id="no_telp" class="form-control" value="" />
          <label>Alamat<font color="red">*</font></label>
          <input type="text" name="alamat" id="alamat" class="form-control" value="" >
          <br />
          <input type="hidden" name="id_pelanggan" id="id_pelanggan" />
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
  xhr.open('POST', 'upload_data_pelanggan.php', true);  
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
    var id_pelanggan = $(this).attr("id");
    $.ajax({
      url:"fetch_data_pelanggan.php",
      method:"POST",
      data:{id_pelanggan:id_pelanggan},
      dataType:"json",
      success:function(data){
        $('#id_pelanggan').val(data.id_pelanggan);
        $('#username').val(data.username);
        $('#password').val(data.password);
        $('#email').val(data.email);
        $('#nama_lengkap').val(data.nama_lengkap);
        $('#jkel').val(data.jkel);
        $('#file').val(data.file);
        $('#no_telp').val(data.no_telp);
        $('#alamat').val(data.alamat);
        $('#insert').val("Update");
        $('#add_data_Modal').modal('show');
      }
    });
  });
  $('#insert_form').on("submit", function(event){
    event.preventDefault();
    if($('#username').val() == "")
    {
      alert("Isi Username!");
    }
    else if($('#password').val() == "")
    {
      alert("Isi Password!");
    }
    else if($('#nama_lengkap').val() == "")
    {
      alert("Isi Nama Lengkap!");
    }
    else if($('#no_telp').val() == "")
    {
      alert("Isi No. Telp!");
    }
    else if($('#alamat').val() == "")
    {
      alert("Isi Alamat!");
    }
    else 
    {
      $.ajax({
        url:"insert_data_pelanggan.php",
        method:"POST",
        data:$('#insert_form').serialize(),
        beforeSend:function(){
          $('#insert').val("Menambah");
        },
        success:function(data){
          $('#insert_form')[0].reset();
          $('#add_data_Modal').modal('hide');  
          $('#tabel_pelanggan').html(data); 
        }  
      });
    } 
  });
  $(document).on('click', '.view_data', function(){
    var id_pelanggan = $(this).attr("id"); 
    if(id_pelanggan != '')
    {  
      $.ajax({ 
        url:"select_data_pelanggan.php", 
        method:"POST",
        data:{id_pelanggan:id_pelanggan},
        success:function(data){
          $('#pelanggan').html(data);
          $('#dataModal').modal('show');
        } 
      });  
    }
  });
});
</script>