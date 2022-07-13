<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Motomobil Desk | Administrator</title>
  <link rel="icon" href="../../dist/img/mdLogo.png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!--Date Picker dari https://datainflow.com/create-bootstrap-datepicker-html/-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.css" rel="stylesheet" id="bootstrap-css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- fontawesome 5 -->
  <script src="https://kit.fontawesome.com/4ba7fe32ff.js" crossorigin="anonymous"></script>

  <style media="screen">
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<!--Cek apakah sudah logged in-->
<?php

session_start();
if($_SESSION['status']!="loginAdmin"){
  header("location:../index.php?pesan=belum_login");
}
 ?>

<div class="wrapper">

  <!-- Navbar-->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links-->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../../dist/img/mdLogo.png" alt="mdLogo" class="brand-image img-circle elevation-3" style="opacity: 1">
      <span class="brand-text font-weight-light">Motomobil Desk</span>
    </a>

    <!-- Sidebar -->
    <?php
    include '../../../config/config.php';

    $query_loginAs = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '".$_SESSION['username']."'");
    $login_as = mysqli_fetch_array($query_loginAs);
     ?>
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/User.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $login_as['nama_depan']." ".$login_as['nama_belakang'] ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="../index.php" class="nav-link">
              <i class="nav-icon fa fa-th-large" aria-hidden="true"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <!-- Penjualan Salesman -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-shopping-cart" aria-hidden="true"></i>
              <p>
                Penjualan Sales
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               <?php
               $query_salesman = mysqli_query($conn, "SELECT * FROM tb_user WHERE acc_type = 'Salesman'");
               while($salesman = mysqli_fetch_array($query_salesman)) {
                ?>
              <li class="nav-item">
                <a href="tablePenjualan.php?id=<?php echo $salesman['user_id'] ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    <?php echo $salesman['nama_depan']." ".$salesman['nama_belakang'] ?>
                  </p>
                </a>
              </li>
              <?php } ?>
            </ul>
          </li>

          <!-- Data Barang -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-cubes"></i>
              <p>
                Data Barang
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../dataBarang/tambahBarang.php" class="nav-link">
                  <i class="nav-icon fas fa-plus"></i>
                  <p>
                    Tambah Data Baru
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../dataBarang/tambahSatuan.php" class="nav-link">
                  <i class="nav-icon fas fa-plus"></i>
                  <p>
                    Tambah Satuan
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../dataBarang/tableProdukJual.php" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>
                    Daftar Produk Jual
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../dataBarang/tableHadiah.php" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>
                    Daftar Hadiah
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../dataBarang/tableSatuan.php" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>
                    Daftar Satuan
                  </p>
                </a>
              </li>
            </ul>
          </li>

          <!--Data Pelanggan-->
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fas fa-users nav-icon"></i>
              <p>
                Data Pelanggan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               <li class="nav-item">
                <a href="../dataPelanggan/tambahDaerah.php" class="nav-link">
                  <i class="nav-icon fas fa-plus"></i>
                  <p>Tambah Daerah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../dataPelanggan/tambahPelanggan.php" class="nav-link">
                  <i class="nav-icon fas fa-plus"></i>
                  <p>Tambah Data Pelanggan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../dataPelanggan/tableDaerah.php" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Table Daerah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../dataPelanggan/tablePelanggan.php" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Table Data Pelanggan</p>
                </a>
              </li>
            </ul>
          </li>

          <!--Data Supplier-->
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fas fa-user-tie nav-icon"></i>
              <p>
                Data Supplier
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../dataSupplier/tambahSupplier.php" class="nav-link">
                  <i class="nav-icon fas fa-plus"></i>
                  <p>Tambah Data Baru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../dataSupplier/tableSupplier.php" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Table Data Supplier</p>
                </a>
              </li>
            </ul>
          </li>

          <!--Data Karyawan-->
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Data Karyawan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../dataKaryawan/tambahKaryawan.php" class="nav-link">
                  <i class="nav-icon fas fa-plus"></i>
                  <p>Tambah Data Baru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../dataKaryawan/tambahJabatan.php" class="nav-link">
                  <i class="nav-icon fas fa-plus"></i>
                  <p>Tambah Jabatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../dataKaryawan/tableKaryawan.php" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Table Data Karyawan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../dataKaryawan/tableJabatan.php" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Table Jabatan</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Transaksi Barang -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-dolly-flatbed nav-icon"></i>
              <p>
                Transaksi Barang
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../transaksiBarang/pembelianBarang.php" class="nav-link">
                  <i class="fas fa-truck-loading nav-icon"></i>
                  <p>
                    Pembelian Barang
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../transaksiBarang/barangMasuk.php" class="nav-link">
                  <i class="fas fa-arrow-circle-right nav-icon"></i>
                  <p>
                    Barang Masuk
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../transaksiBarang/barangKeluar.php" class="nav-link">
                  <i class="fas fa-arrow-circle-left nav-icon"></i>
                  <p>
                    Barang Keluar
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../transaksiBarang/transferBarang.php" class="nav-link">
                  <i class="fas fa-exchange-alt nav-icon"></i>
                  <p>
                    Transfer Barang
                  </p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Data Transaksi Barang-->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-scroll"></i>
              <p>Data Transaksi Barang
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../dataTransaksiBarang/tablePembelianBarang.php" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Table Pembelian Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../dataTransaksiBarang/tableBarangMasuk.php" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Table Barang Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../dataTransaksiBarang/tableBarangKeluar.php" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Table Barang Keluar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../dataTransaksiBarang/tableTransferBarang.php" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Table Transfer Barang</p>
                </a>
              </li>
            </ul>
          </li>

          <!--Data Transaksi Pembayaran-->
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fa-solid fa-money-check-dollar"></i>
              <p>
                Transaksi Pembayaran
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../transaksiPembayaran/tambahPembayaran.php" class="nav-link">
                  <i class="nav-icon fas fa-plus"></i>
                  <p>Tambah Data Baru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../transaksiPembayaran/tablePembayaran.php" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Pembayaran Ke Supplier</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../transaksiPembayaran/tablePembayaranPelanggan.php" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Pembayaran Pelanggan</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Data Gudang -->
          <li class="nav-item">
            <a href="../dataGudang/tableGudang.php" class="nav-link">
             <i class="nav-icon fa-solid fa-warehouse"></i>
             <p>
                Data Gudang
             </p>
            </a>
          </li>

        <!-- Data User -->
        <li class="nav-item border-top mt-4">
          <a href="#" class="nav-link">
            <i class="nav-icon fa-solid fa-user-gear"></i>
            <p>Data User
             <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
             <a href="../dataUser/tambahUser.php" class="nav-link">
                <i class="nav-icon fas fa-plus"></i>
                <p>Tambah Data Baru</p>
             </a>
            </li>
            <li class="nav-item">
             <a href="../dataUser/tableUser.php" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>Table Daftar User</p>
             </a>
            </li>
        </ul>
     </li>

          <!-- Log Out -->
          <li class="nav-item">
            <a href="../../logout.php" class="nav-link">
             <i class="nav-icon fas fa-sign-out-alt"></i>
             <p>
                Log Out
             </p>
            </a>
          </li>
       </ul>
     </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Pembayaran</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Penjualan</li>
              <li class="breadcrumb-item active">Form Pembayaran</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <?php
   $sql_penjualan = mysqli_query($conn, "SELECT * FROM tb_penjualan WHERE no_invoice = '".$_GET['id']."'");
   $penjualan = mysqli_fetch_array($sql_penjualan);
   $sql_pelangan = mysqli_query($conn, "SELECT * FROM tb_pelanggan WHERE id_pelanggan = '".$penjualan['id_pelanggan']."'");
   $pelanggan = mysqli_fetch_array($sql_pelangan);
     ?>

     <?php
       $sql_user = mysqli_query($conn, "SELECT * FROM tb_user WHERE CONCAT(nama_depan, ' ', nama_belakang) = '".$penjualan['nama_salesman']."'");
       $user = mysqli_fetch_array($sql_user);
       $id_gudang = substr($user['id_gudang'], 2);
       $invoice_penjualan = substr($penjualan['no_invoice'], 10);
       $invoice_penjualan = str_replace("/", "", $invoice_penjualan);
       $id = mysqli_query($conn, "SELECT MAX(MID(invoice_pembayaran, 34, 4)) as invoice_no FROM tb_pmbyranPelanggan WHERE MID(invoice_pembayaran, 16, 6) = DATE_FORMAT(CURDATE(), '%y%m%d') AND MID(invoice_pembayaran, 12, 3) = 'UTM' AND MID(invoice_pembayaran, 23, 12) = '".$id_gudang.$invoice_penjualan."'");
       if(mysqli_num_rows($id) > 0) {
          $data = mysqli_fetch_array($id);
          $angka = (int)$data['invoice_no'] + 1;
       } else {
          $angka = "0001";
       }
       $prefix = "MD/PMB-PJL/UTM/".date("ymd")."/".$id_gudang.$invoice_penjualan."/";
       $no_invoice = $prefix.sprintf("%04s", $angka);
      ?>

     <?php
       function rupiah($angka) {
          $rupiah = "Rp ".number_format($angka,0,',','.');
          return $rupiah;
       }

       function tanpaRupiah($angka) {
          $tanpaRupiah = number_format($angka, 0, ',', '.');
          return $tanpaRupiah;
       }
      ?>

    <section class="content">
      <div class="container-fluid">
      <form class="main-content">
         <!-- Details Pembayaran -->
         <div class="row">
            <section class="col">
               <div class="col-md-12">
                 <div class="card card-primary">
                   <div class="form-horizontal">
                     <div class="card-body">
                        <h3 class="mb-3 pb-2 border-bottom">Details Pembayaran</h2>
                       <div class="form-group row">
                         <label for="invoice_pembayaran" class="col-sm-5 col-form-label">No. Invoice</label>
                         <div class="col-sm-7">
                           <input type="text" class="form-control" name="invoice_pembayaran" id="invoice_pembayaran" value="<?php echo $no_invoice ?>" readonly >
                         </div>
                       </div>
                       <div class="form-group row">
                         <label for="tanggal_pembayaran" class="col-sm-5 col-form-label">Tanggal</label>
                         <div class="col-sm-7">
                           <div class='input-group date' id='datepicker'>
                               <input type='text' class="form-control" id="tanggal_pembayaran" name="tanggal_pembayaran" placeholder="Tanggal" value="<?php echo date("Y/m/d") ?>" >
                               <span class="input-group-addon">
                               </span>
                           </div>
                         </div>
                       </div>
                     </div>
                  </div>
                 </div>
               </div>
            </section>
         </div>

         <!--Details Penjualan -->
         <div class="row">
             <section class="col">
               <div class="col-md-12">
                 <div class="card card-primary">
                   <div class="form-horizontal">
                     <div class="card-body">
                        <h3 class="mb-3 pb-2 border-bottom">Details Penjualan</h2>
                       <div class="form-group row">
                         <label for="invoice_penjualan" class="col-sm-5 col-form-label">No. Invoice</label>
                         <div class="col-sm-7">
                           <input type="text" class="form-control" name="invoice_penjualan" id="invoice_penjualan" value="<?php echo $penjualan['no_invoice'] ?>" readonly >
                         </div>
                       </div>
                       <div class="form-group row">
                         <label for="tanggal_penjualan" class="col-sm-5 col-form-label">Tanggal</label>
                         <div class="col-sm-7">
                               <input type='text' class="form-control" id="tanggal_penjualan" name="tanggal_penjualan" placeholder="Tanggal" value="<?php echo $penjualan['tanggal'] ?>" readonly>
                         </div>
                       </div>
                     </div>
                  </div>
                 </div>
               </div>
             </section>
         </div>

          <div class="row">
             <section class="col">
               <div class="col-md-12">
                 <div class="card card-primary">
                   <div class="form-horizontal">
                     <div class="card-body">
                        <div class="form-group row" hidden>
                         <label for="nama_salesman" class="col-sm-5 col-form-label">ID Salesman</label>
                         <div class="col-sm-7">
                           <input type="text" class="form-control" id="id_salesman" name="id_salesman" value="<?php echo $user['user_id'] ?>" readonly>
                         </div>
                       </div>
                        <div class="form-group row">
                         <label for="nama_salesman" class="col-sm-5 col-form-label">Nama Salesman</label>
                         <div class="col-sm-7">
                           <input type="text" class="form-control" id="nama_salesman" name="nama_salesman" value="<?php echo $penjualan['nama_salesman'] ?>" readonly>
                         </div>
                       </div>
                       <div class="form-group row">
                         <label for="nama_pelanggan" class="col-sm-5 col-form-label">Nama Pelanggan</label>
                         <div class="col-sm-7">
                           <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="<?php echo $pelanggan['nama_pelanggan'] ?>" readonly>
                         </div>
                       </div>
                       <div class="form-group row">
                        <label for="daerah" class="col-sm-5 col-form-label">Daerah</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" id="daerah" name="daerah" value="<?php echo $pelanggan['daerah'] ?>" readonly>
                        </div>
                      </div>
                     </div>
                  </div>
                </div>
               </div>
             </section>
        </div>

        <div class="row">
          <div class="col">
             <div class="card card-primary">
                <div class="card-body">
                   <div class="form-group row">
                       <div class="col">
                          <label for="keterangan">Keterangan</label>
                          <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo $penjualan['keterangan'] ?>" placeholder="Keterangan">
                       </div>
                   </div>
                   <div class="form-group row">
                      <div class="col">
                         <label for="jenis_pembayaran">Jenis Pembayaran</label>
                         <input type="text" class="form-control" id="jenis_pembayaran" name="jenis_pembayaran" value="<?php echo $penjualan['jenis_pembayaran'] ?>" readonly>
                      </div>
                   </div>
                   <div class="form-group row">
                      <div class="col">
                       <label for="jumlah_potongan">Jumlah Potongan</label>
                       <div class="input-group">
                         <div class="input-group-prepend">
                           <span class="input-group-text">Rp</span>
                         </div>
                         <input type="text" class="form-control" name="jumlah_potongan" id="jumlah_potongan" onkeyup="hitungSisa()" value="<?php echo tanpaRupiah($penjualan['jumlah_potongan']) ?>" readonly>
                       </div>
                     </div>
                   </div>
                   <div class="form-group row">
                      <div class="col">
                       <label for="jumlah_pembayaran_sebelumnya">Jumlah Pembayaran Sebelumnya</label>
                       <div class="input-group">
                         <div class="input-group-prepend">
                           <span class="input-group-text">Rp</span>
                         </div>
                         <input type="text" class="form-control" name="jumlah_pembayaran_sebelumnya" id="jumlah_pembayaran_sebelumnya" onkeyup="hitungSisa()" value="<?php echo tanpaRupiah($penjualan['jumlah_pembayaran']) ?>" readonly>
                       </div>
                     </div>
                   </div>
                   <div class="form-group row">
                      <div class="col">
                       <label for="jumlah_pembayaran">Jumlah Pembayaran Sekarang</label>
                       <div class="input-group">
                         <div class="input-group-prepend">
                           <span class="input-group-text">Rp</span>
                         </div>
                         <input type="text" class="form-control" name="jumlah_pembayaran" id="jumlah_pembayaran" onkeyup="hitungSisa()" value="0" onclick="klik('jumlah_pembayaran')" onblur="nol('jumlah_pembayaran')">
                       </div>
                     </div>
                   </div>
                   <div class="form-group row" hidden>
                      <div class="col">
                       <label for="total_penjualan">Total Transaksi</label>
                       <div class="input-group">
                         <div class="input-group-prepend">
                           <span class="input-group-text">Rp</span>
                         </div>
                         <?php
                            $sql_total_harga = mysqli_query($conn, 'SELECT SUM(`total_harga_satuan`) AS `total_harga` FROM `tb_transaksi` WHERE `no_invoice` = \''. mysqli_escape_string($conn, $penjualan['no_invoice']).'\'');
                            $total_harga = mysqli_fetch_array($sql_total_harga);
                         ?>
                         <input type="text" class="form-control" name="total_penjualan" id="total_penjualan" value="<?php echo $total_harga['total_harga'] ?>">
                       </div>
                     </div>
                   </div>
                   <div class="form-group row mt-5 pt-2 border-top">
                     <div class="col-md-5">
                     <h3 id="sisa_kembalian">Sisa :</h3>
                     </div>
                     <div class="col-md-7">
                     <h3 id="nominal" style="text-align: right">
                        <?php
                        $sisa = $penjualan['total_penjualan'] - $penjualan['jumlah_potongan'] - $penjualan['jumlah_pembayaran'];
                         echo rupiah($sisa);
                         ?>
                     </h3>
                     </div>
                   </div>
                </div>
             </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="col text-center" style="margin-bottom: 5%">
              <button type="submit" class="btn btn-success px-4" name="pay" id="pay">
                <i class="fas fa-check"></i>
                Pay</button>
            </div>
          </div>
        </div>
     </form>
      </div>
    </section>
            <!-- /.card -->
  </div>

  <!-- /.content-wrapper -->


  <footer class="main-footer">
    <strong>Copyright &copy; 2021 PT.Rena Djaja.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> Alpha 1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-light">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- JavaScript Jumlah Potongan -->
