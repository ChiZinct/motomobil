<?php
require 'config/config.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome! | Login Page</title>
    <link rel="icon" href="dashboardlte/dist/img/mdLogo.png">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href='https://fonts.googleapis.com/css?family=Rajdhani' rel='stylesheet'>

<!--CSS-->
    <style>
    .container{
      text-align: center;
      padding: 10% 0;
      font-family: 'Rajdhani';
    }

    #logo{
      width: 18%;
      margin: auto;
      margin-top: -10%;
      margin-bottom: -3%;
    }

      .box1{
        width: 500px;
        height: 360px;
        background: white;
        box-shadow: 3px 3px 10px grey;
        border-radius: 10px;
        margin: 40px auto;
        padding: 35px 0;
      }

      .form-group{
        padding-top: 10px;
      }

      #login{
        margin: 20px 70px 0 70px;
        padding: 7px 25px;
        box-shadow: 3px 3px 5px rgb(64,110,230);
      }

      #register{
      padding: 7px 20px;
      box-shadow: 3px 3px 5px grey;
      }

      @media only screen and (max-width: 991px) {
         #logo {
            width: 15em;
         }
      }

      @media only screen and (max-width: 575px) {
         .box1{
           width: 25em;
           height: 360px;
           box-shadow: none;
           border-radius: 10px;
           margin: 40px auto;
           padding: 35px 0;
         }
      }

    </style>
  </head>

<!--CONTENT-->
  <body>
    <div class="container">
      <div class="row">
          <img class="col-lg-12" id="logo" src="dashboardlte/dist/img/mdLogoFull.png" alt="">
      </div>

        <div class="row">
        <form class="box1" action="login_process.php" method="post">
          <h4>Please Enter Your ID</h4>

          <?php if(isset($_GET['pesan'])) : ?>
            <?php if($_GET['pesan'] == "gagal") : ?>
              <p style="color: red; font-style: italic;">Wrong Username or Password</p>
            <?php endif; ?>
            <?php if($_GET['pesan'] == "belum_login") : ?>
              <p style="color: red; font-style: italic;">You must login first!</p>
            <?php endif; ?>
            <?php if($_GET['pesan'] == "bukan_admin") : ?>
              <p style="color: red; font-style: italic;">You are not an Admin!</p>
            <?php endif; ?>
         <?php endif; ?>


          <div class="form-group">
            <div class="row justify-content-center">
              <div class="col-6">
                <input type="text" class="form-control" id="username" name="username" value="" placeholder="Username">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row justify-content-center">
              <div class="col-6">
                <input type="password" class="form-control" id="password" name="password" value="" placeholder="Password">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row justify-content-center">
              <div class="col-lg-12">
                  <input type="submit" class="btn btn-primary btn-md" id="login" name="login" value="Log In">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row justify-content-center">
              <div class="col-lg-12">
                or <br>
                <a href="register/register.php">Register Your Account</a>
              </div>
            </div>
          </div>


        </form>
      </div>
    </div>



  </body>
</html>
