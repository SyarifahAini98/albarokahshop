<?php
if(isset($_POST) == true){
    //menghasilkan nama file yang unik, akan ada angka acak didepannya
    $namaFile = time().'_'.basename($_FILES["file"]["name"]);
    
    //folder upload
    $targetDir = "images/images_pelanggan/";
    $targetFilePath = $targetDir . $namaFile;
    
    //membolehkan ekstensiOk file tertentu
    $ekstensiFile = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    $ekstensiOk = array('jpg','png','jpeg','gif');
    
    if(in_array($ekstensiFile, $ekstensiOk)){
        //upload file ke server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            //memasukkan file data ke dalam database jika diperlukan
            //........
            $respon['status'] = 'ok';
        }else{
            $respon['status'] = 'err';
        }
    }else{
        $respon['status'] = 'type_err';
    }
    
    //menampilkan data respon dalam format JSON
    echo json_encode($respon);
}