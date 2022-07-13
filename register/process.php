<?php
require_once('../config/configAdd.php');
 ?>
<?php
if(isset($_POST)){

  $nama_depan = $_POST['nama_depan'];
  $nama_belakang = $_POST['nama_belakang'];
  $tgl_lahir = $_POST['tgl_lahir'];
  $no_telp = $_POST['no_telp'];
  $acc_type = $_POST['acc_type'];
  $user_id = $_POST['user_id'];
  $username = $_POST['username'];
  $password = sha1($_POST['password']);
  $id_gudang = null;

  if($acc_type === "Salesman") {
     $prefix = "G-";
     $id = substr($nama_depan, 0, 1).substr($nama_belakang, 0, 1);
     $id_gudang = $prefix.$id;
 } else if($acc_type === "Administrator") {
    $id_gudang = "UTM";
}

  $sql = "INSERT INTO tb_user(nama_depan, nama_belakang, tgl_lahir, no_telp, acc_type, user_id, username, password, id_gudang ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
  $stmtinsert = $db->prepare($sql);

  $result = $stmtinsert->execute([$nama_depan, $nama_belakang, $tgl_lahir, $no_telp, $acc_type, $user_id, $username, $password, $id_gudang]);

  if ($result){
    echo "Successfuly saved";
  }else{
    echo "There were errors while saving the data";
  }
}else{
  echo "No Data";
}

 ?>
