<?php
include '../../../config/config.php';

if(isset($_POST)) {
   $total_penjualan = $_POST['total_penjualan'];
   $keterangan = $_POST['keterangan'];
   $jenis_pembayaran = $_POST['jenis_pembayaran'];
   $jumlah_potongan = $_POST['jumlah_potongan'];
   $jumlah_pembayaran = $_POST['jumlah_pembayaran'];

   $jumlah_potongan = str_replace(".", "", $jumlah_potongan);
   $jumlah_pembayaran = str_replace(".", "", $jumlah_pembayaran);


   $sql_update = mysqli_query($conn, "UPDATE tb_penjualan SET
      total_penjualan = '$total_penjualan',
      keterangan = '$keterangan',
      jenis_pembayaran = '$jenis_pembayaran',
      jumlah_potongan = '$jumlah_potongan',
      jumlah_pembayaran = '$jumlah_pembayaran'
      WHERE no_invoice = '".$_GET['id']."'");
}
 ?>
