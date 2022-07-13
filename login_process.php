<?php

session_start();

include 'config/config.php';

$username = $_POST['username'];
$password = sha1($_POST['password']);


$data = mysqli_query($conn, "SELECT * FROM tb_user WHERE username='$username' AND password='$password'");

$result = mysqli_num_rows($data);


if($result > 0){
  $login = mysqli_fetch_assoc($data);

    if($login['acc_type'] === "Administrator") {
      $_SESSION['username'] = $username;
      $_SESSION['status'] = "loginAdmin";
      header("location:dashboardlte/adminPage/index.php");
   }elseif($login['acc_type'] === "Salesman") {
      $_SESSION['username'] = $username;
      $_SESSION['status'] = "loginSalesman";
    header("location:dashboardlte/salesmanPage/index.php");
  }
}else{
  header("location:index.php?pesan=gagal");
}

 ?>
