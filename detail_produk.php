    <?php
    $id=$_GET['id'];
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
                        $query = "SELECT COUNT(*) as total FROM produk";
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
                                    <li><a href="harga_terendah.php">Harga Terendah</a></li>
                                    <li class="divider"></li>
                                    <li><a href="harga_tertinggi.php">Harga Tertinggi</a></li>
                                    <li class="divider"></li>
                                    <li><a href="produk_populer.php">Populer</a></li>
                                </ul>
                            </div>
                        </div>
                        <br>
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

                        $sql = "SELECT * FROM produk WHERE id_produk='$id'"; // query silahkan disesuaikan
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
                        ?><!-- 
                        <a href="detail_produk.php"> --><!-- 
                        <div class="col-md-4 text-center col-sm-6 col-xs-6"> -->
                            <center>
                            <table border="0" width="100%" style="padding: 5px;border-spacing:5px;border-collapse: separate;">
                                <tr><td width="35%" rowspan="11"><!-- 
                                    <div class="thumbnail product-box"> -->
                                        <center>
                                        <img src="images/images_produk/<?php echo $data["foto"]; ?>" style="height:175px; width:175px;"></center><!-- 
                                    </div> -->
                                    </td>
                                    <td colspan="3"><h4><b><?php echo $data["nama_produk"]; ?></b></h4></td></tr>
                                <tr><td colspan="3">&nbsp;</td></tr>
                                <tr><td width="15%">Merek</td><td width="4%">:</td><td><?php echo $data["merek"]; ?></td></tr>
                                <tr><td>Ukuran</td><td>:</td><td>
                                <?php
                                if($data['ukuran']==''){
                                    echo'-';}
                                else{
                                    echo $data['ukuran'];
                                }; ?></td></tr>
                                <tr><td>Harga</td><td>:</td><td><strong><font color="orange">Rp <?php echo $data["harga_produk"]; ?>,00</font></strong></td></tr>
                                <tr><td>Harga Satuan</td><td>:</td><td><?php echo $data["berat"]; ?> gr</td></tr>
                                <tr><td>Stok</td><td>:</td><td><?php echo $data["stok_produk"]; ?> produk</td></tr>
                                <tr><td>Kategori</td><td>:</td><td><?php echo $data["kategori"]; ?></td></tr>
                                <tr><td>Terjual</td><td>:</td><td><?php echo $data["terjual"]; ?> produk</td></tr>
                                <tr><td colspan="3">&nbsp;</td></tr>
                                <tr><td colspan="3">
                                    <a href="masuk.php" class="btn btn-danger" role="button" style="background-color: #FBEBED;"><font color="#D0011B">Masukkan Keranjang</font></a>
                                    <a href="masuk.php" class="btn" role="button" style="background-color: #D0011B;"><font color="white">Beli Sekarang</font></a>
                                    </td>
                                </tr>
                            </table>
                            </center><!-- 
                        </div> --><!-- 
                        </a> -->
                        <?php
                        $i++;
                        $count++;
                        }
                        ?>
                    </div>
                    <!-- /.row --><!-- 
                    <div class="row">
                        <center><?php echo paginate_one($reload, $page, $tpages, $adjacents); ?></center>
                    </div> -->
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </div>
        </div>
<?php include'sidebar_kanan.php';?>
<?php include'footer.php';?>
</body>
</html>