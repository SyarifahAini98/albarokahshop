<?php
$query = "SELECT COUNT(*) as total FROM produk";
$result = mysqli_query($koneksi, $query);
while($row = mysqli_fetch_array($result)){
?>
<div class="row"><a href="index.php">Beranda</a> | <a href="cara_pemesanan.php">Cara Pemesanan</a> | <a href="tentang_kami.php">Tentang Kami</a>
                    <div class="btn-group alg-right-pad">
                            <button type="button" class="btn btn-default"><strong><?php echo $row['total'];?>  </strong>produk</button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                                Urutkan Produk &nbsp;
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="harga_terendah.php">Harga Terendah</a></li>
                                <li class="divider"></li>
                                <li><a href="harga_tertinggi.php">Harga Tertinggi</a></li>
                                <li class="divider"></li>
                                <li><a href="produk_populer.php">Populer</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
<?php
}
?>