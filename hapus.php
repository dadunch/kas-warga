<?php
include'functions.php';
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

$nik_warga = $_GET["nik_warga"];

if( hapus($nik_warga) > 0 ){
    hapus2($nik_warga);

    echo"
        <script>
            alert  ('data berhasil dihapus!');
            document.location.href = 'data.php';
        </script>
        ";
} else {
    echo "
    <script>
        alert  ('data gagal dihapus!');
        document.location.href = 'data.php';
    </script>";
}

?>