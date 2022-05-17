<?php
include'../admin/koneksi.php';
?>
<?php

    if(isset($_GET['action']) && $_GET['action']=="add"){ 
          
        $id=intval($_GET['id']); 
          
        if(isset($_SESSION['cart'][$id])){ 
              
            $_SESSION['cart'][$id]['kuantitas']++; 
              
        }else{ 
              ?>

              <?php
            $query_s=mysqli_query($koneksi,"SELECT * FROM produk WHERE id_produk={$id}"); 
            if(mysqli_num_rows($query_s)!=0){ 
                $row_s=mysqli_fetch_array($query_s); 
                  
                $_SESSION['cart'][$row_s['id_produk']]=array( 
                        "kuantitas" => 1, 
                        "harga" => $row_s['harga_produk'] 
                    ); 
                  
                  
            }else{ 
                  
                $message="ID Produk ini tidak benar!"; 
                  
            } 
              
        } 
          
    } 
  
?> 
    <h1>Daftar Produk</h1> 
    <?php 
        if(isset($message)){ 
            echo "<h2>$message</h2>"; 
        } 
    ?> 
    <table> 
        <tr> 
            <th>Nama Produk</th> 
            <th>Ukuran</th> 
            <th>Harga</th> 
            <th>Aksi</th> 
        </tr> 
          
        <?php 
          
            $query=mysqli_query($koneksi,"SELECT * FROM produk ORDER BY id_produk DESC");
              
            $row=mysqli_fetch_assoc($query);
                  
        ?> 
            <tr> 
                <td><?php echo $row['nama_produk'] ?></td> 
                <td><?php echo $row['ukuran'] ?></td> 
                <td><?php echo $row['harga_produk'] ?>$</td> 
                <td><a href="index.php?page=produk&action=add&id=<?php echo $row['id_produk'] ?>">Tambah</a><a href="lihat.php?page=lihat&id=<?php echo $row['id_produk'] ?>">Lihat</a></td> 
            </tr>
          
    </table>