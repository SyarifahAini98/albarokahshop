 <?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "al_barokah_shop");  
 if(isset($_POST["id_transaksi"]))  
 {  
      $query = "SELECT * FROM transaksi WHERE id_transaksi = '".$_POST["id_transaksi"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>