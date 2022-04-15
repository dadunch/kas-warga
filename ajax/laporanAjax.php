<?php
require '../functions.php';

$keyword = $_GET["keyword"];

$nominalss = mysqli_query($koneksi, "SELECT nominal FROM tb_uang WHERE bulan LIKE '%$keyword%'");
$nominals = mysqli_fetch_array($nominalss); //saldo awal


?>
 <p>Saldo Awal : <?= $nominals[0]?></p>
<table class="table">
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Keterangan</th>
        <th>Saldo</th>
    </tr>
    <!-- <tr>
        <td></td>
        <td><input type='hidden' name='tanggal[]' require value="1"></td>
        <td><input type='hidden' name='keterangan[]' require value="Saldo Awal"></td>
        <td><input type='hidden' name='saldo[]' require value="<?=$nominals[0]?>"></td>
    </tr> -->
    <tbody id="tbody"></tbody>
</table>