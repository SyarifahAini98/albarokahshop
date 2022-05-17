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
                        <div>
                            <ol class="breadcrumb">
                                <li><a href="index.php">Beranda</a></li>
                                <li class="active">Profil</li>
                                <li><a href="keranjang.php">Keranjang</a></li>
                                <li><a href="transaksi.php">Transaksi</a></li>
                                <li><a href="testimoni.php">Testimoni</a></li>
                            </ol>
                        </div>
                            <center>
                            <table border="0" width="100%" style="padding: 5px;border-spacing:5px;border-collapse: separate;">
                                <tr><td width="35%" rowspan="10"><!-- 
                                    <div class="thumbnail product-box"> -->
                                        <center>
                                        <img src="../images/images_pelanggan/<?php echo $_SESSION["foto"]; ?>" style="height:175px; width:175px;"></center><!-- 
                                    </div> -->
                                    </td>
                                    <td colspan="3"><h4><b><?php echo $_SESSION["nama"]; ?></b></h4></td></tr>
                                <tr><td colspan="3"></td></tr>
                                <tr><td width="15%">Username</td><td width="2%">:</td><td><?php echo $_SESSION["user"]; ?></td></tr>
                                <tr><td>Password</td><td>:</td><td><?php echo $_SESSION["pass"]; ?></td></tr>
                                <tr><td>Email</td><td>:</td><td><?php echo $_SESSION["email"]; ?></td></tr>
                                <tr><td>Jkel</td><td>:</td><td>
                                <?php
                                if($_SESSION['jkel']=='L'){
                                    echo'Laki-Laki';}
                                else if($_SESSION['jkel']=='P'){
                                    echo'Perempuan';}
                                    ?></td></tr>
                                <tr><td>No. Telp</td><td>:</td><td><?php echo $_SESSION["no_telp"]; ?></td></tr>
                                <tr><td>Alamat</td><td>:</td><td><?php echo $_SESSION["alamat"]; ?></td></tr>
                                <tr><td colspan="3">&nbsp;</td></tr>
                                <tr><td colspan="3"><a href="ubah_profil.php?username=<?php echo $_SESSION['user'];?>" class="btn btn-primary btn-sm"><i class="fa fa-edit " ></i> &nbsp;Ubah</a></td>
                                </tr>
                            </table>
                            </center>
                    </div>
                </div>
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