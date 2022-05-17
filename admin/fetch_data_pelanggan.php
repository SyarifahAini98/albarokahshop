 <?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "al_barokah_shop");  
 if(isset($_POST["id_pelanggan"]))  
 {  
      $query = "SELECT * FROM pelanggan WHERE id_pelanggan = '".$_POST["id_pelanggan"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>