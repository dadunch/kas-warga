<?php
require '../functions.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM tb_riwayat
        WHERE 
        nik_warga LIKE '%$keyword%' OR
        nama_warga LIKE '%$keyword%' OR
        bulan LIKE '%$keyword%' OR
        waktu LIKE '%$keyword%'
        ";
$warga = query($query);
?>
<link rel="stylesheet" href="../aset/css/bootstrap.min.css">
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