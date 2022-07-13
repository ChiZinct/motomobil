<?php
include '../../../config/config.php';

//Query Table Pembayaran Pelanggan
$sql_pembayaran = mysqli_query($conn, "SELECT * FROM tb_pmbyranPelanggan WHERE invoice_pembayaran = '".$_GET['id']."'");
$pembayaran = mysqli_fetch_array($sql_pembayaran);

//Query Table tb_penjualan
$sql_penjualan = mysqli_query($conn, "SELECT * FROM tb_penjualan WHERE no_invoice = '".$pembayaran['invoice_penjualan']."'");
$penjualan = mysqli_fetch_array($sql_penjualan);

//Untuk Mendapatkan nilai jumlah_pembayaran setelah dikurangi dengan data yang akan dihapus
$total_pembayaran = $penjualan['jumlah_pembayaran'];
$nominal_pembayaran = $pembayaran['jumlah_pembayaran'];
$hasil_pengurangan = intval($total_pembayaran) - intval($nominal_pembayaran);

//Untuk meng-update status di tb_penjualan
$total_penjualan = $penjualan['total_penjualan'];
$jumlah_potongan = $penjualan['jumlah_potongan'];
$sisa = intval($total_penjualan) - intval($jumlah_potongan) - intval($hasil_pengurangan);
if($sisa > 0) {
   $status = "Belum Lunas";
} else {
   $status = "Lunas";
}

$update_penjualan = mysqli_query($conn, "UPDATE tb_penjualan SET
   jumlah_pembayaran = '$hasil_pengurangan',
   status = '$status'
   WHERE no_invoice = '".$penjualan['no_invoice']."'");

$delete_pembayaran = mysqli_query($conn, "DELETE FROM tb_pmbyranPelanggan WHERE invoice_pembayaran = '".$_GET['id']."'");

if($update_penjualan && $delete_pembayaran) {
   header('location: tablePembayaran.php');
} else {
   mysqli_error($conn);
}

 ?>
