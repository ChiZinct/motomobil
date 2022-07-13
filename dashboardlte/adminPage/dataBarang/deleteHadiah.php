<?php
include '../../../config/config.php';

$query_delete = mysqli_query($conn, "DELETE FROM tb_barang WHERE id_barang ='".$_GET['id']."'");
if($query_delete){
   header('Location: tableHadiah.php');
} else {
   mysqli_error();
}
 ?>
