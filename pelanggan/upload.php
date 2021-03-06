<?php
session_start();
// $namaFile = time().'_'.basename($_FILES["file"]["name"]);
// $_SESSION['namafoto']=$namaFile;

function randomString() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    $length = 25;
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function getFormat($str) {
    $a = explode(".", $str);
    return $a[count($a) - 1];
}

$newName = randomString();

if(isset($_POST) == true){
    //menghasilkan nama file yang unik, akan ada angka acak didepannya
    
    //folder upload
    $targetDir = "../images/images_transaksi/";
    $foto = $_FILES['file']['name'];
    $format = getFormat($foto);
    $targetFilePath = $targetDir . $newName.".".$format;
    
    //membolehkan ekstensiOk file tertentu
    $ekstensiFile = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    $ekstensiOk = array('jpg','png','jpeg','gif');
    
    if(in_array($format, $ekstensiOk)){
        //upload file ke server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            //memasukkan file data ke dalam database jika diperlukan
            //........
            $respon['status'] = 'ok';
            $_SESSION['foto_admin']=$newName.".".$format;
include'../admin/koneksi.php';
    $id=$_SESSION['id_trs'];
    $foto = $_SESSION['foto_admin'];
    $fotoFile = $_FILES['foto']['tmp_name'];
    $tgl=date('Y-m-d');
    $query=mysqli_query($koneksi,"UPDATE transaksi SET foto='$foto', tgl_transaksi='$tgl' status='Terbayar' WHERE id_transaksi='$id'");
    if($query){
        header("location: ./transaksi.php");
    }else{
        die('gagal query');
    }
        }else{
            $respon['status'] = 'err';
        }
    }else{
        $respon['status'] = 'type_err';
    }
    
    //menampilkan data respon dalam format JSON
    echo json_encode($respon);
}