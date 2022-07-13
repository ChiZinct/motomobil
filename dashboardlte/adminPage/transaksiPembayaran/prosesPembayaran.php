<?php
require_once('../../../config/configAdd.php');

if(isset($_POST)) {
   $no_invoice = $_POST['no_invoice'];
   $tanggal = $_POST['tanggal'];
   $jumlah_pembayaran = $_POST['jumlah_pembayaran'];

   //membuang titik di rupiah
   $jumlah_pembayaran = str_replace(".", "", $jumlah_pembayaran);

   $sql = "INSERT INTO tb_pembayaran(no_invoice, tanggal, jumlah_pembayaran) VALUES(?, ?, ?)";
   $stmtinsert = $db->prepare($sql);
   $result = $stmtinsert->execute([$no_invoice, $tanggal, $jumlah_pembayaran]);

   if($result) {
      echo "Successfully added!";
   } else {
      echo "There were errors while saving the data";
   }
}
 ?>
