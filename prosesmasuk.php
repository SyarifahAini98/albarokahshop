<?php
  session_start();
if(isset($_POST['submit'])){
  $user=$_POST['username'];
  $pass=$_POST['password'];
  $db_link = mysqli_connect('localhost', 'root', '', 'al_barokah_shop');
  $sql = mysqli_query($db_link, "SELECT * FROM pelanggan WHERE username='$user' and password=MD5('$pass')");
  $jml=mysqli_num_rows($sql);
  if($jml==1){
    echo "<script>alert('Berhasil Login!')</script>";
    $data=mysqli_fetch_assoc($sql);
    $_SESSION['user']=$user;
    $_SESSION['pass']=$pass;
    $_SESSION['id']=$data['id_pelanggan'];
    $_SESSION['email']=$data['email'];
    $_SESSION['nama']=$data['nama_lengkap'];
    $_SESSION['jkel']=$data['jkel'];
    $_SESSION['foto']=$data['foto'];
    $_SESSION['no_telp']=$data['no_telp'];
    $_SESSION['alamat']=$data['alamat'];
    echo '<script>window.location="pelanggan/index.php?username='.$user.'"</script>';
  }else{
    echo "<script>alert('Username atau Password salah')</script>";
    echo "<meta http-equiv='refresh' content='1 url=masuk.php'>";
  }
}
?>