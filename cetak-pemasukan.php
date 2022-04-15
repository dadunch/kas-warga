<?php 
require "functions.php";
ob_start();
session_start();
if(!isset($_SESSION['bulan'])){
  header("Location: pilih-bulan-print.php");
  exit;
}
$query2 = mysqli_query($koneksi, "SELECT * FROM tb_laporan_bulan WHERE bulan LIKE '$_SESSION[bulan]'"); 

$bulan = mysqli_fetch_array($query2);
$warga = query("SELECT * FROM tb_riwayat WHERE bulan LIKE '$_SESSION[bulan]' ORDER BY waktu DESC ");
if( isset($_POST["cari"]) ){
    $warga = caritagihan ($_POST["keyword"]);
}
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan</title>
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
    <div class="container mt-5">
        <div class="row justify-content-center">
            <img src="./image/HEADERR.png" alt="header" style="width: 100%;">
        </div>
        <div class="text-center">
            <p class="fs-5">LAPORAN KEUANGAN BULAN <?=$bulan["bulan"]?></p>
        </div>
        <hr>
        <table class="table table-striped table-hover mb-4 mt-3 text-center">
            <tr>
                <th>No</td>
                <th>NIK</th>
                <th>Nama</th>
                <th>Bulan</th>
                <th>Waktu</th>
            </tr>
            
            <?php $i = 1; ?>
            <?php foreach( $warga as $row ) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row["nik_warga"]; ?></td>
                <td><?= $row["nama_warga"]; ?></td>
                <td><?= $row["bulan"]; ?></td>
                <td><?= $row["waktu"]; ?></td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </table>
        
                <p align="right";>Mengetahui, Bendahara RT</p>
                <br>
                <br>
                <p align="right"; style="margin-right:20px;">Giffari Aprillianto R</p>
    </div>

<script>
    window.print();
</script>
</body>
</html>