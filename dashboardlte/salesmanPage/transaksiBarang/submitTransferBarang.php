<?php
require_once('../../../config/configAdd.php');

if(isset($_POST)) {
   $no_invoice    = $_POST['no_invoice'];
   $tanggal       = $_POST['tanggal'];
   $gudang_asal   = $_POST['gudang_asal'];
   $gudang_tujuan = $_POST['gudang_tujuan'];
   $keterangan    = $_POST['keterangan'];

   $sql = "INSERT INTO tb_transferbarang(no_invoice, tanggal, gudang_asal, gudang_tujuan, keterangan) VALUES(?, ?, ?, ?, ?)";
   $stmtinsert = $db->prepare($sql);
   $result = $stmtinsert->execute([$no_invoice, $tanggal, $gudang_asal, $gudang_tujuan, $keterangan]);

   if($result) {
      echo "Transaksi Berhasil Ditambahkan!";
   } else {
      echo "There were errors while saving the data";
   }
}

 ?>
