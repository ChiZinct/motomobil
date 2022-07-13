<?php
require_once('../../../config/configAdd.php');

if(isset($_POST)){
    $nama_jabatan = $_POST['nama_jabatan'];

$sql = "INSERT INTO tb_jabatan(nama_jabatan) VALUES (?)";
$stmtinsert = $db->prepare($sql);
$result = $stmtinsert->execute([$nama_jabatan]);

if($result){
    echo "Successfully added!";
    } else{
        echo "There were errors while saving the data.";
    }
}

 ?>
