<?php
include '../../../config/config.php';

$query_delete = mysqli_query($conn, "DELETE FROM tb_jabatan WHERE nama_jabatan = '".$_GET['id']."'");
if($query_delete) {
   header('Location: tableJabatan.php');
} else {
   mysqli_error();
}
 ?>
