<?php
ob_start();
session_start();
if(!isset($_SESSION['nik_warga'])){
  header("Location: index.php");
  exit;
}

include'functions.php';
$warga =query("SELECT * FROM tb_detail_tagihan");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail KAS</title>
    <link rel="stylesheet" href="./aset/css/bootstrap.min.css">
</head>
<body>
      <?php
        $tampilnm =mysqli_query($koneksi, "SELECT * FROM tb_data_warga WHERE nik_warga='$_SESSION[nik_warga]'");
        $nama =mysqli_fetch_array($tampilnm);

        $tmpl =mysqli_query($koneksi, "SELECT * FROM tb_detail_tagihan WHERE nik_warga = '$_SESSION[nik_warga]'");
        $tagihan =mysqli_fetch_array($tmpl);

        $total =mysqli_query($koneksi, "SELECT nik_warga, SUM(januari + februari + maret + april + mei + juni + juli + agustus + september + oktober + november + desember) FROM tb_detail_tagihan WHERE nik_warga= '$_SESSION[nik_warga]' GROUP BY nik_warga");
        $ttl =mysqli_fetch_row($total);

      ?>

<!-- nav awal -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
  <div class="container">
  <a href="logout2.php" style="width: 13%;"><img src="./image/logo2.jpg" alt="logo" style="width: 100%;"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ms-auto">
        <h5 class="me-3">
          Selamat Datang <?=$nama['nama_warga']?>
        </h5>
        <div class="navbar-nav ms-auto">
          <a class="btn btn-danger ms-2" href="logout2.php" style="text-decoration: none; color:white; ">Logout</a>
          <div class="navbar-nav ms-auto">
        </div>
        </div>
      </div>
    </div>
  </div>
