<?php
include '../../../config/config.php';

if(isset($_POST)) {
   $no_invoice = $_POST['no_invoice'];
   $tanggal = $_POST['tanggal'];
   $gudang_asal = $_POST['gudang_asal'];
   $gudang_tujuan = $_POST['gudang_tujuan'];
   $keterangan = $_POST['keterangan'];

   $sql_update = mysqli_query($conn, "UPDATE tb_transferbarang SET
      no_invoice = '$no_invoice',
      tanggal = '$tanggal',
      gudang_asal = '$gudang_asal',
      gudang_tujuan = '$gudang_tujuan',
      keterangan = '$keterangan'
      WHERE no_invoice = '".$_GET['id']."'");

}
 ?>
