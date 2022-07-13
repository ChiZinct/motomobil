<?php
include '../../../config/config.php';

if(isset($_POST)){
   $nama_karyawan    = $_POST['nama_karyawan'];
   $tempat_lahir     = $_POST['tempat_lahir'];
   $tgl_lahir        = $_POST['tgl_lahir'];
   $nik              = $_POST['nik'];
   $jabatan          = $_POST['jabatan'];
   $masa_kerja       = $_POST['masa_kerja'];
   $gaji_pokok       = $_POST['gaji_pokok'];
   $tunj_jabatan     = $_POST['tunj_jabatan'];
   $premi            = $_POST['premi'];
   $uang_hadir       = $_POST['uang_hadir'];
   $uang_makan       = $_POST['uang_makan'];
   $uang_hari_besar  = $_POST['uang_hari_besar'];

   //membuang titik di rupiah
   $gaji_pokok = str_replace(".","",$gaji_pokok);
   $tunj_jabatan = str_replace(".","",$tunj_jabatan);
   $premi = str_replace(".","",$premi);
   $uang_hadir = str_replace(".","",$uang_hadir);
   $uang_makan = str_replace(".","",$uang_makan);
   $uang_hari_besar = str_replace(".","",$uang_hari_besar);

   $sql = mysqli_query($conn, "UPDATE tb_karyawan SET
                       nama_karyawan   = '$nama_karyawan',
                       tempat_lahir    = '$tempat_lahir',
                       tgl_lahir       = '$tgl_lahir',
                       nik             = '$nik',
                       jabatan         = '$jabatan',
                       masa_kerja      = '$masa_kerja',
                       gaji_pokok      = '$gaji_pokok',
                       tunj_jabatan    = '$tunj_jabatan',
                       premi           = '$premi',
                       uang_hadir      = '$uang_hadir',
                       uang_makan      = '$uang_makan',
                       uang_hari_besar = '$uang_hari_besar'
                       WHERE nik ='".$_GET['id']."'");

   if($sql) {
      header('Location: tableKaryawan.php');
   } else {
      mysqli_error();
   }
}
 ?>
