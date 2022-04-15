<?php
require '../functions.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM tb_data_warga
        WHERE 
        nik_warga LIKE '%$keyword%' OR
        nama_warga LIKE '%$keyword%' OR
        nomor_warga LIKE '%$keyword%' OR
        alamat_warga LIKE '%$keyword%'
        ";
$warga = query($query);
?>
<link rel="stylesheet" href="../aset/css/bootstrap.min.css">
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
            <button class="btn btn-success" name="btn_tagihan">
                <a class="link-dark" href="bayar-tagihan.php?nik_warga=<?=$row["nik_warga"]; ?>">
                    <img src="./image/detail3.png" alt="edit" style="width: 16px;"></a>
            </button>
            <button class="btn btn-warning">
                <a class="link-dark" href="ubah.php?id=<?= $row["id"]; ?>">
                    <img src="./image/edit.png" alt="edit" style="width:19px;"></a>
                </button>
            <button class="btn btn-danger">
                <a class="link-dark" href="hapus.php?nik_warga=<?= $row["nik_warga"]; ?>" onclick="return confirm('ingin menghapus data?');">
                    <img src="./image/delete2.png" alt="edit" style="width:16px;"></a>
            </button>
        </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
</table>