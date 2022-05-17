<?php
$query = "SELECT COUNT(*) as total FROM produk WHERE kategori='Alat Musik'";
$result = mysqli_query($koneksi, $query);
while($row = mysqli_fetch_array($result)){
$query2 = "SELECT COUNT(*) as total FROM produk WHERE kategori='Alat Pancing'";
$result2 = mysqli_query($koneksi, $query2);
while($row2 = mysqli_fetch_array($result2)){
$query3 = "SELECT COUNT(*) as total FROM produk WHERE kategori='Alat Olahraga'";
$result3 = mysqli_query($koneksi, $query3);
while($row3 = mysqli_fetch_array($result3)){
$queryall = "SELECT COUNT(*) as total FROM produk";
$resultall = mysqli_query($koneksi, $queryall);
while($rowall = mysqli_fetch_array($resultall)){
?>
    <div class="col-md-3" style="margin-top: 65px;">
        <div>
            <a href="#" class="list-group-item active">Kategori</a>
            <ul class="list-group">
                <a href="kategori_alat_musik.php"><li class="list-group-item"> Alat Musik<span class="label label-primary pull-right"><?php echo $row['total'];?></span></li></a>
                <a href="kategori_alat_pancing.php"><li class="list-group-item"> Alat Pancing<span class="label label-success pull-right"><?php echo $row2['total'];?></span></li></a>
                <a href="kategori_alat_olahraga.php"><li class="list-group-item"> Alat Olahraga<span class="label label-danger pull-right"><?php echo $row3['total'];?></span></li></a>
                <a href="index.php"><li class="list-group-item">Semua<span class="label label-primary pull-right"><?php echo $rowall['total'];?></span></li></a>
            </ul>
        </div>
        <div>
            <a href="#" class="list-group-item active list-group-item-success">Testimoni</a>
                <marquee direction="up" behavior="scroll" scrollamount="2" onmouseover="this.stop()" onmouseout="this.start()">
            <ul class="list-group">
                <?php
                $query_testimoni = "SELECT * FROM detail_transaksi,transaksi,pelanggan WHERE pelanggan.id_pelanggan=transaksi.id_pelanggan AND transaksi.id_transaksi=detail_transaksi.id_transaksi AND detail_transaksi.testimoni!='' ORDER BY tgl_testimoni DESC";
                $result_testimoni = mysqli_query($koneksi, $query_testimoni);
                while($row_testimoni = mysqli_fetch_array($result_testimoni)){
                ?>
                <li class="list-group-item hoverya"><b><font style="color: blue;"><img src="images/images_pelanggan/<?php echo $row_testimoni['foto'];?>" height="50px" width="50px"> <?php echo $row_testimoni['username'];?></font></b><br><br>
                    <?php echo $row_testimoni['testimoni'];?>
                    <span class="label pull-right">
                        <?php
                        for($i=1;$i<=$row_testimoni['nilai'];$i++){
                            echo'<img src="images/Logo Bintang.png" height="15" width="15">';
                        }
                        ?></span>
                        <br>
                        <font color="#415873" size="1"><?php echo $row_testimoni['tgl_testimoni'];?></font>
                </li>
                <?php } ?>
            </ul>
            </marquee>
        </div>
        <!-- /.div -->
    </div>
<?php
}
}
}
}
?>