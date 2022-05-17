<?php
session_start();
include'koneksi.php';

if(isset($_POST['ubah'])){
	$nama=$_POST['nama'];
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	$id=$_SESSION['id'];
    $fotoawal= $_POST['fotoawal'];
    $foto = $_SESSION['foto_admin'];
    $fotoFile = $_FILES['foto']['tmp_name'];
    if(empty($foto)) {
        $foto=$fotoawal;
    }else {
        $foto=$foto;
    }
	$query=mysqli_query($koneksi,"UPDATE admin SET username='$user',password=MD5('$pass'),nama='$nama',foto='$foto' WHERE id_admin=$id");
	if($query){
		$_SESSION['user']=$user;
		$_SESSION['pass']=$pass;
		$_SESSION['nama']=$nama;
		$_SESSION['foto_admin']=$foto;
		header("location: ./profil_admin.php?usename=".$user);
	}else{
		die('gagal query');
	}
}else {
	die('y');
}

?>