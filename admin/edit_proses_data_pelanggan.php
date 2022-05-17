<?php
session_start();
if(isset($_SESSION['masuk'])){
  $useradmin=$_GET['username'];
?>
<html>
	<head><title></title></head>
<body>
<?php
if(isset($_POST['simpan'])){
	include('koneksi.php');
	$id=$_POST['id_pelanggan'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	$nama_lengkap=$_POST['nama_lengkap'];
	$jkel=$_POST['jkel'];
	$fotoawal= $_POST['fotoawal'];
	$foto= $_POST['foto'];
	if(empty($foto)) {
		$foto=$fotoawal;
	}else {
		$foto=$foto;
	}
	$no_telp=$_POST['no_telp'];
	$alamat=$_POST['alamat'];
	$update=mysqli_query($koneksi,"UPDATE pelanggan SET password=MD5('$pass'),email='$email',nama_lengkap='$nama_lengkap',jkel='$jkel',foto='$foto',no_telp='$no_telp',alamat='$alamat' WHERE id_pelanggan='$id'")or die(mysql_error());
	if($update){
		echo'Data berhasil disimpan!';
		echo '<script>window.location="edit_data_pelanggan.php?username='.$useradmin.'"</script>';
	}else{
		echo'Gagal menyimpan data!';
		echo'<a href="edit_data_pelanggan.php?id='.$id.'">Kembali</a>';
	}
}else{
	echo'<script>window.history.back()</script>';
}
?>
</body>
</html>
<?php
}else{
	echo'<script>window.location="login.php"</script>';
}
?>