<?php
include '../../../config/config.php';

$query_delete = mysqli_query($conn, "DELETE FROM tb_karyawan WHERE nik ='".$_GET['id']."'");
if($query_delete){
   header('Location: tableKaryawan.php');
} else {
   mysqli_error();
}
 ?>
