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


// tambah=====================

// tambah data warga
function tambah ($data){
    global$koneksi;

     $nama_warga = strtoupper( htmlspecialchars ( $data["nama_warga"]));
     $nik_warga = strtoupper( htmlspecialchars( $data["nik_warga"]));
     $nomor_warga = strtoupper( htmlspecialchars( $data["nomor_warga"]));
     $alamat_warga = strtoupper( htmlspecialchars( $data["alamat_warga"]));

     // query insert data
    $query = "INSERT INTO tb_data_warga
    VALUES
    ('', '$nik_warga', '$nama_warga', '$nomor_warga', '$alamat_warga')
    ";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
   
}

function tambah2 ($data){
    global$koneksi;

    $nik_warga = ($data["nik_warga"]);

    $que = "INSERT INTO tb_detail_tagihan
    VALUES
    ('$nik_warga', '', '', '', '', '', '', '', '', '', '', '', '')
    ";
    mysqli_query($koneksi, $que);

    return mysqli_affected_rows($koneksi);

}


// hapus=========================================

function hapus($nik_warga){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM tb_data_warga  WHERE nik_warga = $nik_warga");

    return mysqli_affected_rows($koneksi);
}

function hapus2($nik_warga){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM tb_detail_tagihan WHERE nik_warga = $nik_warga");

    return mysqli_affected_rows($koneksi);
}

function hapuslaporan($id){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM tb_laporan_keterangan  WHERE id = $id");

    return mysqli_affected_rows($koneksi);
}
// ubah=====================================================

function ubah($data)
{
        global$koneksi;
         
         $id = $data["id"];
         $nik_warga = strtoupper( htmlspecialchars( $data["nik_warga"]));
         $nama_warga = strtoupper(  htmlspecialchars( $data["nama_warga"]));
         $nomor_warga = strtoupper( htmlspecialchars( $data["nomor_warga"])) ;
         $alamat_warga = strtoupper( htmlspecialchars( $data["alamat_warga"])) ;

// query insert data
        $query = "UPDATE tb_data_warga SET
                    nik_warga = '$nik_warga',
                    nama_warga = '$nama_warga',
                    nomor_warga = '$nomor_warga',
                    alamat_warga = '$alamat_warga'
                WHERE id = $id
                    ";
    mysqli_query($koneksi, $query);
    
    return mysqli_affected_rows($koneksi);
}


// cari==========================

function cari($keyword){
    $query = "SELECT * FROM tb_data_warga
                WHERE 
            nik_warga LIKE '%$keyword%' OR
            nama_warga LIKE '%$keyword%' OR
            nomor_warga LIKE '%$keyword%' OR
            alamat_warga LIKE '%$keyword%'
            ";
        return query($query);
}

function caritagihan($keyword){
    $query = "SELECT * FROM tb_riwayat
                WHERE 
            nik_warga LIKE '%$keyword%' OR
            nama_warga LIKE '%$keyword%' OR
            bulan LIKE '%$keyword%' OR
            waktu LIKE '%$keyword%'
            ";
        return query($query);
}


// registrasi user===================

function registrasi($data){
    global $koneksi;

    $id_user = strtolower(stripslashes($data["id_user"]));
    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);

    // cek username ada atau tidak
    $result = mysqli_query($koneksi, "SELECT id_user  FROM tb_login WHERE id_user = 'id_user'");
    
    if( mysqli_fetch_assoc($result) ) {
     echo "<script>
            alert('username sudah terdaftar!') 
           </script>";
        return false;
    };


    // cek konformasi Password
    if( $password !== $password2){
        echo "<script>
                alert('Konfirmasi Password tidak sesuai!');
            </script>";
        return false;
    }

    // enkripsi Password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan ke Database

    mysqli_query($koneksi, "INSERT INTO tb_login VALUES('', '$id_user', '', '$password')");

    return mysqli_affected_rows($koneksi);

}


