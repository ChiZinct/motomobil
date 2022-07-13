<?php
include '../../../config/config.php';

if(isset($_POST)) {
   $no_invoice = $_POST['no_invoice'];
   $tanggal = $_POST['tanggal'];
   $masuk_dari = $_POST['masuk_dari'];
   $masuk_ke = $_POST['masuk_ke'];
   $keterangan = $_POST['keterangan'];

   $sql_update = mysqli_query($conn, "UPDATE tb_barangmasuk SET
      no_invoice = '$no_invoice',
      tanggal = '$tanggal',
      masuk_dari = '$masuk_dari',
      masuk_ke = '$masuk_ke',
      keterangan = '$keterangan'
      WHERE no_invoice = '".$_GET['id']."'");

}
 ?>
