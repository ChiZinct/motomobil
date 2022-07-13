<?php
include '../../../config/config.php';

if(isset($_POST['update'])){
   $kode_satuan = $_POST['kode_satuan'];
   $nama_satuan = $_POST['nama_satuan'];

   $sql = mysqli_query($conn, "UPDATE tb_satuan SET kode_satuan = '$kode_satuan', nama_satuan = '$nama_satuan' WHERE kode_satuan ='".$_GET['id']."'");

   if($sql) {
      header('Location: tableSatuan.php');
   } else {
      mysqli_error();
   }
}
 ?>