// update tegihan (semua warga)
function tagihan($data){
    global $koneksi;
    $bulan = $data["bulan"];
    $nominal = $data["nominal"];

    $query = "UPDATE tb_detail_tagihan
    SET $bulan = '$nominal'";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}


// bayar tagihan
function bayar1($data){
    global $koneksi;
    $nik_warga = $_GET["nik_warga"];
    $januari   = $data["januari"];

    // uang
        $tambah = mysqli_query($koneksi, "SELECT januari FROM tb_detail_tagihan WHERE nik_warga= '$nik_warga'");
        $querytambah = mysqli_fetch_array($tambah); //ini masih array

        $awal = mysqli_query($koneksi, "SELECT nominal FROM tb_uang WHERE bulan LIKE 'januari'");
        $queryawal = mysqli_fetch_array($awal);
        
        $total = $queryawal[0] + $querytambah[0];

        $uang = ("UPDATE tb_uang SET 
        nominal = '$total'
        WHERE bulan LIKE 'januari'
        ");
        mysqli_query($koneksi, $uang);

    $nama = mysqli_query($koneksi, "SELECT nama_warga FROM tb_data_warga WHERE nik_warga = $nik_warga");
    $nam = mysqli_fetch_row($nama);
    
    $query = "UPDATE tb_detail_tagihan SET 
                januari = '$januari'
                WHERE nik_warga = $nik_warga
                ";
    mysqli_query($koneksi, $query);
    // riwayat
    $que = "INSERT INTO tb_riwayat
            VALUES
    ('', '$nik_warga', '$nam[0]', 'januari', now())
    ";
    mysqli_query($koneksi, $que);


}
function bayar2($data){
    global $koneksi;
    $nik_warga = $_GET["nik_warga"];
    $bulan   = $data["februari"];
    
    $lan = 'februari';

     // uang
     $tambah = mysqli_query($koneksi, "SELECT februari FROM tb_detail_tagihan WHERE nik_warga= '$nik_warga'");
     $querytambah = mysqli_fetch_array($tambah); //ini masih array

     $awal = mysqli_query($koneksi, "SELECT nominal FROM tb_uang WHERE bulan LIKE '$lan'");
     $queryawal = mysqli_fetch_array($awal);
     
     $total = $queryawal[0] + $querytambah[0];

     $uang = ("UPDATE tb_uang SET 
     nominal = '$total'
     WHERE bulan LIKE '$lan'
     ");
     mysqli_query($koneksi, $uang);


    $nama = mysqli_query($koneksi, "SELECT nama_warga FROM tb_data_warga WHERE nik_warga = $nik_warga");
    $nam = mysqli_fetch_row($nama);


    $query = "UPDATE tb_detail_tagihan SET 
                februari = '$bulan'
                WHERE nik_warga = $nik_warga
                ";
    mysqli_query($koneksi, $query);
    // riwayat
    $que = "INSERT INTO tb_riwayat
            VALUES
    ('', '$nik_warga', '$nam[0]', 'februari', now())
    ";
    mysqli_query($koneksi, $que);
                
}
function bayar3($data){
    global $koneksi;
    $nik_warga = $_GET["nik_warga"];
    $bulan   = $data["maret"];

    $lan = 'maret';

     // uang
     $tambah = mysqli_query($koneksi, "SELECT maret FROM tb_detail_tagihan WHERE nik_warga= '$nik_warga'");
     $querytambah = mysqli_fetch_array($tambah); //ini masih array

     $awal = mysqli_query($koneksi, "SELECT nominal FROM tb_uang WHERE bulan LIKE '$lan'");
     $queryawal = mysqli_fetch_array($awal);
     
     $total = $queryawal[0] + $querytambah[0];

     $uang = ("UPDATE tb_uang SET 
     nominal = '$total'
     WHERE bulan LIKE '$lan'
     ");
     mysqli_query($koneksi, $uang);

    $nama = mysqli_query($koneksi, "SELECT nama_warga FROM tb_data_warga WHERE nik_warga = $nik_warga");
    $nam = mysqli_fetch_row($nama);


    $query = "UPDATE tb_detail_tagihan SET 
                maret = '$bulan'
                WHERE nik_warga = $nik_warga
                ";
    mysqli_query($koneksi, $query);
    // riwayat
    $que = "INSERT INTO tb_riwayat
            VALUES
    ('', '$nik_warga', '$nam[0]', 'maret', now())
    ";
    mysqli_query($koneksi, $que);
                
}
function bayar4($data){
    global $koneksi;
    $nik_warga = $_GET["nik_warga"];
    $bulan   = $data["april"];

    $lan = 'april';

     // uang
     $tambah = mysqli_query($koneksi, "SELECT april FROM tb_detail_tagihan WHERE nik_warga= '$nik_warga'");
     $querytambah = mysqli_fetch_array($tambah); //ini masih array

     $awal = mysqli_query($koneksi, "SELECT nominal FROM tb_uang WHERE bulan LIKE '$lan'");
     $queryawal = mysqli_fetch_array($awal);
     
     $total = $queryawal[0] + $querytambah[0];

     $uang = ("UPDATE tb_uang SET 
     nominal = '$total'
     WHERE bulan LIKE '$lan'
     ");
     mysqli_query($koneksi, $uang);

    $nama = mysqli_query($koneksi, "SELECT nama_warga FROM tb_data_warga WHERE nik_warga = $nik_warga");
    $nam = mysqli_fetch_row($nama);


    $query = "UPDATE tb_detail_tagihan SET 
                april = '$bulan'
                WHERE nik_warga = $nik_warga
                ";
    mysqli_query($koneksi, $query);
    // riwayat
    $que = "INSERT INTO tb_riwayat
            VALUES
    ('', '$nik_warga', '$nam[0]', 'april', now())
    ";
    mysqli_query($koneksi, $que);
                
}
function bayar5($data){
    global $koneksi;
    $nik_warga = $_GET["nik_warga"];
    $mei   = $data["mei"];

    $lan = 'mei';

     // uang
     $tambah = mysqli_query($koneksi, "SELECT mei FROM tb_detail_tagihan WHERE nik_warga= '$nik_warga'");
     $querytambah = mysqli_fetch_array($tambah); //ini masih array

     $awal = mysqli_query($koneksi, "SELECT nominal FROM tb_uang WHERE bulan LIKE '$lan'");
     $queryawal = mysqli_fetch_array($awal);
     
     $total = $queryawal[0] + $querytambah[0];

     $uang = ("UPDATE tb_uang SET 
     nominal = '$total'
     WHERE bulan LIKE '$lan'
     ");
     mysqli_query($koneksi, $uang);

    $nama = mysqli_query($koneksi, "SELECT nama_warga FROM tb_data_warga WHERE nik_warga = $nik_warga");
    $nam = mysqli_fetch_row($nama);


    $query = "UPDATE tb_detail_tagihan SET 
                mei = '$mei'
                WHERE nik_warga = $nik_warga
                ";
    mysqli_query($koneksi, $query);
    // riwayat
    $que = "INSERT INTO tb_riwayat
            VALUES
    ('', '$nik_warga', '$nam[0]', 'mei', now())
    ";
    mysqli_query($koneksi, $que);
                
}
function bayar6($data){
    global $koneksi;
    $nik_warga = $_GET["nik_warga"];
    $juni   = $data["juni"];

    $lan = 'juni';

     // uang
     $tambah = mysqli_query($koneksi, "SELECT juni FROM tb_detail_tagihan WHERE nik_warga= '$nik_warga'");
     $querytambah = mysqli_fetch_array($tambah); //ini masih array

     $awal = mysqli_query($koneksi, "SELECT nominal FROM tb_uang WHERE bulan LIKE '$lan'");
     $queryawal = mysqli_fetch_array($awal);
     
     $total = $queryawal[0] + $querytambah[0];

     $uang = ("UPDATE tb_uang SET 
     nominal = '$total'
     WHERE bulan LIKE '$lan'
     ");
     mysqli_query($koneksi, $uang);

    $nama = mysqli_query($koneksi, "SELECT nama_warga FROM tb_data_warga WHERE nik_warga = $nik_warga");
    $nam = mysqli_fetch_row($nama);


    $query = "UPDATE tb_detail_tagihan SET 
                juni = '$juni'
                WHERE nik_warga = $nik_warga
                ";
    mysqli_query($koneksi, $query);
    // riwayat
    $que = "INSERT INTO tb_riwayat
            VALUES
    ('', '$nik_warga', '$nam[0]', 'juni', now())
    ";
    mysqli_query($koneksi, $que);
                
}
function bayar7($data){
    global $koneksi;
    $nik_warga = $_GET["nik_warga"];
    $juli   = $data["juli"];

    $lan = 'juli';

     // uang
     $tambah = mysqli_query($koneksi, "SELECT juli FROM tb_detail_tagihan WHERE nik_warga= '$nik_warga'");
     $querytambah = mysqli_fetch_array($tambah); //ini masih array

     $awal = mysqli_query($koneksi, "SELECT nominal FROM tb_uang WHERE bulan LIKE '$lan'");
     $queryawal = mysqli_fetch_array($awal);
     
     $total = $queryawal[0] + $querytambah[0];

     $uang = ("UPDATE tb_uang SET 
     nominal = '$total'
     WHERE bulan LIKE '$lan'
     ");
     mysqli_query($koneksi, $uang);

    $nama = mysqli_query($koneksi, "SELECT nama_warga FROM tb_data_warga WHERE nik_warga = $nik_warga");
    $nam = mysqli_fetch_row($nama);


    $query = "UPDATE tb_detail_tagihan SET 
                juli = '$juli'
                WHERE nik_warga = $nik_warga
                ";
    mysqli_query($koneksi, $query);
    // riwayat
    $que = "INSERT INTO tb_riwayat
            VALUES
    ('', '$nik_warga', '$nam[0]', 'juli', now())
    ";
    mysqli_query($koneksi, $que);
                
}
function bayar8($data){
    global $koneksi;
    $nik_warga = $_GET["nik_warga"];
    $agustus   = $data["agustus"];

    $lan = 'agustus';

     // uang
     $tambah = mysqli_query($koneksi, "SELECT agustus FROM tb_detail_tagihan WHERE nik_warga= '$nik_warga'");
     $querytambah = mysqli_fetch_array($tambah); //ini masih array

     $awal = mysqli_query($koneksi, "SELECT nominal FROM tb_uang WHERE bulan LIKE '$lan'");
     $queryawal = mysqli_fetch_array($awal);
     
     $total = $queryawal[0] + $querytambah[0];

     $uang = ("UPDATE tb_uang SET 
     nominal = '$total'
     WHERE bulan LIKE '$lan'
     ");
     mysqli_query($koneksi, $uang);

    $nama = mysqli_query($koneksi, "SELECT nama_warga FROM tb_data_warga WHERE nik_warga = $nik_warga");
    $nam = mysqli_fetch_row($nama);


    $query = "UPDATE tb_detail_tagihan SET 
                agustus = '$agustus'
                WHERE nik_warga = $nik_warga
                ";
    mysqli_query($koneksi, $query);
    // riwayat
    $que = "INSERT INTO tb_riwayat
            VALUES
    ('', '$nik_warga', '$nam[0]', 'agustus', now())
    ";
    mysqli_query($koneksi, $que);
                
}
function bayar9($data){
    global $koneksi;
    $nik_warga = $_GET["nik_warga"];
    $september   = $data["september"];

    $lan = 'september';

     // uang
     $tambah = mysqli_query($koneksi, "SELECT september FROM tb_detail_tagihan WHERE nik_warga= '$nik_warga'");
     $querytambah = mysqli_fetch_array($tambah); //ini masih array

     $awal = mysqli_query($koneksi, "SELECT nominal FROM tb_uang WHERE bulan LIKE '$lan'");
     $queryawal = mysqli_fetch_array($awal);
     
     $total = $queryawal[0] + $querytambah[0];

     $uang = ("UPDATE tb_uang SET 
     nominal = '$total'
     WHERE bulan LIKE '$lan'
     ");
     mysqli_query($koneksi, $uang);

    $nama = mysqli_query($koneksi, "SELECT nama_warga FROM tb_data_warga WHERE nik_warga = $nik_warga");
    $nam = mysqli_fetch_row($nama);


    $query = "UPDATE tb_detail_tagihan SET 
                september = '$september'
                WHERE nik_warga = $nik_warga
                ";
    mysqli_query($koneksi, $query);
    // riwayat
    $que = "INSERT INTO tb_riwayat
            VALUES
    ('', '$nik_warga', '$nam[0]', 'september', now())
    ";
    mysqli_query($koneksi, $que);
                
}
function bayar10($data){
    global $koneksi;
    $nik_warga = $_GET["nik_warga"];
    $oktober   = $data["oktober"];

    $lan = 'oktober';

     // uang
     $tambah = mysqli_query($koneksi, "SELECT oktober FROM tb_detail_tagihan WHERE nik_warga= '$nik_warga'");
     $querytambah = mysqli_fetch_array($tambah); //ini masih array

     $awal = mysqli_query($koneksi, "SELECT nominal FROM tb_uang WHERE bulan LIKE '$lan'");
     $queryawal = mysqli_fetch_array($awal);
     
     $total = $queryawal[0] + $querytambah[0];

     $uang = ("UPDATE tb_uang SET 
     nominal = '$total'
     WHERE bulan LIKE '$lan'
     ");
     mysqli_query($koneksi, $uang);

    $nama = mysqli_query($koneksi, "SELECT nama_warga FROM tb_data_warga WHERE nik_warga = $nik_warga");
    $nam = mysqli_fetch_row($nama);


    $query = "UPDATE tb_detail_tagihan SET 
                oktober = '$oktober'
                WHERE nik_warga = $nik_warga
                ";
    mysqli_query($koneksi, $query);
    // riwayat
    $que = "INSERT INTO tb_riwayat
            VALUES
    ('', '$nik_warga', '$nam[0]', 'oktober', now())
    ";
    mysqli_query($koneksi, $que);
                
}
function bayar11($data){
    global $koneksi;
    $nik_warga = $_GET["nik_warga"];
    $november   = $data["november"];

    $lan = 'november';

     // uang
     $tambah = mysqli_query($koneksi, "SELECT november FROM tb_detail_tagihan WHERE nik_warga= '$nik_warga'");
     $querytambah = mysqli_fetch_array($tambah); //ini masih array

     $awal = mysqli_query($koneksi, "SELECT nominal FROM tb_uang WHERE bulan LIKE '$lan'");
     $queryawal = mysqli_fetch_array($awal);
     
     $total = $queryawal[0] + $querytambah[0];

     $uang = ("UPDATE tb_uang SET 
     nominal = '$total'
     WHERE bulan LIKE '$lan'
     ");
     mysqli_query($koneksi, $uang);

    $nama = mysqli_query($koneksi, "SELECT nama_warga FROM tb_data_warga WHERE nik_warga = $nik_warga");
    $nam = mysqli_fetch_row($nama);


    $query = "UPDATE tb_detail_tagihan SET 
                november = '$november'
                WHERE nik_warga = $nik_warga
                ";
    mysqli_query($koneksi, $query);

    // riwayat
    $que = "INSERT INTO tb_riwayat
            VALUES
    ('', '$nik_warga', '$nam[0]', 'november', now())
    ";
    mysqli_query($koneksi, $que);
                
}
function bayar12($data){
    global $koneksi;
    $nik_warga = $_GET["nik_warga"];
    $desember   = $data["desember"];

    $lan = 'desember';

     // uang
     $tambah = mysqli_query($koneksi, "SELECT desember FROM tb_detail_tagihan WHERE nik_warga= '$nik_warga'");
     $querytambah = mysqli_fetch_array($tambah); //ini masih array

     $awal = mysqli_query($koneksi, "SELECT nominal FROM tb_uang WHERE bulan LIKE '$lan'");
     $queryawal = mysqli_fetch_array($awal);
     
     $total = $queryawal[0] + $querytambah[0];

     $uang = ("UPDATE tb_uang SET 
     nominal = '$total'
     WHERE bulan LIKE '$lan'
     ");
     mysqli_query($koneksi, $uang);

    $nama = mysqli_query($koneksi, "SELECT nama_warga FROM tb_data_warga WHERE nik_warga = $nik_warga");
    $nam = mysqli_fetch_row($nama);


    $query = "UPDATE tb_detail_tagihan SET 
                desember = '$desember'
                WHERE nik_warga = $nik_warga
                ";
    mysqli_query($koneksi, $query);
// riwayat
    $que = "INSERT INTO tb_riwayat
            VALUES
    ('', '$nik_warga', '$nam[0]', 'desember', now())
    ";
    mysqli_query($koneksi, $que);
                
}
?>