</nav>
<!-- nav akhir -->
<div class="container">
  <div class="container d-flex justify-content-end mt-3"> 
      <a class="btn btn-success ms-3" href="pilih-bulan.php" style="text-decoration: none; color:white; ">Laporan Bulanan</a>
      <a class="btn btn-success ms-3" href="riwayat-warga.php?nik_warga=<?=$_SESSION['nik_warga'];?>" style="text-decoration: none; color:white; ">Riwayat Pembayaran</a>
  </div>
  <div class="row">
    <div class="row justify-content-center">
      <div class="text-center text-secondary mb-3">
        <h3>Tagihan KAS Anda</h3>
      </div>

      <?php if($tagihan['januari'] > 0){ ?>
      <div class="card col-2 md-shadow mt-2 me-1 ms-1" style="border-radius: 10px;">
        <div class="mt-2 text-center">
          <h4 class="text-secondary">Januari</h4>
        </div>
        <div class="text-center mt-5 mb-5">
         <h4 class="text-danger"><?=$tagihan['januari']?></h4>
        </div>
      </div>
      <?php } ?>

      <?php if($tagihan['februari'] > 0 ){ ?>
        <div class="card col-2 md-shadow mt-2 me-1 ms-1" style="border-radius: 10px;">
        <div class="mt-2 text-center">
          <h4 class="text-secondary">Februari</h4>
        </div>
        <div class="text-center mt-5 mb-5">
         <h4 class="text-danger"><?=$tagihan['februari']?></h4>
        </div>
      </div>
      <?php } ?>

      <?php if($tagihan['maret'] > 0 ){?> 
        <div class="card col-2 md-shadow mt-2 me-1 ms-1" style="border-radius: 10px;">
        <div class="mt-2 text-center">
          <h4 class="text-secondary">Maret</h4>
        </div>
        <div class="text-center mt-5 mb-5">
         <h4 class="text-danger"><?=$tagihan['maret']?></h4>
        </div>
      </div>
      <?php } ?>

      <?php if($tagihan['april'] > 0 ) {?>
        <div class="card col-2 md-shadow mt-2 me-1 ms-1" style="border-radius: 10px;">
        <div class="mt-2 text-center">
          <h4 class="text-secondary">April</h4>
        </div>
        <div class="text-center mt-5 mb-5">
         <h4 class="text-danger"><?=$tagihan['april']?></h4>
        </div>
      </div>
      <?php } ?>

      <?php if($tagihan['mei'] > 0 ) {?>
        <div class="card col-2 md-shadow mt-2 me-1 ms-1" style="border-radius: 10px;">
        <div class="mt-2 text-center">
          <h4 class="text-secondary">Mei</h4>
        </div>
        <div class="text-center mt-5 mb-5">
         <h4 class="text-danger"><?=$tagihan['mei']?></h4>
        </div>
      </div>
      <?php } ?>

      <?php if($tagihan['juni'] > 0 ) {?>
        <div class="card col-2 md-shadow mt-2 me-1 ms-1" style="border-radius: 10px;">
        <div class="mt-2 text-center">
          <h4 class="text-secondary">Juni</h4>
        </div>
        <div class="text-center mt-5 mb-5">
         <h4 class="text-danger"><?=$tagihan['juni']?></h4>
        </div>
      </div>
      <?php } ?>

      <?php if($tagihan['juli'] > 0 ) {?>
        <div class="card col-2 md-shadow mt-2 me-1 ms-1" style="border-radius: 10px;">
        <div class="mt-2 text-center">
          <h4 class="text-secondary">Juli</h4>
        </div>
        <div class="text-center mt-5 mb-5">
         <h4 class="text-danger"><?=$tagihan['juli']?></h4>
        </div>
      </div>
      <?php } ?>

      <?php if($tagihan['agustus'] > 0 ) {?>
        <div class="card col-2 md-shadow mt-2 me-1 ms-1" style="border-radius: 10px;">
        <div class="mt-2 text-center">
          <h4 class="text-secondary">Agustus</h4>
        </div>
        <div class="text-center mt-5 mb-5">
         <h4 class="text-danger"><?=$tagihan['agustus']?></h4>
        </div>
      </div>
      <?php } ?>

      <?php if($tagihan['september'] > 0 ) {?>
        <div class="card col-2 md-shadow mt-2 me-1 ms-1" style="border-radius: 10px;">
        <div class="mt-2 text-center">
          <h4 class="text-secondary">September</h4>
        </div>
        <div class="text-center mt-5 mb-5">
         <h4 class="text-danger"><?=$tagihan['september']?></h4>
        </div>
      </div>
      <?php } ?>

      <?php if($tagihan['oktober'] > 0 ) {?>
        <div class="card col-2 md-shadow mt-2 me-1 ms-1" style="border-radius: 10px;">
        <div class="mt-2 text-center">
          <h4 class="text-secondary">Oktober</h4>
        </div>
        <div class="text-center mt-5 mb-5">
         <h4 class="text-danger"><?=$tagihan['oktober']?></h4>
        </div>
      </div>
      <?php } ?>

      <?php if($tagihan['november'] > 0 ) {?>
        <div class="card col-2 md-shadow mt-2 me-1 ms-1" style="border-radius: 10px;">
        <div class="mt-2 text-center">
          <h4 class="text-secondary">November</h4>
        </div>
        <div class="text-center mt-5 mb-5">
         <h4 class="text-danger"><?=$tagihan['november']?></h4>
        </div>
      </div>
      <?php } ?>

      <?php if($tagihan['desember'] > 0 ) {?>
        <div class="card col-2 md-shadow mt-2 me-1 ms-1" style="border-radius: 10px;">
        <div class="mt-2 text-center">
          <h4 class="text-secondary">Desember</h4>
        </div>
        <div class="text-center mt-5 mb-5">
         <h4 class="text-danger"><?=$tagihan['desember']?></h4>
        </div>
      </div>
      <?php } ?>

      <div class="card col-2 md-shadow mt-2 me-1 ms-1 bg-dark" style="border-radius: 10px;">
        <div class="mt-2 text-center">
          <h4 class="text-light">TOTAL</h4>
        </div>
        <div class="text-center mt-5 mb-5">
         <h4 class="text-light"><?=$ttl[1] ?></h4>
        </div>
      </div>
    </div>
  </div>
</div>


<script src="./aset/js/bootstrap.min.js"></script>
</body>
</html>