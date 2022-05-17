<?php 
if(isset($_POST["id_pelanggan"]))  
{ 
  $output = '';
  $connect = mysqli_connect("localhost", "root", "", "al_barokah_shop");  
  $query = "SELECT * FROM pelanggan WHERE id_pelanggan = '".$_POST["id_pelanggan"]."'";  
  $result = mysqli_query($connect, $query);  
  $output .= '
  <div class="table-responsive">
  <table class="table table-bordered">';
  while($row = mysqli_fetch_array($result))
  {
    $output .= '
    <tr><td width="30%"><label>ID Pelanggan</label></td>
    <td>'.$row["id_pelanggan"].'</td></tr>
    <tr><td width="30%"><label>Username</label></td> 
    <td>'.$row["username"].'</td></tr>
    <tr><td width="30%"><label>Password</label></td> 
    <td>'.$row["password"].'</td></tr>
    <tr><td width="30%"><label>Nama Pelanggan</label></td> 
    <td>'.$row["nama_lengkap"].'</td></tr>
    <tr><td width="30%"><label>Jenis Kelamin</label></td>
    <td>'.$row["jkel"].'</td></tr>
    <tr><td width="30%"><label>Foto</label></td>
    <td><img src="../images/images_pelanggan/'.$row["foto"].'" height="150px" width="150px"></td>
    </tr>
    <tr><td width="30%"><label>No. Telp</label></td>
    <td>'.$row["no_telp"].'</td></tr>
    <tr><td width="30%"><label>Alamat</label></td>
    <td>'.$row["alamat"].'</td></tr>
    ';
  }
  $output .= '
  </table>
  </div>
  ';
  echo $output;
}
?>