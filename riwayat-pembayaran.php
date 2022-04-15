<?php 
require "functions.php";
$warga = query("SELECT * FROM tb_riwayat ORDER BY waktu DESC");
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
<h1 class="text-center mt-3 text-secondary" style="margin-bottom: -2rem;">Riwayat Pembayaran</h1>
 
<br><br>
<!-- tombol cari dan tambah -->
<div class="container col-8">
    <div class="container d-flex justify-content-between mb-3">
    <a href="pilih-bulan-print.php" class="btn btn-secondary float-end mb-2 me-5">Print Laporan</a> 
        <form action="" method="post">
            <div class="input-group">
              <input type="text" name="keyword" class="form-control" placeholder="Cari Warga.." aria-label="Recipient's username" aria-describedby="button-addon2" autofocus autocomplete="off" id="keyword">
              <button class="btn btn-outline-secondary" type="submit" id="button-addon2" name="cari" id="tombol-cari">Cari</button>
            </div>
        </form>
    </div>
    
<div class="container shadow">
    <div class="table-responsive">
        <div class="scroll">
          <div id="container">
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
        
        </div>
    </div>
</div>
</div>
</div>
<script src="./aset/js/bootstrap.min.js"></script>
<script src="js/riwayat.js"></script>
</body>
</html>