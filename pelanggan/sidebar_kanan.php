<head><title></title>
<style type="text/css">
.anic {
  -webkit-animation: fade-in 0.27s linear infinite alternate;
  -moz-animation: fade-in 0.27s linear infinite alternate;
  animation: fade-in 0.27s linear infinite alternate;
}
@-moz-keyframes fade-in {
  0% {
    opacity: 0;
  }
  65% {
    opacity: 1;
  }
}
@-webkit-keyframes fade-in {
  0% {
    opacity: 0;
  }
  65% {
    opacity: 1;
  }
}
@keyframes fade-in {
  0% {
    opacity: 0;
  }
  65% {
    opacity: 1;
  }
}
</style>
</head>
<body>
    <div class="col-md-3" style="margin-top: 65px;">
        <div>
            <a href="#" class="list-group-item active">Produk Populer</a>
            <?php
            $query_populer = "SELECT * FROM produk ORDER BY terjual DESC LIMIT 3";
            $result = mysqli_query($koneksi, $query_populer);
            $no=1;
            while($row = mysqli_fetch_array($result))
            {
            ?>
            <div class="offer-text">
                <div class="anic">TOP <?php echo $no;?></div>
            </div>
            <a href="detail_produk.php?id=<?php echo $row['id_produk'];?>">
            <div class="thumbnail product-box hoverya">
                <img src="../images/images_produk/<?php echo $row["foto"]; ?>" style="height:75px; width:75px;">
                <div class="caption">
                    <center><h3><?php echo $row["nama_produk"]; ?></h3>
                    <p><strong><font color="orange">Rp <?php echo $row["harga_produk"]; ?>,00</font></strong>  </p></center>
                </div>
            </div>
            </a>
            <?php
            $no++;
            }
            ?>
        </div>
        <!-- /.div -->
    </div>
</body>