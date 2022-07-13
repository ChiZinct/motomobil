<?php
require_once('../../../config/configAdd.php');

if(isset($_POST)) {
   $id_pelanggan = $_POST['id_pelanggan'];
   $nama_pelanggan = $_POST['nama_pelanggan'];
   $alamat = $_POST['alamat'];
   $daerah = $_POST['daerah'];
   $no_telp = $_POST['no_telp'];
   $nama_salesman = $_POST['nama_salesman'];

   $sql = "INSERT INTO tb_pelanggan(id_pelanggan, nama_pelanggan, alamat, daerah, no_telp, nama_salesman) VALUES(?, ?, ?, ?, ? ,?)";
   $stmtinsert = $db->prepare($sql);
   $result = $stmtinsert->execute([$id_pelanggan, $nama_pelanggan, $alamat, $daerah, $no_telp, $nama_salesman]);
}
 ?>
