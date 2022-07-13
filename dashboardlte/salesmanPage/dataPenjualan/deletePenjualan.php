<?php
include '../../../config/config.php';

$query_pmbyranPelanggan = mysqli_query($conn, "SELECT * FROM tb_pmbyranPelanggan WHERE invoice_penjualan = '".$_GET['id']."'");

if(mysqli_num_rows($query_pmbyranPelanggan) > 0) {
   $query_delete = mysqli_query($conn, "DELETE a.*, b.*, c.* FROM tb_transaksi a, tb_penjualan b, tb_pmbyranPelanggan c WHERE a.no_invoice = b.no_invoice AND b.no_invoice = '".$_GET['id']."' AND c.invoice_penjualan = '".$_GET['id']."'");
} else {
   $query_delete = mysqli_query($conn, "DELETE a.*, b.* FROM tb_transaksi a, tb_penjualan b WHERE a.no_invoice = b.no_invoice AND b.no_invoice = '".$_GET['id']."'");
}

if($query_delete) {
   header('location: tablePenjualan.php');
} else {
   mysqli_error($conn);
}

 ?>
