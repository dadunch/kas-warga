<?php
ob_start();
session_start();

if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}


require "functions.php";
$warga = query("SELECT * FROM tb_data_warga");

// tombol cari ditekan
if( isset($_POST["cari"]) ){
    $warga = cari ($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Bendahara</title>
    <link rel="stylesheet" href="./aset/css/bootstrap.min.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <style>
        .scroll{
            height: 500px;
            overflow-y: scroll;
        }
        #pilihan {
            position: fixed; /* Sit on top of the page content */
            display: none; /* Hidden by default */
            width: 150px; /* Full width (cover the whole page) */
            height: auto; /* Full height (cover the whole page) */
            margin: auto;
            top: 180px;
            right: 130px;
            background-color: rgba(0,0,0,0.5); /* Black background with opacity */
            z-index: 2; /* Specify a stack order in case you're using a different order for other elements */
            cursor: default; /* Add a pointer on hover */
        }
    </style>
</head>
<body>
    <!-- nav awal -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
          <div class="container">
          <a href="data.php" style="width: 13%;"><img src="./image/logo2.jpg" alt="logo" style="width: 100%;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav ms-auto">
                <a class="btn btn-danger" href="logout.php" style="text-decoration: none; color:white; ">Logout</a>
              </div>
            </div>
          </div>
        </nav>
        <!-- nav akhir -->

<h1 class="text-center mt-3" style="margin-bottom: -2rem;">Data Warga</h1>
<br><br>
<!-- tombol cari dan tambah -->
<div class="container">
    <div class="container d-flex justify-content-between mb-3">
        <form action="" method="post">
            <div class="input-group">
              <input type="text" name="keyword" class="form-control" placeholder="Cari Warga.." aria-label="Recipient's username" aria-describedby="button-addon2" autofocus autocomplete="off" id="keyword">
              <button class="btn btn-outline-secondary" type="submit" id="button-addon2" name="cari" id="tombol-cari">Cari</button>
            </div>
        </form>
        <div>      
            <a class="btn btn-secondary link-light" href="tambah-warga.php" style="text-decoration: none;">Tambah data Warga</a>

            <a href="tambah-tagihan.php" class="btn btn-secondary link-light" style="text-decoration: none;">
            tambah tagihan
            </a>

            <a href="riwayat-pembayaran.php" class="btn btn-secondary link-light" style="text-decoration: none;">
            Riwayat pembayaran
            </a>

            <a class="btn btn-secondary link-light" style="text-decoration: none;" onclick="tampil_tidak();">
            Laporan Bulanan
            </a>
        </div>
    </div>
<div id="pilihan" class="card col-2" style="display:none;">
    <a class="btn btn-success d-flex link-light m-1"  href="laporan.php">Buat Laporan</a>
    <a class="btn btn-success d-flex link-light m-1"  href="edit-laporan.php">Edit Laporan</a>
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
                    <th>No handphone</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
        
                <?php $i = 1; ?>
                <?php foreach( $warga as $row ) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $row["nik_warga"]; ?></td>
                    <td><?= $row["nama_warga"]; ?></td>
                    <td><?= $row["nomor_warga"]; ?></td>
                    <td><?= $row["alamat_warga"]; ?></td>
                    <td>
                        <!-- <button class="" name="btn_tagihan"> -->
                            <a class="btn btn-success link-dark" href="bayar-tagihan.php?nik_warga=<?=$row["nik_warga"]; ?>">
                                <img src="./image/detail3.png" alt="edit" style="width: 16px;">
                            </a>
                        <!-- </button> -->
                            <a class="btn btn-warning link-dark" href="ubah.php?id=<?= $row["id"]; ?>">
                                <img src="./image/edit.png" alt="edit" style="width:19px;">
                            </a>
                            <a class="btn btn-danger link-dark" href="hapus.php?nik_warga=<?= $row["nik_warga"]; ?>" onclick="return confirm('ingin menghapus data?');">
                                <img src="./image/delete2.png" alt="edit" style="width:16px;">
                            </a>
                    </td>
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
<script src="./js/script.js"></script>
<script src="./js/showelement.js"></script>
</body>
</html>