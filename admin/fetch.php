 <?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "al_barokah_shop");  
 if(isset($_POST["id_produk"]))  
 {  
      $query = "SELECT * FROM produk WHERE id_produk = '".$_POST["id_produk"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>