<?php 
require "functions.php";
ob_start();
session_start();
if(!isset($_SESSION['nik_warga'])){
  header("Location: index.php");
  exit;
}

$nik = $_SESSION["nik_warga"];

$warga = mysqli_query($koneksi, "SELECT * FROM tb_riwayat WHERE nik_warga = $nik ORDER BY waktu DESC");

$nama= mysqli_fetch_array($warga);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak</title>
    <link rel="stylesheet" href="./aset/css/bootstrap.min.css">
    <style>
        hr {
    display: block;
    height: 1px;
    background: transparent;
    width: 100%;
    border: none;
    border-top: solid 1px #aaa;
}
    </style>
</head>
<body>
<div class="container">
    <div class="row">
    <div class="row justify-content-center mb-1">
            <img src="./image/HEADERR.png" alt="header" style="width: 100%;">
        </div>
        <hr>
    <div class="text-center">
        <h3 class="text-center mt-2 text-secondary" style="margin-bottom: 1rem;">RIWAYAT PEMBAYARAN KAS <?=$nama['nama_warga']?></h3>
    </div>
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
                <p align="right";>Mengetahui, Bendahara RT</p>
                <br>
                <br>
                <br>
                <p align="right"; style="margin-right: 50px;">Giffari Aprillianto R</p>
</div>
</div>

<script>
     window.print();
</script>
</body>
</html>