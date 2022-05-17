<?php
if(isset($_GET['id'])){
	include('koneksi.php');
	$id=$_GET['id'];
	$cek=mysqli_query($koneksi,"SELECT id_pelanggan FROM pelanggan where id_pelanggan='$id'")or die(mysql_error());
	if(mysqli_num_rows($cek)==0){
		echo'<script>window.history.back()</script>';
	}else{
		$del=mysqli_query($koneksi,"DELETE FROM pelanggan WHERE id_pelanggan='$id'");
		if($del){
			echo'Data berhasil dihapus!';
  			echo'<script>window.location="data_pelanggan.php"</script>';
		}else{
			echo'Gagal menghapus data!';
  			echo'<script>window.location="data_pelanggan.php"</script>';
		}
	}
}else{
	echo'<script>window.history.back()</script>';
}
?>