<?php
    if (!isset($_SESSION)) {
        session_start();
    }
if(isset($_SESSION['masuk'])){
  $useradmin=$_GET['username'];
?>
<html>
	<head><title></title></head>
<body>
<?php
if(isset($_POST['simpan'])){
	include('koneksi.php');
	$id=$_POST['id_produk'];
	$nama_produk=$_POST['nama_produk'];
	$harga_produk=$_POST['harga_produk'];
	$stok_produk=$_POST['stok_produk'];
	$kategori=$_POST['kategori'];
	$fotoawal= $_POST['fotoawal'];
	$foto= $_POST['foto'];
	if(empty($foto)) {
		$foto=$fotoawal;
	}else {
		$foto=$foto;
	}
	$update=mysqli_query($koneksi,"UPDATE produk SET nama_produk='$nama_produk',nama_produk='$nama_produk',harga_produk='$harga_produk',stok_produk='$stok_produk',kategori='$kategori',foto='$foto' WHERE id_produk='$id'")or die(mysql_error());
	if($update){
		echo'Data berhasil disimpan!';
		echo '<script>window.location="edit_data_produk.php?username='.$useradmin.'"</script>';
	}else{
		echo'Gagal menyimpan data!';
		echo'<a href="edit_data_produk.php?id='.$id.'">Kembali</a>';
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