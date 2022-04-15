<?php
session_start();
if(isset($_SESSION["login"]) ) {
  header("Location: data.php");
}
require'functions.php';

  if(isset($_POST["login"]) ){

  $id_user = $_POST["id_user"];
  $password = $_POST["password"];

  $result = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE id_user = '$id_user'");
  
  // cek username
  if( mysqli_num_rows($result) === 1 ) {

      // cek password dari username
      $row = mysqli_fetch_assoc($result);
      if( password_verify($password, $row["password"]) ){
        $_SESSION["login"] = true;
          header("Location: data.php");
          exit;
      }
  }
  $error = true;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./aset/css/bootstrap.min.css">
    <title>Login</title>
    <style>
      body{
        background-image: url(./image/wave.svg);
        background-repeat: no-repeat;
        background-position: bottom;
        margin-bottom: 15.5rem;
      }
      .card-img-top{
        position: absolute;
        top: -30px;
        left: 45.5%;
        width: 60px !important;
        height: 60px;
      }
      .card {
        margin-top: 30px;
        padding-top: 30px;
      }
    </style>
</head>
<body>
<!-- nav awal -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
          <div class="container">
          <a href="index.php" style="width: 13%;"><img src="./image/logo2.jpg" alt="logo" style="width: 100%;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav ms-auto">
                <a class="btn btn-warning" href="index.php" style="text-decoration: none; color:black;">Back</a>
              </div>
            </div>
          </div>
        </nav>
        <!-- nav akhir -->
        <!-- login page awal -->
<div class="container">
  <div class="row md-6 mt-5">
    <div class="row mt-5 justify-content-center">

      <div class="card col-6 mt-4 border-light shadow">
        <img class="card-img-top img-circle rounded-circle text-center" src="./image/user.jpg" alt="user">
        <div class="text-center mt-3">
          <h3>Login</h3>
        </div>
        <?php if(isset($error)) : ?>
          <p style="color:red; font-style:italic;">Username / Password Salah</p>
        <?php endif ?>
        <form action="" method="post">
          <div class="mb-4">
            <label for="id_user" class="form-label">Username</label>
            <input type="text" class="form-control" placeholder="Masukkan Username" name="id_user" id="id_user">
          </div>
          <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" placeholder="Masukkan Password" name="password" id="password">
          </div>
          <div class="mb-4">
            <div class="d-grid">
              <button type="submit" class="btn btn-primary rounded-pill" name="login">LOGIN</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- login page akhir -->

<link rel="stylesheet" href="./aset/js/bootstrap.min.js">
</body>
</html>