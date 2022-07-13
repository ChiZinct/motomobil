<?php
include '../../../config/config.php';

$sql_total_harga = mysqli_query($conn, "SELECT SUM(total_harga_satuan) AS total_harga FROM tb_transaksi WHERE no_invoice = '".$_POST['no_invoice']."'");
while($total_harga = mysqli_fetch_array($sql_total_harga)) {
   if(isset($_POST)) {
      $no_invoice = $_POST['no_invoice'];
      $tanggal = $_POST['tanggal'];
      $supplier = $_POST['supplier'];
      $no_plat = $_POST['no_plat'];
      $total_pembelian = $total_harga['total_harga'];

      $sql_update = mysqli_query($conn, "UPDATE tb_pembelian SET
         no_invoice = '$no_invoice',
         tanggal = '$tanggal',
         supplier = '$supplier',
         no_plat = '$no_plat',
         total_pembelian = '$total_pembelian'
         WHERE no_invoice = '".$_GET['id']."'");
   }
}
 ?>
