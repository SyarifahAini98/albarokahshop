<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "al_barokah_shop");
if(!empty($_POST))
{
  $output = '';
  $message = '';
  $username = mysqli_real_escape_string($connect, $_POST["username"]);
  $password = mysqli_real_escape_string($connect, $_POST["password"]);
  $email = mysqli_real_escape_string($connect, $_POST["email"]);
  $nama_lengkap = mysqli_real_escape_string($connect, $_POST["nama_lengkap"]);
  $jkel = mysqli_real_escape_string($connect, $_POST["jkel"]);
  $no_telp = mysqli_real_escape_string($connect, $_POST["no_telp"]);
  $alamat = mysqli_real_escape_string($connect, $_POST["alamat"]);
  $name = $_SESSION['namafoto'];
  $password2=MD5($password);
  if($_POST["id_pelanggan"] != '')
  {
    if($name==''){
    $query = "UPDATE pelanggan SET username='$username', password='$password2', email='$email', nama_lengkap='$nama_lengkap', jkel='$jkel', no_telp='$no_telp', alamat='$alamat' WHERE id_pelanggan='".$_POST["id_pelanggan"]."'";
    $message = 'Data berhasil diubah';
  }else{
    $query = "UPDATE pelanggan SET username='$username', password='$password2', email='$email', nama_lengkap='$nama_lengkap', jkel='$jkel', no_telp='$no_telp', alamat='$alamat', foto='$name' WHERE id_pelanggan='".$_POST["id_pelanggan"]."'";
    $message = 'Data berhasil diubah';
  }
  }
  else
  {
    $query = "INSERT INTO pelanggan VALUES('','$username','$password2','$email','$nama_lengkap','$jkel','$name','$no_telp','$alamat');";
    $message = 'Data berhasil ditambahkan';
  }
  if(mysqli_query($connect, $query))
  {
    $output .= '<label class="text-success">' . $message . '</label>';
    $select_query = "SELECT * FROM pelanggan ORDER BY id_pelanggan";
    $result = mysqli_query($connect, $select_query);
    $output .= '
    <div id="tabel_produk"> 
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="dataTables-example"> 
        <thead>
          <tr>
          <th><center>No.</center></th>
          <th><center>ID Pelanggan</center></th>
          <th><center>Username</center></th>
          <th><center>Passsword</center></th>
          <th><center>Email</center></th>
          <th><center>Nama Lengkap</center></th>
          <th><center>Jenis Kelamin</center></th>
          <th><center>Foto</center></th>
          <th><center>No. Telp</center></th>
          <th><center>Alamat</center></th>
          <th><center>Aksi</center></th>
          </tr>
        </thead>';
        $no=1;
        while($row = mysqli_fetch_array($result))
        {
          $output .= '
          <tr class="odd gradeX">
          <td><center>'.$no.'.</center></td>
          <td><center>'.$row["id_pelanggan"].'</center></td>
          <td>'.$row["username"].'</td>
          <td>'.$row["password"].'</td>
          <td>'.$row["email"].'</td>
          <td>'.$row["nama_lengkap"].'</center></td>
          <td>'.$row["jkel"].'</center></td>
          <td><img src="../images/images_pelanggan/'.$row["foto"].'" height="75px" width="75px"</center></td>
          <td>'.$row["no_telp"].'</center></td>
          <td>'.$row["alamat"].'</center></td>
          <td><input type="button" name="view" value="Lihat" id="' . $row["id_pelanggan"] . '" class="btn btn-info btn-xs view_data" /> <input type="button" name="edit" value="Ubah" id="'.$row["id_pelanggan"] .'" class="btn btn-primary btn-xs edit_data" /> <a href="hapus_data_pelanggan.php?id='.$row['id_pelanggan'].'"onclick="return confirm(\'Yakin ingin menghapus id '.$row['id_pelanggan'].'?\')" class="btn btn-danger btn-xs">Hapus</a></td>
          </tr>';
          $no++;
        }
        $output .= '
      </table>
    </div>
  </div>';
}
unset($_SESSION['namafoto']);
echo $output;
}
?>
<!-- DATA TABLE SCRIPTS -->
<script src="../assets/js/dataTables/jquery.dataTables.js"></script>
<script src="../assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
$(document).ready(function () {
  $('#dataTables-example').dataTable();
});
</script>