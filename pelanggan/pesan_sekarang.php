<?php
    if (!isset($_SESSION)) {
        session_start();
    }
if(isset($_GET['kurir'])){
	include('../admin/koneksi.php');
	$id_pelanggan=$_SESSION['id'];
	$sub_total=$_SESSION['total'];
	$tarif_ongkir=$_GET['tarif_ongkir'];
	$total_bayar=$sub_total+$tarif_ongkir;
	$tgl_pemesanan=date('Y-m-d');
	$tgl_transaksi='';
	$foto='';
	$status='Belum Upload';
	$alamat=$_SESSION['alamat'];
	$perkiraan=$_GET['perkiraan'];
	$rekening='';
	$kurir=$_GET['kurir'];
	$berat=$_SESSION['berat'];
	$transaksi = mysqli_query($koneksi,"insert into transaksi values ('','$id_pelanggan','$sub_total','$tarif_ongkir','$total_bayar','$tgl_pemesanan','$tgl_transaksi','$foto','$status','$alamat','$perkiraan','$rekening','$kurir','$berat')")or die(mysqli_error());
	if($transaksi){
		$query = "SELECT COUNT(*) as total FROM transaksi";
		$result = mysqli_query($koneksi, $query);
		while($row = mysqli_fetch_array($result)){
		$id_trs=$row['total'];	}
	$jumlahdata=$_SESSION['jumlah_keranjang'];

foreach ($_SESSION['items'] as $key => $val){
            $query = mysqli_query ($koneksi,"select * from produk where id_produk = '$key'");
            $rs = mysqli_fetch_array ($query);
             
            $jumlah_harga = $rs['harga_produk'] * $val;
            $jumlah_berat=$rs['berat']*$val;
            $id_produk=$rs['id_produk'];
            $qty=$val;
            $total_harga=$jumlah_harga;

		// $total_harga=$_SESSION['total_harga_dtltrs'];
		// $id_produk=$_SESSION['id_produk_dtltrs'];
		// $qty=$_SESSION['qty_dtltrs'];

		$sql = mysqli_query($koneksi,"insert into detail_transaksi values ('','$id_trs','$id_produk','$qty','$total_harga','','','')")or die(mysqli_error());

            $update = mysqli_query ($koneksi,"update produk set stok_produk=stok_produk-$qty where id_produk='$id_produk'");
      
  }
		echo'Berhasil';
		echo'<script>window.location="info_pembayaran.php"</script>';
	}else{
		echo'Gagal';
	}
}
?>