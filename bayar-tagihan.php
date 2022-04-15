<?php
ob_start();
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
require 'functions.php';

if(isset($_POST["januari"])){
  if( bayar1($_POST) > 0){
  }
}
if(isset($_POST["februari"])){
  if( bayar2($_POST) > 0){
  }
}
if(isset($_POST["maret"])){
  if( bayar3($_POST) > 0){
  }
}
if(isset($_POST["april"])){
  if( bayar4($_POST) > 0){
  }
}
if(isset($_POST["mei"])){
  if( bayar5($_POST) > 0){
}
}
if(isset($_POST["juni"])){
  if( bayar6($_POST) > 0){
}
}
if(isset($_POST["juli"])){
  if( bayar7($_POST) > 0){
}
}
if(isset($_POST["agustus"])){
  if( bayar8($_POST) > 0){
}
}
if(isset($_POST["september"])){
  if( bayar9($_POST) > 0){
}
}
if(isset($_POST["oktober"])){
  if( bayar10($_POST) > 0){
  }
}
if(isset($_POST["november"])){
  if( bayar11($_POST) > 0){
  }
}
if(isset($_POST["desember"])){
  if( bayar12($_POST) > 0){
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bayar Tagihan</title>
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
        <a href="data.php" class="btn btn-warning btn-md" style="margin-right:1pc;"><span class="fa fa-home"></span> Kembali</a>
      </div>
    </div>
  </div>
</nav>
<!-- nav akhir -->
<?php
$nik = $_GET["nik_warga"];

$tampiltg =mysqli_query($koneksi, "SELECT * FROM tb_detail_tagihan WHERE nik_warga= $nik");
$tagihan =mysqli_fetch_array($tampiltg);

$total =mysqli_query($koneksi, "SELECT nik_warga, SUM(januari + februari + maret + april + mei + juni + juli + agustus + september + oktober + november + desember) FROM tb_detail_tagihan WHERE nik_warga=$nik GROUP BY nik_warga");

$ttl =mysqli_fetch_row($total);
?>


<div class="container">
  <form action="" method="post">
  <div class="row">
    <div class="row justify-content-center mt-5">
      <div class="text-center text-secondary mb-2">
        <h3>Daftar Tagihan Warga</h3>
      </div>
      <div class="card col-2 md-shadow mt-2 me-1 ms-1 bg-secondary" style="border-radius: 10px;">
        <div class="mt-2 text-center">
          <h4 class="text-light">TOTAL</h4>
        </div>
        <div class="text-center mt-5 mb-5">
         <h4 class="text-light"><?=$ttl[1] ?></h4>
        </div>
      </div>

      <?php if($tagihan['januari'] > 0){ ?>
      <div class="card col-2 md-shadow mt-2 me-1 ms-1" style="border-radius: 10px;">
        <div class="mt-2 text-center">
          <h4 class="text-secondary">Januari</h4>
        </div>
        <div class="text-center mt-5 mb-5">
         <h4 class="text-danger"><?=$tagihan['januari']?></h4>
        </div>
        <div class="mb-4">
            <div class="d-grid">
              <button type="submit" class="btn btn-success rounded-pill" name="januari">Bayar</button>
            </div>
        </div>
      </div>
      <?php } ?>

      <?php if($tagihan['februari'] > 0 ){ ?>
        <div class="card col-2 shadow-md mt-2 me-1 ms-1" style="border-radius: 10px;">
        <div class="mt-2 text-center">
          <h4 class="text-secondary">Februari</h4>
        </div>
        <div class="text-center mt-5 mb-5">
         <h4 class="text-danger"><?=$tagihan['februari']?></h4>
        </div>
        <div class="mb-4">
            <div class="d-grid">
              <button type="submit" class="btn btn-success rounded-pill" name="februari">Bayar</button>
            </div>
        </div>
      </div>
      <?php } ?>

      <?php if($tagihan['maret'] > 0 ){?> 
        <div class="card col-2 shadow-md mt-2 me-1 ms-1" style="border-radius: 10px;">
        <div class="mt-2 text-center">
          <h4 class="text-secondary">Maret</h4>
        </div>
        <div class="text-center mt-5 mb-5">
         <h4 class="text-danger"><?=$tagihan['maret']?></h4>
        </div>
        <div class="mb-4">
            <div class="d-grid">
              <button type="submit" class="btn btn-success rounded-pill" name="maret">Bayar</button>
            </div>
        </div>
      </div>
      <?php } ?>

      <?php if($tagihan['april'] > 0 ) {?>
        <div class="card col-2 shadow-md mt-2 me-1 ms-1" style="border-radius: 10px;">
        <div class="mt-2 text-center">
          <h4 class="text-secondary">April</h4>
        </div>
        <div class="text-center mt-5 mb-5">
         <h4 class="text-danger"><?=$tagihan['april']?></h4>
        </div>
        <div class="mb-4">
            <div class="d-grid">
              <button type="submit" class="btn btn-success rounded-pill" name="april">Bayar</button>
            </div>
        </div>
      </div>
      <?php } ?>

      <?php if($tagihan['mei'] > 0 ) {?>
        <div class="card col-2 shadow-md mt-2 me-1 ms-1" style="border-radius: 10px;">
        <div class="mt-2 text-center">
          <h4 class="text-secondary">Mei</h4>
        </div>
        <div class="text-center mt-5 mb-5">
         <h4 class="text-danger"><?=$tagihan['mei']?></h4>
        </div>
        <div class="mb-4">
            <div class="d-grid">
              <button type="submit" class="btn btn-success rounded-pill" name="mei">Bayar</button>
            </div>
        </div>
      </div>
      <?php } ?>

      <?php if($tagihan['juni'] > 0 ) {?>
        <div class="card col-2 shadow-md mt-2 me-1 ms-1" style="border-radius: 10px;">
        <div class="mt-2 text-center">
          <h4 class="text-secondary">Juni</h4>
        </div>
        <div class="text-center mt-5 mb-5">
         <h4 class="text-danger"><?=$tagihan['juni']?></h4>
        </div>
        <div class="mb-4">
            <div class="d-grid">
              <button type="submit" class="btn btn-success rounded-pill" name="juni">Bayar</button>
            </div>
        </div>
      </div>
      <?php } ?>

      <?php if($tagihan['juli'] > 0 ) {?>
        <div class="card col-2 shadow-md mt-2 me-1 ms-1" style="border-radius: 10px;">
        <div class="mt-2 text-center">
          <h4 class="text-secondary">Juli</h4>
        </div>
        <div class="text-center mt-5 mb-5">
         <h4 class="text-danger"><?=$tagihan['juli']?></h4>
        </div>
        <div class="mb-4">
            <div class="d-grid">
              <button type="submit" class="btn btn-success rounded-pill" name="juli">Bayar</button>
            </div>
        </div>
      </div>
      <?php } ?>

      <?php if($tagihan['agustus'] > 0 ) {?>
        <div class="card col-2 shadow-md mt-2 me-1 ms-1" style="border-radius: 10px;">
        <div class="mt-2 text-center">
          <h4 class="text-secondary">Agustus</h4>
        </div>
        <div class="text-center mt-5 mb-5">
         <h4 class="text-danger"><?=$tagihan['agustus']?></h4>
        </div>
        <div class="mb-4">
            <div class="d-grid">
              <button type="submit" class="btn btn-success rounded-pill" name="agustus">Bayar</button>
            </div>
        </div>
      </div>
      <?php } ?>

      <?php if($tagihan['september'] > 0 ) {?>
        <div class="card col-2 shadow-md mt-2 me-1 ms-1" style="border-radius: 10px;">
        <div class="mt-2 text-center">
          <h4 class="text-secondary">September</h4>
        </div>
        <div class="text-center mt-5 mb-5">
         <h4 class="text-danger"><?=$tagihan['september']?></h4>
        </div>
        <div class="mb-4">
            <div class="d-grid">
              <button type="submit" class="btn btn-success rounded-pill" name="september">Bayar</button>
            </div>
        </div>
      </div>
      <?php } ?>

      <?php if($tagihan['oktober'] > 0 ) {?>
        <div class="card col-2 shadow-md mt-2 me-1 ms-1" style="border-radius: 10px;">
        <div class="mt-2 text-center">
          <h4 class="text-secondary">Oktober</h4>
        </div>
        <div class="text-center mt-5 mb-5">
         <h4 class="text-danger"><?=$tagihan['oktober']?></h4>
        </div>
        <div class="mb-4">
            <div class="d-grid">
              <button type="submit" class="btn btn-success rounded-pill" name="oktober">Bayar</button>
            </div>
        </div>
      </div>
      <?php } ?>

      <?php if($tagihan['november'] > 0 ) {?>
        <div class="card col-2 shadow-md mt-2 me-1 ms-1" style="border-radius: 10px;">
        <div class="mt-2 text-center">
          <h4 class="text-secondary">November</h4>
        </div>
        <div class="text-center mt-5 mb-5">
         <h4 class="text-danger"><?=$tagihan['november']?></h4>
        </div>
        <div class="mb-4">
            <div class="d-grid">
              <button type="submit" class="btn btn-success rounded-pill" name="november">Bayar</button>
            </div>
        </div>
      </div>
      <?php } ?>

      <?php if($tagihan['desember'] > 0 ) {?>
        <div class="card col-2 shadow-md mt-2 me-1 ms-1" style="border-radius: 10px;">
        <div class="mt-2 text-center">
          <h4 class="text-secondary">Desember</h4>
        </div>
        <div class="text-center mt-5 mb-5">
         <h4 class="text-danger"><?=$tagihan['desember']?></h4>
        </div>
        <div class="mb-4">
            <div class="d-grid">
              <button type="submit" class="btn btn-success rounded-pill" name="desember">Bayar</button>
            </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
  </form>
</div>
<script src="./aset/js/bootstrap.min.js"></script>
</body>
</html>