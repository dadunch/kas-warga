<?php
ob_start();
session_start();
include 'functions.php';
  if(isset($_POST["submit"]) ){

    $nik_warga = $_POST["nik_warga"];

    $result = mysqli_query($koneksi, "SELECT * FROM tb_data_warga WHERE nik_warga = '$nik_warga'");


    // cek nik
    if( mysqli_num_rows($result) === 1){
      $row = mysqli_fetch_assoc($result);

      $_SESSION['nik_warga'] = $row['nik_warga'];
      $_SESSION['nama_warga'] = $row['nama_warga'];


      header("Location: detail.php");
      exit;
    } else {
      echo "
    <script>
        alert  ('ID Warga Salah/Tidak Tersedia!');
        document.location.href = 'index.php';
    </script>";
    }
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KAS WARGA</title>
    <link rel="stylesheet" href="./aset/css/bootstrap.min.css">
    <style>
      body{
        background-image: url(./image/wave3.svg);
        background-repeat: no-repeat;
        background-position: bottom;
        margin-bottom: 11.2rem;
      }
      input {
        text-align: center;
      }

      ::-webkit-input-placeholder {
        text-align: center;
      }

      :-moz-placeholder {
        text-align: center;
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
        <a class="btn btn-primary" href="login.php" style="text-decoration: none; color:white;">Login</a>
      </div>
    </div>
  </div>
</nav>
<!-- nav akhir -->


<div class="container mt-5">
  <div class="row md-5">
    <div class="row justify-content-center">
      <div class="card col-6 shadow border-light rounded-3">
        <div class="text-end mt-2">
          <h5 class="text-primary"> <a style="color: #58b947;">KasWarga</a>.Com</h5>
          <p class="text-secondary">Cek Tagihan Kas Anda</p>
        </div>
          <div>
            <img src="./image/foto1.svg" class="mx-auto d-block" alt="" style="width: 175px; margin-top:-2rem;">
          </div>
        <div class="text-center">
          <p class="text-secondary">Anda sedang berada di Website pembayaran KAS Warga Papan Mas Blok F
            <p style="color: #c7c7c7; font-style:italic; margin-top:-15px;" class="text-center">You are on the Papan Mas Block F Cash Citizen Cash Payment Website
            </p>
          </p>
          <p class="text-secondary">Silahkan Masukkan <a style="color:red;">ID Warga </a>Anda.
          <p style="color: #c7c7c7; font-style:italic; margin-top:-15px;" class="text-center">please enter your citizen id
          </p>
          </p>
        </div>
        <form action="" method="post">
          <div class="mb-4">
            <input type="text" class="form-control" placeholder="Masukkan ID Warga" name="nik_warga" id="nik_warga" required>
          </div>
          <div class="mb-4">
            <div class="d-grid">
              <button type="submit" class="btn btn-primary rounded-pill" name="submit">Cari</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<link rel="stylesheet" href="./aset/js/bootstrap.min.js">
</body>
</html>