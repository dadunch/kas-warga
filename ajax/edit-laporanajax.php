<?php
require '../functions.php';

$keyword = $_GET["keyword"];

        $nominalss = mysqli_query($koneksi, "SELECT nominal FROM tb_uang WHERE bulan LIKE '%$keyword%'");
        $nominals = mysqli_fetch_array($nominalss); //saldo awal

        $querr = mysqli_query($koneksi, "SELECT * FROM tb_laporan_bulan WHERE bulan LIKE '%$keyword%'");
        $no_bulan = mysqli_fetch_row($querr);
        $idKeterangan = $no_bulan[0]; //id keterangan

        // $saldo = mysqli_query($koneksi, "SELECT saldo FROM tb_laporan_keterangan WHERE id_keterangan = $idKeterangan AND keterangan LIKE '%saldo awal%'");
        // $sal = mysqli_fetch_array($saldo); //saldo awal

        $totals = mysqli_query($koneksi, "SELECT SUM(saldo) FROM tb_laporan_keterangan WHERE id_keterangan = $idKeterangan");
        $total = mysqli_fetch_array($totals);

        $totalPenggunaan = $total[0]; //penggunaan

        $sisa = $nominals[0] - $totalPenggunaan ; //hasil akhir 

        $laporan = mysqli_query($koneksi, "SELECT id, id_keterangan, tanggal, keterangan, saldo FROM tb_laporan_keterangan WHERE bulan_keterangan LIKE '%$keyword%'");

        $lapor = mysqli_fetch_all($laporan);

?>
 <p>Sisa Saldo : <?= $sisa?></p>


<table class="table">
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Keterangan</th>
        <th>Saldo</th>
        <th>Aksi</th>
    </tr>

    <?php $i = 0?>
    <?php $items = 1?>
    

    <?php foreach( $lapor as $row ) : ?>
   
        <tr>
            <td> <?=$items ?></td>
            <input type='hidden'  require value="<?=$lapor[$i][1];?>">
            <td><input type='text'  require value="<?=$lapor[$i][2];?>"></td>
            <td><input type='text'  require value="<?=$lapor[$i][3];?>"> </td>
            <td><input type='text'  require value="<?=$lapor[$i][4];?>"></td>
            <td>
                <a class="btn btn-danger link-dark" href="hapuslaporan.php?id=<?= $row[0]; ?>" onclick="return confirm('ingin menghapus data?');">
                    <img src="./image/delete2.png" alt="edit" style="width:16px;">
                </a>
            </td>
        </tr>
    <?php $i++; ?>
    <?php $items++; ?>
    <?php endforeach; ?>
    
    <tbody id="tbody"></tbody>
</table>