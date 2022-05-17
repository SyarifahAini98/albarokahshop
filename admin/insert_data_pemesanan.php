<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "al_barokah_shop");
if(!empty($_POST))
{
  $output = '';
  $message = '';
  $id_pelanggan = mysqli_real_escape_string($connect, $_POST["id_pelanggan"]);
  $tgl_pemesanan = mysqli_real_escape_string($connect, $_POST["tgl_pemesanan"]);
  $total = mysqli_real_escape_string($connect, $_POST["total"]);
  $status = 'Belum Bayar'
  if($_POST["id_transaksi"] != '')
  {
    $query = "UPDATE transaksi SET tgl_pemesanan='$tgl_pemesanan', total='$total', total_bayar='', status='$status', alamat='' WHERE id_transaksi='".$_POST["id_transaksi"]."'";
    $message = 'Data berhasil diubah';
  }
  else
  {
    $query = "INSERT INTO transaksi VALUES('','','$total','','$tgl_pemesanan','','','$status','','');";
    $message = 'Data berhasil ditambahkan';
  }
  if(mysqli_query($connect, $query))
  {
    $output .= '<label class="text-success">' . $message . '</label>';
    $select_query = "SELECT * FROM transaksi ORDER BY id_transaksi";
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
          <th><center>Harga Satuan</center></th>
          <th><center>Stok</center></th>
          <th><center>Kategori</center></th>
          <th><center>Foto</center></th>
          <th><center>Aksi</center></th>
          </tr>
        </thead>';
        $no=1;
        while($row = mysqli_fetch_array($result))
        {
          $output .= '
          <tr class="odd gradeX">
          <td><center>'.$no.'.</center></td>
          <td><center>'.$row["id_transaksi"].'</center></td>
          <td>'.$row["nama_produk"].'</td>
          <td>'.$row["merek"].'</td>
          <td>'.$row["ukuran"].'</td>
          <td>'.$row["harga_produk"].'</center></td>
          <td>'.$row["harga_satuan_produk"].'</center></td>
          <td>'.$row["stok_produk"].'</center></td>
          <td>'.$row["kategori"].'</center></td>
          <td><img src="../images/'.$row["foto"].'" height="75px" width="75px"</center></td> 
          <td><input type="button" name="view" value="Lihat" id="' . $row["id_transaksi"] . '" class="btn btn-info btn-xs view_data" /> <input type="button" name="edit" value="Ubah" id="'.$row["id_transaksi"] .'" class="btn btn-primary btn-xs edit_data" /> <a href="hapus_data_produk.php?id='.$row['id_transaksi'].'"onclick="return confirm(\'Yakin ingin menghapus id '.$row['id_transaksi'].'?\')" class="btn btn-danger btn-xs">Hapus</a></td>
          </tr>';
          $no++;
        }
        $output .= '
      </table>
    </div>
  </div>';
}
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