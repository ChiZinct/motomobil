<?php
include '../../../config/config.php';

if(isset($_POST['update'])){
    $id_barang        = $_POST['id_barang'];
    $nama_barang      = $_POST['nama_barang'];
    $jenis_barang     = $_POST['jenis_barang'];
    $berat_barang     = $_POST['berat_barang'];
    $satuan_barang    = $_POST['satuan_barang'];
    $satuan_jual      = $_POST['satuan_jual'];
    $harga_beli       = $_POST['harga_beli'];
    $harga_jual       = $_POST['harga_jual'];

      //membuang titik di rupiah
    $harga_beli = str_replace(".","", $harga_beli);
    $harga_jual = str_replace(".","", $harga_jual);

    $sql = mysqli_query($conn, "UPDATE tb_barang set id_barang = '$id_barang', nama_barang = '$nama_barang', jenis_barang = '$jenis_barang', berat_barang = '$berat_barang', satuan_barang = '$satuan_barang', satuan_jual = '$satuan_jual', harga_beli = '$harga_beli', harga_jual = '$harga_jual' WHERE id_barang = '".$_GET['id']."'");


     if($sql){
       header('Location: tableProdukJual.php');
     } else {
        mysqli_error();
     }
    }

 ?>
