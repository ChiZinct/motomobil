<?php
include '../../../config/config.php';

if(isset($_POST)) {
   $no_invoice = $_POST['no_invoice'];
   $tanggal = $_POST['tanggal'];
   $jumlah_pembayaran = $_POST['jumlah_pembayaran'];

   $jumlah_pembayaran = str_replace(".", "", $jumlah_pembayaran);

   $sql_update = mysqli_query($conn, "UPDATE tb_pembayaran SET
      no_invoice = '$no_invoice',
      tanggal = '$tanggal',
      jumlah_pembayaran = '$jumlah_pembayaran'
      WHERE no_invoice = '".$_GET['id']."'");
}
 ?>
