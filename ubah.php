<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
require 'functions.php';


// ambil data di url

$id = $_GET["id"];

// query data warga berdasarkan id
$warga = query("SELECT * FROM tb_data_warga WHERE id = $id") [0];


   // cek apaklah tombol submit sudah ditekan atau belum
   if(isset($_POST["submit"]) ) {
  
   // cek apakah data berhasil di tambahkan atau tidak berhasil ditambahkan
   if( ubah($_POST) > 0){
       echo "
           <script>
               alert  ('data berhasil diubah!');
               document.location.href = 'data.php';
           </script>
       ";
   } else {
       echo "data gagal diubah!";
   }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ubah Data</title>
   <link rel="stylesheet" href="./aset/css/bootstrap.min.css">
   <style>
       body{
        background-image: url(./image/wave2.svg);
        background-repeat: no-repeat;
        background-position: bottom;
        margin-bottom: 7.6rem;
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
    <div class="row md-6">
        <div class="row mt-5 justify-content-center">
            <div class="card mt-4 border-light shadow col-6">
            <div class="text-center mt-2">
                    <h3>Ubah Data</h3>
                </div>
                <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $warga["id"]; ?>">
                        <div class="row ms-2 me-2">
                        <div class="mb-4">
                            <label for="nik_warga" class="form-label">NIK :</label>
                            <input type="text" class="form-control" placeholder="masukkan NIK" name="nik_warga" id="nik_warga" required value="<?= $warga["nik_warga"] ?>">
                        </div>
                        <div class="mb-4">
                            <label for="nama_warga" class="form-label">Nama :</label>
                            <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama_warga" id="nama_warga" required value="<?= $warga["nama_warga"] ?>">
                        </div>
                        <div class="mb-4">
                            <label for="nomor_warga" class="form-label">Nomor Handphone :</label>
                            <input type="text" class="form-control" placeholder="Masukkan Nomor Handphone" name="nomor_warga" id="nomor_warga" required value="<?= $warga["nomor_warga"] ?>">
                        </div>
                        <div class="mb-4">
                            <label for="alamat_warga" class="form-label">Alamat :</label>
                            <input type="text" class="form-control" placeholder="Masukkan Alamat" name="alamat_warga" id="alamat_warga" required value="<?= $warga["alamat_warga"] ?>">
                        </div>
                        <div class="mb-5">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary rounded-pill" name="submit">SAVE</button>
                            </div>
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