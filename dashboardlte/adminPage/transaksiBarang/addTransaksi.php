<?php
require_once('../../../config/configAdd.php');
include '../../../config/config.php';

$sql_barang = mysqli_query($conn, "SELECT * FROM tb_barang WHERE id_barang = '".$_POST['id_barang']."'");

while($barang = mysqli_fetch_array($sql_barang)) {
   if(isset($_POST)) {
      $no_invoice          = $_POST['no_invoice'];
      $id_barang           = $_POST['id_barang'];
      $qty                 = $_POST['qty'];
      $satuan              = $_POST['satuan'];
      $total_harga_satuan  = $qty * $barang['harga_beli'];
      $sql = "INSERT INTO tb_transaksi(no_invoice, id_barang, qty, satuan, total_harga_satuan) VALUES (?, ?, ?, ?, ?)";
      $stmtinsert = $db->prepare($sql);
      $result = $stmtinsert->execute([$no_invoice, $id_barang, $qty, $satuan, $total_harga_satuan]);

      if($result) {
         echo "Transaksi berhasil ditambahkan!";
      } else {
         echo "There were errors while saving the data";
      }
   }
}
 ?>
