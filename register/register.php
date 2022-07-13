<?php
require_once('../config/configAdd.php');
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Your Account</title>
    <link rel="icon" href="../dashboardlte/dist/img/mdLogo.png">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Rajdhani' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap" rel="stylesheet">

    <!--Date Picker dari https://datainflow.com/create-bootstrap-datepicker-html/-->
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.css" rel="stylesheet" id="bootstrap-css">
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!--CSS-->
    <style>
    .container{
      width: 100%;
      margin: 60px auto;
    }

    .box1{
      width: 620px;
      height: 470px;
      background: white;
      box-shadow: 3px 3px 10px grey;
      border-radius: 10px;
      margin: 40px auto;
      padding: 20px 40px;
      font-family: 'Rajdhani';
      }

    h1{
      font-family: 'Rajdhani';
      font-size: 50px;
      font-weight: 600;
    }

    h4{
      font-family: 'Roboto';
    }

    #back{
      padding: 7px 20px;
      box-shadow: 3px 3px 5px grey;
      margin: 30px 30px 30px 178px;
    }

    #register{
      margin: 20px 225px 0 225px;
      padding: 7px 15px;
      box-shadow: 3px 3px 5px rgb(94,138,199);
    }

    @media only screen and (max-width: 991px) {
       .form-group *{
          font-size: 1.05em;
       }
    }

    @media only screen and (max-width: 575px) {
      .container {
         width: 100%;
      }
      h1{
        font-size: 40px;
      }
      .box1{
        width: 100vw;
        height: 45em;
        box-shadow: none;
        border-radius: none;
        }

      #nama_belakang {
         margin-top: 1em;
      }

      #user_id {
         margin-top: 1em;
      }

      #password {
         margin-top: 1em;
      }

      #register{
        margin: 20px auto;
        padding: 7px 15px;
        box-shadow: 3px 3px 5px rgb(94,138,199);
      }
    }
    </style>
  </head>


  <body>
     <?php
     $conn = mysqli_connect("localhost", "root", "", "dtbase_motomobil");
     $id   = mysqli_query($conn, "SELECT MAX(MID(user_id, 4, 3)) as id_user FROM tb_user");
     if(mysqli_num_rows($id) > 0) {
       $data = mysqli_fetch_array($id);
       $angka = (int)$data['id_user'] + 1;
    } else {
       $angka = "001";
    }
    $prefix = "USR";
    $user_id = $prefix.sprintf("%03s", $angka);
      ?>

    <div class="container">
      <div class="row">
        <h1 class="text-center">Hi! Let's Create Your Account!</h1>
        <form class="box1">
          <h4>Please Enter Your Personal Data</h4><br>
          <!--Baris 1-->
          <div class="form-group row">
            <div class="col-12 col-md-6">
              <input type="text" class="form-control" id="nama_depan" name="nama_depan" placeholder="Nama Depan" required>
            </div>
                <div class="col-12 col-md-6">
              <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" placeholder="Nama Belakang" required>
            </div>
          </div>
          <!--Baris 2-->
            <div class="form-group row">
              <div class="col-md-6">
                <div class='input-group date' id='datepicker'>
                    <input type='text' class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir" required>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
              </div>
            </div>
            <!--Baris 3-->
            <div class="form-group row">
              <div class="col-md-6">
                <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Nomor Telepon" required>
                </div>
              </div>
              <!--Baris 4-->
              <div class="form-group row">
                <div class="col-md-6">
                  <select class="form-select form-select-lg" id="acc_type" name="acc_type">
                    <option selected>-Select Account Type-</option>
                    <option value="Administrator">Administrator</option>
                    <option value="Salesman">Salesman</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="user_id" name="user_id" value="<?php echo $user_id ?>" readonly>
                </div>
              </div>
              <!--Baris 5-->
                <div class="form-group row">
                  <div class="col-md-6">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                  </div>
                  <div class="col-md-6">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row justify-content-center">
                    <div class="col">
                      <input type="submit" class="btn btn-primary btn-md" id="register" name="register" value="Register" onclick="unsetList()">
                    </div>
                  </div>
                </div>
                        <div class="form-group">
                          <div class="row justify-content-center">
                            <div class="col">
                              Already have an account? <br>
                              <a href="../index.php">Log In Here</a>
                            </div>
                          </div>
                        </div>
                     </div>
                 </div>
               </div>
            </form>
         </div>

    <!--Script Sweet Alert 2-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
      $(function(){
        $('#register').click(function(e){

          var valid = this.form.checkValidity();

            if(valid){

              var nama_depan    = $('#nama_depan').val();
              var nama_belakang = $('#nama_belakang').val();
              var tgl_lahir     = $('#tgl_lahir').val();
              var no_telp       = $('#no_telp').val();
              var acc_type      = $('#acc_type').val();
              var user_id       = $('#user_id').val();
              var username      = $('#username').val();
              var password      = $('#password').val();

              e.preventDefault();

              $.ajax({
                  type: 'POST',
                  url: 'process.php',
                  data: {nama_depan: nama_depan, nama_belakang: nama_belakang, tgl_lahir: tgl_lahir, no_telp: no_telp, acc_type: acc_type, user_id: user_id, username: username, password: password},
                  success: function(data){
                        Swal.fire({
                          title: 'Successful',
                          text: data,
                          icon: 'success',
                          confirmButtonText:`<a href="../index.php">OK</a>`
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
