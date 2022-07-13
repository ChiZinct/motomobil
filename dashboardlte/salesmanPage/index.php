<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Motomobil Desk | Salesman</title>
  <link rel="icon" href="../dist/img/mdLogo.png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
  <!-- fontawesome 5 -->
 <script src="https://kit.fontawesome.com/4ba7fe32ff.js" crossorigin="anonymous"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!--Cek apakah sudah logged in-->
<?php
session_start();
if($_SESSION['status']!="loginSalesman"){
  header("location:../../index.php?pesan=belum_login");
}
include '../../config/config.php';
 ?>
<div class="wrapper">
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../dist/img/mdLogoFull.png" alt="mdLogoFull" height="400" width="400">
  </div>
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
      <img src="../dist/img/mdLogo.png" alt="mdLogo" class="brand-image img-circle elevation-3" style="opacity: 1">
      <span class="brand-text font-weight-light">Motomobil Desk</span>
    </a>

    <!-- Sidebar -->
    <?php
    $query_loginAs = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '".$_SESSION['username']."'");
    $login_as = mysqli_fetch_array($query_loginAs);
     ?>
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/User.png" class="img-circle elevation-2" alt="User Image">
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
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-th-large" aria-hidden="true"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <!--Data Penjualan-->
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fa-solid fa-cart-shopping"></i>
              <p>
                Data Penjualan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="dataPenjualan/pilihDaerah.php" class="nav-link">
                  <i class="nav-icon fas fa-plus"></i>
                  <p>Tambah Penjualan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="dataPenjualan/tablePenjualan.php" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Daftar Penjualan</p>
                </a>
              </li>
            </ul>
          </li>

          <!--Data Pembayaran Pelanggan-->
          <li class="nav-item">
            <a href="dataPembayaran/tablePembayaran.php" class="nav-link">
            <i class="nav-icon fa-solid fa-table"></i>
              <p>
                Data Pembayaran
              </p>
            </a>
          </li>

          <!--Data Pelanggan-->
          <li class="nav-item">
            <a href="dataPelanggan/tablePelanggan.php" class="nav-link">
            <i class="fas fa-users nav-icon"></i>
              <p>
                Data Pelanggan
              </p>
            </a>
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
                <a href="transaksiBarang/barangMasuk.php" class="nav-link">
                  <i class="fas fa-arrow-circle-right nav-icon"></i>
                  <p>
                    Barang Masuk
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="transaksiBarang/barangKeluar.php" class="nav-link">
                  <i class="fas fa-arrow-circle-left nav-icon"></i>
                  <p>
                    Barang Keluar
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="transaksiBarang/transferBarang.php" class="nav-link">
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
                <a href="dataTransaksiBarang/tableBarangMasuk.php" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Table Barang Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="dataTransaksiBarang/tableBarangKeluar.php" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Table Barang Keluar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="dataTransaksiBarang/tableTransferBarang.php" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Table Transfer Barang</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Stock Mobil -->
          <li class="nav-item">
            <a href="stockMobil/tableStock.php" class="nav-link">
             <i class="nav-icon fa-solid fa-truck"></i>
             <p>
                Stock Mobil
             </p>
            </a>
         </li>

          <!-- Log Out -->
          <li class="nav-item border-top mt-4">
            <a href="../logout.php" class="nav-link">
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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
          <?php
            function rupiah($angka){
               $rupiah = "Rp ".number_format($angka,0,',','.');
               return $rupiah;
            }
           ?>
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col">
               <?php
               $nama_salesman = $login_as['nama_depan']." ".$login_as['nama_belakang'];
               $query_sumPenjualan = mysqli_query($conn, "SELECT SUM(IF(nama_salesman = '".$nama_salesman."', total_penjualan, 0)) AS total_penjualan FROM tb_penjualan");
               $query_sumPotongan = mysqli_query($conn, "SELECT SUM(IF(nama_salesman = '".$nama_salesman."', jumlah_potongan, 0)) AS jumlah_potongan FROM tb_penjualan");
               $query_sumPembayaran = mysqli_query($conn, "SELECT SUM(IF(nama_salesman = '".$nama_salesman."', jumlah_pembayaran, 0)) AS jumlah_pembayaran FROM tb_penjualan");
               $sum_penjualan = mysqli_fetch_array($query_sumPenjualan);
               $sum_potongan = mysqli_fetch_array($query_sumPotongan);
               $sum_pembayaran = mysqli_fetch_array($query_sumPembayaran);
               $total_kredit = $sum_penjualan['total_penjualan'] - $sum_potongan['jumlah_potongan'] - $sum_pembayaran['jumlah_pembayaran'];
                ?>
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <p style="font-size: 20px">Kredit Pelanggan</p>
                  <p style="font-size: 30px"><b><?php echo rupiah($total_kredit) ?></b></p>
                </div>
                <div class="icon">
                <i class="fas fa-users"></i>
                </div>
                <a href="dataPenjualan/tableKreditPelanggan.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col Kredit Pelanggan -->
          </div>
          <!-- /.row 1 -->
          <div class="row">
            <!-- Left Section -->
          <section class="col-lg-7">
            <!-- Table Kredit Pelanggan -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Table Penjualan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead class="text-center">
                    <tr>
                      <th>Tanggal</th>
                      <th>Nama Pelanggan</th>
                      <th>Nominal</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php
                     $query_penjualan = mysqli_query($conn, "SELECT * FROM tb_penjualan WHERE nama_salesman = '".$nama_salesman."' ORDER BY tanggal DESC LIMIT 4");
                     while($penjualan = mysqli_fetch_array($query_penjualan)) {
                        $query_pelanggan = mysqli_query($conn, "SELECT * FROM tb_pelanggan WHERE id_pelanggan = '".$penjualan['id_pelanggan']."'");
                        $pelanggan = mysqli_fetch_array($query_pelanggan);
                      ?>
                    <tr>
                      <td><?php echo $penjualan['tanggal'] ?></td>
                      <td><?php echo $pelanggan['nama_pelanggan'] ?></td>
                      <td><?php echo rupiah($penjualan['total_penjualan']) ?></td>
                      <?php if($penjualan['status'] === 'Belum Lunas') { ?>
                      <td class="text-danger"><?php echo $penjualan['status'] ?></td>
                      <?php } else { ?>
                      <td class="text-success"><?php echo $penjualan['status'] ?></td>
                      <?php } ?>
                    </tr>
                 <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="dataPenjualan/tablePenjualan.php">See more &raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card -->
          </section>
          <!-- /.left section -->

          <!-- Calendar -->
          <!-- Right Section -->
          <section class="col-lg-5">
            <div class="card bg-gradient-light">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-light btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                      <i class="fas fa-bars text-primary"></i>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <a href="#" class="dropdown-item">Add new event</a>
                      <a href="#" class="dropdown-item">Clear events</a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">View calendar</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-light btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus text-secondary"></i>
                  </button>
                  <button type="button" class="btn btn-light btn-sm" data-card-widget="remove">
                    <i class="fas fa-times text-danger"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!--- /.Right Section -->
        </div>
        <!-- /.Main Row -->
        </div>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
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

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Motomobil Desk Script -->
<script src="../dist/js/pages/dashboardmotomobil.js"></script>
</body>
</html>
