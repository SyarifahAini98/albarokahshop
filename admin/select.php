<?php
    if (!isset($_SESSION)) {
        session_start();
    }
if(isset($_POST["id_produk"]))  
{ 
  $output = '';
  $connect = mysqli_connect("localhost", "root", "", "al_barokah_shop");  
  $query = "SELECT * FROM produk WHERE id_produk = '".$_POST["id_produk"]."'";  
  $result = mysqli_query($connect, $query);  
  $output .= '
  <div class="table-responsive">
  <table class="table table-bordered">';
  while($row = mysqli_fetch_array($result))
  {
    $output .= '
    <tr><td width="30%"><label>ID Produk</label></td>
    <td>'.$row["id_produk"].'</td></tr>
    <tr><td width="30%"><label>Nama Produk</label></td> 
    <td>'.$row["nama_produk"].'</td></tr>
    <tr><td width="30%"><label>Merek</label></td> 
    <td>'.$row["merek"].'</td></tr>
    <tr><td width="30%"><label>Ukuran</label></td> 
    <td>'.$row["ukuran"].'</td></tr>
    <tr><td width="30%"><label>Harga</label></td>
    <td>Rp '.number_format($row["harga_produk"]).',00</td></tr>
    <tr><td width="30%"><label>Berat</label></td>
    <td>'.$row["berat"].'gr</td></tr>
    <tr><td width="30%"><label>Stok</label></td>
    <td>'.$row["stok_produk"].'</td></tr>
    <tr><td width="30%"><label>Kategori</label></td>
    <td>'.$row["kategori"].'</td></tr>
    <tr><td width="30%"><label>Foto</label></td>
    <td><img src="../images/images_produk/'.$row["foto"].'" height="150px" width="150px"></td>
    <tr><td width="30%"><label>Terjual</label></td>
    <td>'.$row["terjual"].'</td></tr>
    </tr>
    ';
  }
  $output .= '
  </table>
  </div>
  ';
  echo $output;
}
?>