<?php
include'functions.php';
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

$id = $_GET["id"];

if( hapuslaporan($id) > 0 ){

    echo"
        <script>
            alert  ('data berhasil dihapus!');
            document.location.href = 'edit-laporan.php';
        </script>
        ";
} else {
    echo "
    <script>
        alert  ('data gagal dihapus!');
        document.location.href = 'edit-laporan.php';
    </script>";
}

?>