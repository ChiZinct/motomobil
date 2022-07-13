<?php
include '../../../config/config.php';

$query_delete = mysqli_query($conn, "DELETE FROM tb_daerah WHERE id_daerah = '".$_GET['id']."'");

if($query_delete) {
   header('location: '.$_SERVER['HTTP_REFERER']);
   exit;
} else {
   mysqli_error();
}
 ?>
