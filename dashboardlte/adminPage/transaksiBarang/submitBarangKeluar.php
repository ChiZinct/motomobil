<?php
require_once('../../../config/configAdd.php');

if(isset($_POST)) {
   $no_invoice    = $_POST['no_invoice'];
   $tanggal       = $_POST['tanggal'];
   $keluar_dari   = $_POST['keluar_dari'];
   $keterangan    = $_POST['keterangan'];

   $sql = "INSERT INTO tb_barangkeluar(no_invoice, tanggal, keluar_dari, keterangan) VALUES(?, ?, ?, ?)";
   $stmtinsert = $db->prepare($sql);
   $result = $stmtinsert->execute([$no_invoice, $tanggal, $keluar_dari, $keterangan]);

   if($result) {
      echo "Transaksi Berhasil Ditambahkan!";
   } else {
      echo "There were errors while saving the data";
   }
}
 ?>
