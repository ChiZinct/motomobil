<?php
require_once('../../../config/configAdd.php');
include '../../../config/config.php';

$sql_total_harga = mysqli_query($conn, "SELECT SUM(total_harga_satuan) AS total_harga FROM tb_transaksi WHERE no_invoice = '".$_POST['no_invoice']."'");

while($total_harga = mysqli_fetch_array($sql_total_harga)) {
   if(isset($_POST)) {
      $no_invoice       = $_POST['no_invoice'];
      $tanggal          = $_POST['tanggal'];
      $supplier         = $_POST['supplier'];
      $no_plat          = $_POST['no_plat'];
      $total_pembelian  = $total_harga['total_harga'];

      $sql = "INSERT INTO tb_pembelian(no_invoice, tanggal, supplier, no_plat, total_pembelian) VALUES (?, ?, ?, ?, ?)";
      $stmtinsert = $db->prepare($sql);
      $result = $stmtinsert->execute([$no_invoice, $tanggal, $supplier, $no_plat, $total_pembelian]);

      if($result) {
         echo "Transaksi Berhasil Ditambahkan!";
      } else {
         echo "There were errors while saving the data";
      }
   }
}

 ?>
