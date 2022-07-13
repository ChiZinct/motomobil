<?php
require_once('../../../config/configAdd.php');

if(isset($_POST)){
    $nama_karyawan      = $_POST['nama_karyawan'];
    $tempat_lahir       = $_POST['tempat_lahir'];
    $tgl_lahir          = $_POST['tgl_lahir'];
    $nik                = $_POST['nik'];
    $jabatan            = $_POST['jabatan'];
    $masa_kerja         = $_POST['masa_kerja'];
    $gaji_pokok         = $_POST['gaji_pokok'];
    $tunj_jabatan       = $_POST['tunj_jabatan'];
    $premi              = $_POST['premi'];
    $uang_hadir         = $_POST['uang_hadir'];
    $uang_makan         = $_POST['uang_makan'];
    $uang_hari_besar    = $_POST['uang_hari_besar'];

    //Replace '.' di formatRupiah
    $gaji_pokok         = str_replace(".","",$gaji_pokok);
    $tunj_jabatan       = str_replace(".","",$tunj_jabatan);
    $premi              = str_replace(".","",$premi);
    $uang_hadir         = str_replace(".","",$uang_hadir);
    $uang_makan         = str_replace(".","",$uang_makan);
    $uang_hari_besar    = str_replace(".","",$uang_hari_besar);

    $sql = "INSERT INTO tb_karyawan(nama_karyawan, tempat_lahir, tgl_lahir, nik, jabatan, masa_kerja, gaji_pokok, tunj_jabatan,
            premi, uang_hadir, uang_makan, uang_hari_besar) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmtinsert = $db->prepare($sql);
    $result = $stmtinsert->execute([$nama_karyawan, $tempat_lahir, $tgl_lahir, $nik, $jabatan, $masa_kerja, $gaji_pokok, $tunj_jabatan,
              $premi, $uang_hadir, $uang_makan, $uang_hari_besar]);

    if($result){
        echo "Successfully added!";
    } else{
        echo "There were errors while saving the data";
    }
}
 ?>
