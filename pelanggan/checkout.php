<?php
session_start();
if(isset($_SESSION['user'])){
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<!-- <link rel="stylesheet" href="assets/css/bootstrap.css"> -->
	</head>
	<body>
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
    <div class="col-md-3" style="margin-top: 65px; width: 10%;">
    </div>
    <script src="../bower_components/jquery/jquery.min.js"></script>
        <div class="container" style='width:80%; float: left; width: 50%; margin-left:0px; margin-right:0px; margin-top: 65px;"'>
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
  </tr>
  <?php
  $total = 0;
  $total_berat = 0;
  $_SESSION['jumlah_keranjang']=count($_SESSION['items']);
  if (isset($_SESSION['items'])) {
        foreach ($_SESSION['items'] as $key => $val){
            $query = mysqli_query ($koneksi,"select * from produk where id_produk = '$key'");
            $rs = mysqli_fetch_array ($query);
             
            $jumlah_harga = $rs['harga_produk'] * $val;
            $total += $jumlah_harga;
            $jumlah_berat=$rs['berat']*$val;
            $total_berat+=$jumlah_berat;
  ?>
  <tr>
    <td><center><?php echo $rs['id_produk']; ?></center></td>
    <td><?php echo $rs['nama_produk']; ?></td>
    <td align="left">Rp <?php echo number_format($rs['harga_produk']); ?>,00</td>
    <td align="center"><?php echo number_format($val); ?></td>
    <td><center><?php echo $rs['berat']; ?> gr</center></td>
    <td align="left">Rp <?php echo number_format($jumlah_harga); ?>,00</td>
  </tr>
  <?php
//   print_r($rs['id_produk']);
//   // echo var_dump($_SESSION['items']).'<br><br>';
//   $data = array();
//     $data[] = "(" . addslashes($rs['id_produk']) . ")";

// $data = implode("," , $data);
// echo $data;

  // echo $rs['id_produk'];
  $_SESSION['id_produk_dtltrs']=$rs['id_produk'];
  $_SESSION['qty_dtltrs']=$val;
  $_SESSION['total_harga_dtltrs']=$rs['harga_produk'];
  $_SESSION['nama_produk']=$rs['nama_produk'];

  $_SESSION['total']=$total;
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
  </tr>
</table>
</center>
<a href="javascript: history.go(-1)">Lanjut Belanja</a><br><br>

		<br>
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h3 class="panel-title">Cek Ongkos Kirim</h3>
						</div>
						<div class="panel-body">
								<div>
									<?php
									//Get Data Kabupaten
									$curl = curl_init();
									curl_setopt_array($curl, array(
										CURLOPT_URL => "http://api.rajaongkir.com/starter/city",
										CURLOPT_RETURNTRANSFER => true,
										CURLOPT_ENCODING => "",
										CURLOPT_MAXREDIRS => 10,
										CURLOPT_TIMEOUT => 30,
										CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
										CURLOPT_CUSTOMREQUEST => "GET",
										CURLOPT_HTTPHEADER => array(
											"key:35bd392bcb6a80fdfb2d2ae42f8e55be"
										),
									));

									$response = curl_exec($curl);
									$err = curl_error($curl);

									curl_close($curl);
									echo "
									<div class= \"form-group\">
									<label for=\"asal\">Kota/Kabupaten Asal<font color=\"red\">*</font></label>
									<select class=\"form-control\" name='asal1' id='asal'>";
									echo "<option readonly>Kota/Kabupaten Asal</option>";
									$data = json_decode($response, true);
									for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
										echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."' readonly>".$data['rajaongkir']['results'][$i]['city_name']."</option>";
									}
									echo "</select>
									</div>";
									//Get Data Kabupaten
									//-----------------------------------------------------------------------------

									//Get Data Provinsi
									$curl = curl_init();

									curl_setopt_array($curl, array(
										CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
										CURLOPT_RETURNTRANSFER => true,
										CURLOPT_ENCODING => "",
										CURLOPT_MAXREDIRS => 10,
										CURLOPT_TIMEOUT => 30,
										CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
										CURLOPT_CUSTOMREQUEST => "GET",
										CURLOPT_HTTPHEADER => array(
										"key:35bd392bcb6a80fdfb2d2ae42f8e55be"
										),
										));

										$response = curl_exec($curl);
										$err = curl_error($curl);

										echo "
										<div class= \"form-group\">
											<label for=\"provinsi\">Provinsi Tujuan<font color=\"red\">*</font></label>
											<select class=\"form-control\" name='provinsi' id='provinsi'>";
												echo "<option>Pilih Provinsi Tujuan</option>";
												$data = json_decode($response, true);
												for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
													echo "<option value='".$data['rajaongkir']['results'][$i]['province_id']."'>".$data['rajaongkir']['results'][$i]['province']."</option>";
												}
												echo "</select>
											</div>";
											//Get Data Provinsi
											?>

											<div class="form-group">
												<label for="kabupaten">Kota/Kabupaten Tujuan<font color="red">*</font></label><br>
												<select class="form-control" id="kabupaten" name="kabupaten"></select>
											</div>
											<div class="form-group">
												<label for="kurir">Kurir<font color="red">*</font></label><br>
												<select class="form-control" id="kurir" name="kurir">
													<option value="jne">JNE</option>
													<option value="tiki">TIKI</option>
													<option value="pos">POS INDONESIA</option>
												</select>
											</div>
											<div class="form-group">
												<label for="berat">Berat<font color="red">*</font></label>(gr)<br>
												<input class="form-control" id="berat" type="text" name="berat" value="<?php echo $total_berat;?>" readonly="" />
											</div>
											<button class="btn btn-success" id="cek" type="submit" name="button">Cek Ongkir</button>
										</div>
								</div>
							</div>
						</div>
						<div class="col-md-8">
							<div class="panel panel-success">
								<div class="panel-heading">
									<h3 class="panel-title">Hasil</h3>
								</div>
								<div class="panel-body">
									<ol>
										<div id="ongkir"></div>
									</div>
								</ol>
							</div>
						</div>
			</div>
			</div>
		</div>
<script type="text/javascript">

	$(document).ready(function(){
		$('#provinsi').change(function(){

			//Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax
			var prov = $('#provinsi').val();

      		$.ajax({
            	type : 'GET',
           		url : 'cek_kabupaten.php',
            	data :  'prov_id=' + prov,
					success: function (data) {

					//jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
					$("#kabupaten").html(data);
				}
          	});
		});

		$("#cek").click(function(){
			//Mengambil value dari option select provinsi asal, kabupaten, kurir, berat kemudian parameternya dikirim menggunakan ajax
			var asal = $('#asal').val();
			var kab = $('#kabupaten').val();
			var kurir = $('#kurir').val();
			var berat = $('#berat').val();

      		$.ajax({
            	type : 'POST',
           		url : 'cek_ongkir.php',
            	data :  {'kab_id' : kab, 'kurir' : kurir, 'asal' : asal, 'berat' : berat},
					success: function (data) {

					//jika data berhasil didapatkan, tampilkan ke dalam element div ongkir
					$("#ongkir").html(data);
				}
          	});
		});
	});
</script>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </div>
        </div>

    <div class="col-md-3" style="margin-top: 65px; width: 10%;">
        <div>
        </div>
        <!-- /.div -->
    </div>


<?php include'footer.php';?>

	</body>
</html>
<?php
}else{
    echo'<script>window.location="../masuk.php"</script>';
}
?>