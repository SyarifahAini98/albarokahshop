<?php
$query = "SELECT COUNT(*) as total FROM produk";
$result = mysqli_query($koneksi, $query);
while($row = mysqli_fetch_array($result)){
?>
<div class="row"><a href="index.php">Beranda</a> | <a href="cara_pemesanan.php">Cara Pemesanan</a> | <a href="tentang_kami.php">Tentang Kami</a></div><br>
<?php
}
?>