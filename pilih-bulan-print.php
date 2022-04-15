<?php
ob_start();
session_start();
require "fungsi-pilih-bulan.php";

if(isset($_POST["januari"])){
  $_SESSION ['bulan'] = 'januari';
  header("Location: cetak-pemasukan.php");
  exit;
}
if(isset($_POST["februari"])){
  $_SESSION ['bulan'] = 'februari';
  header("Location: cetak-pemasukan.php");
  exit;
}
if(isset($_POST["maret"])){
  $_SESSION ['bulan'] = 'maret';
  header("Location: cetak-pemasukan.php");
  exit;
}
if(isset($_POST["april"])){
  $_SESSION ['bulan'] = 'april';
  header("Location: cetak-pemasukan.php");
  exit;
}
if(isset($_POST["mei"])){
  $_SESSION ['bulan'] = 'mei';
  header("Location: cetak-pemasukan.php");
  exit;
}
if(isset($_POST["juni"])){
  $_SESSION ['bulan'] = 'juni';
  header("Location: cetak-pemasukan.php");
  exit;
}
if(isset($_POST["juli"])){
  $_SESSION ['bulan'] = 'juli';
  header("Location: cetak-pemasukan.php");
  exit;
}
if(isset($_POST["agustus"])){
  $_SESSION ['bulan'] = 'agustus';
  header("Location: cetak-pemasukan.php");
  exit;
}
if(isset($_POST["september"])){
  $_SESSION ['bulan'] = 'september';
  header("Location: cetak-pemasukan.php");
  exit;
}
if(isset($_POST["oktober"])){
  $_SESSION ['bulan'] = 'oktober';
  header("Location: cetak-pemasukan.php");
  exit;
}
if(isset($_POST["november"])){
  $_SESSION ['bulan'] = 'november';
  header("Location: cetak-pemasukan.php");
  exit;
}
if(isset($_POST["desember"])){
  $_SESSION ['bulan'] = 'desember';
  header("Location: cetak-pemasukan.php");
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Bulan</title>
    <link rel="stylesheet" href="./aset/css/bootstrap.min.css">
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
        <a href="riwayat-pembayaran.php" class="btn btn-warning btn-md" style="margin-right:1pc;"><span class="fa fa-home"></span> Kembali</a>
      </div>
    </div>
  </div>
</nav>
<!-- nav akhir -->
<div class="container mt-4">
  <div class="text-center">
    <h4>Laporan Yang Tersedia :</h4>
  </div>
  <form action="" method="POST">
    <div class="row">
        <div class="row justify-content-center">
            <div class="card col-3 shadow-md mt-2 me-1 ms-1" style="border-radius: 10px;">
              <div class="mt-2 text-center">
                <h4 class="text-secondary">Januari</h4>
              </div>
              <div class="mb-4">
                <div class="d-grid">
                  <button type="submit" class="btn btn-secondary rounded-pill" name="januari">Pilih</button>
                </div>
              </div>
            </div>

            <div class="card col-3 shadow-md mt-2 me-1 ms-1" style="border-radius: 10px;">
              <div class="mt-2 text-center">
                <h4 class="text-secondary">Februari</h4>
              </div>
              <div class="mb-4">
                <div class="d-grid">
                  <button type="submit" class="btn btn-secondary rounded-pill" name="februari">Pilih</button>
                </div>
              </div>
            </div>
            <div class="card col-3 shadow-md mt-2 me-1 ms-1" style="border-radius: 10px;">
              <div class="mt-2 text-center">
                <h4 class="text-secondary">Maret</h4>
              </div>
              <div class="mb-4">
                <div class="d-grid">
                  <button type="submit" class="btn btn-secondary rounded-pill" name="maret">Pilih</button>
                </div>
              </div>
            </div>

            <div class="card col-3 shadow-md mt-2 me-1 ms-1" style="border-radius: 10px;">
              <div class="mt-2 text-center">
                <h4 class="text-secondary">April</h4>
              </div>
              <div class="mb-4">
                <div class="d-grid">
                  <button type="submit" class="btn btn-secondary rounded-pill" name="april">Pilih</button>
                </div>
              </div>
            </div>

            <div class="card col-3 shadow-md mt-2 me-1 ms-1" style="border-radius: 10px;">
              <div class="mt-2 text-center">
                <h4 class="text-secondary">mei</h4>
              </div>
              <div class="mb-4">
                <div class="d-grid">
                  <button type="submit" class="btn btn-secondary rounded-pill" name="mei">Pilih</button>
                </div>
              </div>
            </div>
            
            <div class="card col-3 shadow-md mt-2 me-1 ms-1" style="border-radius: 10px;">
              <div class="mt-2 text-center">
                <h4 class="text-secondary">Juni</h4>
              </div>
              <div class="mb-4">
                <div class="d-grid">
                  <button type="submit" class="btn btn-secondary rounded-pill" name="juni">Pilih</button>
                </div>
              </div>
            </div>

            <div class="card col-3 shadow-md mt-2 me-1 ms-1" style="border-radius: 10px;">
              <div class="mt-2 text-center">
                <h4 class="text-secondary">Juli</h4>
              </div>
              <div class="mb-4">
                <div class="d-grid">
                  <button type="submit" class="btn btn-secondary rounded-pill" name="juli">Pilih</button>
                </div>
              </div>
            </div>

            <div class="card col-3 shadow-md mt-2 me-1 ms-1" style="border-radius: 10px;">
              <div class="mt-2 text-center">
                <h4 class="text-secondary">Agustus</h4>
              </div>
              <div class="mb-4">
                <div class="d-grid">
                  <button type="submit" class="btn btn-secondary rounded-pill" name="agustus">Pilih</button>
                </div>
              </div>
            </div>

            <div class="card col-3 shadow-md mt-2 me-1 ms-1" style="border-radius: 10px;">
              <div class="mt-2 text-center">
                <h4 class="text-secondary">September</h4>
              </div>
              <div class="mb-4">
                <div class="d-grid">
                  <button type="submit" class="btn btn-secondary rounded-pill" name="september">Pilih</button>
                </div>
              </div>
            </div>

            <div class="card col-3 shadow-md mt-2 me-1 ms-1" style="border-radius: 10px;">
              <div class="mt-2 text-center">
                <h4 class="text-secondary">Oktober</h4>
              </div>
              <div class="mb-4">
                <div class="d-grid">
                  <button type="submit" class="btn btn-secondary rounded-pill" name="oktober">Pilih</button>
                </div>
              </div>
            </div>

            <div class="card col-3 shadow-md mt-2 me-1 ms-1" style="border-radius: 10px;">
              <div class="mt-2 text-center">
                <h4 class="text-secondary">November</h4>
              </div>
              <div class="mb-4">
                <div class="d-grid">
                  <button type="submit" class="btn btn-secondary rounded-pill" name="november">Pilih</button>
                </div>
              </div>
            </div>

            <div class="card col-3 shadow-md mt-2 me-1 ms-1" style="border-radius: 10px;">
              <div class="mt-2 text-center">
                <h4 class="text-secondary">Desember</h4>
              </div>
              <div class="mb-4">
                <div class="d-grid">
                  <button type="submit" class="btn btn-secondary rounded-pill" name="desember">Pilih</button>
                </div>
              </div>
            </div>
        </div>
    </div>
  </form>
</div>
</body>
</html>