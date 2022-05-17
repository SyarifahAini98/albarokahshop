<?php
    if (!isset($_SESSION)) {
        session_start();
    }
if(isset($_POST["id_transaksi"]))  
{ 
  $output = '';
  $connect = mysqli_connect("localhost", "root", "", "al_barokah_shop");
  $query = "SELECT * FROM transaksi,detail_transaksi,produk,pelanggan WHERE transaksi.id_transaksi=detail_transaksi.id_transaksi AND pelanggan.id_pelanggan=transaksi.id_pelanggan AND produk.id_produk=detail_transaksi.id_produk AND pelanggan.id_pelanggan=transaksi.id_pelanggan AND transaksi.id_transaksi = '".$_POST["id_transaksi"]."' AND transaksi.status='Terbayar' OR transaksi.status='Belum Upload' GROUP BY transaksi.id_transaksi ORDER BY transaksi.id_transaksi";
  $result = mysqli_query($connect, $query); 
  $output .= '

  <div id="tabel_pemesanan"> 
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="dataTables-example"> 
        <thead>
          <tr>
            <th><center>No.</center></th>
            <th><center>ID Detail Pemesanan</center></th>
            <th><center>ID Transaksi</center></th>
            <th><center>Nama Produk</center></th>
            <th><center>Qty</center></th>
            <th><center>Total Harga</center></th>
          </tr>
        </thead>';
        $no=1;
        while($row = mysqli_fetch_array($result))
          {
            $output .= '
        <tr class="odd gradeX">
          <td><center>'.$no.'</center></td>
          <td><center>'.$row["id_detail_trs"].'</center></td>
          <td><center>'.$row["id_transaksi"].'</center></td>
          <td>'.$row["nama_produk"].'</td>
          <td><center>'.$row["qty"].'</center></td>
          <td><center>'.$row["total_harga"].'</center></td>
        </tr>';
        $no++;
        }
        $output.='
      </table>
    </div>
  </div>';
  echo $output;
}
?>