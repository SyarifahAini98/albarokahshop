<?php
if(isset($_GET['id'])){
	include('koneksi.php');
	$id=$_GET['id'];
	$cek=mysqli_query($koneksi,"SELECT id_detail_trs FROM detail_transaksi WHERE id_detail_trs='$id'")or die('perintah sql salah');
	if(mysqli_num_rows($cek)==0){
		echo'<script>window.history.back()</script>';
	}else{
		$del=mysqli_query($koneksi,"UPDATE detail_transaksi SET testimoni='' WHERE id_detail_trs='$id'");
		if($del){
			echo'Data berhasil dihapus!';
  			echo'<script>window.location="data_testimoni.php"</script>';
		}else{
			echo'Gagal menghapus data!';
  			echo'<script>window.location="data_testimoni.php"</script>';
		}
	}
}else{
	echo'<script>window.history.back()</script>';
}
?>