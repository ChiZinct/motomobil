<?php
require_once('../../../config/configAdd.php');
include '../../../config/config.php';

//Query Table Pelanggan
$sql_pelanggan = mysqli_query($conn, "SELECT * FROM tb_pelanggan WHERE nama_pelanggan = '".$_POST['nama_pelanggan']."' AND daerah = '".$_POST['daerah']."'");
$pelanggan = mysqli_fetch_array($sql_pelanggan);

//Query Table Penjualan
$sql_penjualan = mysqli_query($conn, "SELECT * FROM tb_penjualan WHERE no_invoice = '".$_POST['invoice_penjualan']."'");
$penjualan = mysqli_fetch_array($sql_penjualan);

if(isset($_POST)) {
   $invoice_pembayaran = $_POST['invoice_pembayaran'];
   $tanggal = $_POST['tanggal'];
   $invoice_penjualan = $_POST['invoice_penjualan'];
   $id_pelanggan = $pelanggan['id_pelanggan'];
   $nama_salesman = $_POST['nama_salesman'];
   $jumlah_pembayaran = $_POST['jumlah_pembayaran'];

   $jumlah_pembayaran = str_replace(".", "", $jumlah_pembayaran);

   //Proses Insert Table Pembayaran Pelanggan
   $sql_insert = "INSERT INTO tb_pmbyranPelanggan(invoice_pembayaran, invoice_penjualan, tanggal, id_pelanggan, nama_salesman, jumlah_pembayaran) VALUES(?, ?, ?, ?, ?, ?)";

   $stmtinsert = $db->prepare($sql_insert);
   $result = $stmtinsert->execute([$invoice_pembayaran, $invoice_penjualan, $tanggal, $id_pelanggan, $nama_salesman, $jumlah_pembayaran]);

   //Proses Update Table Penjualan
   $total_penjualan = $penjualan['total_penjualan'];
   $jumlah_potongan = $_POST['jumlah_potongan'];
   $jumlah_pembayaran_sebelumnya = $_POST['jumlah_pembayaran_sebelumnya'];

   $jumlah_potongan = str_replace(".", "", $jumlah_potongan);
   $jumlah_pembayaran_sebelumnya = str_replace(".", "", $jumlah_pembayaran_sebelumnya);

   $total_pembayaran = intval($jumlah_pembayaran_sebelumnya) + intval($jumlah_pembayaran);
   $keterangan = $_POST['keterangan'];

   $sisa = intval($total_penjualan) - intval($jumlah_potongan) - intval($total_pembayaran);
   if($sisa > 0) {
      $status = "Belum Lunas";
   } else {
      $status = "Lunas";
   }

   $sql_update = mysqli_query($conn, "UPDATE tb_penjualan SET
      jumlah_pembayaran = '$total_pembayaran',
      keterangan = '$keterangan',
      status = '$status'
      WHERE no_invoice = '".$invoice_penjualan."'");
}
 ?>
