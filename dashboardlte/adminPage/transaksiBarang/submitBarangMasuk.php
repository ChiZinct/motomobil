<?php
require_once('../../../config/configAdd.php');

if(isset($_POST)) {
   $no_invoice = $_POST['no_invoice'];
   $tanggal    = $_POST['tanggal'];
   $masuk_dari = $_POST['masuk_dari'];
   $masuk_ke   = $_POST['masuk_ke'];
   $keterangan = $_POST['keterangan'];

   $sql = "INSERT INTO tb_barangmasuk(no_invoice, tanggal, masuk_dari, masuk_ke, keterangan) VALUES (?, ?, ?, ?, ?)";
   $stmtinsert = $db->prepare($sql);
   $result = $stmtinsert->execute([$no_invoice, $tanggal, $masuk_dari, $masuk_ke, $keterangan]);

   if($result) {
      echo "Transaksi Berhasil Ditambahkan!";
   } else {
      echo "There were errors while saving the data";
   }
}
  ?>