<script type="text/javascript">
var rupiah_potongan = document.getElementById('jumlah_potongan');
    rupiah_potongan.addEventListener('keyup', function(e){
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah_potongan.value = formatRupiah(this.value);
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split   		= number_string.split(','),
        sisa     		= split[0].length % 3,
        rupiah_potongan    	= split[0].substr(0, sisa),
        ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah_potongan += separator + ribuan.join('.');
        }

        rupiah_potongan = split[1] != undefined ? rupiah_potongan + '.' + split[1] : rupiah_potongan;
        return prefix == undefined ? rupiah_potongan : (rupiah_potongan ? + rupiah_potongan : '');
    }
</script>

<!-- JavaScript Jumlah Pembayaran -->
<script type="text/javascript">
var rupiah_pembayaran = document.getElementById('jumlah_pembayaran');
    rupiah_pembayaran.addEventListener('keyup', function(e){
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah_pembayaran.value = formatRupiah(this.value);
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split   		= number_string.split(','),
        sisa     		= split[0].length % 3,
        rupiah_pembayaran    	= split[0].substr(0, sisa),
        ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah_pembayaran += separator + ribuan.join('.');
        }

        rupiah_pembayaran = split[1] != undefined ? rupiah_pembayaran + '.' + split[1] : rupiah_pembayaran;
        return prefix == undefined ? rupiah_pembayaran : (rupiah_pembayaran ? + rupiah_pembayaran : '');
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!-- Script Sweetalert Delete -->
<script type="text/javascript">
function deleteTransaksi(id){
   Swal.fire({
     title: 'Are You Sure?',
     text: "You won't be able to revert this!",
     icon: 'warning',
     showCancelButton: true,
     confirmButtonColor: '#d33',
     cancelButtonColor: '#3085d6',
     confirmButtonText: 'Yes, delete it!'
   }).then((result) => {
     if (result.isConfirmed) {
        window.location.href='deleteTransaksi.php?id='+id;
       Swal.fire(
         'Deleted!',
         'Your file has been deleted.',
         'success'
       )

     }
   })
}
</script>

<script type="text/javascript">
   function hitungSisa() {
      var total_penjualan = document.getElementById('total_penjualan').value;
      var jumlah_potongan = document.getElementById('jumlah_potongan').value;
      var jumlah_pembayaran_sebelumnya = document.getElementById('jumlah_pembayaran_sebelumnya').value;
      var jumlah_pembayaran = document.getElementById('jumlah_pembayaran').value;

      jumlah_potongan = jumlah_potongan.replaceAll('.', '');
      jumlah_pembayaran_sebelumnya = jumlah_pembayaran_sebelumnya.replaceAll('.', '');
      jumlah_pembayaran = jumlah_pembayaran.replaceAll('.', '');

      var nominal = parseInt(total_penjualan);
      var potongan = parseInt(jumlah_potongan);
      var pembayaran_sebelumnya = parseInt(jumlah_pembayaran_sebelumnya);
      var pembayaran = parseInt(jumlah_pembayaran);

      var proses = nominal - (potongan + pembayaran_sebelumnya + pembayaran);

      if(proses < 0) {
         var hasil = String(proses);
         document.getElementById('sisa_kembalian').innerHTML = 'Kembalian :';
         document.getElementById('nominal').innerHTML = 'Rp ' + formatRupiah(hasil);
      } else {
         var hasil = String(proses);
         document.getElementById('sisa_kembalian').innerHTML = 'Sisa :';
         document.getElementById('nominal').innerHTML = 'Rp ' + formatRupiah(hasil);
      }
   }
</script>

<script type="text/javascript">
   function klik(id) {
      if(document.getElementById(id).value == '0') {
         document.getElementById(id).value = '';
      }
   }
</script>

<script type="text/javascript">
   function nol(id) {
      if(document.getElementById(id).value == '') {
         document.getElementById(id).value = '0';
      }
   }
</script>

<!--JavaScript Tombol Submit-->
<script type="text/javascript">
  $(function(){
    $('#pay').click(function(e){

      var valid = this.form.checkValidity();

        if(valid){

          var invoice_pembayaran = $('#invoice_pembayaran').val();
          var tanggal = $('#tanggal_pembayaran').val();
          var invoice_penjualan = $('#invoice_penjualan').val();
          var id_salesman = $('#id_salesman').val();
          var nama_pelanggan = $('#nama_pelanggan').val();
          var daerah = $('#daerah').val();
          var nama_salesman = $('#nama_salesman').val();
          var keterangan = $('#keterangan').val();
          var jumlah_potongan = $('#jumlah_potongan').val();
          var jumlah_pembayaran_sebelumnya = $('#jumlah_pembayaran_sebelumnya').val();
          var jumlah_pembayaran = $('#jumlah_pembayaran').val();

          e.preventDefault();

          if(jumlah_pembayaran != 0)  {
          $.ajax({
              type: 'POST',
              url: 'prosesPembayaran.php',
              data: {invoice_pembayaran: invoice_pembayaran, tanggal: tanggal, invoice_penjualan: invoice_penjualan, nama_pelanggan: nama_pelanggan, daerah: daerah, nama_salesman: nama_salesman, keterangan: keterangan, jumlah_potongan: jumlah_potongan, jumlah_pembayaran_sebelumnya: jumlah_pembayaran_sebelumnya, jumlah_pembayaran: jumlah_pembayaran},
              success: function(data){
                 Swal.fire({
                  position: 'top-end',
                  icon: 'success',
                  title: 'Pembayaran Berhasil Ditambahkan!',
                  showConfirmButton: false,
                  timer: 1000
               }).then((result) =>{
                  window.location.href = 'tablePenjualan.php?id='+id_salesman;

               })
              },
              error: function(data){
                    Swal.fire({
                      title: 'Error',
                      text: 'There were errors',
                      icon: 'error'
                    })
              }
          });
       } else  {
          Swal.fire({
              icon: 'error',
              title: 'Data Tidak Valid',
              text: 'Jumlah pembayaran tidak boleh nol!',
            })
       }

        }
    });
  });
</script>

<!-- Script Sweetalert Clear All -->
<script type="text/javascript">
function clearAll(id){
   Swal.fire({
     title: 'Are You Sure?',
     text: "You won't be able to revert this!",
     icon: 'warning',
     showCancelButton: true,
     confirmButtonColor: '#d33',
     cancelButtonColor: '#3085d6',
     confirmButtonText: 'Yes, delete it!'
   }).then((result) => {
     if (result.isConfirmed) {
        window.location.href='clearAllTransaksi.php?id='+id;
       Swal.fire(
         'Deleted!',
         'Your file has been deleted.',
         'success'
       )
     }
   })
}
</script>

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>

<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!--Script Datepicker-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script >
  $(function () {
      $('#datepicker').datepicker({
          format: "yyyy/mm/dd",
          autoclose: true,
          todayHighlight: true,
        showOtherMonths: true,
        selectOtherMonths: true,
        autoclose: true,
        changeMonth: true,
        changeYear: true,
        orientation: "button"
      });
  });
</script>
</body>
</html>
