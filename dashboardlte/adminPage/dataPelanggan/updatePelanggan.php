<?php
include '../../../config/config.php';

if(isset($_POST)) {
   $id_pelanggan = $_POST['id_pelanggan'];
   $nama_pelanggan = $_POST['nama_pelanggan'];
   $alamat = $_POST['alamat'];
   $daerah = $_POST['daerah'];
   $no_telp = $_POST['no_telp'];
   $nama_salesman = $_POST['nama_salesman'];

   $sql_update = mysqli_query($conn, "UPDATE tb_pelanggan SET
   id_pelanggan = '$id_pelanggan',
   nama_pelanggan = '$nama_pelanggan',
   alamat = '$alamat',
   daerah = '$daerah',
   no_telp = '$no_telp',
   nama_salesman = '$nama_salesman' WHERE id_pelanggan = '".$_GET['id']."'");
}
 ?>
