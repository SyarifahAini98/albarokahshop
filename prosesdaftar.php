<?php
session_start();
include "admin/koneksi.php";
if(isset($_POST['submit'])){
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$nama_lengkap = $_POST['nama_lengkap'];
$jkel = $_POST['jkel'];
$foto = $_SESSION['namafoto'];
$no_telp = $_POST['no_telp'];
$alamat = $_POST['alamat'];
if (empty($username)){
echo "<script>alert('Username belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=daftar.php'>";
}else
if (empty($password)){
echo "<script>alert('password belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=daftar.php'>";
}else 
if(empty($email)){
echo "<script>alert('email belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=daftar.php'>";
}else 
if (empty($nama_lengkap)){
echo "<script>alert('nama lengkap belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=daftar.php'>";
}else
if (empty($jkel)){
echo "<script>alert('Jenis kelamin belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=daftar.php'>";
}else
if (empty($foto)){
echo "<script>alert('foto belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=daftar.php'>";
}else
if (empty($no_telp)){
echo "<script>alert('no telp belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=daftar.php'>";
}else
if (empty($alamat)){
echo "<script>alert('alamat belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=daftar.php'>";
}else{
$password2=MD5($password);
$daftar = mysqli_query($koneksi,"INSERT INTO pelanggan values ('','$username','$password2','$email','$nama_lengkap','$jkel','$foto','$no_telp','$alamat')");
if ($daftar){
echo "<script>alert('Berhasil Mendaftar')</script>";
echo '<script>window.location = "masuk.php"</script>';
}else{
echo "<script>alert('Gagal Mendaftar')</script>";
}
}
}
?>