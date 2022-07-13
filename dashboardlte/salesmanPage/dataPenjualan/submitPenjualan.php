<?php
require_once('../../../config/configAdd.php');
include '../../../config/config.php';

$sql_pelanggan =mysqli_query($conn, "SELECT * FROM tb_pelanggan WHERE nama_pelanggan = '".$_POST['nama_pelanggan']."' AND daerah = '".$_POST['daerah']."'");
$pelanggan = mysqli_fetch_array($sql_pelanggan);
if(isset($_POST)) {
   $no_invoice = $_POST['no_invoice'];
   $tanggal = $_POST['tanggal'];
   $id_pelanggan = $pelanggan['id_pelanggan'];
   $nama_salesman = $_POST['nama_salesman'];
   $total_penjualan = $_POST['total_penjualan'];
   $keterangan = $_POST['keterangan'];
   $jenis_pembayaran = $_POST['jenis_pembayaran'];
   $jumlah_potongan = $_POST['jumlah_potongan'];
   $jumlah_pembayaran = $_POST['jumlah_pembayaran'];

   $jumlah_potongan = str_replace(".", "", $jumlah_potongan);
   $jumlah_pembayaran = str_replace(".", "", $jumlah_pembayaran);

   $sisa = intval($total_penjualan) - intval($jumlah_potongan) - intval($jumlah_pembayaran);
   if($sisa > 0) {
      $status = "Belum Lunas";
   } elseif($sisa <= 0) {
      $status  = "Lunas";
   }

   $sql = "INSERT INTO tb_penjualan(no_invoice, tanggal, id_pelanggan, nama_salesman, total_penjualan, keterangan, jenis_pembayaran, jumlah_potongan, jumlah_pembayaran, status) VALUES(? ,?, ?, ?, ?, ?, ?, ?, ?, ?)";
   $stmtinsert = $db->prepare($sql);
   $result = $stmtinsert->execute([$no_invoice, $tanggal, $id_pelanggan, $nama_salesman, $total_penjualan, $keterangan, $jenis_pembayaran, $jumlah_potongan, $jumlah_pembayaran, $status]);
}
 ?>
