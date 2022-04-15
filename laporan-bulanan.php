<?php 
ob_start();
session_start();
if(!isset($_SESSION['bulan'])){
    header("Location: detail.php");
    exit;
  }

require "functions.php";

    $nominalss = mysqli_query($koneksi, "SELECT nominal FROM tb_uang WHERE bulan LIKE '$_SESSION[bulan]'");
    $nominals = mysqli_fetch_array($nominalss); //saldo awal

    $querr = mysqli_query($koneksi, "SELECT * FROM tb_laporan_bulan WHERE bulan LIKE '$_SESSION[bulan]'");
    $no_bulan = mysqli_fetch_row($querr); //id Keterangan

    $idKeterangan = $no_bulan[0];
   
    $quer = mysqli_query($koneksi, "SELECT * FROM tb_laporan_keterangan WHERE id_keterangan = $idKeterangan "); //

    $query2 = mysqli_query($koneksi, "SELECT * FROM tb_laporan_bulan WHERE id = $idKeterangan"); 

    $bulan = mysqli_fetch_array($query2);

    $totals = mysqli_query($koneksi, "SELECT SUM(saldo) FROM tb_laporan_keterangan WHERE id_keterangan = $idKeterangan");
    $total = mysqli_fetch_array($totals); //total dari laporan keterangan

    $totalPenggunaan = $total[0]; //penggunaan

    $sisa = $nominals[0] - $totalPenggunaan ; //hasil akhir 
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Bulanan </title>
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
        <a href="detail.php" class="btn btn-warning btn-md" style="margin-right:1pc;"><span class="fa fa-home"></span> Kembali</a>
      </div>
    </div>
  </div>
</nav>
<!-- nav akhir -->
<div class="container mt-4 col-7 shadow">
    <div class="row md-5 ">
        <div class="row justify-content-center ">
            <div class="text-center fs-4">
                <p>
                    LAPORAN KAS KEUANGAN <br>
                    RT.06 RW.08 PAPAN MAS BLOK F <br>
                    BULAN <?=$bulan["bulan"]?> 2021
                </p>
            </div>
            <table class="table table-hover mb-4 mt-1 text-center">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Saldo</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>Saldo Awal</td>
                    <td><?=$nominals[0]?></td>
                </tr>
                <?php $i = 2; ?>
                <?php foreach($quer as $laporan) : ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?=$laporan["tanggal"] ?></td>
                    <td><?=$laporan["keterangan"] ?></td>
                    <td><?=$laporan["saldo"] ?></td>
                </tr>
                <?php $i++; ?>
                <?php endforeach;?>
            </table>
            <div>
                <p >Saldo Awal : <a style="font-weight: bold;"><?=$nominals[0]; ?></a></p>
                <p>
                    Total Pengeluaran : <a style="font-weight: bold;"><?=$totalPenggunaan;?></a>
                </p>
                <p>
                    Sisa Saldo : <a style="font-weight: bold;"><?=$sisa;?></a>
                </p>
                <a href="cetak.php" target="_blank" class="btn btn-secondary float-end mb-2">Print Laporan</a>
            </div>
        </div>
    </div>
</div> 

</body>
</html>