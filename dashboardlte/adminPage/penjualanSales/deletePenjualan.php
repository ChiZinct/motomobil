<?php
include '../../../config/config.php';

$sql_penjualan = mysqli_query($conn, "SELECT * FROM tb_penjualan WHERE no_invoice = '".$_GET['id']."'");
$penjualan = mysqli_fetch_array($sql_penjualan);

$sql_salesman = mysqli_query($conn, "SELECT * FROM tb_user WHERE CONCAT(nama_depan, ' ', nama_belakang) = '".$penjualan['nama_salesman']."'");
$salesman = mysqli_fetch_array($sql_salesman);

$query_pmbyranPelanggan = mysqli_query($conn, "SELECT * FROM tb_pmbyranPelanggan WHERE invoice_penjualan = '".$_GET['id']."'");

if(mysqli_num_rows($query_pmbyranPelanggan) > 0) {
   $query_delete = mysqli_query($conn, "DELETE a.*, b.*, c.* FROM tb_transaksi a, tb_penjualan b, tb_pmbyranPelanggan c WHERE a.no_invoice = b.no_invoice AND b.no_invoice = '".$_GET['id']."' AND c.invoice_penjualan = '".$_GET['id']."'");
} else {
   $query_delete = mysqli_query($conn, "DELETE a.*, b.* FROM tb_transaksi a, tb_penjualan b WHERE a.no_invoice = b.no_invoice AND b.no_invoice = '".$_GET['id']."'");
}

if($query_delete) {
   header('location: tablePenjualan.php?id='.$salesman['user_id']);
} else {
   mysqli_error($conn);
}

 ?>
