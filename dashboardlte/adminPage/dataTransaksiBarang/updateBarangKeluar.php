<?php
include '../../../config/config.php';

if(isset($_POST)) {
   $no_invoice = $_POST['no_invoice'];
   $tanggal = $_POST['tanggal'];
   $keluar_dari = $_POST['keluar_dari'];
   $keterangan = $_POST['keterangan'];

   $sql_update = mysqli_query($conn, "UPDATE tb_barangkeluar SET
      no_invoice = '$no_invoice',
      tanggal = '$tanggal',
      keluar_dari = '$keluar_dari',
      keterangan = '$keterangan'
      WHERE no_invoice = '".$_GET['id']."'");

}
 ?>
