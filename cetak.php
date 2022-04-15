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
            </div>
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