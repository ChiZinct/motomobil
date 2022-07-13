<?php
include '../../../config/config.php';

$query_delete = mysqli_query($conn, "DELETE FROM tb_supplier WHERE id_supplier ='".$_GET['id']."'");
if($query_delete) {
   header('Location: tableSupplier.php');
} else {
   mysqli_error();
}
 ?>
