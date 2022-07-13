<?php
include '../../../config/config.php';

$query_clearAll = mysqli_query($conn, "DELETE FROM tb_transaksi WHERE no_invoice = '".$_GET['id']."'");

if($query_clearAll) {
   header('location: '.$_SERVER['HTTP_REFERER']);
   exit;
} else {
   mysqli_error();
}
 ?>
