<?php
require_once('../../../config/configAdd.php');

if(isset($_POST)) {
   $id_daerah = $_POST['id_daerah'];
   $nama_daerah = $_POST['nama_daerah'];
   $nama_salesman = $_POST['nama_salesman'];

   $sql = "INSERT INTO tb_daerah(id_daerah, nama_daerah, nama_salesman) VALUES(?, ?, ?)";
   $stmtinsert = $db->prepare($sql);
   $result = $stmtinsert->execute([$id_daerah, $nama_daerah, $nama_salesman]);

}
 ?>
