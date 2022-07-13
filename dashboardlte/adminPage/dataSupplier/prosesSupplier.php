<?php
require_once('../../../config/configAdd.php');

if(isset($_POST)){
    $id_supplier    = $_POST['id_supplier'];
    $nama_supplier  = $_POST['nama_supplier'];
    $no_telp1       = $_POST['no_telp1'];
    $no_telp2       = $_POST['no_telp2'];
    $alamat         = $_POST['alamat'];

    $sql = "INSERT INTO tb_supplier(id_supplier, nama_supplier, no_telp1, no_telp2, alamat) VALUES (?,?,?,?,?)";
    $stmtinsert = $db->prepare($sql);
    $result = $stmtinsert->execute([$id_supplier, $nama_supplier, $no_telp1, $no_telp2, $alamat]);

    if($result){
        echo "Successfully added!";
    } else{
        echo "There were errors while saving the data";
    }
}

 ?>
