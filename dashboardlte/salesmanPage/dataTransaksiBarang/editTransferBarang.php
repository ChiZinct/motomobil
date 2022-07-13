<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Motomobil Desk | Salesman</title>
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
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<!--Cek apakah sudah logged in-->
<?php

session_start();
if($_SESSION['status']!="loginSalesman"){
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

      <!-- SidebarSearch Form
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

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
                <a href="../dataPenjualan/pilihDaerah.php" class="nav-link">
                  <i class="nav-icon fas fa-plus"></i>
                  <p>Tambah Penjualan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../dataPenjualan/tablePenjualan.php" class="nav-link">
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
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-scroll"></i>
              <p>Data Transaksi Barang
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="tableBarangMasuk.php" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Table Barang Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tableBarangKeluar.php" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Table Barang Keluar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tableTransferBarang.php" class="nav-link">
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
            <h1>Edit Transfer Barang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Transaksi Barang</li>
              <li class="breadcrumb-item active">Edit Transfer Barang</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <?php
    $query_transferBarang = mysqli_query($conn, "SELECT * FROM tb_transferbarang WHERE no_invoice = '".$_GET['id']."'");
    $transfer_barang = mysqli_fetch_array($query_transferBarang);
    ?>

    <?php
      function rupiah($angka){
         $rupiah = "Rp ".number_format($angka,0,',','.');
         return $rupiah;
      }
     ?>

    <section class="content">
      <div class="container-fluid">
         <form action="updateTransferBarang.php?id=<?php echo $transfer_barang['no_invoice'] ?>" method="post">
           <div class="row">

             <!-- Left Section -->
             <section class="col-lg-4">
               <div class="col-md-12">
                 <div class="card card-primary">
                   <div class="form-horizontal" action="#" method="post">
                     <div class="card-body">
                       <div class="form-group row">
                         <label for="no_invoice" class="col-sm-4 col-form-label">No. Transaksi</label>
                         <div class="col-sm-8">
                           <input type="text" class="form-control" name="no_invoice" id="no_invoice" value="<?php echo $transfer_barang['no_invoice'] ?>" readonly>
                         </div>
                       </div>
                       <div class="form-group row">
                         <label for="tanggal" class="col-sm-4 col-form-label">Tanggal</label>
                         <div class="col-sm-8">
                           <div class='input-group date' id='datepicker'>
                               <input type='text' class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal" value="<?php echo $transfer_barang['tanggal'] ?>">
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

             <!-- Middle Section -->
             <section class="col-lg-4">
               <div class="col-md-12">
                 <div class="card card-primary">
                   <div class="form-horizontal" action="#" method="post">
                     <div class="card-body">
                       <div class="form-group row">
                         <label for="id_barang" class="col-sm-5 col-form-label">ID Barang</label>
                         <div class="col-sm-7">
                           <select class="custom-select" name="id_barang" id="id_barang">
                              <?php
                              $sql_kodebarang = mysqli_query($conn, "SELECT * FROM tb_barang") or die(mysqli_error($conn));
                              while($kode_barang = mysqli_fetch_array($sql_kodebarang)) {
                               ?>
                             <option><?php echo $kode_barang['id_barang'] ?></option>
                             <?php } ?>
                           </select>
                         </div>
                       </div>
                       <div class="form-group row">
                         <label for="quantity" class="col-sm-2 col-form-label">Qty</label>
                         <div class="col-sm-3">
                           <input type="text" class="form-control" id="qty" name="qty">
                         </div>
                         <label for="satuan" class="col-sm-3 col-form-label">Satuan</label>
                         <div class="col-sm-4">
                           <select class="custom-select" name="satuan" id="satuan">
                              <?php
                              $sql_satuan = mysqli_query($conn, "SELECT * FROM tb_satuan") or die(mysqli_error($conn));
                              while($satuan = mysqli_fetch_array($sql_satuan)) {
                               ?>
                             <option><?php echo $satuan['kode_satuan']?></option>
                             <?php } ?>
                           </select>
                         </div>
                       </div>
                     </div>
                  </div>
                 </div>
               </div>
             </section>

             <!-- Right Section -->
             <section class="col-lg-4">
               <div class="col-md-12">
                 <div class="card card-primary">
                   <div class="form-horizontal" action="#" method="post">
                     <div class="card-body">
                       <div class="form-group row">
                         <label for="gudang_asal" class="col-sm-5 col-form-label">Transfer Dari</label>
                         <div class="col-sm-7">
                            <input type="text" class="form-control" id="gudang_asal" name="gudang_asal" value="<?php echo $login_as['id_gudang'] ?>" readonly>
                         </div>
                       </div>
                       <div class="form-group row">
                         <label for="gudang_tujuan" class="col-sm-5 col-form-label">Transfer Ke</label>
                         <div class="col-sm-7">
                           <select class="custom-select" name="gudang_tujuan" id="gudang_tujuan">
                              <option><?php echo $transfer_barang['gudang_tujuan'] ?></option>
                              <?php
                              $sql_gudang = mysqli_query($conn, "SELECT * FROM tb_user") or die(mysqli_error($conn));
                              while($gudang = mysqli_fetch_array($sql_gudang)) {
                                 if($gudang['id_gudang'] !== $transfer_barang['gudang_tujuan'] && $gudang['id_gudang'] !== $login_as['id_gudang']) {
                               ?>
                             <option><?php echo $gudang['id_gudang'] ?></option>
                             <?php
                                 }
                              }
                              ?>
                           </select>
                         </div>
                       </div>
                       <div class="form-group row">
                         <label for="keterangan" class="col-sm-5 col-form-label">Keterangan</label>
                         <div class="col-sm-7">
                           <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo $transfer_barang['keterangan'] ?>">
                         </div>
                       </div>
                     </div>
                  </div>
                 </div>
               </div>
             </section>

           </div>

           <div class="row">
             <div class="col-lg-12">
               <div class="col text-center" style="margin-bottom: 3%">
                 <button type="submit" class="btn btn-primary btn btn-md" name="add" id="add">
                   <i class="nav-icon fas fa-plus"></i>
                   Add
                 </button>
                 <button type="button" class="btn btn-secondary btn btn-md" name="resetForm" id="resetForm" onclick="this.form.reset();">
                   <i class="fas fa-undo-alt"></i>
                   Reset</button>
                 </div>
             </div>
           </div>

           <div class="row">
             <div class="col-lg-12">
               <div class="card">
                 <div class="card-body">
                   <table id="example2" class="table table-bordered table-hover">
                     <thead class="text-center">
                     <tr>
                       <th>ID Barang</th>
                       <th>Nama Barang</th>
                       <th>Qty</th>
                       <th>Satuan</th>
                       <th>Harga Satuan</th>
                       <th>Total Harga</th>
                       <th>Action</th>
                     </tr>
                     </thead>
                     <tbody>
                        <?php
                        $sql_transaksi = mysqli_query($conn, "SELECT * FROM tb_transaksi WHERE no_invoice = '".$_GET['id']."'") or die(mysqli_error($conn));
                        while($transaksi = mysqli_fetch_array($sql_transaksi)) {
                           $id_barang = $transaksi['id_barang'];
                           $sql_barang = mysqli_query($conn, 'SELECT * FROM `tb_barang` WHERE `id_barang` = \''. mysqli_escape_string($conn, $id_barang).'\'');
                           while($barang = mysqli_fetch_array($sql_barang)) {
                         ?>
                       <tr>
                         <td><?php echo $transaksi['id_barang'] ?></td>
                         <td><?php echo $barang['nama_barang'] ?></td>
                         <td><?php echo $transaksi['qty'] ?></td>
                         <td><?php echo $transaksi['satuan'] ?></td>
                         <td><?php echo rupiah($barang['harga_beli']) ?></td>
                         <td><?php echo rupiah($transaksi['total_harga_satuan']) ?></td>
                         <td><a href="javascript:deleteTransaksi(`<?php echo $transaksi['id_barang'].$transaksi['no_invoice']?>`)" class="btn btn-danger btn-sm">
                         <i class="fas fa-trash-alt"></i>
                         </a></td>
                       </tr>
                       <?php
                           }
                        }
                        ?>
                     </tbody>
                   </table>
                 </div>
                 <!-- /.card-body -->
               </div>
               <!-- /.card -->
             </div>
           </div>

           <div class="row">
            <div class="col-lg-12">
               <div class="col text-center">
                 <button type="submit" class="btn btn-primary btn btn-md" name="update" id="update">
                   <i class="fas fa-check"></i>
                   Update
                 </button>
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

<!--JavaScript Tombol Add-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
  $(function(){
    $('#add').click(function(e){

      var valid = this.form.checkValidity();

        if(valid){

          var no_invoice = $('#no_invoice').val();
          var id_barang = $('#id_barang').val();
          var qty = $('#qty').val();
          var satuan = $('#satuan').val();

          e.preventDefault();

          $.ajax({
              type: 'POST',
              url: '../transaksiBarang/addTransaksi.php',
              data: {no_invoice: no_invoice, id_barang: id_barang, qty: qty, satuan: satuan},
              success: function(data){
                 Swal.fire({
                  position: 'top-end',
                  icon: 'success',
                  title: data,
                  showConfirmButton: false,
                  timer: 10000
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

          location.reload();

        }else{

        }


    });


  });
</script>

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
        window.location.href='../transaksiBarang/deleteTransaksi.php?id='+id;
       Swal.fire(
         'Deleted!',
         'Your file has been deleted.',
         'success'
       )

     }
   })
}
</script>

<!--JavaScript Tombol Update-->
<script type="text/javascript">
  $(function(){
    $('#update').click(function(e){

         var valid = this.form.checkValidity();

           if(valid){

             var no_invoice   = $('#no_invoice').val();
             var tanggal = $('#tanggal').val();
             var gudang_asal = $('#gudang_asal').val();
             var gudang_tujuan = $('#gudang_tujuan').val();
             var keterangan = $('#keterangan').val();

             e.preventDefault();

             if(gudang_tujuan !== gudang_asal) {
                $.ajax({
                    type: 'POST',
                    url: 'updateTransferBarang.php?id='+no_invoice,
                    data: {no_invoice: no_invoice, tanggal: tanggal, gudang_asal: gudang_asal, gudang_tujuan: gudang_tujuan, keterangan: keterangan},
                    success: function(data){
                       Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Data berhasil diperbaharui!',
                        showConfirmButton: false,
                        timer: 1000
                     }).then((result) =>{
                        window.location.href = 'tableTransferBarang.php';
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
             } else {
                Swal.fire({
                 position: 'center',
                 icon: 'error',
                 title: 'Error!',
                 text: 'Gudang tujuan dan gudang asal tidak boleh sama',
                 showConfirmButton: false,
                 timer: 1500
               })
             }


           }
        });
    });
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
