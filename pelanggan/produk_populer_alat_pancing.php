    <?php
    include'sumber_header.php';
    ?>

    <nav class="navbar navbar-default" role="navigation" style="overflow:hidden; position: fixed; top:0; width: 100%;z-index: 3;">
        <div class="container-fluid">
            <?php include 'header.php';?>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Produk..." name="q" value="<?php $q = isset($_REQUEST['q']) ? urldecode($_REQUEST['q']) : '';
                    echo $q ?>">
                    <span class="input-group-btn">
                        <?php
                        if ($q <> '')
                        {
                        ?>
                        <a class="btn btn-default" href="<?php echo $_SERVER['PHP_SELF'] ?>">Reset</a>
                        <?php
                        }
                        ?>
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </span>
                </div>
            </form>
        </div>
        <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <?php
    include'sidebar_kiri.php';?>

    <script src="bower_components/jquery/jquery.min.js"></script>
        <div class="container" style='width:50%; float: left; width: 50%; margin-left:0px; margin-right:0px; margin-top: 65px;"'>
            <div class="row">
                <div class="col-md-9" style="width:100%;">
                <!-- /.row -->
                    <div class="row">
                        <?php
                        $query = "SELECT COUNT(*) as total FROM produk WHERE kategori='Alat Pancing'";
                        $result = mysqli_query($koneksi, $query);
                        while($row = mysqli_fetch_array($result)){
                        ?>
                        <div>
                            <ol class="breadcrumb">
                                <li class="active">Beranda</li>
                                <li><a href="cara_pemesanan.php">Cara Pemesanan</a></li>
                                <li><a href="tentang_kami.php">Tentang Kami</a></li>
                            </ol>
                        </div>
                        <div class="btn-group alg-right-pad">
                            <button type="button" class="btn btn-default"><strong><?php echo $row['total'];?>  </strong>produk</button>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                    Urutkan Produk &nbsp;
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="harga_terendah_alat_pancing.php">Harga Terendah</a></li>
                                    <li class="divider"></li>
                                    <li><a href="harga_tertinggi_alat_pancing.php">Harga Tertinggi</a></li>
                                    <li class="divider"></li>
                                    <li><a href="produk_populer_alat_pancing.php">Populer</a></li>
                                </ul>
                            </div>
                        </div>
                        <br><br><br>
                        <?php
                        }
                        ?>
                        <?php
                        //includekan fungsi paginasi
                        //silahkan di komen atau di hapus saja baris yang tidak ingin digunakan
                        include 'pagination1.php';

                        //pagination config start
                        $q = isset($_REQUEST['q']) ? urldecode($_REQUEST['q']) : ''; // untuk keyword pencarian
                        $page = isset($_GET['page']) ? intval($_GET['page']) : 1; // untuk nomor halaman
                        $adjacents = isset($_GET['adjacents']) ? intval($_GET['adjacents']) : 3; // khusus style pagination 2 dan 3
                        $rpp = 15; // jumlah record per halaman

                        $sql = "SELECT * FROM produk WHERE nama_produk LIKE '%$q%' AND kategori='Alat Pancing' ORDER BY terjual DESC"; // query silahkan disesuaikan
                        $result = mysqli_query($koneksi, $sql); // eksekusi query

                        $tcount = mysqli_num_rows($result); // jumlah total baris
                        $tpages = isset($tcount) ? ceil($tcount / $rpp) : 1; // jumlah total halaman
                        $count = 0; // untuk paginasi
                        $i = ($page - 1) * $rpp; // batas paginasi
                        $no_urut = ($page - 1) * $rpp; // nomor urut
                        $reload = $_SERVER['PHP_SELF'] . "?q=" . $q . "&amp;adjacents=" . $adjacents; // untuk link ke halaman lain
                        //pagination config end
                        ?>
                        <?php
                        while (($count < $rpp) && ($i < $tcount)) {
                            mysqli_data_seek($result, $i);
                            $data = mysqli_fetch_array($result);
                        ?>
                        <a href="detail_produk.php">
                        <div class="col-md-4 text-center col-sm-6 col-xs-6">
                            <div class="thumbnail product-box hoverya">
                                <img src="images/images_produk/<?php echo $data["foto"]; ?>" style="height:75px; width:75px;">
                                <div class="caption" style="height: 110px;">
                                    <?php echo $data["nama_produk"]; ?>
                                    <p><strong><font color="orange">Rp <?php echo $data["harga_produk"]; ?>,00</font></strong>  </p>
                                    <p><?php include'animasijumlah.php';?></p>
                                    <!--<p><a href="masuk.php" class="btn btn-success" role="button">Beli</a> <a href="detail_produk.php?id=<?php echo $data["id_produk"]; ?>" class="btn btn-primary" role="button">Lihat</a></p>-->
                                </div>
                            </div>
                        </div>
                        </a>
                        <?php
                        $i++;
                        $count++;
                        }
                        ?>
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <center><?php echo paginate_one($reload, $page, $tpages, $adjacents); ?></center>
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