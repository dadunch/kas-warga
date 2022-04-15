<?php
    require "functions.php";

    if (isset($_POST["tambahLaporan"]))
    {
        $bulan = $_POST["bulan"];

        $sql = "INSERT INTO tb_laporan_bulan (bulan) VALUES ('$bulan')";
        mysqli_query($koneksi, $sql);
        
        $idketerangan = mysqli_insert_id($koneksi);
 
        for ($a = 0; $a < count($_POST["keterangan"]); $a++)
        {
            $sql = "INSERT INTO tb_laporan_keterangan 
                        (id_keterangan, bulan_keterangan, tanggal, keterangan, saldo) 
                        VALUES 
                        ('$idketerangan', 
                        '" . $_POST["bulan"] . "', 
                        '" . $_POST["tanggal"][$a] . "', 
                        '" . $_POST["keterangan"][$a] . "', 
                        '" . $_POST["saldo"][$a] . "')";
            mysqli_query($koneksi, $sql);
        }

        echo "<script>
        alert  ('Laporan berhasil Ditambahkan!');
        document.location.href = 'data.php';
    </script>";
    }
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
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

<div class="container mt-2 col-7 shadow-sm">
    <div class="row">
        <div class="row justify-content-center">
        <div class="text-center">
                <p class="fs-4">Buat Laporan</p>
            </div>
            <form method="POST" action="">
                <input class="d-grid border border-primary mb-2" type="text" name="bulan" placeholder="Masukkan Bulan" required id="keyword">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2" name="cari" id="tombol-cari" style="display:none;">Cari</button>
             <div id="container">
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Saldo</th>
                    </tr>
                    
                    <!-- <tr>
                        <td>1</td>
                        <td><input type='text' name='tanggal[]' value="1"></td>
                        <td><input type='text' name='keterangan[]' value="Saldo Awal"></td>
                        <td><input type='text' name='saldo[]' require value="0"></td>
                    </tr> -->
                    <tbody id="tbody"></tbody>
                </table>
             </div>
                <button type="button" onclick="addItem();" class="btn btn-secondary mb-2">Tambah Keterangan</button>
                <input type="submit" name="tambahLaporan" value="Buat Laporan" class="btn btn-secondary mb-2">
 
            </form>
        </div>
    </div>
</div>
<script>
    var items = 0;
    function addItem() {
        items++;
 
        var html = "<tr>";
            html += "<td>" + items + "</td>";
            html += "<td><input type='text' name='tanggal[]'></td>";
            html += "<td><input type='text' name='keterangan[]'></td>";
            html += "<td><input type='text' name='saldo[]'></td>";
            html += "<td><button type='button' onclick='deleteRow(this);' class='btn btn-danger'>Hapus</button></td>"
            html += "</tr>";
        var row = document.getElementById("tbody").insertRow();
        row.innerHTML = html;


        
    } 
function deleteRow(button) {
    button.parentElement.parentElement.remove();
    items--;
}

</script>
<script src="js/laporan.js"></script>
</body>
</html>