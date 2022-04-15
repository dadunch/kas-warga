<?php
require 'functions.php';

if(isset ($_POST["register"]) ){
    
    if( registrasi($_POST) > 0 )  {
         echo "<script>
               alert('user baru berhasil ditambahkan!')    
               </script>";
    }else{
    echo mysqli_error($koneksi);
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halaman registrasi</title>
    <link rel="stylesheet" href="./aset/css/bootstrap.min.css">
    <style>
        body{
            background-image: url(./image/wave.svg);
        background-repeat: no-repeat;
        background-position: bottom;
        margin-bottom: 19.5rem;
        }
    </style>
</head>
<body>   


<div class="container mt-5">
    <div class="row md-5">
        <div class="row justify-content-center">
            <div class="card col-6 shadow border-light">
                <div class="text-center">
                    <div>
                        <h3>Registrasi</h3>
                    </div>
                </div>
                <form action="" method="post">
                    <div class="mb-4">
                        <label class="form-label" for="id_user">username :</label>
                        <input type="text" class="form-control" name="id_user" id="id_user" required placeholder="Masukkan Username">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="password">Password :</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="password2">Konfirmasi password</label>
                        <input class="form-control" type="password" name="password2" id="password2" placeholder="Konfirmasi Password">
                    </div>
                    <div class="mb-4">
                        <div class="d-grid">
                            <button class="btn btn-primary rounded-pill" name="register">Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="./aset/js/bootstrap.min.js"></script>
</body>
</html>