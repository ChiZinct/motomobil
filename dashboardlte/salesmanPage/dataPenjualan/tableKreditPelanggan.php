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

     <?php
       function rupiah($angka){
          $rupiah = "Rp ".number_format($angka,0,',','.');
          return $rupiah;
       }

       function koma($angka){
          $koma = number_format($angka,2,',','.');
          return $koma;
       }
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
                <a href="pilihDaerah.php" class="nav-link">
                  <i class="nav-icon fas fa-plus"></i>
                  <p>Tambah Penjualan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tablePenjualan.php" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Daftar Penjualan</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Data Pembayaran Pelanggan -->
          <li class="nav-item">
            <a href="../dataPembayaran/tablePembayaran.php" class="nav-link">
            <i class="nav-icon fa-solid fa-table"></i>
              <p>
                Data Pembayaran
              </p>
            </a>
          </li>

          <!--Data Pelanggan-->
          <li class="nav-item">
            <a href="../dataPelanggan/tablePelanggan.php" class="nav-link">
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

          <!-- Stock Mobil -->
          <li class="nav-item">
            <a href="../stockMobil/tableStock.php" class="nav-link">
             <i class="nav-icon fa-solid fa-truck"></i>
             <p>
                Stock Mobil
             </p>
            </a>
         </li>

          <!-- Log Out -->
          <li class="nav-item border-top mt-4">
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
            <h1>Penjualan Sales</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
              <li class="breadcrumb-item active">Daftar Penjualan</li>
              <li class="breadcrumb-item active">Data Kredit Pelanggan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  Data Kredit Pelanggan
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="table1" class="table table-bordered table-hover">
                  <thead class="text-center">
                  <tr>
                    <th>Tanggal</th>
                    <th>Nama Pelanggan</th>
                    <th style="width: 50px;">Daerah</th>
                    <th>Nama Salesman</th>
                    <th>Total Penjualan</th>
                    <th>Jenis</th>
                    <th>Sisa Hutang</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                        <?php
                           $sql_penjualan = mysqli_query($conn, "SELECT * FROM tb_penjualan WHERE status = 'Belum Lunas' AND nama_salesman = '".$login_as['nama_depan']." ".$login_as['nama_belakang']."' ORDER BY tanggal DESC") or die(mysqli_error($conn));
                           while($penjualan = mysqli_fetch_array($sql_penjualan)){
                              $sql_pelanggan  = mysqli_query($conn, "SELECT * FROM tb_pelanggan WHERE id_pelanggan = '".$penjualan['id_pelanggan']."'");
                              $pelanggan = mysqli_fetch_array($sql_pelanggan);
                              ?>
                              <tr>
                                       <td><?php echo $penjualan['tanggal']?></td>
                                       <td><?php echo $pelanggan['nama_pelanggan'] ?></td>
                                       <td><?php echo $pelanggan['daerah']?></td>
                                       <td><?php echo $penjualan['nama_salesman'] ?></td>
                                       <td>
                                          <?php
                                             $total_penjualan = $penjualan['total_penjualan'] - $penjualan['jumlah_potongan'];
                                             echo rupiah($total_penjualan);
                                          ?>
                                       </td>
                                       <td><?php echo $penjualan['jenis_pembayaran'] ?></td>
                                       <td>
                                          <?php
                                          $sisa_hutang = $penjualan['total_penjualan'] - $penjualan['jumlah_potongan'] - $penjualan['jumlah_pembayaran'];
                                          if($sisa_hutang > 0) {
                                             echo rupiah($sisa_hutang);
                                          } else {
                                             echo "-";
                                          }
                                           ?>
                                       </td>
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
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
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

<!-- Script Sweetalert Delete -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
function deletePenjualan(id){
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
        window.location.href='deletePenjualan.php?id='+id;
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
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../dist/js/pages/dashboard.js"></script>

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

<!-- Page specific script -->
<script>
  $(function () {
    $("#table1").DataTable({
      "responsive"  : true,
      "autoWidth"   : false,
      "buttons"     : ["copy", "csv", "excel", "pdf", "print", "colvis"],
      "paging"      : true,
      "lengthChange": false,
      "searching"   : true,
      "ordering"    : false,
      "info"        : true,
      "autoWidth"   : false,
      "responsive"  : true,
    }).buttons().container().appendTo('#table1_wrapper .col-md-6:eq(0)');

  });
</script>
</body>
</html>
