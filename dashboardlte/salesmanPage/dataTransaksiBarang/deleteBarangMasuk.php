<?php
include '../../../config/config.php';

$query_delete = mysqli_query($conn, "DELETE a.*, b.* FROM tb_transaksi a, tb_barangmasuk b WHERE a.no_invoice = b.no_invoice AND b.no_invoice = '".$_GET['id']."'");

if($query_delete) {
   header('location: tableBarangMasuk.php');
} else {
   mysqli_error($conn);
}
 ?>
