<?php
	include('koneksi.php');
	$id=$_GET['id'];
	$update=mysqli_query($koneksi,"UPDATE transaksi SET status='Terkirim' WHERE id_transaksi='$id'")or die(mysqli_error());
	if($update){
		echo '<script>window.location="data_pemesanan.php"</script>';
	}else{
		echo '<script>window.location="data_pemesanan.php"</script>';
	}
?>