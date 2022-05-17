<?php
session_start();
include'../admin/koneksi.php';

if(isset($_POST['ubah'])){
	$nama=$_POST['nama'];
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	$id=$_SESSION['id'];
	$jkel=$_POST['jkel'];
    $fotoawal= $_POST['fotoawal'];
    $foto = $_SESSION['foto'];
    $fotoFile = $_FILES['foto']['tmp_name'];
    if(empty($foto)) {
        $foto=$fotoawal;
    }else {
        $foto=$foto;
    }
	$email=$_POST['email'];
	$no_telp=$_POST['no_telp'];
	$alamat=$_POST['alamat'];
	$query=mysqli_query($koneksi,"UPDATE pelanggan SET username='$user',password=MD5('$pass'),nama_lengkap='$nama',jkel='$jkel', foto='$foto',email='$email', no_telp='$no_telp', alamat='$alamat' WHERE id_pelanggan=$id");
	if($query){
	    $_SESSION['user']=$user;
	    $_SESSION['pass']=$pass;
	    $_SESSION['email']=$email;
	    $_SESSION['nama']=$nama;
	    $_SESSION['jkel']=$jkel;
	    $_SESSION['foto']=$foto;
	    $_SESSION['no_telp']=$no_telp;
	    $_SESSION['alamat']=$alamat;

		header("location: ./profil_pelanggan.php?usename=".$user);
	}else{
		die('gagal query');
	}
}else {
	die('y');
}

?>