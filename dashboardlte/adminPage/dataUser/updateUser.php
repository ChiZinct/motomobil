<?php
include '../../../config/config.php';

if(isset($_POST)) {
   $nama_depan = $_POST['nama_depan'];
   $nama_belakang = $_POST['nama_belakang'];
   $tgl_lahir = $_POST['tgl_lahir'];
   $no_telp = $_POST['no_telp'];

   $sql_update = mysqli_query($conn, "UPDATE tb_user SET
      nama_depan = '$nama_depan',
      nama_belakang = '$nama_belakang',
      tgl_lahir = '$tgl_lahir',
      no_telp = '$no_telp'
      WHERE user_id = '".$_GET['id']."'");
}
 ?>
