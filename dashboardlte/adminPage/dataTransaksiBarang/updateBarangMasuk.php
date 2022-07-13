<?php
include '../../../config/config.php';

if(isset($_POST)) {
   $no_invoice = $_POST['no_invoice'];
   $tanggal = $_POST['tanggal'];
   $masuk_dari = $_POST['masuk_dari'];
   $keterangan = $_POST['keterangan'];

   $sql_update = mysqli_query($conn, "UPDATE tb_barangmasuk SET
      no_invoice = '$no_invoice',
      tanggal = '$tanggal',
      masuk_dari = '$masuk_dari',
      keterangan = '$keterangan'
      WHERE no_invoice = '".$_GET['id']."'");

}
 ?>
