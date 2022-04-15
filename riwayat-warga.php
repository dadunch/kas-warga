<?php 
require "functions.php";
ob_start();
session_start();
if(!isset($_SESSION['nik_warga'])){
  header("Location: index.php");
  exit;
}

$nik = $_GET["nik_warga"];

$warga = mysqli_query($koneksi, "SELECT * FROM tb_riwayat WHERE nik_warga = $nik ORDER BY waktu DESC");

$nama= mysqli_fetch_array($warga);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./aset/css/bootstrap.min.css">
    <title>Riwayat</title>
    <style>
        .scroll{
            height: 500px;
            overflow-y: scroll;
        }
        .container.table tr th{
            position: absolute;
        }
    </style>
</head>
<body>
        

<!-- nav awal -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
  <div class="container">
  <a href="logout2.php" style="width: 13%;"><img src="./image/logo2.jpg" alt="logo" style="width: 100%;"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ms-auto">
        <a href="detail.php" class="btn btn-warning btn-md" style="margin-right:1pc;"><span class="fa fa-home"></span> Kembali</a>
      </div>
    </div>
  </div>
</nav>
<!-- nav akhir -->
<h3 class="text-center mt-5 text-secondary" style="margin-bottom: 2rem;">Riwayat Pembayaran <?=$nama['nama_warga']?></h3>

<div class="container col-4">
    <div class="row">
        <div class="row justify-content-center">
            <div class="table-responsive">
                <div class="scrol">
                <a href="cetak-riwayat.php" target="_blank" class="btn btn-secondary float">Print Laporan</a>
                    <table class="table table-striped table-hover mb-4 mt-5 text-center">
                        <tr>
                            <th>No</th>
                            <th>Bulan</th>
                            <th>Waktu</th>
                        </tr>
                        <?php $i = 1;?>
                        <?php foreach( $warga as $row ) : ?>
                        <tr>
                            <td><?=$i?></td>
                            <td><?= $row['bulan']?></td>
                            <td><?= $row['waktu']?></td>
                        </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="./aset/js/bootstrap.min.js"></script>
</body>
</html>