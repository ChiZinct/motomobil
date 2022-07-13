<?php
include '../../../config/config.php';

if(isset($_POST)) {
   $id_daerah = $_POST['id_daerah'];
   $nama_daerah = $_POST['nama_daerah'];
   $nama_salesman = $_POST['nama_salesman'];

   $sql_update = mysqli_query($conn, "UPDATE tb_daerah SET
      id_daerah = '$id_daerah',
      nama_daerah = '$nama_daerah',
      nama_salesman = '$nama_salesman'
      WHERE id_daerah = '".$_GET['id']."'");
}
 ?>
