<?php
require_once('../../../config/configAdd.php');

if(isset($_POST)){

  $kode_satuan = $_POST['kode_satuan'];
  $nama_satuan = $_POST['nama_satuan'];

  $sql= "INSERT INTO tb_satuan(kode_satuan, nama_satuan) VALUES (?,?)";
  $stmtinsert = $db->prepare($sql);
  $result = $stmtinsert->execute([$kode_satuan, $nama_satuan]);

  if ($result){
    echo "Successfully added!";
  }else{
    echo "There were errors while saving the data";
  }

}
 ?>
