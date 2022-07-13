<?php
include '../../../config/config.php';

if(isset($_POST)){
   $nama_jabatan = $_POST['nama_jabatan'];

   $sql = mysqli_query($conn, "UPDATE tb_jabatan SET nama_jabatan = '$nama_jabatan' WHERE id ='".$_GET['id']."'");

   if($sql) {
      header('Location: tableJabatan.php');
   } else {
      mysqli_error();
   }
}
 ?>
