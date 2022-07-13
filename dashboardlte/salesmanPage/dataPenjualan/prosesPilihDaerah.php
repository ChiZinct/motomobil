<?php
include '../../../config/config.php';

if(isset($_POST['choose'])) {
   $nama_daerah = $_POST['daerah'];

   $sql_daerah = mysqli_query($conn, "SELECT * FROM tb_daerah WHERE nama_daerah = '".$nama_daerah."'");
   $daerah = mysqli_fetch_array($sql_daerah);

   $id_daerah = $daerah['id_daerah'];

   header('location: tambahPenjualan.php?id='.$id_daerah);
}
?>
