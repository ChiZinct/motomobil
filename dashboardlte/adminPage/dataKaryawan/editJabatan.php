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
    input:placeholder-shown{
      font-style: italic;
    }
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
          <li class="nav-item">
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
                <a href="../penjualanSales/tablePenjualan.php?id=<?php echo $salesman['user_id'] ?>" class="nav-link">
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
                <a href="..dataBarang/tableProdukJual.php" class="nav-link">
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
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Data Karyawan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="tambahKaryawan.php" class="nav-link">
                  <i class="nav-icon fas fa-plus"></i>
                  <p>Tambah Data Baru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tambahJabatan.php" class="nav-link">
                  <i class="nav-icon fas fa-plus"></i>
                  <p>Tambah Jabatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tableKaryawan.php" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Table Data Karyawan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tableJabatan.php" class="nav-link">
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
            <h1>Data Karyawan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Karyawan</li>
              <li class="breadcrumb-item active">Edit Jabatan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Edit Jabatan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php
              $query = mysqli_query($conn, "SELECT * FROM tb_jabatan WHERE nama_jabatan ='".$_GET['id']."'");
              $jabatan = mysqli_fetch_array($query);
               ?>
              <form>
                <div class="card-body">
                   <div class="form-group row" hidden>
                    <div class="col-md-12">
                      <label for="nama_depan">ID Jabatan</label>
                      <input type="text" class="form-control" name="id_jabatan" id="id_jabatan" value="<?php echo $jabatan['id'] ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-12">
                      <label for="nama_depan">Nama Jabatan</label>
                      <input type="text" class="form-control" name="nama_jabatan" id="nama_jabatan" value="<?php echo $jabatan['nama_jabatan'] ?>" required>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <input type="submit" class="btn btn-primary" name="update" id="update" value="Update">
                    <a href="javascript:cancel()" class="btn btn-secondary" name="cancel" id="cancel">Cancel</a>
                </div>
              </form>
          </div>
        </div>
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

<!-- JavaScript Tombol Submit -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
  $(function(){
    $('#update').click(function(e){

      var valid = this.form.checkValidity();

        if(valid){
          var id_jabatan   = $('#id_jabatan').val();
          var nama_jabatan = $('#nama_jabatan').val();

          e.preventDefault();

          $.ajax({
              type: 'POST',
              url: 'prosesEditJabatan.php?id='+id_jabatan,
              data: {nama_jabatan: nama_jabatan},
              success: function(data){
                 Swal.fire({
                  position: 'top-end',
                  icon: 'success',
                  title: 'Data berhasil diperbaharui!',
                  showConfirmButton: false,
                  timer: 1000
               }).then((result) =>{
                  window.location.href = 'tableJabatan.php';
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
        }
    });
  });
</script>

<!-- JavaScript Tombol Cancel-->
<script type="text/javascript">
      function cancel(){
         Swal.fire({
           title: 'Are you sure?',
           text: "Your changes will not be saved",
           icon: 'warning',
           showCancelButton: true,
           confirmButtonColor: '#66b54c',
           cancelButtonColor: '#d33',
           confirmButtonText: 'Yes, I\'m Sure!',
           cancelButtonText: 'No, I\'m Not Sure'
         }).then((result) => {
           if (result.isConfirmed) {
             window.location.href='tableJabatan.php';
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
</body>
</html>
