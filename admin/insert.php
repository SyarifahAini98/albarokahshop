<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "al_barokah_shop");
if(!empty($_POST))
{
  $output = '';
  $message = '';
  $nama_produk = mysqli_real_escape_string($connect, $_POST["nama_produk"]);
  $merek = mysqli_real_escape_string($connect, $_POST["merek"]);
  $ukuran = mysqli_real_escape_string($connect, $_POST["ukuran"]);
  $harga_produk = mysqli_real_escape_string($connect, $_POST["harga_produk"]);
  $berat = mysqli_real_escape_string($connect, $_POST["berat"]);
  $stok_produk = mysqli_real_escape_string($connect, $_POST["stok_produk"]);
  $kategori = mysqli_real_escape_string($connect, $_POST["kategori"]);
  $terjual = mysqli_real_escape_string($connect, $_POST["terjual"]);
  $name = $_SESSION['foto'];
  if($_POST["id_produk"] != '')
  {
    if($name==''){
      $query = "UPDATE produk SET nama_produk='$nama_produk', merek='$merek', ukuran='$ukuran', harga_produk='$harga_produk', berat='$berat', stok_produk='$stok_produk', kategori='$kategori', terjual='$terjual' WHERE id_produk='".$_POST["id_produk"]."'";
      $message = 'Data berhasil diubah';
    }else{
      $query = "UPDATE produk SET nama_produk='$nama_produk', merek='$merek', ukuran='$ukuran', harga_produk='$harga_produk', berat='$berat', stok_produk='$stok_produk', kategori='$kategori', foto='$name', terjual='$terjual' WHERE id_produk='".$_POST["id_produk"]."'";
      $message = 'Data berhasil diubah';
  }
  }
  else
  {
    $query = "INSERT INTO produk VALUES('','$nama_produk','$merek','$ukuran','$harga_produk','$berat','$stok_produk','$kategori','$name','$terjual');";
    $message = 'Data berhasil ditambahkan';
  }
  if(mysqli_query($connect, $query))
  {
    $output .= '<label class="text-success">' . $message . '</label>';
    $select_query = "SELECT * FROM produk ORDER BY id_produk";
    $result = mysqli_query($connect, $select_query);
    $output .= '
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
        </thead>';
        $no=1;
        while($row = mysqli_fetch_array($result))
        {
          $output .= '
          <tr class="odd gradeX">
          <td><center>'.$no.'.</center></td>
          <td><center>'.$row["id_produk"].'</center></td>
          <td>'.$row["nama_produk"].'</td>
          <td>'.$row["merek"].'</td>
          <td>'.$row["ukuran"].'</td>
          <td>'.$row["harga_produk"].'</center></td>
          <td>'.$row["berat"].'</center></td>
          <td>'.$row["stok_produk"].'</center></td>
          <td>'.$row["kategori"].'</center></td>
          <td><img src="../images/images_produk/'.$row["foto"].'" height="75px" width="75px"</center></td> 
          <td>'.$row["terjual"].'</center></td>
          <td><input type="button" name="view" value="Lihat" id="' . $row["id_produk"] . '" class="btn btn-info btn-xs view_data" /> <input type="button" name="edit" value="Ubah" id="'.$row["id_produk"] .'" class="btn btn-primary btn-xs edit_data" /> <a href="hapus_data_produk.php?id='.$row['id_produk'].'"onclick="return confirm(\'Yakin ingin menghapus id '.$row['id_produk'].'?\')" class="btn btn-danger btn-xs">Hapus</a></td>
          </tr>';
          $no++;
        }
        $output .= '
      </table>
    </div>
  </div>';
}
unset($_SESSION['foto']);
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