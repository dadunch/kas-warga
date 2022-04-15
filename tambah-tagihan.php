<?php
require 'functions.php';
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

// cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["submit"])){
    if(tagihan($_POST) > 0){
        echo "
            <script>
                alert  ('tagihan berhasil ditambahkan:');
                document.location.href = 'data.php';
            </script>
        ";
    } else {
        echo "data gagal ditambahkan";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tagihan</title>
    <link rel="stylesheet" href="./aset/css/bootstrap.min.css">
    <style>
        body{
            background-image: url(./image/wave2.svg);
            background-repeat: no-repeat;
            background-position: bottom;
            margin-bottom: 22.3rem;
      }
    </style>
</head>
<body>
<!-- nav awal -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
  <div class="container">
  <a href="data.php" style="width: 13%;"><img src="./image/logo2.jpg" alt="logo" style="width: 100%;"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ms-auto">
        <a href="data.php" class="btn btn-warning btn-md" style="margin-right:1pc;"><span class="fa fa-home"></span> Kembali</a>
      </div>
    </div>
  </div>
</nav>
<!-- nav akhir -->
<div class="container">
    <div class="row ">
        <div class="row mt-5 justify-content-center">
            <div class="text-center mt-2">
                    <h3>Tambah Tagihan</h3>
            </div>
                <div class="card col-3">
                    <form action="" method="post">
                    <div class="mb-4">
                        <div class="input-group mb-3 mt-3">
                            <label class="input-group-text" for="bulan">Bulan</label>
                            <select class="form-select" name="bulan" id="inputGroupSelect01">
                                <option selected>Pilih Bulan</option>
                                <option>januari</option>
                                <option>februari</option>
                                <option>maret</option>
                                <option>april</option>
                                <option>mei</option>
                                <option>juni</option>
                                <option>juli</option>
                                <option>agustus</option>
                                <option>september</option>
                                <option>oktober</option>
                                <option>november</option>
                                <option>desember</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="nominal" class="form-label">Nominal :</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nominal" name="nominal" id="nominal" required>
                    </div>
                    <div class="mb-4">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary rounded-pill" name="submit">Update Tagihan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="./aset/js/bootstrap.min.js"></script>
</body>
</html>