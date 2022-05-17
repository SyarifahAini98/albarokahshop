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
        <div class="container" style='float: left; width: 50%; margin-left:0px; margin-right:0px; margin-top: 65px;"'>
            <div class="row">
                <div class="col-md-9" style="width:100%;">
                <!-- /.row -->
                    <div class="row">
                        <div>
                            <ol class="breadcrumb" style="text-align: center;">
                                <li><center><a href="#">Info Pembayaran</a></center></li>
                            </ol>
                        </div>

<?php 
    require_once("../admin/koneksi.php");
    if (!isset($_SESSION)) {
        session_start();
    }
?>
<center>
<table width="100%" border="1" style="padding: 5px;border-spacing:5px;border-collapse: separate;">
  <tr><td><u>Bukti transfer akan segera dicek dalam waktu 24 jam setelah bukti transfer diuploud.</u></td></tr>
  <tr><td>1. Gunakan ATM/iBanking/setor tunai untuk transfer ke rekening kami berikut ini :</td></tr>
  <tr><td>No. Rekening : 0021-01-163277-50-0</td></tr>
  <tr><td>Nama Rekening : </td></tr>
  <tr><td>2. Silahkan uploud bukti transfer, kami memberikan waktu 1x24 jam setelah proses checkout.</td></tr>
  <tr><td>3. Demi keamanan, mohon tidak memberikan bukti atau konfirmasi pembayaran pesanan kepada siapapun.</td></tr>
</td></tr>
<tr><td><center><a href="index.php"><button type="button" class="btn btn-default">Lanjut Belanja</button></a>&nbsp;&nbsp;&nbsp;<a href="transaksi.php"><button type="button" class="btn btn-primary">Upload Bukti Transfer</button></a></center></td></tr>
</table>
</center>
<br><br>

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