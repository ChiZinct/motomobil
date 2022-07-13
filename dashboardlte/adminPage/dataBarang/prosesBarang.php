<?php
require_once('../../../config/configAdd.php');

if(isset($_POST)){
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

    $sql = "INSERT INTO tb_barang(id_barang, nama_barang, jenis_barang, berat_barang, satuan_barang, satuan_jual, harga_beli, harga_jual)
            VALUES (?,?,?,?,?,?,?,?)";
    $stmtinsert = $db->prepare($sql);
    $result = $stmtinsert->execute([$id_barang, $nama_barang, $jenis_barang, $berat_barang, $satuan_barang, $satuan_jual, $harga_beli, $harga_jual]);

    if($result){
        echo "Successfully added!";
      }else{
        echo "There were errors while saving the data";
      }
    }

 ?>
