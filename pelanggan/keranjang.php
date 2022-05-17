<?php
session_start();
if(isset($_SESSION['user'])){
?>
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

    <script src="../bower_components/jquery/jquery.min.js"></script>
        <div class="container" style='width:50%; float: left; width: 50%; margin-left:0px; margin-right:0px; margin-top: 65px;"'>
            <div class="row">
                <div class="col-md-9" style="width:100%;">
                <!-- /.row -->
                    <div class="row">
                        <?php
                        $query = "SELECT COUNT(*) as total FROM produk";
                        $result = mysqli_query($koneksi, $query);
                        while($row = mysqli_fetch_array($result)){
                        ?>
                        <div>
                            <ol class="breadcrumb">
                                <li><a href="index.php">Beranda</a></li>
                                <li><a href="profil_pelanggan.php">Profil</a></li>
                                <li class="active">Keranjang</li>
                                <li><a href="transaksi.php">Transaksi</a></li>
                                <li><a href="testimoni.php">Testimoni</a></li>
                            </ol>
                        </div>
                        <?php
                        }
                        ?>

<?php 
    require_once("../admin/koneksi.php");
    if (!isset($_SESSION)) {
        session_start();
    }
?>
<div class="btn-group alg-right-pad">
                            <a href="fungsi_keranjang.php?act=clear&amp;ref=keranjang.php"><button type="button" class="btn btn-default">Kosongkan</button></a>
                        </div>
<center>
<table width="100%" border="1" style="padding: 5px;border-spacing:5px;border-collapse: separate;">
  <tr>
    <th><center>Kode produk</center></th>
    <th><center>Nama produk</center></th>
    <th><center>Harga</center></th>
    <th><center>Qty</center></th>
    <th><center>Berat</center></th>
    <th><center>Jumlah Harga</center></th>
    <th><center>Aksi</center></th>
  </tr>
  <?php
  $total = 0;
  if (isset($_SESSION['items'])) {
        foreach ($_SESSION['items'] as $key => $val){
            $query = mysqli_query ($koneksi,"select * from produk where id_produk = '$key'");
            $rs = mysqli_fetch_array ($query);
             
            $jumlah_harga = $rs['harga_produk'] * $val;
            $total += $jumlah_harga;
  ?>
  <tr>
    <td><center><?php echo $rs['id_produk']; ?></center></td>
    <td><?php echo $rs['nama_produk']; ?></td>
    <td align="left">Rp <?php echo number_format($rs['harga_produk']); ?>,00</td>
    <td align="center"><?php echo number_format($val); ?></td>
    <td><center><?php echo $rs['berat']; ?> gr</center></td>
    <td align="left">Rp <?php echo number_format($jumlah_harga); ?>,00</td>
    <td align="center"><a href="fungsi_keranjang.php?act=plus&amp;id_produk=<?php echo $key; ?>&amp;ref=keranjang.php">+</a> | <a href="fungsi_keranjang.php?act=min&amp;id_produk=<?php echo $key; ?>&amp;ref=keranjang.php">-</a> | <a href="fungsi_keranjang.php?act=del&amp;id_produk=<?php echo $key; ?>&amp;ref=keranjang.php">Hapus</a></td>
  </tr>
  <?php
            mysqli_free_result($query);
        }
  }
  ?>
  <tr><td colspan="6">&nbsp;</td></tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right" colspan="2">Sub Total : </td>
    <td align="left"><strong>Rp <?php echo number_format($total); ?>,00</strong></td>
    <td>
      <center>
      <form action="checkout.php" method="POST">
        <input type="submit" name="checkout" value="Checkout">
      </form>
      </center>
    </td>
  </tr>
</table>
</center>
<a href="javascript: history.go(-1)">Lanjut Belanja</a><br><br>

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </div>
        </div>
<?php include'sidebar_kanan.php';?>
<?php include'footer.php';?>
</body>
</html>
<?php
}else{
    echo'<script>window.location="../masuk.php"</script>';
}
?>