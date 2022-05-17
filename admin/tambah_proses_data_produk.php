<?php
if(isset($_POST['tambah_data_produk'])){
	include('koneksi.php');
	$id_produk=$_POST['id_produk'];
	$nm_produk=$_POST['nm_produk'];
	$merek_produk=$_POST['merek_produk'];
	$ukuran_produk=$_POST['ukuran_produk'];
	$hrg_produk=$_POST['hrg_produk'];
	$hrg_satuan_produk=$_POST['hrg_satuan_produk'];
	$stok_produk=$_POST['stok_produk'];
	$kategori_produk=$_POST['kategori_produk'];
	$foto_produk=$_POST['foto_produk'];
	$input=mysqli_query($koneksi,"INSERT INTO produk VALUES('$id_produk','$nm_produk','$merek_produk','$ukuran_produk','$hrg_produk','$hrg_satuan_produk','$stok_produk','$kategori_produk','$foto_produk')")or
	die(mysqli_error());
	if($input){
		echo'Data berhasil ditambahkan! ';
		echo '<script>window.location="data_produk.php"</script>';
	}else{
		echo'Gagal menambahkan data! ';
		echo '<script>window.location="data_produk.php"</script>';
	}
}else{
	echo'<script>window.history.back()</script>';
}
?>