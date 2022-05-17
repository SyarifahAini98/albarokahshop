<?php
	session_start();
if(isset($_POST['masuk'])){
	$user=$_POST['username'];
	$pass=$_POST['password'];
	$db_link = mysqli_connect('localhost', 'root', '', 'al_barokah_shop');
    $sql = "SELECT * FROM admin WHERE username='$user' and password=MD5('$pass')";
    $result = mysqli_query($db_link, $sql);
	$jml=mysqli_num_rows($result);
	if($jml==1){
		$data=mysqli_fetch_assoc($result);
		$_SESSION['user']=$user;
		$_SESSION['pass']=$pass;
		$_SESSION['id']=$data['id_admin'];
		$_SESSION['nama']=$data['nama'];
		$_SESSION['foto_admin']=$data['foto'];
		echo '<script>window.location="data_produk.php?username='.$user.'"</script>';
	}else{
		echo '<script>window.location="index.php"</script>';
	}
}
?>