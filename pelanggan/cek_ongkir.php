<?php
    if (!isset($_SESSION)) {
        session_start();
    }
	$asal= $_POST['asal'];
	// $asal= $_POST['243'];
	$id_kabupaten = $_POST['kab_id'];
	$kurir = $_POST['kurir'];
	$berat = $_POST['berat'];
	$_SESSION['berat']=$berat;
	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => "origin=".$asal."&destination=".$id_kabupaten."&weight=".$berat."&courier=".$kurir."",
	  CURLOPT_HTTPHEADER => array(
	    "content-type: application/x-www-form-urlencoded",
	    "key:35bd392bcb6a80fdfb2d2ae42f8e55be"
	  ),
	));
	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);
	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
	  $data = json_decode($response, true);
	}
	?>
	<?php echo $data['rajaongkir']['origin_details']['city_name'];?> ke <?php echo $data['rajaongkir']['destination_details']['city_name'];?> @<?php echo $berat;?>gram Kurir : <?php echo strtoupper($kurir); ?>
	<?php
	$_SESSION['alamat']=$data['rajaongkir']['destination_details']['city_name'].' '.$data['rajaongkir']['destination_details']['province'];
	 for ($k=0; $k < count($data['rajaongkir']['results']); $k++) {
	?>
		 <div title="<?php echo strtoupper($data['rajaongkir']['results'][$k]['name']);?>" style="padding:10px">
			 <table class="table table-striped">
				 <tr>
					 <th>No.</th>
					 <th>Jenis Layanan</th>
					 <th>Perkiraan</th>
					 <th>Tarif</th>
					 <th>Aksi</th>
				 </tr>
				 <?php
				 for ($l=0; $l < count($data['rajaongkir']['results'][$k]['costs']); $l++) {
				 ?>
				 <tr>
					 <td><?php echo $l+1;?></td>
					 <td>
						 <div style="font:bold 16px Arial"><?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['service'];?></div>
						 <div style="font:normal 11px Arial"><?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['description'];?></div>
					 </td>
					 <td align="center">&nbsp;<?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['etd'];?> hari</td>
					 <td align="center">Rp <?php echo number_format($data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value']);?></td>
					 <td align="center">
					 	<a href="pesan_sekarang.php?kurir=<?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['service'];?>&perkiraan=<?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['etd'];?>&tarif_ongkir=<?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value'];?>">Pesaaaan</a>
					 </td>
				 </tr>
				 <?php
				 }
				 ?>
			 </table>
		 </div>
	 <?php
	 }
	 ?>
