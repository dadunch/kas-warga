<?php 
require 'functions.php';
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
 
    // cek apaklah tombol submit sudah ditekan atau belum
    if(isset($_POST["submit"]) ) {
   
    // cek apakah data berhasil di tambahkan atau tidak berhasil ditambahkan
    if( tambah($_POST) > 0){
       tambah2($_POST);

        echo "
            <script>
                alert  ('data berhasil ditambahkan:');
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
    <title>Tambah Warga</title>
    <link rel="stylesheet" href="./aset/css/bootstrap.min.css">
    <style>
        body{
            background-image: url(./image/wave4.svg);
            background-repeat: no-repeat;
            background-position: bottom;
            margin-bottom: 10.6rem;
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
<div class="container mt-5">
    <div class="row md-5">
        <div class="row justify-content-center">
            <div class="card col-6 shadow border-light">
                <div class="text-center">
                    <div>
                        <h3>Tambah data Warga</h3>
                    </div>
                </div>
                <form action="" method="post">
                    <div class="mb-4">
                        <label for="nik_warga" class="form-label" >NIK :</label>
                        <input type="text" class="form-control" placeholder="Masukkan NIK" name="nik_warga" id="nik_warga" required>
                    </div>
                    <div class="mb-4">
                        <label for="" class="form-label" >Nama :</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama_warga" id="nama_warga" required>
                    </div>
                    <div class="mb-4">
                        <label for="nomor_warga" class="form-label" >No Handphone :</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nomor Handphone" name="nomor_warga" id="nomor_warga" required>
                    </div>
                    <div class="mb-4">
                        <label for="alamat_warga" class="form-label">Alamat :</label>
                        <input type="text" class="form-control" placeholder="Masukkan Alamat" name="alamat_warga" id="alamat_warga" required>
                    </div>
                    <div class="mb-4">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary rounded-pill" name="submit">Tambah data
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