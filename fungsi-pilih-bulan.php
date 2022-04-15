<?php
    // koneksi ke database menggunakan mysqli_connect
    $koneksi = mysqli_connect("localhost", "root", "", "aplikasi_kas_warga");

    function query($query){
        global $koneksi;
        $result = mysqli_query($koneksi, $query);
        $rows = [];
        while( $row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

?>