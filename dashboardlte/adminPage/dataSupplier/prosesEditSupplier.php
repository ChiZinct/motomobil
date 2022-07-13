<?php
include '../../../config/config.php';

if(isset($_POST)){
   $id_supplier   = $_POST['id_supplier'];
   $nama_supplier = $_POST['nama_supplier'];
   $no_telp1      = $_POST['no_telp1'];
   $no_telp2      = $_POST['no_telp2'];
   $alamat        = $_POST['alamat'];

   $sql = mysqli_query($conn, "UPDATE tb_supplier SET id_supplier = '$id_supplier', nama_supplier = '$nama_supplier', no_telp1 = '$no_telp1', no_telp2 = '$no_telp2', alamat = '$alamat' WHERE id_supplier ='".$_GET['id']."'");

   if($sql) {
      header('Location: tableSupplier.php');
   } else {
      mysqli_error();
   }
}
 ?>
