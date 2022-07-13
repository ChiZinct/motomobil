<?php
include '../../../config/config.php';

$query_delete = mysqli_query($conn, "DELETE FROM tb_transaksi WHERE CONCAT(id_barang,no_invoice) = '".$_GET['id'].$_GET['invoice']."'");

if($query_delete) {
   header('location: '.$_SERVER['HTTP_REFERER']);
   exit;
} else {
   mysqli_error();
}
 ?>
