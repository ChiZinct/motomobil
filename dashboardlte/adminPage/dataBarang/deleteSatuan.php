<?php
include '../../../config/config.php';

$query_delete = mysqli_query($conn, "DELETE FROM tb_satuan WHERE kode_satuan ='".$_GET['id']."'");
if($query_delete) {
   header('Location: tableSatuan.php');
} else {
   mysqli_error();
}
 ?>
